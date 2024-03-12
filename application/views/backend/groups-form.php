<div class="container">
    <h1 class="mb-4"><?= ucfirst($form); ?> Group</h1>
    <div class="card border p-4 mb-4">
        <?php echo validation_errors(); ?>
        <form action="<?= base_url('backend/groups/' . $form . '/') . $group['group_id']; ?>" method="POST">
            <div class="mb-3">
                <label for="GroupName" class="form-label fw-bold">Group Name</label>
                <input type="text" onchange="fieldonchange();" class="form-control" id="GroupName" name="GroupName" placeholder="Group Name" value="<?= $group['group_name']; ?>">
            </div>
            <div class="mb-3">
                <label for="GroupName" class="form-label fw-bold">Items</label>
                <select class="js-example-data-array-selected form-select" id="GroupItems" name="GroupItems[]" multiple="multiple" onchange="fieldonchange();">
                    <?php foreach ($products as $key => $product) { ?>
                        <option value="<?= $product['product_id']; ?>"><?= $product['brand_name'] . " - " . $product['product_name']; ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="GroupStatus" class="form-label fw-bold">Status</label>

                <select class="form-select" onchange="fieldonchange();" id="GroupStatus" name="GroupStatus">
                    <option value="0" <?php if ($group['group_status'] == 0) {
                                            echo 'selected';
                                        } ?>>OFF</option>
                    <option value="1" <?php if ($group['group_status'] == 1) {
                                            echo 'selected';
                                        } ?>>ON</option>
                </select>
            </div>
            <div class="mb-3">
                <div class="row">
                    <div class="col">
                        <button id="submit" type="submit" class="btn btn-primary disabled">Submit</button>
                        <a href="javascript:history.back()" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                    <div class="col text-end">
                        <?php if ($form == 'edit') { ?><a href="<?= base_url('backend/groups/trash/') . $group['group_id']; ?>" class="btn btn-outline-danger">Delete</a> <?php } ?>
                    </div>
                </div>

            </div>
        </form>
    </div>
    <div class="card border p-4 mb-4">
        <h3 class="mb-4">Display Sort</h3>
        <form action="<?= base_url('backend/groups/' . $form . '/') . $group['group_id']; ?>" method="POST">
            <div class="mb-3">

                <ul id="sortable" class="list-group">
                    <?php foreach ($selected_items as $key => $selected) { ?>
                        <li id="<?= $selected['product_id']; ?>" class="list-group-item ui-state-default"><?= $selected['product_name'] . ' - ' . $selected['brand_name']; ?></li>
                    <?php } ?>
                </ul>

            </div>
            <div class="mb-3">
                <div class="row">
                    <div class="col">
                        <button id="submit" type="submit" class="btn btn-primary">Save Reorder</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://www.jqueryscript.net/demo/MD5-Hash-String/jquery.md5.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        var mergelama = $('#GroupName').val() + "_" + $('#GroupStatus').val() + "_" + $('#GroupItems').val();
        const hashlama = $.MD5(mergelama);
        var mergebaru = mergelama;
        var hashbaru = hashlama;

        function fieldonchange() {
            mergebaru = $('#GroupName').val() + "_" + $('#GroupStatus').val() + "_" + $('#GroupItems').val();
            hashbaru = $.MD5(mergebaru);
            if (hashlama != hashbaru) {
                $('#submit').removeClass('disabled');
            } else {
                $('#submit').addClass('disabled');
            }
        }

        $(document).ready(function() {
            $('#GroupItems').select2();
            $('#GroupItems').val([<?= $group['group_items']; ?>]);
            $('#GroupItems').trigger('change');
        });

        $(function() {
            $("#sortable").sortable();
        });

        $("#sortable").on("sortupdate", function(event, ui) {
            var sortedIDs = $("#sortable").sortable("toArray");
            console.log(sortedIDs);
        });
    </script>
</div>