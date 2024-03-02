<div class="container">
    <h1 class="mb-4">Category List</h1>
    <div class="card border p-2">
        <div class="table-responsive">
            <table id="list" class="table">
                <thead>
                    <tr>
                        <th class="text-center" width="75" scope="col">#</th>
                        <th class="text-center" width="75" scope="col">ID</th>
                        <th class="text-start" width="100" scope="col">Thumbnail</th>
                        <th class="text-center" width="200" scope="col">Name</th>
                        <th class="text-center" width="200" scope="col">Slug</th>
                        <th class="text-center" width="100" scope="col">Item</th>
                        <th class="text-center" width="100" scope="col">Status</th>
                        <th class="text-end" scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cats as $key => $cat) { ?>
                        <tr>
                            <td scope="row" class="fw-bold  text-center"><?= $key + 1; ?></td>
                            <td scope="row" class="text-center"><?= $cat['cat_id']; ?></td>
                            <td class="text-start">
                                <figure><img src="<?= base_url() . '/assets/categories/' . $cat['cat_img']; ?>" alt="<?= $cat['cat_name']; ?> Thumbnail" width="100" style="background:#4C4C4C"></figure>
                            </td>
                            <td><?= $cat['cat_name']; ?></td>
                            <td><?= $cat['cat_slug']; ?></td>
                            <td class="text-center"><?= $cat_items[$key]['total_item']; ?></td>
                            <td class="text-center"><?php if ($cat['cat_status']) {
                                    echo '<span class="badge text-bg-success">ON</span>';
                                } else {
                                    echo '<span class="badge text-bg-danger">OFF</span>';
                                } ?></td>
                            <td class="text-end">
                                <a href="<?= base_url('backend/categories/edit/').$cat['cat_id']; ?>" class="btn btn-outline-primary" title="Edit"><i class="fas fa-edit"></i></a> <a href="<?= base_url('category/') . $cat['cat_slug'] . '?via=preview'; ?>" target="_blank" class="btn btn-outline-success" title="Preview"><i class="fa-solid fa-eye"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Content here -->
</div>