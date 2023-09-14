<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title_page; ?> - Maison Living</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/07c871975a.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
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
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= base_url(); ?>">
                <img src="<?= base_url('assets/logo-maison-navbar-putih.png') ?>" alt="Maison Living" height="40">
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
    <div style="margin-top:80px !important"></div>