<?php require_once 'dashboard/top_navbar.php' ?>
<!-- Left side column. contains the logo and sidebar -->
<?php require_once 'dashboard/left_navbar.php' ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Profile User
			<small>edit my profile</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?=base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="<?=base_url()?>dashboard">Profile</a></li>
			<li class="active">Edit</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
    <?php foreach ($data_profile as $value) { ?>
		<form action="<?=base_url()?>Dashboard/EditActionProfile" method="post" enctype="multipart/form-data">
      <div class="row">
				<div class="col-md-12">
					<div class="box box-info">
						<div class="box-header">
							<h3 class="box-title">My Profile
								<small>detail profile</small>
							</h3>
						</div>
						<!-- /.box-header -->
						<div class="box-body pad">
								<input type="hidden" name="id" value="<?php echo $value->id ?>">
								<div class="form-group">
									<label for="title">Username</label>
									<input type="text" name="username" id="" value="<?php echo $value->username ?>" class="form-control">
								</div>

								<div class="form-group">
									<label for="exampleInputFile">Foto Profile</label>
									<input type="file" name="berkas" id="exampleInputFile" class="form-control">
									<p class="help-block">Max 2MB.</p>
								</div>

								<div class="form-group">
									<label for="title">Fullname</label>
									<input type="text" name="name" id="" class="form-control" value="<?php echo $value->name ?>">
								</div>

								<div class="form-group">
									<label for="title">E-mail</label>
									<input type="email" name="email" id="" class="form-control" value="<?php echo $value->email ?>">
								</div>

								<div class="form-group">
									<label for="title">Gender</label>
                                    <select name="jenis_kelamin" id="" class="form-control">
                                        <option value="laki-laki" <?php if ($value->jenis_kelamin == "laki-laki") {echo "selected";} ?>>Male</option>
                                        <option value="perempuan" <?php if ($value->jenis_kelamin == "perempuan") {echo "selected";} ?>>Female</option>
                                    </select>
								</div>

								<div class="form-group">
									<label for="title">About me</label>
                                    <textarea name="about_me" id="" cols="30" rows="3" class="form-control"><?php echo $value->about_me ?></textarea>
								</div>
                                
								<div class="form-group">
									<input id="change_pass" type="checkbox" name="change_pass" id="change_pass" onclick="checkedReq()"> Reset Password?
								</div>

                                <div id="reset_password" class=""
                                style="display: none">
                                    <div class="form-group">
                                        <label for="judul">New Password</label>
                                        <input type="password" name="new_pass" id="category_type" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="judul">Repeat Password</label>
                                        <input type="password" name="re_pass" id="category_type" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
									<button type="submit" class="btn btn-info" name="edit_profile" value="edit_profile">Save</button>
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
		CKEDITOR.replace('editor1')
		//bootstrap WYSIHTML5 - text editor
		$('.textarea').wysihtml5()
		$('#example1').DataTable()
		$('#example2').DataTable()
		$( ".treeview-user" ).last().addClass( "active" );
        $( ".menu-user" ).last().addClass( "active" );
	})

    function checkedReq() {
		var checkBox = document.getElementById("change_pass");
		var objEl = $("#reset_password");
		// var objE2 = $("#title_requestFile");
		// var objE3 = $("#ifile");
		// var objE4 = $("#reqfile");
		if (checkBox.checked == true) {

			objEl.show();
			// objE2.show();
			// objE3.hide();
			// objE4.show();
		} else {

			objEl.hide();
			// objE2.hide();
			// objE3.show();
			// objE4.hide();
		}
	}

</script>
</body>

</html>