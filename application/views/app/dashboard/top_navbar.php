<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Keptiv | Data Berita</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="<?=base_url()?>assets/dashboard/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<!-- <link rel="stylesheet" href="<?=base_url()?>assets/dashboard/bower_components/bootstrap/dist/css/bootstrap-theme.min.css"> -->
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?=base_url()?>assets/dashboard/bower_components/font-awesome/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="<?=base_url()?>assets/dashboard/bower_components/Ionicons/css/ionicons.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="<?=base_url()?>assets/dashboard/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?=base_url()?>assets/dashboard/dist/css/AdminLTE.min.css">
	<!-- AdminLTE Skins. Choose a skin from the css/skins
folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="<?=base_url()?>assets/dashboard/dist/css/skins/_all-skins.min.css">
	<!-- bootstrap wysihtml5 - text editor -->
	<link rel="stylesheet" href="<?=base_url()?>assets/dashboard/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

	<!-- CKEditor 4.7.1 -->
	<script src="https://cdn.ckeditor.com/4.7.1/full-all/ckeditor.js"></script>

	<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap-tagsinput.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/css/GithubTheme.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/app_tags.css">
	<script>
		(function (i, s, o, g, r, a, m) {
			i['GoogleAnalyticsObject'] = r;
			i[r] = i[r] || function () {
				(i[r].q = i[r].q || []).push(arguments)
			}, i[r].l = 1 * new Date();
			a = s.createElement(o),
				m = s.getElementsByTagName(o)[0];
			a.async = 1;
			a.src = g;
			m.parentNode.insertBefore(a, m)
		})(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

		ga('create', 'UA-42755476-1', 'bootstrap-tagsinput.github.io');
		ga('send', 'pageview');
	</script>

	<link rel="stylesheet" href="<?=base_url()?>assets/css/style-admin.css">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

	<!-- Google Font -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">

		<header id="main-header" class="main-header">
			<!-- Logo -->
			<a href="<?=base_url()?>" class="logo">
				<!-- mini logo for sidebar mini 50x50 pixels -->
				<span class="logo-mini"><b>K</b></span>
				<!-- logo for regular state and mobile devices -->
				<span class="logo-lg"><b>Keptiv</b></span>
			</a>
			<!-- Header Navbar: style can be found in header.less -->
			<nav class="navbar navbar-static-top">
				<!-- Sidebar toggle button-->
				<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>

				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<!-- Messages: style can be found in dropdown.less-->
						<!-- User Account: style can be found in dropdown.less -->
						<li class="dropdown user user-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<?php if (isset($user)) {
                			foreach ($user as $value) { ?>
							<?php if ($value->image) { ?>
								<img src="<?=base_url()?>assets/avatar/<?php echo $value->image ?>" alt="Foto Profile" class="user-image" alt="User Image" style="object-fit: cover;">
                            <?php }else { ?>
                                <img src="<?=base_url()?>assets/avatar/unknow_profile.png" alt="Foto Profile" class="user-image" alt="User Image" style="object-fit: cover;">
                            <?php } ?>
							<?php }} ?>
								<!-- <img src="assets/dashboard/dist/img/user2-160x160.jpg" class="user-image" alt="User Image"> -->
								<?php if (isset($user)) {
                foreach ($user as $value) { ?>
								<span class="hidden-xs">
									<?php echo $value->name; ?></span>
								<?php }
                }else{ ?>
								<span class="hidden-xs">Nothing User Login</span>
								<?php } ?>
							</a>
							<ul class="dropdown-menu">
								<!-- User image -->
								<li class="user-header">
								<?php if (isset($user)) {
					foreach ($user as $value) { ?>
					<?php if ($value->image) { ?>
									<img src="<?=base_url()?>assets/avatar/<?php echo $value->image ?>" class="img-circle" alt="User Image" style="object-fit: cover;">
								<?php }else { ?>
									<img src="<?=base_url()?>assets/avatar/unknow_profile.png" alt="Foto Profile" class="user-image" alt="User Image" style="object-fit: cover;">
								<?php } ?>
									<!-- <img src="assets/dashboard/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image"> -->
									<p>
										<?php echo $value->name; ?>
										<small>
											<?php echo $this->session->userdata('level') ?></small>
									</p>
									<?php }
                  }else{ ?>
									<p>Nothing User Login
									</p>
									<?php } ?>
								</li>
								<!-- Menu Footer-->
								<li class="user-footer">
									<div class="pull-left">
									<?php if (isset($user)) {
                  						foreach ($user as $value) { ?>
										<a href="<?=base_url()?>Dashboard/profile" class="btn btn-default btn-flat">Profile</a>
									</div>
									<?php }} ?>
									<div class="pull-right">
										<a onclick="return confirm('Apakah anda yakin ingin keluar?');" href="<?=base_url()?>user/logout" class="btn btn-default btn-flat">Sign out</a>
									</div>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
		</header>