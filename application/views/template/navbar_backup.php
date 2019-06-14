<?php
$login = false;
$member = false;
$admin = false;
$super_admin = false;
if ($this->session->userdata('status') == 'login') {
    $login = true;
    $id_user = $this->session->userdata('id');
    $this->db->where('id', $id_user);
    $user_login = $this->db->get('users')->result();

    foreach ($user_login as $key => $value) {
        if ($value->is_admin == 0) {
            $member = true;
        }elseif ($value->is_admin == 1) {
            $admin = true;
        }elseif ($value->is_admin == 2) {
            $super_admin = true;
        }
        $nama_user = $value->name;
    }
}
$navbar = $this->db->get('categories')->result_array();
?>

<nav class="navbar navbar-dark navbar-expand-md fixed-top bg-dark" style="background-color: #fff !important;box-shadow: 0 3px 12px 0 rgba(34, 34, 34, 0.09);; height: 65px;">
	<div class="container"><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1" style="background: #0DB8BC;"><span class="sr-only">Toggle
				navigation</span><span class="navbar-toggler-icon"></span></button>
		<div class="collapse navbar-collapse" id="navcol-1"style="background: white;">
			<ul class="nav navbar-nav flex-grow-1 justify-content-between">
                <li class="nav-item" role="presentation"><a class="nav-link" href="<?=base_url()?>" style="color: #0DB8BC;text-align: center;   "><i
						 class="fab fa-apple apple-logo"></i></a></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>   
                <li></li>
				<li id="nav-home" class="nav-item" role="presentation"><a class="nav-link" href="<?=base_url()?>" style="color: #0DB8BC;text-align: center;s">Home</a></li>

                <?php for ($i=0; $i < count($navbar); $i++) { 
                    if ($navbar[$i]['name'] == 'VIRAL') { ?>
                        <li id="nav-viral" class="nav-item" role="presentation">
                            <div class="dropdown show">
                                <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                    style="color: #0DB8BC;text-align: center;">Viral</a>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink"
                                style="margin-top:11px;">
                                    <a class="dropdown-item" href="<?=base_url()?>viral"><?php echo $navbar[$i]['name'] ?></a>
                                    <?php for ($a=1; $a < 6; $a++) { ?>
                                        <a class="dropdown-item" href="<?=base_url()?>viral"><?php echo $navbar[$i]['sub_category'.$a] ?></a>
                                    <?php } ?>
                                </div>
                            </div>
                        </li>
                <?php }
                } ?>
                
                <?php for ($i=0; $i < count($navbar); $i++) { 
                    if ($navbar[$i]['name'] == 'OPINI') { ?>
                        <li id="nav-opini" class="nav-item" role="presentation">
                            <div class="dropdown show">
                                <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                    style="color: #0DB8BC;text-align: center;">Opini</a>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink"
                                style="margin-top:11px;">
                                    <a class="dropdown-item" href="<?=base_url()?>opini"><?php echo $navbar[$i]['name'] ?></a>
                                    <?php for ($a=1; $a < 6; $a++) { ?>
                                        <a class="dropdown-item" href="<?=base_url()?>opini"><?php echo $navbar[$i]['sub_category'.$a] ?></a>
                                    <?php } ?>
                                </div>
                            </div>
                        </li>
                <?php }
                } ?>

                <?php for ($i=0; $i < count($navbar); $i++) { 
                    if ($navbar[$i]['name'] == 'UNIK') { ?>
                        <li id="nav-unik" class="nav-item" role="presentation">
                            <div class="dropdown show">
                                <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                    style="color: #0DB8BC;text-align: center;">Unik</a>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink"
                                style="margin-top:11px;">
                                    <a class="dropdown-item" href="<?=base_url()?>unik"><?php echo $navbar[$i]['name'] ?></a>
                                    <?php for ($a=1; $a < 6; $a++) { ?>
                                        <a class="dropdown-item" href="<?=base_url()?>unik"><?php echo $navbar[$i]['sub_category'.$a] ?></a>
                                    <?php } ?>
                                </div>
                            </div>
                        </li>
                <?php }
                } ?>

                <?php for ($i=0; $i < count($navbar); $i++) { 
                    if ($navbar[$i]['name'] == 'SPORT') { ?>
                        <li id="nav-sport" class="nav-item" role="presentation">
                            <div class="dropdown show">
                                <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                    style="color: #0DB8BC;text-align: center;">Sport</a>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink"
                                style="margin-top:11px;">
                                    <a class="dropdown-item" href="<?=base_url()?>sport"><?php echo $navbar[$i]['name'] ?></a>
                                    <?php for ($a=1; $a < 6; $a++) { ?>
                                        <a class="dropdown-item" href="<?=base_url()?>sport"><?php echo $navbar[$i]['sub_category'.$a] ?></a>
                                    <?php } ?>
                                </div>
                            </div>
                        </li>
                <?php }
                } ?>

				<li id="nav-lainnya" class="nav-item" role="presentation">
                    <div class="dropdown show">
                        <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                            style="color: #0DB8BC;text-align: center;">Lainnya</a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink"
                        style="margin-top:11px;">
                            <a class="dropdown-item" href="<?=base_url()?>lainnya/foto">Foto</a>
                            <a class="dropdown-item" href="<?=base_url()?>lainnya/video">Video</a>
                        </div>
                    </div>
                </li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>

                <?php if ($member && $login || $admin && $login || $super_admin && $login) { ?>
                    <li class="nav-item" role="presentation"></li>
                    <li class="nav-item" role="presentation">
                        <div class="dropdown show">
                            <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                style="color: #0DB8BC; text-align: center;"><?php echo $nama_user ?></a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="<?=base_url()?>dashboard" style="color: #0DB8BC;">Dashboard</a>
                                <a class="dropdown-item" href="<?=base_url()?>user/logout">Keluar</a>
                            </div>
                        </div>
                    </li>

                <?php }else { ?>
				    <li class="nav-item" role="presentation"><a href="#" class="nav-link" style="color: #0DB8BC;text-align: center;" data-toggle="modal"
					 data-target="#modalDaftar">Daftar</a></li>

				    <li class="nav-item" role="presentation"><a href="#" class="nav-link" style="color: #0DB8BC;text-align: center;" data-toggle="modal"
					 data-target="#modalMasuk">Masuk</a></li>
                <?php } ?>

                    <li class="nav-item" role="presentation">
                    <div id="dropdown-notif" class="dropdown show">
                        <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                            style="color: #0DB8BC;text-align: center;"><i class="fas fa-bell"></i></a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink"
                        style="margin-top:11px;">
                            <a class="dropdown-item" href="<?=base_url()?>lainnya">Tidak ada pemberitahuan</a>
                        </div>
                    </div>
                    </li>

				    <li class="nav-item" role="presentation">
                    <div id="dropdown-notif" class="dropdown show">
                        <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                            style="color: #0DB8BC;"><i class="fa fa-search"></i></a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink"
                        style="margin-top:11px; margin-left: -205px;">
                            <form action="<?=base_url()?>Search" method="get">
                                <input id="search_input" class="dropdown-item" type="text" name="search" id="search" placeholder="Cari berita...">
                            </form>
                        </div>
                    </div></li>

			</ul>
		</div>
	</div>
