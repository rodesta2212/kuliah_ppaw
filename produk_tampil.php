<?php include_once ('top_template.php'); ?>
<?php
$nama_produk="";
if(isset($_POST["nama_produk"]))
	$nama_produk=$_POST["nama_produk"];

	include "koneksi.php";
	$sql="select*from produk where nama like '%".$nama_produk."%'
		  order by id_produk desc";
	$hasil=mysqli_query($kon, $sql);
	if(!$hasil)
		die("Gagal query..".mysqli_error($kon));
?>
<div class="halaman">
  <h3>.::DATA PRODUK::.</h3>
</div>
<a href="produk_isi.php">INPUT PRODUK</a>
&nbsp;&nbsp;&nbsp;
<a href="produk_cari.php">CARI PRODUK</a>
<div class="table-responsive">  
<table class="table">
<thead>
	<tr>
		<th>Foto</th>
		<th>Nama</th>
		<th>Deskripsi</th>
		<th>Harga Jual</th>
		<th>Stok</th>
		<th>Operasi</th>
	</tr>
<thead>
<tbody>
	<?php
		$no=0;
		while($row=mysqli_fetch_assoc($hasil)){
			echo "<tr>".
				 "<td> <a href='pict/{$row['foto']}' />
				 <img src='thumb/t_{$row['foto']}' width='100' />
				 </a></td>".
				 "<td>".$row['nama']."</td>".
				 "<td>".$row['deskripsi']."</td>".
				 "<td>".$row['harga']."</td>".
				 "<td>".$row['stok']."</td>"
				 ;
			echo "<td>".
				 "<a href='produk_edit.php?id_produk=".$row['id_produk']."'>
				 EDIT</a>".
				 "&nbsp;&nbsp;".
				 "<a href='produk_hapus.php?id_produk=".$row['id_produk']."'>
				 HAPUS</a>".
				 "</td></tr>";
		}
	?>
<tbody>
</table>
</div>
<?php include_once ('bottom_template.php'); ?>
