<?php
include "config/koneksi.php";
 session_start();
 $sesi_username			= isset($_SESSION['username']) ? $_SESSION['username'] : NULL;
if ($sesi_username != NULL || !empty($sesi_username) ||$_SESSION['leveluser']=='1'||$_SESSION['leveluser']=='2'||$_SESSION['leveluser']=='3'||$_SESSION['leveluser']=='4'||$_SESSION['leveluser']=='5'  ) 

{


$nip = $_POST['nip'];
$status = htmlspecialchars($_POST['status']);

if(strlen($status)>2){
    $masuk = mysql_query("INSERT INTO status VALUES('',$nip,'$status','1',NOW())");
        if($masuk){
        echo "<script>window.location ='?id=home'</script><div id='sukses' class='alert alert-info'><strong>Berhasil, anda menambahkan status baru</strong><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button></div>";	
    }else{
         echo "<script>window.location ='?id=home'</script><div id='gagal' class='alert alert-danger'>Tidak bisa update status<button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button></div>";
    }
}else{
    echo "<script>window.location ='?id=home'</script><div id='gagal' class='alert alert-danger'>Status harus lebih dari 3 karakter<button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button></div>";
}


if(isset($_POST['hapus'])) {
	$hapus=mysql_query("DELETE FROM status WHERE id=".$_POST['hapus1']);
	if($masuk) {
		echo "<div id='sukses' class='alert alert-info'><strong>Berhasil, Mengahapus status</strong><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button></div>";
	}else{
		echo "<div id='gagal' class='alert alert-danger'>Eror tidak bisa hapus status<button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button></div>";	
} 

}



}
?>
