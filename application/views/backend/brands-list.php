<div class="container" style="max-width:1024px">
    <h1 class="">Brands</h1>
    <div class="card border p-2">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Logo</th>
                        <th scope="col">Name</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Status</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($brands as $key => $brand) { ?>
                        <tr>
                            <td width="50" scope="row" class="fw-bold"><?= $brand['brand_id']; ?></td>
                            <td width="150">
                                <figure><img src="<?= base_url() . '/assets/brands/' . $brand['brand_img']; ?>" alt="<?= $brand['brand_name']; ?> Logo Image" width="100" style="background:#4C4C4C"></figure>
                            </td>
                            <td><?= $brand['brand_name']; ?></td>
                            <td><?= $brand['brand_slug']; ?></td>
                            <td><?php if($brand['brand_status']){echo '<span class="badge text-bg-success">ON</span>';}else{echo '<span class="badge text-bg-danger">OFF</span>';} ?></td>
                            <td class="text-end">
                                <a href="#edit" class="btn btn-outline-primary">Edit</a> <a href="#preview" class="btn btn-outline-success">Preview</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Content here -->
</div>