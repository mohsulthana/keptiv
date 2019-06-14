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
		<?php foreach ($data_advertisement as $value) { ?>
		<form action="<?=base_url()?>dashboard/editActionAdvertisement" method="post" enctype="multipart/form-data">
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
								<label for="username">Nama</label>
								<input type="text" name="name" id="name" class="form-control" value="<?php echo $value->name ?>">
							</div>

                            <div class="form-group">
                                <label for="exampleInputFile">File input</label>
                                <input type="file" name="berkas" id="exampleInputFile" class="form-control">
                                <p class="help-block">Max 2MB.</p>
                            </div>

                            <div class="form-group">
								<label for="username">Url</label>
								<input type="text" name="url" id="url" class="form-control" value="<?php echo $value->url ?>">
							</div>

                            <div class="form-group">
								<label for="username">Status</label>
								<select name="status" id="status" class="form-control">
                                    <option value="0" <?php if ($value->status == 0) { echo "selected"; } ?>>Hide</option>
                                    <option value="1" <?php if ($value->status == 1) { echo "selected"; } ?>>Show</option>
                                </select>
							</div>

                            <div class="form-group">
								<label for="username">Position</label>
								<select name="position" id="position" class="form-control">
                                    <option value="Space Iklan 1" <?php if ($value->position == 'Space Iklan 1') { echo "selected"; } ?>>Space Iklan 1</option>

                                    <option value="Space Iklan 2" <?php if ($value->position == 'Space Iklan 2') { echo "selected"; } ?>>Space Iklan 2</option>

                                    <option value="Space Iklan 3" <?php if ($value->position == 'Space Iklan 3') { echo "selected"; } ?>>Space Iklan 3</option>

                                    <option value="Space Iklan 4" <?php if ($value->position == 'Space Iklan 4') { echo "selected"; } ?>>Space Iklan 4</option>

                                    <option value="Space Iklan 5" <?php if ($value->position == 'Space Iklan 5') { echo "selected"; } ?>>Space Iklan 5</option>

                                    <option value="Space Iklan 6" <?php if ($value->position == 'Space Iklan 6') { echo "selected"; } ?>>Space Iklan 6</option>
                                </select>
							</div>

							<div class="
								 form-group" style="display: flex; justify-content: flex-end;">
								<button type="submit" class="btn btn-primary" name="edit_advertisement" value="edit_advertisement">Edit</button>
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
		$(".treeview-advertisement").last().addClass("active");
		$(".menu-advertisement").last().addClass("active");
	})

</script>
</body>

</html>
