                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Master User</h1>
                    <p class="mb-4">Data untuk memanage User.</p>
                    <a class="edit" href="/user/add"><button type="button" class="btn btn-primary">Tambah User</button></a>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr align="center">
                                            <th>No</th>
                                            <th>Role</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Aktivasi Email</th>
                                            <th>Status</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr align="center">
                                            <th>No</th>
                                            <th>Role</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Aktivasi Email</th>
                                            <th>Status</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                            $nomor = 1; 
                                            foreach($getUser as $row):
                                        ?>
                                            <tr>
                                                <td align="center"><?= $nomor++; ?></td>
                                                <td>
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
                                                <td><?= $row->name;?></td>
                                                <td><?= $row->email;?></td>
                                                <td align="center"><?= $row->email_activated;?></td>
                                                <td align="center">
                                                    <?php if ($row->status == 0) : ?>
                                                        <span class="badge bg-warning text-light">Belum Aktivasi</span>
                   
                                                    <?php elseif ($row->status == 1) : ?>
                                                        <span class="badge bg-success text-light">Sudah Aktivasi</span>
                                                        <hr>
                                                        <a class="edit_status" class="btn btn-outline-secondary" href="/user/edit_status/<?= $row->id; ?>/2" onClick='return confirm("Yakin akan banned data user ini?")'><button type="button" class="btn btn-outline-secondary">Banned</button></a>

                                                    <?php elseif ($row->status == 2) : ?>
                                                        <span class="badge bg-danger text-light">Banned</span>
                                                        <hr>
                                                        <a class="edit_status" class="btn btn-outline-secondary" href="/user/edit_status/<?= $row->id; ?>/1" onClick='return confirm("Yakin akan aktivasi ulang data user ini?")'><button type="button" class="btn btn-outline-secondary">Aktivasi Ulang</button></a>
                                                    <?php endif ?>
                                                </td>
                                                <td align="center">
                                                    <?php if ($row->role != 1) : ?>
                                                        <a class="edit" class="btn btn-warning" href="/user/edit/<?= $row->id;?>" title="Edit Data"><button type="button" class="btn btn-warning"><i class="fas fa-fw fa-pen"></i></button></a>
                                                        <a class="hapus" class="btn btn-danger" href="/user/delete/<?= $row->id;?>" title="Hapus Data" onClick='return confirm("Yakin akan hapus data user ini?")'><button type="button" class="btn btn-danger"><i class="fas fa-fw fa-trash"></i></button></a> 
                                                        <a class="email" class="btn btn-secondary" href="/user/email_activation/<?= $row->name;?>/<?= $row->email;?>" title="Kirim Email Aktivasi" onClick='return confirm("Yakin akan kirim aktivasi untuk data user ini?")'><button type="button" class="btn btn-secondary"><i class="fas fa-fw fa-envelope"></i></button></a>                                 
                                                    <?php endif ?>
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