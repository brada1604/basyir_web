                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Master Kategori Wawasan Islami</h1>
                    <p class="mb-4">Data untuk memanage Kategori Wawasan Islami.</p>
                    <a class="edit" href="/kategori_wawasan_islami/add"><button type="button" class="btn btn-primary">Tambah Kategori Wawasan Islami</button></a>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Kategori Wawasan Islami</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr align="center">
                                            <th>No</th>
                                            <th>Nama Kategori</th>
                                            <th>Status</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr align="center">
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
                                                <td align="center"><?= $nomor++; ?></td>
                                                <td><?= $row->nama_kategori_wawasan_islami;?></td>
                                                <td align="center">
                                                    <?php if ($row->status_kategori_wawasan_islami == 1) : ?>
                                                        <span class="badge bg-success text-light">Show</span>
                                                        <hr>
                                                        <a class="edit_status" class="btn btn-outline-secondary" href="/kategori_wawasan_islami/edit_status/<?= $row->id_kategori_wawasan_islami; ?>/0" onClick='return confirm("Yakin akan hide data kategori wawasan islami ini untuk user?")'><button type="button" class="btn btn-outline-secondary">Hide</button></a>
                                                    <?php elseif ($row->status_kategori_wawasan_islami == 0) : ?>
                                                        <span class="badge bg-danger text-light">Hide</span>
                                                        <hr>
                                                        <a class="edit_status" class="btn btn-outline-secondary" href="/kategori_wawasan_islami/edit_status/<?= $row->id_kategori_wawasan_islami; ?>/1" onClick='return confirm("Yakin akan show data kategori wawasan islami ini untuk user?")'><button type="button" class="btn btn-outline-secondary">Show</button></a>
                                                    <?php endif ?>
                                                </td>
                                                <td align="center">
                                                    <a class="edit" class="btn btn-warning" href="/kategori_wawasan_islami/edit/<?= $row->id_kategori_wawasan_islami;?>" title="Edit Data"><button type="button" class="btn btn-warning"><i class="fas fa-fw fa-pen"></i></button></a>
                                                    <a class="hapus" class="btn btn-danger" href="/kategori_wawasan_islami/delete/<?= $row->id_kategori_wawasan_islami;?>" title="Hapus Data" onClick='return confirm("Yakin akan menghapus data kategori wawasan islami ini?")'><button type="button" class="btn btn-danger"><i class="fas fa-fw fa-trash"></i></button></a>
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