<!-- Brand Collections -->
<div id="brand-collections" class="container p-4 pb-1 text-center mb-4">

    <h2 class="mb-3 fw-bold"><?= $brand_data['brand_name']; ?> Collections</h2>
    <div class="mb-5">
        <ul class="nav nav-underline justify-content-center">
            <li class="nav-item" style="display: inline-block;">
                <a class="nav-link active" aria-current="page" href="#">All</a>
            </li>
            <li class="nav-item" style="display: inline-block;float:none;">
                <a class="nav-link" href="#">Armchair</a>
            </li>
            <li class="nav-item" style="display: inline-block;float:none;">
                <a class="nav-link" href="#">Sofa</a>
            </li>
            <li class="nav-item" style="display: inline-block;float:none;">
                <a class="nav-link" href="#">Bed</a>
            </li>
            <li class="nav-item" style="display: inline-block;float:none;">
                <a class="nav-link" href="#">Table</a>
            </li>
            <li class="nav-item" style="display: inline-block;float:none;">
                <a class="nav-link" href="#">Chair</a>
            </li>
            <li class="nav-item" style="display: inline-block;float:none;">
                <a class="nav-link" href="#">Lamp</a>
            </li>
        </ul>
    </div>
    <div class="row mb-3 text-start">
        <?php if ($products) {
            foreach ($products as $key => $product) { ?>
                <div class="col-6 col-sm-3 mb-3">
                    <a class="text-decoration-none " href="<?= base_url("our-collections/") . $product['product_slug']; ?>">
                        <img class="img-fluid mb-2 rounded" src="https://placehold.co/450" alt="">
                        <h4 class="text-secondary"><?= $product['product_name']; ?></h4>
                    </a>
                </div>
            <?php }
        } else { ?>
            <div class="text-center bg-secondary p-3"> <span class="text-white">Oops! No collection item to display</span></div>
        <?php } ?>
    </div>
</div>

<!-- Intro Brand -->
<div id="intro-brands" class="container p-4 pb-1 mb-4">
    <h2 class="mb-4 fw-bold text-center">About <?= $brand_data['brand_name']; ?></h2>


    <div class="row">
        <div class="col-12 col-sm-4 mb-3">
            <div class="rounded-lg rounded" style="max-width:500px; background:#4C4C4C"><img class="img-fluid text-end" src="<?= base_url('assets/brands/') . $brand_data['brand_img']; ?>" alt="<?= $brand_data['brand_name']; ?>"></div>
        </div>
        <div class="col-12 col-sm-8">
            <p class="mb-3" id="brand-desc" style="max-height:120px; overflow-y:hidden"><?= $brand_data['brand_desc']; ?></p>
            <span id="more-desc" class="btn fs-5 fw-bold text-primary"><em>Read More...</em></span>

        </div>

    </div>
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

<script>
    $('#more-desc').click(function() {
        $('#brand-desc').css('max-height', '100%');
        this.remove();
    });
</script>