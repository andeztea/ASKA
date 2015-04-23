<a  href="?id=tambahpeg&mod=add" class="btn btn-app btn-purple btn-xs">
			<i class="ace-icon fa fa-pencil-square-o bigger-160"></i>
			Tambah
			<span class="badge badge-warning badge-right"></span>
			</a>
			
			<a href="?id=tambahpeg" class="btn btn-app btn-success btn-xs">
			<i class="ace-icon fa fa-refresh bigger-160"></i>
			Refresh
			</a>
			
			<a  href="?id=data_pegawai" class="btn btn-app btn-purple btn-xs">
			<i class="ace-icon fa fa-users bigger-160"></i>
			Pegawai
			<span class="badge badge-warning badge-right"></span>
			</a>



<?php
error_reporting(0); 		
$sesi_username			= isset($_SESSION['username']) ? $_SESSION['username'] : NULL;
if ($sesi_username != NULL || !empty($sesi_username) ||$_SESSION['leveluser']=='1'||$_SESSION['leveluser']=='2' ) 

{

$id_user=$_SESSION['kode'];	

$nipmax=mysql_fetch_array(mysql_query("SELECT max(nip) FROM pegawai"));
$nomor_nip=$nipmax[0];




$mode_form	= isset($_GET['mod']) ? $_GET['mod'] : "";
$id_daftar	= isset($_GET['id_n']) ? $_GET['id_n'] : "";
$p_tombol	= isset($_POST['kirim_daftar']) ? $_POST['kirim_daftar'] : "";
$p_id_daftar = isset($_POST['id_daftar']) ? $_POST['id_daftar'] : "";

$p_nip			= isset($_POST['nip']) ? $_POST['nip'] : "";	
$p_nama 		= isset($_POST['nama']) ? strtoupper($_POST['nama']) : "";
$p_tmptlahir 	= isset($_POST['tmptlahir']) ? strtoupper($_POST['tmptlahir']) : "";
$p_tgl_lahir	= isset($_POST['tgl_lahir']) ? $_POST['tgl_lahir'] : "";	
$p_gender	= isset($_POST['gender']) ? $_POST['gender'] : "";
$p_alamat	= isset($_POST['alamat']) ? $_POST['alamat'] : "";	
$p_datemasuk	= isset($_POST['datemasuk']) ? $_POST['datemasuk'] : "";
$p_bag	= isset($_POST['bag']) ? $_POST['bag'] : "";
$p_jab	= isset($_POST['jab']) ? $_POST['jab'] : "";
$p_tlpn	= isset($_POST['tlpn']) ? $_POST['tlpn'] : "";	
$p_hp	= isset($_POST['hp']) ? $_POST['hp'] : "";
$p_noktp	= isset($_POST['noktp']) ? $_POST['noktp'] : "";	
$p_nonpwp	= isset($_POST['nonpwp']) ? $_POST['nonpwp'] : "";
$p_id_bank	= isset($_POST['id_bank']) ? $_POST['id_bank'] : "";  
$p_norek	= isset($_POST['norek']) ? $_POST['norek'] : "";
$p_id_agm	= isset($_POST['id_agm']) ? $_POST['id_agm'] : "";
$p_kdpndidik	= isset($_POST['kdpndidik']) ? $_POST['kdpndidik'] : "";
$p_kdstatusk	= isset($_POST['kdstatusk']) ? $_POST['kdstatusk'] : "";
$p_kdstatusp	= isset($_POST['kdstatusp']) ? $_POST['kdstatusp'] : "";




$p_submit		= "DAFTAR";

if ($mode_form == "add") {
} else if ($mode_form == "edit") {
$q_data_edit	= mysql_query("SELECT * FROM pegawai WHERE id= '$id_daftar'");
$a_data_edit	= mysql_fetch_array($q_data_edit);
$id_daftar		= $a_data_edit[0];
$p_nip			= $a_data_edit[1];	
$p_nama			= $a_data_edit[2];		
$p_tmptlahir 	= $a_data_edit[3];
$p_tgl_lahir 	= $a_data_edit[4]; 		
$p_gender 	= $a_data_edit[5];	
$p_alamat 	= $a_data_edit[6];
$p_datemasuk	= $a_data_edit[7];	
$p_bag			= $a_data_edit[8];
$p_jab	= $a_data_edit[9];


$p_tlpn 		= $a_data_edit[12];	
$p_hp	= $a_data_edit[13];	
$p_nonpwp 	= $a_data_edit[14];
$p_id_agm 		= $a_data_edit[15];	
$p_kdpndidik 	= $a_data_edit[16];		
$p_noktp 		= $a_data_edit[17]; 

$p_norek 	= $a_data_edit[19];
$p_id_bank 	= $a_data_edit[20];

$p_kdstatusk 	= $a_data_edit[21];		
$p_kdstatusp 	= $a_data_edit[22];	
	



$p_submit	= "EDIT";	

}

if ($p_tombol == "DAFTAR") {
	if ($p_nama == "" ||$p_nip == ""||$p_tmptlahir == ""||$p_tgl_lahir == "" ||$p_alamat == ""|| $p_datemasuk == ""
	||$p_bag == ""|| $p_jab == ""|| $p_kdpndidik == ""|| $p_kdstatusk == ""|| $p_kdstatusp == ""
	
	) {
		
		echo "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button><strong><i class='ace-icon fa fa-times'></i> MAAF! </strong> Form Isian Masih Belum lengkap mohon di lengkapi<br/></div>";
		
	} else {  
	
			$q_cek_ganda = mysql_query("SELECT * FROM pegawai WHERE nip = '$p_nip'");
			$j_cek_ganda = mysql_fetch_array($q_cek_ganda);
			
			if ($j_cek_ganda > 0) {
				echo "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button><strong><i class='ace-icon fa fa-times'></i> MAAF! </strong> NIP Pegawai Sudah Terdaftar<br/></div>";
			} else {   
					$q_daftar	= mysql_query("INSERT INTO pegawai VALUES ('','$p_nip','$p_nama','$p_tmptlahir','$p_tgl_lahir',
					'$p_gender','$p_alamat','$p_datemasuk','$p_bag','$p_jab','5','assets/avatars/avatar5.png','$p_tlpn','$p_hp',
					'$p_nonpwp','$p_id_agm','$p_kdpndidik','$p_noktp','0','$p_norek','$p_id_bank','$p_kdstatusk','$p_kdstatusp',NOW())");	
					
					if ($q_daftar) {
					echo "<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class=''></i></button><strong><i class='ace-icon fa fa-check'></i> BERHASIL</strong> Data Pegawai Berhasil di simpan<br/></div>";
				} else {
				echo "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button><strong><i class='ace-icon fa fa-times'></i> MAAF! </strong>" .mysql_error()."<br/></div>";
				}
			}
		}
			
} else if ($p_tombol == "EDIT") {
	if ($p_nama == "" ||$p_nip == ""||$p_tmptlahir == ""||$p_tgl_lahir == "" ||$p_alamat == ""|| $p_datemasuk == ""
		||$p_bag == ""|| $p_jab == ""|| $p_kdpndidik == ""|| $p_kdstatusk == ""|| $p_kdstatusp == ""
	) 
		{
		echo "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button><strong><i class='ace-icon fa fa-times'></i> MAAF! </strong> Form Isian Masih Belum lengkap mohon di lengkapi<br/></div>";
		} else {
		
		
		$q_edit	= mysql_query("UPDATE pegawai SET nama='$p_nama',tmpt_lahir='$p_tmptlahir',tgl_lahir='$p_tgl_lahir',
									jenis_kelamin='$p_gender',alamat='$p_alamat',tgl_masuk='$p_datemasuk',id_bag='$p_bag',id_jab='$p_jab',
									tlpn='$p_tlpn',nohp='$p_hp',npwp='$p_nonpwp',id_agm='$p_id_agm',kdpndidik='$p_kdpndidik',noktp='$p_noktp',
									norek=$p_norek,id_bank='$p_id_bank',kdstatusk='$p_kdstatusk',kdstatusp='$p_kdstatusp',time_update=NOW()
									where nip='$p_nip'");
				
									
		if ($q_edit) {
		echo "<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class=''></i></button><strong><i class='ace-icon fa fa-check'></i> BERHASIL</strong> Data Pegawai Berhasil di Ubah<br/></div>";
				} else {
				
				echo "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button><strong><i class='ace-icon fa fa-times'></i> MAAF! </strong>" .mysql_error()."<br/></div>";
				}
		}

}

	


?>




			
			
										

					<div class="widget-box">
<div class="widget-header widget-header-blue widget-header-flat">
	<h4 class="widget-title lighter">Data Pegawai</h4>
	<small>
	<i class="icon-double-angle-right"></i>
	<span class="label label-info arrowed-in-right arrowed">Mohon isi data dengan langkap</span>
	</small>
	<div class="widget-toolbar">
		
	</div>
</div>
					
					<div class="widget-body">
					<div class="widget-main">
					<div class="row-fluid">
						
							<!--PAGE CONTENT BEGINS-->

						<form class="form-horizontal" action="?id=tambahpeg" method="post"  role="form">
						<input type="hidden" name="id_daftar" value="<?php echo $id_daftar; ?>">	
							
		
							<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="nip" >NIP :</label>

									<div class="col-sm-9">
										<input type="text" name="nipakhir" class="col-xs-10 col-sm-1" id="nipakhir" readonly="" id="form-input-readonly" data-rel="tooltip" title="NIP TERAKHIR" value="<?php echo $nomor_nip;?>" />
										<input type="text" name="nip" id="nip" class="col-xs-10 col-sm-1"" data-rel="tooltip" title="NIP BARU" placeholder="NIP" value="<?php echo $p_nip;?>"/>
									</div>
								
								</div>
							

							
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="nama">Nama Lengkap:</label> 

									<div class="col-sm-9">
										<input type="text" name="nama" id="nama" class="col-xs-10 col-sm-5" placeholder="Nama lengkap" value="<?php echo $p_nama;?>"/>
									</div>
					
								</div>
								
								<div class="form-group">
										
											<label class="col-sm-3 control-label no-padding-right">Jenis Kelamin :</label>

											<div class="col-sm-9">
												
											<label class="blue">
											
											<input name="gender" class="col-xs-10 col-sm-1" id="gender" value="L" <?=$p_gender =='L' ? ' checked="checked"' : '';?> type="radio" />
											<span class="lbl"> Laki-Laki</span>
											</label>

											<label class="blue">
											<input name="gender" class="col-xs-10 col-sm-1" id="gender" value="P" <?=$p_gender =='P' ? ' checked="checked"' : '';?> type="radio" />
											<span class="lbl"> Perempuan</span>
											</label>
											
											</div>		
								</div>

								
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="tmpt_lahir">Tempat Tgl Lahir:</label>

									<div class="col-xs-8 col-sm-5">
										
										<div class="input-group col-sm-5">
										<input type="text" id="id-date-picker-1" name="tmptlahir" value="<?php echo $p_tmptlahir;?>" placeholder="Tempat Lahir" />
										<input class="form-control date-picker " type="text" name="tgl_lahir" id="tgl_lahir"  value="<?php echo $p_tgl_lahir;?>" data-date-format="yyyy-mm-dd" />
											<span class="input-group-addon">
											<i class="fa fa-calendar bigger-110"></i>
											</span>
											</div>
										
										
									
									</div>
								
								</div>
								
								
					<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="alamat">Alamat:</label>
									<div class="col-xs-8 col-sm-9">
								
											<textarea name="alamat" placeholder="Mohon Isi Alamat dengan lengkap..."><?php echo $p_alamat;?></textarea>
										
									
					</div>
					</div>
				
				
				
				
				<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="tlpn">Tlp.Rumah:</label> 

				<div class="col-sm-9">
				<input type="text" name="tlpn" id="tlpn" class="input-mask-phone col-xs-10 col-sm-2" placeholder="(021) 999-9999" value="<?php echo $p_tlpn;?>"/>
				<label class="col-sm-3 control-label no-padding-right" for="form-field-mask-2">
				Hp
				<small class="text-warning"></small>
				</label>
				<div>
				<input class="col-xs-10 col-sm-2" value="<?php echo $p_hp;?>" type="text" name="hp" id="hp" placeholder="Isikan No Hp">	
				</div>
				</div>
					
				</div>
								
								<div class="form-group ">
									<label class="col-sm-3 control-label no-padding-right" for="noktp">KTP :</label> 

									<div class="col-sm-9">
										<input type="text" name="noktp" id="noktp" class="col-xs-10 col-sm-4" placeholder="Nomer Induk Kepegawaian" value="<?php echo $p_noktp;?>"/>
									</div>
					
								</div>				
								
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="nonpwp">NPWP:</label> 

									<div class="col-sm-9">
										<input type="text" name="nonpwp" id="nonpwp" class="input-mask-npwp  col-xs-10 col-sm-4" placeholder="Nomer Pokok Wajib Pajak" value="<?php echo $p_nonpwp;?>"/>
									</div>
					
								</div>	
								
							
								
								
						</div>
					
						
							<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right">Bagian :</label>
											<div class="col-sm-9">
											
											<select name="bag" value="">
												<option>-- Bagian --</option>
													<?php
												$q = mysql_query("select * from bagian order by n_bag"); 

													while ($a = mysql_fetch_array($q)){
													if ($a[1] ==$p_bag) {
														echo "<option value='$a[1]' selected>$a[2]</option>";
													} else {
													echo "<option value='$a[1]'>$a[2]</option>";
													}
														}
													?>
											</select>
											
											</div>
			
							</div>
						
							<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right">Jabatan :</label>
											<div class="col-sm-7">
											
											<select name="jab" class="chosen-select" value="">
												<option>-- Pilih Jabatan --</option>
													<?php
												$q = mysql_query("select * from jabatan order by n_jab"); 

													while ($a = mysql_fetch_array($q)){
													if ($a[1] ==$p_jab) {
														echo "<option value='$a[1]' selected>$a[2]</option>";
													} else {
													echo "<option value='$a[1]'>$a[2]</option>";
													}
														}
													?>
											</select>
											
											</div>
			
							</div>
						
						
							<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right">Bank Transfer :</label>
											<div class="col-sm-9">
											<span>
											<select name="id_bank" value="">
												<option>-- Pilih Bank Transfer --</option>
													<?php
												$q = mysql_query("select * from tbl_bank"); 

													while ($a = mysql_fetch_array($q)){
													if ($a['0'] ==$p_id_bank) {
														echo "<option value='$a[0]' selected>$a[1]</option>";
													} else {
													echo "<option value='$a[0]'>$a[1]</option>";
													}
														}
													?>
											</select>
											<input type="text" name="norek" value="<?php echo $p_norek;?>" id="norek" placeholder="Nomer Rekening" />
											</span>
											</div>
											
										
											
							</div>

							
							<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right ">Agama :</label>
											<div class="col-sm-9">
											<select name="id_agm" value="" id="id_agm">
												<option>-- Pilih Agama --</option>
													<?php
												$q = mysql_query("select * from tbl_agama"); 

													while ($a = mysql_fetch_array($q)){
													if ($a['0'] ==$p_id_bank) {
														echo "<option value='$a[0]' selected>$a[1]</option>";
													} else {
													echo "<option value='$a[0]'>$a[1]</option>";
													}
														}
													?>
											</select>		
											</div>		
							</div>
								
							
								
								
								
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="platform">Status Kawin :</label>

										<div class="col-sm-9">
											
											<select name="kdstatusk"  value="" id="kdstatusk">
												<option>-- Status Kawin--</option>
														<?php
												$q = mysql_query("select * from tbl_statusk"); 

													while ($a = mysql_fetch_array($q)){
													if ($a['0'] ==$p_kdstatusk) {
														echo "<option value='$a[0]' selected>$a[1]</option>";
													} else {
													echo "<option value='$a[0]'>$a[1]</option>";
													}
														}
													?>
											</select>
										
											</div>
								</div>

								
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="platform">Status Pegawai:</label>

										<div class="col-sm-9">
										
											<select name="kdstatusp" class="chzn-select" value="" id="kdstatusp">
												<option>-- Status Pegawai --</option>
													<?php
												$q = mysql_query("select * from tbl_statusp"); 

													while ($a = mysql_fetch_array($q)){
													if ($a['0'] ==$p_kdstatusp) {
														echo "<option value='$a[0]' selected>$a[1]</option>";
													} else {
													echo "<option value='$a[0]'>$a[1]</option>";
													}
														}
													?>
											</select>
										
											</div>
								</div>
								
								
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="platform">Pendidikan:</label>

										<div class="col-sm-9">
											<span class="span12">
											<select name="kdpndidik" class="chzn-select" id="kdpndidik">
												<option>-- Pendidikan Terakhir--</option>
													<?php
												$q = mysql_query("select * from tbl_pendidikan"); 

													while ($a = mysql_fetch_array($q)){
													if ($a['0'] ==$p_kdpndidik) {
														echo "<option value='$a[0]' selected>$a[1]</option>";
													} else {
													echo "<option value='$a[0]'>$a[1]</option>";
													}
														}
													?>
											</select>
											</span>
											</div>
								</div>
								
											
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right">Tanggal Masuk:</label>
										<div class="row">
						<div class="col-xs-8 col-sm-3">
							<div class="input-group">
								<input class="form-control date-picker" name="datemasuk" value="<?php echo $p_datemasuk;?>" id="id-date-picker-1" type="text" data-date-format="yyyy-mm-dd" />
																	<span class="input-group-addon">
																		<i class="fa fa-calendar bigger-110"></i>
																	</span>
							</div>
						</div>
					</div>
								</div>
							
								
								
								
										
								
												
								<div class="form-actions">
									
									<input class="btn btn-success btn-big btn-next" type="submit" name="kirim_daftar" value="<?php echo $p_submit; ?>">
								

									<a href="?id=tambahpeg" class="btn" type="reset">
										<i class="icon-undo bigger-110"></i>
										RESET
									</a>
									
								</div>
		</form>		
								
								</div>
								</div>
								</div>
								</div>
								</div>
				
<?php
}else{
	  header('Location:../index.php?status=Silahkan Login');
}
?>	