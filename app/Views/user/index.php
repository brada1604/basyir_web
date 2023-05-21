                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Master User</h1>
                    <p class="mb-4">Data untuk memanage User.</p>
                    <a class="edit" href="/user/add"><button type="button" class="btn btn-primary">Tambah</button></a>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
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
                                        <tr>
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
                                                <td><?= $nomor++; ?></td>
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
                                                <td><?= $row->name;?></td>
                                                <td><?= $row->email;?></td>
                                                <td><?= $row->email_activated;?></td>
                                                <td>
                                                    <?php if ($row->status == 0) : ?>
                                                        <button type="button" class="btn btn-outline-warning">Belum Aktivasi</button>
                   
                                                    <?php elseif ($row->status == 1) : ?>
                                                        <button type="button" class="btn btn-outline-success">Sudah Aktivasi</button>
                                                        <a class="edit_status" class="btn btn-outline-secondary" href="/user/edit_status/<?= $row->id; ?>/2"><button type="button" class="btn btn-outline-secondary">Banned</button></a>

                                                    <?php elseif ($row->status == 2) : ?>
                                                        <button type="button" class="btn btn-outline-danger">Banned</button>
                                                        <a class="edit_status" class="btn btn-outline-secondary" href="/user/edit_status/<?= $row->id; ?>/1"><button type="button" class="btn btn-outline-secondary">Aktivasi Ulang</button></a>
                                                    <?php endif ?>
                                                </td>
                                                <td>
                                                    <?php if ($row->role != 1) : ?>
                                                        <a class="edit" class="btn btn-warning" href="/user/edit/<?= $row->id;?>"><button type="button" class="btn btn-warning">Edit</button></a>
                                                        <a class="hapus" class="btn btn-danger" href="/user/delete/<?= $row->id;?>"><button type="button" class="btn btn-danger">Hapus</button></a> 
                                                        <a class="email" class="btn btn-secondary" href="/user/email_activation/<?= $row->name;?>/<?= $row->email;?>"><button type="button" class="btn btn-secondary">Email</button></a>                                 
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