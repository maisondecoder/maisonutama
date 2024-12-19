<div style="margin-bottom:100px"></div>
<link rel="stylesheet" href="<?= $GLOBALS['domain_static'] . '/assets/masonry-layout.css'; ?>">
<div class="grid-wrapper">
    <?php foreach ($images as $key=>$image) {
        $classe = "";
        if(($key+1)%2==0){ $classe="big"; }
        ?>
        <div class="<?= $classe ;?>">
            <img src="<?= $GLOBALS['domain_static'] . '/assets/projects/'.$image; ?>" alt="" />
        </div>
    <?php } ?>
</div>

