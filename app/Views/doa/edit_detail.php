                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Edit Doa Detail</h1>

                    <?php
                        foreach($getDoaDetail as $row):
                    ?>

                    <form action="<?= base_url(); ?>/doa/update_detail" method="post" enctype="multipart/form-data">

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
                                    <!-- <div class="list-group-item p-3"> -->
                                        <!-- <div class="row align-items-start"> -->
                                            <!-- <div class="col-md-2 mb-8pt mb-md-0"> -->
                                                <!-- <div class="media align-items-left"> -->
                                                    <!-- <div class="d-flex flex-column media-body media-middle"> -->
                                                        <!-- <span class="card-title">ID Doa Detail</span> -->
                                                    <!-- </div> -->
                                                <!-- </div> -->
                                            <!-- </div> -->
                                            <!-- <div class="col mb-8pt mb-md-0"> -->
                                                <input name="id_doa_detail" type="hidden" class="form-control" value="<?= $row->id_doa_detail; ?>"  readonly/>
                                            <!-- </div> -->
                                        <!-- </div> -->
                                    <!-- </div> -->

                                    <!-- <div class="list-group-item p-3"> -->
                                        <!-- <div class="row align-items-start"> -->
                                            <!-- <div class="col-md-2 mb-8pt mb-md-0"> -->
                                                <!-- <div class="media align-items-left"> -->
                                                    <!-- <div class="d-flex flex-column media-body media-middle"> -->
                                                        <!-- <span class="card-title">ID Doa</span> -->
                                                    <!-- </div> -->
                                                <!-- </div> -->
                                            <!-- </div> -->
                                            <!-- <div class="col mb-8pt mb-md-0"> -->
                                                <input name="id_doa" type="hidden" class="form-control" value="<?= $row->id_doa; ?>"  readonly/>
                                            <!-- </div> -->
                                        <!-- </div> -->
                                    <!-- </div> -->

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
                                                <textarea name="konten_doa" class="form-control" required><?= $row->konten_doa; ?></textarea>
                                            </div>
                                        </div>
                                    </div>

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
                                                <textarea name="konten_latin_doa" class="form-control" required><?= $row->konten_latin_doa; ?></textarea>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col align-items-right">
                                <button type="submit" class="btn btn-dark">Update</button>
                                <a class="btn btn-outline-secondary" href="/doa/detail/<?= $row->id_doa ?>">Kembali</a>
                            </div>
                        </div>

                    </form>

                    <?php endforeach;?>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->