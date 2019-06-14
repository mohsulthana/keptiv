<?php require_once 'dashboard/top_navbar.php' ?>
<!-- Left side column. contains the logo and sidebar -->
<?php require_once 'dashboard/left_navbar.php' ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Detail Gambar Berita
			<small>advanced tables</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?=base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="<?=base_url()?>Dashboard/Gambar">Tables</a></li>
			<li class="active">Detail Gambar Berita</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">

    <?php foreach ($detail_image as $key => $value) { ?>
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header" style="padding: 25px;padding-bottom: 0px;">
						<h3 class="box-title">Detail Deskripsi Gambar Berita</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body" style="padding: 25px;">
                        <img src="<?=base_url()?>assets/uploads/<?php echo $value->image_name ?>" alt="<?php echo $value->image_name ?>">
                        <h5><b>Deskrip Berita</b></h5>
                        <p><?php echo $value->description ?></p>
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
    $( ".menu-gambarBerita" ).last().addClass( "active" );
  })
</script>
</body>

</html>
