                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Master Kategori Wawasan Islami</h1>
                    <p class="mb-4">Data untuk memanage Kategori Wawasan Islami.</p>
                    <a class="edit" href="/kategori_wawasan_islami/add"><button type="button" class="btn btn-primary">Tambah</button></a>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Kategori Wawasan Islami</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Kategori</th>
                                            <th>Status</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Kategori</th>
                                            <th>Status</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                            $nomor = 1; 
                                            foreach($getKategoriWawasanIslami as $row):
                                        ?>
                                            <tr>
                                                <td><?= $nomor++; ?></td>
                                                <td><?= $row->nama_kategori_wawasan_islami;?></td>
                                                <td>
                                                    <?php if ($row->status_kategori_wawasan_islami == 1) : ?>
                                                        <button type="button" class="btn btn-outline-success">Show</button>
                                                        
                                                        <a class="edit_status" class="btn btn-outline-secondary" href="/kategori_wawasan_islami/edit_status/<?= $row->id_kategori_wawasan_islami; ?>/0"><button type="button" class="btn btn-outline-secondary">Hide</button></a>
                                                            
                                                        
                                                    <?php elseif ($row->status_kategori_wawasan_islami == 0) : ?>
                                                        <button type="button" class="btn btn-outline-danger">Hide</button>
                                                        <a class="edit_status" class="btn btn-outline-secondary" href="/kategori_wawasan_islami/edit_status/<?= $row->id_kategori_wawasan_islami; ?>/1"><button type="button" class="btn btn-outline-secondary">Show</button></a>
                                                    <?php endif ?>
                                                </td>
                                                <td>
                                                    <a class="edit" class="btn btn-warning" href="/kategori_wawasan_islami/edit/<?= $row->id_kategori_wawasan_islami;?>"><button type="button" class="btn btn-warning">Edit</button></a>
                                                    <a class="hapus" class="btn btn-danger" href="/kategori_wawasan_islami/delete/<?= $row->id_kategori_wawasan_islami;?>"><button type="button" class="btn btn-danger">Hapus</button></a>
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