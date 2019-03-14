<?php
error_reporting(E_ALL ^ E_DEPRECATED);
	$host	="localhost";
	$user	="root";
	$pass	="";
	$dbname	="batiklvl6";

	$kon=mysqli_connect($host, $user, $pass);
	if(!$kon)
		die("Gagal Koneksi . . .");
	$hasil=mysqli_select_db($kon, $dbname);
	if(!$hasil){
		$hasil=mysqli_query($kon, "CREATE DATABASE $dbname");
		if(!$hasil)
			die("Gagal Buat Database");
		else
			$hasil=mysqli_select_db($kon, $dbname);
		if(!$hasil) die("Gagal konek Database");
	}
$sqltblbrg="create table if not exists produk (
			id_produk int auto_increment not null primary key,
			nama varchar(40) not null,
			deskripsi varchar(150) not null,
			harga int not null default 0,
			stok int not null default 0,
			foto varchar(70) not null default '',
			KEY(nama) )";

mysqli_query($kon, $sqltblbrg) or die("Gagal Buat Tabel Produk");

$sqlTabelHjual="create table if not exists hjual(
				idh_jual int auto_increment not null primary key,
				tanggal date not null,
				namacust varchar(40) not null,
				email varchar(50) not null default '',
				notelp varchar(20) not null default '')";
mysqli_query($kon, $sqlTabelHjual) or die("Gagal Buat Tabel Header Jual");
$sqlTabelDjual="create table if not exists djual(
				idd_jual int auto_increment not null primary key,
				idh_jual int not null,
				id_produk int not null,
				qty int not null,
				harga int not null)";
mysqli_query($kon, $sqlTabelDjual) or die("Gagal Buat Tabel Detail Jual");

$sqlTabelUser="create table if not exists pengguna (
			   id_pengguna int auto_increment not null primary key,
			   user varchar(25) not null,
			   password varchar(50) not null,
			   nama_lengkap varchar(50) not null,
			   akses varchar(10) not null)";
			   
mysqli_query($kon, $sqlTabelUser) or die("Gagal buat Tabel Pengguna");

$sql="select*from pengguna";
$hasil=mysqli_query($kon, $sql);
$jumlah=mysqli_num_rows($hasil);
if($jumlah == 0){
	$sql="insert into pengguna (user, password, nama_lengkap, akses)
	      values ('admin', md5('admin'), 'administrator', 'toko'),
				 ('cust', md5('cust'), 'pelanggan', 'beli')";
	mysqli_query($kon, $sql);
}
$sqltblpel="create table if not exists pelanggan (
			id_pelanggan int auto_increment not null primary key,
			nama varchar(40) not null,
			sex varchar(30) not null,
			alamat varchar(40) not null,
			pekerjaan varchar(70) not null default '',
			kota varchar(70) not null default '',
			notelp varchar(70) not null default '',
			KEY(nama) )";

mysqli_query($kon, $sqltblpel) or die("Gagal Buat Tabel Pelanggan");
// echo "Tabel Siap <hr/>";
?>