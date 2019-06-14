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
		<?php foreach ($data_kategori as $value) { ?>
		<form action="<?=base_url()?>dashboard/editActionKategori" method="post" enctype="multipart/form-data">
			<div class="row">
				<div class="col-md-12">
					<div class="box box-info">
						<div class="box-header">
							<h3 class="box-title">Edit Kategori
								<small>Advanced and full of features</small>
							</h3>
						</div>
						<!-- /.box-header -->
						<div class="box-body pad">
							<input type="hidden" name="id" value="<?php echo $value->id ?>">
							<div class="form-group">
								<label for="username">Nama Kategori</label>
								<input type="text" name="name" id="name" class="form-control" value="<?php echo $value->name ?>">
							</div>

							<div class="form-group">
								<label for="username">Sub Kategori 1</label>
								<input type="text" name="sub_category1" id="sub_category1" class="form-control" value="<?php echo $value->sub_category1 ?>">
							</div>

							<div class="form-group">
								<label for="username">Sub Kategori 2</label>
								<input type="text" name="sub_category2" id="sub_category2" class="form-control" value="<?php echo $value->sub_category2 ?>">
							</div>

							<div class="form-group">
								<label for="username">Sub Kategori 3</label>
								<input type="text" name="sub_category3" id="sub_category3" class="form-control" value="<?php echo $value->sub_category3 ?>">
							</div>

							<div class="form-group">
								<label for="username">Sub Kategori 4</label>
								<input type="text" name="sub_category4" id="sub_category4" class="form-control" value="<?php echo $value->sub_category4 ?>">
							</div>

							<div class="form-group">
								<label for="username">Sub Kategori 5</label>
								<input type="text" name="sub_category5" id="sub_category5" class="form-control" value="<?php echo $value->sub_category5 ?>">
							</div>

							<div class="form-group">
								<label for="username">Slug Kategori</label>
								<input type="text" name="slug" id="slug" class="form-control" value="<?php echo $value->slug ?>">
							</div>

							<div class="
								 form-group" style="display: flex; justify-content: flex-end;">
								<button type="submit" class="btn btn-primary" name="edit_kategori" value="edit_kategori">Edit</button>
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
		$(".treeview-category").last().addClass("active");
		$(".menu-category").last().addClass("active");
	})

</script>
</body>

</html>
