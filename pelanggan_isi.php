<?php include_once ('top_template.php'); ?>
<div class="halaman">
  <h3>INPUT DATA PENGGUNA</h3>
</div>
<form action="pelanggan_simpan.php" method="post" enctype="multipart/form-data">

<div class="table-responsive">  
<table class="table">
	<tr>
		<td>Nama</td>
		<td><input type="text" name="nama" /></td>
	</tr>
	<tr>
		<td>Sex</td>
		<td><input type="radio" name="sex" value="pria"';if($_POST['sex']=='pria'){echo "checked";} />Pria
		<input type="radio" name="sex" value="wanita"';if($_POST['sex']=='wanita'){echo "checked";} />Wanita</td>
	</tr>
	<tr>
		<td>Alamat</td>
		<td><input type="text" name="alamat" /></td>
	</tr>
	<tr>
		<td>Pekerjaan</td>
		<td><select name="pekerjaan">
					<option value="">-Pilih Disini-</option>
					<option value="PNS">PNS</option>
					<option value="Pengusaha">Pengusaha</option>
					<option value="Dokter">Dokter</option>
					<option value="Polisi">Polisi</option>
					<option value="Karyawan swasta">Karyawan Swasta</option>
		</select></td>
	</tr>
	<tr>
		<td>Kota</td>
		<td><select name="kota">
					<option value="">-Pilih Disini-</option>
					<option value="Yogyakarta">Yokyakarta</option>
					<option value="Jakarta">Jakarta</option>
					<option value="Bandung">Bandung</option>
					<option value="Padang">Padang</option>
					<option value="Bekasi">Bekasi</option>
		</select></td>
	</tr>
	<tr>
		<td>No. Telp</td>
		<td><input type="text" name="notelp" /></td>
	</tr>
	<tr>
		<td colspan="2" align="center">
			<input type="submit" value="Simpan" name="Proses" />
			<input type="reset" value="Reset" name="reset" />
		</td>
	</tr>
</table>
</form>
</div>
<?php include_once ('bottom_template.php'); ?>
