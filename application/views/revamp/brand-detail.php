<!-- Intro Brand -->
<div id="intro-brands" class="container p-4 pb-1 text-center mb-4">
    <h2 class="mb-4 fw-bold">About <?= $brand_data['brand_name']; ?></h2>
    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Non velit possimus cupiditate repellat nesciunt itaque minima nobis quaerat labore accusamus, laborum doloribus omnis iusto magni quia! Nisi dolore iure corrupti?</p>
</div>

<!-- Brand Collections -->
<div id="intro-brands" class="container p-4 pb-1 text-center mb-4">
    <h2 class="mb-4 fw-bold"><?= $brand_data['brand_name']; ?> Collections</h2>
    <p>Oops! No collection item to display</p>
</div>

<!-- Other Brands -->
<div id="brand-partners" class="container p-4 pb-1 text-center mb-4">
    <h2 class="mb-4 fw-bold">Brands You Might Like</h2>
    <div class="row">
        <?php if ($all_brands) { ?>
            <?php foreach ($all_brands as $key => $brand) { ?>
                <div class="col-6 col-sm-6 col-md-4 mb-4">
                    <a href="<?= base_url() . $brand['brand_slug']; ?>">
                        <div class="rounded-lg rounded" style="max-width:500px; background:#4C4C4C"><img class="img-fluid" src="<?= base_url('assets/brands/') . $brand['brand_img']; ?>" alt="<?= $brand['brand_name']; ?>"></div>
                    </a>
                </div>
            <?php }
        } else {
            ?>
            <p>Oops! Sorry no brands data to display</p>
        <?php } ?>
    </div>
</div>