                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Edit Kutipan</h1>

                    <?php
                    foreach ($getRencanaKegiatan as $row) :
                    ?>

                        <form action="<?= base_url(); ?>/rencana_kegiatan/update" method="post" enctype="multipart/form-data">

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
                                                    <input name="id_user" type="text" class="form-control" value="<?= $row->id_user; ?>" readonly />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="list-group-item p-3">
                                            <div class="row align-items-start">
                                                <div class="col-md-2 mb-8pt mb-md-0">
                                                    <div class="media align-items-left">
                                                        <div class="d-flex flex-column media-body media-middle">
                                                            <span class="card-title">id rencana kegiatan</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col mb-8pt mb-md-0">
                                                    <input name="id_rencana_kegiatan" type="text" class="form-control" value="<?= $row->id_rencana_kegiatan; ?>" placeholder="Masukan ID Rencana Kegiatan" readonly />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="list-group-item p-3">
                                            <div class="row align-items-start">
                                                <div class="col-md-2 mb-8pt mb-md-0">
                                                    <div class="media align-items-left">
                                                        <div class="d-flex flex-column media-body media-middle">
                                                            <span class="card-title">id amalan yaumi</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col mb-8pt mb-md-0">
                                                    <textarea name="id_amalan_yaumi" class="form-control" required><?= $row->id_amalan_yaumi; ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col align-items-right">
                                    <button type="submit" class="btn btn-dark">Simpan</button>
                                </div>
                            </div>

                        </form>

                    <?php endforeach; ?>

                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->