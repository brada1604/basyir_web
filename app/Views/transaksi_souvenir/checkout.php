<style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>

<div class="container">
    <main>
        <div class="py-5 text-center">
            <img class="d-block mx-auto mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
            <h2>Checkout Form</h2>
            <p class="lead">Periksa keranjang belanjaan anda dengan baik dan benar.</p>
        </div>

        <div class="row g-5">
            <div class="col-md-5 col-lg-4 order-md-last">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-dark">Keranjang</span>
                </h4>
                <ul class="list-group mb-3">
                    <?php foreach ($cart as $item) : ?>
                        <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                                <h6 class="my-0"><?= $item['namabrg'] ?></h6>
                                <small class="text-muted"><?= "Rp " . number_format($item['harga'],2,',','.');?> x <?= $item['qty'] ?> Pcs
                                </small>
                            </div>
                            <span class="text-muted"><?= "Rp " . number_format($item['subtotal'],2,',','.');?></span>
                        </li>
                    <?php endforeach ?>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total</span>
                        <strong><?= "Rp " . number_format(array_sum(array_column($cart, 'subtotal')),2,',','.');?></strong>
                    </li>
                </ul>
                <a href="/souvenir"><button type="submit" class="btn btn-secondary">Ubah Keranjang</button></a>
            </div>
            <div class="col-md-7 col-lg-8">
                <h4 class="mb-3">Info Pembeli</h4>
                <form action="/checkout_souvenir/save" method="post">
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="nama" class="form-label">Nama Pembeli</label>
                            <input type="text" class="form-control" name="nama" value="<?= old('nama') ?>" required>
                        </div>

                        <div class="col-12">
                            <label for="hp" class="form-label">HP</label>
                            <input type="number" class="form-control" name="hp" value="<?= old('hp') ?>" required maxlength="15">
                        </div>

                        <div class="col-12">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" name="alamat" required>
                        </div>

                        <div class="col-12">
                            <label for="kecamatan" class="form-label">Kecamatan</label>
                            <input type="text" class="form-control" name="kecamatan" required>
                        </div>

                        <div class="col-12">
                            <label for="kota" class="form-label">Kota</label>
                            <input type="text" class="form-control" name="kota" required>
                        </div>
                    </div>

                    <hr class="my-4">

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="kesadaran" required>
                        <label class="form-check-label" for="kesadaran">Dengan ini saya menyatakan mengisi data dengan benar.</label>
                    </div>

                    <hr class="my-4">

                    <button class="w-100 btn btn-primary btn-lg" type="submit">Checkout</button>
                </form>
            </div>
        </div>
    </main>
</div>