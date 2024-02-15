<div class="container" style="max-width:1024px">
    <h1 class="">Products</h1>
    <div class="card border p-2">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Thumbnail</th>
                        <th scope="col">Name</th>
                        <th scope="col">Brand</th>
                        <th scope="col">Category</th>
                        <th scope="col">Room</th>
                        <th scope="col">Status</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $key => $product) { ?>
                        <tr>
                            <td width="50" scope="row" class="fw-bold"><?= $product['product_id']; ?></td>
                            <td width="150">
                                <figure><img src="<?= base_url() . '/assets/products/thumbnail/' . $product['product_thumbnail']; ?>" alt="<?= $product['product_name']; ?> Logo Image" width="100" style="background:#4C4C4C"></figure>
                            </td>
                            <td><?= $product['product_name']; ?></td>
                            <td><?= $product['brand_name']; ?></td>
                            <td><?= $product['cat_name']; ?></td>
                            <td><?= $product['room_name']; ?></td>
                            <td><?php if($product['product_status']){echo '<span class="badge text-bg-success">ON</span>';}else{echo '<span class="badge text-bg-danger">OFF</span>';} ?></td>
                            <td class="text-end">
                                <a href="#edit" class="btn btn-outline-primary">Edit</a> <a href="<?=base_url('our-collections/').$product['product_slug'].'?via=preview';?>" target="_blank" class="btn btn-outline-success">Preview</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Content here -->
</div>