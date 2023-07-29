                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Master Rencana Kegiatan Detail</h1>
                    <p class="mb-4">Data untuk memanage Rencana Kegiatan Detail. </p>
                    

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Rencana Kegiatan</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered"  width="100%" cellspacing="0">
                                    <thead>
                                        <tr align="center">
                                            <th>No</th>
                                            <th>User</th>
                                            <!-- <th>ID Rencana Kegiatan</th> -->
                                            <th>Amalan Yaumi</th>
                                            <th>Status</th>
                                            <!-- <th>Opsi</th> -->
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr align="center">
                                            <th>No</th>
                                            <th>User</th>
                                            <!-- <th>ID Rencana Kegiatan</th> -->
                                            <th>Amalan Yaumi</th>
                                            <th>Status</th>
                                            <!-- <th>Opsi</th> -->
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $nomor = 1;
                                        foreach ($getRencanaKegiatan as $row) :
                                        ?>
                                            <tr>
                                                <td align="center"><?= $nomor++; ?></td>
                                                <td><?= $row->email; ?></td>
                                                <!-- <td><?= $row->id_rencana_kegiatan; ?></td> -->
                                                <td>
                                                    <?= $row->judul_amalan_yaumi; ?>
                                                    <?php if ($row->id_amalan_yaumi == 1): ?>
                                                        <hr>
                                                        <?= $row->keterangan_kegiatan; ?>      
                                                    <?php endif ?>   
                                                </td>
                                                <td align="center">
                                                    <?php if ($row->status_rencana_kegiatan == 1) : ?>
                                                        <span class="badge bg-success text-light">Show</span>
                                                    <?php elseif ($row->status_rencana_kegiatan == 0) : ?>
                                                        <span class="badge bg-danger text-light">Hide</span>
                                                    <?php endif ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Rencana Kegiatan Detail</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr align="center">
                                            <th>No</th>
                                            <th>Rencana Jadwal</th>
                                            <th>Realisasi Jadwal</th>
                                            <th>Status</th>
                                            <!-- <th>Opsi</th> -->
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr align="center">
                                            <th>No</th>
                                            <th>Rencana Jadwal</th>
                                            <th>Realisasi Jadwal</th>
                                            <th>Status</th>
                                            <!-- <th>Opsi</th> -->
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                            $nomor = 1; 
                                            foreach($getDetailRencanaKegiatan as $row_detail):
                                        ?>
                                            <tr>
                                                <td align="center"><?= $nomor++; ?></td>
                                                <td><?= $row_detail->rencana_jadwal;?></td>
                                                <td><?= $row_detail->realisasi_jadwal;?></td>
                                                <td align="center">
                                                    <?php if ($row_detail->status_detail_rencana_kegiatan == 2) : ?>
                                                        <span class="badge bg-success text-light">Sudah Dilakukan</span>
                                                    <?php elseif ($row_detail->status_detail_rencana_kegiatan == 1) : ?>
                                                        <span class="badge bg-danger text-light">Belum Dilakukan</span>
                                                    <?php endif ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <a class="btn btn-outline-secondary" href="/rencana_kegiatan_master">Kembali</a>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->