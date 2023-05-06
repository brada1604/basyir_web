<?php 
$request = service('request');
$segment1 = $request->uri->getSegment(1);
$session = session();
?>



  <div class="container">
    <nav class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
      <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
        TokoPaedi
      </a>

      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">


        <?php if($session->get('role') == 1) : ?>
	        <li class="nav-item">
				<a class="nav-link px-2 <?php echo $segment1 == "home" ? "link-secondary" : "link-dark";?>" aria-current="page" href="<?php echo base_url('/home');?>">Dashboard</a>
			</li>
        <?php endif;?>

        <?php if($session->get('role') == 2) : ?>
	        <li class="nav-item">
				<a class="nav-link px-2 <?php echo $segment1 == "home" ? "link-secondary" : "link-dark";?>" aria-current="page" href="<?php echo base_url('/home');?>">Dashboard</a>
			</li>
			<li class="nav-item">
				<a class="nav-link px-2 <?php echo $segment1 == "berita" ? "link-secondary" : "link-dark";?>" aria-current="page" href="<?php echo base_url('/berita_master');?>">Berita</a>
			</li>
        <?php endif;?>

        <?php if($session->get('role') == 3) : ?>
	        <li class="nav-item">
				<a class="nav-link px-2 <?php echo $segment1 == "home" ? "link-secondary" : "link-dark";?>" aria-current="page" href="<?php echo base_url('/home');?>">Dashboard</a>
			</li>
			<li class="nav-item">
				<a class="nav-link px-2 <?php echo $segment1 == "berita" ? "link-secondary" : "link-dark";?>" aria-current="page" href="<?php echo base_url('/berita');?>">Berita</a>
			</li>
			<li class="nav-item">
				<a class="nav-link px-2 <?php echo $segment1 == "wawasan_islami" ? "link-secondary" : "link-dark";?>" aria-current="page" href="<?php echo base_url('/wawasan_islami');?>">Wawasan Islami</a>
			</li>
        <?php endif;?>



		<!-- <li class="nav-item">
			<a class="nav-link px-2 <?php echo $segment1 == "info" ? "link-secondary" : "link-dark";?>" href="<?php echo base_url('/info');?>">INFO</a>
		<li class="nav-item">
			<a class="nav-link px-2 <?php echo $segment1 == "mahasiswa" ? "link-secondary" : "link-dark";?>" href="<?php echo base_url('/mahasiswa');?>">MAHASISWA</a>
		</li>
		<li class="nav-item">
			<a class="nav-link px-2 <?php echo $segment1 == "pegawai" ? "link-secondary" : "link-dark";?>" href="<?php echo base_url('/pegawai');?>">PEGAWAI</a>
		</li>
		<li class="nav-item">
			<a class="nav-link px-2 <?php echo $segment1 == "pegawai" ? "link-secondary" : "link-dark";?>" href="<?php echo base_url('/souvenir_master');?>">SOUVENIR</a>
		</li> -->
      </ul>

      <div class="col-md-3 text-end">
        <a href="<?php echo base_url('/logout');?>"><button type="button" class="btn btn-outline-dark me-2">LOGOUT</button></a>
        <!-- <button type="button" class="btn btn-primary">Sign-up</button> -->
      </div>
    </nav>
  </div>




