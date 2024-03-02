<div class="container">
    <h1 class="mb-4">Brand List</h1>
    <div class="card border p-2">
        <div class="table-responsive">
            <table id="list" class="table">
                <thead>
                    <tr>
                        <th class="text-center" width="75" scope="col">#</th>
                        <th class="text-center" width="75" scope="col">ID</th>
                        <th class="text-start" width="100" scope="col">Logo</th>
                        <th class="text-center" width="200" scope="col">Name</th>
                        <th class="text-center" width="200" scope="col">Slug</th>
                        <th class="text-center" width="200" scope="col">Description</th>
                        <th class="text-center" width="100" scope="col">Status</th>
                        <th class="text-end" scope="col">Action</th>
                    </tr> 
                </thead>
                <tbody>
                    <?php foreach ($brands as $key => $brand) { ?>
                        <tr>
                            <td scope="row" class="fw-bold text-center"><?= $key+1; ?></td>
                            <td scope="row" class="text-center"><?= $brand['brand_id']; ?></td>
                            <td class="text-start">
                                <figure><img src="<?= base_url() . 'assets/brands/' . $brand['brand_img']; ?>" alt="<?= $brand['brand_name']; ?> Logo Image" width="100" style="background:#4C4C4C"></figure>
                            </td>
                            <td><?= $brand['brand_name']; ?></td>
                            <td><?= $brand['brand_slug']; ?></td>
                            <td><textarea cols="40" rows="5" readonly><?= $brand['brand_desc']; ?></textarea></td>
                            <td class="text-center"><?php if ($brand['brand_status']) {
                                    echo '<span class="badge text-bg-success">ON</span>';
                                } else {
                                    echo '<span class="badge text-bg-danger">OFF</span>';
                                } ?></td>
                            <td class="text-end">
                                <a href="<?= base_url('backend/brands/edit/').$brand['brand_id']; ?>" class="btn btn-outline-primary" title="Edit"><i class="fas fa-edit"></i></a> <a target="_blank" href="<?= base_url().$brand['brand_slug'].'?via=preview'; ?>" class="btn btn-outline-success" title="Preview"><i class="fa-solid fa-eye"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Content here -->
</div>