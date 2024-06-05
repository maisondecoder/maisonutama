<!-- Project Detail -->
<div id="brand-collections" class="container text-center py-2">
    <h1 class="fs-1"><?= $project['project_name']; ?></h1>
    <div class="mx-auto" style="max-width:800px">
        <img id="img-show" class="img-fluid rounded" src="<?= $GLOBALS['domain_static'] . '/assets/projects/'.$images[0]; ?>" alt="">
        <section id="splide-gallery" class="splide" aria-label="Project Gallery">
            <div class="splide__track">
                <ul class="splide__list">
                    <?php foreach($images as $image){ ?>
                    <li class="splide__slide p-2">
                        <img class="img-fluid rounded thumbclick" src="<?= $GLOBALS['domain_static'] . '/assets/projects/'.$image; ?>" style="cursor:pointer;">
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </section>
    </div>
</div>

<!-- Designer in Project  -->
<div class="container py-2">
    <h2 class="fs-2">Designer</h2>
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
<?php if($products){ ?>
<div class="container py-2">
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
<?php } ?>
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
        perPage: 6,
        perMove: 1,
        autoplay: true,
        pagination: false,
        padding: '1rem',
        breakpoints: {
            400: {
                perPage: 4,
            },
            800: {
                perPage: 4,
            },
            1000: {
                perPage: 5,
            },
        }
    }).mount();

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

    
        $(".thumbclick").click(function(){
            $("#img-show").attr('src', $(this).attr('src'));
        });
</script>