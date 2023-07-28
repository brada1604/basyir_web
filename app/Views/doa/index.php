                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Master Doa</h1>
                    <p class="mb-4">Data untuk memanage Doa. </p>
                    <a class="edit" href="/doa/add"><button type="button" class="btn btn-primary">Tambah Doa</button></a>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Doa</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr align="center">
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>Ringkasan</th>
                                            <th>Ringkasan Latin</th>
                                            <th>Status</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr align="center">
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>Ringkasan</th>
                                            <th>Ringkasan Latin</th>
                                            <th>Status</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                            $nomor = 1; 
                                            foreach($getDoa as $row):
                                        ?>
                                            <tr>
                                                <td align="center"><?= $nomor++; ?></td>
                                                <td><?= $row->judul_doa;?></td>
                                                <td  style="text-align: right;"><?= $row->ringkasan_doa;?></td>
                                                <td><?= $row->ringkasan_latin_doa;?></td>
                                                <td align="center">
                                                    <?php if ($row->status_doa == 1) : ?>
                                                        <span class="badge bg-success text-light">Show</span>
                                                        <hr>
                                                        <a class="edit_status" class="btn btn-outline-secondary" href="/doa/edit_status/<?= $row->id_doa; ?>/0" onClick='return confirm("Yakin akan hide data doa ini untuk user?")'><button type="button" class="btn btn-outline-secondary">Hide</button></a>
                                                            
                                                        
                                                    <?php elseif ($row->status_doa == 0) : ?>
                                                        <span class="badge bg-danger text-light">Hide</span>
                                                        <hr>
                                                        <a class="edit_status" class="btn btn-outline-secondary" href="/doa/edit_status/<?= $row->id_doa; ?>/1" onClick='return confirm("Yakin akan show data doa ini untuk user?")'><button type="button" class="btn btn-outline-secondary">Show</button></a>
                                                    <?php endif ?>
                                                </td>
                                                <td align="center">
                                                    <a class="edit" class="btn btn-warning" href="/doa/edit/<?= $row->id_doa;?>" title="Edit Data"><button type="button" class="btn btn-warning"><i class="fas fa-fw fa-pen"></i></button></a>
                                                    <a class="hapus" class="btn btn-danger" href="/doa/delete/<?= $row->id_doa;?>" title="Hapus Data" onClick='return confirm("Yakin akan menghapus data doa ini?")'><button type="button" class="btn btn-danger"><i class="fas fa-fw fa-trash"></i></button></a>
                                                    <a class="detail" class="btn btn-info" href="/doa/detail/<?= $row->id_doa;?>" title="Detail Data"><button type="button" class="btn btn-info"><i class="fas fa-fw fa-eye"></i></button></a>                     
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