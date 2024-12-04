<!doctype html>
<html lang="en">

<head>

    <!-- SEO Meta Tag -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title_page; ?></title>
    <meta name="robots" content="index, follow">
    <link href="https://fastly.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fastly.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
    <link rel="stylesheet" href="<?= $GLOBALS['domain_static'] . '/assets/ribbon.css';?>">
    <link rel="icon" href="<?= $GLOBALS['domain_static'] . '/assets/icon/maison-favicon-32x32.jpg'; ?>" sizes="32x32" />
    <link rel="icon" href="<?= $GLOBALS['domain_static'] . '/assets/icon/maison-favicon-192x192.jpg'; ?>" sizes="192x192" />
    <link rel="apple-touch-icon" href="<?= $GLOBALS['domain_static'] . '/assets/icon/maison-favicon-180x180.jpg'; ?>" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js" integrity="sha512-jGsMH83oKe9asCpkOVkBnUrDDTp8wl+adkB2D+//JtlxO4SrLoJdhbOysIFQJloQFD+C4Fl1rMsQZF76JjV0eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.3/jquery-ui.min.js" integrity="sha512-Ww1y9OuQ2kehgVWSD/3nhgfrb424O3802QYP/A5gPXoM4+rRjiKrjHdGxQKrMGQykmsJ/86oGdHszfcVgUr4hA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="<?= $GLOBALS['domain_static'] . '/assets/js/snow.js';?>"></script>
    <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-KXHBRSV9');</script>
<!-- End Google Tag Manager -->
    <script src="<?= $GLOBALS['domain_static'] . '/assets/js/jquery.visible.min.js'; ?>"></script>
    <link rel="stylesheet" href="<?= $GLOBALS['domain_static'] . '/assets/loading.css'; ?>">
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-TELBVRXJ1G');
    </script>

    <style>
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: "Playfair Display", serif;
            font-optical-sizing: auto;
            font-style: normal;
        }

        p {
            font-family: 'Karla', sans-serif;
            font-size: 12pt;
        }

        ul.nav {
            white-space: nowrap;
            overflow-x: auto;
        }

        ul.nav li {
            display: inline-block;
            float: none;
        }

        .nav-link {
            color: gray;
            font-weight: 600;
        }

        .nav-link:hover {
            color: white;
        }

        .page-link {
            color: lightgrey;
        }

        .active>.page-link,
        .page-link.active {
            background: black
        }

        .btn {
            border-radius: 0px;
        }

        .topacity {
            opacity: 0.85;
            /* Aturan opacity awal */
            transform: scale(1, 1);
            transition: opacity 0.3s ease-in-out;
            transition: transform 0.3s ease-in-out;
            /* Animasi transisi */
        }

        .topacity:hover {
            opacity: 1.0;
            transform: scale(1.03, 1.03);
        }

        .bg-searchbar {
            background: #212529;
            /*background: linear-gradient(180deg, #212529 5%, rgba(255, 255, 255, 1) 100%);*/
        }

        .nunjuk {
            position: relative;
            animation: nunjuk 2s linear infinite;
            top: -10px;
        }

        @keyframes nunjuk {
            0% {
                top: 0px;
            }

            50% {
                top: -10px;
            }

            100% {
                top: 0px;
            }
        }

        .transisi-search {
            background: #212529;
            animation: transisi 1s forwards;
        }

        @keyframes transisi {
            0% {
                background: #212529;
            }

            100% {
                background: #fff;
            }
        }

        .shaked {
            animation: shake 2s;
            animation-iteration-count: infinite;
        }

        #loadoverlay-icon {
            animation: blink 1s;
            animation-iteration-count: infinite;
        }

        @keyframes shake {
            0% {
                transform: translate(0px, 0px) rotate(0deg);
            }

            5% {
                transform: translate(-1px, 0px) rotate(-1deg);
            }

            10% {
                transform: translate(0px, -1px) rotate(1deg);
            }

            15% {
                transform: translate(0px, 0px) rotate(0deg);
            }

            100% {
                transform: translate(0px, 0px) rotate(0deg);
            }
        }

        @keyframes blink {
            0% {
                opacity: 1;
            }

            50% {
                opacity: 0.3;
            }

            100% {
                opacity: 1;
            }
        }
    </style>

    <?php
    if ($this->session->has_userdata('code')) {
        if ($this->session->userdata('code')=='pkj') {
    ?>
            <!-- Meta Pixel Code -->
            <script>
                ! function(f, b, e, v, n, t, s) {
                    if (f.fbq) return;
                    n = f.fbq = function() {
                        n.callMethod ?
                            n.callMethod.apply(n, arguments) : n.queue.push(arguments)
                    };
                    if (!f._fbq) f._fbq = n;
                    n.push = n;
                    n.loaded = !0;
                    n.version = '2.0';
                    n.queue = [];
                    t = b.createElement(e);
                    t.async = !0;
                    t.src = v;
                    s = b.getElementsByTagName(e)[0];
                    s.parentNode.insertBefore(t, s)
                }(window, document, 'script',
                    'https://connect.facebook.net/en_US/fbevents.js');
                fbq('init', '3518214025150823');
                fbq('track', 'PageView');
            </script>
            <noscript><img height="1" width="1" style="display:none"
                    src="https://www.facebook.com/tr?id=3518214025150823&ev=PageView&noscript=1" /></noscript>
            <!-- End Meta Pixel Code -->
        <?php
        }
    } else {
        ?>
        <!--- PIXEL HIPROS ADA 3 TRACKER -->
        <!-- Meta Pixel Code -->
        <script>
            ! function(f, b, e, v, n, t, s) {
                if (f.fbq) return;
                n = f.fbq = function() {
                    n.callMethod ?
                        n.callMethod.apply(n, arguments) : n.queue.push(arguments)
                };
                if (!f._fbq) f._fbq = n;
                n.push = n;
                n.loaded = !0;
                n.version = '2.0';
                n.queue = [];
                t = b.createElement(e);
                t.async = !0;
                t.src = v;
                s = b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t, s)
            }(window, document, 'script',
                'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '706886934863414');
            fbq('track', 'PageView');
        </script>
        <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=706886934863414&ev=PageView&noscript=1" /></noscript>
        <!-- End Meta Pixel Code -->
        <!-- Meta Pixel Code -->
        <script>
            ! function(f, b, e, v, n, t, s) {
                if (f.fbq) return;
                n = f.fbq = function() {
                    n.callMethod ?
                        n.callMethod.apply(n, arguments) : n.queue.push(arguments)
                };
                if (!f._fbq) f._fbq = n;
                n.push = n;
                n.loaded = !0;
                n.version = '2.0';
                n.queue = [];
                t = b.createElement(e);
                t.async = !0;
                t.src = v;
                s = b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t, s)
            }(window, document, 'script',
                'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '497224866247689');
            fbq('track', 'PageView');
        </script>
        <noscript><img height="1" width="1" style="display:none"
                src="https://www.facebook.com/tr?id=497224866247689&ev=PageView&noscript=1" /></noscript>
        <!-- End Meta Pixel Code -->
        <!-- Meta Pixel Code -->
        <script>
            ! function(f, b, e, v, n, t, s) {
                if (f.fbq) return;
                n = f.fbq = function() {
                    n.callMethod ?
                        n.callMethod.apply(n, arguments) : n.queue.push(arguments)
                };
                if (!f._fbq) f._fbq = n;
                n.push = n;
                n.loaded = !0;
                n.version = '2.0';
                n.queue = [];
                t = b.createElement(e);
                t.async = !0;
                t.src = v;
                s = b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t, s)
            }(window, document, 'script',
                'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '874217241092160');
            fbq('track', 'PageView');
        </script>
        <noscript><img height="1" width="1" style="display:none"
                src="https://www.facebook.com/tr?id=874217241092160&ev=PageView&noscript=1" /></noscript>
        <!-- End Meta Pixel Code -->
        <!--- PIXEL HIPROS ADA 3 TRACKER -->
    <?php
    }
    ?>

