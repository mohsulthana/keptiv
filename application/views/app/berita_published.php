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
        Data Berita Review
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?=base_url()?>Dashboard">Tables</a></li>
        <li class="active">Data Berita Review</li>
      </ol>
    </section>

    <!-- Main content -->
    <!-- <div style="display: flex; align-items: center; margin: 15px 0 0 15px;">
      <a href="<?=base_url()?>Dashboard/ViewAddBerita" type="button" class="btn btn-success">Tambah</a>
    </div> -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tabel Data Berita Review</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                	<th>No</th>
                	<th>ID#</th>
                	<th style="width: 150px;">Title</th>
                  <th>Headline</th>
                  <th>Umum</th>
                  <th>Sorotan</th>
                  <th>Pilihan Redaksi</th>
                  <th>Spesial</th>
                  <th>Kutipan</th>
                  <th>Date Publish</th>
                	<th>Action</th>
                  <th>Pembaca</th>
                </tr>
                </thead>
                <tbody>

                <?php $i=0; foreach ($data_berita as $key => $value) { ?>
                <tr>
                    <!-- No urut -->
                    <td><?php echo ++$i; ?></td>
                    <!-- ID# -->
                    <td><a href="<?=base_url()?>Dashboard/DetailBerita?id=<?php echo $value->idArtikel ?>"><?php echo $value->idArtikel ?></a></td>
                    <!-- Title -->
                    <td><a href="<?=base_url()?>Dashboard/DetailBerita?id=<?php echo $value->idArtikel ?>"><?php echo word_limiter($value->title, 8) ?></a></td>

                    <!-- Headline -->
                    <td><a href="<?=base_url()?>Dashboard/DetailBerita?id=<?php echo $value->idArtikel ?>">
                    <?php if ($value->is_headline) { ?>
                      <p class="label label-success">Yes</p>
                    <?php }else { ?>
                      <p class="label label-danger">No</p>
                    <?php } ?>
                    </a></td>

                    <!-- Umum -->
                    <td><a href="<?=base_url()?>Dashboard/DetailBerita?id=<?php echo $value->idArtikel ?>">
                    <?php if ($value->is_umum) { ?>
                      <p class="label label-success">Yes</p>
                    <?php }else { ?>
                      <p class="label label-danger">No</p>
                    <?php } ?>
                    </a></td>

                    <!-- Sorotan -->
                    <td><a href="<?=base_url()?>Dashboard/DetailBerita?id=<?php echo $value->idArtikel ?>">
                    <?php if ($value->is_sorotan) { ?>
                      <p class="label label-success">Yes</p>
                    <?php }else { ?>
                      <p class="label label-danger">No</p>
                    <?php } ?>
                    </a></td>


                    <!-- Pilihan Redaksi -->
                    <td><a href="<?=base_url()?>Dashboard/DetailBerita?id=<?php echo $value->idArtikel ?>">
                    <?php if ($value->is_pilihanredaksi) { ?>
                      <p class="label label-success">Yes</p>
                    <?php }else { ?>
                      <p class="label label-danger">No</p>
                    <?php } ?>
                    </a></td>

                    <!-- Spesial -->
                    <td><a href="<?=base_url()?>Dashboard/DetailBerita?id=<?php echo $value->idArtikel ?>">
                    <?php if ($value->is_spesial) { ?>
                      <p class="label label-success">Yes</p>
                    <?php }else { ?>
                      <p class="label label-danger">No</p>
                    <?php } ?>
                    </a></td>

                    <!-- Kutipan -->
                    <td><a href="<?=base_url()?>Dashboard/DetailBerita?id=<?php echo $value->idArtikel ?>">
                    <?php if ($value->is_kutipan) { ?>
                      <p class="label label-success">Yes</p>
                    <?php }else { ?>
                      <p class="label label-danger">No</p>
                    <?php } ?>
                    </a></td>

                    <!-- Date Publish -->
                    <td>
                      <?php
                      $dateFormated = explode(" ", $value->updated_article);
                      echo $dateFormated[0];
                      ?>
                    </td>
                    
                    <!-- Action -->
                    <td>
                    	<!-- Preview -->
                    	<a style="color: #0DB8BC;" href="<?=base_url()?>deskripsi/?id=<?php echo $value->idArtikel ?>"><button class="btn-xs btn-success"><span class="fa fa-eye"></span> Preview</button></a>

                        <!-- Accept for -->
                        <?php if ($this->session->userdata('level') == 'Super Admin' ) { ?>
                    	<a style="color: #0DB8BC;"><button class="btn-xs btn-info"
                        data-toggle="modal"
                        data-target="#acceptfor<?php echo $value->idArtikel ?>"><span class="fa fa-eye"></span> Accept for</button></a>
                        <?php } ?>

                        <!-- Edit -->
                    	<a style="color: #0DB8BC;" href="<?=base_url()?>dashboard/viewEditBerita?id=<?php echo $value->idArtikel ?>"><button class="btn-xs btn-warning"><span class="fa fa-edit"></span> Edit</button></a>
                        <!-- Delete -->
                    	<a onclick="return confirm('Apakah anda yakin ingin mengahpus berita ini?');" style="color: #0DB8BC;" href="<?=base_url()?>dashboard/DeleteBerita?id=<?php echo $value->idArtikel ?>"><button class="btn-xs btn-danger"><span class="fa fa-trash"></span> Hapus</button></a>
                    </td>

                    <!-- Jumlah pembaca -->
                    <td style="text-align: center"><?php
                    $sql = "SELECT * FROM `articles_viewers` WHERE articles_viewers.article_id = $value->idArtikel";
                    echo $this->db->query($sql)->num_rows();
                    ?></td>

                    <!-- Modal Accept for -->
                    <div class="modal fade" id="acceptfor<?php echo $value->idArtikel ?>" tabindex="-1" role="dialog"
                    	aria-labelledby="modalMasukTitle" aria-hidden="true">
                    	<div class="modal-dialog modal-dialog-centered" role="document">
                    		<div class="modal-content">
                        <form action="<?=base_url()?>dashboard/AcceptFor" method="post"
                    				enctype="multipart/form-data">
                    				<div class="modal-header">
                    					<h5 class="modal-title" id="exampleModalLongTitle">Accept for</h5>
                    					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    						<span aria-hidden="true">&times;</span>
                    					</button>
                    				</div>
                    				<div class="modal-body">
                    					<input type="hidden" name="id" value="<?php echo $value->idArtikel ?>">

                    					<div class="form-group">
                                <button type="submit" class="btn btn-success" name="publish" value="1">Just Publish</button>

                                <!-- <button type="submit" class="btn btn-primary" style="background-color: #D81B60 !important;" name="submit" value="3">For Recomendation</button>

                                <button type="submit" class="btn btn-primary" style="background-color: #605ca8 !important;" name="submit" value="4">For Headlines</button> -->
                    					</div>
                              <hr>

                              <div class="row">
                                <div class="col col-md-4">
                                  <div id="acceptfor" class="form-group acceptfor-between">
                                    <span class="label label-success label-acceptfor">Headline</span><input type="checkbox" name="is_headline" id="headline" style="margin: 0;" value="1">
                                  </div>

                                  <div id="acceptfor" class="form-group acceptfor-between">
                                    <span class="label label-info label-acceptfor">Umum</span><input type="checkbox" name="is_umum" id="headline" style="margin: 0;" value="1">
                                  </div>

                                  <div id="acceptfor" class="form-group acceptfor-between">
                                    <span class="label label-warning label-acceptfor">Sorotan</span><input type="checkbox" name="is_sorotan" id="headline" style="margin: 0;" value="1">
                                  </div>
                                </div>

                                <div class="col col-md-4 col-md-offset-2">
                                  <div id="acceptfor" class="form-group acceptfor-between">
                                    <span class="label label-danger label-acceptfor">Pilihan Redaksi</span><input type="checkbox" name="is_pilihanredaksi" id="headline" style="margin: 0;" value="1">
                                  </div>

                                  <div id="acceptfor" class="form-group acceptfor-between">
                                    <span class="label label-success label-acceptfor">Special</span><input type="checkbox" name="is_spesial" id="headline" style="margin: 0;" value="1">
                                  </div>

                                  <div id="acceptfor" class="form-group acceptfor-between">
                                    <span class="label label-info label-acceptfor">Kutipan</span><input type="checkbox" name="is_kutipan" id="headline" style="margin: 0;" value="1">
                                  </div>
                                </div>
                              </div>

                    				</div>
                    				<div class="modal-footer">
                              <button type="reset" class="btn btn-secondary"data-dismiss="modal">Close</button>

                              <button type="submit" class="btn btn-primary" name="submit" value="submit">Accept</button>
                    				</div>
                    			</form>
                    		</div>
                    	</div>
                    </div>
                    <!-- End of Modal Accept for -->

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
    $( ".menu-beritaPublished" ).last().addClass( "active" );
  })
</script>
</body>
</html>
