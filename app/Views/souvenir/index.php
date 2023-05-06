            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            DATA SOUVENIR
                        </div>
                        <div class="card-body">
                            <a class="tombol" href="<?php echo base_url('/souvenir/add')?>">+ Tambah Data Baru</a>
                            <table class="table table-bordered table-striped table-hover" id="myTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Harga</th>
                                        <th>Diskon</th>
                                        <th>Stok</th>
                                        <th>File</th>
                                        <th width="200">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php 
                                        $nomor = 1; 
                                        foreach($getSouvenir as $row):
                                    ?>

                                        <tr>
                                            <td><?= $nomor++; ?></td>
                                            <td><?= $row->namabrg;?></td>
                                            <td><?= "Rp " . number_format($row->harga,2,',','.');?></td>
                                            <td><?= $row->diskon*100;?>%</td>
                                            <td><?= $row->stok;?></td>
                                            <td><img clas="bd-placeholder-img card-img-top" width="100" height="100" src="<?=base_url($row->namafile);?>"></td>
                                            <td>
                                                <a class="edit" class="btn btn-warning" href="/souvenir/edit/<?= $row->idbrg;?>"><button type="button" class="btn btn-warning">Edit</button></a>
                                                <a class="hapus" class="btn btn-danger" href="/souvenir/delete/<?= $row->idbrg;?>"><button type="button" class="btn btn-danger">Hapus</button></a>
                                                <!-- <a class="detail" class="btn btn-info" href="/pegawai/<?= $row->idbrg;?>"><button type="button" class="btn btn-info">Detail</button></a>                      -->
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>