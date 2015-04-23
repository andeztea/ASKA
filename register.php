
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta charset="utf-8" />
	<title>Register - ASKA (Administrasi Sistem Kepegawaian)</title>
	<link rel="shortcut icon" href="favicon.ico" />
	<meta name="description" content="User Register page" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

	<!-- bootstrap & fontawesome -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
	<link rel="stylesheet" href="assets/font-awesome/4.1.0/css/font-awesome.min.css" />
	
		<link rel="stylesheet" href="assets/css/select2.css" />
	<!-- text fonts -->
	<link rel="stylesheet" href="assets/fonts/fonts.googleapis.com.css" />

	<!-- ace styles -->
	<link rel="stylesheet" href="assets/css/ace.min.css" />

	<!--[if lte IE 9]>
	<link rel="stylesheet" href="assets/css/ace-part2.min.css" />
	<![endif]-->
	<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />

	<!--[if lte IE 9]>
	<link rel="stylesheet" href="assets/css/ace-ie.min.css" />
	<![endif]-->


</head>

<body class="login-layout blur-login">
<div class="main-container">
<div class="main-content">
<div class="row">
<div class="col-sm-10 col-sm-offset-1">
<div class="login-container">
<div class="center">
	<h1>
		<i class="ace-icon fa fa-eye green"></i>
		<span class="red">ASKA</span><span class="white">ONLINE</span>
	</h1>
	<span class="white"><h5>Administrasi System Kepegawaian</h5></span>
</div>

<div class="space-6"></div>
<div id="loading" style="text-align: center"></div>
<div class="position-relative">
	<div id="login-box" class="login-box visible widget-box no-border">
		<div class="widget-body">
			<div class="widget-main">
				<h4 class="header blue lighter bigger">
                    <i class="ace-icon fa fa-users blue"></i>
					Registrasi User ID Pegawai
				</h4>

				<div class="space-6"></div>

                <form id="validation-reg" name="register" method="post" action="">
                    <fieldset>
                        <div class="form-group">
                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="email" name="email2" id="email2" class="form-control" placeholder="Email" />
															<i class="ace-icon fa fa-envelope"></i>
														</span>
                            </label>
                        </div>


                        <div class="form-group">
                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" id="username2" name="username2" class="form-control" placeholder="Username" />
															<i class="ace-icon fa fa-user"></i>
														</span>
                            </label>
                        </div>

                        <div class="form-group">
                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" id="password" name="password" class="form-control" placeholder="Password" />
															<i class="ace-icon fa fa-lock"></i>
														</span>
                            </label>
                        </div>

                        <div class="form-group">
                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" id="password2" name="password2" class="form-control" placeholder="Repeat password" />
															<i class="ace-icon fa fa-retweet"></i>
														</span>
                            </label>
                        </div>

                        <div class="form-group">
                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" id="nip" name="nip" class="form-control" placeholder="Nomer Induk Pegawai" />
															<i class="ace-icon fa fa-user"></i>
														</span>
                            </label>
                        </div>

                        <div class="form-group">
                            <label class="block">
                                <input type="checkbox" id="checkbox" name="checkbox" class="ace" />
														<span class="lbl">
															I accept the
															<a href="#">User Agreement</a>
														</span>
                            </label>
                        </div>

                        <div class="space-24"></div>

                        <div class="clearfix">
                            <button type="reset" class="width-30 pull-left btn btn-sm">
                                <i class="ace-icon fa fa-refresh"></i>
                                <span class="bigger-110">Reset</span>
                            </button>

                            <button class="width-35 pull-right btn btn-sm btn-primary">
                                <i class="ace-icon fa fa-key"></i>
                                <span class="bigger-110">Register</span>
                            </button>
                        </div>
                    </fieldset>
                </form>
				<h4 class="blue">&copy; AndezTea</h4>
				<div class="social-or-login center">
					<span class="bigger-110">Contact Person</span>
				</div>

				<div class="space-6"></div>

				<div class="social-login center">
					<a class="btn btn-primary">
						<i class="ace-icon fa fa-facebook"></i>
					</a>

					<a class="btn btn-info">
						<i class="ace-icon fa fa-twitter"></i>
					</a>

					<a class="btn btn-danger">
						<i class="ace-icon fa fa-google-plus"></i>
					</a>
				</div>
			</div><!-- /.widget-main -->

			<div class="toolbar clearfix">
				<div>
					<a href="index.php" class="forgot-password-link">
						<i class="ace-icon fa fa-arrow-left"></i>
						Back To Login
					</a>
				</div>


			</div>
		</div><!-- /.widget-body -->
	</div>

	




<div class="navbar-fixed-top align-right">
	<br />
	&nbsp;
	<a id="btn-login-dark" href="#">Dark</a>
	&nbsp;
	<span class="blue">/</span>
	&nbsp;
	<a id="btn-login-blur" href="#">Blur</a>
	&nbsp;
	<span class="blue">/</span>
	&nbsp;
	<a id="btn-login-light" href="#">Light</a>
	&nbsp; &nbsp; &nbsp;
</div>
</div>
</div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.main-content -->
</div><!-- /.main-container -->

<!-- basic scripts -->

<!--[if !IE]> -->
<script src="assets/js/jquery.2.1.1.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.validate.min.js"></script>

<!-- <![endif]-->
<?php include "config/fungsi_register.php" ?>
<!--[if IE]>
<script src="assets/js/jquery.1.11.1.min.js"></script>
<![endif]-->

<!--[if IE]>
<script type="text/javascript">
	window.jQuery || document.write("<script src='assets/js/jquery1x.min.js'>"+"<"+"/script>");
</script>
<![endif]-->
<script type="text/javascript">
	if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
</script>

<!-- inline scripts related to this page -->
<script type="text/javascript">
	jQuery(function($) {
		$(document).on('click', '.toolbar a[data-target]', function(e) {
			e.preventDefault();
			var target = $(this).data('target');
			$('.widget-box.visible').removeClass('visible');//hide others
			$(target).addClass('visible');//show target
		});
	});

	
	


	//you don't need this, just used for changing background
	jQuery(function($) {
		$('#btn-login-dark').on('click', function(e) {
			$('body').attr('class', 'login-layout');
			$('#id-text2').attr('class', 'white');
			$('#id-company-text').attr('class', 'blue');

			e.preventDefault();
		});
		$('#btn-login-light').on('click', function(e) {
			$('body').attr('class', 'login-layout light-login');
			$('#id-text2').attr('class', 'grey');
			$('#id-company-text').attr('class', 'blue');

			e.preventDefault();
		});
		$('#btn-login-blur').on('click', function(e) {
			$('body').attr('class', 'login-layout blur-login');
			$('#id-text2').attr('class', 'white');
			$('#id-company-text').attr('class', 'light-blue');

			e.preventDefault();
		});

	});
</script>
</body>
</html>
