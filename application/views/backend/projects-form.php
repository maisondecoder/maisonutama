<div class="container">
    <h1 class="mb-4"><?= ucfirst($form); ?> Project</h1>
    <div class="card border p-4 mb-4">
        <?php echo validation_errors(); ?>
        <form action="<?= base_url('backend/projects/' . $form . '/') . $project['project_id']; ?>" method="POST">
            <div class="mb-3">
                <label for="ProjectName" class="form-label fw-bold">Project Title</label>
                <input type="text" onchange="fieldonchange();" class="form-control" id="ProjectTitle" name="ProjectTitle" placeholder="Project Title" value="<?= $project['project_title']; ?>">
            </div>
            <div class="mb-3">
                <label for="ProjectImage" class="form-label fw-bold">Project Images</label>
                <input type="text" onchange="fieldonchange();" class="form-control" id="ProjectImage" name="ProjectImage" placeholder="Project Image" value="<?= $project['project_img']; ?>">
            </div>
            <div class="mb-3">
                <label for="GroupName" class="form-label fw-bold">Product in This Project</label>
                <select class="js-example-data-array-selected form-select" id="Products" name="Products[]" multiple="multiple" onchange="fieldonchange();">
                    <?php foreach ($products as $key => $product) { ?>
                        <option value="<?= $product['product_id']; ?>"><?= $product['brand_name'] . " - " . $product['product_name']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="GroupName" class="form-label fw-bold">Designer / Studio</label>
                <select class="js-example-data-array-selected form-select" id="Designers" name="Designers[]" multiple="multiple" onchange="fieldonchange();">
                    <?php foreach ($products as $key => $product) { ?>
                        <option value="<?= $product['product_id']; ?>"><?= $product['brand_name'] . " - " . $product['product_name']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="ProjectStatus" class="form-label fw-bold">Status</label>

                <select class="form-select" onchange="fieldonchange();" id="Status" name="Status">
                    <option value="0" <?php if ($project['project_status'] == 0) {
                                            echo 'selected';
                                        } ?>>OFF</option>
                    <option value="1" <?php if ($project['project_status'] == 1) {
                                            echo 'selected';
                                        } ?>>ON</option>
                </select>
            </div>
            <div class="mb-3">
                <div class="row">
                    <div class="col">
                        <button id="submit" type="submit" class="btn btn-primary">Submit</button>
                        <a href="javascript:history.back()" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                    <div class="col text-end">
                        <?php if ($form == 'edit') { ?><a href="<?= base_url('backend/projects/trash/') . $project['project_id']; ?>" class="btn btn-outline-danger">Delete</a> <?php } ?>
                    </div>
                </div>

            </div>
        </form>
    </div>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <script src="https://www.jqueryscript.net/demo/MD5-Hash-String/jquery.md5.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        var mergelama = $('#ProjectName').val() + "_" + $('#ProjectStatus').val() + "_" + $('#GroupItems').val();
        const hashlama = $.MD5(mergelama);
        var mergebaru = mergelama;
        var hashbaru = hashlama;

        function fieldonchange() {
            mergebaru = $('#ProjectName').val() + "_" + $('#ProjectStatus').val() + "_" + $('#GroupItems').val();
            hashbaru = $.MD5(mergebaru);
            if (hashlama != hashbaru) {
                //$('#submit').removeClass('disabled');
            } else {
                //$('#submit').addClass('disabled');
            }
        }

        $(document).ready(function() {
            $('#Products').select2({
                theme: 'bootstrap-5'
            });
            $('#Products').val([<?= $project['product_id']; ?>]);
            $('#Products').trigger('change');
        });

        $(document).ready(function() {
            $('#Designers').select2({
                theme: 'bootstrap-5'
            });
            $('#Designers').val([<?= $project['product_id']; ?>]);
            $('#Designers').trigger('change');
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