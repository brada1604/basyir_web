                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tambah Target Notifikasi</h1>
                    
                    <form action="<?= base_url(); ?>/notifikasi/save_target" method="post" enctype="multipart/form-data">

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
                                            <!-- <div class="col-md-2 mb-8pt mb-md-0">
                                                <div class="media align-items-left">
                                                    <div class="d-flex flex-column media-body media-middle">
                                                        <span class="card-title">ID Notifikasi</span>
                                                    </div>
                                                </div>
                                            </div> -->
                                            <!-- <div class="col mb-8pt mb-md-0"> -->
                                                <input name="id_notifikasi" value="<?= $id_notifikasi ?>" type="hidden" class="form-control" placeholder="Masukan ID Notifikasi" readonly/>
                                            <!-- </div> -->
                                        <!-- </div> -->
                                    <!-- </div> -->

                                    <div class="list-group-item p-3">
                                        <div class="row align-items-start">
                                            <div class="col-md-2 mb-8pt mb-md-0">
                                                <div class="media align-items-left">
                                                    <div class="d-flex flex-column media-body media-middle">
                                                        <span
                                                        class="card-title">Target User</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col mb-8pt mb-md-0">
                                                <input type="checkbox" name="target[]" value="1"> Administrator <br>
                                                <input type="checkbox" name="target[]" value="2"> Kontributor <br>
                                                <input type="checkbox" name="target[]" value="3"> Kreator <br>
                                                <input type="checkbox" name="target[]" value="4"> User 
                                            </div>
                                        </div>
                                    </div>

                                    <div class="list-group-item p-3">
                                        <div class="row align-items-start">
                                            <div class="col-md-2 mb-8pt mb-md-0">
                                                <div class="media align-items-left">
                                                    <div class="d-flex flex-column media-body media-middle">
                                                        <span
                                                        class="card-title">Spesifik User</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col mb-8pt mb-md-0">
                                                <select class="form-control" name="id_user">
                                                    <option value="">-- Pilih User --</option>
                                                    <?php
                                                        foreach ($getUserAll as $row) :
                                                    ?>
                                                        <option value="<?= $row->id; ?>"><?= $row->email; ?> - <?= $row->name; ?></option>
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
                                                        <span
                                                        class="card-title">Jadwal</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col mb-8pt mb-md-0">
                                                <select class="form-control" id="jadwal" name="jadwal" required>
                                                    <option value="">-- Pilih Jadwal --</option>
                                                    <option value="now">Sekarang</option>
                                                    <option value="jadwalkan">Dijadwalkan</option>
                                                </select>
                                                <br>
                                                <input type="datetime-local" id="jadwal_notifikasi" name="jadwal_notifikasi" value="<?= old('jadwal_notifikasi') ?>" type="text" class="form-control" placeholder="Masukan Link Notifikasi" />
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col align-items-right">
                                <button type="submit" class="btn btn-dark">Simpan</button>
                                <a class="btn btn-outline-secondary" href="/notifikasi/detail/<?= $id_notifikasi ?>">Kembali</a>
                            </div>
                        </div>

                    </form>  

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->


            