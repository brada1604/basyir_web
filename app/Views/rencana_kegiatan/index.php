                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Master Rencana Kegiatan</h1>
                    <p class="mb-4">Data untuk memanage rencana kegiatan. Kunjungi Website <a target="_blank" href="/rencana_kegiatan">Rencana Kegiatan Basyir</a>.</p>
                    <a class="edit" href="/rencana_kegiatan/add"><button type="button" class="btn btn-primary">Tambah</button></a>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Rencana Kegiatan</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID User</th>
                                            <th>ID Rencana Kegiatan</th>
                                            <th>ID Amalan Yaumi</th>
                                            <th>Status</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>ID User</th>
                                            <th>ID Rencana Kegiatan</th>
                                            <th>ID Amalan Yaumi</th>
                                            <th>Status</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $nomor = 1;
                                        foreach ($getRencanaKegiatan as $row) :
                                        ?>
                                            <tr>
                                                <td><?= $nomor++; ?></td>
                                                <td><?= $row->id_user; ?></td>
                                                <td><?= $row->id_rencana_kegiatan; ?></td>
                                                <td><?= $row->id_amalan_yaumi; ?></td>
                                                <td><?= $row->status_rencana_kegiatan; ?></td>
                                                <td>
                                                    <a class="edit" class="btn btn-warning" href="/rencana_kegiatan/edit/<?= $row->id_rencana_kegiatan; ?>"><button type="button" class="btn btn-warning">Edit</button></a>
                                                    <a class="hapus" class="btn btn-danger" href="/rencana_kegiatan/delete/<?= $row->id_rencana_kegiatan; ?>"><button type="button" class="btn btn-danger">Hapus</button></a>
                                                    <!-- <a class="detail" class="btn btn-info" href="/rencana_kegiatan/<?= $row->id_rencana_kegiatan; ?>"><button type="button" class="btn btn-info">Detail</button></a>                      -->
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