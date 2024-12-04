<div class="text-center d-flex justify-content-center" style="min-height:350px;height:20vw;overflow:hidden; background:black">
    <img src="<?= $GLOBALS['domain_static'] . '/assets/brands/' . $brand_data['brand_bg']; ?>" alt="" style="position:relative;width:100%;object-fit:cover !important;opacity:0.3">
    <div class="align-self-center" style="position:absolute; z-index:9;">
        <div class="mx-auto text-white p-2 py-5">
            <div class="mb-4">
                <h1><?= $brand_data['brand_name']; ?> Collections</h1>
            </div>
        </div>
    </div>
</div>
<!-- Brand Collections -->
<div id="brand-collections" class="container p-4 pb-1 text-start mb-4">
    <img class="img-fluid mt-4 mb-4" width="100%" src="<?= $GLOBALS['domain_static'] . '/assets/brands/' . $brand_data['brand_bg']; ?>" alt="<?= $brand_data['brand_name']; ?> Collections">
    <h2><?= $brand_data['brand_name']; ?></h2>
    <p class="mt-3 mb-3" id="brand-desc"><?= $brand_data['brand_desc']; ?></p>
    <hr id="cat-tab" style="">
    <div class="mt-5 mb-5">
        <ul class="nav nav-underline justify-content-center">
            <li class="nav-item text-secondary" style="display: inline-block;">
                <a class="nav-link <?php if (!$_GET['category']) {
                                        echo 'active';
                                    } ?>" aria-current="page" href="<?= base_url('' . $brand_data['brand_slug']); ?>#cat-tab">All</a>
            </li>
            <?php foreach ($all_brand_cats as $key => $brand_cat) { ?>
                <li class="nav-item" style="display: inline-block;float:none;">
                    <a class="nav-link <?php if ($_GET['category'] && $_GET['category'] == $brand_cat['cat_slug']) {
                                            echo 'active';
                                        } ?>" href="<?= base_url($brand_data['brand_slug']) . '?category=' . $brand_cat['cat_slug']; ?>#cat-tab"><?= $brand_cat['cat_name'] ?></a>
                </li>
            <?php } ?>
        </ul>
    </div>

    <div class="row mb-4 text-center">
        <?php if ($products) {
            foreach ($products as $key => $product) { ?>
                <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3 mb-4">
                    <a class="text-decoration-none " href="<?= base_url("our-collections/") . $product['product_slug'].$code; ?>">
                        <img class="img-fluid mb-2 border topacity" style="width:300px !important; height:200px !important; object-fit:cover !important;" src="<?= $GLOBALS['domain_static'] . '/assets/products/thumbnail/' . $product['product_thumbnail']; ?>" alt="" width="300" height="200">
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
                        <li class="page-item"><a class="page-link" href="<?= base_url($brand_data['brand_slug']) . '/' . ($page - 1);
                                                                            if (isset($_GET['category'])) {
                                                                                echo '?category=' . $_GET['category'];
                                                                            } ?>#cat-tab"><span aria-hidden="true">&laquo;</span></a></li>
                    <?php } ?>
                    <?php while ($xx < $jumlah_halaman) {
                        $numpage = $xx + 1;
                        if ($numpage > ($page - 2) && $numpage < ($page + 3)) { ?>
                            <li class="page-item <?php if ($page && $numpage == $page) {
                                                        echo ' active';
                                                    } ?>"><a class="page-link" href="<?= base_url($brand_data['brand_slug']) . '/' . $numpage;
                                                                                        if (isset($_GET['category'])) {
                                                                                            echo '?category=' . $_GET['category'];
                                                                                        } ?>#cat-tab"><?= $numpage; ?></a></li>
                    <?php }
                        $xx++;
                    } ?>
                    <?php if ($page < ($jumlah_halaman - 2)) { ?>
                        <li class="page-item"><a class="page-link" href="<?= base_url($brand_data['brand_slug']) . '/' . ($page + 1);
                                                                            if (isset($_GET['category'])) {
                                                                                echo '?category=' . $_GET['category'];
                                                                            } ?>#cat-tab"><span aria-hidden="true">&raquo;</span></a></li>
                    <?php } ?>
                </ul>
                <div class="text-center fs-6">Page <?= $page; ?> of <?= $jumlah_halaman; ?></div>
            </nav>
        <?php } ?>
    </div>
    <?php if ($catalogs) { ?>
        <hr>
        <h2>Catalogs</h2>
        <div class="mt-3 row">
            <?php foreach ($catalogs as $catalog) { ?>
                <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2 mb-3 d-flex position-relative">
                    <div>
                        <img class="img-fluid border mb-2" src="<?= $GLOBALS['domain_static'] . '/assets/catalogs/covers/' . $catalog['catalog_cover']; ?>" alt="">
                        <h4><?= $catalog['catalog_name']; ?></h4>
                        <a class="stretched-link" target="_blank" href="<?= $GLOBALS['domain_static'] . '/assets/catalogs/pdfs/' . $catalog['catalog_files']; ?>"></a>
                    </div>
                </div>
            <?php } ?>
        </div>
    <?php } ?>
</div>

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