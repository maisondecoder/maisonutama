<div class="container">
    <h1 class="mb-4"><?= ucfirst($form); ?> Product</h1>
    <div class="card border p-4 mb-4">
        <?php echo validation_errors(); ?>
        <form action="<?= base_url('backend/products/' . $form . '/') . $products['product_id']; ?>" method="POST">
            <div class="mb-3">
                <label for="ProductName" class="form-label fw-bold">Product Name</label>
                <input type="text" onchange="fieldonchange();" class="form-control" id="ProductName" name="ProductName" placeholder="Product Name" value="<?= $products['product_name']; ?>">
            </div>
            <div class="mb-3">
                <label for="ProductSlug" class="form-label fw-bold">Slug</label>
                <input type="text" onchange="fieldonchange();" class="form-control" id="ProductSlug" name="ProductSlug" placeholder="product-slug" value="<?= $products['product_slug']; ?>">
            </div>
            <div class="mb-3">
                <label for="Brand" class="form-label fw-bold">Brand</label>
                <select class="form-select" id="Brand" name="Brand" onchange="fieldonchange();">
                    <option value="0" <?php if ($products['brand_id'] == 0) {
                                            echo 'selected';
                                        } ?>>Select a Brand...</option>
                    <?php foreach ($brands as $key => $brand) { ?>
                        <option value="<?= $brand['brand_id']; ?>" <?php if ($products['brand_id'] == $brand['brand_id']) {
                                                                        echo 'selected';
                                                                    } ?>><?= $brand['brand_name']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="Room" class="form-label fw-bold">Room</label>
                <select class="form-select" id="Room" name="Room" onchange="fieldonchange();">
                    <option value="0" <?php if ($products['room_id'] == 0) {
                                            echo 'selected';
                                        } ?>>Select a Room Type...</option>
                    <?php foreach ($rooms as $key => $room) { ?>
                        <option value="<?= $room['room_id']; ?>" <?php if ($products['room_id'] == $room['room_id']) {
                                                                        echo 'selected';
                                                                    } ?>><?= $room['room_name']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="Category" class="form-label fw-bold">Category</label>
                <select class="form-select" id="Category" name="Category" onchange="fieldonchange();">
                    <option value="0" <?php if ($products['cat_id'] == 0) {
                                            echo 'selected';
                                        } ?>>Select a Category...</option>
                    <?php foreach ($cats as $key => $cat) { ?>
                        <option value="<?= $cat['cat_id']; ?>" <?php if ($products['cat_id'] == $cat['cat_id']) {
                                                                    echo 'selected';
                                                                } ?>><?= $cat['cat_name']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="ProductThumbnail" class="form-label fw-bold">Image</label>
                <?php if ($products['product_thumbnail']) { ?><figure><img id="preview-image" src="<?= base_url() . 'assets/products/thumbnail/' . $products['product_thumbnail']; ?>" class="bg-dark img-fluid rounded" width="250"></figure><?php } ?>
                <div class="input-group">
                    <button id="upload" type="button" class="btn btn-outline-success"><i class="fa-solid fa-cloud-arrow-up"></i> Open Uploader</button>
                    <input type="text" onchange="fieldonchange();" class="form-control" id="ProductThumbnail" name="ProductThumbnail" placeholder="filename-thumbnail-room.webp" value="<?= $products['product_thumbnail']; ?>">
                </div>
            </div>
            <div class="mb-3">
                <label for="ProductStatus" class="form-label fw-bold">Status</label>
                <select class="form-select" onchange="fieldonchange();" id="ProductStatus" name="ProductStatus">
                    <option value="0" <?php if ($products['product_status'] == 0) {
                                            echo 'selected';
                                        } ?>>OFF</option>
                    <option value="1" <?php if ($products['product_status'] == 1) {
                                            echo 'selected';
                                        } ?>>ON</option>
                </select>
            </div>
            <hr>
            <div class="mb-3">
                <label for="SectionQTY" class="form-label fw-bold">Section Number</label><br>
                <div id="decsec" class="btn btn-primary">-</div>
                <div id="labelsection" class="btn"><?= count($contents); ?></div>
                <div id="addsec" class="btn btn-primary">+</div>
                <!--<input type="number" class="form-control" id="SectionQTY" value="<?= count($contents); ?>" min="1" max="5">-->
            </div>
            <div id="SectionContent" class="mb-3 card p-4">
                <?php if ($contents) {
                    foreach ($contents as $key => $content) {
                        $index = array_search($key, array_keys($contents));
                ?>
                        <div id="section<?= $index + 1; ?>">
                            <label for="ProductContent" class="form-label fw-bold">Product Content #<?= $index + 1; ?></label>
                            <div id="content-box" class="container card p-4 mb-2 bg-light">
                                <div class="mb-3">
                                    <label for="SectionTitle" class="form-label fw-bold">Content Title</label>
                                    <input type="text" onchange="fieldonchange();" class="form-control" id="SectionTitle<?= $index + 1; ?>" name="SectionTitle[]" placeholder="e.g. Description" value="<?= $key; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="Sectionvalue" class="form-label fw-bold">Content Value</label>
                                    <input type="text" onchange="fieldonchange();" class="form-control" id="Sectionvalue<?= $index + 1; ?>" name="SectionValue[]" placeholder="Type Description value here..." value="<?= $contents[$key]; ?>">
                                </div>
                            </div>
                        </div>
                    <?php }
                } else { ?>
                    <div id="section1">
                        <label for="ProductContent" class="form-label fw-bold">Product Content #1</label>
                        <div id="content-box" class="container card p-4 mb-2 bg-light">
                            <div class="mb-3">
                                <label for="SectionTitle1" class="form-label fw-bold">Content Title</label>
                                <input type="text" onchange="fieldonchange();" class="form-control " id="SectionTitle1" name="SectionTitle[]" placeholder="e.g. Description" value="">
                            </div>
                            <div class="mb-3">
                                <label for="Sectionvalue1" class="form-label fw-bold">Content Value</label>
                                <input type="text" onchange="fieldonchange();" class="form-control" id="Sectionvalue1" name="SectionValue[]" placeholder="Type Description value here..." value="">
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="mb-3">
                <div class="row">
                    <div class="col">
                        <button id="submit" type="submit" class="btn btn-primary disabled">Submit</button>
                        <a href="javascript:history.back()" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                    <div class="col text-end">
                        <?php if ($form == 'edit') { ?><a href="<?= base_url('backend/products/trash/') . $products['product_id']; ?>" class="btn btn-outline-danger">Delete</a> <?php } ?>
                    </div>
                </div>

            </div>
        </form>
    </div>
    <link href="https://fastly.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://fastly.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link rel="stylesheet" href="https://fastly.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <script src="https://www.jqueryscript.net/demo/MD5-Hash-String/jquery.md5.min.js"></script>
    <script>
        var mergelama = $('#ProductName').val() + "_" + $('#ProductSlug').val() + "_" + $('#Brand').val() + "_" + $('#Room').val() + "_" + $('#Category').val() + "_" + $('#ProductThumbnail').val() + "_" + $('#ProductStatus').val() + "_" + $("#SectionContent").children().toArray();
        const hashlama = $.MD5(mergelama);
        var mergebaru = mergelama;
        var hashbaru = hashlama;

        function fieldonchange() {
            mergebaru = $('#ProductName').val() + "_" + $('#ProductSlug').val() + "_" + $('#Brand').val() + "_" + $('#Room').val() + "_" + $('#Category').val() + "_" + $('#ProductThumbnail').val() + "_" + $('#ProductStatus').val() + "_" + $("#SectionContent").children().toArray();
            hashbaru = $.MD5(mergebaru);
            if (hashlama != hashbaru) {
                $('#submit').removeClass('disabled');
            } else {
                $('#submit').addClass('disabled');
            }
        }
    </script>

    <script>
        var popup;
        var getvalimage;

        $(document).ready(function() {
            $('#Category').select2({
                theme: 'bootstrap-5'
            });
            $('#Room').select2({
                theme: 'bootstrap-5'
            });
            console.log($('[name="SectionValue[]"]').serialize());
            //alert($('[name="SectionTitle[]"]').length);
            //alert($('[name="SectionValue[]"]').length);
        });

        function foo(x) {
            var filename = x.document.getElementById("filename").innerHTML;
            console.log(filename);
            $('#ProductThumbnail').val(filename);
            $('#ProductThumbnail').trigger("change");
            $('#preview-image').attr('src', '<?= base_url('assets/products/thumbnail/'); ?>' + filename);
            clearInterval(getvalimage);
        }

        $('#upload').click(function() {
            popup = window.open('<?= base_url('backend/filemanager/products/thumbnail/'); ?>', '_blank', 'width=500,height=200');
            getvalimage = setInterval(function() {
                foo(popup);
            }, 2000);
        });

        $('#addsec').click(function() {
            //alert($(this).val());
            var qty = $("#SectionContent").children().length;
            if (qty < 6) {
                var next = qty + 1;
                //removeChild();
                $("#labelsection").text(next);
                $("#SectionContent").append(
                    "<div id='section" + next + "'>" +
                    "<label for='ProductContent' class='form-label fw-bold'>Product Content #" + next + "</label>" +
                    "<div id='content-box' class='container card p-4 mb-2 bg-light'>" +
                    "<div class='mb-3'>" +
                    "<label for='SectionTitle' class='form-label fw-bold'>Content Title</label>" +
                    "<input type='text' onchange='fieldonchange();'' class='form-control' id='SectionTitleXX' name='SectionTitle[]' placeholder='e.g. Description' value=''>" +
                    "</div>" +
                    "<div class='mb-3'>" +
                    "<label for='Sectionvalue' class='form-label fw-bold'>Content Value</label>" +
                    "<input type='text' onchange='fieldonchange();' class='form-control' id='SectionvalueXX' name='SectionValue[]' placeholder='Type Description value here...' value=''>" +
                    "</div>" +
                    "</div>" +
                    "</div>"
                );
            }
        });

        $("#decsec").click(function() {
            var qty = $("#SectionContent").children().length;
            if (qty > 1) {
                $("#labelsection").text(qty-1);
                $("#SectionContent").children().last().remove();
            }
        });
    </script>
</div>