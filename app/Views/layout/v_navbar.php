		<!-- <tr align="center">
			<td> -->
<!-- 			<td><a href="<?php echo base_url('/home');?>"> HOME </a></td>
			<td><a href="<?php echo base_url('/info');?>"> INFO </a></td>
			<td><a href="<?php echo base_url('/mahasiswa');?>"> MAHASISWA </a></td>
			<td><a href="<?php echo base_url('/pegawai');?>"> PEGAWAI </a></td>
			<td><a href="<?php echo base_url('/logout');?>"> LOGOUT </a></td> -->
			<!-- <nav class="navbar navbar-expand-lg bg-body-tertiary">
			  <div class="container-fluid">
			    <a class="navbar-brand" href="#">Siakad</a>
			    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			      <span class="navbar-toggler-icon"></span>
			    </button>
			    <div class="collapse navbar-collapse" id="navbarSupportedContent">
			      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
			        <li class="nav-item">
			          <a class="nav-link active" aria-current="page" href="<?php echo base_url('/home');?>">HOME</a>
			        </li>
			        <li class="nav-item">
			          <a class="nav-link" href="<?php echo base_url('/info');?>">INFO</a>
			        </li>
			        <li class="nav-item">
			          <a class="nav-link" href="<?php echo base_url('/mahasiswa');?>">MAHASISWA</a>
			        </li>
			        <li class="nav-item">
			          <a class="nav-link" href="<?php echo base_url('/pegawai');?>">PEGAWAI</a>
			        </li>
			        <li class="nav-item">
			          <a class="nav-link" href="<?php echo base_url('/logout');?>">LOGOUT</a>
			        </li> -->
			        <!-- <li class="nav-item dropdown">
			          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
			            Dropdown
			          </a>
			          <ul class="dropdown-menu">
			            <li><a class="dropdown-item" href="#">Action</a></li>
			            <li><a class="dropdown-item" href="#">Another action</a></li>
			            <li><hr class="dropdown-divider"></li>
			            <li><a class="dropdown-item" href="#">Something else here</a></li>
			          </ul>
			        </li> -->
			        <!-- <li class="nav-item">
			          <a class="nav-link disabled">Disabled</a>
			        </li> -->
			      <!-- </ul> -->
			      <!-- <form class="d-flex" role="search">
			        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
			        <button class="btn btn-outline-success" type="submit">Search</button>
			      </form> -->
			    <!-- </div>
			  </div>
			</nav>
		</td>
		</tr> -->

<?php 
$request = service('request');
$segment1 = $request->uri->getSegment(1);
?>

<!-- <nav class="navbar navbar-expand-lg bg-body-tertiary">
	<div class="container-fluid">
		<a class="navbar-brand" href="#">Siakad</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
				<li class="nav-item">
					<a class="nav-link <?php echo $segment1 == "home" ? "active" : "";?>" aria-current="page" href="<?php echo base_url('/home');?>">HOME</a>
				</li>
				<li class="nav-item">
					<a class="nav-link <?php echo $segment1 == "info" ? "active" : "";?>" href="<?php echo base_url('/info');?>">INFO</a>
				</li>
				<li class="nav-item">
					<a class="nav-link <?php echo $segment1 == "mahasiswa" ? "active" : "";?>" href="<?php echo base_url('/mahasiswa');?>">MAHASISWA</a>
				</li>
				<li class="nav-item">
					<a class="nav-link <?php echo $segment1 == "pegawai" ? "active" : "";?>" href="<?php echo base_url('/pegawai');?>">PEGAWAI</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url('/logout');?>">LOGOUT</a>
				</li>
			</ul>
		</div>
	</div>
</nav> -->

  <div class="container">
    <nav class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
      <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
        TokoPaedi
      </a>

      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
<!--         <li><a href="#" class="nav-link px-2 link-secondary">Home</a></li>
        <li><a href="#" class="nav-link px-2 link-dark">Features</a></li>
        <li><a href="#" class="nav-link px-2 link-dark">Pricing</a></li>
        <li><a href="#" class="nav-link px-2 link-dark">FAQs</a></li>
        <li><a href="#" class="nav-link px-2 link-dark">About</a></li> -->

        <li class="nav-item">
			<a class="nav-link px-2 <?php echo $segment1 == "home" ? "link-secondary" : "link-dark";?>" aria-current="page" href="<?php echo base_url('/home');?>">HOME</a>
		</li>
		<li class="nav-item">
			<a class="nav-link px-2 <?php echo $segment1 == "info" ? "link-secondary" : "link-dark";?>" href="<?php echo base_url('/info');?>">INFO</a>
		<li class="nav-item">
			<a class="nav-link px-2 <?php echo $segment1 == "mahasiswa" ? "link-secondary" : "link-dark";?>" href="<?php echo base_url('/mahasiswa');?>">MAHASISWA</a>
		</li>
		<li class="nav-item">
			<a class="nav-link px-2 <?php echo $segment1 == "pegawai" ? "link-secondary" : "link-dark";?>" href="<?php echo base_url('/pegawai');?>">PEGAWAI</a>
		</li>
		<li class="nav-item">
			<a class="nav-link px-2 <?php echo $segment1 == "pegawai" ? "link-secondary" : "link-dark";?>" href="<?php echo base_url('/souvenir_master');?>">SOUVENIR</a>
		</li>
      </ul>

      <div class="col-md-3 text-end">
        <a href="<?php echo base_url('/logout');?>"><button type="button" class="btn btn-outline-dark me-2">LOGOUT</button></a>
        <!-- <button type="button" class="btn btn-primary">Sign-up</button> -->
      </div>
    </nav>
  </div>




