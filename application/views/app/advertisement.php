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
        Data Kategori
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?=base_url()?>Dashboard/kategori">Tables</a></li>
        <li class="active">Data Kategori</li>
      </ol>
    </section>

    <!-- Main content -->
    <!-- <div style="display: flex; align-items: center; margin: 15px 0 0 15px;">
      <a href="#" type="button" class="btn btn-success" data-toggle="modal" data-target="#modalAddKategori">Tambah</a>
    </div> -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tabel Data Advertisement</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Position</th>
                    <th>Name</th>
                    <th>Url</th>
                    <th>Satus</th>
                    <th>Option</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i=0; foreach ($data_advertisement as $value)
                { $i++;?>
                  <tr>
                    <!-- No urut -->
                    <td><?php echo $i ?></td>
                    <!-- Position -->
                    <td><?php echo $value->position; ?></td>
                    <!-- Name -->
                    <td><?php echo $value->name; ?></td>
                    <!-- Url -->
                    <td><?php echo $value->url; ?></td>
                    <!-- Satus -->
                    <td><?php
                    if ($value->status == 0) { ?>
                        <span class="label label-warning">Hide</span>
                    <?php }else { ?>
                        <span class="label label-success">Show</span>
                    <?php }
                    ?></td>

                    <td><a style="color: #0DB8BC;" href="<?=base_url()?>dashboard/viewEditAdvertisement?id=<?php echo $value->id;?>"><button class="btn-xs btn-warning"><span class="fa fa-edit"></span> Edit</button></a></td>
                  </tr>
                  <?php }?>
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
    $( ".treeview-advertisement" ).last().addClass( "active" );
    $( ".menu-advertisement" ).last().addClass( "active" );
  })
</script>
</body>
</html>
