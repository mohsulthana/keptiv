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
              <h3 class="box-title">Tabel Data Complain</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile Phone</th>
                    <th>Complain</th>
                    <th>Desired Result</th>
                    <th>Status Complain</th>
                    <th>Reply</th>
                    <th style="width: 40px;">Option</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i=0; foreach ($data_complain as $value)
                { $i++;?>
                  <tr>
                    <!-- No urut -->
                    <td><?php echo $i ?></td>
                    <!-- Nama -->
                    <td><?php echo $value->name; ?></td>
                    <!-- Email -->
                    <td><?php echo $value->email; ?></td>
                    <!-- Mobile Phone -->
                    <td><?php echo $value->mobile; ?></td>
                    <!-- Complain -->
                    <td><?php echo $value->complain; ?></td>
                    <!-- Desired Result -->
                    <td><?php echo $value->result; ?></td>

                    <!-- Status Complain -->
                    <td><?php
                    if ($value->status == '0') { ?>
                      <span class="label label-warning">NOT REPLY</span>
                    <?php }elseif ($value->status == '1') { ?>
                      <span class="label label-success">ALREADY IN REPLY</span>
                    <?php }
                    ?></td>

                    <!-- Reply -->
                    <td><?php echo $value->reply; ?></td>

                    <!-- Option -->
                    <td><a style="color: #0DB8BC;"><button class="btn-xs btn-warning"
                    data-toggle="modal"
                    data-target="#replyComplain<?php echo $value->id ?>"><span class="fa fa-edit"></span> Answer</button></a></td>

                    <!-- Modal Reply Complain -->
                    <div class="modal fade" id="replyComplain<?php echo $value->id ?>" tabindex="-1" role="dialog"
                    	aria-labelledby="modalMasukTitle" aria-hidden="true">
                    	<div class="modal-dialog modal-dialog-centered" role="document">
                    		<div class="modal-content">
                    			<form action="<?=base_url()?>dashboard/ReplyComplain" method="post"
                    				enctype="multipart/form-data">
                    				<div class="modal-header">
                    					<h5 class="modal-title" id="exampleModalLongTitle">Reply Complain</h5>
                    					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    						<span aria-hidden="true">&times;</span>
                    					</button>
                    				</div>
                    				<div class="modal-body">
                    					<input type="hidden" name="id" value="<?php echo $value->id ?>">
                    					<input type="hidden" name="email_to" value="<?php echo $value->email ?>"

                    					<div class="form-group">
                    						<label for="username">Reply Message</label>
                    						<div class="box-body pad">
                    							<textarea id="reply_complain" name="reply_complain" class="form-control" rows="5" placeholder="Type your reply..."></textarea>
                    						</div>
                    					</div>

                    				</div>
                    				<div class="modal-footer" style="background: #fff;">
                    					<button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    					<button type="submit" class="btn btn-primary" name="submit" value="submit">Kirim</button>
                    				</div>
                    			</form>
                    		</div>
                    	</div>
                    </div>
                    <!-- End of Modal Reply Complain -->

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
    $( ".treeview-complain" ).last().addClass( "active" );
    $( ".menu-complain" ).last().addClass( "active" );
  })
</script>
</body>
</html>
