<?php
 session_start();
 include "../config/koneksi.php";
 include "../config/fungsi_ago.php";
 $sesi_username			= isset($_SESSION['username']) ? $_SESSION['username'] : NULL;
if ($sesi_username != NULL || !empty($sesi_username) ||$_SESSION['leveluser']=='1'||$_SESSION['leveluser']=='2' ||$_SESSION['leveluser']=='3' ||$_SESSION['leveluser']=='4'||$_SESSION['leveluser']=='5'  ) 

{
?>
<script>
var i = 5;
var jumlah;
var brt = new Array();
var rotasi = 5;
var nomorakhir;
var posisiar;
$(document).ready(function(){
    jumlah = $("#jumlahberita").html();
    jumlah = parseInt(jumlah);
    nomorakhir = $("#nomorakhir").html();
    for(x=1;x<=jumlah;x++){
        brt[x] = $("#drz"+x).html(); //mengambil berita ,menjadi array brt[]
    }
    cek();
    putar();
});
function cek(){
    $.ajax({
        url: "cekdata.php",
        data: "akhir="+nomorakhir,
        cache: false,
        success: function(msg){
            if(msg!=""){
                data = msg.split("||");
                nomorakhir = data[0];
                brt.push(data[1]); //tambahkan berita baru ke array brt[] di posisi akhir
                jumlah++;
                rotasi = jumlah;
            }
        }
    });
    var waktucek = setTimeout("cek()",4000);
}

function putar(){
    if(jumlah>4){                   //kita putar atau scroll jika jumlah berita lebih dari 4
        $("#papan").prepend("<div id=drz"+i+" class=x><span id=s"+i+">"+brt[rotasi]+"<br></span></div>");
        $("#s"+i).hide();
        $("#drz"+i).slideDown(400); //fungsi untuk melakuan scrolldown
        $("#s"+i).fadeIn(3000);     //fungdi untuk menampilkan berita secara fade in
        rotasi--;
        i++;
        if(rotasi<=(jumlah - 5)){
            rotasi = jumlah;
        }
    }
    var waktuputar = setTimeout("putar()",10000);
}
</script>


<div id="papan">



 <?php

 
    $i = 1;
    


    //mengambil 5 berita terbaru dari database

    $berita = mysql_query("SELECT * FROM status,tbl_user,user
WHERE tbl_user.nip=status.nip
and tbl_user.level_user=user.level_user
ORDER by status.id DESC LIMIT 5");
if($berita === FALSE) { 
    die(mysql_error()); // TODO: better error handling
}
    while($b = mysql_fetch_array($berita)){
        echo "<div class='p' id='drz$i'>";
        echo "<div class='timeline-items'>";
        echo "<div class='timeline-item clearfix'>";
        echo "<div class='timeline-info'><img alt='Susan t Avatar' src='".$b['photo']."'/><span class='label label-info label-sm'>".$b['n_lv']."</span>";
        echo "</div>";
        echo "<div class='widget-box transparent'>";
		echo "<div class='widget-header widget-header-small'>";
        echo "<h5 class='widget-title smaller'><a href='#' class='blue'>".$b['username']."</a></h5><span class='widget-toolbar no-border'>
            <i class='ace-icon fa fa-clock-o bigger-110'></i>".relative_format($b['time']).";</span><span class='widget-toolbar'><a href='#' data-action='reload'><i class='ace-icon fa fa-refresh'></i></a>
            <a href='#' data-action='collapse'>
			<i class='ace-icon fa fa-chevron-up'></i>
			</a></span>";
		echo "</div>";
		echo "<div class='widget-body'>";
        echo "<div class='widget-main'> ".$b['berita']."";
        echo "<div class='space-6'></div>";
        echo "<div class='widget-toolbox clearfix'>";
        echo "<div class='pull-left'><i class='ace-icon fa fa-hand-o-right grey bigger-125'></i><a href='#' class='bigger-110'>Click to read &hellip;</a>";
        echo "</div>";
        echo "<div class='pull-right action-buttons'><a href='#'><i class='ace-icon fa fa-pencil blue bigger-125'>
              </i></a><a href='#' class='hapus'><i class='ace-icon fa fa-times red bigger-125'></i></a>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";





        echo "<div class='space-6'></div>";
        echo "</div>\n";
        $i++;
    }

    //mengambil nomor terakhir, yang nanti berguna untuk pengecekan

    $akhir = mysql_query("SELECT id FROM status ORDER BY id DESC LIMIT 1");
    $a = mysql_fetch_array($akhir);
    $akhirnya = $a['id'];
    ?>
	</div>
<?php
$j = $i - 1;
echo "<span id=jumlahberita style='display:none'>$j</span>";
echo "<span id=nomorakhir style='display:none'>$akhirnya</span>";
?>
	
	
	
<?php
}else{
	session_destroy();
	header('Location:index.php?status=Silahkan Login');
}
?>