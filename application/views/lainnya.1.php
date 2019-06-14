<?php require_once 'app/app.php' ?>

<!DOCTYPE html>
<html>

<head>
    <?php require_once 'template/metafile.php' ?>
    <title>keptiv - lainnya</title>
    <?php require_once 'template/metacss.php' ?>
</head>

<body>
    <?php require_once 'template/navbar.php' ?>
    
    <?php require_once 'template/header.php' ?>
    
    <section id="iklan-lainnya">
        <div class="container">
            <div class="row iklan-landscape">
                <div class="col text-center"><img src="assets/img/iklan_tj.png" width="60%"></div>
            </div>
        </div>
    </section>
    <section id="fotoVideo-lainnya">
        <div class="container">
            <div class="row section-title">
                <div class="col">
                    <h6>FOTO & VIDEO</h6>
                    <div class="section-line"></div>
                </div>
            </div>
            <div class="row" style="margin-bottom: 25px;">
                <div class="col-md-8 col-xl-9">

                <?php for ($i=0; $i <= $num_foto ; $i++) { 
                    if ($i < 5) { ?>                
                    <div class="row">
                        <div class="col-lg-12" style="margin-bottom: 16px;">
                            <div class="row">
                                <div class="col">
                                    <a class="list-berita-m-noLink" href="<?=base_url()?>deskripsi/?id=<?php echo $foto['id'][$i] ?>">
                                        <h6 class="list-berita-m-title"><?php echo $foto['title'][$i] ?></h6></a>
                                    <p class="list-berita-m-date"><?php echo $foto['created_at'][$i] ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col d-lg-flex">
                                    <div class="list-berita-xl"><img class="img-list-berita-xl" style="background-image: url('<?=base_url()?>assets/uploads/<?php $foto['image'][$i] ?>');">
                                        <i class="fas fa-camera icon-list-berita-xl"></i>
                                    </div>

                                    <div class="d-flex flex-md-row flex-lg-column subList-berita-xl">
                                    <?php
                                        for ($s=0; $s < count($foto_subIMG[$i]); $s++) {
                                            if ($s < 3) { ?>
                                        <li class="d-flex img-subList-berita-xl" style="background-image: url('<?=base_url()?>assets/uploads/<?php echo $foto_subIMG[$i][$s]->image_name; ?>');"></li>
                                    <?php }} ?>

                                        <!-- <li class="d-flex img-subList-berita-xl" style="background-image: url('assets/img/warios_basket.png');"></li>

                                        <li class="d-flex img-subList-berita-xl" style="background-image: url('assets/img/warios_basket.png');">

                                            <p class="d-flex align-items-center justify-content-center more-subList-berita-xl">+8</p>

                                        </li> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }} ?>

                    <div class="row iklan-landscape">
                        <div class="col text-center"><img src="assets/img/iklan_tj.png" width="60%"></div>
                    </div>

                </div>

                <div class="col-md-4 col-xl-3"><img src="assets/img/iklan_idn.png" width="100%" style="margin-bottom: 8px;"><img src="assets/img/iklan_merdeka.png"
                    width="100%"></div>

            </div>
        </div>
    </section>
    <section id="headline-lainnya">
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
						<a href="<?=base_url()?>deskripsi/?id=<?php echo $HeadlineList['id'][$i] ?>"><img class="list-headline" style="background-image: url('<?=base_url()?>assets/uploads/<?php echo $HeadlineList['image'][$i] ?>');">
						</a>
					</div>
					 <?php } ?>
				<?php } ?>
            </div>
        </div>
    </section>
    <section id="popular-lainnya">
        <div class="container">
			<div class="row section-title">
				<div class="col">
					<h6>POPULER SEMINGGU</h6>
					<div class="section-line"></div>
				</div>
			</div>
			<div class="row">
				<div class="col">
                    <div class="arrowNext-popularLainnya">
                        <i class="fas fa-angle-right"></i>
                    </div>
                    <div class="arrowPrev-popularLainnya">
                        <i class="fas fa-angle-left"></i>
                    </div>

                    <ul class="list-unstyled bg-slider populerLainnya-slider">
                    <?php
					for ($a=0; $a < 6; $a++) { 
						for ($s=0; $s < count($popular_data[$a]); $s++) { ?>
							<a class="populerDeskripsi-item" href="<?=base_url()?>Deskripsi/?id=<?php echo $popular_data[$a][$s]->id ?>">
								<li class="populerDeskripsi-item"
								style="background-image: url('<?=base_url()?>assets/uploads/<?php echo $popular_data[$a][$s]->image ?>');
								margin: 0;"></li>
							</a>
					<?php }
					}
					?>
                        <!-- <li class="populerLainnya-item"
						style="background-image: url('assets/img/warios_basket.png');"></li>
						
                        <li class="populerLainnya-item"
						style="background-image: url('assets/img/warios_basket.png');"></li>
						
                        <li class="populerLainnya-item"
						style="background-image: url('assets/img/warios_basket.png');"></li>
						
                        <li class="populerLainnya-item"
                        style="background-image: url('assets/img/warios_basket.png');"></li> -->
                    </ul>
                </div>
			</div>
		</div>
    </section>
    
    <?php require_once 'template/footer.php' ?>
    <?php require_once 'template/metajs.php' ?>

<script>
$(document).ready(function () {
    sliderSingle('.headline-home', 'li', '.arrowNext-headlineHome', '.arrowPrev-headlineHome');

    sliderM('.populerLainnya-slider', 'a', '.arrowNext-popularLainnya', '.arrowPrev-popularLainnya', 'false');

    $( "#nav-lainnya" ).last().addClass( "nav-active" );

    /* Get Lainnya */
    getUnik(0)
	$("#load_foto").click(function(e) {
		e.preventDefault()
		let page = $(this).data('val')
		getUnik(page)
	})
})
</script>

</body>

</html>