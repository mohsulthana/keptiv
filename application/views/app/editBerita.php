<?php require_once 'dashboard/top_navbar.php' ?>
<!-- Left side column. contains the logo and sidebar -->
<?php require_once 'dashboard/left_navbar.php' ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Edit Berita
			<small>Advanced form element</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?=base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="<?=base_url()?>dashboard">Berita</a></li>
			<li class="active">Tambah</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
    <?php foreach ($data_berita as $value) { ?>
		<form action="<?=base_url()?>Dashboard/EditActionBerita" method="post" enctype="multipart/form-data" id="EditBerita">
      <div class="row">
				<div class="col-md-12">
					<div class="box box-info">
						<div class="box-header">
							<h3 class="box-title">Konten Berita
								<small>Advanced and full of features</small>
							</h3>
						</div>
						<!-- /.box-header -->
						<div class="box-body pad">
								<input type="hidden" name="id" value="<?php echo $value->id ?>">
								<div class="form-group">
									<label for="title">Judul Berita</label>
									<input type="text" name="title" id="" value="<?php echo $value->title ?>" class="form-control">
								</div>

								<div class="form-group">
									<label for="exampleInputFile">File input</label>
									<input type="file" name="berkas" id="exampleInputFile" class="form-control">
									<p class="help-block">Max 2MB.</p>
								</div>

								<div class="form-group">
									<label for="judul">Kategori (Letak Penampilan di Web)</label>
									<select name="kategori" class="form-control">
										<?php foreach ($this->db->get('categories')->result() as $key => $v_category) { ?>
										<option value="<?php echo $v_category->id ?>" <?php if ($value->category_id == $v_category->id) { echo "selected"; } ?>>
											<?php echo $v_category->name ?>
										</option>
										<?php } ?>
									</select>
								</div>

								<div class="form-group">
									<label for="judul">Kategori (Jenis Kategori Berita)</label>
									<input type="text" name="category_type" id="category_type" class="form-control" value="<?php echo $value->category_type ?>">
								</div>
								<?php if ($this->session->userdata('level') != 'Member') { ?>
								<div class="form-group">
									<label for="title">Publish</label>
									<select name="is_publish" id="" class="form-control">
										<option value="0" <?php if ($value->is_publish == 0) { echo "selected"; } ?>>Correction</option>

										<option value="1" <?php if ($value->is_publish == 1) { echo "selected"; } ?>>Publish</option>

										<option value="2" <?php if ($value->is_publish == 2) { echo "selected"; } ?>>In Review</option>

										<option value="3" <?php if ($value->is_publish == 3) { echo "selected"; } ?>>Recomendation</option>

										<option value="4" <?php if ($value->is_publish == 4) { echo "selected"; } ?>>Headline</option>
									</select>
								</div>
								<?php } ?>

								<div class="form-group">
									<p class="label-seoSection">Meta SEO</p>
								</div>

								<div class="form-group">
									<label for="title">Meta Description</label>
									<input type="text" name="meta_description" id="" class="form-control" value="<?php echo $value->meta_description ?>">
								</div>

								<div class="form-group">
									<label for="title">Meta Author</label>
									<input type="text" name="meta_author" id="" class="form-control" value="<?php echo $value->meta_author ?>">
								</div>

								<div class="form-group">
									<label for="title">Meta Keywords</label>
									<input type="text" name="meta_keywords" id="" class="form-control" value="<?php echo $value->meta_keywords ?>">
								</div>

								<div class="form-group">
                <label for="title">Meta Location</label>
                <input type="text" name="meta_location" id="" class="form-control" value="<?php echo $value->meta_location ?>">
              </div>

							<div class="form-group tags-input">
                <label for="title">Tag Article</label>
                <input type="text" name="tag_article" id="" class="form-control" value="<?php echo $value->tag_article ?>" data-role="tagsinput">
              </div>

								<div class="form-group">
									<label for="title">Slug</label>
									<input type="text" name="slug" id="" class="form-control" value="<?php echo $value->slug ?>">
								</div>

								<div class="form-group">
									<label for="title">Sub Content</label>
									<textarea name="subContent" id="" rows="5" class="form-control"><?php echo $value->sub_content ?></textarea>
								</div>
							</div>
					<!-- /.box -->
				</div>
				<!-- /.col-->
			</div>
      <!-- ./row -->
      
			<div class="row">
				<div class="col-md-12">
					<div class="box box-info">
						<div class="box-header">
							<h3 class="box-title">Konten Berita
								<small>Advanced and full of features</small>
							</h3>
							<!-- tools box -->
							<div class="pull-right box-tools">
								<button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
									<i class="fa fa-minus"></i></button>
								<button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
									<i class="fa fa-times"></i></button>
							</div>
							<!-- /. tools -->
						</div>
						<!-- /.box-header -->
						<div class="box-body pad">
							<textarea id="editor1" name="content" rows="10" cols="80"><?php echo $value->content ?></textarea>
							<button type="submit" class="btn btn-primary btn-publishBerita" name="edit_berita" value="edit_berita">Save <span class="fa fa-paper-plane"></span></button>
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
		$(".treeview-tables").last().addClass("active");
		$(".menu-berita").last().addClass("active");
	})

	$('#EditBerita').on('keyup keypress', function(e) {
		var keyCode = e.keyCode || e.which;
		if (keyCode === 13) { 
			e.preventDefault();
			return false;
		}
	});

</script>
</body>

</html>