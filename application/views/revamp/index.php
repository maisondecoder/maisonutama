<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/07c871975a.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
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
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="<?= base_url('assets/logo-maison-navbar-putih.png') ?>" alt="Maison Living" height="40">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Homepage</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Brands
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Papadatos</a></li>
                            <li><a class="dropdown-item" href="#">Franco Ferri</a></li>
                            <li><a class="dropdown-item" href="#">Acomodel</a></li>
                            <li><a class="dropdown-item" href="#">Babakagu</a></li>
                            <li><a class="dropdown-item" href="#">Pulpo</a></li>
                            <li><a class="dropdown-item" href="#">Aromas</a></li>
                            <li><a class="dropdown-item" href="#">Aromas</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Collections
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Hero CTA -->
    <div id="hero" class="container p-4 pb-1" style="margin-top:80px !important">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6 text-center">
                <figure><img class="img-fluid" src="<?= base_url('assets/img-babakagu-homepage.png'); ?>" style="max-height:400px" alt=""></figure>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6 my-2 my-md-5">
                <div class="text-warning fw-bold">#LuxYourHome</div>
                <div>
                    <h1>We Make Home Feel Comfy</h1>
                </div>
                <div>
                    <p>Integrate elegance style, precise design, and high-quality materials for the ideal home investment.</p>
                </div>
                <div>
                    <a class="btn btn-dark btn-lg" href="">Our Project</a> <a class="btn btn-dark btn-lg" href="">Our Collections</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero CTA -->

    <!-- Brands Logo -->
    <div class="container text-center mt-3">
        <img class="img-fluid" src="<?= base_url('assets/logo-brands-homepage-abu2.png') ?>" width="900px" alt="Brand Partner Logo">
    </div>
    <!-- Brands Logo -->

    <!-- What We Do -->
    <div class="container my-5 p-4">
        <h2 class="text-center mb-5">What We Do</h2>
        <div class="text-center mt-5">
            <div class="row">
                <div class="col-sm-12 col-md-4">
                    <i class="fa-solid fa-gem fs-1 mb-3"></i>
                    <p>World’s high-end furniture unrevealing experience from generations.</p>
                </div>
                <div class="col-sm-12 col-md-4">
                    <i class="fa-solid fa-palette fs-1 mb-3"></i>
                    <p>Fully customized furniture
                        to enhance your living space.</p>
                </div>
                <div class="col-sm-12 col-md-4">
                    <i class="fa-solid fa-chair fs-1 mb-3"></i>
                    <p>Integrated with expert
                        interior design services.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- What We Do -->

    <!-- Brand Partners -->
    <div class="bg-dark text-light">
        <div class="container p-4">
            <h2><a href="#" class="text-decoration-none text-reset">Our Brands <i class="fa-solid fa-arrow-right-long"></i></a></h2>
            <section class="splide" aria-label="Splide Basic HTML Example">
                <div class="splide__track">
                    <ul class="splide__list">
                        <li class="splide__slide p-2"><a href="#">
                                <div class="rounded-lg rounded" style="max-width:500px; background:#4C4C4C"><img class="img-fluid" src="<?= base_url('assets/brands/brand-papadatos-white.png') ?>" alt="Papadatos"></div>
                            </a></li>
                        <li class="splide__slide p-2"><a href="#">
                                <div class="rounded-lg rounded" style="max-width:500px; background:#4C4C4C"><img class="img-fluid" src="<?= base_url('assets/brands/brand-franco-ferri-white.png') ?>" alt="Franco Ferri"></div>
                            </a></li>
                        <li class="splide__slide p-2"><a href="#">
                                <div class="rounded-lg rounded" style="max-width:500px; background:#4C4C4C"><img class="img-fluid" src="<?= base_url('assets/brands/brand-acomodel-white.png') ?>" alt="Acomodel"></div>
                            </a></li>
                        <li class="splide__slide p-2"><a href="#">
                                <div class="rounded-lg rounded" style="max-width:500px; background:#4C4C4C"><img class="img-fluid" src="<?= base_url('assets/brands/brand-babakagu-white.png') ?>" alt="Babakagu"></div>
                            </a></li>
                        <li class="splide__slide p-2"><a href="#">
                                <div class="rounded-lg rounded" style="max-width:500px; background:#4C4C4C"><img class="img-fluid" src="<?= base_url('assets/brands/brand-pulpo-white.png') ?>" alt="Pulpo"></div>
                            </a></li>
                        <li class="splide__slide p-2"><a href="#">
                                <div class="rounded-lg rounded" style="max-width:500px; background:#4C4C4C"><img class="img-fluid" src="<?= base_url('assets/brands/brand-aromas-white.png') ?>" alt="Aromas"></div>
                            </a></li>
                        <li class="splide__slide p-2"><a href="#">
                                <div class="rounded-lg rounded" style="max-width:500px; background:#4C4C4C"><img class="img-fluid" src="<?= base_url('assets/brands/brand-maison-white.png') ?>" alt="Maison"></div>
                            </a></li>
                    </ul>
                </div>
            </section>
        </div>
    </div>
    <!-- Brand Partners -->

    <!-- Our Stores -->
    <div class="container my-4 p-4">
        <h2 class="text-center mb-5">Our Stores</h2>
        <div class=" mt-5">
            <div class="row">
                <div class="col-sm-12 col-md-6 text-center">
                    <img class="img-fluid mb-2" src="<?= base_url('assets/img-store-kemang.png') ?>" style="max-height:300px" alt="Gedung Maison, Kemang Jakarta">
                </div>
                <div class="col-sm-12 col-md-6 my-3 my-sm-0">
                    <h3>Gedung Maison, Kemang Jakarta</h3>
                    <p>
                        Jl. Raya Kemang Selatan No.31, Jakarta Selatan, 12730<br>
                        <strong>Whatsapp:</strong> +62813-8818-0020<br>
                        <strong>Phone:</strong> 021-2272-0220
                    </p>
                    <div>
                        <a class="btn btn-dark btn-lg" href="#">Open Google Map</a>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-12 col-md-6 text-center">
                    <img class="img-fluid mb-2" src="<?= base_url('assets/img-store-bsd.png') ?>" style="max-height:300px" alt="Gedung Maison, BSD Alam Sutera">
                </div>
                <div class="col-sm-12 col-md-6 my-3 my-sm-0">
                    <h3>Gedung Maison, BSD Alam Sutera</h3>
                    <p>
                        Jl. Raya Serpong Km 8 No. 7, Tangerang Selatan, 15326<br>
                        <strong>Whatsapp:</strong> +62813-8818-0020<br>
                        <strong>Phone:</strong> 021-2272-0220
                    </p>
                    <a class="btn btn-dark btn-lg" href="#">Open Google Map</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Our Stores -->

    <!-- Footer -->
    <footer class="bg-dark text-light">
        <div class="container p-4">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <img class="mb-4" src="<?= base_url('assets/logo-maison-navbar-putih.png') ?>" alt="Maison Living" height="40">
                </div>
                <div class="col-sm-12 col-md-3">
                    <h4>Our Stores</h4>
                    <p class="fs-6 ">Monday-Sunday<br>
                        10 AM - 8 PM</p>
                    <p class="fs-6"><strong>Kemang Jakarta</strong><br>
                        Jl. Raya Kemang Selatan No.31<br>
                        Jakarta Selatan, 12730<br>
                        Open Google Maps
                    </p>
                    <p class="fs-6 mb-4"><strong>BSD Alam Sutera</strong><br>
                        Jl. Raya Serpong Km 8 No. 7<br>
                        Tangerang Selatan, 15326<br>
                        Open Google Maps
                    </p>
                </div>
                <div class="col-sm-12 col-md-3">
                    <h4>Contact Us</h4>
                    <p class="fs-6"><strong>Kemang Jakarta</strong><br>
                        Whatsapp : +62813-8818-0020<br>
                        Phone : 021-2272-0220
                    </p>
                    <p class="fs-6"><strong>BSD Alam Sutera</strong><br>
                        Whatsapp : +62813-8818-0020<br>
                        Phone : 021-2272-0220
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script>
        new Splide('.splide', {
            type: 'loop',
            perPage: 3,
            perMove: 1,
            padding: '2rem',
            autoplay: true,
            pagination: false,
            breakpoints: {
                480: {
                    perPage: 1,
                },
                1024: {
                    perPage: 2,
                },
            }
        }).mount();
    </script>
</body>

</html>