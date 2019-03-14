<?php include_once ('template_atas.php'); ?>
<?php
	session_start();
	$pengguna=$_POST['pengguna'];
	$kata_kunci=md5($_POST['kata_kunci']);
	
	$dataValid="YA";
	if(strlen(trim($pengguna))==0){
		$dataValid="TIDAK";
		echo "USER harus diisi! <br/>";
	}
	if(strlen(trim($kata_kunci))==0){
		$dataValid="TIDAK";
		echo "PASSWORD harus diisi! <br/>";
	}
	if($dataValid=="TIDAK"){
		echo "Masih Ada Kesalahan <br/>";
		echo "<input type='button' value='ulangi mengisi'
			onClick='self.history.back()'>";
		exit();
	}
	
include "koneksi.php";
$sql="select*from pengguna where
	  user='".$pengguna."' and password='".$kata_kunci."' limit 1";
$hasil=mysqli_query($kon, $sql) or die("Gagal Akses !!<br/>");
$jumlah=mysqli_num_rows($hasil);
if($jumlah > 0){
	$row=mysqli_fetch_assoc($hasil);
	$_SESSION["user"]=$row["user"];
	$_SESSION["nama_lengkap"]=$row["nama_lengkap"];
	$_SESSION["akses"]=$row["akses"];
	header("location: index.php");
}else{
	echo "User atau Password Salah !<br/>";
	echo "<input type='button' value='kembali'
		  onClick='self.history.back()' />";
}
?>
<?php include_once ('template_bawah.php'); ?>
