<?php 
error_reporting(0);
$sesi_username			= isset($_SESSION['username']) ? $_SESSION['username'] : NULL;

if ($sesi_username != NULL || !empty($sesi_username) ||$_SESSION['leveluser']=='1'||$_SESSION['leveluser']=='2'  ) 

{
?>


<!DOCTYPE html>
<html lang="en">
<body>
<h3 class="header smaller lighter blue">Daftar User Pengguna ASKA</h3>


			<div class="input-prepend pull-center">
				<span class="add-on"><i class="icon-search"></i></span>
				<input class="span8" id="prependedInput" type="text" name="pencarian" placeholder="Pencarian..">
			
			<thead>
			<a  href="#dialog-lu" id="0" class="tambah3 btn btn-app btn-purple btn-xs" data-toggle="modal" >
			<i class="ace-icon fa fa-pencil-square-o bigger-160"></i>
			Tambah
			<span class="badge badge-warning badge-right"></span>
			</a>

			<button class="btn btn-app btn-light btn-xs">
			<i class="ace-icon fa fa-print bigger-160"></i>
			Print
			</button>
									
			<a href="?id=list_user" class="btn btn-app btn-success btn-xs">
			<i class="ace-icon fa fa-refresh bigger-160"></i>
			Refresh
			</a>
			
			</div>
			
			
			
			
		
		
		<div id="data-lu"></div>
		
		</thead>
	



<div id="dialog-lu" class="modal fade" tabindex="-1">
<div class="modal-dialog">
<div class="modal-content">
	<div class="modal-header no-padding">
		<div class="table-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
						<span class="white">&times;</span>
					</button>
					<i id="myModalLabel3">Tambah Data </i> 
				</div>
	</div>

	
	<div class="modal-body">  
	<div class="modal-content">
	</div>
	</div>
	
	<div class="modal-footer">
		<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Batal</button>
		<button id="simpan-lu" class="btn btn-success" data-dismiss="collapse" aria-hidden="true" >Simpan</button>
	</div>
</div>
</div>
</div>







</body>							
</html>	
<?php
}else{
	  echo "<script>alert('Mohon Maaf anda tidak bisa akses halaman ini'); window.location = 'index.php'</script>";
}
?>	