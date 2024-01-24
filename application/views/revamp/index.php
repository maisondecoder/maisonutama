<!-- Hero CTA -->
<div class="py-2 bg-searchbar" style="margin-top:-15px">
    <div class="d-none d-md-block" style="margin-top:5rem"></div>
    <div class="px-3 mb-3">
        <input type="text" class="form-control form-control-lg fs-2" id="searchbar" aria-describedby="searchBar" placeholder="" style="max-width:800px; margin:auto">
    </div>
    <!-- Brands Logo -->

    <div class="container text-center mb-5">
        <img class="img-fluid" src="<?= $GLOBALS['domain_static'] . '/assets/logo-brands-homepage-putih.png'; ?>" width="600px" alt="Brand Partner Logo">
        <div class="mt-4 fs-5 text-white text-center nunjuk"><i class="fa-solid fa-angles-down"></i></div>
    </div>
    
    <div class="d-none d-md-block" style="margin-bottom:5rem"></div>
    <!-- Brands Logo -->

    
</div>
<div class="rounded-top-5 bg-white" style="margin-top:-30px;">
    <div id="hero" class="container p-4 pb-1 pt-sm-5 mb-5">
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
                    <a class="btn btn-dark btn-lg" href="<?= base_url('collections?via=homepage-cta'); ?>">Explore Our Masterpieces</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero CTA -->



    <!-- Brand Partners -->
    <?php if ($all_brands) { ?>
        <div class="bg-dark text-light">
            <div class="container p-4 mt-4">
                <h2><a href="<?= base_url('furniture-brand'); ?>" class="text-decoration-none text-reset">Our Brands <i class="fa-solid fa-arrow-right-long"></i></a></h2>
                <section class="splide" aria-label="Our Brands">
                    <div class="splide__track">
                        <ul class="splide__list">
                            <?php foreach ($all_brands as $key => $brand) { ?>
                                <li class="splide__slide p-2"><a href="<?= base_url() . $brand['brand_slug'] . '?via=homepage-our-brand'; ?>">
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
        <div class="container my-4 p-4 d-none d-md-block">
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

    <!-- Our Stores -->
    <?php if ($all_stores) { ?>
        <div class="container my-4 p-4 d-block d-md-none">
            <h2 class="text-center mb-4">Our Stores</h2>
            <section class="slide-store splide" aria-label="Our Stores">
                <div class="splide__track">
                    <ul class="splide__list">
                        <?php foreach ($all_stores as $key => $store) { ?>
                            <li class="splide__slide p-2">
                                <div class="rounded-lg rounded topacity" style="max-width:400px; background:#4C4C4C"><img class="img-fluid mb-2" src="<?= $GLOBALS['domain_static'] . '/assets/' . $store['store_img']; ?>" style="max-height:300px" alt="<?= $store['store_name']; ?>"></div>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </section>
            <div class="mt-3">
                <?php foreach ($all_stores as $key => $store) { ?>
                    <div class="row mb-3">
                        <div class="col-sm-12 col-md-12 my-sm-0">
                            <div class="text-center">
                                <h4><?= $store['store_name']; ?></h4>
                                <a target="_blank" class="btn btn-dark" href="https://wa.me/<?= $store['store_wa']; ?>"><i class="fa-brands fa-whatsapp"></i> Whatsapp</a>
                                <a target="_blank" class="btn btn-dark" href="<?= $store['store_gmap']; ?>"><i class="fa-regular fa-map"></i> Google Maps</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    <?php } ?>
    <!-- Our Stores -->
</div>

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

<script>
    new Splide('.slide-store', {
        type: 'loop',
        perPage: 1,
        perMove: 1,
        padding: '2rem',
        autoplay: true,
        pagination: true
    }).mount();
</script>

<script>
    var i = 0;
    var txt = "🧞 Type here to search...";
    var speed = 40;

    function typeWriter() {
        if (i < txt.length) {
            document.getElementById("searchbar").placeholder += txt.charAt(i);
            i++;
            setTimeout(typeWriter, speed);
        }
    }

    typeWriter();
</script>