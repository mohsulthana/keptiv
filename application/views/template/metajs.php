<script src="<?=base_url()?>assets/js/jquery.min.js"></script>
<script src="<?=base_url()?>assets/js/jquery-migrate.js"></script>
<script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>assets/js/all.min.js"></script>
<script src="<?=base_url()?>assets/js/slick.min.js"></script>
<script src="<?=base_url()?>assets/js/app.js"></script>
<script src="<?=base_url()?>assets/js/slider.js"></script>

<!-- Load Twitter SDK for JavaScript -->
<script>window.twttr = (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0],
    t = window.twttr || {};
  if (d.getElementById(id)) return t;
  js = d.createElement(s);
  js.id = id;
  js.src = "https://platform.twitter.com/widgets.js";
  fjs.parentNode.insertBefore(js, fjs);

  t._e = [];
  t.ready = function(f) {
    t._e.push(f);
  };

  return t;
}(document, "script", "twitter-wjs"));</script>

<!-- Load Facebook SDK for JavaScript -->
<script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!-- Load Google SDK for JavaScript -->
<script>
    window.___gcfg = {
    lang: 'en-US',
    parsetags: 'onload'
    };
</script>
<script src="https://apis.google.com/js/platform.js" async defer></script>