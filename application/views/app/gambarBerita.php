<?php /*$admin = false; foreach ($user as $value_user) {
  if ($value_user->level == 'Admin') { 
    $admin = true;
}}*/
$admin = false; ?>
<?php require_once 'dashboard/top_navbar.php' ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php require_once 'dashboard/left_navbar.php' ?>

  <style>
  a{
    color: #333542;
  }
  </style>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Gambar Berita
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?=base_url()?>Dashboard/Gambar">Tables</a></li>
        <li class="active">Gambar Berita</li>
      </ol>
    </section>

    <!-- Main content -->
    <div style="display: flex; align-items: center; margin: 15px 0 0 15px;">
      <a href="#" type="button" class="btn btn-success" data-toggle="modal" data-target="#modalAddGambar">Tambah</a>
    </div>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tabel Gambar Berita</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                	<th>No</th>
                	<th>ID# Berita</th>
                	<th>ID# Gambar</th>
                  <th>Nama</th>
                  <th>Deskripsi</th>
                  <th>Edit</th>
                  <th>Hapus</th>
                </tr>
                </thead>
                <tbody>

                <?php $i=0; foreach ($data_image as $key => $value) { ?>
                <tr>
                    <td><?php echo ++$i; ?></td>
                    <td><a href="<?=base_url()?>Dashboard/DetailBerita?id=<?php echo $value->id_article ?>"><?php echo $value->id_article ?></a></td>
                    <td><a href="<?=base_url()?>Dashboard/DetailImage?id=<?php echo $value->id ?>"><?php echo $value->id ?></a></td>
                    <td><a href="<?=base_url()?>Dashboard/DetailImage?id=<?php echo $value->id ?>">
                      <img style="width: 80px; height: 80px;" src="<?=base_url()?>assets/uploads/<?php echo $value->image_name ?>" alt="<?php echo $value->image_name ?>">
                    </a></td>
                    <td><a href="<?=base_url()?>Dashboard/DetailImage?id=<?php echo $value->id ?>"><?php echo word_limiter($value->description, 16) ?></a></td>
                    <td><a class="btn btn-warning" href="<?=base_url()?>dashboard/viewEditImage?id=<?php echo $value->id ?>">Edit</a></td>
                    <td><a onclick="return confirm('Apakah anda yakin ingin mengahpus berita ini?');" class="btn btn-danger" href="<?=base_url()?>dashboard/DeleteImage?id=<?php echo $value->id ?>">Hapus</a></td>
                </tr>
                <?php } ?>

                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
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

<?php require_once 'dashboard/footer.php' ?>
<?php require_once 'dashboard/modalGambar.php' ?>
<!-- page script -->
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
