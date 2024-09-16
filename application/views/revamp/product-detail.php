<div style="margin-bottom:100px"></div>

<!-- Brand Collections -->
<div id="brand-collections" class="container p-4 text-center">

    <h1 class="fs-1 mb-2 fw-bold"><?= $products['product_name']; ?></h1>
    <h2 class="fs-6 text-secondary"><?= $products['brand_name'] . ' / ' . $products['cat_name']; ?></h2>
    <div class="row mt-5">

        <div class="col-12  col-sm-12 col-md-12 col-lg-6 mb-4">
            <img class="img-fluid" src="<?= $GLOBALS['domain_static'] . '/assets/products/thumbnail/' . $products['product_thumbnail']; ?>" style="max-height:380px">
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-6 text-start">
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
                <?php foreach ($product_content as $key => $content) { ?>
                    <div class="mb-4">
                        <h3 class="fs-5 fw-bold"><?= $key ?></h3>
                        <p><?= $content ?></p>
                        <hr>
                    </div>
                <?php } ?>
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
                <div id="more-btn" class="d-grid gap-2">
                    <div id="more-desc" class="btn btn-light fs-5 mb-3" style="box-shadow: 0px -45px 30px rgba(255, 255,255, 0.8);">Read More</div>
                </div>
                <div class="d-grid gap-2">
                    <a href="https://api.whatsapp.com/send/?phone=62817700025&text=<?= $template_wa; ?>&type=phone_number&app_absent=0" target="_blank" id="btn-consultation" class="shaked btn btn-success fs-5 mb-4"><i class="fa-brands fa-whatsapp"></i> Product Consultation</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Same Type
