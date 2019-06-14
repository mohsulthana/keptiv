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
    <div style="display: flex; align-items: center; margin: 15px 0 0 15px;">
      <a href="#" type="button" class="btn btn-success" data-toggle="modal" data-target="#modalAddKategori">Tambah</a>
    </div>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tabel Data Kategori</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>ID#</th>
                    <th>Nama Kategori</th>
                    <th>Sub Kategori 1</th>
                    <th>Sub Kategori 2</th>
                    <th>Sub Kategori 3</th>
                    <th>Sub Kategori 4</th>
                    <th>Sub Kategori 5</th>
                    <th>Option</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i=0; foreach ($data_kategori as $value)
                { $i++;?>
                  <tr>
                    <!-- No urut -->
                    <td><?php echo $i ?></td>
                    <!-- ID# -->
                    <td><?php echo $value->id; ?></td>
                    <!-- Nama Kategori -->
                    <td><?php echo $value->name; ?></td>
                    <!-- Sub Kategori 1 -->
                    <td><?php echo $value->sub_category1; ?></td>
                    <!-- Sub Kategori 2 -->
                    <td><?php echo $value->sub_category2; ?></td>
                    <!-- Sub Kategori 3 -->
                    <td><?php echo $value->sub_category3; ?></td>
                    <!-- Sub Kategori 4 -->
                    <td><?php echo $value->sub_category4; ?></td>
                    <!-- Sub Kategori 5 -->
                    <td><?php echo $value->sub_category5; ?></td>

                    <td><a style="color: #0DB8BC;" href="<?=base_url()?>dashboard/viewEditKategori?id=<?php echo $value->id;?>"><button class="btn-xs btn-warning"><span class="fa fa-edit"></span> Edit</button></a></td>
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
    $( ".treeview-category" ).last().addClass( "active" );
    $( ".menu-category" ).last().addClass( "active" );
  })
</script>
</body>
</html>
