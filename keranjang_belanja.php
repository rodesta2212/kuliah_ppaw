<?php include_once ('top_template.php'); ?>
<?php
$produk_pilih=0;
if(isset($_COOKIE['keranjang'])){
	$produk_pilih=$_COOKIE['keranjang'];
}
if(isset($_GET['id_produk'])){
	$id_produk=$_GET['id_produk'];
	$produk_pilih=str_replace(("," . $id_produk),"", $produk_pilih);
	setcookie('keranjang', $produk_pilih, time()+3600);
}
include "koneksi.php";
$sql="select * from produk
	  where id_produk in (".$produk_pilih.")
	  order by id_produk desc";
$hasil=mysqli_query($kon, $sql);
if(!$hasil) die("Gagal query..". mysql_error()); 
?>
<div class="halaman">
  <h3>KERANJANG BELANJA</h3>
</div>
<div class="table-responsive">  
<table class="table">
<thead>
	<tr>
		<th>Foto</th>
		<th>Nama</th>
		<th>Harga Jual</th>
		<th>Stok</th>
		<th>Operasi</th>
	</tr>
</thead>
<tbody>
	<?php
		$no=0;
		while($row=mysqli_fetch_assoc($hasil)){
			echo "<tr>";
			echo "<td> <a href='pict/{$row['foto']}' />
				 <img src='thumb/t_{$row['foto']}' width='100' />
				 </a></td>";
			echo "<td>".$row['nama']."</td>";
			echo "<td>".$row['harga']."</td>";
			echo "<td>".$row['stok']."</td>";
			echo "<td>";
			echo "<a href='".$_SERVER['PHP_SELF']."?id_produk=".
				 $row['id_produk']."'>BATAL</a>";
			echo "</td></tr>";
		}
	?>
</tbody>
</table>
</div>
<?php include_once ('bottom_template.php'); ?>