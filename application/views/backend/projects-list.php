<div class="container">
    <h1 class="mb-4">Project List</h1>
    <div class="card border p-2 mb-4">
        <div class="table-responsive">
            <table id="list" class="table">
                <thead>
                    <tr>
                        <th scope="col" width="10">#</th>
                        <th scope="col" width="10">ID</th>
                        <th scope="col" width="200">Thumbnail</th>
                        <th scope="col">Title</th>
                        <th scope="col" width="100">Status</th>
                        <th scope="col" width="200"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($projects as $key => $project) {
                        $thumb1 = explode(";", $project['project_img']);
                        ?>
                        <tr>
                            <td class="fw-bold"><?= $key+1; ?></td>
                            <td width="50" scope="row"><?= $project['project_id']; ?></td>
                            <td width="150">
                                <figure><img class="rounded" src="<?= base_url() . '/assets/projects/' . $thumb1[0]; ?>" alt="<?= $project['project_name']; ?> Thumbnail" width="100" style="background:#4C4C4C"></figure>
                            </td>
                            <td><?= $project['project_name']; ?></td>
                            <td><?php if ($project['project_status']) {
                                    echo '<span class="badge text-bg-success">ON</span>';
                                } else {
                                    echo '<span class="badge text-bg-danger">OFF</span>';
                                } ?></td>
                            <td class="text-end">
                                <a href="<?= base_url('backend/projects/edit/') . $project['project_id']; ?>" class="btn btn-outline-primary" title="Edit"><i class="fas fa-edit"></i></a> <a href="<?= base_url('main/our_project/') . $project['project_id'] . '?via=preview'; ?>" target="_blank" class="btn btn-outline-success" title="Preview"><i class="fa-solid fa-eye"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Content here -->
</div>