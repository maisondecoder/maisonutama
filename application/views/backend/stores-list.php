<div class="container">
    <h1 class="mb-4">Store List</h1>
    <div class="card border p-2 mb-4">
        <div class="table-responsive">
            <table id="list" class="table">
                <thead>
                    <tr>
                        <th class="text-center" width="75" scope="col">#</th>
                        <th class="text-center" width="75" scope="col">ID</th>
                        <th class="text-start" width="100" scope="col">Thumbnail</th>
                        <th class="text-center" width="200" scope="col">Name</th>
                        <th class="text-center" width="200" scope="col">Address</th>
                        <th class="text-center" width="150" scope="col">WA</th>
                        <th class="text-center" width="150" scope="col">Phone</th>
                        <th class="text-center" width="200" scope="col">Google Map</th>
                        <th class="text-center" width="100" scope="col">Status</th>
                        <th class="text-end" scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($stores as $key => $store) { ?>
                        <tr>
                            <td scope="row" class="fw-bold text-center"><?= $key+1; ?></td>
                            <td class="text-center" scope="row"><?= $store['store_id']; ?></td>
                            <td class="text-start">
                                <figure><img src="<?= base_url() . '/assets/stores/' . $store['store_img']; ?>" alt="<?= $store['store_name']; ?> Logo Image" width="100" style="background:#4C4C4C"></figure>
                            </td>
                            <td><?= $store['store_name']; ?></td>
                            <td><?= $store['store_addrs']; ?></td>
                            <td class="text-end"><?= $store['store_wa']; ?></td>
                            <td class="text-end"><?= $store['store_phone']; ?></td>
                            <td class="text-center"><a href="<?= $store['store_gmap']; ?>" target="_blank" class="btn btn-outline-success">Open <i class="fa-solid fa-arrow-up-right-from-square"></i></a></td>
                            <td class="text-center"><?php if ($store['store_status']) {
                                    echo '<span class="badge text-bg-success">ON</span>';
                                } else {
                                    echo '<span class="badge text-bg-danger">OFF</span>';
                                } ?></td>
                            <td class="text-end">
                                <a href="<?= base_url('backend/stores/edit/') . $store['store_id']; ?>" class="btn btn-outline-primary" title="Edit"><i class="fas fa-edit"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Content here -->
</div>