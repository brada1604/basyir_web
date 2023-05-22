<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title?></title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url();?>/assets/assets-admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url();?>/assets/assets-admin/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary" style="background-image: url('assets/images/Basyir madinah.png');"></div>>

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
                            <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image" style="background-image: url('assets/images/Basyir1.png);"></div> -->
                            <div class="col-lg-6 mx-auto">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Register User</h1>
                                        <?php if(session()->getFlashdata('msg')):?>
                                            <label style="color: red;"> <?= session()->getFlashdata('msg') ?> </label>
                                        <?php endif;?>
                                    </div>
                                    <form action="<?= base_url(); ?>user/register_user/save" method="post" enctype="multipart/form-data">

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

                                    <!-- ROLE -->
                                    <div class="list-group-item p-3">
                                        <div class="row align-items-start">
                                            <div class="col-md-2 mb-8pt mb-md-0">
                                                <div class="media align-items-left">
                                                    <div class="d-flex flex-column media-body media-middle">
                                                        <span class="card-title">Role User</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col mb-8pt mb-md-0">
                                                <select class="form-control" name="role" required>
                                                    <option value="">-- Pilih Role --</option>
                                                    <option value="2">Kontributor</option>
                                                    <option value="3">Kreator</option>
                                                    <option value="4">User</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- NAMA -->
                                    <div class="list-group-item p-3">
                                        <div class="row align-items-start">
                                            <div class="col-md-2 mb-8pt mb-md-0">
                                                <div class="media align-items-left">
                                                    <div class="d-flex flex-column media-body media-middle">
                                                        <span class="card-title">Nama User</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col mb-8pt mb-md-0">
                                                <input name="name" value="<?= old('name') ?>" type="text" class="form-control" placeholder="Masukan Nama User" required/>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- EMAIL -->
                                    <div class="list-group-item p-3">
                                        <div class="row align-items-start">
                                            <div class="col-md-2 mb-8pt mb-md-0">
                                                <div class="media align-items-left">
                                                    <div class="d-flex flex-column media-body media-middle">
                                                        <span class="card-title">Email User</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col mb-8pt mb-md-0">
                                                <input name="email" value="<?= old('email') ?>" type="email" class="form-control" placeholder="Masukan Email User" required/>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- PASSWORD -->
                                    <div class="list-group-item p-3">
                                        <div class="row align-items-start">
                                            <div class="col-md-2 mb-8pt mb-md-0">
                                                <div class="media align-items-left">
                                                    <div class="d-flex flex-column media-body media-middle">
                                                        <span
                                                        class="card-title">Password User</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col mb-8pt mb-md-0">
                                                <input name="password" value="<?= old('password') ?>" type="password" class="form-control" placeholder="Masukan Password User" required/>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- PASSWORD -->
                                    <div class="list-group-item p-3">
                                        <div class="row align-items-start">
                                            <div class="col-md-2 mb-8pt mb-md-0">
                                                <div class="media align-items-left">
                                                    <div class="d-flex flex-column media-body media-middle">
                                                        <span
                                                        class="card-title">Confirm Password User</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col mb-8pt mb-md-0">
                                                <input name="confirm_password" value="<?= old('confirm_password') ?>" type="password" class="form-control" placeholder="Masukan Password User" required/>
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
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url();?>/assets/assets-admin/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url();?>/assets/assets-admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url();?>/assets/assets-admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url();?>/assets/assets-admin/js/sb-admin-2.min.js"></script>

</body>

</html>