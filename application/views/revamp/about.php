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
    <p>“There is more in furniture design” Maison believes furniture is more than just a product, it’s an ‘Art’; we take products seriously as no issue is too small for us to refute. We do not compromise exquisite quality and we vouch to deliver an exceptional service, offering design solution from our specialist to help you realize your dream home.</p>
    <p>With more than 30 years of experience, Maison has been working with an amazing world-class International Brands, committed to deliver nothing but the best refined products for your home. Our remarkable brand includes Papadatos, Babakagu, Acomodel, Aromas, and some of our own line Maison Living – in house ‘export quality’ products. Each brand distinguished their very own unique characters that projects beauty, richness, luxury & comfort, yet still offer a sensible price; an excellence choice to complete your home.</p>
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
                        <img class="img-fluid mb-2" src="<?= base_url('assets/') . $store['store_img']; ?> ?>" style="max-height:300px" alt="<?= $store['store_name']; ?>">
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