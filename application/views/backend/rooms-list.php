<div class="container">
    <h1 class="mb-4">Room List</h1>
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
                    <?php foreach ($rooms as $key => $room) { ?>
                        <tr>
                            <td scope="row" class="fw-bold text-center"><?= $key + 1; ?></td>
                            <td scope="row" class="text-center"><?= $room['room_id']; ?></td>
                            <td class="text-start">
                                <figure><img src="<?= base_url() . '/assets/rooms/' . $room['room_img']; ?>" alt="<?= $room['room_name']; ?> Thumbnail" width="100" style="background:#4C4C4C"></figure>
                            </td>
                            <td><?= $room['room_name']; ?></td>
                            <td><?= $room['room_slug']; ?></td>
                            <td class="text-center"><?= $room_items[$key]['total_item']; ?></td>
                            <td class="text-center"><?php if ($room['room_status']) {
                                    echo '<span class="badge text-bg-success">ON</span>';
                                } else {
                                    echo '<span class="badge text-bg-danger">OFF</span>';
                                } ?></td>
                            <td class="text-end">
                                <a href="<?= base_url('backend/rooms/edit/') . $room['room_id']; ?>" class="btn btn-outline-primary" title="Edit"><i class="fas fa-edit"></i></a> <a href="<?= base_url('room/') . $room['room_slug'] . '?via=preview'; ?>" target="_blank" class="btn btn-outline-success" title="Preview"><i class="fa-solid fa-eye"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Content here -->
</div>