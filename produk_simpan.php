<?php include_once ('top_template.php'); ?>
<?php
if(isset($_POST['id_produk'])){
	$id_produk=$_POST['id_produk'];
	$foto_lama=$_POST['foto_lama'];
	$simpan="EDIT";
}else{
	$simpan="BARU";
}

	$nama=$_POST['nama'];
	$deskripsi=$_POST['deskripsi'];
	$harga=$_POST['harga'];
	$stok=$_POST['stok'];
	
	$foto=$_FILES['foto']['name'];
	$tmpName=$_FILES['foto']['tmp_name'];
	$size=$_FILES['foto']['size'];
	$type=$_FILES['foto']['type'];
	
	$maxsize=1500000;
	$typeYgBoleh=array("image/jpeg", "image/png", "image/pjpeg");
	
	$dirFoto="pict";
	if(!is_dir($dirFoto))
		mkdir($dirFoto);
	$fileTujuanFoto=$dirFoto."/".$foto;
	
	$dirThumb="thumb";
	if(!is_dir($dirThumb))
		mkdir($dirThumb);
	$fileTujuanThumb=$dirThumb."/t_".$foto;
	
	$dataValid="YA";
	
	if($size>0){
		if($size>$maxsize){
			echo "Ukuran File Terlalu Besar <br/>";
			$dataValid="TIDAK";
		}
		if(!in_array($type, $typeYgBoleh)){
			echo "Type File Tidak Dikenal <br/>";
			$dataValid="TIDAK";
		}
	}
	
	if(strlen(trim($nama))==0){
		$dataValid="TIDAK";
		echo "Nama Produk harus diisi! <br/>";
	}
	if(strlen(trim($deskripsi))==0){
		$dataValid="TIDAK";
		echo "Deskripsi Produk harus diisi! <br/>";
	}
	if(strlen(trim($harga))==0){
		$dataValid="TIDAK";
		echo "Harga harus diisi! <br/>";
	}
	if(strlen(trim($stok))==0){
		$dataValid="TIDAK";
		echo "Stok harus diisi! <br/>";
	}
	if($dataValid=="TIDAK"){
		echo "Masih Ada Kesalahan <br/>";
		echo "<input type='button' value='ulangi mengisi'
			onClick='self.history.back()'>";
		exit();
	}
	
	include "koneksi.php";
	
	if($simpan == "EDIT"){
		if($size==0){
			$foto=$foto_lama;
		}
		$sql="update produk set
			  nama='$nama',
			  deskripsi='$deskripsi',
			  harga=$harga,
			  stok=$stok,
			  foto='$foto'
			  where id_produk='$id_produk'";
	}else{
		$sql="insert into produk
			(nama, deskripsi, harga, stok, foto)
			values
			('$nama', '$deskripsi','$harga', $stok, '$foto') ";
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

if($size>0){
	if(!move_uploaded_file($tmpName, $fileTujuanFoto)){
		echo "Gagal Upload Gambar..<br/>";
		echo "<a href='produk_tampil.php'>Daftar Produk</a>";
		exit;
	}else{
		buat_thumbnail($fileTujuanFoto, $fileTujuanThumb);
	}
}

echo "<br/>File Sudah di Upload. <br/>";

function buat_thumbnail($file_src, $file_dst){
	//hapus jika thumbnail sebelumnya sudah ada
	list($w_src,$h_src,$type)=getImageSize($file_src);
	
	switch($type){
		case 1: //gif -> jpg
			$img_src=imagecreatefromgif($file_src);
			break;
		case 2: //jpeg -> jpg
			$img_src=imagecreatefromjpeg($file_src);
			break;
		case 3: //png -> jpg
			$img_src=imagecreatefrompng($file_src);
			break;
	}
	
	$thumb=100; // max. size untuk thumb
	if($w_src>$h_src){
		$w_dst=$thumb;//landscape
		$h_dst=round($thumb / $w_src * $h_src);
	}else{
		$w_dst=round($thumb / $h_src * $w_src);//potrait
		$h_dst=$thumb;
	}
	
	$img_dst=imagecreatetruecolor($w_dst, $h_dst);//resample
	
	imagecopyresampled($img_dst, $img_src, 0, 0, 0, 0,
			$w_dst, $h_dst, $w_src, $h_src);
	imagejpeg($img_dst, $file_dst);//simpan thumbnail
	//bersihkan memori
	imagedestroy($img_src);
	imagedestroy($img_dst);
}	
?>
<div class="halaman">
  <h3>.:: INPUT PRODUK BARU ::.</h3>
</div>
<hr/>
<a href="produk_tampil.php" />DAFTAR PRODUK</a>
<?php include_once ('bottom_template.php'); ?>