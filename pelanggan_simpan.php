<?php include_once ('top_template.php'); ?>
<?php
if(isset($_POST['id_pelanggan'])){
	$idpelanggan=$_POST['id_pelanggan'];
	$simpan="EDIT";
}else{
	$simpan="BARU";
}

	$nama=$_POST['nama'];
   $sex=$_POST['sex']; 
	$alamat=$_POST['alamat'];
	$pekerjaan=$_POST['pekerjaan'];
	$kota=$_POST['kota'];
	$notelp=$_POST['notelp'];
	
	$dataValid="YA";
	
	if(strlen(trim($nama))==0){
		$dataValid="TIDAK";
		echo "Nama Anda harus diisi! <br/>";
	}
	if(strlen(trim($sex))==0){
		$dataValid="TIDAK";
		echo "sex harus diisi! <br/>";
	}
	if(strlen(trim($alamat))==0){
		$dataValid="TIDAK";
		echo "alamat harus diisi! <br/>";
	}
	if($dataValid=="TIDAK"){
		echo "Masih Ada Kesalahan <br/>";
		echo "<input type='button' value='ulangi mengisi'
			onClick='self.history.back()'>";
		exit();
	}
	
	include "koneksi.php";
	
	if($simpan == "EDIT"){
		$sql="update pelanggan set
			  nama='$nama',
			  sex='$sex',
			  alamat='$alamat',
			  pekerjaan='$pekerjaan',
			  kota='$kota',
			  notelp='$notelp',
			  where id_pelanggan='$id_pelanggan'";
	}else{
		$sql="insert into pelanggan
			(nama, sex, alamat, pekerjaan, kota, notelp)
			values
			('$nama', '$sex', '$alamat', '$pekerjaan', '$kota', '$notelp') ";
	}
	$hasil=mysqli_query($kon, $sql);
	
	if(!$hasil){
		echo "Gagal Simpan, silahkan diulangi! <br/>";
		echo mysqli_error($kon);
		echo "<br/> <input type='button' value='Kembali'
		onClick='self.history.back()'>";
		exit();
	}else{
		echo "Simpan data berhasil";
	}

	
?>
<div class="halaman">
  <h3>INPUT DATA PENGGUNA</h3>
</div>
<hr/>
<a href="pelanggan_tampil.php" />DATA PELANGGAN</a>
<?php include_once ('bottom_template.php'); ?>