                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Edit Review</h1>

                    <?php
                        foreach($getReview as $row):
                    ?>

                    <form action="<?= base_url(); ?>/review/update" method="post" enctype="multipart/form-data">

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
                                                        <span class="card-title">ID Review</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col mb-8pt mb-md-0">
                                                <input name="id_review" type="text" class="form-control" value="<?= $row->id_review; ?>"  readonly/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="list-group-item p-3">
                                        <div class="row align-items-start">
                                            <div class="col-md-2 mb-8pt mb-md-0">
                                                <div class="media align-items-left">
                                                    <div class="d-flex flex-column media-body media-middle">
                                                        <span
                                                        class="card-title">Reviewer</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col mb-8pt mb-md-0">
                                                <input name="reviewer" type="text" class="form-control" value="<?= $row->reviewer; ?>" placeholder="Masukan Reviewer" required/>
                                            </div>
                                        </div>
                                    </div>   

                                    <div class="list-group-item p-3">
                                        <div class="row align-items-start">
                                            <div class="col-md-2 mb-8pt mb-md-0">
                                                <div class="media align-items-left">
                                                    <div class="d-flex flex-column media-body media-middle">
                                                        <span
                                                        class="card-title">Pekerjaan</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col mb-8pt mb-md-0">
                                                <input name="pekerjaan" value="<?= $row->pekerjaan; ?>" type="text" class="form-control" placeholder="Masukan Pekerjaan" required/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="list-group-item p-3">
                                        <div class="row align-items-start">
                                            <div class="col-md-2 mb-8pt mb-md-0">
                                                <div class="media align-items-left">
                                                    <div class="d-flex flex-column media-body media-middle">
                                                        <span
                                                        class="card-title">Bintang</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col mb-8pt mb-md-0">
                                                <select class="form-control" name="bintang" required>
                                                    <option value="1" <?= $row->bintang == 1 ? 'selected' : '';?>>Bintang 1</option>
                                                    <option value="2" <?= $row->bintang == 2 ? 'selected' : '';?>>Bintang 2</option>
                                                    <option value="3" <?= $row->bintang == 3 ? 'selected' : '';?>>Bintang 3</option>
                                                    <option value="4" <?= $row->bintang == 4 ? 'selected' : '';?>>Bintang 4</option>
                                                    <option value="5" <?= $row->bintang == 5 ? 'selected' : '';?>>Bintang 5</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="list-group-item p-3">
                                        <div class="row align-items-start">
                                            <div class="col-md-2 mb-8pt mb-md-0">
                                                <div class="media align-items-left">
                                                    <div class="d-flex flex-column media-body media-middle">
                                                        <span
                                                        class="card-title">Pesan</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col mb-8pt mb-md-0">
                                                <input name="pesan" value="<?= $row->pesan; ?>" type="text" class="form-control" placeholder="Masukan Pesan" required/>
                                            </div>
                                        </div>
                                    </div>  

                                    <div class="list-group-item p-3">
                                        <div class="row align-items-start">
                                            <div class="col-md-2 mb-8pt mb-md-0">
                                                <div class="media align-items-left">
                                                    <div class="d-flex flex-column media-body media-middle">
                                                        <span
                                                        class="card-title">Gambar Reviewer</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col mb-8pt mb-md-0">
                                                <input type="file" id="image_file" name="image_file" class="form-control image_file" accept=".jpg,.png,.jpeg,.gif"/>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col align-items-right">
                                <button type="submit" class="btn btn-dark">Update</button>
                                <a class="btn btn-outline-secondary" href="/review_master">Kembali</a>
                            </div>
                        </div>

                    </form>

                    <?php endforeach;?>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->