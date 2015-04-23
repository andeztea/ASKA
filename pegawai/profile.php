<?php
error_reporting(0);
$sesi_username			= isset($_SESSION['username']) ? $_SESSION['username'] : NULL;
if ($sesi_username != NULL || !empty($sesi_username) ||$_SESSION['leveluser']=='1'||$_SESSION['leveluser']=='2'||$_SESSION['leveluser']=='3'||$_SESSION['leveluser']=='4'||$_SESSION['leveluser']=='5' ) 



{

?>
<!-- PAGE CONTENT BEGINS -->
<div class="clearfix">
	<div class="pull-left alert alert-success no-margin">
		<button type="button" class="close" data-dismiss="alert">
			<i class="ace-icon fa fa-times"></i>
		</button>

		<i class="ace-icon fa fa-umbrella bigger-120 blue"></i>
		Silahkan klik foto untuk merubah foto anda...
    </div>

	<div class="pull-right">
		<span class="green middle bolder">Choose profile: &nbsp;</span>

		<div class="btn-toolbar inline middle no-margin">
			<div data-toggle="buttons" class="btn-group no-margin">
				<label class="btn btn-sm btn-yellow active">
					<span class="bigger-110">1</span>

					<input type="radio" value="1" />
				</label>

				<label class="btn btn-sm btn-yellow">
					<span class="bigger-110">2</span>

					<input type="radio" value="2" />
				</label>

				<label class="btn btn-sm btn-yellow">
					<span class="bigger-110">3</span>

					<input type="radio" value="3" />
				</label>
			</div>
		</div>
	</div>
</div>

<div class="hr dotted"></div>

<div>
<div id="user-profile-1" class="user-profile row">
<div class="col-xs-12 col-sm-3 center">
 
<?php


$data = mysql_query("SELECT * FROM pegawai,tbl_user
WHERE tbl_user.nip=pegawai.nip and tbl_user.nip=$nip");
while($b = mysql_fetch_array($data)){
echo "<div>";
echo "<span class='profile-picture'>";
echo "<img id='photo' class='editable img-responsive' alt='Alex's Avatar' src='".$b['photo']."'/>";
echo "<input type='text'  hidden='hidden' id='id' class='input-medium' name='id' value='".$_SESSION['kode']."'>";
   echo "</span>";
    echo "<div class='space-4'></div>";
    echo "<div class='width-80 label label-info label-xlg arrowed-in arrowed-in-right'>";
    echo "<div class='inline position-relative'>";
    echo "<a href='#' class='user-title-label dropdown-toggle' data-toggle='dropdown'>";
    echo "<i class='ace-icon fa fa-circle light-green'></i>";
    echo "&nbsp;";
    echo "<span class='white' >".$b['username']."</span>";
    echo "</a>";

    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "<div class='space-6'></div>";
    echo "<div class='profile-contact-info'>";
    echo "<div class='profile-contact-links align-left'>";
    echo "<a href='#' class='btn btn-link'>";
    echo "<i class='ace-icon fa fa-plus-circle bigger-120 green'></i>";
    echo "Add as a friend";
    echo "</a>";
    echo "<a href='#' class='btn btn-link'>";
    echo "<i class='ace-icon fa fa-envelope bigger-120 pink'></i>";
    echo "Send a message";
    echo "</a>";
    echo "<a href='#' class='btn btn-link'>";
    echo "<i class='ace-icon fa fa-globe bigger-125 blue'></i>";
    echo "".$b['web']."";
    echo "</a>";
    echo "</div>";
    echo "<div class='space-6'></div>";
    echo "<div class='profile-social-links align-center'>";
    echo "<a href='".$b['facebook']."' class='tooltip-info' title='' data-original-title='Visit my Facebook'>";
    echo "<i class='middle ace-icon fa fa-facebook-square fa-2x blue'></i>";
    echo "</a>";
    echo "<a href='".$b['twitter']."' class='tooltip-info' title='' data-original-title='Visit my Twitter'>";
    echo "<i class='middle ace-icon fa fa-twitter-square fa-2x light-blue'></i>";
    echo "</a>";
    echo "<a href='".$b['patch']."' class='tooltip-info' title='' data-original-title='Visit my Pinterest'>";
    echo "<i class='middle ace-icon fa fa-pinterest-square fa-2x red'></i>";
    echo "</a>";
    echo "</div>";
    echo "</div>";
}
?>


</div>

<div class="col-xs-12 col-sm-9">
<div class="center">
												<span class="btn btn-app btn-sm btn-light no-hover">
													<span class="line-height-1 bigger-170 blue"> 1,411 </span>

													<br />
													<span class="line-height-1 smaller-90"> Views </span>
												</span>

												<span class="btn btn-app btn-sm btn-yellow no-hover">
													<span class="line-height-1 bigger-170"> 32 </span>

													<br />
													<span class="line-height-1 smaller-90"> Followers </span>
												</span>

												<span class="btn btn-app btn-sm btn-pink no-hover">
													<span class="line-height-1 bigger-170"> 4 </span>

													<br />
													<span class="line-height-1 smaller-90"> Projects </span>
												</span>

												<span class="btn btn-app btn-sm btn-grey no-hover">
													<span class="line-height-1 bigger-170"> 23 </span>

													<br />
													<span class="line-height-1 smaller-90"> Reviews </span>
												</span>

												<span class="btn btn-app btn-sm btn-success no-hover">
													<span class="line-height-1 bigger-170"> 7 </span>

													<br />
													<span class="line-height-1 smaller-90"> Albums </span>
												</span>

												<span class="btn btn-app btn-sm btn-primary no-hover">
													<span class="line-height-1 bigger-170"> 55 </span>

													<br />
													<span class="line-height-1 smaller-90"> Contacts </span>
												</span>
</div>

<div class="space-12"></div>


<?php


$data = mysql_query("SELECT * FROM pegawai,tbl_user,umur_p
WHERE tbl_user.nip=pegawai.nip and tbl_user.nip=umur_p.nip and tbl_user.nip=$nip");
while($b = mysql_fetch_array($data)){
echo "<div class='profile-user-info profile-user-info-striped'>";
echo "<div class='profile-info-row'>";
echo "<div class='profile-info-name'> Nama Lengkap</div>";
echo "<div class='profile-info-value'>";
echo "<span class='' id='nama'>".$b['nama']."</span>";
echo "</div>";
echo "</div>";
echo "<div class='profile-info-row'>";
echo "<div class='profile-info-name'> Tempat Lahir </div>";
echo "<div class='profile-info-value'>"	;
echo "<i class='fa fa-map-marker light-orange bigger-110'></i>";	
echo "<span class='' id='tempatlhr'>".$b['tmpt_lahir']."</span>";	
echo "</div>";
echo "</div>";			
echo "<div class='profile-info-row'>";		
echo "<div class='profile-info-name'> Tanggal Lahir</div>";	
echo "<div class='profile-info-value'>";
echo "<span class='editable'>".tgl_indo($b['tgl_lahir'])."</span>";
echo "</div>";
echo "</div>";
echo "<div class='profile-info-row'>";	
echo "<div class='profile-info-name'> Umur </div>";
echo "<div class='profile-info-value'>"	;
echo "<span class='editable'>".$b['t_lahir']."</span>";
echo "</div>";
echo "</div>";	
echo "<div class='profile-info-row'>";		
echo "<div class='profile-info-name'> Tanggal Daftar </div>";	
echo "<div class='profile-info-value'>";
echo "<span class='editable' id='tgldaftar'>".tgl_indo($b['w_daftar'])."</span>";
echo "</div>";
echo "</div>";	
echo "<div class='profile-info-row'>";	
echo "<div class='profile-info-name'>Online Terakhir</div>";	
echo "<div class='profile-info-value'>";
echo "<span class='editable'>".relative_format($b['w_login'])."</span>";
echo "</div>";
echo "</div>";	
echo "<div class='profile-info-row'>";	
echo "<div class='profile-info-name'>Mottto</div>";	
echo "<div class='profile-info-value'>";
echo "<span class='editable' id='motto'>".$b['motto']."</span>";
echo "</div>";
echo "</div>";	
echo "</div>";	
echo "<div class='space-20'></div>";
echo "<div class='col-xs-12 col-sm-6'>";
echo "<div class='widget-box transparent'>";
echo "<div class='widget-header widget-header-small'>";
echo "<h4 class='widget-title smaller'>";
echo "<h4 class='widget-title smaller'>";
echo "<i class='ace-icon fa fa-check-square-o bigger-110'></i>	";
echo "Tentang Saya";
echo "</h4>";
echo "</div>";
echo "<div class='widget-body'>";
echo "<div class='widget-main'>";
echo "".$b['aboutme']."";
echo "</div>";
echo "</div>";
echo "</div>";
echo "</div>";

}
?>

<div class="col-xs-12 col-sm-6">
		<div class="widget-box transparent">
			<div class="widget-header widget-header-small header-color-blue2">
				<h4 class="widget-title smaller">
					<i class="ace-icon fa fa-lightbulb-o bigger-120"></i>
					Penilaian Kinerja
				</h4>
			</div>

			<div class="widget-body">
				<div class="widget-main padding-16">
					<div class="clearfix">
						<div class="grid3 center">
							<div class="easy-pie-chart percentage" data-percent="45" data-color="#CA5952">
								<span class="percent">45</span>%
							</div>

							<div class="space-2"></div>
							Kemampuan Teknis
						</div>

						<div class="grid3 center">
							<div class="center easy-pie-chart percentage" data-percent="90" data-color="#59A84B">
								<span class="percent">90</span>%
							</div>

							<div class="space-2"></div>
							Kemampuan Konseptual
						</div>

						<div class="grid3 center">
							<div class="center easy-pie-chart percentage" data-percent="80" data-color="#9585BF">
								<span class="percent">80</span>%
							</div>

							<div class="space-2"></div>
							 Hubungan Interpersonal
						</div>
					</div>

					<div class="hr hr-16"></div>

					<div class="profile-skills">
						<div class="progress">
							<div class="progress-bar" style="width:80%">
								<span class="pull-left">Komponen Kompetensi</span>
								<span class="pull-right">80%</span>
							</div>
						</div>

						<div class="progress">
							<div class="progress-bar progress-bar-success" style="width:72%">
								<span class="pull-left">Komponen Hasil Kinerja</span>

								<span class="pull-right">72%</span>
							</div>
						</div>

						
					</div>
				</div>
			</div>
		</div>
</div>


<div class="space-6"></div>


</div>
</div>
</div>


<div class="hide">
<div id="user-profile-2" class="user-profile row">
<div class="col-sm-offset-1 col-sm-10">
<div class="well well-sm">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	&nbsp;
	<div class="inline middle blue bigger-110"> Your profile is 70% complete </div>

	&nbsp; &nbsp; &nbsp;
	<div style="width:200px;" data-percent="70%" class="inline middle no-margin progress progress-striped active">
		<div class="progress-bar progress-bar-success" style="width:70%"></div>
	</div>
</div><!-- /.well -->

<div class="space"></div>

<form class="form-horizontal">
<div class="tabbable">
<ul class="nav nav-tabs padding-16">
	<li class="active">
		<a data-toggle="tab" href="#edit-basic">
			<i class="green ace-icon fa fa-pencil-square-o bigger-125"></i>
			Basic Info
		</a>
	</li>

	<li>
		<a data-toggle="tab" href="#edit-settings">
			<i class="purple ace-icon fa fa-cog bigger-125"></i>
			Settings
		</a>
	</li>

	<li>
		<a data-toggle="tab" href="#edit-password">
			<i class="blue ace-icon fa fa-key bigger-125"></i>
			Password
		</a>
	</li>
</ul>

<div class="tab-content profile-edit-tab-content">
<div id="edit-basic" class="tab-pane in active">
	<h4 class="header blue bolder smaller">General</h4>

	<div class="row">
		

		<div class="col-xs-12 col-sm-8">
			<div class="form-group">
				<label class="col-sm-4 control-label no-padding-right" for="form-field-username">Username</label>

				<div class="col-sm-8">
					<input class="col-xs-12 col-sm-10" type="text" id="form-field-username" placeholder="Username" value="alexdoe" />
				</div>
			</div>

			<div class="space-4"></div>

			<div class="form-group">
				<label class="col-sm-4 control-label no-padding-right" for="form-field-first">Name</label>

				<div class="col-sm-8">
					<input class="input-small" type="text" id="form-field-first" placeholder="First Name" value="Alex" />
					<input class="input-small" type="text" id="form-field-last" placeholder="Last Name" value="Doe" />
				</div>
			</div>
		</div>
	</div>

	<hr />
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-date">Birth Date</label>

		<div class="col-sm-9">
			<div class="input-medium">
				<div class="input-group">
					<input class="input-medium date-picker" id="form-field-date" type="text" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy" />
																			<span class="input-group-addon">
																				<i class="ace-icon fa fa-calendar"></i>
																			</span>
				</div>
			</div>
		</div>
	</div>

	<div class="space-4"></div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right">Gender</label>

		<div class="col-sm-9">
			<label class="inline">
				<input name="form-field-radio" type="radio" class="ace" />
				<span class="lbl middle"> Male</span>
			</label>

			&nbsp; &nbsp; &nbsp;
			<label class="inline">
				<input name="form-field-radio" type="radio" class="ace" />
				<span class="lbl middle"> Female</span>
			</label>
		</div>
	</div>

	<div class="space-4"></div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-comment">Comment</label>

		<div class="col-sm-9">
			<textarea id="form-field-comment"></textarea>
		</div>
	</div>

	<div class="space"></div>
	<h4 class="header blue bolder smaller">Contact</h4>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-email">Email</label>

		<div class="col-sm-9">
																	<span class="input-icon input-icon-right">
																		<input type="email" id="form-field-email" value="alexdoe@gmail.com" />
																		<i class="ace-icon fa fa-envelope"></i>
																	</span>
		</div>
	</div>

	<div class="space-4"></div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-website">Website</label>

		<div class="col-sm-9">
																	<span class="input-icon input-icon-right">
																		<input type="url" id="form-field-website" value="http://www.alexdoe.com/" />
																		<i class="ace-icon fa fa-globe"></i>
																	</span>
		</div>
	</div>

	<div class="space-4"></div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-phone">Phone</label>

		<div class="col-sm-9">
																	<span class="input-icon input-icon-right">
																		<input class="input-medium input-mask-phone" type="text" id="form-field-phone" />
																		<i class="ace-icon fa fa-phone fa-flip-horizontal"></i>
																	</span>
		</div>
	</div>

	<div class="space"></div>
	<h4 class="header blue bolder smaller">Social</h4>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-facebook">Facebook</label>

		<div class="col-sm-9">
																	<span class="input-icon">
																		<input type="text" value="facebook_alexdoe" id="form-field-facebook" />
																		<i class="ace-icon fa fa-facebook blue"></i>
																	</span>
		</div>
	</div>

	<div class="space-4"></div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-twitter">Twitter</label>

		<div class="col-sm-9">
																	<span class="input-icon">
																		<input type="text" value="twitter_alexdoe" id="form-field-twitter" />
																		<i class="ace-icon fa fa-twitter light-blue"></i>
																	</span>
		</div>
	</div>

	<div class="space-4"></div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-gplus">Google+</label>

		<div class="col-sm-9">
																	<span class="input-icon">
																		<input type="text" value="google_alexdoe" id="form-field-gplus" />
																		<i class="ace-icon fa fa-google-plus red"></i>
																	</span>
		</div>
	</div>
</div>

<div id="edit-settings" class="tab-pane">
	<div class="space-10"></div>

	<div>
		<label class="inline">
			<input type="checkbox" name="form-field-checkbox" class="ace" />
			<span class="lbl"> Make my profile public</span>
		</label>
	</div>

	<div class="space-8"></div>

	<div>
		<label class="inline">
			<input type="checkbox" name="form-field-checkbox" class="ace" />
			<span class="lbl"> Email me new updates</span>
		</label>
	</div>

	<div class="space-8"></div>

	<div>
		<label class="inline">
			<input type="checkbox" name="form-field-checkbox" class="ace" />
			<span class="lbl"> Keep a history of my conversations</span>
		</label>

		<label class="inline">
			<span class="space-2 block"></span>

			for
			<input type="text" class="input-mini" maxlength="3" />
			days
		</label>
	</div>
</div>

<div id="edit-password" class="tab-pane">
	<div class="space-10"></div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-pass1">New Password</label>

		<div class="col-sm-9">
			<input type="password" id="form-field-pass1" />
		</div>
	</div>

	<div class="space-4"></div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-pass2">Confirm Password</label>

		<div class="col-sm-9">
			<input type="password" id="form-field-pass2" />
		</div>
	</div>
</div>
</div>
</div>

<div class="clearfix form-actions">
	<div class="col-md-offset-3 col-md-9">
		<button class="btn btn-info" type="button">
			<i class="ace-icon fa fa-check bigger-110"></i>
			Save
		</button>

		&nbsp; &nbsp;
		<button class="btn" type="reset">
			<i class="ace-icon fa fa-undo bigger-110"></i>
			Reset
		</button>
	</div>
</div>
</form>
</div><!-- /.span -->
</div><!-- /.user-profile -->
</div>

<?php
}else{
	  header('Location:../index.php?status=Silahkan Login');
}
?>	
