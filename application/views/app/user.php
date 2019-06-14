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
        Data User
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?=base_url()?>Dashboard/user">Tables</a></li>
        <li class="active">Data User</li>
      </ol>
    </section>

    <!-- Main content -->
    <div style="display: flex; align-items: center; margin: 15px 0 0 15px;">
      <a href="#" type="button" class="btn btn-success" data-toggle="modal" data-target="#modalAddUser">Tambah</a>
    </div>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tabel Data User</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>ID#</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Email</th>
                    <th>Data Register</th>
                    <th>Position</th>
                    <th>Status</th>
                    <th>Option</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i=0; foreach ($all_user as $value)
                { $i++;?>
                  <tr>
                    <!-- No urut -->
                    <td><?php echo $i ?></td>
                    <!-- ID# -->
                    <td><?php echo $value->id; ?></td>
                    <!-- Name -->
                    <td><?php echo $value->name; ?></td>
                    <!-- Gender -->
                    <td><?php echo $value->jenis_kelamin; ?></td>
                    <!-- Email -->
                    <td><?php echo $value->email;?></td>
                    <!-- Date Register -->
                    <td><?php echo $value->created_at;?></td>

                    <!-- Position -->
                    <td><?php
                    if ($value->is_admin == 0) { ?>
                      <span class="label label-success">Member</span>
                    <?php }elseif ($value->is_admin == 1) { ?>
                      <span class="label label-warning">Admin</span>
                    <?php }elseif ($value->is_admin == 2) { ?>
                      <span class="label label-info">Super Admin</span>
                    <?php }
                    ?></td>

                    <!-- Status -->
                    <td><?php
                    if ($value->is_banned == 0) { ?>
                      <span class="label label-success">AKTIF</span>
                    <?php }elseif ($value->is_banned == 1) { ?>
                      <span class="label label-warning">LOCKED</span>
                    <?php }elseif ($value->is_banned == 2) { ?>
                      <span class="label label-info">INACTIVE</span>
                    <?php }
                    ?></td>

                    <!-- Option -->
                    <td>
                    <!-- Lock Unlock User -->
                    <?php if ($value->is_banned == 0) { ?>
                      <a style="color: #0DB8BC;" href="<?=base_url()?>User/LockUser?id=<?php echo $value->id;?>"><button class="btn-xs btn-danger"><span class="fa fa-lock"></span> Lock User</button></a>
                    <?php }elseif ($value->is_banned == 1) { ?>
                      <a style="color: #0DB8BC;" href="<?=base_url()?>User/UnlockUser?id=<?php echo $value->id;?>"><button class="btn-xs btn-success"><span class="fa fa-unlock"></span> Unlock User</button></a>
                    <?php } ?>

                    <!-- Up Lower position user -->
                    <?php if ($value->is_admin == 0) { ?>

                      <a style="color: #0DB8BC;" href="<?=base_url()?>User/UpPosition?id=<?php echo $value->id;?>"><button class="btn-xs btn-primary"><span class="fa fa-level-up"></span> Up the Position</button></a>

                    <?php }elseif ($value->is_admin == 1) {

                    $this->db->where('id', $this->session->userdata('id'));
                    $data_user_login = $this->db->get('users')->result();
                    foreach ($data_user_login as $key => $value_user_login) {
                      if ($value_user_login->is_admin == '2') { ?>

                        <a style="color: #0DB8BC;" href="<?=base_url()?>User/UpPosition?id=<?php echo $value->id;?>"><button class="btn-xs btn-primary"><span class="fa fa-level-up"></span> Up the Position</button></a>

                        <a style="color: #0DB8BC;" href="<?=base_url()?>User/LowPosition?id=<?php echo $value->id;?>"><button class="btn-xs btn-danger"><span class="fa fa-level-down"></span> Lower the Position</button></a>

                      <?php }else { ?>

                        <a style="color: #0DB8BC;" href="<?=base_url()?>User/LowPosition?id=<?php echo $value->id;?>"><button class="btn-xs btn-danger"><span class="fa fa-level-down"></span> Lower the Position</button></a>

                      <?php }
                      }

                    }elseif ($value->is_admin == 2) {
                      $this->db->where('id', $this->session->userdata('id'));
                    $data_user_login = $this->db->get('users')->result();
                    foreach ($data_user_login as $key => $value_user_login) {
                      if ($value_user_login->is_admin == '2') { ?>

                        <a style="color: #0DB8BC;" href="<?=base_url()?>User/LowPosition?id=<?php echo $value->id;?>"><button class="btn-xs btn-danger"><span class="fa fa-level-down"></span> Lower the Position</button></a>

                      <?php }
                      }
                    } ?>

                    </td>
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
    $( ".treeview-user" ).last().addClass( "active" );
    $( ".menu-user" ).last().addClass( "active" );
  })
</script>
</body>
</html>
