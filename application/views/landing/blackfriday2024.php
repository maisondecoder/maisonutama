<!-- Brand Collections -->
<div id="brand-collections" class="container p-4 pb-1 text-start mb-4" style="margin-top:50px">
    <div class="d-flex justify-content-center">
        <img class="img-fluid mt-4 mb-2" width="1024" src="<?= $GLOBALS['domain_static']; ?>/assets/landing/blackfriday2024/banner.webp" alt="<?= $brand_data['brand_name']; ?> Collections">
    </div>
    <hr>
    <div class="row mt-4 text-center">
        <?php if ($promo_products) {
            foreach ($promo_products as $key => $product) { ?>
                <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3 mb-2">
                    <a class="text-decoration-none" href="<?= base_url("our-collections/") . $product['product_slug'] . '?via=blackfriday2024'; ?>">
                        <img class="img-fluid mb-2 border topacity item-from-banner" style="width:300px !important; height:200px !important; object-fit:cover !important;" src="<?= $GLOBALS['domain_static'] . '/assets/products/thumbnail/' . $product['product_thumbnail']; ?>" alt="" width="300" height="200">
                        <h4 class="text-secondary"><?= $product['product_name']; ?></h4>
                    </a>
                </div>
            <?php }
        } else { ?>
            <div class="text-center bg-secondary p-3"> <span class="text-white">Oops! No collection item to display</span></div>
        <?php } ?>
    </div>
    <hr>
    <h3>Syarat & Ketentuan Promo:</h3>
    <ol>
        <li>Berlaku hingga akhir bulan November atau selama persediaan masih ada.</li>
        <li>Dapatkan disc at least 20% untuk setiap pembelian Sofa yang termasuk dalam promo ini.</li>
        <li>Setiap pembelian Sofa dalam promo ini juga berhak mendapatkan pilihan bonus berupa Coffee table atau carpet (tergantung persediaan)</li>
        <li>Barang yang dibeli dalam promo ini tidak dapat ditukar atau di kembalikan, kecuali terdapat kerusakan atau cacat produksi.</li>
        <li>Untuk informasi lebih lanjut, pelanggan dapat menghubungi nomor kami di 0817700025 atau mengunjungi website kami Maisonliving.id</li>
    </ol>
</div>