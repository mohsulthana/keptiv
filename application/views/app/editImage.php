<?php require_once 'dashboard/top_navbar.php' ?>
<!-- Left side column. contains the logo and sidebar -->
<?php require_once 'dashboard/left_navbar.php' ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Edit Gambar Berita
			<small>Advanced form element</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?=base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="<?=base_url()?>dashboard/Gambar">Gambar Berita</a></li>
			<li class="active">Edit Gambar Berita</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
    <?php foreach ($data_image as $value) { ?>
		<form action="<?=base_url()?>dashboard/EditActionImage" method="post" enctype="multipart/form-data">
      <div class="row">
				<div class="col-md-12">
					<div class="box box-info">
						<div class="box-header">
							<h3 class="box-title">Gambar Berita
								<small>Advanced and full of features</small>
							</h3>
						</div>
						<!-- /.box-header -->
						<div class="box-body pad">
                            <input type="hidden" name="id" value="<?php echo $value->id ?>">
                            <div class="form-group">
                                <label for="id_article">ID# Berita</label>
                                <input type="text" name="id_article" id="id_article" class="form-control" style="width: 240px;" value="<?php echo $value->id_article ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">File input</label>
                                <input type="file" name="berkas" id="exampleInputFile" class="form-control">
                                <p class="help-block">Max 2MB.</p>
                            </div>
                            <div class="form-group">
                                <label for="id_article">Deskripsi Gambar Berita</label>
                                <textarea name="description" id="description" cols="30" rows="10" class="form-control"><?php echo $value->description ?></textarea>
                            </div>
                            <div class="form-group" style="display: flex; justify-content: flex-end;">
                                <button type="submit" class="btn btn-primary" name="edit_image" value="edit_image">Edit</button>
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
		$( ".menu-gambarBerita" ).last().addClass( "active" );
	})

</script>
</body>

</html>