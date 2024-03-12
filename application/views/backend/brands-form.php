<div class="container">
    <h1 class="mb-4"><?= ucfirst($form); ?> Brand</h1>
    <div class="card border p-4 mb-4">
        <?php echo validation_errors(); ?>
        <form action="<?= base_url('backend/brands/' . $form . '/') . $brand['brand_id']; ?>" method="POST">
            <div class="mb-3">
                <label for="BrandName" class="form-label fw-bold">Brand Name</label>
                <input type="text" onchange="fieldonchange();" class="form-control" id="BrandName" name="BrandName" placeholder="Brand Name" value="<?= $brand['brand_name']; ?>">
            </div>
            <div class="mb-3">
                <label for="BrandSlug" class="form-label fw-bold">Slug</label>
                <input type="text" onchange="fieldonchange();" class="form-control" id="BrandSlug" name="BrandSlug" placeholder="brand-slug" value="<?= $brand['brand_slug']; ?>">
            </div>
            <div class="mb-3">
                <label for="BrandDescription" class="form-label fw-bold">Description</label>
                <textarea class="form-control" onchange="fieldonchange();" id="BrandDescription" name="BrandDescription" rows="6"><?= $brand['brand_desc']; ?></textarea>
            </div>
            <div class="mb-3">
                <label for="BrandImage" class="form-label fw-bold">Image</label>
                <?php if ($brand['brand_img']) { ?><figure><img id="preview-image" src="<?= base_url() . 'assets/brands/' . $brand['brand_img']; ?>" class="bg-dark img-fluid rounded" width="250"></figure><?php } ?>
                <div class="input-group">
                    <button id="upload" type="button" class="btn btn-outline-success"><i class="fa-solid fa-cloud-arrow-up"></i> Open Uploader</button>
                    <input type="text" onchange="fieldonchange();" class="form-control" id="BrandImage" name="BrandImage" placeholder="filename-brand-logo.webp" value="<?= $brand['brand_img']; ?>">
                </div>
            </div>
            <div class="mb-3">
                <label for="BrandStatus" class="form-label fw-bold">Status</label>
                <select class="form-select" onchange="fieldonchange();" id="BrandStatus" name="BrandStatus">
                    <option value="0" <?php if ($brand['brand_status'] == 0) {
                                            echo 'selected';
                                        } ?>>OFF</option>
                    <option value="1" <?php if ($brand['brand_status'] == 1) {
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
                        <?php if ($form == 'edit') { ?><a href="<?= base_url('backend/brands/trash/') . $brand['brand_id']; ?>" class="btn btn-outline-danger">Delete</a> <?php } ?>
                    </div>
                </div>

            </div>
        </form>
    </div>

    <script src="https://www.jqueryscript.net/demo/MD5-Hash-String/jquery.md5.min.js"></script>
    <script>
        var mergelama = $('#BrandName').val() + "_" + $('#BrandSlug').val() + "_" + $('#BrandDescription').val() + "_" + $('#BrandImage').val() + "_" + $('#BrandStatus').val();
        const hashlama = $.MD5(mergelama);
        var mergebaru = mergelama;
        var hashbaru = hashlama;

        function fieldonchange() {
            mergebaru = $('#BrandName').val() + "_" + $('#BrandSlug').val() + "_" + $('#BrandDescription').val() + "_" + $('#BrandImage').val() + "_" + $('#BrandStatus').val();
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

        function foo(x) {
            var filename = x.document.getElementById("filename").textContent;
            console.log(filename);
            $('#BrandImage').val(filename);
            $('#BrandImage').trigger("change");
            $('#preview-image').attr('src', '<?= base_url('assets/brands/'); ?>'+filename);
            clearInterval(getvalimage);
        }

        $('#upload').click(function() {
            popup = window.open('<?= base_url('backend/filemanager/brands/'); ?>', '_blank', 'width=500,height=180');
            getvalimage = setInterval(function() {
                foo(popup);
            }, 2000);
        });
    </script>
</div>