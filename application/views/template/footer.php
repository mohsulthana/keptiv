<!-- <section>
	<div class="d-flex">
		<div class="footer-line-blue"></div>
		<div class="footer-line-orange"></div>
	</div>
	<div class="container">
		<div class="row footer-content">
			<div class="col-md-8">
				<ul class="list-unstyled d-flex justify-content-center">
                    <li><a href="<?=base_url()?>Kontak">Kontak</a></li>
                    <li><a href="<?=base_url()?>Privacy">Privacy</a></li>
                    <li><a href="<?=base_url()?>Disclaimer">Disclaimer</a></li>
                    <li><a href="<?=base_url()?>Tentang">Tentang</a></li>
                    <li><a href="<?=base_url()?>Pengaduan">From Pengaduan</a></li>
				</ul>
				<p class="text-center">
                    <i class="far fa-copyright"></i>
                    <span>Copyright Keptiv 2018 All Right Reserved</span>
                </p>
			</div>
			<div class="col-md-4 d-flex justify-content-end">
                <div style="width: 40%">
                    <p class="footer-follow">Follow Us</p>
                    <ul class="list-unstyled d-flex align-items-center justify-content-between" style="padding: 0">
                        <?php for ($i=0; $i < count($settings); $i++) { 
                            if ($settings[$i]['key'] == 'facebook') { ?>
                                <li><a href="<?php echo $settings[$i]['value'] ?>" target="blank" style="padding: 0"><i class="fab fa-facebook-f footer-follow-list" style="margin: 0"></i></a></li>
                            <?php }elseif ($settings[$i]['key'] == 'twitter') { ?>
                                <li><a href="<?php echo $settings[$i]['value'] ?>" target="blank" style="padding: 0"><i class="fab fa-twitter footer-follow-list" style="margin: 0"></i></a></li>
                            <?php }elseif ($settings[$i]['key'] == 'youtube') { ?>
                                <li><a href="<?php echo $settings[$i]['value'] ?>" target="blank" style="padding: 0"><i class="fab fa-youtube footer-follow-list" style="margin: 0"></i></a></li>
                            <?php }elseif ($settings[$i]['key'] == 'instagram') { ?>
                                <li><a href="<?php echo $settings[$i]['value'] ?>" target="blank" style="padding: 0"><i class="fab fa-instagram footer-follow-list" style="margin: 0"></i></a></li>
                            <?php }
                        } ?>
                    </ul>
                </div>
            </div>
		</div>
	</div>
</section> -->


<footer class="page-footer font-small indigo">
    <div class="d-flex">
        <div class="footer-line-blue"></div>
        <div class="footer-line-orange"></div>
    </div>

    <!-- Footer Links -->
    <div class="container">

      <!-- Grid row-->
      <div class="row text-center d-flex justify-content-center pt-5 mb-3 ">

        <!-- Grid column -->
        <div class="col-md-2 mb-3 new-footer">
          <h6>
            <a href="<?=base_url()?>Kontak">Kontak</a>
          </h6>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 mb-3 new-footer">
          <h6>
            <a href="<?=base_url()?>Privacy">Privacy</a>
          </h6>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 mb-3 new-footer">
          <h6>
            <a href="<?=base_url()?>Disclaimer">Disclaimer</a>
          </h6>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 mb-3 new-footer">
          <h6>
            <a href="<?=base_url()?>Tentang">Tentang</a>
          </h6>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 mb-3 new-footer">
          <h6>
            <a href="<?=base_url()?>Pengaduan">From Pengaduan</a>
          </h6>
        </div>
        <!-- Grid column -->

      </div>
      <!-- Grid row-->
      <hr class="rgba-white-light" style="margin: 0 15%;">
      <!-- Grid row-->
      <div>

        <!-- Grid column -->
        <div>

          <div class="flex-center text-center footer-copyright" style="margin-top: 30px;">

            <!-- Facebook -->
            <?php for ($i=0; $i < count($settings); $i++) { 
                            if ($settings[$i]['key'] == 'facebook') { ?>
            <a class="fb-ic" href="<?php echo $settings[$i]['value'] ?>" target="blank">
              <i class="fab fa-facebook-f fa-lg white-text mr-4"> </i>
            </a>
            <!-- Twitter -->
            <?php }elseif ($settings[$i]['key'] == 'twitter') { ?>
            <a class="tw-ic" href="<?php echo $settings[$i]['value'] ?>" target="blank">
              <i class="fab fa-twitter fa-lg white-text mr-4"> </i>
            </a>
            <!--Youtube-->
            <?php }elseif ($settings[$i]['key'] == 'youtube') { ?>
            <a class="li-ic" href="<?php echo $settings[$i]['value'] ?>" target="blank">
              <i class="fab fa-youtube fa-lg white-text mr-4"> </i>
            </a>
            <!--Instagram-->
            <?php }elseif ($settings[$i]['key'] == 'instagram') { ?>
            <a class="ins-ic" href="<?php echo $settings[$i]['value'] ?>" target="blank">
              <i class="fab fa-instagram fa-lg white-text mr-4"> </i>
            </a>
            <?php }
                        } ?>

          </div>

        </div>
        <!-- Grid column -->

      </div>
      <!-- Grid row-->

    </div>
    <!-- Footer Links -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© Copyright Keptiv 2018 All Right Reserved
    </div>
    <!-- Copyright -->

  </footer>
  <!-- Footer -->
