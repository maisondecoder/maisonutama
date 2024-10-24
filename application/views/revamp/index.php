<!-- Search
<div class="py-2 bg-dark" style="margin-top:-15px">
    <div class="d-none d-md-block" style="margin-top:5rem"></div>
    <div class="px-3 mb-3 mt-2">
        <a href="<?= base_url('main/search'); ?>" class="text-decoration-none">
            <input type="text" class="form-control form-control-lg fs-2 " id="searchbar" aria-describedby="searchBar" placeholder="" style="max-width:800px; margin:auto">
        </a>
    </div>

    <div class="container text-center mb-5">
        <img class="img-fluid" src="<?= $GLOBALS['domain_static'] . '/assets/logo-brands-homepage-putih.png'; ?>" width="600px" alt="Brand Partner Logo">

    </div>

    <div class="d-none d-md-block" style="margin-bottom:5rem"></div>
</div>
-->

<!--
    <video autoplay muted loop id="myVideo">
        <source src="https://www.w3schools.com/howto/rain.mp4" type="video/mp4" >
    </video>
-->

<div class="text-center d-flex justify-content-center" style="min-height:600px;height:60vw;overflow:hidden; background:black">
    <img src="<?= $GLOBALS['domain_static'] . '/assets/bg-papadatos.webp'; ?>" alt="" style="position:relative;width:100%;object-fit:cover !important;opacity:0.6">
    <div class="align-self-center" style="position:absolute; z-index:9;">
        <div class="col-lg-8 mx-auto text-white text-start p-2 py-5 text-center">
            <div class="text-warning fw-bold mb-5">#LuxYourHome</div>
            <div class="mb-5">
                <h1 class="fs-3">We Make Your Home Feel Comfy</h1>
            </div>
            <div class="mb-5">
                <p>Elevate Your Space with Timeless High-End Furniture and Expert Interior Design. Tailored for Your Unique Style and Comfort.</p>
            </div>
            <div>
                <a class="btn btn-outline-light btn-lg" href="#brands">Explore Our Masterpieces</a>
            </div>
        </div>
    </div>
</div>

<!-- Brand Partners -->
<?php if ($all_brands) { ?>
    <div id="brands" class="text-dark bg-white" style="background-color: #171717;">
        <div class="container p-4 text-center">
            <h2 class="my-5 fs-1">Discover Our Brands</h2>
            <div class="row d-flex flex-row justify-content-center">
                <?php foreach ($all_brands as $key => $brand) { ?>
                    <div class="d-flex flex-col col-12 col-md-6 p-4">
                        <div class="topacity d-flex flex-col justify-content-center" style="width:100%; height:350px;background-blend-mode: darken; background:rgba(0, 0, 0, .3);background-size:cover; background-image:url('<?= $GLOBALS['domain_static'] . '/assets/brands/' . $brand['brand_bg']; ?>');"><img class="img-fluid align-self-center" width="300" src="<?= $GLOBALS['domain_static'] . '/assets/brands/' . $brand['brand_img']; ?>" alt="<?= $brand['brand_name']; ?>"><a href="<?= base_url('/').$brand['brand_slug']; ?>" class="stretched-link"></a></div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>
<!-- Brand Partners -->

<!-- Best Seller  -->
<?php if ($bs_products) { ?>
    <div class="bg-light text-dark border">
        <div class="container p-4  text-center">
            <h2 class="my-5 fs-1">Featured Product</h2>
            <section id="" class="bestseller splide" aria-label="Best Seller Products">
                <div class="splide__track">
                    <ul class="splide__list">
                        <?php foreach ($bs_products as $key => $bestseller) { ?>
                            <li class="splide__slide p-2"><a href="<?= base_url('our-collections/') . $bestseller['product_slug']; ?>">
                                    <img class="img-fluid mb-2 border topacity" style="width:400px; height:250px !important; object-fit:cover !important;" src="<?= $GLOBALS['domain_static'] . '/assets/products/thumbnail/' . $bestseller['product_thumbnail']; ?>" alt="<?= $bestseller['product_name'] ?>">
                                </a>
                                <h4 class="text-secondary"><?= $bestseller['product_name']; ?></h4>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </section>
        </div>
    </div>
<?php } ?>
<!-- Best Seller -->

<!-- Store -->
<?php if ($all_stores) { ?>
    <div class="text-light" style="width:100%; min-height:600px; max-height:50vw;background-blend-mode: darken; background:rgba(0, 0, 0, .7);background-size:cover; background-position:center bottom; background-image:url('<?= $GLOBALS['domain_static'] . '/assets/home-store-cover.jpg'; ?>');">
        <div class="container p-4">
            <h2 class="my-5 fs-1 text-center text-md-start">Our Stores</h2>
            <div class="row d-flex flex-row justify-content-center">
            <?php foreach ($all_stores as $key => $store) { ?>
                <div class="row mb-5">
                    <div class="col-sm-12 col-md-6 my-3 my-sm-0">
                        <h3><?= $store['store_name']; ?></h3>
                        <p class="fs-6">
                            <?= $store['store_addrs']; ?><br>
                        </p>
                        <div>
                            <a target="_blank" class="btn btn-outline-light" href="https://wa.me/<?= $store['store_wa']; ?>?text=<?= $store['store_default_text']; ?>"><i class="fa-brands fa-whatsapp"></i> Whatsapp</a>
                            <a target="_blank" class="btn btn-outline-light" href="<?= $store['store_gmap']; ?>"><i class="fa-regular fa-map"></i> Google Map</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>
<!-- Store -->
</div>

<script src="https://fastly.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
<link rel="stylesheet" href="https://fastly.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">

<!-- Scroll Navbar -->
<script>
    var current = 0;
    $(document).ready(function() {
        $("#navbar").removeClass('bg-dark', 200);

        $(window).scroll(function() {
            current = $(this).scrollTop();

            if (current > 70) {
                $("#navbar").addClass('bg-dark', 200);
            } else {
                $("#navbar").removeClass('bg-dark', 200, "easeInBack");
            }
        });

        $("#navToggler").click(function() {
            if (current < 70) {
                $("#navbar").toggleClass('bg-dark', 200);
            }
        });

    });
</script>

<script>
    new Splide('.bestseller', {
        type: 'loop',
        perPage: 3,
        perMove: 1,
        padding: '1rem',
        autoplay: true,
        pagination: false,
        breakpoints: {
            400: {
                perPage: 1,
            },
            640: {
                perPage: 1,
            },
            800: {
                perPage: 1,
            },
            1024: {
                perPage: 2,
            },
        }
    }).mount();
</script>

<!--
<script>
    var i = 0;
    var txt = "🔎 Type here to search...";
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
-->