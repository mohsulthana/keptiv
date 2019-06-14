<?php require_once 'dashboard/top_navbar.php' ?>
<!-- Left side column. contains the logo and sidebar -->
<?php require_once 'dashboard/left_navbar.php' ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Detail Berita
			<small>advanced tables</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?=base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="<?=base_url()?>Dashboard">Tables</a></li>
			<li class="active">Detail Berita</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">

    <?php foreach ($detail_berita as $key => $value) { ?>
		<div class="row">
			<div class="col-xs-12">
				<div class="col-sm-6">
					<div class="box">
						<div class="box-header" style="padding: 25px;padding-bottom: 0px;">
							<h3 class="box-title">Detail Deskripsi Berita</h3>
						</div>
						<!-- /.box-header -->
						<div class="box-body" style="padding: 25px;">
							<div class="row" style="display: flex;align-items: center;margin-bottom: 8px;">
								<div class="col-sm-3">
									<h5 style="margin-top: 0px;margin-bottom: 0px; display: flex;justify-content: space-between;"><b>Judul</b><span>:</span></h5>
								</div>
								<div class="col-sm-9">
									<p style="margin-top: 0px;margin-bottom: 0px;"><?php echo $value->title ?></p>
								</div>
							</div>

                            <div class="row" style="display: flex;align-items: center;margin-bottom: 8px;">
								<div class="col-sm-3">
									<h5 style="margin-top: 0px;margin-bottom: 0px; display: flex;justify-content: space-between;"><b>Penulis</b><span>:</span></h5>
								</div>
								<div class="col-sm-9">
									<p style="margin-top: 0px;margin-bottom: 0px;"><?php echo $value->user_name ?></p>
								</div>
							</div>

                            <div class="row" style="display: flex;align-items: center;margin-bottom: 8px;">
								<div class="col-sm-3">
									<h5 style="margin-top: 0px;margin-bottom: 0px; display: flex;justify-content: space-between;"><b>Kategori</b><span>:</span></h5>
								</div>
								<div class="col-sm-9">
									<p style="margin-top: 0px;margin-bottom: 0px;"><?php echo $value->category_name ?></p>
								</div>
							</div>

                            <div class="row" style="display: flex;align-items: center;margin-bottom: 8px;">
								<div class="col-sm-3">
									<h5 style="margin-top: 0px;margin-bottom: 0px; display: flex;justify-content: space-between;"><b>Tanggal</b><span>:</span></h5>
								</div>
								<div class="col-sm-9">
									<p style="margin-top: 0px;margin-bottom: 0px;"><?php echo $value->created_article ?></p>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-sm-6">
					<div class="box">
						<div class="box-header" style="padding: 25px;padding-bottom: 0px;">
							<h3 class="box-title">Detail Meta Berita</h3>
						</div>
						<!-- /.box-header -->
						<div class="box-body" style="padding: 25px;">
							<div class="row" style="display: flex;align-items: center;margin-bottom: 8px;">
								<div class="col-sm-3">
									<h5 style="margin-top: 0px;margin-bottom: 0px; display: flex;justify-content: space-between;"><b>Meta Deskripsi</b><span>:</span></h5>
								</div>
								<div class="col-sm-9">
									<p style="margin-top: 0px;margin-bottom: 0px;"><?php echo $value->meta_description ?></p>
								</div>
							</div>

                            <div class="row" style="display: flex;align-items: center;margin-bottom: 8px;">
								<div class="col-sm-3">
									<h5 style="margin-top: 0px;margin-bottom: 0px; display: flex;justify-content: space-between;"><b>Meta Author</b><span>:</span></h5>
								</div>
								<div class="col-sm-9">
									<p style="margin-top: 0px;margin-bottom: 0px;"><?php echo $value->meta_author ?></p>
								</div>
							</div>

                            <div class="row" style="display: flex;align-items: center;margin-bottom: 8px;">
								<div class="col-sm-3">
									<h5 style="margin-top: 0px;margin-bottom: 0px; display: flex;justify-content: space-between;"><b>Meta Keywords</b><span>:</span></h5>
								</div>
								<div class="col-sm-9">
									<p style="margin-top: 0px;margin-bottom: 0px;"><?php echo $value->meta_keywords ?></p>
								</div>
							</div>

							<div class="row" style="display: flex;align-items: center;margin-bottom: 8px;">
								<div class="col-sm-3">
									<h5 style="margin-top: 0px;margin-bottom: 0px; display: flex;justify-content: space-between;"><b>Meta Location</b><span>:</span></h5>
								</div>
								<div class="col-sm-9">
									<p style="margin-top: 0px;margin-bottom: 0px;"><?php echo $value->meta_location ?></p>
								</div>
							</div>

							<div class="row" style="display: flex;align-items: center;margin-bottom: 8px;">
								<div class="col-sm-3">
									<h5 style="margin-top: 0px;margin-bottom: 0px; display: flex;justify-content: space-between;"><b>Tag</b><span>:</span></h5>
								</div>
								<div class="col-sm-9">
									<p style="margin-top: 0px;margin-bottom: 0px;"><?php echo $value->tag_article ?></p>
								</div>
							</div>

                            <div class="row" style="display: flex;align-items: center;margin-bottom: 8px;">
								<div class="col-sm-3">
									<h5 style="margin-top: 0px;margin-bottom: 0px; display: flex;justify-content: space-between;"><b>Slug</b><span>:</span></h5>
								</div>
								<div class="col-sm-9">
									<p style="margin-top: 0px;margin-bottom: 0px;"><?php echo $value->slug ?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->

		<?php if ($value->sugest != '') { ?>
		<div class="row">
			<div class="col-xs-12">
				<div class="col-sm-12">
					<div class="box">
						<div class="box-header" style="padding: 25px;padding-bottom: 0px;">
							<h3 class="box-title">Sugets Berita</h3>
						</div>
						<!-- /.box-header -->
						<div class="box-body" style="padding: 25px;">
							<div class="row" style="display: flex;align-items: center;margin-bottom: 8px;">
								<div class="col-sm-12">
									<p style="margin-top: 0px;margin-bottom: 0px;"><?php echo $value->sugest ?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /.col -->
		</div>
		<?php } ?>
		<!-- /.row -->

		<div class="row" style="margin: 0;">
			<div class="col-6">
				<div class="box">
					<div class="box-header" style="padding: 25px;padding-bottom: 0px;">
						<h3 class="box-title">Gambar Deskripsi Berita</h3>
					</div>
					<!-- /.box-header -->
					<?php if ($value->is_video == 1) { ?>

					<div class="box-body" style="padding: 25px;">
						<video style="width: 100% !important;" controls>
							<source src="<?=base_url()?>assets/videos/<?php echo $value->img_article ?>" type="video/mp4">
						</video>
                    </div>

					<?php }else { ?>

					<div class="box-body" style="padding: 25px;">
						<img style="width: 100% !important;" src="<?=base_url()?>assets/uploads/<?php echo $value->img_article ?>" alt="<?php echo $value->img_article ?>">
                    </div>

					<?php } ?>
				</div>
			</div>
		</div>

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header" style="padding: 25px;padding-bottom: 0px;">
						<h3 class="box-title">Deskripsi Berita</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body" style="padding: 25px;">
                        <h5><b>Deskrip Berita</b></h5>
                        <p><?php echo $value->content ?></p>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php require_once 'dashboard/footer.php' ?>

<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable()
    $( ".treeview-tables" ).last().addClass( "active" );
    $( ".menu-berita" ).last().addClass( "active" );
  })
</script>
</body>

</html>
