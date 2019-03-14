<?php include_once ('top_template.php'); ?>
<div class="halaman">
  <h3>Transaksi</h3>
</div>
<div class="container">
<h2>DATA PEMBELI PRODUK</h2>
<form action='simpan_beli.php' method="post">
<div class="table-responsive">  
<table class="table">
<thead>
	<tr>
		<td>Nama</td>
		<td>: <input type="text" name="namacust" /></td>
	</tr>
	<tr>
		<td>Email</td>
		<td>: <input type="text" name="email" /></td>
	</tr>
	<tr>
		<td>No. Telp</td>
		<td>: <input type="text" name="notelp" /></td>
	</tr>
	<tr>
		<td colspan="2" align="right">
		<input type="submit" value="simpan" /></td>
	</tr>
</thead>
</table>
</div>
<?php include_once("keranjang_belanja.php");?>
</form>
<?php include_once ('bottom_template.php'); ?>