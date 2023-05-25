                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Master Notifikasi</h1>
                    <p class="mb-4">Data untuk memanage Notifikasi.</p>
                    <a class="edit" href="/notifikasi/add"><button type="button" class="btn btn-primary">Tambah</button></a>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Notifikasi</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>Pesan</th>
                                            <th>Gambar</th>
                                            <th>Link Tujuan</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>Pesan</th>
                                            <th>Gambar</th>
                                            <th>Link Tujuan</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                            $nomor = 1; 
                                            foreach($getNotifikasi as $row):
                                        ?>
                                            <tr>
                                                <td><?= $nomor++; ?></td>
                                                <td><?= $row->judul_notifikasi;?></td>
                                                <td><?= $row->pesan_notifikasi;?></td>
                                                <td>
                                                    <?php if (empty($row->gambar_notifikasi)): ?>
                                                        Tidak ada gambar
                                                    <?php else : ?>
                                                        <img clas="bd-placeholder-img card-img-top" width="100" height="100" src="<?= base_url($row->gambar_notifikasi); ?>">

                                                    <?php endif ?>
                                                </td>
                                                <td><?= $row->link_tujuan_notifikasi;?></td>
                                                <td>
                                                    <a class="edit" class="btn btn-warning" href="/notifikasi/edit/<?= $row->id_notifikasi;?>"><button type="button" class="btn btn-warning">Edit</button></a>
                                                    <a class="hapus" class="btn btn-danger" href="/notifikasi/delete/<?= $row->id_notifikasi;?>"><button type="button" class="btn btn-danger">Hapus</button></a>
                                                    <a class="detail" class="btn btn-info" href="/notifikasi/detail/<?= $row->id_notifikasi;?>"><button type="button" class="btn btn-info">Detail</button></a>                     
                                                    <a class="notif" class="btn btn-success" href="/onesignal/push/<?= $row->judul_notifikasi;?>/<?= $row->pesan_notifikasi;?>/notifikasi_master"><button type="button" class="btn btn-success">Notif To All</button></a>                     
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