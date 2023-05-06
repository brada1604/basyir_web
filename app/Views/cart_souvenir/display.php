<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                KERANJANG DATA SOUVENIR
            </div>
            <div class="card-body">
                <a href="/souvenir"><button type="submit" class="btn btn-secondary">Ubah Keranjang</button></a>
                <?php if (session()->get('cart') != NULL): ?>
                    <a href="/checkout_souvenir"><button type="submit" class="btn btn-secondary">Checkout</button></a>
                    <a href="/cart_souvenir/clear"><button type="submit" class="btn btn-secondary">Clear</button></a>
                <?php endif ?>
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Jumlah jual</th>
                            <th>Harga Diskon</th>
                            <th>Harga Awal</th>
                            <th>Diskon</th>
                            <th>Subtotal</th>
                            <th width="200">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php 
                            $nomor = 1; 
                            foreach($cart as $item):
                        ?>

                            <tr>
                                <td><?= $nomor++; ?></td>
                                <td><?= $item['namabrg'] ?></td>
                                <td><?= $item['qty'] ?></td>
                                <td><?= "Rp " . number_format($item['harga'],2,',','.');?></td>
                                <td>
                                    <?php 
                                    foreach($getSouvenir as $roww):

                                        if ($item['idbrg'] == $roww->idbrg) {
                                         echo "Rp " . number_format($roww->harga,2,',','.');
                                     }
                                     ?>
                                     <?php endforeach;?>
                                </td>
                                <td>
                                    <?php 
                                    foreach($getSouvenir as $row):

                                        if ($item['idbrg'] == $row->idbrg) {
                                         echo "Diskon ".$row->diskon*100; echo "%";
                                     }
                                     ?>
                                 <?php endforeach;?>
                                </td>
                                <td><?= "Rp " . number_format($item['subtotal'],2,',','.');?></td>
                                <td>
                                    <a class="hapus" class="btn btn-danger" href="/cart_souvenir/remove/<?= $item['idbrg'] ?>"><button type="button" class="btn btn-danger">Hapus</button></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                            <tr>
                                <td colspan="6">Total</td>
                                <td><?= "Rp " . number_format(array_sum(array_column($cart, 'subtotal')),2,',','.');?></td>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

