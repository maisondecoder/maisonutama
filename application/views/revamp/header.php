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
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fastly.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
    <link rel="icon" href="<?= $GLOBALS['domain_static'] . '/assets/icon/maison-favicon-32x32.jpg'; ?>" sizes="32x32" />
    <link rel="icon" href="<?= $GLOBALS['domain_static'] . '/assets/icon/maison-favicon-192x192.jpg'; ?>" sizes="192x192" />
    <link rel="apple-touch-icon" href="<?= $GLOBALS['domain_static'] . '/assets/icon/maison-favicon-180x180.jpg'; ?>" />
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>

    <!-- Google tag (gtag.js)-->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-TELBVRXJ1G"></script>
    <script src="<?= $GLOBALS['domain_static'] . '/assets/js/jquery.visible.min.js';?>"></script>
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
            font-family: 'Noto Serif', sans-serif;
        }

        p {
            font-family: 'Karla', sans-serif;
            font-size: 16pt;
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
        }

        .nav-link:hover {
            color: black;
        }

        .page-link {
            color: gray;
        }

        .active>.page-link,
        .page-link.active {
            background: black
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
    </style>

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
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= base_url(); ?>">
                <img src="<?= $GLOBALS['domain_static'] . '/assets/logo-maison-navbar-putih.webp'; ?>" alt="Maison Living" height="40">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
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
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($nav == 'collection') ? 'active' : ''; ?>" href="<?= base_url('collections'); ?>">Our Collections</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($nav == 'about') ? 'active' : ''; ?>" href="<?= base_url('about-us-maison-living'); ?>">About Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div style="margin-top:65px !important"></div>