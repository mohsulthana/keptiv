<section>
	<div class="container">
		<div class="row iklan-landscape">
			<div class="col text-center">
				<?php for ($i=0; $i < count($iklan); $i++) {
            if ($iklan[$i]['position'] == 'Space Iklan 2' && $iklan[$i]['status'] == 1) { ?>
				<a href="<?php echo $iklan[$i]['url'] ?>" target="blank">
					<img src="<?=base_url()?>assets/advertisement/<?php echo $iklan[$i]['image'] ?>" width="100%;"
						alt="<?php echo $iklan[$i]['name'] ?>">
				</a>
				<?php }} ?>
			</div>
		</div>
	</div>
</section>
