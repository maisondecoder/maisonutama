<div class="container">
    <h1 class="mb-4">Product List</h1>
    <div class="card border p-2">
        <div class="table-responsive">
            <table id="list" class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
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
                            <td class="fw-bold"><?= $key+1; ?></td>
                            <td width="50" scope="row"><?= $product['product_id']; ?></td>
                            <td width="150">
                                <figure><img src="<?= base_url() . '/assets/products/thumbnail/' . $product['product_thumbnail']; ?>" alt="<?= $product['product_name']; ?> Thumbnail" width="100" style="background:#4C4C4C"></figure>
                            </td>
                            <td><?= $product['product_name']; ?></td>
                            <td><?= $product['brand_name']; ?></td>
                            <td><?= $product['cat_name']; ?></td>
                            <td><?= $product['room_name']; ?></td>
                            <td><?php if ($product['product_status']) {
                                    echo '<span class="badge text-bg-success">ON</span>';
                                } else {
                                    echo '<span class="badge text-bg-danger">OFF</span>';
                                } ?></td>
                            <td class="text-end">
                                <a href="#edit" class="btn btn-outline-primary" title="Edit"><i class="fas fa-edit"></i></a> <a href="<?= base_url('our-collections/') . $product['product_slug'] . '?via=preview'; ?>" target="_blank" class="btn btn-outline-success" title="Preview"><i class="fa-solid fa-eye"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Content here -->
</div>