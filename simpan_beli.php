<?php include_once ('top_template.php'); ?>
<?php
$namacust = $_POST['namacust'];
$email = $_POST['email'];
$notelp = $_POST['notelp'];
$tanggal = date("Y-m-d");
$produk_pilih = '';
$qty = 1;

$dataValid = "YA";
if (strlen(trim($namacust))==0) {
	echo "Nama Harus Diisi! <br/>";
	$dataValid = "TIDAK";
}
if (strlen(trim($notelp))==0) {
	echo "No. Telp Harus Diisi! <br/>";
	$dataValid = "TIDAK";
}
if (isset($_COOKIE['keranjang'])) {
	$produk_pilih = $_COOKIE['keranjang'];
} else {	
	echo "Keranjang Belanja Kosong <br/>";
	$dataValid = "TIDAK";
}                    
if ($dataValid == "TIDAK") {
	echo "Masih Ada Kesalahan, silahkan perbaiki! <br/>";
	echo "<input type='button' value='Kembali'
			onClick='self.history.back()'> ";
	exit;
}

include "koneksi.php";
$simpan = true;
$mulai_transaksi = mysqli_query($kon,'start connection');
$sql = "insert into hjual (tanggal,namacust,email,notelp)
		values ('$tanggal','$namacust','$email','$notelp')";
$hasil = mysqli_query($kon,$sql);
if(!$hasil) {
	echo "Data Customer Gagal Simpan<br/>";
	$simpan = false;
}

$idh_jual = mysqli_insert_id($kon);
if($idh_jual == 0) {
	echo "Data Customer Tidak Ada<br/>";
	$simpan = false;
}

$produk_array = explode(",",$produk_pilih);
$jumlah = count($produk_array);
if($jumlah <= 1) {
	echo "Tidak Ada Produk Yang Dipilih<br/>";
	$simpan = false;
} else {
	foreach($produk_array as $id_produk) {
		if($id_produk == 0) {
			continue;
		}
		$sql = "select * from produk where id_produk = $id_produk";
		$hasil = mysqli_query($kon,$sql);
		if(!$hasil) {
			echo "Produk Tidak Ada<br/>";
			$simpan = false;
			break;
		} else {
			$row = mysqli_fetch_assoc($hasil);
			$stok = $row['stok']-$qty;
			if($stok < 0) {
				echo "Stok Produk".$row['nama']."Kosong<br/>";
				$simpan = false;
				break;
			}
			$harga = $row['harga'];
		}
		$sql = "insert into djual(idh_jual,id_produk,qty,harga)
				values('$idh_jual','$id_produk','$qty','$harga')";
		$hasil = mysqli_query($kon,$sql);
		if(!$hasil) {
			echo "Detail Jual Gagal Simpan<br/>";
			$simpan = false;
			break;
		}
		$sql = "update produk set stok = $stok
				where id_produk = $id_produk";
		$hasil = mysqli_query($kon,$sql);
		if(!$hasil) {
			echo "Update Stok Produk Gagal<br/>";
			$simpan = false;
			break;
		}		
	}
}

if($simpan) {
	$komit = mysqli_commit($kon);
} else {
	$rollback = mysqli_rollback($kon);
	echo "Pembelian Gagal<br/>
		 <input type='button' value='Kembali'
		 OnClick='self.history.back()'>";
	exit;	 
}
header("location:bukti_beli.php?idh_jual=$idh_jual");
setcookie('keranjang',$produk_pilih,time()-3600);
?>
<?php include_once ('bottom_template.php'); ?>