            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            DATA BERITA
                        </div>
                        <div class="card-body">
                            <a class="tombol" href="<?php echo base_url('/berita/add')?>">+ Tambah Data Baru</a>
                            <table class="table table-bordered table-striped table-hover" id="myTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID User</th>
                                        <th>Judul</th>
                                        <th>Ringkasan</th>
                                        <th>Konten</th>
                                        <th>Status</th>
                                        <th>Video</th>
                                        <th>Gambar</th>
                                        <th width="200">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php 
                                        $nomor = 1; 
                                        foreach($getBerita as $row):
                                    ?>

                                        <tr>
                                            <td><?= $nomor++; ?></td>
                                            <td><?= $row->id_user;?></td>
                                            <td><?= $row->judul_berita;?></td>
                                            <td><?= $row->ringkasan_berita;?></td>
                                            <td><?= $row->konten_berita;?></td>
                                            <td><?= $row->status_berita;?></td>
                                            <td><?= $row->video_berita;?></td>
                                            <td><img clas="bd-placeholder-img card-img-top" width="100" height="100" src="<?=base_url($row->gambar_berita);?>"></td>
                                            <td>
                                                <a class="edit" class="btn btn-warning" href="/berita/edit/<?= $row->id_berita;?>"><button type="button" class="btn btn-warning">Edit</button></a>
                                                <a class="hapus" class="btn btn-danger" href="/berita/delete/<?= $row->id_berita;?>"><button type="button" class="btn btn-danger">Hapus</button></a>
                                                <!-- <a class="detail" class="btn btn-info" href="/pegawai/<?= $row->id_berita;?>"><button type="button" class="btn btn-info">Detail</button></a>                      -->
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

