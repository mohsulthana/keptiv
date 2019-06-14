<aside class="main-sidebar">
	<section class="sidebar">
		<ul class="sidebar-menu" data-widget="tree">
			<li class="header">MAIN NAVIGATION</li>

			<?php if ($this->session->userdata('level') != 'Member') { ?>
			<li class="treeview treeview-tables">
				<a href="#">
					<i class="fa fa-newspaper-o"></i> <span>Artikel</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li class="menu-berita"><a href="<?=base_url()?>Dashboard"><i class="fa fa-circle-o"></i> Berita</a></li>

					<li class="menu-beritaReview"><a href="<?=base_url()?>Dashboard/BeritaReview"><i class="fa fa-circle-o"></i> Berita Review</a></li>

					<li class="menu-beritaPublished"><a href="<?=base_url()?>Dashboard/BeritaPublished"><i class="fa fa-circle-o"></i> Berita Published</a></li>

					<li class="menu-gambarBerita"><a href="<?=base_url()?>Dashboard/Gambar"><i class="fa fa-circle-o"></i> Gambar Berita</a></li>

					<!-- <li class="menu-videoBerita"><a href="<?=base_url()?>Dashboard/Video"><i class="fa fa-circle-o"></i> Video Berita</a></li> -->
				</ul>
			</li>
			<?php }else { ?>
				<li class="menu-user">
					<a href="<?=base_url()?>Dashboard">
						<i class="fa fa-newspaper-o"></i> <span>Artikel</span>
					</a>
				</li>
			<?php } ?>
			
			<?php if ($this->session->userdata('level') == 'Super Admin') { ?>
			<li class="menu-user">
				<a href="<?=base_url()?>Dashboard/user">
					<i class="fa fa-users"></i> <span>User Management</span>
				</a>
           </li>
		   <?php } ?>
			
		   <?php if ($this->session->userdata('level') != 'Member') { ?>
			<li class="menu-category">
				<a href="<?=base_url()?>Dashboard/kategori">
					<i class="fa fa-pencil-square"></i> <span>Categories</span>
				</a>
           </li>
		   <?php } ?>

		   <?php if ($this->session->userdata('level') == 'Super Admin') { ?>
		   <li class="menu-setting">
				<a href="<?=base_url()?>Dashboard/setting">
					<i class="fa fa-gear"></i> <span>Setting</span>
				</a>
           </li>
		   <?php } ?>

		   <?php if ($this->session->userdata('level') != 'Member') { ?>
		   <li class="menu-complain">
				<a href="<?=base_url()?>Dashboard/complain">
					<i class="fa fa-bug"></i> <span>Complain</span>
				</a>
           </li>

		   <li class="menu-advertisement">
				<a href="<?=base_url()?>Dashboard/Advertisement">
					<i class="fa fa-buysellads"></i> <span>Advertisement</span>
				</a>
           </li>
		   <?php } ?>

		   <li class="menu-logout">
				<a onclick="return confirm('Apakah anda yakin ingin keluar?');" href="<?=base_url()?>user/logout">
					<i class="fa fa-gear"></i> <span>Logout</span>
				</a>
           </li>
		</ul>
	</section>
</aside>
