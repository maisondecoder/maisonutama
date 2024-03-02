<div class="container">
    <h1 class="mb-4"><?= ucfirst($form); ?> Store</h1>
    <div class="card border p-4 mb-4">
        <?php echo validation_errors(); ?>
        <form action="<?= base_url('backend/stores/' . $form . '/') . $store['store_id']; ?>" method="POST">
            <div class="mb-3">
                <label for="StoreName" class="form-label fw-bold">Store Name</label>
                <input type="text" onchange="fieldonchange();" class="form-control" id="StoreName" name="StoreName" placeholder="Store Name" value="<?= $store['store_name']; ?>">
            </div>
            <div class="mb-3">
                <label for="StoreAddress" class="form-label fw-bold">Address</label>
                <input type="text" onchange="fieldonchange();" class="form-control" id="StoreAddress" name="StoreAddress" placeholder="Store Address" value="<?= $store['store_addrs']; ?>">
            </div>
            <div class="mb-3">
                <label for="StoreWA" class="form-label fw-bold">Whatsapp Number</label>
                <input type="text" onchange="fieldonchange();" class="form-control" id="StoreWA" name="StoreWA" placeholder="Store Whatsapp Number" value="<?= $store['store_wa']; ?>">
            </div>
            <div class="mb-3">
                <label for="StoreDefaultText" class="form-label fw-bold">Whatsapp Default Text</label>
                <input type="text" onchange="fieldonchange();" class="form-control" id="StoreDefaultText" name="StoreDefaultText" placeholder="Whatsapp Default Text" value="<?= urldecode($store['store_default_text']); ?>">
            </div>
            <div class="mb-3">
                <label for="StorePhone" class="form-label fw-bold">Office Phone Number</label>
                <input type="text" onchange="fieldonchange();" class="form-control" id="StorePhone" name="StorePhone" placeholder="Office Phone Number" value="<?= $store['store_phone']; ?>">
            </div>
            <div class="mb-3">
                <label for="StoreGmap" class="form-label fw-bold">Google Maps URL</label>
                <input type="text" onchange="fieldonchange();" class="form-control" id="StoreGmap" name="StoreGmap" placeholder="Store Google Map URL" value="<?= $store['store_gmap']; ?>">
            </div>
            <div class="mb-3">
                <label for="StoreImage" class="form-label fw-bold">Thumbnail</label>
                <?php if ($store['store_img']) { ?><figure><img src="<?= base_url() . 'assets/stores/' . $store['store_img']; ?>" class="bg-dark img-fluid rounded" width="250"></figure><?php } ?>
                <input type="text" onchange="fieldonchange();" class="form-control" id="StoreImage" name="StoreImage" placeholder="filename-thumbnail-store.webp" value="<?= $store['store_img']; ?>">
            </div>
            <div class="mb-3">
                <label for="StoreOrder" class="form-label fw-bold">Order</label>
                <input type="number" min="1" max="9" onchange="fieldonchange();" class="form-control" id="StoreOrder" name="StoreOrder" placeholder="Store Sort Order" value="<?= $store['store_order']; ?>">
            </div>
            <div class="mb-3">
                <label for="StoreStatus" class="form-label fw-bold">Status</label>
                <select class="form-select" onchange="fieldonchange();" id="StoreStatus" name="StoreStatus">
                    <option value="0" <?php if($store['store_status']==0){ echo 'selected';} ?>>OFF</option>
                    <option value="1" <?php if($store['store_status']==1){ echo 'selected';} ?>>ON</option>
                </select>
            </div>
            <div class="mb-3">
                <div class="row">
                    <div class="col">
                        <button id="submit" type="submit" class="btn btn-primary disabled">Submit</button>
                        <a href="javascript:history.back()" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                    <div class="col text-end">
                        <?php if ($form == 'edit') { ?><a href="<?= base_url('backend/stores/trash/') . $store['store_id']; ?>" class="btn btn-outline-danger">Delete</a> <?php } ?>
                    </div>
                </div>

            </div>
        </form>
    </div>

    <script src="https://www.jqueryscript.net/demo/MD5-Hash-String/jquery.md5.min.js"></script>
    <script>
        var mergelama = $('#StoreName').val() + "_" + $('#StoreAddress').val() + "_" + $('#StoreWA').val() + "_" + $('#StoreDefaultText').val() + "_" + $('#StorePhone').val() + "_" + $('#StoreGmap').val() + "_" + $('#StoreImage').val() + "_" + $('#StoreOrder').val() + "_" + $('#StoreStatus').val();
        const hashlama = $.MD5(mergelama);
        var mergebaru = mergelama;
        var hashbaru = hashlama;

        function fieldonchange() {
            mergebaru = $('#StoreName').val() + "_" + $('#StoreAddress').val() + "_" + $('#StoreWA').val() + "_" + $('#StoreDefaultText').val() + "_" + $('#StorePhone').val() + "_" + $('#StoreGmap').val() + "_" + $('#StoreImage').val() + "_" + $('#StoreOrder').val() + "_" + $('#StoreStatus').val();
            hashbaru = $.MD5(mergebaru);
            if (hashlama != hashbaru) {
                $('#submit').removeClass('disabled');
            } else {
                $('#submit').addClass('disabled');
            }
        }
    </script>
</div>