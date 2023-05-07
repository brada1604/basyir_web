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
                    <p class="mb-4">Data untuk memanage amalan yaumi. Kunjungi Website <a target="_blank" href="/amalan_yaumi">Amalan Yaumi Basyir</a>.</p>
                    <a class="edit" href="/amalan_yaumi/add"><button type="button" class="btn btn-primary">Tambah</button></a>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Amalan Yaumi</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>Konten</th>
                                            <th>Status</th>
                                            <th>Video</th>
                                            <th>Gambar</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>Konten</th>
                                            <th>Status</th>
                                            <th>Video</th>
                                            <th>Gambar</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                            $nomor = 1; 
                                            foreach($getAmalanYaumi as $row):
                                        ?>
                                            <tr>
                                                <td><?= $nomor++; ?></td>
                                                <td><?= $row->judul_amalan_yaumi;?></td>
                                                <td><?= $row->konten_amalan_yaumi;?></td>
                                                <td><?= $row->status_amalan_yaumi;?></td>
                                                <td><?= youtube($row->video_amalan_yaumi);?></td>
                                                <td><img clas="bd-placeholder-img card-img-top" width="100" height="100" src="<?=base_url($row->gambar_amalan_yaumi);?>"></td>
                                                <td>
                                                    <a class="edit" class="btn btn-warning" href="/amalan_yaumi/edit/<?= $row->id_amalan_yaumi;?>"><button type="button" class="btn btn-warning">Edit</button></a>
                                                    <a class="hapus" class="btn btn-danger" href="/amalan_yaumi/delete/<?= $row->id_amalan_yaumi;?>"><button type="button" class="btn btn-danger">Hapus</button></a>
                                                    <!-- <a class="detail" class="btn btn-info" href="/amalan_yaumi/<?= $row->id_amalan_yaumi;?>"><button type="button" class="btn btn-info">Detail</button></a>                      -->
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