<div class="container">
    <h1 class="">Brand List</h1>
    <div class="card border p-2">
        <div class="table-responsive">
            <table id="list" class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">ID</th>
                        <th scope="col">Logo</th>
                        <th scope="col">Name</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Description</th>
                        <th scope="col">Status</th>
                        <th scope="col"></th>
                    </tr> 
                </thead>
                <tbody>
                    <?php foreach ($brands as $key => $brand) { ?>
                        <tr>
                            <td width="50" scope="row" class="fw-bold"><?= $key+1; ?></td>
                            <td width="50" scope="row"><?= $brand['brand_id']; ?></td>
                            <td width="150">
                                <figure><img src="<?= base_url() . 'assets/brands/' . $brand['brand_img']; ?>" alt="<?= $brand['brand_name']; ?> Logo Image" width="100" style="background:#4C4C4C"></figure>
                            </td>
                            <td><?= $brand['brand_name']; ?></td>
                            <td><?= $brand['brand_slug']; ?></td>
                            <td><textarea cols="40" rows="5" readonly><?= $brand['brand_desc']; ?></textarea></td>
                            <td><?php if ($brand['brand_status']) {
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