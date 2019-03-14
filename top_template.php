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

  <!-- TODO 3 - set the visual viewport -->
  <meta name="viewport" content="width=device-width,  initial-scale=1">
  <link href='./images/shop.png' rel='shortcut icon'> 
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

  <title>Selamat Datang di Batik Mulyo</title>

  <!-- TODO 6.1 - include custom Modernizr build -->
  <script src="modernizr-custom.js"></script>

  <link rel="stylesheet" href="styles/main.css">
</head>
	<body>
    <!--<div class="container" style="background-color:#f1f1f1">
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
			</div>-->
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <a class="navbar-brand" style="<?php echo $tampil_login ?>" 
							   href="login_form.php">Login</a>
    <a class="navbar-brand" style="<?php echo $tampil_logout ?>" 
							   href="logout.php">Logout</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
    <?php
              $tampil="";
              $tampil1="";
							if($akses == "beli"){
								$tampil="display: none";
							}elseif($akses == ""){
                $tampil1="display: none";
              }
						?>	
      <li class="nav-item">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="gallery.php">Gallery</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">About Us</a>
      </li>    
      <li class="nav-item">
        <a class="nav-link" style="<?php echo $tampil  ?>" href="produk_tampil.php">Kelola Produk Batik</a>
            </li>
            <li class="nav-item">
        <a class="nav-link" style="<?php echo $tampil ?>" href="pelanggan_isi.php">Input Pelanggan</a>
			</li>
	<li class="nav-item">
        <a class="nav-link" style="<?php echo $tampil ?>" href="pelanggan_tampil.php">Data Pelanggan</a>
            </li>
            <li class="nav-item">
        <a class="nav-link" href="produk_tersedia.php">Produk Tersedia</a>
			</li>
			<li class="nav-item">
        <a class="nav-link" href="keranjang_belanja.php">Keranjang Belanja</a>
			</li>
			<li class="nav-item">
        <a class="nav-link" href="beli.php">Transaksi Pembelian</a>
            </li>
    </ul>
  </div>  
</nav>
<div class="header">
  <h1>Batik Mulyo</h1>
</div>
