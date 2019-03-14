<?php include_once ('top_template.php'); ?>
<?php
	$id_produk = $_GET['id_produk'];
	include "koneksi.php";
	$sql = "select * from produk where id_produk = '$id_produk'";
	$hasil = mysqli_query($kon, $sql);
	if (!$hasil) die ("Gagal query...");
 
	$data = mysqli_fetch_array($hasil);
	$nama = $data['nama'];
	$deskripsi = $data['deskripsi'];
	$harga = $data['harga'];
	$stok = $data['stok'];
	$foto = $data['foto'];
	
	echo "<div class='halaman'>
	<h3>Konfirmasi Hapus</h3>
  </div><div class='container'>";
	echo "Nama Produk : ".$nama."<br/>" ;
	echo "Harga Produk : ".$harga."<br/>" ;
	echo "Stok : ".$stok."<br/>" ;
	echo "Foto : <img src='thumb/t_".$foto."' /><br/><br/>" ;
	echo "APAKAH DATA INI AKAN DIHAPUS? <br/>" ;
	echo "<a href='produk_hapus.php?id_produk=$id_produk&hapus=1'> YA </a>" ;
	echo "&nbsp;&nbsp;" ;
	echo "<a href='produk_tampil.php'> TIDAK </a> <br/><br/></div>" ;
	
	if (isset($_GET['hapus'])){
		$sql = "delete from produk where id_produk = '$id_produk'" ;
		$hasil = mysqli_query($kon, $sql);
		if (!$hasil){
			echo "Gagal Hapus Produk: $nama ..<br/> ";
			echo "<a href='produk_tampil.php'>Kembali ke Daftar Produk</a>";
		} else {
			$gbr = "pict/$foto";
			if (file_exists($gbr)) unlink($gbr);
			$gbr = "thumb/t $foto";
			if (file_exists($gbr)) unlink($gbr);
			header('location:produk_tampil.php');
		}
	}
?>
<?php include_once ('bottom_template.php'); ?>