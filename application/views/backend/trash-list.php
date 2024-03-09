<div class="container">
    <h1 class="mb-4">Trash Bin</h1>

    <div class="card border p-2">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link <?php if($table == 'product'){ echo 'active fw-bold'; } ?>" href="<?= base_url('backend/trash/product'); ?>">Product (<?= $ct_product['qty']; ?>)</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if($table == 'group'){ echo 'active fw-bold'; } ?>" href="<?= base_url('backend/trash/group'); ?>">Group (<?= $ct_group['qty']; ?>)</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if($table == 'brand'){ echo 'active fw-bold'; } ?>" href="<?= base_url('backend/trash/brand'); ?>">Brand (<?= $ct_brand['qty']; ?>)</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if($table == 'room'){ echo 'active fw-bold'; } ?>" href="<?= base_url('backend/trash/room'); ?>">Room (<?= $ct_room['qty']; ?>)</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if($table == 'category'){ echo 'active fw-bold'; } ?>" href="<?= base_url('backend/trash/category'); ?>">Category (<?= $ct_category['qty']; ?>)</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if($table == 'store'){ echo 'active fw-bold'; } ?>" href="<?= base_url('backend/trash/store'); ?>">Store (<?= $ct_store['qty']; ?>)</a>
            </li>
        </ul>
        <div class="table-responsive">
            <table id="list" class="table">
                <thead>
                    <tr>
                        <th class="text-center" width="75" scope="col">#</th>
                        <th class="text-center" width="75" scope="col">ID</th>
                        <th class="text-center" scope="col">Name</th>
                        <th class="text-end" scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($trash as $key => $trash) { ?>
                        <tr>
                            <td scope="row" class="fw-bold text-center"><?= $key + 1; ?></td>
                            <th class="text-center" width="75" scope="col"><?= $trash['ID']; ?></th>
                            <td scope="row" class=""><?= $trash['Name']; ?></td>
                            <td class="text-end">
                                <a href="<?= base_url('backend/trash/' . $table . '/restore/') . $trash['ID']; ?>" class="btn btn-outline-success" title="Restore"><i class="fa-solid fa-trash-arrow-up"></i></a> <a href="<?= base_url('backend/trash/' . $table . '/delete/') . $trash['ID']; ?>" class="btn btn-outline-danger" title="Permanent Delete"><i class="fa-solid fa-dumpster-fire"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Content here -->
</div>