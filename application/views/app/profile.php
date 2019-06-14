<?php require_once 'dashboard/top_navbar.php' ?>
<!-- Left side column. contains the logo and sidebar -->
<?php require_once 'dashboard/left_navbar.php' ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Profile User
			<small>my profile</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?=base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="<?=base_url()?>Dashboard">Management User</a></li>
			<li class="active">Detail Profile</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">

    <?php foreach ($detail_profile as $key => $value) { ?>
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header" style="padding: 25px;padding-bottom: 0px;">
						<h3 class="box-title" style="float: left;">Detail Profile</h3>
                        <a href="<?=base_url()?>Dashboard/viewEditProfile" type="button"
                        class="btn btn-warning"
                        style="float: right;">Edit</a>
					</div>
					<!-- /.box-header -->
					<div class="box-body" style="padding: 25px;">
                        <div class="" style="display: flex; align-items: center;">
                            <?php if ($value->image) { ?>
                                <img src="<?=base_url()?>assets/avatar/<?php echo $value->image ?>" alt="Foto Profile" style="width: 80px; height: 80px; object-fit: cover; border-radius: 50%;">
                            <?php }else { ?>
                                <img src="<?=base_url()?>assets/avatar/unknow_profile.png" alt="Foto Profile" style="width: 80px; height: 80px; object-fit: cover; border-radius: 50%;">
                            <?php } ?>
                            <div class="" style="margin-left: 16px;">
                                <p style="margin: 0; font-size: 18px;"><b><?php echo $value->username ?></b></p>
                                <p style="margin: 0; font-size: 14px; color: #696969;">
                                <?php if ($value->is_admin == 0) {
                                    echo "Member";
                                }elseif ($value->is_admin == 1) {
                                    echo "Admin";
                                }elseif ($value->is_admin == 2) {
                                    echo "Super Admin";
                                }else {
                                    echo "Unknow";
                                } ?></p>
                            </div>
                        </div>
                        <hr>
                        <p><b>Fullname</b></p>
                        <p><?php echo $value->name ?></p>
                        <p><b>E-mail</b></p>
                        <p><?php echo $value->email ?></p>
                        <p><b>Gender</b></p>
                        <p><?php echo $value->jenis_kelamin ?></p>
                        <p><b>About Me</b></p>
                        <p><?php echo $value->about_me ?></p>
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
    $( ".treeview-user" ).last().addClass( "active" );
    $( ".menu-user" ).last().addClass( "active" );
  })
</script>
</body>

</html>
