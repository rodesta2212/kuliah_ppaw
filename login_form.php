<?php include_once ('top_template.php'); ?>
<div class="halaman">
  <h3>Login</h3>
</div>
<div class="container">
<form method="post" action="login_proses.php">
		USER <br/>
				<input type="text" class="form-control" name="pengguna" /> <br/>
			PASSWORD <br/>
				<input type="password" class="form-control" name="kata_kunci" /> <br/>
		<input type="submit" value="LOGIN" />
	
</form>
</div>
<?php include_once ('bottom_template.php'); ?>