<section id="headline-viral">
	<div class="container">
		<div class="row section-title">
			<div class="col">
				<h6>HEADLINE</h6>
				<div class="section-line"></div>
			</div>
		</div>
		<div class="row section-title">
			<?php for ($i=0; $i <= $num_HeadlineList; $i++) {
					if ($i < 6) { ?>
			<div class="col-12 col-sm-6 col-md-4">
				<a href="<?=base_url()?>deskripsi/?id=<?php echo $HeadlineList['id'][$i] ?>" title="<?php echo $HeadlineList['title'][$i] ?>"><div class="list-headline d-flex flex-column justify-content-end"
						style="background-image: url('<?=base_url()?>assets/uploads/<?php echo $HeadlineList['image'][$i] ?>');">
						<div class="d-flex banner-title-box">
							<p><?php echo $HeadlineList['categori'][$i] ?></p>
						</div>
						<p class="banner-desc" style="font-size: 14px"><?php echo word_limiter($HeadlineList['title'][$i], 5) ?></p>
					</div>
				</a>
			</div>
			<?php } ?>
			<?php } ?>
		</div>
	</div>
</section>
