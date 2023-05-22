                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Profil User</h1>

                    <?php
                        foreach($getUser as $row):
                    ?>

                    <form action="<?= base_url(); ?>/user/update_profil" method="post" enctype="multipart/form-data">

                        <div class="row card-group-row">

                            <?php if (isset($validation)) { ?>
                                <div class="col-md-12">
                                    <?php foreach ($validation->getErrors() as $error) : ?>
                                        <div class="alert alert-warning" role="alert">
                                            <i class="mdi mdi-alert-outline me-2"></i>
                                            <?= esc($error) ?>
                                        </div>
                                    <?php endforeach ?>
                                </div>
                            <?php } ?>

                            <div class="col-md-12">
                                <div class="list-group list-group-flush">
                                    <div class="list-group-item p-3">
                                        <div class="row align-items-start">
                                            <div class="col-md-2 mb-8pt mb-md-0">
                                                <div class="media align-items-left">
                                                    <div class="d-flex flex-column media-body media-middle">
                                                        <span class="card-title">ID User</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col mb-8pt mb-md-0">
                                                <input name="id" type="text" class="form-control" value="<?= $row->id; ?>" readonly/>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ROLE -->
                                    <div class="list-group-item p-3">
                                        <div class="row align-items-start">
                                            <div class="col-md-2 mb-8pt mb-md-0">
                                                <div class="media align-items-left">
                                                    <div class="d-flex flex-column media-body media-middle">
                                                        <span
                                                        class="card-title">Role User</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col mb-8pt mb-md-0">
                                                <?php if ($row->role == 1) : ?>
                                                    <input name="role" value="Administrator" type="text" class="form-control" placeholder="Masukan Nama User" readonly/>
                                                <?php elseif ($row->role == 2) : ?>
                                                    <input name="role" value="Kontributor" type="text" class="form-control" placeholder="Masukan Nama User" readonly/>
                                                <?php elseif ($row->role == 3) : ?>
                                                    <input name="role" value="Kreator" type="text" class="form-control" placeholder="Masukan Nama User" readonly/>
                                                <?php elseif ($row->role == 4) : ?>
                                                    <input name="role" value="User" type="text" class="form-control" placeholder="Masukan Nama User" readonly/>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- EMAIL -->
                                    <div class="list-group-item p-3">
                                        <div class="row align-items-start">
                                            <div class="col-md-2 mb-8pt mb-md-0">
                                                <div class="media align-items-left">
                                                    <div class="d-flex flex-column media-body media-middle">
                                                        <span
                                                        class="card-title">Email User</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col mb-8pt mb-md-0">
                                                <input name="name" value="<?= $row->email; ?>" type="text" class="form-control" placeholder="Masukan Nama User" readonly/>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- NAMA -->
                                    <div class="list-group-item p-3">
                                        <div class="row align-items-start">
                                            <div class="col-md-2 mb-8pt mb-md-0">
                                                <div class="media align-items-left">
                                                    <div class="d-flex flex-column media-body media-middle">
                                                        <span
                                                        class="card-title">Nama User</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col mb-8pt mb-md-0">
                                                <input name="name" value="<?= $row->name; ?>" type="text" class="form-control" placeholder="Masukan Nama User" required/>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col align-items-right">
                                <button type="submit" class="btn btn-dark">Update</button>
                            </div>
                        </div>

                    </form>

                    <?php endforeach;?>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->