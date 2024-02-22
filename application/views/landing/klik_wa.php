<!doctype html>
<html lang="en">

<head>
    <!-- SEO Meta Tag -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lux Your Home With Maison Living</title>
    <meta name="robots" content="index, follow">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
    <link rel="icon" href="<?= base_url('/assets/') . 'icon/maison-favicon-32x32.jpg'; ?>" sizes="32x32" />
    <link rel="icon" href="<?= base_url('/assets/') . 'icon/maison-favicon-192x192.jpg'; ?>" sizes="192x192" />
    <link rel="apple-touch-icon" href="<?= base_url('/assets/') . 'icon/maison-favicon-180x180.jpg'; ?>" />
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>

    <!-- Google tag (gtag.js)-->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-TELBVRXJ1G"></script>

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
            font-size: 11pt;
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
            transition: opacity 0.3s ease-in-out;
            /* Animasi transisi */
        }

        .topacity:hover {
            opacity: 1.0;
        }

        .divider {
            position: relative;
            margin-top: 20px;
            /* Adjust spacing as needed */
            margin-bottom: 20px;
        }

        .divider::before,
        .divider::after {
            content: "";
            position: absolute;
            top: 50%;
            width: 27%;
            /* Adjust width as needed */
            height: 1px;
            background-color: #ccc;
            /* Adjust color as needed */
        }

        .divider::before {
            left: 0;
        }

        .divider::after {
            right: 0;
        }

        .divider-text {
            background-color: #fff;
            /* Match your background color */
            padding: 0 10px;
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
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid p-1">
            <img class="mx-auto" src="<?= base_url('/assets/') . 'logo-maison-navbar-putih.webp'; ?>" alt="Maison Living" height="40">
        </div>
    </nav>
    <div class="mx-auto" style="max-width:800px;">
        <div id="slider" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#slider" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#slider" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#slider" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#slider" data-bs-slide-to="3" aria-label="Slide 4"></button>
                <button type="button" data-bs-target="#slider" data-bs-slide-to="4" aria-label="Slide 5"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="2000">
                    <img src="<?= base_url('/assets/landing/') . 'regina_acomodel.webp'; ?>" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src="<?= base_url('/assets/landing/') . 'upper_papadatos.webp'; ?>" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src="<?= base_url('/assets/landing/') . '9020_papadatos.webp'; ?>" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src="<?= base_url('/assets/landing/') . 'collins_babakagu.webp'; ?>" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src="<?= base_url('/assets/landing/') . 'elisa_francoferri.webp'; ?>" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="container">
            <div class="text-warning fw-bold my-2">#LuxYourHome</div>
            <div>
                <h4>Elevate Your Space with Timeless High-End Furniture</h4>
            </div>
            <div>
                <p>At Maison, we see furniture as a masterpiece. No detail is too small to overlook; a commitment to deliver a top-notch quality and exceptional service. With a legacy spanning over 30 years, Maison has partnered with world-class international brands.</p>
            </div>
        </div>

        <div style="margin-bottom:30px">
            <div class="container my-4">
                <div class="divider text-center mx-4">
                    <h5 class="">Contact Us</h5>
                </div>
                <div class="row text-center">
                    <div class="col border rounded m-1 p-3 bg-light">
                        <div class="fs-6 fw-bold">Kemang<br>Jakarta Selatan</div>
                        <div class="fs-6 text-secondary">Branch</div>
                        <a target="_blank" class="btn btn-success mt-2" href="https://wa.me/6281388180020?text=Halo%20Maison%20Living%20Kemang%2C%20Saya%20ingin%20bertanya%20tentang%20produk..."><i class="fa-brands fa-whatsapp"></i> Whatsapp</a>
                    </div>
                    <div class="col border rounded m-1 p-3 bg-light">
                        <div class="fs-6 fw-bold">BSD<br>Alam Sutera</div>
                        <div class="fs-6 text-secondary">Branch</div>
                        <a target="_blank" class="btn btn-success mt-2" href="https://wa.me/6281930002525?text=Halo%20Maison%20Living%20BSD%20Alam%20Sutera%2C%20Saya%20ingin%20bertanya%20tentang%20produk..."><i class="fa-brands fa-whatsapp"></i> Whatsapp</a>
                    </div>
                </div>
            </div>
            <div class="container my-2">
                <div class="divider text-center mx-4">
                    <h5 class="">Our Brands</h5>
                </div>
                <div class="row">
                    <div><img class="img-fluid" src="<?= base_url('/assets/landing/') . 'brands.webp'; ?>" alt=""></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-light">
        <div class="container p-4">
            <div class="row">
                <div class="col-sm-12 col-md-9">
                    <img class="mb-4" src="<?= base_url('/assets/') . 'logo-maison-navbar-putih.webp' ?>" alt="Maison Living" height="40">
                </div>
                <div class="col-sm-12 col-md-3">
                    <h4>Our Stores</h4>
                    <p class="fs-6 ">Monday-Sunday<br>
                        10 AM - 8 PM<br>
                        <em>*Open everyday including public holiday</em>
                        <br>
                    </p>
                    <p class="fs-6"><strong>Kemang Jakarta</strong><br>
                        Jl. Raya Kemang Selatan No.31<br>
                        Jakarta Selatan, 12730<br>
                    </p>
                    <p class="fs-6 mb-4"><strong>BSD Alam Sutera</strong><br>
                        Jl. Raya Serpong Km 8 No. 7<br>
                        Tangerang Selatan, 15326<br>
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/07c871975a.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>

</body>

</html>