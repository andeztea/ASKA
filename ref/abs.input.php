<?php
 session_start();
 $sesi_username			= isset($_SESSION['username']) ? $_SESSION['username'] : NULL;
if ($sesi_username != NULL || !empty($sesi_username) ||$_SESSION['leveluser']=='1'  ) 

{
include "../config/koneksi.php";


if(isset($_POST['hapus'])) {
	mysql_query("DELETE FROM tbl_absen WHERE id_abs=".$_POST['hapus']);
} else {
	// deklarasikan variabel
	$id_abs	= $_POST['id_abs'];
	$shift	= $_POST['shift'];
	$jam_masuk	= $_POST['jam_masuk'];
	$jam_pulang	= $_POST['jam_pulang'];
	$transport	= $_POST['transport'];
	$uang_shift	= $_POST['uang_shift'];
	

	if($shift!="") {
	
		if($id_abs == 0) {
			mysql_query("INSERT INTO tbl_absen VALUES('','$shift','$jam_masuk','$jam_pulang','$transport','$uang_shift')");
	
		} else {
			mysql_query("UPDATE tbl_absen SET 
			shift = '$shift',
			jam_masuk = '$jam_masuk',
			jam_pulang = '$jam_pulang',
			transport = '$transport',
			uang_shift = '$uang_shift'
			WHERE id_abs= $id_abs
			");
			
		}
	}
}


?>
<?php
}else{
	session_destroy();
	header('Location:../index.php?status=Silahkan Login');
}
?>	