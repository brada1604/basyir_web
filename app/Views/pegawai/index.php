        <!-- <tr align="center">
            <td colspan="5">

                <a class="tombol" href="<?php echo base_url('/pegawai/add')?>">+ Tambah Data Baru</a>
                <form action="/pegawai/search" method="post">
                    <table>
                        <tr>
                            <td>nama</td>
                            <td><input type="text" name="nama"></td>    
                            <td><input type="submit" value="Search"></td>                
                        </tr>    
                    </table>
                </form>
                <table border="1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nip</th>
                            <th>Nama</th>
                            <th>Gender</th>
                            <th>Telepon</th>
                            <th>Email</th>
                            <th>Pendidikan</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $nomor = 1; 
                        foreach($getPegawai as $row):
                    ?>
                        <tr>
                            <td><?= $nomor++; ?></td>
                            <td><?= $row->nip;?></td>
                            <td><?= $row->nama;?></td>
                            <td><?= $row->gender;?></td>
                            <td><?= $row->telp;?></td>
                            <td><?= $row->email;?></td>
                            <td><?= $row->pendidikan;?></td>
                            <td>
                                <a class="edit" href="/pegawai/edit/<?= $row->id;?>">Edit</a> |
                                <a class="hapus" href="/pegawai/delete/<?= $row->id;?>">Hapus</a> |                     
                                <a class="detail" href="/pegawai/<?= $row->id;?>">Detail</a>                   
                            </td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>

            </td>
        </tr> -->



        <!-- <div class="container" style="margin-top: 80px"> -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            DATA PEGAWAI
                        </div>
                        <div class="card-body">
                            <a class="tombol" href="<?php echo base_url('/pegawai/add')?>">+ Tambah Data Baru</a>
                            <table class="table table-bordered table-striped table-hover" id="myTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nip</th>
                                        <th>Nama</th>
                                        <th>Gender</th>
                                        <th>Telepon</th>
                                        <th>Email</th>
                                        <th>Pendidikan</th>
                                        <th width="200">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php 
                                        $nomor = 1; 
                                        foreach($getPegawai as $row):
                                    ?>

                                        <tr>
                                            <td><?= $nomor++; ?></td>
                                            <td><?= $row->nip;?></td>
                                            <td><?= $row->nama;?></td>
                                            <td><?= $row->gender;?></td>
                                            <td><?= $row->telp;?></td>
                                            <td><?= $row->email;?></td>
                                            <td><?= $row->pendidikan;?></td>
                                            <td>
                                                <a class="edit" class="btn btn-warning" href="/pegawai/edit/<?= $row->id;?>"><button type="button" class="btn btn-warning">Edit</button></a>
                                                <a class="hapus" class="btn btn-danger" href="/pegawai/delete/<?= $row->id;?>"><button type="button" class="btn btn-danger">Hapus</button></a>
                                                <a class="detail" class="btn btn-info" href="/pegawai/<?= $row->id;?>"><button type="button" class="btn btn-info">Detail</button></a>                     
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        <!-- </div> -->
