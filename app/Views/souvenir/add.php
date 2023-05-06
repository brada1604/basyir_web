<div class="container">
<form action="<?= base_url(); ?>/souvenir/save" method="post" enctype="multipart/form-data">

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
                                    <span
                                    class="card-title">Nama Barang</span>
                                </div>
                            </div>
                        </div>
                        <div class="col mb-8pt mb-md-0">
                            <input name="namabrg" type="text" class="form-control" placeholder="Nugget Kanzler" required/>
                        </div>
                    </div>
                </div>

                <div class="list-group-item p-3">
                    <div class="row align-items-start">
                        <div class="col-md-4 mb-8pt mb-md-0">
                            <div class="media align-items-left">
                                <div class="d-flex flex-column media-body media-middle">
                                    <span
                                    class="card-title">Harga Barang</span>
                                </div>
                            </div>
                        </div>
                        <div class="col mb-8pt mb-md-0">
                            <input name="harga" type="number" class="form-control" placeholder="10000" required/>
                        </div>
                    </div>
                </div>

                <div class="list-group-item p-3">
                    <div class="row align-items-start">
                        <div class="col-md-4 mb-8pt mb-md-0">
                            <div class="media align-items-left">
                                <div class="d-flex flex-column media-body media-middle">
                                    <span
                                    class="card-title">Diskon</span>
                                </div>
                            </div>
                        </div>
                        <div class="col mb-8pt mb-md-0">
                            <input name="diskon" type="number" class="form-control" placeholder="5%" required/>
                        </div>
                    </div>
                </div>

                <div class="list-group-item p-3">
                    <div class="row align-items-start">
                        <div class="col-md-4 mb-8pt mb-md-0">
                            <div class="media align-items-left">
                                <div class="d-flex flex-column media-body media-middle">
                                    <span
                                    class="card-title">Stok</span>
                                </div>
                            </div>
                        </div>
                        <div class="col mb-8pt mb-md-0">
                            <input name="stok" type="number" class="form-control" placeholder="10" required/>
                        </div>
                    </div>
                </div>

                <div class="list-group-item p-3">
                    <div class="row align-items-start">
                        <div class="col-md-4 mb-8pt mb-md-0">
                            <div class="media align-items-left">
                                <div class="d-flex flex-column media-body media-middle">
                                    <span
                                    class="card-title">Gambar</span>
                                </div>
                            </div>
                        </div>
                        <div class="col mb-8pt mb-md-0">
                            <input type="file" id="image_file" name="image_file" class="form-control image_file" accept=".jpg,.png,.jpeg,.gif" required/>
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