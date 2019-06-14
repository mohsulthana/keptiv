<?php require_once 'app/app.php' ?>

<!DOCTYPE html>
<html>

<head>
    <?php require_once 'template/metafile.php' ?>
    <title>keptiv - Foto</title>
    <?php require_once 'template/metacss.php' ?>
</head>

<body>
    <?php require_once 'template/navbar.php' ?>
    
    <?php require_once 'template/header.php' ?>
    
    <?php include 'template/iklan_landscape.php' ?>
    
    <section id="fotoVideo-lainnya">
        <div class="container">
            <div class="row section-title">
                <div class="col">
                    <h6>FOTO</h6>
                    <div class="section-line"></div>
                </div>
            </div>
            <div class="row" style="margin-bottom: 25px;">
                <div class="col-md-8 col-xl-9">

                <?php for ($i=0; $i <= $num_foto_b ; $i++) { 
                    if ($i < $num_foto_b) { ?>                
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
                                    <div class="list-berita-xl">
                                    <a class="list-berita-m-noLink" href="<?=base_url()?>deskripsi/?id=<?php echo $foto['id'][$i] ?>">
                                        <img class="img-list-berita-xl" style="background-image: url('<?=base_url()?>assets/uploads/<?php echo $foto['image'][$i] ?>');">
                                            <i class="fas fa-camera icon-list-berita-xl"></i>
                                    </a>
                                    </div>

                                    <div class="d-flex flex-md-row flex-lg-column subList-berita-xl">
                                    <?php
                                        for ($s=0; $s < count($foto_subIMG[$i]); $s++) {
                                            if ($s < 3) { ?>
                                        <a class="d-flex img-subList-berita-xl list-berita-m-noLink" href="<?=base_url()?>deskripsi/?id=<?php echo $foto['id'][$i] ?>">
                                            <li class="d-flex img-subList-berita-xl" style="background-image: url('<?=base_url()?>assets/uploads/<?php echo $foto_subIMG[$i][$s]->image_name; ?>');">
                                            <?php if ($s >= 2) { 
                                                if (count($foto_subIMG[$i]) > 3) { ?>
                                                <p class="d-flex align-items-center justify-content-center more-subList-berita-xl">
                                                <?php echo "+".(count($foto_subIMG[$i])-3)."";
                                                } ?></p>
                                            <?php } ?>
                                            </li>
                                        </a>
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

                    <div class="row">
						<div class="col text-center" style="margin: 16px 0;">
							<a id="load_foto" href="<?=base_url()?>lainnya/foto/<?php echo ++$num_page_foto; ?>" class="btn btn-outline-primary"
                            style="width: 150px;">Artikel Lainnya</a>
                            <input type="hidden" id="num_page_foto" value="<?php echo $num_page_foto; ?>">
						</div>
					</div>

                    <?php include 'template/iklan_landscape.php' ?>

                </div>

                <?php include 'template/iklan_sider.php' ?>

            </div>
        </div>
    </section>

    <?php include 'template/headline-box.php' ?>
    <?php include 'template/popular-seminggu.php' ?>
    
    <?php require_once 'template/footer.php' ?>
    <?php require_once 'template/metajs.php' ?>

<script>
$(document).ready(function () {
    sliderSingle('.headline-home', 'li', '.arrowNext-headlineHome', '.arrowPrev-headlineHome');

    sliderM('.populerHome-slider', 'a', '.arrowNext-popularHome', '.arrowPrev-popularHome', 'false');

    $( "#nav-lainnya" ).last().addClass( "nav-active" );

    /* Get Lainnya */
    var page = document.getElementById("num_page_foto").value;
    if (page != 2) {
        scrollFoto()   
    }
	$("#load_foto").click(function(e) {
		scrollFoto()
	})
})
</script>

</body>

</html>