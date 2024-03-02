<!-- About Maison Living -->
<div id="intro-about" class="container p-4 pb-1 mb-4">
    <h2 class="mb-4 fw-bold text-center">About Maison Living</h2>
    <hr>
    <p class="fs-3">Our journey started in 1982 from a traditional furniture store Cipta Bangun Jaya (CBJ Furniture Group) serving locally made furniture. With passion, persistence and discerning vision, we continually evolve to a luxurious contemporary furniture store that serves international high-end furniture and lifestyle products.</p>
</div>

<!-- Why Maison Living -->
<div id="intro-why" class="container p-4 pb-1 mb-4">
    <h2 class="mb-4 fw-bold text-center">Why Maison Living?</h2>
    <hr>
    <p>Maison's Unwavering Commitment to Quality and Service for Over 30 Years.</p>
    <p>At Maison, we don't just see furniture as a product; it's a masterpiece. No detail is too small to overlook. We uphold an unwavering commitment to delivering top-notch quality and exceptional service. Our team of specialists is dedicated to turning your dream home into a reality.</p>
    <p>With a legacy spanning over 30 years, Maison has partnered with world-class international brands such as Papadatos, Franco Ferri, Babakagu, Acomodel, Aromas, and our very own line, Maison Living. Each brand embodies its unique character, blending beauty, opulence, luxury, and comfort, all while remaining affordable. Choose excellence for your home with Maison.</p>
</div>

<!-- Our Stores -->
<?php if ($all_stores) { ?>
    <div class="container my-4 p-4 d-none d-md-block">
        <h2 class="text-center mb-4">Our Stores</h2>
        <div class="mt-5">
            <?php foreach ($all_stores as $key => $store) { ?>
                <div class="row mb-3">
                    <div class="col-sm-12 col-md-6 text-center">
                        <img class="img-fluid mb-2" src="<?= $GLOBALS['domain_static'] . '/assets/stores/' . $store['store_img']; ?>?text=<?= $store['store_default_text']; ?>" style="max-height:300px" alt="<?= $store['store_name']; ?>">
                    </div>
                    <div class="col-sm-12 col-md-6 my-3 my-sm-0">
                        <h3><?= $store['store_name']; ?></h3>
                        <p>
                            <?= $store['store_addrs']; ?><br>
                        </p>
                        <div>
                            <a target="_blank" class="btn btn-dark btn-lg" href="https://wa.me/<?= $store['store_wa']; ?>?text=<?= $store['store_default_text']; ?>"><i class="fa-brands fa-whatsapp"></i> Whatsapp</a>
                            <a target="_blank" class="btn btn-dark btn-lg" href="<?= $store['store_gmap']; ?>"><i class="fa-regular fa-map"></i> Google Map</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
<?php } ?>
<!-- Our Stores -->

<!-- Our Stores -->
<?php if ($all_stores) { ?>
    <div class="container my-4 p-4 d-block d-md-none">
        <h2 class="text-center mb-4">Our Stores</h2>
        <section class="slide-store splide" aria-label="Our Stores">
            <div class="splide__track">
                <ul class="splide__list">
                    <?php foreach ($all_stores as $key => $store) { ?>
                        <li class="splide__slide p-2">
                            <div class="rounded-lg rounded topacity" style="max-width:400px; background:#4C4C4C"><img class="img-fluid mb-2" src="<?= $GLOBALS['domain_static'] . '/assets/stores/' . $store['store_img']; ?>" style="max-height:300px" alt="<?= $store['store_name']; ?>"></div>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </section>
        <div class="mt-3">
            <?php foreach ($all_stores as $key => $store) { ?>
                <div class="row mb-3">
                    <div class="col-sm-12 col-md-12 my-sm-0">
                        <div class="text-center">
                            <h4><?= $store['store_name']; ?></h4>
                            <a target="_blank" class="btn btn-dark" href="https://wa.me/<?= $store['store_wa']; ?>?text=<?= $store['store_default_text']; ?>"><i class="fa-brands fa-whatsapp"></i> Whatsapp</a>
                            <a target="_blank" class="btn btn-dark" href="<?= $store['store_gmap']; ?>"><i class="fa-regular fa-map"></i> Google Maps</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
<?php } ?>
<!-- Our Stores -->

<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
<script>
    new Splide('.slide-store', {
        type: 'loop',
        perPage: 1,
        perMove: 1,
        padding: '2rem',
        autoplay: true,
        pagination: true
    }).mount();
</script>