<link rel="stylesheet" href="<?=base_url()?>assets/css/all.min.css">
<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
<link rel="stylesheet" href="<?=base_url()?>assets/css/slick.css">
<link rel="stylesheet" href="<?=base_url()?>assets/css/slick-theme.css">
<link rel="stylesheet" href="<?=base_url()?>assets/css/style.css">
<link rel="stylesheet" href="<?=base_url()?>assets/css/responsive.css">
<link rel="stylesheet" href="<?=base_url()?>assets/css/fonts.css">
<link rel="stylesheet" href="<?=base_url()?>assets/css/Navbar-Apple.css">

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