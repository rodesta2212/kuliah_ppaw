<?php include_once ('top_template.php'); ?>
<?php
$nama_pelanggan="";
if(isset($_POST["nama_pelanggan"]))
	$nama_barang=$_POST["nama_pelanggan"];

	include "koneksi.php";
	$sql="select*from pelanggan where nama like '%".$nama_pelanggan."%'
		  order by id_pelanggan desc";
	$hasil=mysqli_query($kon, $sql);
	if(!$hasil)
		die("Gagal query..".mysqli_error($kon));
?>
<div class="halaman">
  <h3>DATA PENGGUNA</h3>
</div>
<div class="list-group">
<a href="pelanggan_isi.php" class="list-group-item" >INPUT DATA PELANGGAN</a>
<!--<a href="pelanggan_cari.php" class="list-group-item" >CARI DATA PELANGGAN</a>-->
</div>
<div class="table-responsive">  
<table class="table">
<thead>
	<tr>
		<th>No</th>
		<th>idpelanggan</th>
		<th>Nama Pelanggan</th>
		<th>Sex</th>
		<th>Alamat</th>
		<th>Pekerjaan</th>
		<th>Kota</th>
		<th>NO. Telp</th>
		<th>Operasi</th>
	</tr>
</thead>
<tbody>
	<?php
		$no=1;
		while($row=mysqli_fetch_assoc($hasil)){
			echo "<tr>".
				 "<td>".$no."</td>".
				 "<td>".$row['id_pelanggan']."</td>".
				 "<td>".$row['nama']."</td>".
				 "<td>".$row['sex']."</td>".
				 "<td>".$row['alamat']."</td>".
				 "<td>".$row['pekerjaan']."</td>".
				 "<td>".$row['kota']."</td>".
				 "<td>".$row['notelp']."</td>"
				 ;
			echo "<td>".
				 "<a href='pelanggan_edit.php?id_pelanggan=".$row['id_pelanggan']."'>
				 EDIT</a>".
				 "&nbsp;&nbsp;".
				 "<a href='pelanggan_hapus.php?id_pelanggan=".$row['id_pelanggan']."'>
				 HAPUS</a>".
				 "</td></tr>";
		}
	?>
	</tbody>
</table>
</div>
<?php include_once ('bottom_template.php'); ?>
