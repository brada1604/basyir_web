        <tr align="center">
            <td colspan="5">

				<h3>Detail Data Pegawai</h3>



				<!-- <a class="tombol" href="<?php echo base_url('/mahasiswa')?>">Data Pegawai</a> -->

				<?php
					foreach($getPegawai as $row):
				?>
					<p>Nip Pegawai  : <?= $row->nip;?></p>
					<p>Nama Pegawai : <?= $row->nama;?></p>
					<p>Gender Pegawai : <?= $row->gender;?></p>
					<p>Telepon Pegawai : <?= $row->telp;?></p>
					<p>Email Pegawai : <?= $row->email;?></p>
					<p>Pendidikan Pegawai : <?= $row->pendidikan;?></p>
				<?php endforeach;?>

            </td>
        </tr>