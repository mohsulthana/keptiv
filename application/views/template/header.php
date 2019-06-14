<section id="header">
	<div class="container">
		<div class="row">
			<div class="col">
			<!-- Space iklan 1 -->
			<?php for ($i=0; $i < count($iklan); $i++) {
				if ($iklan[$i]['position'] == 'Space Iklan 1' && $iklan[$i]['status'] == 1) { ?>
					<a href="<?php echo $iklan[$i]['url'] ?>" target="blank">
						<img src="<?=base_url()?>assets/advertisement/<?php echo $iklan[$i]['image'] ?>" width="100%" height="100%" alt="<?php echo $iklan[$i]['name'] ?>">
					</a>
			<?php }} ?>
			
			</div>
		</div>
		<div class="row hot-tag-box">
			<div class="col">
				<div class="d-sm-flex align-items-center hot-tag">
					<p>HOT TAG :</p>
					<ul class="d-flex d-lg-flex">
                        <?php for ($i=0; $i < 3; $i++) { ?>
                            <li><a href="<?=base_url()?>Search?search=<?php echo $hottag_result[$i] ?>" style="color: #fff;">#<?php echo $hottag_result[$i] ?></a></li>
                        <?php } ?>
					</ul>
				</div>
			</div>
		</div>
		<div class="row headline-title">
			<div class="col">
				<h6>HEADLINE</h6>
				<div class="headline-line"></div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-8 col-xl-9 headline-space">

				<div class="d-flex justify-content-center align-items-center arrowNext-headlineHome">
					<i class="fas fa-chevron-right"></i>
				</div>

				<div class="d-flex justify-content-center align-items-center arrowPrev-headlineHome">
					<i class="fas fa-chevron-left"></i>
				</div>

				<ul class="headline-home">

					<?php for ($i=0; $i <= $num_headline; $i++) { ?>
					<li><a class="banner-noLink"
							href="<?=base_url()?>deskripsi/?id=<?php echo $headline_l['id'][$i] ?>">
							<div class="d-flex flex-column justify-content-end bg-banner"
								style="background-image: url('<?=base_url()?>assets/uploads/<?php echo $headline_l['image'][$i] ?>');">
								<div class="d-flex banner-title-box">
									<p><?php echo $headline_l['type_categori'][$i] ?></p>
								</div>
								<p class="banner-desc"><?php echo $headline_l['title'][$i] ?></p>
							</div>
						</a></li>
					<?php } ?>

				</ul>
			</div>

			<div class="col-md-4 col-xl-3">
				<div class="row">
					<div class="col">
						<ul class="list-unstyled sub-banner">

							<?php for ($i=0; $i <= $num_subHeadline; $i++) { ?>
							<li>
								<a class="sub-banner-noLink"
									href="<?=base_url()?>deskripsi/?id=<?php echo $subHeadline_l['id'][$i] ?>">
									<div class="d-flex flex-column justify-content-end bg-sub-banner"
										style="background-image: url('<?=base_url()?>assets/uploads/<?php echo $subHeadline_l['image'][$i] ?>');">
										<div class="d-flex sub-banner-title-box">
											<p><?php echo $subHeadline_l['type_categori'][$i] ?></p>
										</div>
										<p class="sub-banner-desc"><?php echo $subHeadline_l['title'][$i] ?></p>
									</div>
								</a>
							</li>
							<?php } ?>

						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
