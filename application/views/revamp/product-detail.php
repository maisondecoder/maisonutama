<!-- Brand Collections -->
<div id="brand-collections" class="container p-4 pb-1 text-center mb-4">

    <h1 class="fs-1 mb-2 fw-bold"><?= $products['product_name']; ?></h1>
    <h2 class="fs-6 text-secondary"><?= $products['brand_name'] . ' / ' . $products['cat_name']; ?></h2>
    <div class="row mt-4">
        <div class="col-12  col-sm-12 col-md-12 col-lg-6  mb-4">
            <img class="img-fluid rounded" src="<?= 'https://9v6e9irhcc.r.worldssl.net/assets/products/thumbnail/' . $products['product_thumbnail']; ?>">
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-6 text-start">
            <div class="mb-3" id="brand-desc" style="max-height:310px; overflow-y:hidden">
                <?php foreach ($product_content as $key => $content) { ?>
                    <div class="mb-4">
                        <h3 class="fs-5 fw-bold"><?= $key ?></h3>
                        <p><?= $content ?></p>
                        <hr>
                    </div>
                <?php } ?>
            </div>
            <div class="d-grid gap-2">
                <div id="more-desc" class="btn btn-dark fs-5">Read Full Description</div>
            </div>
        </div>
    </div>
</div>

<!-- same -->

<!-- Collections By Brand -->

<!-- Room Type  -->
<?php if ($all_rooms) { ?>
    <div class="container p-4">
        <h2>Room Type</h2>
        <section id="splide-room" class="splide" aria-label="Room Collection">
            <div class="splide__track">
                <ul class="splide__list">
                    <?php foreach ($all_rooms as $key => $room) { ?>
                        <li class="splide__slide p-2"><a href="<?= base_url('room/') . $room['room_slug']; ?>">
                                <div class="rounded-lg rounded text-center text-light text-decoration-none position-relative" style="height:200px; background:#4C4C4C">
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
        <h2>Product Type</h2>
        <section id="splide-category" class="splide" aria-label="Category Collection">
            <div class="splide__track">
                <ul class="splide__list">
                    <?php foreach ($all_cats as $key => $cat) { ?>
                        <li class="splide__slide p-2"><a href="<?= base_url('category/') . $cat['cat_slug']; ?>">
                                <div class="rounded-lg rounded text-center text-light text-decoration-none position-relative" style="height:200px; background:#4C4C4C">
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

<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
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
</script>


<script>
    $('#more-desc').click(function() {
        $('#brand-desc').css('max-height', '100%');
        this.remove();
    });
</script>