<?php if (count($same_cat) > 2) { ?>
    <div class="container p-4">
        <h2><?= $products['cat_name']; ?> Products</h2>
        <section id="splide-related-category" class="splide" aria-label="Other Products">
            <div class="splide__track">
                <ul class="splide__list">
                    <?php foreach ($same_cat as $key => $same_cat) { ?>
                        <li class="splide__slide p-2"><a href="<?= base_url('our-collections/') . $same_cat['product_slug']; ?>">
                                <img class="img-fluid mb-2 border topacity" style="width:250px !important; height:250px !important; object-fit:cover !important;" src="<?= $GLOBALS['domain_static'] . '/assets/products/thumbnail/' . $same_cat['product_thumbnail']; ?>" alt="<?= $same_cat['product_name'] ?>">
                            </a>
                            <h4 class="text-secondary"><?= $same_cat['product_name']; ?></h4>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </section>
    </div>
<?php } ?>
Same Type -->

<!-- 
<?php if (count($same_room) > 2) { ?>
    <div class="container p-4">
        <h2><?= $products['room_name']; ?> Products</h2>
        <section id="splide-related-room" class="splide" aria-label="Other Rooms Product">
            <div class="splide__track">
                <ul class="splide__list">
                    <?php foreach ($same_room as $key => $same_room) { ?>
                        <li class="splide__slide p-2"><a href="<?= base_url('our-collections/') . $same_room['product_slug']; ?>">
                                <img class="img-fluid mb-2 border topacity" style="width:288px !important; height:250px !important; object-fit:cover !important;" src="<?= $GLOBALS['domain_static'] . '/assets/products/thumbnail/' . $same_room['product_thumbnail']; ?>" alt="<?= $same_room['product_name'] ?>">
                            </a>
                            <h4 class="text-secondary"><?= $same_room['product_name']; ?></h4>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </section>
    </div>
<?php } ?>
 -->

<!-- Room Type  -->
<?php if ($all_rooms) { ?>
    <div class="container p-4">
        <h2>See Other Rooms</h2>
        <section id="splide-room" class="splide" aria-label="Room Collection">
            <div class="splide__track">
                <ul class="splide__list">
                    <?php foreach ($all_rooms as $key => $room) { ?>
                        <li class="splide__slide p-2"><a href="<?= base_url('room/') . $room['room_slug']; ?>">
                                <div class="text-center text-light text-decoration-none position-relative topacity" style="height:200px; background:#4C4C4C; background-position:center center; background-image:url('<?= $GLOBALS['domain_static'] . '/assets/rooms/' . $room['room_img']; ?>')">
                                    <h5 class="position-absolute top-50 start-50 translate-middle"><?= $room['room_name']; ?></h5>
                                </div>
                            </a></li>
                    <?php } ?>
                </ul>
            </div>
        </section>
    </div>
<?php } ?>
<!-- Room Type -->

<!-- Product Type -->
<?php if ($all_cats) { ?>
    <div class="container p-4">
        <h2>See Other Categories</h2>
        <section id="splide-category" class="splide" aria-label="Category Collection">
            <div class="splide__track">
                <ul class="splide__list">
                    <?php foreach ($all_cats as $key => $cat) { ?>
                        <li class="splide__slide p-2"><a href="<?= base_url('category/') . $cat['cat_slug']; ?>">
                                <div class="text-center text-light text-decoration-none position-relative topacity" style="height:200px; background:#4C4C4C;background-position:center center; background-image:url('<?= $GLOBALS['domain_static'] . '/assets/categories/' . $cat['cat_img']; ?>')">
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

<!-- Collections By Brands -->
<?php if ($all_cats) { ?>
    <div class="container p-4">
        <h2>See Other Brands</h2>
        <section id="splide-brand" class="splide" aria-label="Other Brands">
            <div class="splide__track">
                <ul class="splide__list">
                    <?php foreach ($all_brands as $key => $brand) { ?>
                        <li class="splide__slide p-2"><a href="
                        <?= base_url() . $brand['brand_slug']; ?>">
                                <div class="topacity d-flex flex-col justify-content-center" style="height:200px;background-blend-mode: darken; background:rgba(0, 0, 0, .3);background-size:cover; background-image:url('<?= $GLOBALS['domain_static'] . '/assets/brands/' . $brand['brand_bg']; ?>');"><img class="img-fluid align-self-center" width="300" src="<?= $GLOBALS['domain_static'] . '/assets/brands/' . $brand['brand_img']; ?>" alt="<?= $brand['brand_name']; ?>"><a href="<?= base_url('/') . $brand['brand_slug']; ?>" class="stretched-link"></a></div>
                            </a></li>
                    <?php } ?>
                </ul>
            </div>
        </section>
    </div>
<?php } ?>
<!-- Collections By Brands -->

<!--
<div id="" class="fixed-bottom">
    <div class="position-relative">
        <div class="position-absolute bottom-0 end-0">
            <a href="https://api.whatsapp.com/send/?phone=62817700025&text=<?= $template_wa; ?>&type=phone_number&app_absent=0" target="_blank" id="floating-bottom" class="shaked btn btn-success btn-lg border border-2 border-light fs-5 mb-4 me-4"><i class="fa-brands fa-whatsapp"></i> Product Consultation</a>
        </div>
    </div>
</div>-->
<script>
    $(document).ready(function() {
        if ($("#btn-contain").visible()) {
            $("#btn-consultation").removeClass('fixed-bottom me-3');
            $("#btn-consultation").css('width', '100%');
            $("#btn-consultation").removeAttr('justify-self');
        } else {
            $("#btn-consultation").addClass('fixed-bottom btn-lg border-2 border-light me-3');
            $("#btn-consultation").css('width', '300px');
            $("#btn-consultation").css('justify-self', 'flex-end');
        }

        // We use the jQuery scroll event
        $(window).on('resize scroll', function() {
            if ($("#btn-contain").visible()) {
                $("#btn-consultation").removeClass('fixed-bottom me-3');
                $("#btn-consultation").css('width', '100%');
                $("#btn-consultation").removeAttr('justify-self');
            } else {
                $("#btn-consultation").addClass('fixed-bottom btn-lg border-2 border-light me-3');
                $("#btn-consultation").css('width', '300px');
                $("#btn-consultation").css('justify-self', 'flex-end');
            }
        });
    });
</script>
<script src="https://fastly.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
<link rel="stylesheet" href="https://fastly.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
<script>
    /*
    <?php if (count($same_cat) > 2) { ?>
        new Splide('#splide-related-category', {
            type: 'loop',
            perPage: 5,
            perMove: 1,
            padding: '2rem',
            autoplay: true,
            pagination: false,
            breakpoints: {
                400: {
                    perPage: 1,
                },
                600: {
                    perPage: 3,
                },
                900: {
                    perPage: 3,
                },
            }
        }).mount();
    <?php } ?>
    
    <?php if (count($same_room) > 2) { ?>
        new Splide('#splide-related-room', {
            type: 'loop',
            perPage: 5,
            perMove: 1,
            padding: '2rem',
            autoplay: true,
            pagination: false,
            breakpoints: {
                400: {
                    perPage: 1,
                },
                600: {
                    perPage: 3,
                },
                900: {
                    perPage: 3,
                },
            }
        }).mount();
    <?php } ?>
*/
    new Splide('#splide-room', {
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

    new Splide('#splide-brand', {
        type: 'loop',
        perPage: 4,
        perMove: 1,
        padding: '2rem',
        autoplay: true,
        pagination: false,
        breakpoints: {
            480: {
                perPage: 1,
            },
            1024: {
                perPage: 2,
            },
        }
    }).mount();
</script>


<script>
    $('#more-desc').click(function() {
        $('#brand-desc').css('max-height', '100%');
        this.remove();
    });
</script>