                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tambah Kutipan Islami</h1>
                    
                    <form action="<?= base_url(); ?>/kutipan/save" method="post" enctype="multipart/form-data">

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
                                                <input name="id_user" type="text" class="form-control" value="<?= $session->get('id')?>" placeholder="<?= $session->get('name');?> - <?= $session->get('email');?>" readonly/>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- JUDUL KUTIPAN -->
                                    <div class="list-group-item p-3">
                                        <div class="row align-items-start">
                                            <div class="col-md-2 mb-8pt mb-md-0">
                                                <div class="media align-items-left">
                                                    <div class="d-flex flex-column media-body media-middle">
                                                        <span
                                                        class="card-title">Judul Kutipan Islami</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col mb-8pt mb-md-0">
                                                <input name="judul_wawasan_islami" value="<?= old('judul_kutipan') ?>" type="text" class="form-control" placeholder="Masukan Judul Kutipan Islami" required/>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- DESKIRPSI KUTIPAN -->
                                    <div class="list-group-item p-3">
                                        <div class="row align-items-start">
                                            <div class="col-md-2 mb-8pt mb-md-0">
                                                <div class="media align-items-left">
                                                    <div class="d-flex flex-column media-body media-middle">
                                                        <span
                                                        class="card-title">Deskripsi Islami</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col mb-8pt mb-md-0">
                                                <textarea name="ringkasan_wawasan_islami" class="form-control" required><?= old('deskripsi_kutipan') ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- SUMBER KUTIPAN -->
                                    <div class="list-group-item p-3">
                                        <div class="row align-items-start">
                                            <div class="col-md-2 mb-8pt mb-md-0">
                                                <div class="media align-items-left">
                                                    <div class="d-flex flex-column media-body media-middle">
                                                        <span
                                                        class="card-title">Sumber Kutipan Islami</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col mb-8pt mb-md-0">
                                                <textarea name="konten_wawasan_islami" id="editor1" required><?= old('sumber_kutipan') ?></textarea>
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

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->