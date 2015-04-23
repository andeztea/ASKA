
<?php
error_reporting(0);
include "config/koneksi.php";
function anti_injection($data){
    $filter=mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
    return $filter;
}
	$username	= anti_injection($_POST['username2']);
	$password	= anti_injection($_POST['password2']);
	$email	= anti_injection($_POST['email2']);
	$enkrip_pass=md5($password2);
	$nip	= anti_injection($_POST['nip']);



$cek_username=mysql_num_rows(mysql_query
             ("SELECT username FROM tbl_user
               WHERE username='$username'"));
$ceknipdaftar=mysql_num_rows(mysql_query
             ("SELECT nip FROM tbl_user
               WHERE nip='$nip'"));
$cek_email=mysql_num_rows(mysql_query
             ("SELECT email FROM tbl_user
               WHERE email='$email'"));
$cek_nip=mysql_num_rows(mysql_query
             ("SELECT nip FROM pegawai
               WHERE nip='$nip'"));

if ($cek_username > 0){
    echo "<div id='gagal' class='alert alert-danger'>Maaf Username sudah terdaftar<button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button></div>";

} else if ($cek_nip ==0 ) {

    echo "<div id='gagal' class='alert alert-danger'>Mohon maaf NIP anda tidak terdaftar mohon menghubungi HRD<button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button></div>";
   
}else if ($cek_email > 0){
    echo "<div id='gagal' class='alert alert-danger'>Mohon maaf Email anda tidak terdaftar<button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button></div>";

}else if ($ceknipdaftar > 0){
    echo "<div id='gagal' class='alert alert-danger'>Mohon maaf NIP anda sudah terdaftar<button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button></div>";



}else {mysql_query("INSERT INTO tbl_user(id_user,username,
                                 pass,
                                 email,
                                 level_user,w_daftar,nip,photo)
                      VALUES('','$username',
                             '$enkrip_pass',
                             '$email',
                             '5',NOW(),'$nip','../assets/avatars/avatar5.png')");

    echo "<div id='sukses' class='alert alert-info'><strong>BERHASIL...Mohon tunggu konfirmasi dari HRD</strong><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button></div>";
} 
										 
	
?>
