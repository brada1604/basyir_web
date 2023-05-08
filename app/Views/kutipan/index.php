                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Master Kutipan</h1>
                    <p class="mb-4">Data untuk memanage Kutipan. Kunjungi Website <a target="_blank" href="/kutipan">Kutipan Basyir</a>.</p>
                    <a class="edit" href="/kutipan/add"><button type="button" class="btn btn-primary">Tambah</button></a>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Kutipan</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>Deskripsi</th>
                                            <th>Sumber</th>
                                            <th>Status</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>Deskripsi</th>
                                            <th>Sumber</th>
                                            <th>Status</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                            $nomor = 1; 
                                            foreach($getKutipan as $row):
                                        ?>
                                            <tr>
                                                <td><?= $nomor++; ?></td>
                                                <td><?= $row->judul_kutipan;?></td>
                                                <td><?= $row->deskripsi_kutipan;?></td>
                                                <td><?= $row->sumber_kutipan;?></td>
                                                <!-- <td><?= $row->status_kutipan;?></td> -->
                                                <td>
                                                    <?php if ($row->status_kutipan == 1) : ?>
                                                        <button type="button" class="btn btn-outline-success">Show</button>
                                                        
                                                        <a class="edit_status" class="btn btn-outline-secondary" href="/kutipan/edit_status/<?= $row->id_kutipan; ?>/0"><button type="button" class="btn btn-outline-secondary">Hide</button></a>
                                                            
                                                        
                                                    <?php elseif ($row->status_kutipan == 0) : ?>
                                                        <button type="button" class="btn btn-outline-secondary">Hide</button>
                                                        <a class="edit_status" class="btn btn-outline-success" href="/kutipan/edit_status/<?= $row->id_kutipan; ?>/1"><button type="button" class="btn btn-outline-success">Archive</button></a>
                                                    <?php endif ?>
                                                </td>
                                                <td>
                                                    <a class="edit" class="btn btn-warning" href="/kutipan/edit/<?= $row->id_kutipan;?>"><button type="button" class="btn btn-warning">Edit</button></a>
                                                    <a class="hapus" class="btn btn-danger" href="/kutipan/delete/<?= $row->id_kutipan;?>"><button type="button" class="btn btn-danger">Hapus</button></a>
                                                    <!-- <a class="detail" class="btn btn-info" href="/kutipan/<?= $row->id_kutipan;?>"><button type="button" class="btn btn-info">Detail</button></a>                      -->
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