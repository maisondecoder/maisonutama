<div class="container">
    <h1 class="">Category List</h1>
    <div class="card border p-2">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">ID</th>
                        <th scope="col">Thumbnail</th>
                        <th scope="col">Name</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Status</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cats as $key => $cat) { ?>
                        <tr>
                            <td width="50" scope="row" class="fw-bold"><?= $key+1; ?></td>
                            <td width="50" scope="row"><?= $cat['cat_id']; ?></td>
                            <td width="150">
                                <figure><img src="<?= base_url() . '/assets/categories/' . $cat['cat_img']; ?>" alt="<?= $cat['cat_name']; ?> Logo Image" width="100" style="background:#4C4C4C"></figure>
                            </td>
                            <td><?= $cat['cat_name']; ?></td>
                            <td><?= $cat['cat_slug']; ?></td>
                            <td><?php if ($cat['cat_status']) {
                                    echo '<span class="badge text-bg-success">ON</span>';
                                } else {
                                    echo '<span class="badge text-bg-danger">OFF</span>';
                                } ?></td>
                            <td class="text-end">
                                <a href="#edit" class="btn btn-outline-primary" title="Edit"><i class="fas fa-edit"></i></a> <a href="<?= base_url('category/') . $cat['cat_slug'] . '?via=preview'; ?>" target="_blank" class="btn btn-outline-success" title="Preview"><i class="fa-solid fa-eye"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Content here -->
</div>