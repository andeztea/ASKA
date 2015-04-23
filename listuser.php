
<?php
include "config/fungsi_ago.php";
include "config/koneksi.php";

 session_start();
 $sesi_username			= isset($_SESSION['username']) ? $_SESSION['username'] : NULL;
if ($sesi_username != NULL || !empty($sesi_username) ||$_SESSION['leveluser']=='1'  ) 

{


 
 
?>



 <div class="span12">
	  <?php 
	 
        $i = 1;
        $jml_per_halaman = 12; // jumlah data yg ditampilkan perhalaman
        $jml_data = mysql_num_rows(mysql_query("select id_user,username,w_login,photo,user.n_lv, status_app.approve from tbl_user,user,status_app where tbl_user.level_user=user.level_user and tbl_user.kd_approve=status_app.kd_approve order by w_login"));
        $jml_halaman = ceil($jml_data / $jml_per_halaman);

        // query pada saat mode pencarian
        if(isset($_POST['cari'])) {
            $kunci = $_POST['cari'];
            echo "<strong>Hasil pencarian untuk kata kunci $kunci</strong>";
            $query = mysql_query("
               select id_user,username,w_login,photo,user.n_lv, status_app.approve from tbl_user,user,status_app where tbl_user.level_user=user.level_user and tbl_user.kd_approve=status_app.kd_approve
                and username LIKE '%$kunci%'
				order by w_login desc
            ");
        // query jika nomor halaman sudah ditentukan
        } elseif(isset($_POST['halaman'])) {
            $halaman = $_POST['halaman'];
            $i = ($halaman - 1) * $jml_per_halaman  + 1;
            $query = mysql_query("select id_user,username,w_login,photo,user.n_lv, status_app.approve from tbl_user,user,status_app where tbl_user.level_user=user.level_user and tbl_user.kd_approve=status_app.kd_approve order by w_login desc LIMIT ".(($halaman - 1) * $jml_per_halaman).", $jml_per_halaman");
        // query ketika tidak ada parameter halaman maupun pencarian
        } else {
            $query = mysql_query("select id_user,username,w_login,photo,user.n_lv, status_app.approve from tbl_user,user,status_app where tbl_user.level_user=user.level_user and tbl_user.kd_approve=status_app.kd_approve order by w_login LIMIT 0, $jml_per_halaman");
            $halaman = 1; //tambahan
        }
          while($data = mysql_fetch_array($query)){

    ?>		
				
														
														
															<div class="itemdiv memberdiv">
																<div class="user">
																	<img alt="Bob Doe's avatar" src="<?php echo $data['photo'] ?>" />
																</div>

																<div class="body">
																	<div class="name">
																		<a href="#" title="<?php echo $data['n_lv'] ?>"><?php echo $data['username'] ?> </a>
																	</div>

																	<div class="time">
																		<i class="icon-time"></i>
																		<span class="green"><?php echo relative_format($data['w_login']);?></span>
																	</div>

																	<div>
																		<span class="label label-warning"><?php echo $data['approve'] ?></span>

																		<div class="inline position-relative">
																			<button class="btn btn-minier bigger btn-yellow dropdown-toggle" data-toggle="dropdown">
																				<i class="ace-icon fa fa-angle-down icon-only bigger-120"></i>
																			</button>

																			<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
																				<li>
																					<a href="#" id="<?php echo $data['id_user'] ?>" class="appro tooltip-success"  data-rel="tooltip" title="Approve">
																					
																						<span class="green">
																							<i class="ace-icon fa fa-check bigger-110"></i>
																						</span>
																					</a>
																				</li>

																				<li>
																					<a href="#" id="<?php echo $data['id_user'] ?>" class="bloked tooltip-warning" data-rel="tooltip" title="Reject">
																						<span class="orange">
																							<i class="ace-icon fa fa-times bigger-110"></i>
																						</span>
																					</a>
																				</li>
																				
																				<li>
																					<a href="#dialog-lu" id="<?php echo $data['id_user'] ?>" class="edit tooltip-edit" data-toggle="modal" data-rel="tooltip" title="Edit">
																						<span class="orange">
																							<i class="ace-icon fa fa-pencil-square-o bigger-110"></i>
																						</span>
																					</a>
																				</li>
	

																				<li>
																				 <a href="#" id="<?php echo $data['id_user'] ?>" class="hapus2 tooltip-error" data-rel="tooltip" title="Delete">
																						<span class="red">
																							<i class="ace-icon fa fa-trash-o bigger-110"></i>
																						</span>
																					</a>
																				</li>
																			</ul>
																		</div>
																	</div>
																</div>
															</div>
    <?php
 }
    ?>
<div><div>

<?php if(!isset($_POST['cari'])) { ?>
<!-- untuk menampilkan menu halaman -->
<div class="pagination pagination-center">
  <ul>
    <?php

    // tambahan
    // panjang pagig yang akan ditampilkan
    $no_hal_tampil = 5; // lebih besar dari 3

    if ($jml_halaman <= $no_hal_tampil) {
        $no_hal_awal = 1;
        $no_hal_akhir = $jml_halaman;
    } else {
        $val = $no_hal_tampil - 2; //3
        $mod = $halaman % $val; //
        $kelipatan = ceil($halaman/$val);
        $kelipatan2 = floor($halaman/$val);

        if($halaman < $no_hal_tampil) {
            $no_hal_awal = 1;
            $no_hal_akhir = $no_hal_tampil;
        } elseif ($mod == 2) {
            $no_hal_awal = $halaman - 1;
            $no_hal_akhir = $kelipatan * $val + 2;
        } else {
            $no_hal_awal = ($kelipatan2 - 1) * $val + 1;
            $no_hal_akhir = $kelipatan2 * $val + 2;
        }

        if($jml_halaman <= $no_hal_akhir) {
            $no_hal_akhir = $jml_halaman;
        }
    }

    for($i = $no_hal_awal; $i <= $no_hal_akhir; $i++) {
        // tambahan
        // menambahkan class active pada tag li
        $aktif = $i == $halaman ? ' active' : '';
    ?>
	<ul class="pagination pull-left no-margin">
    <li class="halaman<?php echo $aktif ?>" id="<?php echo $i ?>"><a href="#"><?php echo $i ?></a></li></ul>
    <?php } ?>
  </ul>
</div>
</div>
<?php } ?>
 
<?php 

?>
<?php
}else{
	session_destroy();
	header('Location:../index.php?status=Silahkan Login');
}
?>