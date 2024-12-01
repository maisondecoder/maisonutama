<!-- Brand Collections -->
<div id="brand-collections" class="container p-4 pb-1 text-start mb-4" style="margin-top:100px">
    <div class="d-flex justify-content-center p-4">
        <h1>Christmas Sale</h1>
    </div>
    <hr>
    <div class="row mt-4 text-center">
        <?php if ($promo_products) {
            foreach ($promo_products as $key => $product) { ?>
                <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3 mb-2">
                    <a class="text-decoration-none" href="<?= base_url("our-collections/") . $product['product_slug'] . '?via=christmas-sale-2024'; ?>">
                        <img class="img-fluid mb-2 border topacity item-from-banner" style="width:300px !important; height:200px !important; object-fit:cover !important;" src="<?= $GLOBALS['domain_static'] . '/assets/products/thumbnail/' . $product['product_thumbnail']; ?>" alt="" width="300" height="200">
                        <h4 class="text-secondary"><?= $product['product_name']; ?></h4>
                    </a>
                </div>
            <?php }
        } else { ?>
            <div class="text-center bg-secondary p-3"> <span class="text-white">Oops! No collection item to display</span></div>
        <?php } ?>
    </div>
</div>