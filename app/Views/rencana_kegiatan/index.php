                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Master Rencana Kegiatan</h1>
                    <p class="mb-4">Data untuk memanage rencana kegiatan. </p>
                    <a class="edit" href="/rencana_kegiatan/add"><button type="button" class="btn btn-primary">Tambah Rencana Kegiatan</button></a>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Rencana Kegiatan</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr align="center">
                                            <th>No</th>
                                            <th>User</th>
                                            <!-- <th>ID Rencana Kegiatan</th> -->
                                            <th>Amalan Yaumi</th>
                                            <th>Status</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr align="center">
                                            <th>No</th>
                                            <th>User</th>
                                            <!-- <th>ID Rencana Kegiatan</th> -->
                                            <th>Amalan Yaumi</th>
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
                                                        <hr>
                                                        <a class="edit_status" class="btn btn-outline-secondary" href="/rencana_kegiatan/edit_status/<?= $row->id_rencana_kegiatan; ?>/0" onClick='return confirm("Yakin akan hide data rencana kegiatan ini untuk user?")'><button type="button" class="btn btn-outline-secondary">Hide</button></a>
                                                    <?php elseif ($row->status_rencana_kegiatan == 0) : ?>
                                                        <span class="badge bg-danger text-light">Hide</span>
                                                        <hr>
                                                        <a class="edit_status" class="btn btn-outline-secondary" href="/rencana_kegiatan/edit_status/<?= $row->id_rencana_kegiatan; ?>/1" onClick='return confirm("Yakin akan show data rencana kegiatan ini untuk user?")'><button type="button" class="btn btn-outline-secondary">Show</button></a>
                                                    <?php endif ?>
                                                </td>
                                                <td align="center">
                                                    <a class="edit" class="btn btn-warning" href="/rencana_kegiatan/edit/<?= $row->id_rencana_kegiatan; ?>" title="Edit Data"><button type="button" class="btn btn-warning"><i class="fas fa-fw fa-pen"></i></button></a>
                                                    <a class="hapus" class="btn btn-danger" href="/rencana_kegiatan/delete/<?= $row->id_rencana_kegiatan; ?>" title="Hapus Data" onClick='return confirm("Yakin akan menghapus data ini?")'><button type="button" class="btn btn-danger"><i class="fas fa-fw fa-trash"></i></button></a>
                                                    <a class="detail" class="btn btn-info" href="/rencana_kegiatan/detail/<?= $row->id_rencana_kegiatan; ?>" title="Detail Data"><button type="button" class="btn btn-info"><i class="fas fa-fw fa-eye"></i></button></a>                     
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