<?php require_once 'dashboard/top_navbar.php' ?>
<!-- Left side column. contains the logo and sidebar -->
<?php require_once 'dashboard/left_navbar.php' ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Tambah Berita
			<small>Advanced form element</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?=base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="<?=base_url()?>Dashboard">Berita</a></li>
			<li class="active">Tambah</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<form action="<?=base_url()?>Dashboard/AddActionBerita" method="post" enctype="multipart/form-data" id="AddBerita" >
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
							<div class="form-group">
                <label for="title">Judul Berita</label>
                <input type="text" name="title" id="" class="form-control">
              </div>

              <div class="form-group">
                <label for="exampleInputFile">File input</label>
								<input type="file" name="berkas" id="exampleInputFile" class="form-control">
								<p class="help-block">Max 2MB.</p>
              </div>

							<div class="form-group">
                <label for="judul">Kategori (Letak Penampilan di Web)</label>
                <select name="kategori" class="form-control">
                  <?php foreach ($this->db->get('categories')->result() as $key => $value) { ?>
                  <option value="<?php echo $value->id ?>">
                    <?php echo $value->name ?>
                  </option>
                  <?php } ?>
								</select>
              </div>

							<div class="form-group">
									<label for="judul">Kategori (Jenis Kategori Berita)</label>
									<input type="text" name="category_type" id="category_type" class="form-control">
								</div>
              
							<?php if ($this->session->userdata('level') != 'Member' ) { ?>
              <div class="form-group">
                <label for="title">Publish</label>
                <select name="is_publish" id="" class="form-control">
                  <option value="0">Correction</option>
                  <option value="1">Publish</option>
                  <option value="2">In Review</option>
                  <option value="3">Recomendation</option>
                  <option value="4">Headline</option>
                </select>
              </div>
							<?php } ?>
							
							<div class="form-group">
								<p class="label-seoSection">Meta SEO</p>
							</div>
							
              <div class="form-group">
                <label for="title">Meta Description</label>
                <input type="text" name="meta_description" id="" class="form-control">
              </div>

              <div class="form-group">
                <label for="title">Meta Author</label>
                <input type="text" name="meta_author" id="" class="form-control">
              </div>

              <div class="form-group">
                <label for="title">Meta Keywords</label>
                <input type="text" name="meta_keywords" id="" class="form-control">
              </div>

							<div class="form-group">
                <label for="title">Meta Location</label>
                <input type="text" name="meta_location" id="" class="form-control">
              </div>

							<div class="form-group tags-input">
                <label for="title">Tag Article</label>
								<input type="text" name="tag_article" id="" class="form-control" data-role="tagsinput">
              </div>

              <div class="form-group">
                <label for="title">Slug</label>
                <input type="text" name="slug" id="" class="form-control">
              </div>

							<div class="form-group">
                <label for="title">Sub Content</label>
								<textarea name="subContent" id="" rows="5" class="form-control"></textarea>
              </div>
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
							<textarea name="content"></textarea>
							<script>
											CKEDITOR.replace( 'content' );
							</script>
							<button type="submit" class="btn btn-primary btn-publishBerita" name="submit" value="submit">Publish <span class="fa fa-paper-plane"></span></button>
						</div>
					</div>
					<!-- /.box -->
				</div>
				<!-- /.col-->
			</div>
			<!-- ./row -->
		</form>
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
	$('#AddBerita').on('keyup keypress', function(e) {
		var keyCode = e.keyCode || e.which;
		if (keyCode === 13) { 
			e.preventDefault();
			return false;
		}
	});

</script>
</body>

</html>
