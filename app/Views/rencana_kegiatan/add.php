                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tambah Rencana Kegiatan</h1>

                    <form action="<?= base_url(); ?>/rencana_kegiatan/save" method="post" enctype="multipart/form-data">

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
                                                <input name="id_user" type="text" class="form-control" value="<?= $session->get('id') ?>" placeholder="<?= $session->get('name'); ?> - <?= $session->get('email'); ?>" readonly />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="list-group-item p-3">
                                        <div class="row align-items-start">
                                            <div class="col-md-2 mb-8pt mb-md-0">
                                                <div class="media align-items-left">
                                                    <div class="d-flex flex-column media-body media-middle">
                                                        <span
                                                        class="card-title">Amalan Yaumi</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col mb-8pt mb-md-0">
                                                <select class="form-control" name="id_amalan_yaumi" required>
                                                    <option value="">-- Pilih Amalan yaumi --</option>
                                                    <?php
                                                        foreach ($getAmalanYaumi as $row) :
                                                    ?>
                                                            <option value="<?= $row->id_amalan_yaumi; ?>"><?= $row->judul_amalan_yaumi; ?></option>

                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="list-group-item p-3">
                                        <div class="row align-items-start">
                                            <div class="col-md-2 mb-8pt mb-md-0">
                                                <div class="media align-items-left">
                                                    <div class="d-flex flex-column media-body media-middle">
                                                        <span class="card-title">Keterangan Kegiatan</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col mb-8pt mb-md-0">
                                                <input name="keterangan_kegiatan" type="text" class="form-control" placeholder="Masukan Kegiatan yang akan kamu lakukan" />
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col align-items-right">
                                <button type="submit" class="btn btn-dark">Simpan</button>
                                <a class="btn btn-outline-secondary" href="/rencana_kegiatan_master">Kembali</a>
                            </div>
                        </div>

                    </form>

                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->