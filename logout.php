<?php include_once ('template_atas.php'); ?>
<?php
	@session_start();
	session_destroy();
	echo "Anda Sudah Logout <br/>";
	header("location: index.php");
?>
<?php include_once ('template_bawah.php'); ?>