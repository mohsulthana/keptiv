<?php require_once 'app/app.php' ?>

<!DOCTYPE html>
<html>

<head>
	<?php require_once 'template/metafile.php' ?>
	<title>keptiv - desctiptive</title>
	<?php require_once 'template/metacss.php' ?>
	<link rel="stylesheet" href="<?=base_url()?>assets/css/divider-text-middle.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/css/style-modal-desc.css">
	<link rel="canonical" href="http://sebuahlabs.online/Deskripsi/?id=<?php echo $artikelID ?>" />
	<style>
		a p {
			color: #333542;
		}
	</style>
</head>

<body>
	<?php require_once 'template/navbar.php' ?>

	<!-- Modal Images Desc -->
	<div id="myModal" class="modal_desc" style="margin-top: 65px;">
		<span class="close_desc cursor_desc" onclick="closeModal()">&times;</span>
		<div class="modal-content_desc">

			<?php if (count($articleImages) > 0) { ?>

			<div class="mySlides_desc">
				<div class="numbertext_desc"><?php
				if (count($articleImages) > 1) {
					echo "1/".(count($articleImages) + 1);
				}else {
					echo "1/".count($articleImages);
				} ?></div>
				<img src="<?=base_url()?>assets/uploads/<?php echo $article_img ?>" style="width:100%; height:400px; object-fit:cover;">
				<p class="article-image-desc"><?php echo $title ?></p>
			</div>

			<?php if (count($articleImages) > 1) { ?>
			<?php for ($z=1; $z <= count($articleImages); $z++) { ?>
			<div class="mySlides_desc">
				<div class="numbertext_desc"><?php echo ($z + 1)."/".(count($articleImages) + 1) ?></div>
				<img src="<?=base_url()?>assets/uploads/<?php echo $articleImages[$z-1] ?>" style="width:100%; height:400px; object-fit:cover;">
				<p class="article-image-desc"><?php echo $articleImagesDesc[$z-1] ?></p>
			</div>
			<?php }} ?>			
			
			<div class="d-flex justify-content-between align-items-center btn-next-prev">
				<a class="prev_desc" onclick="plusSlides(-1)">&#10094;</a>
				<a class="next_desc" onclick="plusSlides(1)">&#10095;</a>
			</div>

			<div class="caption-container_desc">
				<p id="caption"></p>
			</div>
			
			<div class="column_desc">
				<img class="demo_desc cursor_desc" src="<?=base_url()?>assets/uploads/<?php echo $article_img ?>"
					style="width:100%; height:120px; object-fit:cover;" onclick="currentSlide(1)" alt="Nature and sunrise">
			</div>

			<?php if (count($articleImages) > 1) { ?>
			<?php for ($z=1; $z <= count($articleImages); $z++) { ?>
			<div class="column_desc">
				<img class="demo_desc cursor_desc" src="<?=base_url()?>assets/uploads/<?php echo $articleImages[$z-1] ?>"
					style="width:100%; height:120px; object-fit:cover;" onclick="currentSlide(<?php echo ($z + 1) ?>)" alt="Nature and sunrise">
			</div>
			<?php }} ?>
			<?php }?>
		</div>
	</div>
	<!-- End of Modal Images Desc -->
	
	<section id="header-deskripsi">
		<div class="container">
			<div class="row">
				<div class="col">
				<?php for ($i=0; $i < count($iklan); $i++) {
					if ($iklan[$i]['position'] == 'Space Iklan 1' && $iklan[$i]['status'] == 1) { ?>
						<a href="<?php echo $iklan[$i]['url'] ?>">
							<img src="<?=base_url()?>assets/advertisement/<?php echo $iklan[$i]['image'] ?>" width="100%" height="100%" alt="<?php echo $iklan[$i]['name'] ?>">
						</a>
				<?php }} ?>
				</div>
			</div>
		</div>
	</section>
	<section id="content-deskripsi">
		<div class="container">
			<div class="row berita-deskripsi">
				<div class="col-md-8 col-xl-9">
					<div class="row">
						<div class="col">
							<h4><?php echo $title ?></h4>
						</div>
					</div>

					<div class="row" style="margin-bottom: 16px;">
						<div class="col">
							<div class="d-flex align-items-center">
								<div class="d-flex align-items-center berita-deskripsi-info">
									<i class="far fa-calendar-alt icon-info"></i>
									<p><?php echo $created_at ?></p>
								</div>
								<div class="d-flex align-items-center berita-deskripsi-info">
									<i class="fas fa-pencil-alt icon-info"></i>
									<img class="img-profile-creator mr-1" src="<?=base_url()?>assets/avatar/profile.jpg" alt="Profile">
									<p><?php echo $creator ?></p>
								</div>
								<div class="d-flex align-items-center berita-deskripsi-info">
									<i class="fas fa-eye icon-info"></i>
									<p><?php echo $num_viewers." Viewers" ?></p>
								</div>

								<!-- Your share button code -->
							</div>
							<div class="d-flex align-items-center berita-deskripsi-info" style="margin-top:15px;">
									<a href="https://api.addthis.com/oexchange/0.8/forward/mailto/offer?url=http%3A%2F%2Fsebuahlabs.online%2Fdeskripsi%2F%3Fid%3D<?php echo $artikelID ?>&pubid=ra-42fed1e187bae420&title=Keptiv%20%7C%20Deskripsi&ct=1" target="_blank"><img style="height: 20px; margin-top: -8px;border-radius: 2px;" src="https://cache.addthiscdn.com/icons/v3/thumbs/32x32/mailto.png" border="0" alt="Email App"/></a>
									
									<a href="https://api.addthis.com/oexchange/0.8/forward/email/offer?url=http%3A%2F%2Fsebuahlabs.online%2Fdeskripsi%2F%3Fid%3D<?php echo $artikelID ?>&pubid=ra-42fed1e187bae420&title=Keptiv%20%7C%20Deskripsi&ct=1" target="_blank"><img style="height: 20px;margin-top: -8px;border-radius: 2px;" class="ml-1 mr-1" src="https://cache.addthiscdn.com/icons/v3/thumbs/32x32/email.png" border="0" alt="Email"/></a>

									<a class="twitter-share-button"
									href="http://sebuahlabs.online/Deskripsi/?id=<?php echo $artikelID ?>">
									Tweet</a>

									<div id="fb-root"></div>
									<div class="fb-share-button" 
									style="margin-top: -4px; margin-left: 6px;"
									data-href="http://sebuahlabs.online/Deskripsi/?id=<?php echo $artikelID ?>" 
									data-layout="button_count">
									</div>

									<g:plus action="share"></g:plus>
								</div>
						</div>
					</div>

					<div class="row">
						<div class="col description-imageVideo">

						<?php if ($is_video) { ?>
							<video height="500" width="100%" controls>
								<source src="<?=base_url()?>assets/videos/<?php echo $article_img ?>" type="video/mp4" type="video/mp4"  onclick="openModal();currentSlide(1)">
							</video>

							<div class="d-flex justify-content-between align-items-center show-slide-desc" onclick="openModal();currentSlide(1)">
								<p><i class="fas fa-play"></i> Lihat Slideshow</p>
								<div class="line-slideshow-desc"></div>
								<p><i class="fas fa-camera"></i> <?php
								if (count($articleImages) > 1) {
									echo (count($articleImages) + 1);
								}else {
									echo count($articleImages);
								} ?> Foto</p>
							</div>
						<?php }else { ?>
							<img style="width: 100%;height: 360px;background-image: url('<?=base_url()?>assets/uploads/<?php echo $article_img ?>');background-position: center;background-size: cover;"  onclick="openModal();currentSlide(1)" />

							<div class="d-flex justify-content-between align-items-center show-slide-desc" onclick="openModal();currentSlide(1)">
								<p><i class="fas fa-play"></i> Lihat Slideshow</p>
								<div class="line-slideshow-desc"></div>
								<p><i class="fas fa-camera"></i> <?php
								if (count($articleImages) > 1) {
									echo (count($articleImages) + 1);
								}else {
									echo count($articleImages);
								} ?> Foto</p>
							</div>
						<?php } ?>

						</div>
					</div>

					<div class="row" style="margin-top: 16px;">
						<div class="col">
							<p class="berita-deskripsi-desc"><?php echo $content ?><br></p>
						</div>
					</div>

					<div class="row berita-deskripsi-topik">
						<div class="col">
							<p>Kategori :</p>
						</div>
					</div>

					<div class="row">
						<div class="col">
						
							<div class="d-flex align-content-center flex-wrap berita-deskripsi-topik-box" style="margin-bottom: 0">
								<p style="margin-bottom: 16px;"><?php echo ucfirst(strtolower($category)) ?></p>
								<p style="margin-bottom: 16px;"><?php echo ucfirst(strtolower($sub_category)) ?></p>
							</div>
							<div class="berita-deskripsi-topik-line"></div>
						</div>
					</div>

					<div class="row berita-deskripsi-user">
						<div class="col">
							<div class="d-flex align-items-center"><img class="img-profile-signed"
									src="<?=base_url()?>assets/avatar/<?php echo $this->session->userdata('img-profile') ?>">
								<h4><?php echo $this->session->userdata('name') ?></h4>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col">
							<div class="berita-deskripsi-komen-box">
								<p>KOMENTAR</p>
							</div>
							<p class="berita-deskripsi-komen-info"><?php echo $numComment ?> Comment(s)</p>
						</div>
					</div>

					<div class="row" style="margin-bottom: 36px">
						<div class="col">
							<form id="comment" method="post" action="<?=base_url()?>deskripsi">
								<input type="hidden" name="id" value="<?php echo $artikelID ?>">

								<div class="d-flex align-items-center berita-deskripsi-komen-profil-box">
								<?php if (isset($img_profile_logedin)) { ?>
									<img style="background-image: url('<?=base_url()?>assets/avatar/<?php echo $img_profile_logedin ?>');">
								<?php }else { ?>
									<img style="background-image: url('<?=base_url()?>assets/avatar/unknow_profile.png');">
								<?php } ?>
									<textarea id="comment_article" class="form-control" name="comment"
										placeholder="Add a comment . . ."></textarea>
								</div>

								<?php $n=-1;
								foreach ($comments as $key => $value) { $n++; ?>
								<div class="d-flex align-items-center berita-deskripsi-komen-profil-box">
									<img style="background-image: url('<?=base_url()?>assets/avatar/<?php echo $value->user_img ?>');">
									<div class="berita-deskripsi-komen-profil-content">
										<p class="komen-content-title"><?php echo $value->name ?></p>
										<p class="komen-content-desc"><?php echo nl2br($value->comment) ?><br></p>
										<ul class="d-flex list-unstyled" style="margin: 0;">
											<!-- <li class="komen-content-info">Like</li> -->

											<!-- <li id="komen<?php //echo $value->commentId ?>"
												onclick="slideTog('#reply_comment<?php //echo $value->commentId ?>')"
												class="komen-content-info" style="cursor: pointer;">
												<?php //echo $comment['numReply'][$n]; ?> Reply(s)</li> -->

											<!-- <li class="komen-content-info">9h</li> -->
										</ul>
										<!-- <p class="komen-content-info">Like - Reply - 9h</p> -->
									</div>
								</div>

								<div id="reply_comment<?php echo $value->commentId ?>" style="display: none">

								<?php $textBox=0; for ($r=0; $r < $numReply; $r++) { 
								if ($textBox==0) { $textBox++; ?>
									<input type="hidden" name="comment_id" value="<?php echo $value->commentId ?>">

									<div class="d-flex align-items-center berita-deskripsi-komen-profil-box"
										style="margin-left: 50px;">
										<img
											style="background-image: url('<?=base_url()?>assets/img/mercedes_f1.png');">
										<textarea id="reply_comment" class="form-control" name="reply"
											placeholder="Add a reply . . ."></textarea>
									</div>
								<?php }
                                if (isset($reply['user_reply'][$r])) {
                                    $this->db->where('id', $reply['user_reply'][$r]);
                                    foreach ($this->db->get('users')->result() as $key => $value_user) { ?>
									<div class="d-flex align-items-center berita-deskripsi-komen-profil-box"
										style="margin-left: 50px;">
										<img
											style="background-image: url('<?=base_url()?>assets/img/mercedes_f1.png');">
										<div class="berita-deskripsi-komen-profil-content">
											<p class="komen-content-title"><?php echo $value_user->name ?></p>
											<p class="komen-content-desc"><?php echo $reply['reply'][$r] ?><br></p>
										</div>
									</div>
                                    <?php }}} ?>
								</div>
								<?php } ?>
							</form>

							<div class="berita-deskripsi-komen-line"></div>
							<form action="<?=base_url()?>Deskripsi" method="post">
								<input type="hidden" name="id" value="<?php echo $artikelID ?>">
								<input id="sum_comment" type="hidden" name="sum_comment" value="<?php echo $sumComment+=4 ?>">
								<button id="load_comment" class="btn btn-primary btn-komen-load-more" type="submit">Load more
								comment</button>
							</form>
						</div>
					</div>
					
					<?php include 'template/iklan_landscape.php' ?>

				</div>

				<?php include 'template/iklan_sider.php' ?>

			</div>
		</div>
	</section>
	<section id="bacaJuga-deskripsi">
		<div class="container">
			<div class="row section-title">
				<div class="col">
					<h6>Baca Juga</h6>
					<div class="section-line"></div>
				</div>
			</div>
			<div class="row" style="margin-bottom: 25px;">
				<?php if ($num_trendDesc >= 0) {
				for ($i=0; $i <= $num_trendDesc ; $i++) { 
					if ($i < 6) { ?>
				<div class="col-lg-4" style="margin-bottom: 16px;">
					<a class="list-berita-sm-noLink"
						href="<?=base_url()?>deskripsi/?id=<?php echo $trendDesc['idTrend'][$i] ?>">
						<div>
							<img class="list-berita-sm"
								style="background-image: url('<?=base_url()?>assets/uploads/<?php echo $trendDesc['image'][$i] ?>');">

							<h6 class="list-berita-sm-title">
								<?php echo word_limiter($trendDesc['titleTrend'][$i], 6) ?></h6>

							<p class="list-berita-sm-date"><?php echo $trendDesc['created_atTrend'][$i] ?></p>

							<p class="list-berita-sm-desc">
								<?php echo word_limiter($trendDesc['contentTrend'][$i], 8) ?></p>
						</div>
					</a>
				</div>
				<?php }}} ?>
			</div>
		</div>
	</section>

	<script src="<?=base_url()?>assets/js/script-modal-desc.js"></script>

	<?php include 'template/headline-box.php' ?>
	
	<?php include 'template/iklan_landscape.php' ?>

	<?php include 'template/popular-seminggu.php' ?>

	<?php require_once 'template/footer.php' ?>
	<?php require_once 'template/metajs.php' ?>

	<script>
		var $user = '<?php echo $this->session->userdata('id') ?>';
		$(document).ready(function () {
			sliderM('.populerHome-slider', 'a', '.arrowNext-popularHome', '.arrowPrev-popularHome', 'false');

			$('#comment_article').keypress(function (e) {
				if (e.which == 13) {
					if($user == "") {
						$('#modalMasuk').modal('show');
						$('#comment_article').preventDefault();
					}

				    if (!event.shiftKey) {
				        $('form#comment').submit();
						return false; //<---- Add this line
				    }
				}
			});

			$('#reply_comment').keypress(function (e) {
				if (e.which == 13) {
					$('form#comment').submit();
					return false; //<---- Add this line
				}
			});

			var sum_comment = $("#sum_comment").val();

			if ( sum_comment > 8 ) {
				$('html, body').animate({
					scrollTop: $('#load_comment').offset().top + $('#load_comment').outerHeight(true) -$(window).height()
				}, 200);
			}

		});

		function slideTog(id_comment) {
			$(id_comment).slideToggle("slow");
		}

		$("#load_comment").click(function(e) {
			$('html, body').animate({
				scrollTop: $('#load_comment').offset().top + $('#load_comment').outerHeight(true) -$(window).height()
			}, 1000);
		})

	</script>

</body>

</html>
