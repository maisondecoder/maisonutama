<div style="margin-bottom:100px"></div>

<!-- Brand Collections -->
<div id="brand-collections" class="container p-4 text-center">
    <section id="player" class="splide mx-auto" aria-label="Splide Basic HTML Example">
        <div class="splide__track ">
            <ul class="splide__list">
                <?php foreach ($products as $key => $product) { ?>
                    <li class="splide__slide">
                        <div class="row border mx-auto rounded bg-white" style="max-width:800px;">
                            <div class="col border-end p-2" style="">
                                <div id="ref-framesize" class="modal-body p-0" style="max-width:960px;max-height:1440px">
                                    <?php if ($setting_video_product_source == 'youtube') { ?>
                                        <iframe id="shorts-frame" class="rounded"
                                            width="480"
                                            height="640"
                                            src="https://www.youtube.com/embed/<?= $product['product_yt_video']; ?>"
                                            data-src="https://www.youtube.com/embed/<?= $product['product_yt_video']; ?>"
                                            title="Preview Video"
                                            allow="encrypted-media;autoplay" allowfullscreen>
                                        </iframe>
                                    <?php } else if ($setting_video_product_source == 'cdn') { ?>
                                        <video
                                            id="shorts-frame"
                                            class="video-js rounded"
                                            controls
                                            preload="auto"
                                            width="480"
                                            height="640"
                                            data-setup="{}">
                                            <source src="<?= $GLOBALS['domain_static'] . '/assets/videos/' . $product['product_video']; ?>" type="video/mp4" />
                                            <p class="vjs-no-js">
                                                To view this video please enable JavaScript, and consider upgrading to a
                                                web browser that
                                                <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                                            </p>
                                        </video>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col text-start">
                                <h4 class="mt-2 mb-4">In this video:</h4>
                                <div class="">
                                    <a class="text-decoration-none " href="<?= base_url("our-collections/") . $product['product_slug']; ?>">
                                        <img class="img-fluid mb-2 border topacity shadow-sm" style="width:300px !important; height:200px !important; object-fit:cover !important;" src="<?= $GLOBALS['domain_static'] . '/assets/products/thumbnail/' . $product['product_thumbnail']; ?>" alt="" width="300" height="200">
                                        <h4 class="text-secondary fs-5"><?= $product['brand_name']; ?> <?= $product['product_name']; ?></h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>

                <?php } ?>
            </ul>
        </div>
    </section>
</div>

<link href="<?= $GLOBALS['domain_static'] . '/assets/plugins/lightbox2-2.11.5/dist/css/'; ?>lightbox.css" rel="stylesheet" />
<script src="<?= $GLOBALS['domain_static'] . '/assets/plugins/lightbox2-2.11.5/dist/js/'; ?>lightbox.js"></script>

<?php if ($products) { ?>
    <?php if ($setting_video_product_source == 'cdn') { ?>
        <!-- Video.js -->
        <link href="https://vjs.zencdn.net/8.16.1/video-js.css" rel="stylesheet" />
        <script src="https://vjs.zencdn.net/8.16.1/video.min.js"></script>
    <?php } ?>
    <script>
        $('body').css('background-color','#18191e');

        <?php if ($setting_video_product_source == 'cdn') { ?>
            var myPlayer = videojs('#shorts-frame');
            myPlayer.ready(function() {

            });
        <?php } ?>

        // --------- Fitur Video Play START --------- //
        function ResizeShorts() {
            <?php if ($setting_video_product_source == 'youtube') { ?>
                //kalo pake youtube
                $('#shorts-frame')[0].src = $('#shorts-frame').data('src');
            <?php } ?>

            var width = $('#ref-framesize').width();
            var NewHeight = (1920 / 1080) * width;

            $("#shorts-frame").width(width);
            $("#shorts-frame").height(NewHeight);

            <?php if ($setting_video_product_source == 'youtube') { ?>
                //kalo pake youtube
                $('#shorts-frame')[0].src += "?autoplay=1";
            <?php } ?>
        }

        //Tombol Close Video
        $('#close-shorts').click(function() {
            <?php if ($setting_video_product_source == 'youtube') { ?>
                //kalo pake youtube
                $('#shorts-frame')[0].src = $('#shorts-frame').data('src');
            <?php } else if ($setting_video_product_source == 'cdn') { ?>
                //kalo pake player sendiri
                myPlayer.pause();
            <?php } ?>
        });

        //Triger Play Video dari Foto Pertama
        $('#videoplay').click(function() {
            setTimeout(ResizeShorts, 350);
            <?php if ($setting_video_product_source == 'cdn') { ?>
                //kalo pake player sendiri
                myPlayer.currentTime(0);
                myPlayer.play();
            <?php } ?>
        });
        // --------- Fitur Video Play END --------- //
    </script>
<?php } ?>

<script>
    lightbox.option({
        'resizeDuration': 200,
        'wrapAround': true,
        'disableScrolling': true,
        'alwaysShowNavOnTouchDevices': true,
        'maxWidth': 2000,
        'maxHeight': 2000
    })
</script>
<script>
    $(document).ready(function() {
        if ($("#btn-contain").visible()) {
            $("#btn-consultation").removeClass('fixed-bottom me-3 mb-3');
            $("#btn-consultation").css('width', '100%');
            $("#btn-consultation").css('box-shadow', 'none');
            $("#btn-consultation").removeAttr('justify-self');
        } else {
            $("#btn-consultation").addClass('fixed-bottom btn-lg border-2 border-light me-3 mb-4');
            $("#btn-consultation").css('width', '260px');
            $("#btn-consultation").css('box-shadow', '8px 20px 25px -1px rgba(0,0,0,0.71)');
            $("#btn-consultation").css('justify-self', 'flex-end');
        }

        // We use the jQuery scroll event
        $(window).on('resize scroll', function() {
            if ($("#btn-contain").visible()) {
                $("#btn-consultation").removeClass('fixed-bottom me-3 mb-3');
                $("#btn-consultation").css('width', '100%');
                $("#btn-consultation").css('box-shadow', 'none');
                $("#btn-consultation").removeAttr('justify-self');
            } else {
                $("#btn-consultation").addClass('fixed-bottom btn-lg border-2 border-light me-3 mb-4');
                $("#btn-consultation").css('width', '260px');
                $("#btn-consultation").css('box-shadow', '8px 20px 25px -1px rgba(0,0,0,0.71)');
                $("#btn-consultation").css('justify-self', 'flex-end');
            }
        });
    });
</script>
<script src="https://fastly.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
<link rel="stylesheet" href="https://fastly.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
<?php if ($products > 0) {  ?>
    <script>
        new Splide('#player', {
            perPage: 1,
            perMove: 1,
            autoplay: false,
            pagination: false,
            width:'960px'
        }).mount();
    </script>
<?php } else { ?>
    <script>
        new Splide('#player', {
            perPage: 1,
            perMove: 1,
            autoplay: false,
            pagination: false,
            width:'960px'
        }).mount();
    </script>
<?php } ?>



<script>
    $('#more-desc').click(function() {
        $('#brand-desc').css('max-height', '100%');
        this.remove();
    });
</script>

<script>
    $('#more-desc').click(function() {
        $('#brand-desc').css('max-height', '100%');
        this.remove();
    });
</script>