<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>All Catalog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container p-4">
        <h1 class=""><?= $brand['brand_name'] ?>'s All Catalog </h1>
        <?php
        $total = 0;
        if ($all_catalog) {
            foreach ($all_catalog as $key => $catalog) {
                $e_category = explode(',', $catalog['Category']);
                $e_pthumb = explode(',', $catalog['Thumbnail']);
                $e_pname = explode(',', $catalog['Name']);
                $e_pcat = explode(',', $catalog['Category']);
                $e_proom = explode(',', $catalog['Room']);
                $e_pslug = explode(',', $catalog['Slug']);
                $e_pbrand = explode(',', $catalog['Brand']);
                $e_pstatus = explode(',', $catalog['Status']);
                $jmlh = count($e_pname);
                $total = $total + $jmlh;
        ?>
                <hr>
                <h4 class="text-center"><?= $e_category[0] . ' (' . $jmlh . ')'; ?></h4>
                <div class="table-responsive mt-4">
                    <table class="mb-4 table table-bordered table-hover align-middle text-center">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Thumbnail</th>
                                <th scope="col">Name</th>
                                <th scope="col">Category</th>
                                <th scope="col">Room</th>
                                <th scope="col">Status</th>
                                <th scope="col">Product Page</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($e_pname as $key => $product) { ?>
                                <tr>
                                    <th scope="row"><?= $key + 1; ?></th>
                                    <td><img src="<?= $GLOBALS['domain_static'] . '/assets/products/thumbnail/' . $e_pthumb[$key]; ?>" width="100px" height="100px" alt=""></td>
                                    <td><?= $e_pname[$key] ?></td>
                                    <td><?= $e_pcat[$key] ?></td>
                                    <td><?= $e_proom[$key] ?></td>
                                    <td><?php if ($e_pstatus[$key]) {
                                            echo '<span class="fw-bold text-success">ON</span>';
                                        } else {
                                            echo '<span class="fw-bold text-danger">OFF</span>';
                                        } ?></td>
                                    <td><a target="_blank" href="<?= base_url('our-collections/') . $e_pslug[$key]; ?>">Link to Product</a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            <?php } ?>
            <hr>
            <h4 class=""> Total : <?= $total; ?></h4>
        <?php } else { ?>
            <table class="mb-5 table table-bordered table-hover align-middle text-center">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Thumbnail</th>
                        <th scope="col">Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Room</th>
                        <th scope="col">Status</th>
                        <th scope="col">Product Page</th>
                    </tr>
                </thead>
                <tbody>
                    <td colspan="7"> No Product Data Available.</td>
                </tbody>
            <?php } ?>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>