                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tambah Doa Detail</h1>
                    
                    <form action="<?= base_url(); ?>/doa/save_detail" method="post" enctype="multipart/form-data">

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
                                    
                                    <!-- ID DOA -->
                                    <!-- <div class="list-group-item p-3"> -->
                                        <!-- <div class="row align-items-start"> -->
                                            <!-- <div class="col-md-2 mb-8pt mb-md-0"> -->
                                                <!-- <div class="media align-items-left"> -->
                                                    <!-- <div class="d-flex flex-column media-body media-middle"> -->
                                                        <!-- <span -->
                                                        <!-- class="card-title">Id Doa</span> -->
                                                    <!-- </div> -->
                                                <!-- </div> -->
                                            <!-- </div> -->
                                            <!-- <div class="col mb-8pt mb-md-0"> -->
                                                <input name="id_doa" value="<?= $id_doa ?>" type="hidden" class="form-control" placeholder="Masukan Id Doa" readonly/>
                                            <!-- </div> -->
                                        <!-- </div> -->
                                    <!-- </div> -->

                                    <!-- KONTEN DOA -->
                                    <div class="list-group-item p-3">
                                        <div class="row align-items-start">
                                            <div class="col-md-2 mb-8pt mb-md-0">
                                                <div class="media align-items-left">
                                                    <div class="d-flex flex-column media-body media-middle">
                                                        <span
                                                        class="card-title">Konten Doa</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col mb-8pt mb-md-0">
                                                <textarea name="konten_doa" class="form-control" required><?= old('konten_doa') ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- KONTEN LATIN DOA -->
                                    <div class="list-group-item p-3">
                                        <div class="row align-items-start">
                                            <div class="col-md-2 mb-8pt mb-md-0">
                                                <div class="media align-items-left">
                                                    <div class="d-flex flex-column media-body media-middle">
                                                        <span
                                                        class="card-title">Konten Latin Doa</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col mb-8pt mb-md-0">
                                                <textarea name="konten_latin_doa" class="form-control" required><?= old('konten_latin_doa') ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col align-items-right">
                                <button type="submit" class="btn btn-dark">Simpan</button>
                                <a class="btn btn-outline-secondary" href="/doa/detail/<?= $id_doa ?>">Kembali</a>
                            </div>
                        </div>

                    </form>  

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->