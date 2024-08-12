<div style="margin-bottom:100px"></div>

<!-- Brand Collections -->
<div id="brand-collections" class="container p-4 pb-1 text-center mb-4">

    <h2 class="mb-3 fw-bold"><?= $brand_data['brand_name']; ?> Collections</h2>
    <div class="mb-5">
        <ul class="nav nav-underline justify-content-center">
            <li class="nav-item text-secondary" style="display: inline-block;">
                <a class="nav-link <?php if (!$_GET['category']) {
                                        echo 'active';
                                    } ?>" aria-current="page" href="<?= base_url('' . $brand_data['brand_slug']); ?>">All</a>
            </li>
            <?php foreach ($all_brand_cats as $key => $brand_cat) { ?>
                <li class="nav-item" style="display: inline-block;float:none;">
                    <a class="nav-link <?php if ($_GET['category'] && $_GET['category'] == $brand_cat['cat_slug']) {
                                            echo 'active';
                                        } ?>" href="<?= base_url($brand_data['brand_slug']).'?category='.$brand_cat['cat_slug']; ?>"><?= $brand_cat['cat_name'] ?></a>
                </li>
            <?php } ?>
        </ul>
    </div>

    <?php 
        if($jumlah_total_produk){ 
            $xx=0;
            $max=4;
        ?>
        <nav class="mb-5" aria-label="Page navigation">
            <ul class="pagination pagination-md justify-content-center">
                <?php if($page>2){ ?>
                <li class="page-item"><a class="page-link" href="<?= base_url($brand_data['brand_slug']).'/'.($page-1); if (isset($_GET['category'])) { echo '?category='.$_GET['category']; } ?>"><span aria-hidden="true">&laquo;</span></a></li>
                <?php } ?>
                <?php while($xx < $jumlah_halaman){
                    $numpage = $xx+1; 
                    if($numpage > ($page-2) && $numpage < ($page+3)){?>
                <li class="page-item <?php if($page && $numpage == $page){ echo ' active'; } ?>"><a class="page-link" href="<?= base_url($brand_data['brand_slug']).'/'.$numpage; if (isset($_GET['category'])) { echo '?category='.$_GET['category']; } ?>"><?= $numpage; ?></a></li>
                <?php } $xx++; } ?>
                <?php if($page<($jumlah_halaman-2)){ ?>
                <li class="page-item"><a class="page-link" href="<?= base_url($brand_data['brand_slug']).'/'.($page+1); if (isset($_GET['category'])) { echo '?category='.$_GET['category']; } ?>"><span aria-hidden="true">&raquo;</span></a></li>
                <?php } ?>
            </ul>
            <div class="text-center fs-6">Page <?= $page; ?> of <?= $jumlah_halaman; ?></div>
        </nav>
        <?php } ?>

    <div class="row mb-3 text-start">
        <?php if ($products) {
            foreach ($products as $key => $product) { ?>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                    <a class="text-decoration-none " href="<?= base_url("our-collections/") . $product['product_slug'].'?via=brand-details'; ?>">
                        <img class="img-fluid mb-2 rounded border topacity" style="width: 100% !important; height: 90% !important; max-width:450px !important; height:350px !important; object-fit:cover !important;" src="<?= $GLOBALS['domain_static'].'/assets/products/thumbnail/' . $product['product_thumbnail']; ?>" alt="">
                        <h4 class="text-secondary"><?= $product['product_name']; ?></h4>
                    </a>
                </div>
            <?php }
        } else { ?>
            <div class="text-center bg-secondary p-3"> <span class="text-white">Oops! No collection item to display</span></div>
        <?php } ?>

        <?php 
        if($jumlah_total_produk){ 
            $xx=0;
            $max=4;
        ?>
        <nav class="" aria-label="Page navigation">
            <ul class="pagination pagination-md justify-content-center">
                <?php if($page>2){ ?>
                <li class="page-item"><a class="page-link" href="<?= base_url($brand_data['brand_slug']).'/'.($page-1); if (isset($_GET['category'])) { echo '?category='.$_GET['category']; } ?>"><span aria-hidden="true">&laquo;</span></a></li>
                <?php } ?>
                <?php while($xx < $jumlah_halaman){
                    $numpage = $xx+1; 
                    if($numpage > ($page-2) && $numpage < ($page+3)){?>
                <li class="page-item <?php if($page && $numpage == $page){ echo ' active'; } ?>"><a class="page-link" href="<?= base_url($brand_data['brand_slug']).'/'.$numpage; if (isset($_GET['category'])) { echo '?category='.$_GET['category']; } ?>"><?= $numpage; ?></a></li>
                <?php } $xx++; } ?>
                <?php if($page<($jumlah_halaman-2)){ ?>
                <li class="page-item"><a class="page-link" href="<?= base_url($brand_data['brand_slug']).'/'.($page+1); if (isset($_GET['category'])) { echo '?category='.$_GET['category']; } ?>"><span aria-hidden="true">&raquo;</span></a></li>
                <?php } ?>
            </ul>
            <div class="text-center fs-6">Page <?= $page; ?> of <?= $jumlah_halaman; ?></div>
        </nav>
        <?php } ?>
    </div>
</div>

<!-- Intro Brand -->
<div id="intro-brands" class="container p-4 pb-1 mb-4">
    <h2 class="mb-4 fw-bold text-center">About <?= $brand_data['brand_name']; ?></h2>


    <div class="row">
        <div class="col-12 col-sm-4 mb-3">
            <div class="rounded-lg rounded" style="max-width:500px; background:#4C4C4C"><img class="img-fluid text-end" src="<?= $GLOBALS['domain_static'].'/assets/brands/' . $brand_data['brand_img']; ?>" alt="<?= $brand_data['brand_name']; ?>"></div>
        </div>
        <div class="col-12 col-sm-8">
            <p class="mb-3" id="brand-desc" style="max-height:120px; overflow-y:hidden"><?= $brand_data['brand_desc']; ?></p>
            <span id="more-desc" class="btn btn-outline-secondary fs-5"><em>Read Full Description</em></span>
        </div>

    </div>
</div>

<!-- Other Brands -->
<div id="brand-partners" class="container p-4 pb-1 text-center mb-4">
    <h2 class="mb-4 fw-bold">Brands You Might Like</h2>
    <div class="row">
        <?php if ($all_brands) { ?>
            <?php foreach ($all_brands as $key => $brand) { ?>
                <div class="col-6 col-sm-6 col-md-4 mb-4">
                    <a href="<?= base_url() . $brand['brand_slug'].'?via=brand-details'; ?>">
                        <div class="rounded-lg rounded topacity" style="max-width:500px; background:#4C4C4C"><img class="img-fluid" src="<?= $GLOBALS['domain_static'].'/assets/brands/'. $brand['brand_img']; ?>" alt="<?= $brand['brand_name']; ?>"></div>
                    </a>
                </div>
            <?php }
        } else {
            ?>
            <p>Oops! Sorry no brands data to display</p>
        <?php } ?>
    </div>
</div>

<script>
    $('#more-desc').click(function() {
        $('#brand-desc').css('max-height', '100%');
        this.remove();
    });
</script>