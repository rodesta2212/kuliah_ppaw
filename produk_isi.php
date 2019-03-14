<?php include_once ('top_template.php'); ?>
<div class="halaman">
  <h3>.:: INPUT PRODUK BARU ::.</h3>
</div>
</div>
<!--<div class="list-group">
<a href="pelanggan_isi.php" class="list-group-item" >INPUT DATA PELANGGAN</a>
<a href="pelanggan_cari.php" class="list-group-item" >CARI DATA PELANGGAN</a>
</div>-->
<form action="produk_simpan.php" method="post" enctype="multipart/form-data">
<div class="table-responsive">  
<table class="table">
<thead>
	<tr>
		<td>Nama</td>
		<td><input type="text" name="nama" /></td>
	</tr>
</thead>
<thead>
	<tr>
		<td>Deskripsi</td>
		<td><textarea name="deskripsi" rows="5" cols="19"></textarea></td>
	</tr>
	</thead>
	<thead>
	<tr>
		<td>Harga Jual</td>
		<td><input type="text" name="harga" /></td>
	</tr>
	</thead>
	<thead>
	<tr>
		<td>Stok</td>
		<td><input type="text" name="stok" /></td>
	</tr>
	</thead>
	<thead>
	<tr>
		<td>Gambar [max=1.5MB]</td>
		<td><input type="file" name="foto" /></td>
	</tr>
	</thead>
	<thead>
	<tr>
		<td colspan="2" align="center">
			<input type="submit" value="Simpan" name="Proses" />
			<input type="reset" value="Reset" name="reset" />
		</td>
	</tr>
	</thead>
</table>
</div>
</form>
<?php include_once ('bottom_template.php'); ?>