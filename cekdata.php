<?php
include "config/koneksi.php";
include "config/fungsi_ago.php";
$a = $_GET['akhir'];


$berita = mysql_query("SELECT * FROM status,tbl_user
WHERE tbl_user.nip=status.nip
AND status.id>$a");
while($b = mysql_fetch_array($berita)){
    echo $b[0]."||";
    echo "<div class=p id=drz$i>";
    echo "<div class='timeline-items'>";
    echo "<div class='timeline-item clearfix'>";
    echo "<div class='timeline-info'><img alt='Susan t Avatar' src='assets/avatars/avatar1.png'/><span class='label label-info label-sm'>16:22</span>";
    echo "</div>";
    echo "<div class='widget-box transparent'>";
    echo "<div class='widget-header widget-header-small'>";
    echo "<h5 class='widget-title smaller'><a href='#' class='blue'></a>".$b['username']."'</h5><span class='widget-toolbar no-border'>
            <i class='ace-icon fa fa-clock-o bigger-110'></i>".relative_format($b['time'])."</span><span class='widget-toolbar'><a href='#' data-action='reload'><i class='ace-icon fa fa-refresh'></i></a>
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
    echo "<div class='pull-right action-buttons'><a href='#'><i class='ace-icon fa fa-check green bigger-130'></i></a><a href='#'><i class='ace-icon fa fa-pencil blue bigger-125'>
              </i></a><a href='#'><i class='ace-icon fa fa-times red bigger-125'></i></a>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";

    echo "<div class='space-6'></div>";
    echo "</div>\n";
}
?>