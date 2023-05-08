<?php
function youtube($url)
{
    $link = str_replace('http://www.youtube.com/watch?v=', '', $url);
    $link = str_replace('https://www.youtube.com/watch?v=', '', $link);
    $data = '<object width="300" height="200" data="http://www.youtube.com/v/' . $link . '" type="application/x-shockwave-flash">
    <param name="src" value="http://www.youtube.com/v/' . $link . '" />
    </object>';
    return $data;
}

?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Master Berita</h1>
    <p class="mb-4">Data untuk memanage berita. Kunjungi Website <a target="_blank" href="/berita">Berita Basyir</a>.</p>
    <a class="edit" href="/berita/add"><button type="button" class="btn btn-primary">Tambah</button></a>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Berita</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <?php if ($session->get('role') == 1) : ?>
                                <th>ID User</th>
                            <?php endif ?>
                            <th>Judul</th>
                            <th>Ringkasan</th>
                            <!-- <th>Konten</th> -->
                            <th>Status</th>
                            <th>Upload</th>
                            <th>Video</th>
                            <th>Gambar</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <?php if ($session->get('role') == 1) : ?>
                                <th>ID User</th>
                            <?php endif ?>
                            <th>Judul</th>
                            <th>Ringkasan</th>
                            <!-- <th>Konten</th> -->
                            <th>Status</th>
                            <th>Upload</th>
                            <th>Video</th>
                            <th>Gambar</th>
                            <th>Opsi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $nomor = 1;
                        foreach ($getBerita as $row) :
                        ?>
                            <tr>
                                <td><?= $nomor++; ?></td>
                                <?php if ($session->get('role') == 1) : ?>
                                    <td><?= $row->id_user; ?></td>
                                <?php endif ?>
                                <td><?= $row->judul_berita; ?></td>
                                <td><?= $row->ringkasan_berita; ?></td>
                                <!-- <td><?= $row->konten_berita; ?></td> -->
                                <td>
                                    <?php if ($row->status_berita == 1) : ?>
                                        <button type="button" class="btn btn-outline-primary">Draft</button>
                                        <?php if ($session->get('role') == 1) : ?>
                                            <a class="edit_status" class="btn btn-outline-success" href="/berita/edit_status/<?= $row->id_berita; ?>/2"><button type="button" class="btn btn-outline-success">ACC</button></a>
                                            <a class="edit_status" class="btn btn-outline-danger" href="/berita/edit_status/<?= $row->id_berita; ?>/4"><button type="button" class="btn btn-outline-danger">Reject</button></a>
                                        <?php endif ?>
                                    <?php elseif ($row->status_berita == 2) : ?>
                                        <button type="button" class="btn btn-outline-success">Show</button>
                                        <a class="edit_status" class="btn btn-outline-secondary" href="/berita/edit_status/<?= $row->id_berita; ?>/3"><button type="button" class="btn btn-outline-secondary">Archive</button></a>
                                    <?php elseif ($row->status_berita == 3) : ?>
                                        <button type="button" class="btn btn-outline-secondary">Archive</button>
                                        <a class="edit_status" class="btn btn-outline-success" href="/berita/edit_status/<?= $row->id_berita; ?>/2"><button type="button" class="btn btn-outline-success">Show</button></a>
                                    <?php elseif ($row->status_berita == 4) : ?>
                                        <button type="button" class="btn btn-outline-danger">Rejected</button>
                                    <?php endif ?>
                                </td>
                                <td><?= $row->created_at; ?></td>
                                <td><?= youtube($row->video_berita); ?> <br> <a href="<?=$row->video_berita?>" target="_blank">kunjungi situs</a></td>
                                <td><img clas="bd-placeholder-img card-img-top" width="100" height="100" src="<?= base_url($row->gambar_berita); ?>"></td>
                                <td>
                                    <a class="edit" class="btn btn-warning" href="/berita/edit/<?= $row->id_berita; ?>"><button type="button" class="btn btn-warning">Edit</button></a>
                                    <a class="hapus" class="btn btn-danger" href="/berita/delete/<?= $row->id_berita; ?>"><button type="button" class="btn btn-danger">Hapus</button></a>
                                    <a class="detail" class="btn btn-info" href="/berita/<?= $row->id_berita; ?>"><button type="button" class="btn btn-info">Detail</button></a>                     
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->