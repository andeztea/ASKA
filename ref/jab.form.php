<?php
 session_start();
 $sesi_username			= isset($_SESSION['username']) ? $_SESSION['username'] : NULL;
if ($sesi_username != NULL || !empty($sesi_username) ||$_SESSION['leveluser']=='1'  ) 

{

include "../config/koneksi.php";





$id_jab = $_POST['id'];


$data = mysql_fetch_array(mysql_query("SELECT * FROM jabatan WHERE id_jab=".$id_jab));


if($id_jab> 0) { 
	$id_jab = $data['id_jab'];
	$kode= $data['kode'];
	$n_jab = $data['n_jab'];
	$gapok = $data['gapok'];
	$tunj_jab = $data['tunj_jab'];
	$m_kerja = $data['m_kerja'];
	

} else  {
	$id_jab ="";
	$kode ="";
	$n_jab ="";
	$gapok ="";
	$tunj_jab ="";
	$m_kerja ="";
	
}

?>
					
<form class="form-horizontal" id="form-jab">



<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="id">ID</label>
		<div class="col-sm-9">
			<input type="text"  disabled="disabled" id="id_jab" class="input-medium" name="id_jab" value="<?php echo $id_jab ?>">
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="kode">Kode Jabatan</label>
		<div class="col-sm-9">
			<input type="text" id="kode" class="input-medium" name="kode" value="<?php echo $kode ?>">
		</div>
	</div>
	
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="n_jab">Nama Jabatan</label>
		<div class="col-sm-9">
			<input type="text" id="n_jab" class="input-medium" name="n_jab" value="<?php echo $n_jab ?>">
		</div>
	</div>
	
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="gapok">Gaji Pokok</label>
		<div class="col-sm-9">
			<input type="text" id="gapok" class="input-medium" name="gapok" value="<?php echo $gapok ?>">
		</div>
	</div>
	
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="tunj_jab">Tunjangan</label>
		<div class="col-sm-9">
			<input type="text" id="tunj_jab" class="input-medium" name="tunj_jab" value="<?php echo $tunj_jab ?>">
		</div>
	</div>
	
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="m_kerja">Masa Kerja</label>
		<div class="col-sm-9">
			<input type="text" id="m_kerja" class="input-medium" name="m_kerja" value="<?php echo $m_kerja ?>">
		</div>
	</div>
	
</form>

<?php

?>
<?php
}else{
	session_destroy();
	header('Location:../index.php?status=Silahkan Login');
}
?>