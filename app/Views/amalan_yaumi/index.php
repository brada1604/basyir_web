<?php 
function youtube($url){
    $link=str_replace('http://www.youtube.com/watch?v=', '', $url);
    $link=str_replace('https://www.youtube.com/watch?v=', '', $link);
    $data='<object width="300" height="200" data="http://www.youtube.com/v/'.$link.'" type="application/x-shockwave-flash">
    <param name="src" value="http://www.youtube.com/v/'.$link.'" />
    </object>';
    return $data;
}
 
?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Master Amalan Yaumi</h1>
                    <p class="mb-4">Data untuk memanage amalan yaumi</p>
                    <a class="edit" href="/amalan_yaumi/add"><button type="button" class="btn btn-primary">Tambah Amalan Yaumi</button></a>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Amalan Yaumi</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr align="center">
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>Konten</th>
                                            <th>Status</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr align="center">
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>Konten</th>
                                            <th>Status</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                            $nomor = 1; 
                                            foreach($getAmalanYaumi as $row):
                                        ?>
                                            <tr>
                                                <td align="center"><?= $nomor++; ?></td>
                                                <td><?= $row->judul_amalan_yaumi;?></td>
                                                <td><?= $row->konten_amalan_yaumi;?></td>
                                                <td align="center">
                                                    <?php if ($row->status_amalan_yaumi == 1) : ?>
                                                        <span class="badge bg-success text-light">Show</span>
                                                        <hr>
                                                        <a class="edit_status" class="btn btn-outline-secondary" href="/amalan_yaumi/edit_status/<?= $row->id_amalan_yaumi; ?>/0" onClick='return confirm("Yakin akan hide data amalan yaumi ini untuk user?")'><button type="button" class="btn btn-outline-secondary">Hide</button></a>
                                                    <?php elseif ($row->status_amalan_yaumi == 0) : ?>
                                                        <span class="badge bg-danger text-light">Hide</span>
                                                        <hr>
                                                        <a class="edit_status" class="btn btn-outline-secondary" href="/amalan_yaumi/edit_status/<?= $row->id_amalan_yaumi; ?>/1"><button type="button" class="btn btn-outline-secondary" onClick='return confirm("Yakin akan show data amalan yaumi ini untuk user?")'>Show</button></a>
                                                    <?php endif ?>
                                                </td>
                                                <td width="150px" align="center">
                                                    <a class="edit" class="btn btn-warning" href="/amalan_yaumi/edit/<?= $row->id_amalan_yaumi;?>" title="Edit Data"><button type="button" class="btn btn-warning"><i class="fas fa-fw fa-pen"></i></button></a>
                                                    <a class="hapus" class="btn btn-danger" href="/amalan_yaumi/delete/<?= $row->id_amalan_yaumi;?>" onClick='return confirm("Yakin akan menghapus data amalan yaumi ini?")' title="Hapus Data"><button type="button" class="btn btn-danger"><i class="fas fa-fw fa-trash"></i></button></a> 
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