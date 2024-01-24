<!-- Hero CTA -->
<div class="py-2 transisi-search" style="margin-top:-15px">
    <div class="d-none d-md-block" style="margin-top:5rem"></div>
    <div class="px-3 mb-3 mt-3">
        <input type="text" class="form-control form-control-lg fs-2" id="searchbar" aria-describedby="searchBar" placeholder="🔎 Type here to search..." style="max-width:800px; margin:auto">
    </div>
    <div class="d-none d-md-block" style="margin-bottom:5rem"></div>
</div>
<div class="bg-white border-top" style="">
    <div class="container p-4">
        <h3 class="mb-4 fw-bold">Browse By Category</h3>
        <?php if ($all_rooms) { ?>
            <div class="my-3">
                <h5>Location :</h5>
                <?php foreach ($all_rooms as $key => $room) { ?>
                    <a href="<?= base_url('room/') . $room['room_slug'] . '?via=search-suggestion'; ?>" class="btn btn-light border m-1"><?= $room['room_name']; ?></a>
                <?php } ?>
            </div>
        <?php } ?>
        <?php if ($all_brands) { ?>
            <div class="my-3">
                <h5>Brand :</h5>
                <?php foreach ($all_brands as $key => $brand) { ?>
                    <a href="<?= base_url() . $brand['brand_slug'] . '?via=search-suggestion'; ?>" class="btn btn-light border m-1"><?= $brand['brand_name'] ?></a>
                <?php } ?>
            </div>
        <?php } ?>
        <?php if ($all_cats) { ?>
            <div class="my-3">
                <h5>Category :</h5>
                <?php foreach ($all_cats as $key => $cat) { ?>
                    <a href="<?= base_url('category/') . $cat['cat_slug'] . '?via=search-suggestion'; ?>" class="btn btn-light border m-1"><?= $cat['cat_name'] ?></a>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
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

<script>
    $(document).load(function() {
        $("#searchbar").trigger("focus");
    });
</script>