</nav>
<div style="margin-bottom: 109px;"></div>

<!-- Modal Daftar -->
<div class="modal fade" id="modalDaftar" tabindex="-1" role="dialog" aria-labelledby="modalDaftarTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<form action="<?=base_url()?>user/daftar" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Daftar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="username">Nama</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="username">E-mail</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="username">Jenis Kelamin</label>
                        <ul class="list-unstyled d-flex align-items-center">
                            <li class="d-flex align-items-center">
                                <input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Laki-laki" checked><p style="margin: 0 8px;">Laki-laki</p>
                            </li>
                            <li class="d-flex align-items-center">
                                <input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Perempuan"><p style="margin: 0 8px;">Perempuan</p>
                            </li>
                        </ul>
                    </div>

                    <div class="form-group">
                        <label for="username">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="username">Konfirm Password</label>
                        <input type="password" name="conf_password" id="conf_password" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="submit" value="submit">Daftar</button>
                </div>
            </form>
		</div>
	</div>
</div>
<!-- End of Modal Daftar -->

<!-- Modal Masuk -->
<div class="modal fade" id="modalMasuk" tabindex="-1" role="dialog" aria-labelledby="modalMasukTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
            <form action="<?=base_url()?>user/masuk" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Masuk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="username">E-mail</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="username">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="submit" value="submit">Masuk</button>
                </div>
            </form>
		</div>
	</div>
</div>
<!-- End of Modal Masuk -->
