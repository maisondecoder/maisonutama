<!-- Hero CTA -->
<div id="hero" class="container p-4 pb-1">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-6 text-center">
            <figure><img class="img-fluid" src="<?= $GLOBALS['domain_static'] . '/assets/img-babakagu-homepage.png'; ?>" style="max-height:400px" alt=""></figure>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-6 my-2 my-md-5">
            <div class="text-warning fw-bold">#LuxYourHome</div>
            <div>
                <h1>We Make Your Home Feel Comfy</h1>
            </div>
            <div>
                <p>Elevate Your Space with Timeless High-End Furniture and Expert Interior Design. Tailored for Your Unique Style and Comfort.</p>
            </div>
            <div>
                <a class="btn btn-dark btn-lg" href="<?= base_url('collections?via=homepage-cta'); ?>">Browse Our Masterpieces</a>
            </div>
        </div>
    </div>
</div>
<!-- Hero CTA -->

<!-- Brands Logo -->
<div class="container text-center my-5">
    <img class="img-fluid" src="<?= $GLOBALS['domain_static'] . '/assets/logo-brands-homepage-abu2.png'; ?>" width="900px" alt="Brand Partner Logo">
</div>
<!-- Brands Logo -->

<!-- Brand Partners -->
<?php if ($all_brands) { ?>
    <div class="bg-dark text-light">
        <div class="container p-4 mt-4">
            <h2><a href="<?= base_url('furniture-brand'); ?>" class="text-decoration-none text-reset">Our Brands <i class="fa-solid fa-arrow-right-long"></i></a></h2>
            <section class="splide" aria-label="Splide Basic HTML Example">
                <div class="splide__track">
                    <ul class="splide__list">
                        <?php foreach ($all_brands as $key => $brand) { ?>
                            <li class="splide__slide p-2"><a href="<?= base_url() . $brand['brand_slug'].'?via=homepage-our-brand'; ?>">
                                    <div class="rounded-lg rounded topacity" style="max-width:500px; background:#4C4C4C"><img class="img-fluid" src="<?= $GLOBALS['domain_static'] . '/assets/brands/' . $brand['brand_img']; ?>" alt="$brand['brand_name']"></div>
                                </a></li>
                        <?php } ?>
                    </ul>
                </div>
            </section>
        </div>
    </div>
<?php } ?>
<!-- Brand Partners -->

<!-- Our Stores -->
<?php if ($all_stores) { ?>
    <div class="container my-4 p-4">
        <h2 class="text-center mb-4">Our Stores</h2>
        <div class="mt-5">
            <?php foreach ($all_stores as $key => $store) { ?>
                <div class="row mb-3">
                    <div class="col-sm-12 col-md-6 text-center">
                        <img class="img-fluid mb-2" src="<?= $GLOBALS['domain_static'] . '/assets/' . $store['store_img']; ?>" style="max-height:300px" alt="<?= $store['store_name']; ?>">
                    </div>
                    <div class="col-sm-12 col-md-6 my-3 my-sm-0">
                        <h3><?= $store['store_name']; ?></h3>
                        <p>
                            <?= $store['store_addrs']; ?><br>
                        </p>
                        <div>
                            <a target="_blank" class="btn btn-dark btn-lg" href="https://wa.me/<?= $store['store_wa']; ?>"><i class="fa-brands fa-whatsapp"></i> Whatsapp</a>
                            <a target="_blank" class="btn btn-dark btn-lg" href="<?= $store['store_gmap']; ?>"><i class="fa-regular fa-map"></i> Google Map</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
<?php } ?>
<!-- Our Stores -->

<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
<script>
    new Splide('.splide', {
        type: 'loop',
        perPage: 3,
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