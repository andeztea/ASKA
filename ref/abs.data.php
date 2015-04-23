<?php
 session_start();
 $sesi_username			= isset($_SESSION['username']) ? $_SESSION['username'] : NULL;
if ($sesi_username != NULL || !empty($sesi_username) ||$_SESSION['leveluser']=='1'  ) 

{
// panggil berkas koneksi.php
include "../config/koneksi.php";
 
function rupiah($nilai, $pecahan = 0) {
    return number_format($nilai, $pecahan, ',', '.');
}

?>

 <div class="span8">
<table id="sample-table-1" class="table table-striped table-bordered table-hover">
<thead>
    <tr>
        <th style="width:10px">NO</th>
        <th style="width:10px">SHIFT</th>
        <th style="width:10px">JAM MASUK</th>
		<th style="width:10px">JAM PULANG</th>
        <th style="width:10px">TRANSPORT (Rp)</th>
        <th style="width:10px">UANG SHIFT (Rp)</th>
        <th style="width:10px">AKSI</th>
    </tr>
</thead>
<tbody>
        <?php 
        $i = 1;
        $jml_per_halaman = 10; // jumlah data yg ditampilkan perhalaman
        $jml_data = mysql_num_rows(mysql_query("SELECT * FROM tbl_absen order by id_abs desc"));
        $jml_halaman = ceil($jml_data / $jml_per_halaman);
        // query pada saat mode pencarian
        if(isset($_POST['cari'])) {
            $kunci = $_POST['cari'];
            echo "<strong>Hasil pencarian untuk kata kunci $kunci</strong>";
            $query = mysql_query("
                SELECT * FROM tbl_absen
                WHERE id_abs LIKE '%$kunci%'
				OR shift LIKE '%$kunci%'
				OR jam_masuk LIKE '%$kunci%'
                OR jam_pulang LIKE '%$kunci%'
                OR transport LIKE '%$kunci%'
                OR uang_shift LIKE '%$kunci%'
				order by id_abs desc
            ");
        // query jika nomor halaman sudah ditentukan
        } elseif(isset($_POST['halaman'])) {
            $halaman = $_POST['halaman'];
            $i = ($halaman - 1) * $jml_per_halaman  + 1;
            $query = mysql_query("SELECT * FROM tbl_absen order by id_abs desc LIMIT ".(($halaman - 1) * $jml_per_halaman).", $jml_per_halaman");
        // query ketika tidak ada parameter halaman maupun pencarian
        } else {
            $query = mysql_query("SELECT * FROM tbl_absen order by id_abs desc  LIMIT 0, $jml_per_halaman");
            $halaman = 1; //tambahan
        }
         while($data = mysql_fetch_array($query)){

    ?>
    <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $data['shift'] ?></td>
        <td><?php echo $data['jam_masuk'] ?></td>
		<td><?php echo $data['jam_pulang'] ?></td>
        <td><?php echo rupiah($data['transport']) ?></td>
        <td><?php echo rupiah($data['uang_shift']) ?></td>
        <td>
            <a href="#dialog-abs" id="<?php echo $data['id_abs'] ?>" class="ubah3" data-toggle="modal">
                <i class="ace-icon fa fa-pencil-square-o"></i>
            </a>
			&nbsp
            <a href="#" id="<?php echo $data['id_abs'] ?>" class="hapus">
                <i class="ace-icon glyphicon glyphicon-trash"></i>
            </a>
        </td>
    </tr>
    <?php
        $i++;
        }
    ?>
</tbody>
</table>
 
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