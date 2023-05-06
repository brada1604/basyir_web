<?= $this->extend('layout/v_template') ?>

<?= $this->section('content') ?>

    <a class="tombol" href="<?php echo base_url('/mahasiswa/add')?>">+ Tambah Data Baru</a>
    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Nim</th>
                <th>Nama</th>
                <th>Umur</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $nomor = 1; 
            foreach($getMahasiswa as $row):
        ?>
            <tr>
                <td><?= $nomor++; ?></td>
                <td><?= $row->nim;?></td>
                <td><?= $row->nama;?></td>
                <td><?= $row->umur;?></td>
                <td>
                    <a class="edit" href="/mahasiswa/edit/<?= $row->id;?>">Edit</a> |
                    <a class="hapus" href="/mahasiswa/delete/<?= $row->id;?>">Hapus</a> |                     
                    <a class="hapus" href="/mahasiswa/<?= $row->id;?>">Detail</a>                   
                </td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>

<?= $this->endSection() ?>