                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Master Saran</h1>
                    <p class="mb-4">Data untuk memanage saran. </p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Saran</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr align="center">
                                            <th>No</th>
                                            <th>Saran</th>
                                            <th>Waktu</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr align="center">
                                            <th>No</th>
                                            <th>Saran</th>
                                            <th>Waktu</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                            $nomor = 1; 
                                            foreach($getSaran as $row):
                                        ?>
                                            <tr>
                                                <td align="center"><?= $nomor++; ?></td>
                                                <td><?= $row->pesan_saran;?></td>
                                                <td align="center"><?= $row->created_at;?></td>
                                                <td align="center">
                                                    <a class="hapus" class="btn btn-danger" href="/saran/delete/<?= $row->id_saran;?>" title="Hapus Data" onClick='return confirm("Yakin akan menghapus data saran ini?")'><button type="button" class="btn btn-danger"><i class="fas fa-fw fa-trash"></i></button></a>
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