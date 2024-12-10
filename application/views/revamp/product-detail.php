<div style="margin-bottom:100px"></div>

<!-- Brand Collections -->
<div id="brand-collections" class="container p-4 text-center">

    <h1 class="fs-1 mb-2 fw-bold"><?= $products['product_name']; ?></h1>
    <h2 class="fs-6 text-secondary"><?= $products['brand_name'] . ' / ' . $products['cat_name']; ?></h2>
    <div class="row mt-5">

        <div class="col-12  col-sm-12 col-md-12 <?php if ($contentlength > 0) {
                                                    echo "col-lg-6";
                                                } else {
                                                    echo "col-lg-12";
                                                } ?> mb-4">

            <section id="gallery" class="splide" aria-label="Splide Basic HTML Example">
                <div class="splide__track">
                    <ul class="splide__list">
                        <?php
                        if ($gallery) {
                            foreach ($images as $key => $image) {
                        ?>
                                <li class="splide__slide"><a href="<?= $GLOBALS['domain_static'] . '/assets/gallery/' . $gallery . '/' . basename($image); ?>" data-lightbox="products"><img class="img-fluid border" src="<?= $GLOBALS['domain_static'] . '/assets/gallery/' . $gallery . '/' . basename($image); ?>" style="max-height:380px"></a></li>

                            <?php
                            }
                        } else { ?>
                            <li class="splide__slide"><a href="<?= $GLOBALS['domain_static'] . '/assets/products/thumbnail/' . $products['product_thumbnail']; ?>" data-lightbox="products"><img class="img-fluid border" src="<?= $GLOBALS['domain_static'] . '/assets/products/thumbnail/' . $products['product_thumbnail']; ?>" style="max-height:380px"></a></li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </section>


        </div>
        <div class="col-12 col-sm-12 col-md-12 <?php if ($contentlength > 0) {
                                                    echo "col-lg-6";
                                                } else {
                                                    echo "col-lg-12";
                                                } ?> text-start">
            <div class="mb-3" id="brand-desc" style="max-height:240px; overflow-y:hidden; ">
                <?php if ($products['is_discontinued']) { ?>
                    <span class="badge text-bg-danger mb-4">Discontinued Product</span>
                <?php } ?>
                <?php if ($products['show_price']) { ?>
                    <?php if ($setting_price_position == "top") { ?>
                        <div id="price-label-top" class="mb-4">
                            <h3 class="fs-5 fw-bold">Price</h3>
                            <p class="fs-3">IDR <?= number_format($products['product_price'], 0, ",", "."); ?></p>
                            <hr>
                        </div>
                <?php }
                } ?>
                <?php if ($variation) { ?>
                    <div class="mb-4">
                        <h3 class="fs-5 fw-bold">Options</h3>
                        <a href="<?= base_url('our-collections/') . $products['product_slug']; ?>" type="button" class="btn mb-1 btn-outline-dark <?php if (!$selected) {
                                                                                                                                                        echo 'active';
                                                                                                                                                    } ?>">Default</a>
                        <?php foreach ($variation as $key => $var) { ?>
                            <a href="<?= base_url('our-collections/') . $products['product_slug'] . '/' . $var['pv_slug']; ?> " type="button" class="btn mb-1 btn-outline-dark <?php if ($selected == $var['pv_slug']) {
                                                                                                                                                                                    echo 'active';
                                                                                                                                                                                } ?>"><?= $var['pv_label']; ?></a>
                        <?php } ?>
                        <hr>
                    </div>
                <?php } ?>
                <?php
                if ($contentlength > 0) {
                    foreach ($product_content as $key => $content) { ?>
                        <div class="mb-4">
                            <h3 class="fs-5 fw-bold"><?= $key ?></h3>
                            <p><?= $content ?></p>
                            <hr>
                        </div>
                <?php }
                } ?>
                <?php if ($products['show_price']) { ?>
                    <?php if ($setting_price_position == "bottom") { ?>
                        <div id="price-label-bottom" class="mb-4">
                            <h3 class="fs-5 fw-bold">Price</h3>
                            <p class="fs-3">IDR <?= number_format($products['product_price'], 0, ",", "."); ?></p>
                            <hr>
                        </div>
                <?php }
                } ?>
            </div>
            <div id="btn-contain"></div>
            <div class="text-start">
                <?php
                if ($contentlength > 0) { ?>
                    <div id="more-btn" class="d-grid gap-2">
                        <div id="more-desc" class="btn btn-light fs-5 mb-3" style="box-shadow: 0px -45px 30px rgba(255, 255,255, 0.8);">Read More</div>
                    </div>
                <?php } ?>
                <div class="d-grid gap-2">
                    <a href="<?= $cta_link; ?>" target="_blank" id="btn-consultation" class="shaked btn btn-success fs-5 mb-2 whatsapp-click"><i class="fa-brands fa-whatsapp"></i> Product Consultation</a>
                    <?php if ($products['product_specs']) { ?>
                        <a href="<?= $specs; ?>" target="_blank" class="btn btn-dark fs-5 mb-4">Product Specifications</a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Product Type -->
<?php if ($all_cats) { ?>
    <div class="container p-4">
        <h4>See Other Categories</h4>
        <section id="splide-category" class="splide" aria-label="Category Collection" style="height:200px">
            <div class="splide__track">
                <ul class="splide__list">
                    <?php foreach ($all_cats as $key => $cat) { ?>
                        <li class="splide__slide p-2"><a href="<?= base_url('category/') . $cat['cat_slug']; ?>" class="">
                                <div class="text-center text-light text-decoration-none position-relative topacity explore-category-from-product-detail" style="height:200px; background:#4C4C4C;background-position:center center">
                                    <h5 class="position-absolute top-50 start-50 translate-middle"><?= $cat['cat_name']; ?></h5>
                                </div>
                            </a></li>
                    <?php } ?>
                </ul>
            </div>
        </section>
    </div>
<?php } ?>
<!-- Product Type -->

<link href="<?= $GLOBALS['domain_static'] . '/assets/plugins/lightbox2-2.11.5/dist/css/'; ?>lightbox.css" rel="stylesheet" />
<script src="<?= $GLOBALS['domain_static'] . '/assets/plugins/lightbox2-2.11.5/dist/js/'; ?>lightbox.js"></script>

<script>
    lightbox.option({
        'resizeDuration': 200,
        'wrapAround': true,
        'disableScrolling': true,
        'alwaysShowNavOnTouchDevices': true,
        'maxWidth': 2000,
        'maxHeight': 2000
    })
</script>
<script>
    $(document).ready(function() {
        if ($("#btn-contain").visible()) {
            $("#btn-consultation").removeClass('fixed-bottom me-3 mb-3');
            $("#btn-consultation").css('width', '100%');
            $("#btn-consultation").css('box-shadow', 'none');
            $("#btn-consultation").removeAttr('justify-self');
        } else {
            $("#btn-consultation").addClass('fixed-bottom btn-lg border-2 border-light me-3 mb-4');
            $("#btn-consultation").css('width', '260px');
            $("#btn-consultation").css('box-shadow', '8px 20px 25px -1px rgba(0,0,0,0.71)');
            $("#btn-consultation").css('justify-self', 'flex-end');
        }

        // We use the jQuery scroll event
        $(window).on('resize scroll', function() {
            if ($("#btn-contain").visible()) {
                $("#btn-consultation").removeClass('fixed-bottom me-3 mb-3');
                $("#btn-consultation").css('width', '100%');
                $("#btn-consultation").css('box-shadow', 'none');
                $("#btn-consultation").removeAttr('justify-self');
            } else {
                $("#btn-consultation").addClass('fixed-bottom btn-lg border-2 border-light me-3 mb-4');
                $("#btn-consultation").css('width', '260px');
                $("#btn-consultation").css('box-shadow', '8px 20px 25px -1px rgba(0,0,0,0.71)');
                $("#btn-consultation").css('justify-self', 'flex-end');
            }
        });
    });
</script>
<script src="https://fastly.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
<link rel="stylesheet" href="https://fastly.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">

<script>
    new Splide('#splide-category', {
        type: 'loop',
        perPage: 4,
        perMove: 1,
        padding: '2rem',
        autoplay: true,
        pagination: false,
        breakpoints: {
            480: {
                perPage: 2,
            },
            1024: {
                perPage: 2,
            },
        }
    }).mount();
</script>
<?php if ($contentlength > 0) {  ?>
    <script>
        new Splide('#gallery', {
            perPage: 1,
            perMove: 1,
            autoplay: true,
            pagination: true
        }).mount();
    </script>
<?php } else { ?>
    <script>
        new Splide('#gallery', {
            perPage: 1,
            perMove: 1,
            autoplay: true,
            pagination: true,
        }).mount();
    </script>
<?php } ?>



<script>
    $('#more-desc').click(function() {
        $('#brand-desc').css('max-height', '100%');
        this.remove();
    });
</script>

<script>
    $('#more-desc').click(function() {
        $('#brand-desc').css('max-height', '100%');
        this.remove();
    });
</script>