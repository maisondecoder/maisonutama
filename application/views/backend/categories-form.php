<div class="container">
    <h1 class="mb-4"><?= ucfirst($form); ?> Category</h1>
    <div class="card border p-4 mb-4">
        <?php echo validation_errors(); ?>
        <form action="<?= base_url('backend/categories/' . $form . '/') . $cat['cat_id']; ?>" method="POST">
            <div class="mb-3">
                <label for="CatName" class="form-label fw-bold">Category Name</label>
                <input type="text" onchange="fieldonchange();" class="form-control" id="CatName" name="CatName" placeholder="Category Name" value="<?= $cat['cat_name']; ?>">
            </div>
            <div class="mb-3">
                <label for="CatSlug" class="form-label fw-bold">Slug</label>
                <input type="text" onchange="fieldonchange();" class="form-control" id="CatSlug" name="CatSlug" placeholder="category-slug" value="<?= $cat['cat_slug']; ?>">
            </div>
            <div class="mb-3">
                <label for="CatImage" class="form-label fw-bold">Thumbnail</label>
                <?php if ($cat['cat_img']) { ?><figure><img id="preview-image" src="<?= base_url() . 'assets/categories/' . $cat['cat_img']; ?>" class="bg-dark img-fluid rounded" width="250"></figure><?php } ?>
                <div class="input-group">
                    <button id="upload" type="button" class="btn btn-outline-success"><i class="fa-solid fa-cloud-arrow-up"></i> Open Uploader</button>
                    <input type="text" onchange="fieldonchange();" class="form-control" id="CatImage" name="CatImage" placeholder="filename-thumbnail-category.webp" value="<?= $cat['cat_img']; ?>">
                </div>
            </div>
            <div class="mb-3">
                <label for="CatStatus" class="form-label fw-bold">Status</label>
                <select class="form-select" onchange="fieldonchange();" id="CatStatus" name="CatStatus">
                    <option value="0" <?php if ($cat['cat_status'] == 0) {
                                            echo 'selected';
                                        } ?>>OFF</option>
                    <option value="1" <?php if ($cat['cat_status'] == 1) {
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
                        <?php if ($form == 'edit') { ?><a href="<?= base_url('backend/categories/trash/') . $cat['cat_id']; ?>" class="btn btn-outline-danger">Delete</a> <?php } ?>
                    </div>
                </div>

            </div>
        </form>
    </div>

    <script src="https://www.jqueryscript.net/demo/MD5-Hash-String/jquery.md5.min.js"></script>
    <script>
        var mergelama = $('#CatName').val() + "_" + $('#CatSlug').val() + "_" + $('#CatImage').val() + "_" + $('#CatStatus').val();
        const hashlama = $.MD5(mergelama);
        var mergebaru = mergelama;
        var hashbaru = hashlama;

        function fieldonchange() {
            mergebaru = $('#CatName').val() + "_" + $('#CatSlug').val() + "_" + $('#CatImage').val() + "_" + $('#CatStatus').val();
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
            $('#CatImage').val(filename);
            $('#CatImage').trigger("change");
            $('#preview-image').attr('src', '<?= base_url('assets/categories/'); ?>'+filename);
            clearInterval(getvalimage);
        }

        $('#upload').click(function() {
            popup = window.open('<?= base_url('backend/filemanager/categories/'); ?>', '_blank', 'width=500,height=180');
            getvalimage = setInterval(function() {
                foo(popup);
            }, 2000);
        });
    </script>
</div>