<?php

mysql_connect("localhost","root","12345");
mysql_select_db("db_pegawai");

 

$lama = 1;


$query = "DELETE FROM status
          WHERE DATEDIFF(CURDATE(), time) > $lama";
$hasil = mysql_query($query);

?>