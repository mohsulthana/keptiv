<div class="col-md-4 col-xl-3">
<?php for ($i=0; $i < count($iklan); $i++) {
    if ($iklan[$i]['position'] == 'Space Iklan 3' && $iklan[$i]['status'] == 1) { ?>
        <a href="<?php echo $iklan[$i]['url'] ?>" target="blank">
            <img src="<?=base_url()?>assets/advertisement/<?php echo $iklan[$i]['image'] ?>" width="100%" style="margin-bottom: 8px;" alt="<?php echo $iklan[$i]['name'] ?>">
        </a>
<?php }elseif ($iklan[$i]['position'] == 'Space Iklan 4' && $iklan[$i]['status'] == 1) { ?>
    <a href="<?php echo $iklan[$i]['url'] ?>" target="blank">
        <img src="<?=base_url()?>assets/advertisement/<?php echo $iklan[$i]['image'] ?>" width="100%" alt="<?php echo $iklan[$i]['name'] ?>">
    </a>
<?php }} ?>
</div>