<script type="text/javascript" src="https://gass.maisonliving.id/js/pklzoakjbv1733317963816.js"></script>
<script>
  gass.run({subdomain:'gass.maisonliving.id', pkey:'8C24EFB7E436B199E0A319FA9941EEAB', interval:2, connector:["2CE5B915F633F2E930AD78558E0EBF2E"], cta_hidden:1}, function(data){});
</script>
</head>


<body>
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KXHBRSV9"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    <div id="loadoverlay" class="d-flex justify-content-center" style="height:100%;width:100%;background:rgba(255,255,255,0.8);position:fixed;z-index:999999999!important;top:0;">
        <img id="loadoverlay-icon" class="align-self-center" width="140px" height="140px" src="<?= $GLOBALS['domain_static'] . '/assets/icon/icon-loading-trans.webp'; ?>" alt="">
    </div>
    <nav id="navbar" class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid py-2">
            <a class="navbar-brand ms-5" href="<?= base_url(); ?>">
                <img src="<?= $GLOBALS['domain_static'] . '/assets/logo-maison-navbar-putih.webp'; ?>" alt="Maison Living" height="40">
            </a>
            <button id="navToggler" class="navbar-toggler me-5" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse mx-auto" id="navbarText">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 gap-1 gap-lg-5 me-5 navbar-nav-scroll">
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($nav == 'home') ? 'active' : ''; ?>" aria-current="page" href="<?= base_url(); ?>">Homepage</a>
                    </li>
                    <?php if ($all_brands) { ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle <?php echo ($nav == 'brand') ? 'active' : ''; ?>" href="<?= base_url('furniture-brand'); ?>" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Brands
                            </a>
                            <ul class="dropdown-menu">
                                <?php foreach ($all_brands as $key => $brand) { ?>
                                    <li><a class="dropdown-item" href="<?= base_url() . $brand['brand_slug']; ?>"><?= $brand['brand_name']; ?></a></li>
                                <?php } ?>
                            </ul>
                        </li>
                    <?php } ?>
                    <?php if ($all_cats) { ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle <?php echo ($nav == 'collection') ? 'active' : ''; ?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Categories
                            </a>
                            <ul class="dropdown-menu">
                                <?php foreach ($all_cats as $key => $cat) { ?>
                                    <li><a class="dropdown-item" href="<?= base_url("category/") . $cat['cat_slug']; ?>"><?= $cat['cat_name']; ?></a></li>
                                <?php } ?>
                            </ul>
                        </li>
                    <?php } ?>
                    <!--
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($nav == 'collection') ? 'active' : ''; ?>" href="<?= base_url('collections'); ?>">Our Collections</a>
                    </li>-->
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($nav == 'about') ? 'active' : ''; ?>" href="<?= base_url('about-us-maison-living'); ?>">About Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>