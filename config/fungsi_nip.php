<?php 
	function ambilNip($var){
	echo "<select name=$var>";
		$ambil=mysql_query("select * from tbl_siswa");
		while($dt=mysql_fetch_array($ambil)){
		echo "<option value='$dt[noreg]'>$dt[noreg]</option>";			
		}
	echo "</select>";
	}
?>