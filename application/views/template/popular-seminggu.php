<section id="popular-home">
	<div class="container">
		<div class="row section-title">
			<div class="col">
				<h6>POPULER SEMINGGU</h6>
				<div class="section-line"></div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<div class="arrowNext-popularHome">
					<i class="fas fa-angle-right"></i>
				</div>
				<div class="arrowPrev-popularHome">
					<i class="fas fa-angle-left"></i>
				</div>

				<ul class="row list-unstyled bg-slider populerHome-slider ml-0">
					<?php
					for ($a=0; $a < count($popular_data); $a++) { 
						for ($s=0; $s < count($popular_data[$a]); $s++) { ?>
					<a class="col-lg-4 col-md-6 col-sm-12 populerHome-item"
					style="padding: 0 8px;"
						href="<?=base_url()?>Deskripsi/?id=<?php echo $popular_data[$a][$s]->id ?>" title="<?php echo $popular_data[$a][$s]->title ?>">
						<li class="populerHome-item d-flex flex-column justify-content-end"
							style="background-image: url('<?=base_url()?>assets/uploads/<?php echo $popular_data[$a][$s]->image ?>'); margin: 0;">
							<div class="d-flex banner-title-box">
								<p><?php echo $popular_data[$a][$s]->category_type ?></p>
							</div>
							<p class="banner-desc" style="font-size: 14px"><?php echo word_limiter($popular_data[$a][$s]->title, 5) ?></p>
						</li>
					</a>
					<?php }
					}
					?>
					<!-- <li class="populerViral-item"
						style="background-image: url('assets/img/warios_basket.png');"></li>
						
                        <li class="populerViral-item"
						style="background-image: url('assets/img/warios_basket.png');"></li>
						
                        <li class="populerViral-item"
						style="background-image: url('assets/img/warios_basket.png');"></li>
						
                        <li class="populerViral-item"
                        style="background-image: url('assets/img/warios_basket.png');"></li> -->
				</ul>
			</div>
		</div>
	</div>
</section>
