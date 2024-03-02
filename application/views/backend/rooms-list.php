<div class="container">
    <h1 class="">Room List</h1>
    <div class="card border p-2">
        <div class="table-responsive">
            <table id="list" class="table">
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
                    <?php foreach ($rooms as $key => $room) { ?>
                        <tr>
                            <td width="50" scope="row" class="fw-bold"><?= $key+1; ?></td>
                            <td width="50" scope="row"><?= $room['room_id']; ?></td>
                            <td width="150">
                                <figure><img src="<?= base_url() . '/assets/rooms/' . $room['room_img']; ?>" alt="<?= $room['room_name']; ?> Logo Image" width="100" style="background:#4C4C4C"></figure>
                            </td>
                            <td><?= $room['room_name']; ?></td>
                            <td><?= $room['room_slug']; ?></td>
                            <td><?php if ($room['room_status']) {
                                    echo '<span class="badge text-bg-success">ON</span>';
                                } else {
                                    echo '<span class="badge text-bg-danger">OFF</span>';
                                } ?></td>
                            <td class="text-end">
                                <a href="<?= base_url('backend/rooms/edit/').$room['room_id']; ?>" class="btn btn-outline-primary" title="Edit"><i class="fas fa-edit"></i></a> <a href="<?= base_url('room/') . $room['room_slug'] . '?via=preview'; ?>" target="_blank" class="btn btn-outline-success" title="Preview"><i class="fa-solid fa-eye"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Content here -->
</div>