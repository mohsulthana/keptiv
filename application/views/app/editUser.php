<?php require_once 'dashboard/top_navbar.php' ?>
<!-- Left side column. contains the logo and sidebar -->
<?php require_once 'dashboard/left_navbar.php' ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Edit User
			<small>Advanced form element</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?=base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="<?=base_url()?>dashboard/User">User</a></li>
			<li class="active">Edit User</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
    <?php foreach ($data_user as $value) { ?>
		<form action="<?=base_url()?>user/editActionUser" method="post" enctype="multipart/form-data">
      		<div class="row">
				<div class="col-md-12">
					<div class="box box-info">
						<div class="box-header">
							<h3 class="box-title">Edit User
								<small>Advanced and full of features</small>
							</h3>
						</div>
						<!-- /.box-header -->
						<div class="box-body pad">
                            <input type="hidden" name="id" value="<?php echo $value->id ?>">
                            <div class="form-group">
								<label for="username">Username</label>
								<input type="text" name="username" id="username" class="form-control" value="<?php echo $value->username ?>">
							</div>

							<div class="form-group">
								<label for="username">Nama</label>
								<input type="text" name="name" id="name" class="form-control" value="<?php echo $value->name ?>">
							</div>

							<div class="form-group">
								<label for="username">E-mail</label>
								<input type="email" name="email" id="email" class="form-control" value="<?php echo $value->email ?>">
							</div>

							<div class="form-group">
								<label for="username">Jenis Kelamin</label>
								<ul class="list-unstyled" style="display: flex; align-items: center;">
									<li style="display: flex; align-items: center;">
										<input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="laki-laki" <?php if ($value->jenis_kelamin == 'laki-laki'){echo"checked";} ?>><p style="margin: 0 8px;">Laki-laki</p>
									</li>
									<li style="display: flex; align-items: center;">
										<input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="perempuan" <?php if ($value->jenis_kelamin == 'perempuan'){echo"checked";} ?>><p style="margin: 0 8px;">Perempuan</p>
									</li>
								</ul>
							</div>

							<div class="form-group">
								<label for="exampleInputFile">File input</label>
                                <input type="file" name="berkas" id="exampleInputFile" class="form-control">
                                <p class="help-block">Max 2MB.</p>
							</div>

							<div class="form-group">
								<label for="about_me">About me</label>
								<textarea name="about_me" id="about_me" cols="30" rows="10" class="form-control"><?php echo $value->about_me ?></textarea>
							</div>

							<div class="form-group">
								<input type="checkbox" name="is_admin" value="1" <?php if ($value->is_admin == '1'){echo"checked";} ?>> Admin
							</div>

							<div class="form-group" style="display: flex; justify-content: flex-end;">
                                <button type="submit" class="btn btn-primary" name="edit_user" value="edit_user">Edit</button>
                            </div>
						</div>
					<!-- /.box -->
				</div>
				<!-- /.col-->
			</div>
            <!-- ./row -->
		</form>
    <?php } ?>
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
	<div class="pull-right hidden-xs">
		<b>Version</b> 2.4.0
	</div>
	<strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
	reserved.
</footer>

<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<?php require_once 'dashboard/footer.php' ?>
<script>
	$(function () {
		// Replace the <textarea id="editor1"> with a CKEditor
		// instance, using default configuration.
		//bootstrap WYSIHTML5 - text editor
		$('#example1').DataTable()
		$('#example2').DataTable()
		$(".treeview-tables").last().addClass("active");
		$( ".menu-user" ).last().addClass( "active" );
	})

</script>
</body>

</html>