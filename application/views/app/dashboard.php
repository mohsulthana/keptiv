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
        Data Berita
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?=base_url()?>Dashboard">Tables</a></li>
        <li class="active">Data Berita</li>
      </ol>
    </section>

    <!-- Main content -->
    <div style="display: flex; align-items: center; margin: 15px 0 0 15px;">
      <a href="<?=base_url()?>Dashboard/ViewAddBerita" type="button" class="btn btn-success">Tambah</a>
    </div>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tabel Data Berita</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                	<th>No</th>
                  <th>ID#</th>
                	<th style="width: 270px;">Title</th>
                	<th style="width: 50px;">Author</th>
                  <th style="width: 50px;">Category</th>
                  <th style="width: 50px;">Date of Created</th>
                  <th style="width: 50px;">Reason Rejected</th>
                  <th style="width: 50px;">Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

                <?php $i=0; foreach ($data_berita as $key => $value) { ?>
                <tr>
                    <td><?php echo ++$i; ?></td>

                    <td><a href="<?=base_url()?>Dashboard/DetailBerita?id=<?php echo $value->idArtikel ?>"><?php echo $value->idArtikel ?></a></td>

                    <td><a href="<?=base_url()?>Dashboard/DetailBerita?id=<?php echo $value->idArtikel ?>"><?php echo word_limiter($value->title, 8) ?></a></td>

                    <td><a href="<?=base_url()?>Dashboard/DetailBerita?id=<?php echo $value->idArtikel ?>"><?php echo $value->meta_author ?></a></td>

                    <td><a href="<?=base_url()?>Dashboard/DetailBerita?id=<?php echo $value->idArtikel ?>"><?php echo $value->name ?></a></td>

                    <td><a href="<?=base_url()?>Dashboard/DetailBerita?id=<?php echo $value->idArtikel ?>"><?php echo $value->created_article ?></a></td>

                    <td><a href="<?=base_url()?>Dashboard/DetailBerita?id=<?php echo $value->idArtikel ?>"><?php echo word_limiter($value->sugest, 6) ?></a></td>

                    <td><a href="<?=base_url()?>Dashboard/DetailBerita?id=<?php echo $value->idArtikel ?>"><?php
                    if ($value->is_publish == '0') { ?>
                      <span class="label label-warning">Correction</span>
                    <?php }elseif ($value->is_publish == '1') { ?>
                      <span class="label label-success">Publish</span>
                    <?php }elseif ($value->is_publish == '2') { ?>
                      <span class="label label-info">In Review</span>
                    <?php }elseif ($value->is_publish == '3') { ?>
                      <span class="label label-success" style="background-color: #D81B60 !important;">Recomendation</span>
                    <?php }elseif ($value->is_publish == '4') { ?>
                      <span class="label label-success" style="background-color: #605ca8 !important;">Headlines</span>
                    <?php }elseif ($value->is_publish == '5') { ?>
                      <span class="label label-danger">Revision</span>
                    <?php }
                    ?></a></td>

                    <td>
                      <a style="color: #0DB8BC;" href="<?=base_url()?>deskripsi/?id=<?php echo $value->idArtikel ?>"><button class="btn-xs btn-success"><span class="fa fa-eye"></span> Preview</button></a>

                      <a style="color: #0DB8BC;" href="<?=base_url()?>dashboard/viewEditBerita?id=<?php echo $value->idArtikel ?>"><button class="btn-xs btn-info"><span class="fa fa-edit"></span> Edit</button></a>

                      <a onclick="return confirm('Apakah anda yakin ingin mengahpus berita ini?');" style="color: #0DB8BC;" href="<?=base_url()?>dashboard/DeleteBerita?id=<?php echo $value->idArtikel ?>"><button class="btn-xs btn-danger"><span class="fa fa-trash"></span> Hapus</button></a>
                    </td>
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
<!-- page script -->
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
