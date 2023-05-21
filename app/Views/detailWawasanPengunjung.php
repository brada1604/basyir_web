<!DOCTYPE html>
<html>
<head>
  <title>Detail Wawasan Keislaman</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <style>
    .header {
      background-color: #629C87;
      color: #fff;
      padding: 20px;
    }

    .footer {
      background-color: #f8f9fa;
      padding: 20px;
      text-align: center;
    }
  </style>
</head>
<body>
  <div class="header">
    <h1 class="text-center">Basyir - Booster Your Iman</h1>
  </div>
  <?php
		foreach($getWawasanDepan as $gwd):
	?>
  <div class="container text-center">
    <h1 class="mt-4 mb-4"><?= $gwd->judul_wawasan_islami;?></h1>
    <p class="lead">Diposting pada <?=$gwd->created_at;?></p>
    <img class="w-full" src="<?=base_url($gwd->gambar_wawasan_islami);?>" alt="blog" style="width:270px;height:480px";>
    <br>
    <br>
    <p class="mt-4"><?= $gwd->konten_wawasan_islami;?></p>
    </br>
    </br>
    <a href="/" class="btn gradient-btn-2 mt-4">Kembali</a>
  </div>
  <?php endforeach;?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
<div class="footer">
    <p>Basyir - Booster Your Iman - 2023</p>
  </div>
</html>
<!DOCTYPE html>
<html lang="en">