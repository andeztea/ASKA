


<?php
// memanggil berkas koneksi.php


error_reporting(0);
$sesi_username			= isset($_SESSION['username']) ? $_SESSION['username'] : NULL;
$nip			= isset($_SESSION['nip']) ? $_SESSION['nip'] : NULL;


if ($sesi_username != NULL || !empty($sesi_username) ||$_SESSION['leveluser']=='1'||$_SESSION['leveluser']=='2'||$_SESSION['leveluser']=='3'||$_SESSION['leveluser']=='4'||$_SESSION['leveluser']=='5'  )

{






?>


		<div class="alert alert-block alert-success">
								

		<marquee><i class="icon-ok green"></i>

		Selamat Datang <strong class="green">
		<?php echo $_SESSION['namauser'];?> 
									
		di
		<strong class="green">
		ASKA
		<small>(v1)</small>
								
								
		</strong>
		<?php
		$view2=mysql_query("select * from master");
		while($row2=mysql_fetch_array($view2)){
		
		echo "".$row2['nm_pt']." </strong> &nbsp ".$row2['alamat_pt']."</marquee> ";
		echo "</div>";

		}
		?>

	
    <div>
        <span class="label label-primary arrowed-in-right label-lg">
            <b>Perbaharui Status</b>	
        </span><div id="loading" style="text-align: left"></div>
    </div>
	
<form name="form" id="statusF" method="post" action="">

		
		<input type="text"  hidden="hidden" id="nip" class="input-medium" name="nip" value="<?php echo $_SESSION['nip'];?>">
		<div class="form-group">
		<div class="col-xs-20 col-sm-20">
		<textarea name="status" maxlength="200" id="status" class="autosize-transition form-control" placeholder="Apa yang anda Pikirkan..."></textarea>
		</div>
		</div>
	
        

<button class="width-35 pull-right btn btn-sm btn-primary">
         <i class="ace-icon fa fa-comments "></i>
	<span class="bigger-110">KIRIM</span>
</button>



</form>

<div class="space-30"></div>
<div id="papan">
<div id="data-sts"></div>
</div>



<?php
}else{
    echo "<script>alert('Mohon Maaf anda tidak bisa akses halaman ini'); window.location = '../index.php'</script>";
}
?>