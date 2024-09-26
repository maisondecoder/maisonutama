<div style="margin-bottom:100px"></div>

<!-- Intro Brand -->
<div id="intro-brands" class="container p-4 pb-1 text-center mb-4">
    <h2 class="mb-4 fw-bold">Intro Brand</h2>
    <p>With a legacy spanning over 30 years, Maison has partnered with world-class international brands.</p>
</div>

<div id="brand-partners" class="container p-4 pb-1 text-center mb-4">
    <h2 class="mb-4 fw-bold">Our Brand Partners</h2>
    <div class="row">
        <?php if ($all_brands) { ?>
            <?php foreach ($all_brands as $key => $brand) { ?>
                <div class="col-6 col-sm-6 col-md-4 mb-4">
                    <a href="<?= base_url() . $brand['brand_slug']; ?>">
                        <div class="topacity" style="max-width:500px; background:#4C4C4C"><img class="img-fluid" src="<?= $GLOBALS['domain_static'].'/assets/brands/' . $brand['brand_img']; ?>" alt="<?= $brand['brand_name']; ?>"></div>
                    </a>
                </div>
            <?php }
        } else {
            ?>
            <p>Oops! Sorry no brands data to display</p>
        <?php } ?>
    </div>
</div>