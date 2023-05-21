                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Master Doa Detail</h1>
                    <p class="mb-4">Data untuk memanage Doa Detail. </p>
                    

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Doa</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered"  width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>Ringkasan</th>
                                            <th>Ringkasan Latin</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>Ringkasan</th>
                                            <th>Ringkasan Latin</th>
                                            <th>Status</th>
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
                                                <td  style="text-align: right;"><?= $row->ringkasan_doa;?></td>
                                                <td><?= $row->ringkasan_latin_doa;?></td>
                                                <td>
                                                    <?php if ($row->status_doa == 1) : ?>
                                                        <button type="button" class="btn btn-outline-success">Show</button>
                                                    <?php elseif ($row->status_doa == 0) : ?>
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

                    <a class="edit" href="/doa/add_detail/<?= $row->id_doa;?>"><button type="button" class="btn btn-primary">Tambah</button></a>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Doa Detail</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Konten</th>
                                            <th>Konten Latin</th>
                                            <th>Status</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Konten</th>
                                            <th>Konten Latin</th>
                                            <th>Status</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                            $nomor = 1; 
                                            foreach($getDoaDetail as $row_detail):
                                        ?>
                                            <tr>
                                                <td><?= $nomor++; ?></td>
                                                <td style="text-align: right;"><?= $row_detail->konten_doa;?></td>
                                                <td><?= $row_detail->konten_latin_doa;?></td>
                                                <td>
                                                    <?php if ($row_detail->status_doa_detail == 1) : ?>
                                                        <button type="button" class="btn btn-outline-success">Show</button>
                                                        
                                                        <a class="edit_status" class="btn btn-outline-secondary" href="/doa/edit_status_detail/<?= $row_detail->id_doa_detail; ?>/0/<?= $row_detail->id_doa; ?>"><button type="button" class="btn btn-outline-secondary">Hide</button></a>
                                                            
                                                        
                                                    <?php elseif ($row_detail->status_doa_detail == 0) : ?>
                                                        <button type="button" class="btn btn-outline-danger">Hide</button>
                                                        <a class="edit_status" class="btn btn-outline-secondary" href="/doa/edit_status_detail/<?= $row_detail->id_doa_detail; ?>/1/<?= $row_detail->id_doa; ?>"><button type="button" class="btn btn-outline-secondary">Show</button></a>
                                                    <?php endif ?>
                                                </td>
                                                <td>
                                                    <a class="edit" class="btn btn-warning" href="/doa/edit_detail/<?= $row_detail->id_doa_detail;?>/<?= $row->id_doa;?>"><button type="button" class="btn btn-warning">Edit</button></a>
                                                    <a class="hapus" class="btn btn-danger" href="/doa/delete_detail/<?= $row_detail->id_doa_detail;?>/<?= $row->id_doa;?>"><button type="button" class="btn btn-danger">Hapus</button></a>                
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