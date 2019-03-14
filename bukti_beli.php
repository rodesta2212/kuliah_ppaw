<?php include_once ('top_template.php'); ?>
<style type="text/css">
@media print{
	#tombol {
		display: none;
	}
}
</style>
<div id="tombol">
	<input type="button" value="Beli Lagi"
		onClick="window.location.assign('produk_tersedia.php')">
	<input type="button" value="Print" onClick="window.print()">
</div>
<?php
	$idh_jual = $_GET["idh_jual"];
	include "koneksi.php";
	$sqlhjual = "select * from hjual where idh_jual = $idh_jual";
	$hasilhjual = mysqli_query($kon, $sqlhjual);
	$rowhjual = mysqli_fetch_assoc($hasilhjual);
	
	echo "<div class='halaman'>
	<h3>Bukti</h3>
  </div>";
	echo "<pre>";
	echo "<h2>BUKTI PEMBELIAN</h2>";
	echo "NO. NOTA : ".date("Ymd").$rowhjual['idh_jual']."<br/>";
	echo "TANGGAL  : ".$rowhjual['tanggal']."<br/>";
	echo "NAMA     : ".$rowhjual['namacust']."<br/>";
	$sqldjual = "select produk.nama, djual.harga, djual.qty,
				(djual.harga * djual.qty) as jumlah from djual
				inner join produk on djual.id_produk = produk.id_produk
				where djual.idh_jual = $idh_jual";
	$hasildjual = mysqli_query($kon,$sqldjual);
	if (!$hasildjual) die(mysql_error());
	echo "<table border='1' cellpadding='10' cellspacing='0'>";
	echo "<tr>";
	echo "<th> Nama </th>";
	echo "<th> Quantity </th>";
	echo "<th> Harga </th>";
	echo "<th> Jumlah </th>";
	echo "</tr>";
	
	$totalharga = 0;
	while($rowdjual = mysqli_fetch_assoc($hasildjual)){
		echo "<tr>";
		echo "<td> ".$rowdjual['nama']."</td>";
		echo "<td align='right'> ".$rowdjual['qty']."</td>";
		echo "<td align='right'> ".$rowdjual['harga']."</td>";
		echo "<td align='right'> ".$rowdjual['jumlah']."</td>";
		echo "</tr>";
	$totalharga = $totalharga+$rowdjual['jumlah'];
	}
	echo "<tr>";
	echo "<td colspan='3' align='right'>";
	echo "	<strong>Total Jumlah</strong> </td>";
	echo " <td align='right'><strong>$totalharga</strong></td>";
	echo "</tr>";
	echo "</table>";
	echo "</pre>";
?>
<?php include_once ('bottom_template.php'); ?>
