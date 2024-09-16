<div style="margin-bottom:100px"></div>

<!-- Room Collections -->
<div id="room-collections" class="container p-4 pb-1 text-center mb-4">

    <h2 class="mb-5 fw-bold">Our <?= $category_data['cat_name']; ?> Collections</h2>
    <?php
    if ($jumlah_total_produk) {
        $xx = 0;
        $max = 4;
    ?>
        <nav class="mb-5" aria-label="Page navigation">
            <ul class="pagination pagination-md justify-content-center">
                <?php if ($page > 2) { ?>
                    <li class="page-item"><a class="page-link" href="<?= base_url('category/' . $category_data['cat_slug']) . '/' . ($page - 1);
                                                                        if (isset($_GET['category'])) {
                                                                            echo '?category=' . $_GET['category'];
                                                                        } ?>"><span aria-hidden="true">&laquo;</span></a></li>
                <?php } ?>
                <?php while ($xx < $jumlah_halaman) {
                    $numpage = $xx + 1;
                    if ($numpage > ($page - 2) && $numpage < ($page + 3)) { ?>
                        <li class="page-item <?php if ($page && $numpage == $page) {
                                                    echo ' active';
                                                } ?>"><a class="page-link" href="<?= base_url('category/' . $category_data['cat_slug']) . '/' . $numpage;
                                                                                    if (isset($_GET['category'])) {
                                                                                        echo '?category=' . $_GET['category'];
                                                                                    } ?>"><?= $numpage; ?></a></li>
                <?php }
                    $xx++;
                } ?>
                <?php if ($page < ($jumlah_halaman - 2)) { ?>
                    <li class="page-item"><a class="page-link" href="<?= base_url('category/' . $category_data['cat_slug']) . '/' . ($page + 1);
                                                                        if (isset($_GET['category'])) {
                                                                            echo '?category=' . $_GET['category'];
                                                                        } ?>"><span aria-hidden="true">&raquo;</span></a></li>
                <?php } ?>
            </ul>
            <div class="text-center fs-6">Page <?= $page; ?> of <?= $jumlah_halaman; ?></div>
        </nav>
    <?php } ?>
    <div class="row mb-3 text-start">
        <?php if ($products) {
            foreach ($products as $key => $product) { ?>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3  mb-3">
                    <a class="text-decoration-none " href="<?= base_url("our-collections/") . $product['product_slug']; ?>">
                        <img class="img-fluid mb-2 border topacity" style="width:400px !important; height:200px !important; object-fit:cover !important;" src="<?= $GLOBALS['domain_static'] . '/assets/products/thumbnail/' . $product['product_thumbnail']; ?>" alt="">
                        <h4 class="text-secondary"><?= $product['product_name']; ?></h4>
                    </a>
                </div>
            <?php }
        } else { ?>
            <div class="text-center bg-secondary p-3"> <span class="text-white">Oops! No collection item to display</span></div>
        <?php } ?>

        <?php
        if ($jumlah_total_produk) {
            $xx = 0;
            $max = 4;
        ?>
            <nav class="" aria-label="Page navigation">
                <ul class="pagination pagination-md justify-content-center">
                    <?php if ($page > 2) { ?>
                        <li class="page-item"><a class="page-link" href="<?= base_url('category/' . $category_data['cat_slug']) . '/' . ($page - 1);
                                                                            if (isset($_GET['category'])) {
                                                                                echo '?category=' . $_GET['category'];
                                                                            } ?>"><span aria-hidden="true">&laquo;</span></a></li>
                    <?php } ?>
                    <?php while ($xx < $jumlah_halaman) {
                        $numpage = $xx + 1;
                        if ($numpage > ($page - 2) && $numpage < ($page + 3)) { ?>
                            <li class="page-item <?php if ($page && $numpage == $page) {
                                                        echo ' active';
                                                    } ?>"><a class="page-link" href="<?= base_url('category/' . $category_data['cat_slug']) . '/' . $numpage;
                                                                                        if (isset($_GET['category'])) {
                                                                                            echo '?category=' . $_GET['category'];
                                                                                        } ?>"><?= $numpage; ?></a></li>
                    <?php }
                        $xx++;
                    } ?>
                    <?php if ($page < ($jumlah_halaman - 2)) { ?>
                        <li class="page-item"><a class="page-link" href="<?= base_url('category/' . $category_data['cat_slug']) . '/' . ($page + 1);
                                                                            if (isset($_GET['category'])) {
                                                                                echo '?category=' . $_GET['category'];
                                                                            } ?>"><span aria-hidden="true">&raquo;</span></a></li>
                    <?php } ?>
                </ul>
                <div class="text-center fs-6">Page <?= $page; ?> of <?= $jumlah_halaman; ?></div>
            </nav>
        <?php } ?>
    </div>
</div>

<!-- Collections By Category -->
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
<!-- Collections By Category -->

<!-- Collections By Room -->
<?php if ($all_rooms) { ?>
    <div class="container p-4">
        <h2>Product By Rooms</h2>
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
<!-- Collections By Room -->

<!-- Collections By Brands -->
<?php if ($all_cats) { ?>
    <div class="container p-4">
        <h2>Product By Brands</h2>
        <section id="splide-brand" class="splide" aria-label="Splide Basic HTML Example">
            <div class="splide__track">
                <ul class="splide__list">
                    <?php foreach ($all_brands as $key => $brand) { ?>
                        <li class="splide__slide p-2"><a href="<?= base_url() . $brand['brand_slug']; ?>">
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