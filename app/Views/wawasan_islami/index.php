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
    <h1 class="h3 mb-2 text-gray-800">Master Wawasan Islami</h1>
    <p class="mb-4">Data untuk memanage wawasan islami. Kunjungi Website <a target="_blank" href="/wawasan_islami">Wawasan Islami Basyir</a>.</p>
    <a class="edit" href="/wawasan_islami/add"><button type="button" class="btn btn-primary">Tambah Wawasan Islami</button></a>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Wawasan Islami</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr align="center">
                            <th>No</th>
                            <?php if ($session->get('role') == 1) : ?>
                                <th>Email Kreator</th>
                            <?php endif ?>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Ringkasan</th>
                            <!-- <th>Konten</th> -->
                            <th>Status</th>
                            <th>Video</th>
                            <th>Gambar</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr align="center">
                            <th>No</th>
                            <?php if ($session->get('role') == 1) : ?>
                                <th>Email Kreator</th>
                            <?php endif ?>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Ringkasan</th>
                            <!-- <th>Konten</th> -->
                            <th>Status</th>
                            <th>Video</th>
                            <th>Gambar</th>
                            <th>Opsi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $nomor = 1;
                        foreach ($getWawasanIslami as $row) :
                        ?>
                            <tr>
                                <td align="center"><?= $nomor++; ?></td>
                                <?php if ($session->get('role') == 1) : ?>
                                    <td><?= $row->email; ?></td>
                                <?php endif ?>
                                <td><?= $row->judul_wawasan_islami; ?></td>
                                <td><?= $row->nama_kategori_wawasan_islami; ?></td>
                                <td><?= $row->ringkasan_wawasan_islami; ?></td>
                                <!-- <td><?= $row->konten_wawasan_islami; ?></td> -->
                                <td align="center">
                                    <?php if ($row->status_wawasan_islami == 1) : ?>
                                        <span class="badge bg-primary text-light">Draft</span>
                                        <hr>
                                        <?php if ($session->get('role') == 1) : ?>
                                            <a class="edit_status" class="btn btn-outline-success" href="/wawasan_islami/edit_status/<?= $row->id_wawasan_islami; ?>/2" onClick='return confirm("Yakin akan ACC data wawasan islami ini?")'><button type="button" class="btn btn-outline-success">ACC</button></a>
                                            <a class="edit_status" class="btn btn-outline-danger" href="/wawasan_islami/edit_status/<?= $row->id_wawasan_islami; ?>/4" onClick='return confirm("Yakin akan Reject data wawasan islami ini?")'><button type="button" class="btn btn-outline-danger">Reject</button></a>
                                        <?php endif ?>
                                    <?php elseif ($row->status_wawasan_islami == 2) : ?>
                                        <span class="badge bg-success text-light">Show</span>
                                        <hr>
                                        <a class="edit_status" class="btn btn-outline-secondary" href="/wawasan_islami/edit_status/<?= $row->id_wawasan_islami; ?>/3"  onClick='return confirm("Yakin akan Archive data wawasan islami ini?")'><button type="button" class="btn btn-outline-secondary">Archive</button></a>
                                    <?php elseif ($row->status_wawasan_islami == 3) : ?>
                                        <span class="badge bg-secondary text-light">Archive</span>
                                        <hr>
                                        <a class="edit_status" class="btn btn-outline-success" href="/wawasan_islami/edit_status/<?= $row->id_wawasan_islami; ?>/2" onClick='return confirm("Yakin akan Show data wawasan islami ini?")'><button type="button" class="btn btn-outline-success">Show</button></a>
                                    <?php elseif ($row->status_wawasan_islami == 4) : ?>
                                        <span class="badge bg-danger text-light">Rejected</span>
                                    <?php endif ?>
                                </td>
                                <td>
                                    <?php if ($row->video_wawasan_islami): ?>
                                        <?= youtube($row->video_wawasan_islami); ?> <br> <a href="<?=$row->video_wawasan_islami?>" target="_blank">kunjungi situs</a> 
                                    <?php endif ?>
                                </td>
                                <td><img clas="bd-placeholder-img card-img-top" width="100" height="100" src="<?= base_url($row->gambar_wawasan_islami); ?>"></td>
                                <td align="center">
                                    <a class="edit" class="btn btn-warning" href="/wawasan_islami/edit/<?= $row->id_wawasan_islami; ?>" title="Edit Data"><button type="button" class="btn btn-warning"><i class="fas fa-fw fa-pen"></i></button></a>
                                    <a class="hapus" class="btn btn-danger" href="/wawasan_islami/delete/<?= $row->id_wawasan_islami; ?>" title="Hapus Data" onClick='return confirm("Yakin akan menghapus data wawasan islami ini?")'><button type="button" class="btn btn-danger"><i class="fas fa-fw fa-trash"></i></button></a>
                                    <a class="detail" class="btn btn-info" href="/wawasan_islami/<?= $row->id_wawasan_islami; ?>" title="Preview Data"><button type="button" class="btn btn-info"><i class="fas fa-fw fa-eye"></i></button></a>                     
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