		<tr align="center">
            <td colspan="5">

				<?php
					foreach($getMahasiswa as $row):
				?>

					<form action="/mahasiswa/update" method="post">		
						<table>
							<input type="hidden" name="id" value="<?= $row->id;?>">
							<tr>
								<td>nim</td>
								<td><input type="text" name="nim" value="<?= $row->nim;?>" readonly></td>					
							</tr>	
							<tr>
								<td>nama</td>
								<td><input type="text" name="nama" value="<?= $row->nama;?>"></td>					
							</tr>	
							<tr>
								<td>umur</td>
								<td><input type="number" name="umur" value="<?= $row->umur;?>"></td>					
							</tr>	
							<tr>
								<td></td>
								<td><input type="submit" value="Update"></td>					
							</tr>				
						</table>
					</form>

				<?php endforeach;?>

			</td>
        </tr>