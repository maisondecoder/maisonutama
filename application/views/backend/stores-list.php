<div class="container" style="max-width:1024px">
    <h1 class="">Stores</h1>
    <div class="card border p-2">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Thumbnail</th>
                        <th scope="col">Name</th>
                        <th scope="col">WA</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Google Map</th>
                        <th scope="col">Status</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($stores as $key => $store) { ?>
                        <tr>
                            <td width="50" scope="row" class="fw-bold"><?= $store['store_id']; ?></td>
                            <td width="150">
                                <figure><img src="<?= base_url() . '/assets/' . $store['store_img']; ?>" alt="<?= $store['store_name']; ?> Logo Image" width="100" style="background:#4C4C4C"></figure>
                            </td>
                            <td><?= $store['store_name']; ?></td>
                            <td><?= $store['store_wa']; ?></td>
                            <td><?= $store['store_phone']; ?></td>
                            <td><a href="<?= $store['store_gmap']; ?>" target="_blank" class="btn btn-outline-success">Preview</a></td>
                            <td><?php if($store['store_status']){echo '<span class="badge text-bg-success">ON</span>';}else{echo '<span class="badge text-bg-danger">OFF</span>';} ?></td>
                            <td class="text-end">
                                <a href="#edit" class="btn btn-outline-primary">Edit</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Content here -->
</div>