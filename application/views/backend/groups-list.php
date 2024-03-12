<div class="container">
    <h1 class="mb-4">Group List</h1>
    <div class="card border p-2 mb-4">
        <div class="table-responsive">
            <table id="list" class="table">
                <thead>
                    <tr>
                        <th class="text-center" width="75" scope="col">#</th>
                        <th class="text-center" width="75" scope="col">ID</th>
                        <th class="text-center" width="200" scope="col">Name</th>
                        <th class="text-center" width="200" scope="col">Items</th>
                        <th class="text-center" width="200" scope="col">Status</th>
                        <th class="text-end" scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($groups as $key => $group) { ?>
                        <tr>
                            <td scope="row" class="fw-bold  text-center"><?= $key + 1; ?></td>
                            <td scope="row" class="text-center"><?= $group['group_id']; ?></td>
                            <td scope="row" class="text-center"><?= $group['group_name']; ?></td>
                            <td scope="row" class="text-center"><?= $group['group_items']; ?></td>
                            <td class="text-center"><?php if ($group['group_status']) {
                                    echo '<span class="badge text-bg-success">ON</span>';
                                } else {
                                    echo '<span class="badge text-bg-danger">OFF</span>';
                                } ?></td>
                            <td class="text-end">
                                <a href="<?= base_url('backend/groups/edit/').$group['group_id']; ?>" class="btn btn-outline-primary" title="Edit"><i class="fas fa-edit"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Content here -->
</div>