<div class="container" style="max-width:1024px">
    <h1 class="">Categories</h1>
    <div class="card border p-2">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
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
                            <td width="50" scope="row" class="fw-bold"><?= $cat['cat_id']; ?></td>
                            <td width="150">
                                <figure><img src="<?= base_url() . '/assets/categories/' . $cat['cat_img']; ?>" alt="<?= $cat['cat_name']; ?> Logo Image" width="100" style="background:#4C4C4C"></figure>
                            </td>
                            <td><?= $cat['cat_name']; ?></td>
                            <td><?= $cat['cat_slug']; ?></td>
                            <td><?php if($cat['cat_status']){echo '<span class="badge text-bg-success">ON</span>';}else{echo '<span class="badge text-bg-danger">OFF</span>';} ?></td>
                            <td class="text-end">
                                <a href="#edit" class="btn btn-outline-primary">Edit</a> <a href="<?=base_url('category/').$cat['cat_slug'].'?via=preview';?>" target="_blank" class="btn btn-outline-success">Preview</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Content here -->
</div>