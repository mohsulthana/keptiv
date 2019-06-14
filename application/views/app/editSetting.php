<?php require_once 'dashboard/top_navbar.php' ?>
<!-- Left side column. contains the logo and sidebar -->
<?php require_once 'dashboard/left_navbar.php' ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Edit Kategori
			<small>Advanced form element</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?=base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="<?=base_url()?>dashboard/User">Kategori</a></li>
			<li class="active">Edit Kategori</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<?php foreach ($data_setting as $value) { ?>
		<form action="<?=base_url()?>dashboard/editActionSetting" method="post" enctype="multipart/form-data">
			<div class="row">
				<div class="col-md-12">
					<div class="box box-info">
						<div class="box-header">
							<h3 class="box-title">Edit Setting
								<small>Advanced and full of features</small>
							</h3>
						</div>
						<!-- /.box-header -->
						<div class="box-body pad">
							<input type="hidden" name="id" value="<?php echo $value->id ?>">
							<div class="form-group">
								<label for="username">Key</label>
								<input type="text" name="key" id="key" class="form-control" value="<?php echo $value->key ?>">
							</div>

							<div class="form-group">
								<label for="username">Value</label>
								<input type="text" name="value" id="value" class="form-control" value="<?php echo $value->value ?>">
							</div>

							<div class="
								 form-group" style="display: flex; justify-content: flex-end;">
								<button type="submit" class="btn btn-primary" name="edit_setting" value="edit_setting">Edit</button>
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
		$(".treeview-setting").last().addClass("active");
		$(".menu-setting").last().addClass("active");
	})

</script>
</body>

</html>
