<!-- Room Collections -->
<div id="room-collections" class="container p-4 pb-1 text-center mb-4">

    <h2 class="mb-5 fw-bold">Our <?= $room_data['room_name']; ?> Collections</h2>
    <?php 
        if($jumlah_total_produk){ 
            $xx=0;
            $max=4;
        ?>
        <nav class="mb-5" aria-label="Page navigation">
            <ul class="pagination pagination-md justify-content-center">
                <?php if($page>2){ ?>
                <li class="page-item"><a class="page-link" href="<?= base_url('room/'.$room_data['room_slug']) . '/'.($page-1); if (isset($_GET['category'])) { echo '?category='.$_GET['category']; } ?>"><span aria-hidden="true">&laquo;</span></a></li>
                <?php } ?>
                <?php while($xx < $jumlah_halaman){
                    $numpage = $xx+1; 
                    if($numpage > ($page-2) && $numpage < ($page+3)){?>
                <li class="page-item <?php if($page && $numpage == $page){ echo ' active'; } ?>"><a class="page-link" href="<?= base_url('room/'.$room_data['room_slug']) . '/'.$numpage; if (isset($_GET['category'])) { echo '?category='.$_GET['category']; } ?>"><?= $numpage; ?></a></li>
                <?php } $xx++; } ?>
                <?php if($page<($jumlah_halaman-2)){ ?>
                <li class="page-item"><a class="page-link" href="<?= base_url('room/'.$room_data['room_slug']) . '/'.($page+1); if (isset($_GET['category'])) { echo '?category='.$_GET['category']; } ?>"><span aria-hidden="true">&raquo;</span></a></li>
                <?php } ?>
            </ul>
            <div class="text-center fs-6">Page <?= $page; ?> of <?= $jumlah_halaman; ?></div>
        </nav>
        <?php } ?>
    <div class="row mb-3 text-start">
        <?php if ($products) {
            foreach ($products as $key => $product) { ?>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3">
                    <a class="text-decoration-none " href="<?= base_url("our-collections/") . $product['product_slug']; ?>">
                        <img class="img-fluid mb-2 rounded border" style="width: 100% !important; height: 90% !important; max-width:450px !important; height:350px !important; object-fit:cover !important;" src="<?= 'https://9v6e9irhcc.r.worldssl.net/assets/products/thumbnail/' . $product['product_thumbnail']; ?>" alt="">
                        <h4 class="text-secondary"><?= $product['product_name']; ?></h4>
                    </a>
                </div>
            <?php }
        } else { ?>
            <div class="text-center bg-secondary p-3"> <span class="text-white">Oops! No collection item to display</span></div>
        <?php } ?>
    </div>

    <?php 
        if($jumlah_total_produk){ 
            $xx=0;
            $max=4;
        ?>
        <nav class="" aria-label="Page navigation">
            <ul class="pagination pagination-md justify-content-center">
                <?php if($page>2){ ?>
                <li class="page-item"><a class="page-link" href="<?= base_url('room/'.$room_data['room_slug']) . '/'.($page-1); if (isset($_GET['category'])) { echo '?category='.$_GET['category']; } ?>"><span aria-hidden="true">&laquo;</span></a></li>
                <?php } ?>
                <?php while($xx < $jumlah_halaman){
                    $numpage = $xx+1; 
                    if($numpage > ($page-2) && $numpage < ($page+3)){?>
                <li class="page-item <?php if($page && $numpage == $page){ echo ' active'; } ?>"><a class="page-link" href="<?= base_url('room/'.$room_data['room_slug']) . '/'.$numpage; if (isset($_GET['category'])) { echo '?category='.$_GET['category']; } ?>"><?= $numpage; ?></a></li>
                <?php } $xx++; } ?>
                <?php if($page<($jumlah_halaman-2)){ ?>
                <li class="page-item"><a class="page-link" href="<?= base_url('room/'.$room_data['room_slug']) . '/'.($page+1); if (isset($_GET['category'])) { echo '?category='.$_GET['category']; } ?>"><span aria-hidden="true">&raquo;</span></a></li>
                <?php } ?>
            </ul>
            <div class="text-center fs-6">Page <?= $page; ?> of <?= $jumlah_halaman; ?></div>
        </nav>
        <?php } ?>

</div>


<!-- Collections By Room -->
<?php if ($all_rooms) { ?>
    <div class="container p-4">
        <h2>See Other Rooms</h2>
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
<!-- Collections By Room -->

<!-- Collections By Category -->
<?php if ($all_cats) { ?>
    <div class="container p-4">
        <h2>Product By Types</h2>
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
<!-- Collections By Category -->

<!-- Collections By Brands -->
<?php if ($all_cats) { ?>
    <div class="container p-4">
        <h2>Product By Brands</h2>
        <section id="splide-brand" class="splide" aria-label="Splide Basic HTML Example">
            <div class="splide__track">
                <ul class="splide__list">
                    <?php foreach ($all_brands as $key => $brand) { ?>
                        <li class="splide__slide p-2"><a href="<?= base_url() . $brand['brand_slug']; ?>">
                                <div class="rounded-lg rounded" style="max-width:500px; background:#4C4C4C"><img class="img-fluid" src="<?= 'https://9v6e9irhcc.r.worldssl.net/assets/brands/' . $brand['brand_img']; ?>" alt="$brand['brand_name']"></div>
                            </a></li>
                    <?php } ?>
                </ul>
            </div>
        </section>
    </div>
<?php } ?>
<!-- Collections By Brands -->


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