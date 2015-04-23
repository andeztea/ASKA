<?php
 session_start();
 $sesi_username			= isset($_SESSION['username']) ? $_SESSION['username'] : NULL;
if ($sesi_username != NULL || !empty($sesi_username) ||$_SESSION['leveluser']=='1'  ) 

{
// panggil file koneksi.php
include "config/koneksi.php";

// buat koneksi ke database mysql


// tangkap variabel kd_mhs
$id_user = $_POST['id'];

// query untuk menampilkan mahasiswa berdasarkan kd_mhs
$data = mysql_fetch_array(mysql_query("select id_user,username,pass,email,nip,tbl_user.level_user,w_login,photo,user.no_lv from tbl_user,user where tbl_user.level_user=user.level_user and id_user=".$id_user));

// jika kd_mhs > 0 / form ubah data
if($id_user> 0) { 
	$id_user = $data['id_user'];
	$username= $data['username'];
	$password= $data['pass'];
	$email = $data['email'];
	$photo = $data['photo'];
	$nip= $data['nip'];
	$level_user = $data['level_user'];
	$no_lv= $data['no_lv'];
	
//form tambah data
} else  {
	$id_user ="";
	$username ="";
	$password ="";
	$email ="";
	$photo ="";
	$nip ="";
	$level_user ="";
	
}

?>
<form class="form-horizontal" id="form-lu">

<div class="control-group">
		<label class="control-label" for="id">ID</label>
		<div class="controls">
			<input type="text"  disabled="disabled" id="id_user" class="input-medium" name="id_user" value="<?php echo $id_user ?>">
		</div>
	</div>

	<div class="control-group">
		<label class="control-label" for="username">Username</label>
		<div class="controls">
			<input type="text" id="username" class="input-medium" name="username" value="<?php echo $username ?>">
		</div>
	</div>
	
	<div class="control-group">
		<label class="control-label" for="pass">Password</label>
		<div class="controls">
			<input type="text" id="password" class="input-medium" name="password" value="<?php echo $password?>">
		</div>
	</div>
	
	<div class="control-group">
		<label class="control-label" for="email">Email</label>
		<div class="controls">
			<input type="text" id="email" class="input-medium" name="email" value="<?php echo $email ?>">
		</div>
	</div>
	
	<div class="control-group">
		<label class="control-label" for="photo">Photo</label>
		<div class="controls">
		
		<span class="profile-picture">
		<img id="avatar" class="editable" alt="Kosong"  name="photo" src="<?php echo $photo ?>" />
		</span>
		
		
		</div>
	</div>
	

	
	
	<div class="control-group">
		<label class="control-label" for="nip">Nip</label>
		<div class="controls">
			<input type="text" id="nip" class="input-medium" name="nip" value="<?php echo $nip ?>">
		</div>
	</div>
	
	<div class="control-group">
		<label class="control-label" for="level_user">Level User</label>
		<div class="controls">
		<select name="no_lv" value="" id="no_lv">
												<option>-- Level User--</option>
														<?php
												$q = mysql_query("select * from user"); 

													while ($a = mysql_fetch_array($q)){
													if ($a['0'] ==$no_lv) {
														echo "<option value='$a[0]' selected>$a[1]</option>";
													} else {
													echo "<option value='$a[0]'>$a[1]</option>";
													}
														}
													?>
											</select>
		</div>
	</div>
	
	
	
	
</form>

<?php

?>
<?php
}else{
	session_destroy();
	header('Location:index.php?status=Silahkan Login');
}
?>