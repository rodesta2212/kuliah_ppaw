<?php
	@session_start();
	$pengguna=isset($_SESSION["user"]) ? $_SESSION["user"] : "";
	$nama_lengkap=isset($_SESSION["nama_lengkap"]) ? 
							$_SESSION["nama_lengkap"] : "";
	$akses=isset($_SESSION["akses"]) ? $_SESSION["akses"] : "beli";
	if($akses == "toko"){
		$nama_akses="Operator Toko";
	}else{
		$nama_akses="Pembeli";
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link href='./images/shop.png' rel='shortcut icon'> 
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Batik Mulyo</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/business-casual.min.css" rel="stylesheet">
</head>
	<body>
	<h1 class="site-heading text-center text-white d-none d-lg-block">
      <span class="site-heading-lower text-primary mb-3">BATIK MULYO</span>
	</h1>
	<div class="container" style="background-color:#f1f1f1">
			<?php
				if(!empty($pengguna)){
				echo "Sedang Login Sebagai : $pengguna, 
					  Nama lengkap : $nama_lengkap <br/> 
					  Akses Sebagai : $nama_akses, ";
				$tampil_login="display: none";
				$tampil_logout="";
				}else{
			    $tampil_login="";
				$tampil_logout="display: none";
				}
			?>
			Tanggal : <?php echo date("d F Y") ?>
			<a style="<?php echo $tampil_login ?>" 
							   href="login_form.php">Login</a></li>
			<a style="<?php echo $tampil_logout ?>" 
							   href="logout.php">Logout</a></li>
			</div>
			 <!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
      <div class="container">
        <a class="navbar-brand text-uppercase text-expanded font-weight-bold d-lg-none" href="#">Batik Mulyo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav mx-auto">
		  <?php
							$tampil="";
							if($akses == "beli"){
								$tampil="display: none";
							}
						?>	
            <li class="nav-item active px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="index.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="gallery.php">Gallery</a>
            </li>
						<li class="nav-item px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="about.php">About Us</a>
			</li>
    <!--        <li class="nav-item px-lg-4">
              <a class="nav-link text-uppercase text-expanded"  href="produk_tersedia.php">Produk Tersedia</a>
			</li>
			<li class="nav-item px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="keranjang_belanja.php">Keranjang Belanja</a>
			</li>
			<li class="nav-item px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="beli.php">Transaksi Pembelian</a>
            </li>
						
			<li class="nav-item px-lg-4">
              <a class="nav-link text-uppercase text-expanded" style="<?php echo $tampil ?>" href="produk_tampil.php">Kelola Produk Batik</a>
            </li>
            <li class="nav-item px-lg-4">
              <a class="nav-link text-uppercase text-expanded" style="<?php echo $tampil ?>" href="pelanggan_isi.php">Input Pelanggan</a>
			</li>
			<li class="nav-item px-lg-4">
              <a class="nav-link text-uppercase text-expanded" style="<?php echo $tampil ?>" href="pelanggan_tampil.php">Data Pelanggan</a>
            </li>
				-->
          </ul>
        </div>
      </div>
    </nav>
		
	<section class="page-section clearfix">
	<div class="container" style="background-color:#f1f1f1">