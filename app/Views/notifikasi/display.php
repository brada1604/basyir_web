                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Notifikasi</h1>
                    <p class="mb-4">Data untuk mengakses Notifikasi.</p>

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
                                            <th>Jenis</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>Pesan</th>
                                            <th>Jenis</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                            $nomor = 1; 
                                            foreach($getNotifikasiByIdUserLogin as $row):
                                        ?>
                                            <tr>
                                                <td><?= $nomor++; ?></td>
                                                <td><?= $row->judul_notifikasi;?></td>
                                                <td><?= $row->pesan_notifikasi;?></td>
                                                <td>
                                                    <?php if ($row->jenis_notifikasi == 2) : ?>
                                                        <button type="button" class="btn btn-outline-success">Sudah Dibaca</button>
                                                        
                                                    <?php elseif ($row->jenis_notifikasi == 1) : ?>
                                                        <button type="button" class="btn btn-outline-danger">Belum Dibaca</button>
                                                    <?php endif ?>
                                                </td>
                                                <td>
                                                    <?php if ($row->jenis_notifikasi == 1) : ?>
                                                        <a class="baca" class="btn btn-warning" href="/notifikasi/read/<?= $row->id_target_notifikasi;?>"><button type="button" class="btn btn-warning">Baca</button></a>       
                                                    <?php endif ?>
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