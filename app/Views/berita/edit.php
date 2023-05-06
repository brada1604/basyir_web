<?php
$session = session();
?>

<?php
    foreach($getBerita as $row):
?>
<div class="container">
<form action="<?= base_url(); ?>/berita/update" method="post" enctype="multipart/form-data">

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
                        <div class="col-md-4 mb-8pt mb-md-0">
                            <div class="media align-items-left">
                                <div class="d-flex flex-column media-body media-middle">
                                    <span class="card-title">ID Berita</span>
                                </div>
                            </div>
                        </div>
                        <div class="col mb-8pt mb-md-0">
                            <input name="id_berita" type="text" class="form-control" value="<?= $row->id_berita; ?>"  readonly/>
                        </div>
                    </div>
                </div>

                <div class="list-group-item p-3">
                    <div class="row align-items-start">
                        <div class="col-md-4 mb-8pt mb-md-0">
                            <div class="media align-items-left">
                                <div class="d-flex flex-column media-body media-middle">
                                    <span class="card-title">ID User</span>
                                </div>
                            </div>
                        </div>
                        <div class="col mb-8pt mb-md-0">
                            <input name="id_user" type="text" class="form-control" value="<?= $row->id_user; ?>" readonly/>
                        </div>
                    </div>
                </div>

                <div class="list-group-item p-3">
                    <div class="row align-items-start">
                        <div class="col-md-4 mb-8pt mb-md-0">
                            <div class="media align-items-left">
                                <div class="d-flex flex-column media-body media-middle">
                                    <span
                                    class="card-title">Judul Berita</span>
                                </div>
                            </div>
                        </div>
                        <div class="col mb-8pt mb-md-0">
                            <input name="judul_berita" type="text" class="form-control" value="<?= $row->judul_berita; ?>" placeholder="Masukan Judul Berita" required/>
                        </div>
                    </div>
                </div>

                <div class="list-group-item p-3">
                    <div class="row align-items-start">
                        <div class="col-md-4 mb-8pt mb-md-0">
                            <div class="media align-items-left">
                                <div class="d-flex flex-column media-body media-middle">
                                    <span
                                    class="card-title">Ringkasan Berita</span>
                                </div>
                            </div>
                        </div>
                        <div class="col mb-8pt mb-md-0">
                            <input name="ringkasan_berita" type="text" class="form-control" value="<?= $row->ringkasan_berita; ?>" placeholder="Masukan Ringkasan berita" required/>
                        </div>
                    </div>
                </div>

                <div class="list-group-item p-3">
                    <div class="row align-items-start">
                        <div class="col-md-4 mb-8pt mb-md-0">
                            <div class="media align-items-left">
                                <div class="d-flex flex-column media-body media-middle">
                                    <span
                                    class="card-title">Konten Berita</span>
                                </div>
                            </div>
                        </div>
                        <div class="col mb-8pt mb-md-0">
                            <input name="konten_berita" type="text" class="form-control" value="<?= $row->konten_berita; ?>" placeholder="Masukan Konten berita" required/>
                        </div>
                    </div>
                </div>

                <div class="list-group-item p-3">
                    <div class="row align-items-start">
                        <div class="col-md-4 mb-8pt mb-md-0">
                            <div class="media align-items-left">
                                <div class="d-flex flex-column media-body media-middle">
                                    <span
                                    class="card-title">Video Berita</span>
                                </div>
                            </div>
                        </div>
                        <div class="col mb-8pt mb-md-0">
                            <input name="video_berita" type="text" class="form-control" value="<?= $row->video_berita; ?>" placeholder="Masukan Link Video Berita"/>
                        </div>
                    </div>
                </div>        

                <div class="list-group-item p-3">
                    <div class="row align-items-start">
                        <div class="col-md-4 mb-8pt mb-md-0">
                            <div class="media align-items-left">
                                <div class="d-flex flex-column media-body media-middle">
                                    <span
                                    class="card-title">Gambar Berita</span>
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
            <button type="submit" class="btn btn-dark">Simpan</button>
        </div>
    </div>

</form>
</div>

<?php endforeach;?>