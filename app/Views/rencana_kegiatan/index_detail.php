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
                                        <tr>
                                            <th>No</th>
                                            <th>User</th>
                                            <!-- <th>ID Rencana Kegiatan</th> -->
                                            <th>Amalan Yaumi</th>
                                            <th>Status</th>
                                            <!-- <th>Opsi</th> -->
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
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
                                                <td><?= $nomor++; ?></td>
                                                <td><?= $row->email; ?></td>
                                                <!-- <td><?= $row->id_rencana_kegiatan; ?></td> -->
                                                <td><?= $row->judul_amalan_yaumi; ?></td>
                                                <td>
                                                    <?php if ($row->status_rencana_kegiatan == 1) : ?>
                                                        <button type="button" class="btn btn-outline-success">Show</button>
                                                    <?php elseif ($row->status_rencana_kegiatan == 0) : ?>
                                                        <button type="button" class="btn btn-outline-danger">Hide</button>
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
                                        <tr>
                                            <th>No</th>
                                            <th>Rencana Jadwal</th>
                                            <th>Realisasi Jadwal</th>
                                            <th>Status</th>
                                            <!-- <th>Opsi</th> -->
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
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
                                                <td><?= $nomor++; ?></td>
                                                <td><?= $row_detail->rencana_jadwal;?></td>
                                                <td><?= $row_detail->realisasi_jadwal;?></td>
                                                <td>
                                                    <?php if ($row_detail->status_detail_rencana_kegiatan == 2) : ?>
                                                        <button type="button" class="btn btn-outline-success">Sudah Dilakukan</button>
                                                    <?php elseif ($row_detail->status_detail_rencana_kegiatan == 1) : ?>
                                                        <button type="button" class="btn btn-outline-danger">Belum Dilakukan</button>
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