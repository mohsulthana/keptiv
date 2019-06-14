<?php require_once 'app/app.php' ?>
<!DOCTYPE html>
<html>

<head>
	<?php require_once 'template/metafile.php' ?>

	<title>keptiv</title>

	<?php require_once 'template/metacss.php' ?>
</head>

<body>
	<?php require_once 'template/navbar.php' ?>
	
	<?php require_once 'template/header.php' ?>

	<?php include 'template/iklan_landscape.php' ?>

	<?php include 'template/popular-seminggu.php' ?>

	<?php include 'template/iklan_landscape.php' ?>

	<section id="umum-home">
		<div class="container">
			<div class="row section-title">
				<div class="col">
					<h6>UMUM</h6>
					<div class="section-line"></div>
				</div>
			</div>
			<div class="row" style="margin-bottom: 25px;">
				<div class="col-md-8 col-xl-9">
					<div id="app_umum" class="row">
						<script>
						function app_umum(umum) {
							return `
							<div class="col-lg-6" style="margin-bottom: 16px;">
								<a class="list-berita-m-noLink" href="<?=base_url()?>deskripsi/?id=${umum.id}"><div>
									<img class="list-berita-m"
									style="background-image: url('<?=base_url()?>assets/uploads/${umum.image}');">

									<h6 class="list-berita-m-title">${umum.title}</h6>

									<p class="list-berita-m-date">${umum.created_at}</p>

									<p class="list-berita-m-desc">${umum.sub_content}</p>
								</div></a>
							</div>
							`
						}
						</script>
					</div>
					<div class="row">
						<div class="col text-center" style="margin: 16px 0;">
							<button id="load_umum" class="btn btn-outline-primary" type="button" data-val="1" style="width: 150px;">Artikel Lainnya</button>
						</div>
					</div>
				</div>

				<?php include 'template/iklan_sider.php' ?>

			</div>
		</div>
	</section>
	<section id="sorotan-home">
		<div class="container">
			<div class="row section-title">
				<div class="col">
					<h6>SOROTAN</h6>
					<div class="section-line"></div>
				</div>
			</div>
			<div class="row">
				<div class="col" style="margin-bottom: 19px;">
					<div class="arrowNext-sorotanHome"
					style="right: 40px;">
                        <i class="fas fa-angle-right"></i>
					</div>
					
					<div class="arrowPrev-sorotanHome"
					style="left: 40px;">
                        <i class="fas fa-angle-left"></i>
                    </div>

					<ul class="row list-unstyled bg-slider sorotanHome-slider"
					style="padding: 0 150px;margin-right: auto;
    margin-left: auto;"">
					<?php for ($i=0; $i <= $num_sorotan; $i++) { ?>
						<a class="col-md-6 col-sm-12 sorotanHome-item" href="<?=base_url()?>deskripsi/?id=<?php echo $sorotan['id'][$i] ?>"  title="<?php echo $sorotan['title'][$i] ?>">
							<li class="sorotanHome-item d-flex flex-column justify-content-end"
							style="background-image: url('<?=base_url()?>assets/uploads/<?php echo $sorotan['image'][$i] ?>'); background-color: #f1f1f1; margin: 0;"">
								<div class="d-flex banner-title-box">
									<p><?php echo $sorotan['type_categori'][$i] ?></p>
								</div>
								<p class="banner-desc" style="font-size: 14px"><?php echo word_limiter($sorotan['title'][$i], 5) ?></p>
							</li>
						</a>
					<?php } ?>
						<!-- <li class="sorotanHome-item" style="background-image: url('assets/img/warios_basket.png');"></li>
						
						<li class="sorotanHome-item" style="background-image: url('assets/img/warios_basket.png');"></li>
						
						<li class="sorotanHome-item" style="background-image: url('assets/img/warios_basket.png');"></li>
						
                        <li class="sorotanHome-item" style="background-image: url('assets/img/warios_basket.png');"></li> -->
                    </ul>
                </div>
			</div>
		</div>
	</section>
	<section id="pilihanRedaksi-home">
		<div class="container">
			<div class="row section-title">
				<div class="col">
					<h6>PILIHAN REDAKSI</h6>
					<div class="section-line"></div>
				</div>
			</div>
			<div class="row" style="margin-bottom: 25px;">
				<div class="col-md-8 col-xl-9">
					<div class="row">
						<div id="app_pilihanRedaksi" class="col-12" style="margin-bottom: 16px;">

						<script>
						function app_pilihanRedaksi(pilihanRedaksi) {
							return `
							<div class="row" style="margin-bottom: 8px;">
								<div class="col-md-4" style="padding-right: 0px;">
									<img class="img-fluid img-list-berita-l" style="background-image: url('<?=base_url()?>assets/uploads/${pilihanRedaksi.image}');">
								</div>

								<div class="col d-flex flex-column justify-content-between content-list-berita-l">
									<a class="list-berita-l-noLink" href="<?=base_url()?>deskripsi/?id=${pilihanRedaksi.id}"><h4>${pilihanRedaksi.title}</h4></a>

									<h6>${pilihanRedaksi.sub_content}</h6>

									<p>KATEGORI Pilihan Redaksi - ${pilihanRedaksi.created_at}</span></p>
								</div>
							</div>
							`
						}
						</script>
						</div>
						
						<div class="col-12 text-center" style="margin-bottom: 16px;">
							<button id="load_pilihanRedaksi" class="btn btn-outline-primary" type="button" data-val="1"
							style="width: 150px;">Artikel Lainnya</button>
						</div>

					</div>
				</div>

				<?php include 'template/iklan_sider.php' ?>

			</div>
		</div>
	</section>
	<section id="rekomendasi-home">
		<div class="container">
			<div class="row section-title">
				<div class="col">
					<h6>REKOMENDASI</h6>
					<div class="section-line"></div>
				</div>
			</div>
			
			<div class="row bg-slider"
			style="margin: 15px 0 20px 0; padding: 0 150px;">
			<?php for ($i=0; $i <= $num_rekomendasi; $i++) {
				if ($i < 2) { ?>
				<div class="col-12 col-sm-6">
					<a href="<?=base_url()?>deskripsi/?id=<?php echo $rekomendasi['id'][$i] ?>" title="<?php echo $rekomendasi['title'][$i] ?>">
						<li class="img-col-berita-l d-flex flex-column justify-content-end"
						style="background-image: url('<?=base_url()?>assets/uploads/<?php echo $rekomendasi['image'][$i] ?>'); background-color: #f1f1f1;">
							<div class="d-flex banner-title-box">
								<p><?php echo $rekomendasi['type_categori'][$i] ?></p>
							</div>
							<p class="banner-desc" style="font-size: 14px"><?php echo word_limiter($rekomendasi['title'][$i], 5) ?></p>
						</li>
					</a>
				</div>
				<?php } ?>
			<?php } ?>
			</div>

			<div class="row" style="margin-top: 15px;margin-bottom: 16px;">

			<?php for ($i=0; $i <= $num_rekomendasi; $i++) { 
				if ($i > 1 && $i < 5) { ?>
				<div class="col-12 col-sm-6 col-md-4" style="margin-bottom: 16px;">
				<a class="list-berita-sm-noLink" href="<?=base_url()?>deskripsi/?id=<?php echo $rekomendasi['id'][$i] ?>">
					<img class="list-berita-sm"
					style="background-image: url('<?=base_url()?>assets/uploads/<?php echo $rekomendasi['image'][$i] ?>');">
                    <p class="list-berita-sm-subDate"><?php echo "KATEGORI ".$rekomendasi['type_categori'][$i] ?> -&nbsp;<span><?php echo $rekomendasi['created_at'][$i] ?></span></p>
					<h6 class="list-berita-sm-title"><?php echo word_limiter($rekomendasi['title'][$i], 8) ?></h6>
				</a>
				</div>
			<?php }} ?>

            </div>
		</div>
	</section>
	<section id="spesial-home">
		<div class="container">
			<div class="row section-title">
				<div class="col">
					<h6>SPECIAL</h6>
					<div class="section-line"></div>
				</div>
			</div>
			<div class="row" style="margin-bottom: 25px;">
				<div class="col-md-8 col-xl-9">
					<div id="app_Special" class="row">

					<script>
						function app_Special(special) {
							return `
						<div class="col-lg-6" style="margin-bottom: 16px;">
							<div>
							<a class="list-berita-m-noLink" href="<?=base_url()?>deskripsi/?id=${special.id}">
								<img class="list-berita-m"
								style="background-image: url('<?=base_url()?>assets/uploads/${special.image}');">

								<h6 class="list-berita-m-title">${special.title}</h6>

								<p class="list-berita-m-date">${special.created_at}</p>

								<p class="list-berita-m-desc">${special.sub_content}</p>
							</a>
							</div>
						</div>
						`
						}
					</script>
					</div>

					<div class="row">
						<div class="col text-center" style="margin: 16px 0;">
							<button id="load_special" class="btn btn-outline-primary" type="button" data-val="1"
							style="width: 150px;">Artikel Lainnya</button>
						</div>
					</div>
				</div>

				<?php include 'template/iklan_sider.php' ?>

			</div>
		</div>
	</section>
	<section id="kutipan-home">
		<div class="container">
			<div class="row section-title">
				<div class="col">
					<h6>KUTIPAN</h6>
					<div class="section-line"></div>
				</div>
			</div>
			
			<div class="row bg-slider"
			style="margin: 15px 0 25px 0; padding: 0 150px;">
			<?php for ($i=0; $i <= $num_kutipan; $i++) {
				if ($i < 2) { ?>
				<div class="col-12 col-sm-6">
					<a href="<?=base_url()?>deskripsi/?id=<?php echo $kutipan['id'][$i] ?>" title="<?php echo $kutipan['title'][$i] ?>">
						<li class="img-col-berita-l d-flex flex-column justify-content-end"
						style="background-image: url('<?=base_url()?>assets/uploads/<?php echo $kutipan['image'][$i] ?>'); background-color: #f1f1f1;">
							<div class="d-flex banner-title-box">
								<p><?php echo $kutipan['type_categori'][$i] ?></p>
							</div>
							<p class="banner-desc" style="font-size: 14px"><?php echo word_limiter($kutipan['title'][$i], 5) ?></p>
						</li>
					</a>
				</div>
				<?php } ?>
			<?php } ?>
			</div>

			<div class="row" style="margin-top: 15px;margin-bottom: 16px;">

			<?php for ($i=0; $i <= $num_kutipan; $i++) { 
				if ($i > 1 && $i < 5) { ?>
				<div class="col-12 col-sm-6 col-md-4" style="margin-bottom: 16px;">
				<a class="list-berita-sm-noLink" href="<?=base_url()?>deskripsi/?id=<?php echo $kutipan['id'][$i] ?>">
					<img class="list-berita-sm"
					style="background-image: url('<?=base_url()?>assets/uploads/<?php echo $kutipan['image'][$i] ?>');">
                    <p class="list-berita-sm-subDate"><?php echo "KATEGORI ".$kutipan['type_categori'][$i] ?> -&nbsp;<span><?php echo $kutipan['created_at'][$i] ?></span></p>
					<h6 class="list-berita-sm-title"><?php echo word_limiter($kutipan['title'][$i], 8) ?></h6>
				</a>
				</div>
			<?php }} ?>
				
            </div>
		</div>
	</section>
	<section id="indeksBerita-home">
		<div class="container">
			<div class="row section-title">
				<div class="col">
					<h6>INDEKS BERITA</h6>
					<div class="section-line"></div>
				</div>
			</div>
			<div class="row" style="margin-bottom: 25px;">
				<div class="col-md-8 col-xl-9">
					<div class="row">
						<div id="app_indeksBerita" class="col-12" style="margin-bottom: 16px;">

						<script>
						function app_indeksBerita(indeksBerita) {
							return `
							<div class="row" style="margin-bottom: 8px;">
								<div class="col-md-4" style="padding-right: 0px;">
									<img class="img-fluid img-list-berita-l" style="background-image: url('<?=base_url()?>assets/uploads/${indeksBerita.image}');">
								</div>

								<div class="col d-flex flex-column justify-content-between content-list-berita-l">
								<a class="list-berita-l-noLink" href="<?=base_url()?>deskripsi/?id=${indeksBerita.id}"><h4>${indeksBerita.title}</h4></a>

									<h6>${indeksBerita.sub_content}</h6>

									<p>KATERGOI RAGAM - <span>${indeksBerita.created_at}</span></p>
								</div>
							</div>
							`
						}
						</script>
						</div>

						<div class="col-12 text-center" style="margin-bottom: 16px;">
							<button id="load_indeksBerita"
							class="btn btn-outline-primary" type="button"
							data-val="1"
							style="width: 150px;">Artikel Lainnya</button>
						</div>

					</div>
				</div>

				<?php include 'template/iklan_sider.php' ?>
				
			</div>
		</div>
	</section>

	<?php require_once 'template/footer.php' ?>

	<?php require_once 'template/metajs.php' ?>
	
