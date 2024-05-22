<!-- Project Detail -->
<div id="brand-collections" class="container text-center py-4">
    <h1><?= $project['project_title']; ?></h1>
    <div class="mx-auto" style="max-width:800px">
        <section id="splide-gallery" class="splide" aria-label="Project Gallery">
            <div class="splide__track">
                <ul class="splide__list">
                    <li class="splide__slide p-2" data-splide-hash="slide01">
                        <img class="img-fluid rounded" src="<?= $GLOBALS['domain_static'] . '/assets/projects/1.jpeg'; ?>">
                    </li>
                    <li class="splide__slide p-2" data-splide-hash="slide02">
                        <img class="img-fluid rounded" src="<?= $GLOBALS['domain_static'] . '/assets/projects/2.jpeg'; ?>">
                    </li>
                    <li class="splide__slide p-2" data-splide-hash="slide03">
                        <img class="img-fluid rounded" src="<?= $GLOBALS['domain_static'] . '/assets/projects/3.jpeg'; ?>">
                    </li>
                    <li class="splide__slide p-2" data-splide-hash="slide04">
                        <img class="img-fluid rounded" src="<?= $GLOBALS['domain_static'] . '/assets/projects/4.jpeg'; ?>">
                    </li>
                </ul>
            </div>
        </section>
        <section>
            <div>
                <a href="#slide01"><img src="<?= $GLOBALS['domain_static'] . '/assets/projects/1.jpeg'; ?>" class="img-thumbnail" alt="..." style="max-height:64px"></a>
                <a href="#slide02"><img src="<?= $GLOBALS['domain_static'] . '/assets/projects/2.jpeg'; ?>" class="img-thumbnail" alt="..." style="max-height:64px"></a>
                <a href="#slide03"><img src="<?= $GLOBALS['domain_static'] . '/assets/projects/3.jpeg'; ?>" class="img-thumbnail" alt="..." style="max-height:64px"></a>
                <a href="#slide04"><img src="<?= $GLOBALS['domain_static'] . '/assets/projects/4.jpeg'; ?>" class="img-thumbnail" alt="..." style="max-height:64px"></a>
            </div>
        </section>
    </div>
</div>

<!-- Designer in Project  -->
<div class="container p-4">
    <h2>Designer</h2>
    <section id="" class="" aria-label="Other Products">
        <div class="card mb-2" style="max-width:200px">
            <div class="row g-0">
                <div class="col-auto">
                    <div class="card-body">
                        <h5 class="mb-2">Maison Living</h5>
                        <a href="https://www.instagram.com/maisonliving.id/" class="btn btn-primary" target="_blank">Visit Designer <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Designer in Project  -->

<!-- Product in Project  -->
<div class="container p-4">
    <h2>Product in This Project</h2>
    <section id="splide-related-product" class="splide" aria-label="Products in This Project">
        <div class="splide__track">
            <ul class="splide__list">
                <?php foreach ($products as $key => $product) { ?>
                    <li class="splide__slide p-2"><a href="<?= base_url('our-collections/') . $product['product_slug']; ?>">
                            <img class="img-fluid mb-2 rounded border topacity" style="width:200px !important; height:250px !important; object-fit:cover !important;" src="<?= $GLOBALS['domain_static'] . '/assets/products/thumbnail/' . $product['product_thumbnail']; ?>" alt="<?= $product['product_name'] ?>">
                        </a>
                        <h4 class="text-secondary"><?= $product['product_name']; ?></h4>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </section>
</div>
<!-- Product in Project  -->

<div class="fixed-bottom container p-4 bg-light bg-gradient mb-4 border border-dark shadow mx-auto text-center">
    Want to make your dream room come true? We can help make it happen! <a href="https://wa.me/62817700025" class="fw-bold">Whatsapp Us</a>
</div>

<script src="https://fastly.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide-extension-url-hash@0.3.0/dist/js/splide-extension-url-hash.min.js"></script>
<link rel="stylesheet" href="https://fastly.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
<script>
    new Splide('#splide-gallery', {
        type: 'loop',
        perPage: 1,
        perMove: 1,
        autoplay: true,
        pagination: true,
    }).mount(window.splide.Extensions);

    new Splide('#splide-related-product', {
        perPage: 5,
        perMove: 1,
        autoplay: true,
        pagination: false,
        breakpoints: {
            400: {
                perPage: 2,
            },
            800: {
                perPage: 2,
            },
            1000: {
                perPage: 3,
            },
        }
    }).mount();
</script>