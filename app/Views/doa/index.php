                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Master Doa</h1>
                    <p class="mb-4">Data untuk memanage Doa. Kunjungi Website <a target="_blank" href="/doa">Doa Basyir</a>.</p>
                    <a class="edit" href="/doa/add"><button type="button" class="btn btn-primary">Tambah</button></a>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Doa</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>Ringkasan</th>
                                            <th>Ringkasan Latin</th>
                                            <th>Status</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
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
                                                <td><?= $nomor++; ?></td>
                                                <td><?= $row->judul_doa;?></td>
                                                <td><?= $row->ringkasan_doa;?></td>
                                                <td><?= $row->ringkasan_latin_doa;?></td>
                                                <td><?= $row->status_doa;?></td>
                                                <td>
                                                    <a class="edit" class="btn btn-warning" href="/doa/edit/<?= $row->id_doa;?>"><button type="button" class="btn btn-warning">Edit</button></a>
                                                    <a class="hapus" class="btn btn-danger" href="/doa/delete/<?= $row->id_doa;?>"><button type="button" class="btn btn-danger">Hapus</button></a>
                                                    <!-- <a class="detail" class="btn btn-info" href="/doa/<?= $row->id_doa;?>"><button type="button" class="btn btn-info">Detail</button></a>                      -->
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