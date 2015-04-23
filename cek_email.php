<?php 
error_reporting(0);
	$email=$_POST['email'];
	include "config/koneksi.php";	
	$query = mysql_query("select * from tbl_user where email='$email'")or die("Gagal Members"); 
	if (mysql_num_rows ($query)==1) {
		$message="You activation link is: http://localhost/aska/respass.php?email=$email";
		mail($email, "admin@andeznet.com", $message);
        echo "<div id='sukses' class='alert alert-info'><strong>BERHASIL...</strong><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button></div>";
	} else{
        echo "<div id='gagal' class='alert alert-danger'>Maaf Email anda tidak terdaftar<button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button></div>";

	}
?>