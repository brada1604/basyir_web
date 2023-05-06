<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $title;?></title>
</head>
<body>
	<table border="1" width="100%">
		<tr align="center">
			<td colspan="3">HEADER</td>
		</tr>
		<tr align="center">
			<td><a href="<?php echo base_url('/home');?>"> HOME </a></td>
			<td><a href="<?php echo base_url('/info');?>"> INFO </a></td>
			<td><a href="<?php echo base_url('/mahasiswa');?>"> MAHASISWA </a></td>
		</tr>
		<tr align="center">
			<td colspan="3">
				<?= $this->renderSection('content') ?>
			</td>
		</tr>
		<tr align="center">
			<td colspan="3">FOOTER</td>
		</tr>
	</table>
</body>
</html>