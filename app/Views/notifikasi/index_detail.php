                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Master Detail Notifikasi</h1>
                    <p class="mb-4">Data untuk memanage Notifikasi.</p>
                    

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Notifikasi</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>Pesan</th>
                                            <th>Gambar</th>
                                            <th>Link Tujuan</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>Pesan</th>
                                            <th>Gambar</th>
                                            <th>Link Tujuan</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                            $nomor = 1; 
                                            foreach($getNotifikasi as $row):
                                        ?>
                                            <tr>
                                                <td><?= $nomor++; ?></td>
                                                <td><?= $row->judul_notifikasi;?></td>
                                                <td><?= $row->pesan_notifikasi;?></td>
                                                <td>
                                                    <?php if (empty($row->gambar_notifikasi)): ?>
                                                        Tidak ada gambar
                                                    <?php else : ?>
                                                        <img clas="bd-placeholder-img card-img-top" width="100" height="100" src="<?= base_url($row->gambar_notifikasi); ?>">

                                                    <?php endif ?>
                                                </td>
                                                <td><?= $row->link_tujuan_notifikasi;?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <a class="tambah" href="/notifikasi/add_target/<?= $row->id_notifikasi;?>"><button type="button" class="btn btn-primary">Tambah</button></a>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Target Notifikasi</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>User</th>
                                            <th>Role</th>
                                            <th>Jadwal</th>
                                            <th>Jenis</th>
                                            <th>Status</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>User</th>
                                            <th>Role</th>
                                            <th>Jadwal</th>
                                            <th>Jenis</th>
                                            <th>Status</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                            $nomor = 1; 
                                            foreach($getTargetNotifikasi as $row):
                                        ?>
                                            <tr>
                                                <td><?= $nomor++; ?></td>
                                                <td><?= $row->email;?></td>
                                                <td>
                                                    <?php if ($row->role == 1) : ?>
                                                        <button type="button" class="btn btn-outline-danger">Administrator</button>
                   
                                                    <?php elseif ($row->role == 2) : ?>
                                                        <button type="button" class="btn btn-outline-info">Kontributor</button>

                                                    <?php elseif ($row->role == 3) : ?>
                                                        <button type="button" class="btn btn-outline-primary">Creator</button>

                                                    <?php elseif ($row->role == 4) : ?>
                                                        <button type="button" class="btn btn-outline-success">User</button>
                                                    <?php endif ?>
                                                </td>
                                                <td><?= $row->jadwal_notifikasi;?></td>
                                                <td>
                                                    <?php if ($row->jenis_notifikasi == 2) : ?>
                                                        <button type="button" class="btn btn-outline-success">Sudah Dibaca</button>
                                                        
                                                    <?php elseif ($row->jenis_notifikasi == 1) : ?>
                                                        <button type="button" class="btn btn-outline-danger">Belum Dibaca</button>
                                                    <?php endif ?>
                                                </td>
                                                <td>
                                                    <?php if ($row->status_notifikasi == 1) : ?>
                                                        <button type="button" class="btn btn-outline-success">Show</button>
                                                        
                                                        <a class="edit_status" class="btn btn-outline-secondary" href="/notifikasi/edit_status/<?= $row->id_target_notifikasi; ?>/0"><button type="button" class="btn btn-outline-secondary">Hide</button></a>
                                                            
                                                        
                                                    <?php elseif ($row->status_notifikasi == 0) : ?>
                                                        <button type="button" class="btn btn-outline-danger">Hide</button>
                                                        <a class="edit_status" class="btn btn-outline-secondary" href="/notifikasi/edit_status/<?= $row->id_target_notifikasi; ?>/1"><button type="button" class="btn btn-outline-secondary">Show</button></a>
                                                    <?php endif ?>
                                                </td>
                                                <td>
                                                    <a class="hapus" class="btn btn-danger" href="/notifikasi/delete_target/<?= $row->id_target_notifikasi;?>"><button type="button" class="btn btn-danger">Hapus</button></a>                   
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