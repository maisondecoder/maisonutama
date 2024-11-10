<div style="margin-bottom:100px"></div>
<div class="col-12 text-center mb-2"><img class="img-fluid" src="<?= base_url('assets/about2.webp'); ?>" alt="" style="filter: grayscale(100%);"></div>

<!-- About Maison Living -->
<div id="intro-about" class="container p-4 pb-1 mb-2">
    <h2 class="mb-4 fw-bold text-center">About Maison Living</h2>
    <hr>
    <div class="row">
        <div class="col-12" style="max-width:100%">
            <p>Our journey started in 1982 from a traditional furniture store, CBJ Furniture Group, serving locally made furniture. With passion, persistence and discerning vision, we continued to evolve into a luxurious contemporary furniture store that serves international high-end furniture and lifestyle products. </p>
            <p>With a legacy spanning over 30 years, Maison has partnered with world-class international brands such as Papadatos, Franco Ferri, Babakagu, Acomodel, Aromas, and our very own line, Maison Living. Each brand embodies its unique character, blending beauty, opulence, luxury, and comfort, all while remaining affordable. Choose excellence for your home with Maison.</p>
        </div>
    </div>
</div>

<!-- Why Maison Living -->
<div id="intro-why" class="container p-4 pb-1 mb-2">
    <h2 class="mb-4 fw-bold text-center">Why Maison Living?</h2>
    <hr>
    <p>Maison’s unwavering commitment to quality and service for over 30 years has enabled us to cultivate long-lasting relationships with our clientele and earn their trust to help create their dream home.</p>
    <p>At Maison, we don't just see furniture as a product; it's a masterpiece. No detail is too small to overlook. We uphold an unwavering commitment in delivering top-notch quality and exceptional service, and meeting your home interior needs and style. Our team of specialists are dedicated to help turn your dream home into a reality.</p>
</div>

<div id="vision-mission" class="container p-4 pb-1 mb-2">
    <div class="row mb-2">
        <!-- Our Vision -->
        <div class="col-12 col-sm-6">
            <div id="intro-our-mission">
                <h2 class="mb-4 fw-bold text-center">Our Vision</h2>
                <hr>
                <p>Our vision is to be the leading one-stop solution for luxury home interiors by providing personalized furniture and design solutions that cater to each customer’s unique style and needs. We focus on every details to ensure a seamless and exceptional shopping experience of our customers.</p>
            </div>
        </div>
        <!-- Our Mission -->
        <div class="col-12 col-sm-6">
            <div id="intro-our-mission">
                <h2 class="mb-4 fw-bold text-center">Our Mission</h2>
                <hr>
                <p class="text-justify">To deliver luxury and comfort to our customers by transforming homes with elegance and personal touch, while maintaining uncompromising quality and exceptional service to every detail.</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <img class="img-fluid" src="<?= base_url('assets/about6.webp'); ?>" alt="">
        </div>
        <div class="col-4">
            <img class="img-fluid" src="<?= base_url('assets/about4.webp'); ?>" alt="">
        </div>
        <div class="col-4">
            <img class="img-fluid" src="<?= base_url('assets/about7.webp'); ?>" alt="">
        </div>
    </div>
</div>

<!-- Store -->
<?php if ($all_stores) { ?>
    <div class="text-light mt-5" style="width:100%; min-height:600px; max-height:50vw;background-blend-mode: darken; background:rgba(0, 0, 0, .7);background-size:cover; background-position:center bottom; background-image:url('<?= $GLOBALS['domain_static'] . '/assets/home-store-cover.jpg'; ?>');">
        <div class="container p-4">
            <h2 class="my-5 fs-1 text-center text-md-start">Our Stores</h2>
            <div class="row d-flex flex-row justify-content-center">
                <?php foreach ($all_stores as $key => $store) { ?>
                    <div class="row mb-5">
                        <div class="col-sm-12 col-md-6 my-3 my-sm-0">
                            <h3><?= $store['store_name']; ?></h3>
                            <p class="fs-6">
                                <?= $store['store_addrs']; ?><br>
                            </p>
                            <div>
                                <a target="_blank" class="btn btn-outline-light" href="https://wa.me/<?= $store['store_wa']; ?>?text=<?= $store['store_default_text']; ?>"><i class="fa-brands fa-whatsapp"></i> Whatsapp</a>
                                <a target="_blank" class="btn btn-outline-light" href="<?= $store['store_gmap']; ?>"><i class="fa-regular fa-map"></i> Google Map</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>
<!-- Store -->