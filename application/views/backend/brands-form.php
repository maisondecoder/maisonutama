<div class="container">
    <h1 class=""><?= ucfirst($form); ?> Brand</h1>
    <div class="card border p-4">
    <?php echo validation_errors(); ?>
        <form action="<?= base_url('backend/brands/edit/'). $brand['brand_id']; ?>" method="POST">
            <div class="mb-3">
                <label for="BrandName" class="form-label">Brand Name</label>
                <input type="text" class="form-control" id="BrandName" name="BrandName" placeholder="Acomodel" value="<?= $brand['brand_name']; ?>">
            </div>
            <div class="mb-3">
                <label for="BrandSlug" class="form-label">Slug</label>
                <input type="text" class="form-control" id="BrandSlug" name="BrandSlug" placeholder="acomodel" value="<?= $brand['brand_slug']; ?>">
            </div>
            <div class="mb-3">
                <label for="BrandDescription" class="form-label">Description</label>
                <textarea class="form-control" id="BrandDescription" name="BrandDescription" rows="6"><?= $brand['brand_desc']; ?></textarea>
            </div>
            <div class="mb-3">
                <label for="BrandImage" class="form-label">Image</label>
                <figure><img src="<?= base_url() . 'assets/brands/' .$brand['brand_img']; ?>" class="bg-dark img-fluid rounded" width="250"></figure>
                <input type="text" class="form-control" id="BrandImage" name="BrandImage" placeholder="brand-acomodel.webp" value="<?= $brand['brand_img']; ?>">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Save Edit</button>
            </div>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/md5.js"></script>
    <script>
        var hashori = hash$('#BrandName').val()+"_"+$('#BrandSlug').val()+"_"+$('#BrandDescription').val()+"_"+"_"+$('#BrandImage').val();
        const hashlama = CryptoJS.MD5(hashori);
        console.log('MD5 hash:', hash.toString());


    </script>
</div>