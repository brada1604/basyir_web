<div><br></div>

<div class="container">
    <div class="row  row-cols-md-4 g-4">
        <?php
            $nomor = 1; 
            foreach($getBarang as $row):
        ?>
            <div class="col">
                <div class="card shadow-sm">
                    <img clas="bd-placeholder-img card-img-top" width="100%" height="255" src="<?=base_url($row->file_barang);?>">
                    <div class="card-body">
                        <p class="card-text"><?= $row->nama_barang;?> <span><small><?= $row->stok_barang;?> pcs </small></span></p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <!-- <button type="button" class="btn btn-sm btn-outline-secondary">View</button> -->
                                <!-- BUTTON UNTUK TRIGGER KE ADD CART -->
                                <a href="/cart/add/<?= $row->id;?>/1"><button type="button" class="btn btn-sm btn-outline-secondary">Add to Cart</button></a>
                            </div>
                            <small class="text-muted"><?= "Rp " . number_format($row->harga_barang,2,',','.');?></small>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach;?>
    </div>
</div>

<br>

<div class="col-md-4">
    <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-dark">Keranjang</span>
    </h4>
    <ul class="list-group mb-3">
        <?php foreach ($cart as $item) : ?>
        <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
                <h6 class="my-0"><?= $item['nama_barang'] ?></h6>
                <small class="text-muted"><?= "Rp " . number_format($item['harga_barang'],2,',','.');?> x <?= $item['qty'] ?> Pcs
                    <form class="card p-2" action="/cart/update" method="post">
                        <div class="input-group">
                            <input type="hidden" name="id" value="<?= $item['id'] ?>">
                            <input type="number" min="1" class="form-control" name="qty" value="<?= $item['qty'] ?>">
                            <button type="submit" class="btn btn-secondary">Update</button>
                        </div>
                    </form>
                </small>
            </div>
            <span class="text-muted"><?= "Rp " . number_format($item['subtotal'],2,',','.');?></span>
            <a class="hapus" class="btn btn-danger" href="/cart/remove/<?= $item['id'] ?>"><button type="button" class="btn btn-danger">Hapus</button></a>
        </li>
        <?php endforeach ?>
        <li class="list-group-item d-flex justify-content-between">
            <span>Total</span>
            <strong><?= "Rp " . number_format(array_sum(array_column($cart, 'subtotal')),2,',','.');?></strong>
        </li>
    </ul>
    <?php if (session()->get('cart') != NULL): ?>
        <a href="/checkout"><button type="submit" class="btn btn-secondary">Checkout</button></a>
    <?php endif ?>
</div>