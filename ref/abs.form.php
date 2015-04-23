<?php
// panggil file koneksi.php
 session_start();
 $sesi_username			= isset($_SESSION['username']) ? $_SESSION['username'] : NULL;
if ($sesi_username != NULL || !empty($sesi_username) ||$_SESSION['leveluser']=='1'  ) 

{

include "../config/koneksi.php";
error_reporting(0);
// buat koneksi ke database mysql


// tangkap variabel kd_mhs
$id_abs = $_POST['id'];

// query untuk menampilkan mahasiswa berdasarkan kd_mhs
$data = mysql_fetch_array(mysql_query("SELECT * FROM tbl_absen WHERE id_abs=".$id_abs));

// jika kd_mhs > 0 / form ubah data
if($id_abs> 0) { 
	$id_abs = $data['id_abs'];
	$shift= $data['shift'];
	$jam_masuk = $data['jam_masuk'];
	$jam_pulang = $data['jam_pulang'];
	$transport = $data['transport'];
	$uang_shift = $data['uang_shift'];
	

//form tambah data
} else  {
	$id_abs ="";
	$shift ="";
	$jam_masuk ="";
	$jam_pulang ="";
	$transport ="";
	$uang_shift ="";
	
}

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>

	<body>
		<link rel="stylesheet" href="assets/css/bootstrap-timepicker.css" />
		
<form class="form-horizontal" id="form-abs">

<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="id">ID</label>
		<div class="col-sm-9">
			<input type="text"  disabled="disabled" id="id_abs" class="input-medium" name="id_abs" value="<?php echo $id_abs ?>">
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="shift">Shift</label>
		<div class="col-sm-9">
			<input type="text" id="shift" class="input-medium" name="shift" value="<?php echo $shift ?>">
		</div>
	</div>
	
	<div class="form-group">
	<label class="col-sm-3 control-label no-padding-right" for="jam_masuk">Jam Masuk</label>
	<div class="col-sm-9">
	<div class="input-append bootstrap-timepicker">
	<input id="timepicker1" type="text" class="input-small" name="jam_masuk" value="<?php echo $jam_masuk ?>" />
	<span class="add-on">
	<i class="icon-time"></i>
	</span>
	</div>
	</div>
	</div>
	
	
	<div class="form-group">
	<label class="col-sm-3 control-label no-padding-right" for="jam_pulang">Jam Pulang</label>
	<div class="col-sm-9">
	<div class="input-append bootstrap-timepicker">
	<input id="timepicker2" type="text" class="input-small" name="jam_pulang" value="<?php echo $jam_pulang ?>" />
	<span class="add-on">
	<i class="icon-time"></i>
	</span>
	</div>
	</div>
	</div>
	
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="transport">Transport</label>
		<div class="col-sm-9">
			<input type="text" id="transport" class="input-medium" name="transport" value="<?php echo $transport ?>">
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="uang_shift">Uang Shift</label>
		<div class="col-sm-9">
			<input type="text" id="uang_shift" class="input-medium" name="uang_shift" value="<?php echo $uang_shift ?>">
		</div>
	</div>

</form>
<script src="assets/js/date-time/bootstrap-timepicker.min.js"></script>
<script type="text/javascript">
$('#timepicker1').timepicker({
					minuteStep: 1,
					showSeconds: true,
					showMeridian: false
				});
				
$('#timepicker2').timepicker({
					minuteStep: 1,
					showSeconds: true,
					showMeridian: false
				});
</script>
	</body>
</html>

<?php

?>
<?php
}else{
	session_destroy();
	header('Location:../index.php?status=Silahkan Login');
}
?>	