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
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr align="center">
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>Pesan</th>
                                            <th>Gambar</th>
                                            <th>Link Tujuan</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr align="center">
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
                                                <td align="center"><?= $nomor++; ?></td>
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

                    <a class="tambah" href="/notifikasi/add_target/<?= $row->id_notifikasi;?>"><button type="button" class="btn btn-primary">Tambah Target Notifikasi</button></a>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Target Notifikasi</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr align="center">
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
                                        <tr align="center">
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
                                                <td align="center"><?= $nomor++; ?></td>
                                                <td><?= $row->email;?></td>
                                                <td align="center">
                                                    <?php if ($row->role == 1) : ?>
                                                        <span class="badge bg-danger text-light">Administrator</span>
                   
                                                    <?php elseif ($row->role == 2) : ?>
                                                        <span class="badge bg-info text-light">Kontributor</span>

                                                    <?php elseif ($row->role == 3) : ?>
                                                        <span class="badge bg-primary text-light">Creator</span>

                                                    <?php elseif ($row->role == 4) : ?>
                                                        <span class="badge bg-success text-light">User</span>
                                                    <?php endif ?>
                                                </td>
                                                <td><?= $row->jadwal_notifikasi;?></td>
                                                <td align="center">
                                                    <?php if ($row->jenis_notifikasi == 2) : ?>
                                                        <span class="badge bg-success text-light">Sudah Dibaca</span>
                                                        
                                                    <?php elseif ($row->jenis_notifikasi == 1) : ?>
                                                        <span class="badge bg-danger text-light">Belum Dibaca</span>
                                                    <?php endif ?>
                                                </td>
                                                <td align="center">
                                                    <?php if ($row->status_notifikasi == 1) : ?>
                                                        <span class="badge bg-success text-light">Show</span>
                                                        <hr>
                                                        <a class="edit_status" class="btn btn-outline-secondary" href="/notifikasi/edit_status/<?= $row->id_target_notifikasi; ?>/0"><button type="button" class="btn btn-outline-secondary">Hide</button></a>
                                                    <?php elseif ($row->status_notifikasi == 0) : ?>
                                                        <span class="badge bg-danger text-light">Hide</span>
                                                        <hr>
                                                        <a class="edit_status" class="btn btn-outline-secondary" href="/notifikasi/edit_status/<?= $row->id_target_notifikasi; ?>/1"><button type="button" class="btn btn-outline-secondary">Show</button></a>
                                                    <?php endif ?>
                                                </td>
                                                <td align="center">
                                                    <a class="hapus" class="btn btn-danger" href="/notifikasi/delete_target/<?= $row->id_target_notifikasi;?>" title="Hapus Data" onClick='return confirm("Yakin akan menghapus data target notifikasi ini?")'><button type="button" class="btn btn-danger"><i class="fas fa-fw fa-trash"></i></button></a>                   
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <a class="btn btn-outline-secondary" href="/notifikasi_master">Kembali</a>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->