<div style="margin-bottom:100px"></div>
<!-- Collections By Room -->
<?php if ($all_rooms) { ?>
    <div class="container p-4">
        <h2>Room Collections</h2>
        <section id="splide-room" class="splide" aria-label="Room Collection">
            <div class="splide__track">
                <ul class="splide__list">
                    <?php foreach ($all_rooms as $key => $room) { ?>
                        <li class="splide__slide p-2"><a href="<?= base_url('room/') . $room['room_slug'] . '?via=our-collections'; ?>">
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
<!-- Collections By Room -->

<!-- Collections By Category -->
<?php if ($all_cats) { ?>
    <div class="container p-4">
        <h2>Category Collections</h2>
        <section id="splide-category" class="splide" aria-label="Category Collection">
            <div class="splide__track">
                <ul class="splide__list">
                    <?php foreach ($all_cats as $key => $cat) { ?>
                        <li class="splide__slide p-2"><a href="<?= base_url('category/') . $cat['cat_slug'] . '?via=our-collections'; ?>">
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
<!-- Collections By Category -->

<!-- Collections By Brands -->
<?php if ($all_brands) { ?>
    <div class="container p-4">
        <h2>Brand Collections</h2>
        <section id="splide-brand" class="splide" aria-label="Brand Collection">
            <div class="splide__track">
                <ul class="splide__list">
                    <?php foreach ($all_brands as $key => $brand) { ?>
                        <li class="splide__slide p-2"><a href="<?= base_url() . $brand['brand_slug'] . '?via=our-collections'; ?>">
                                <div class="topacity d-flex flex-col justify-content-center" style="height:200px;background-blend-mode: darken; background:rgba(0, 0, 0, .3);background-size:cover; background-image:url('<?= $GLOBALS['domain_static'] . '/assets/brands/' . $brand['brand_bg']; ?>');"><img class="img-fluid align-self-center" width="300" src="<?= $GLOBALS['domain_static'] . '/assets/brands/' . $brand['brand_img']; ?>" alt="<?= $brand['brand_name']; ?>"><a href="<?= base_url('/') . $brand['brand_slug']; ?>" class="stretched-link"></a></div>
                            </a></li>
                    <?php } ?>
                </ul>
            </div>
        </section>
    </div>
<?php } ?>
<!-- Collections By Brands -->


<script src="https://fastly.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
<link rel="stylesheet" href="https://fastly.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
<script>
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