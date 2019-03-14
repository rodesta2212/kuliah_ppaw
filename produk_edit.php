<?php include_once ('top_template.php'); ?>
<?php
$id_produk = $_GET["id_produk"];
include "koneksi.php";
$sql="select*from produk where id_produk = '$id_produk'";
$hasil=mysqli_query($kon, $sql);
if(!$hasil)die("Gagal query... ");

$row=mysqli_fetch_assoc($hasil);
$nama=$row["nama"];
$deskripsi=$row["deskripsi"];
$harga=$row["harga"];
$stok=$row["stok"];
$foto=$row["foto"];
?>
<div class="halaman">
  <h3>.::EDIT PRODUK::.</h3>
</div>
<form action="produk_simpan.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="id_produk" value="<?php echo $id_produk;?>" />
<table border="1">
	<tr>
		<td>Nama</td>
		<td><input type="text" name="nama" value="<?php echo $nama;?>" /></td>
	</tr>
	<tr>
		<td>Deskripsi</td>
		<td><textarea name="deskripsi" rows="5" cols="19"><?php echo $deskripsi?> </textarea></td>
	</tr>
	<tr>
		<td>Harga Jual</td>
		<td><input type="text" name="harga" value="<?php echo $harga;?>" /></td>
	</tr>
	<tr>
		<td>Stok</td>
		<td><input type="text" name="stok" value="<?php echo $stok;?>" /></td>
	</tr>
	<tr>
		<td>Gambar [max=1.5MB]</td>
		<td>
		<input type="file" name="foto" />
		<input type="hidden" name="foto_lama" value="<?php echo $foto;?>"] /><br/>
		<img src="<?php echo "thumb/t_".$foto; ?>" width="100px" />
		</td>
	</tr>
	<tr>
		<td colspan="2" align="center">
			<input type="submit" value="Simpan" name="Proses" />
			<input type="reset" value="Reset" name="reset" />
		</td>
	</tr>
</table>
</form>
<?php include_once ('bottom_template.php'); ?>