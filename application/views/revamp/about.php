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
    <div class="container my-4 p-4">
        <h2 class="mb-4 fw-bold text-center">Our Stores</h2>
        <hr>
        <div class="mt-5">
            <?php foreach ($all_stores as $key => $store) { ?>
                <div class="row mb-3">
                    <div class="col-sm-12 col-md-6 text-center">
                        <img class="img-fluid mb-2" src="<?= $GLOBALS['domain_static'] . '/assets/' . $store['store_img']; ?>" style="max-height:300px" alt="<?= $store['store_name']; ?>">
                    </div>
                    <div class="col-sm-12 col-md-6 my-3 my-sm-0">
                        <h3><?= $store['store_name']; ?></h3>
                        <p>
                            <?= $store['store_addrs']; ?><br>
                            <strong>Whatsapp:</strong> +<?= $store['store_wa']; ?><br>
                            <strong>Phone:</strong> <?= $store['store_phone']; ?>
                        </p>
                        <div>
                            <a target="_blank" class="btn btn-dark btn-lg" href="<?= $store['store_gmap']; ?>">Open Google Map <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
<?php } ?>
<!-- Our Stores -->