<script>
$(document).ready(function () {
    sliderSingle('.headline-home', 'li', '.arrowNext-headlineHome', '.arrowPrev-headlineHome');

    sliderM('.populerHome-slider', 'a', '.arrowNext-popularHome', '.arrowPrev-popularHome', 'false');

    sliderL('.sorotanHome-slider', 'a', '.arrowNext-sorotanHome', '.arrowPrev-sorotanHome', 'false');

	$( "#nav-home" ).last().addClass( "nav-active" );

	/* UMUM */
	getUmum(0)
	$("#load_umum").click(function(e) {
		e.preventDefault()
		let page = $(this).data('val')
		getUmum(page)
	})

	// PILIHAN REDAKSI
	getPilihanRedaksi(0)
	$("#load_pilihanRedaksi").click(function(e) {
		e.preventDefault()
		let page = $(this).data('val')
		getPilihanRedaksi(page)
	})

	// SPECIAL
	getSpecial(0)
	$("#load_special").click(function(e) {
		e.preventDefault()
		let page = $(this).data('val')
		getSpecial(page)
	})

	// INDEKS BERITA
	getIndeksBerita(0)
	$("#load_indeksBerita").click(function(e) {
		e.preventDefault()
		let page = $(this).data('val')
		getIndeksBerita(page)
	})
})
</script>

</body>

</html>
