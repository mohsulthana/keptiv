<?php require_once 'app/app.php' ?>

<!DOCTYPE html>
<html>

<head>
    <?php require_once 'template/metafile.php' ?>
    <title>keptiv - unik</title>
    <?php require_once 'template/metacss.php' ?>
</head>

<body>
	<?php require_once 'template/navbar.php' ?>
	
    <?php require_once 'template/header.php' ?>
	
    <?php include 'template/iklan_landscape.php' ?>

	<input type="hidden" name="sub_page" id="sub_page" value="<?php echo $sub_page; ?>">
	
    <section id="unik-unik">
		<div class="container">
			<div class="row section-title">
				<div class="col">
					<h6>UNIK</h6>
					<div class="section-line"></div>
				</div>
			</div>
			<div class="row" style="margin-bottom: 25px;">
				<div class="col-md-8 col-xl-9">
					<div id="app_unik" class="row">

					<script>
						function app_unik(unik) {
							return `
							<div class="col-lg-6" style="margin-bottom: 16px;">
								<a class="list-berita-m-noLink" href="<?=base_url()?>deskripsi/?id=${unik.id}"><div>
									<img class="list-berita-m"
									style="background-image: url('<?=base_url()?>assets/uploads/${unik.image}');">

									<h6 class="list-berita-m-title">${unik.title}</h6>

									<p class="list-berita-m-date">${unik.created_at}</p>

									<p class="list-berita-m-desc">${unik.sub_content}</p>
								</a></div>
							</div>
							`
						}
					</script>
					</div>

					<div class="row">
						<div class="col text-center" style="margin: 16px 0;">
							<button id="load_unik"
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

    <?php include 'template/iklan_landscape.php' ?>

    <?php include 'template/headline-box.php' ?>
    <?php include 'template/popular-seminggu.php' ?>
    
	<?php require_once 'template/footer.php' ?>
    <?php require_once 'template/metajs.php' ?>

<script>
$(document).ready(function () {
    sliderSingle('.headline-home', 'li', '.arrowNext-headlineHome', '.arrowPrev-headlineHome');

    sliderM('.populerHome-slider', 'a', '.arrowNext-popularHome', '.arrowPrev-popularHome', 'false');

	$( "#nav-unik" ).last().addClass( "nav-active" );

	var sub_page = $('#sub_page').val()

	/* Get Unik */
	getUnik(0, sub_page)
	$("#load_unik").click(function(e) {
		e.preventDefault()
		let page = $(this).data('val')
		getUnik(page, sub_page)
	})
})
</script>

</body>

</html>