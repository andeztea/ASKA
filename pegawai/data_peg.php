
<?php 
error_reporting(0);

$mod 			= isset($_GET['mod']) ? $_GET['mod'] : NULL;
$id_del 		= isset($_GET['id_n']) ? $_GET['id_n'] : NULL;

if ($mod == "del") {
	$q_del = mysql_query("DELETE FROM pegawai WHERE id = '$id_del'");

	if ($q_del) {
		echo "<div class='alert alert-info'><button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button><strong><i class='icon-ok'></i>BERHASIL</strong> Data Pegawai Berhasil di hapus<br/></div>";
	} else {
		echo "<div class='alert alert-error'><button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button><strong><i class='icon-remove'></i>MAAF!</strong>".mysql_error()."<br/></div>";
	}
}


$sesi_username			= isset($_SESSION['username']) ? $_SESSION['username'] : NULL;

if ($sesi_username != NULL || !empty($sesi_username) ||$_SESSION['leveluser']=='1'||$_SESSION['leveluser']=='2'  ) 

{



?>

<div class="row">
<div class="col-xs-12">
<h3 class="header smaller lighter blue">Data Pegawai</h3>
<div class="table-header">
	Semua Daftar Data Pegawai
</div>

<!-- <div class="table-responsive"> -->

<!-- <div class="dataTables_borderWrap"> -->
<div>
<table id="sample-table-2" class="table table-striped table-bordered table-hover">
<thead>
<tr>
	<th class="center">
		<label class="position-relative">
			<input type="checkbox" class="ace" />
			<span class="lbl"></span>
		</label>
	</th>
	<th>NIP</th>
	<th>NAMA</th>
	<th class="hidden-480">TELPON</th>

	<th>
		<i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
		TANGGAL LAHIR
	</th>
	<th class="hidden-480">JABATAN</th>

	<th>AKSI</th>
</tr>
</thead>

<tbody>
<?php
$view=mysql_query("select * from pegawai order by nama asc");
		
$no=0;
while($row=mysql_fetch_array($view)){
?>	
<tr>
	<td class="center">
		<label class="position-relative">
			<input type="checkbox" class="ace" />
			<span class="lbl"></span>
		</label>
	</td>

	<td>
		<a href="#"><?php echo $row['1'];?></a>
	</td>
	<td class="hidden-480"><?php echo $row['2'];?></td>
	<td class="hidden-phone"><?php echo $row['13'];?></td>
	<td><?php echo $row['3'];?>,<?php echo tgl_indo($row['4']);?></td>

	<td class="hidden-480">
		<span><?php echo $row['9'];?></span>
	</td>

	<td>
		<div class="hidden-sm hidden-xs action-buttons">
			<a class="blue" href="#">
				<i class="ace-icon fa fa-search-plus bigger-130"></i>
			</a>

			<a class="green" href="?id=tambahpeg&mod=edit&id_n=<?php echo $row[0];?>">
				<i class="ace-icon fa fa-pencil bigger-130"></i>
			</a>

			<a class="red" href="?id=data_pegawai&mod=del&id_n=<?php echo $row[0];?>" onclick="return confirm('Menghapus Data <?php echo $row[2];?>')">
				<i class="ace-icon fa fa-trash-o bigger-130"></i>
			</a>
		</div>

		<div class="hidden-md hidden-lg">
			<div class="inline position-relative">
				<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
					<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
				</button>

				<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
					<li>
						<a href="#" class="tooltip-info" data-rel="tooltip" title="View">
																				<span class="blue">
																					<i class="ace-icon fa fa-search-plus bigger-120"></i>
																				</span>
						</a>
					</li>

					<li>
						<a href="" class="tooltip-success" data-rel="tooltip" title="Edit">
																				<span class="green">
																					<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
																				</span>
						</a>
					</li>

					<li>
						<a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
																				<span class="red">
																					<i class="ace-icon fa fa-trash-o bigger-120"></i>
																				</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</td>
</tr>
	<?php
	}
	?>

</tbody>
</table>
</div>
</div>

<?php
}else{
	  echo "<script>alert('Mohon Maaf anda tidak bisa akses halaman ini'); window.location = '../index.php'</script>";
}
?>	