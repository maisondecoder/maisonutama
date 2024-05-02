<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Upload a New File</title>
    <link href="https://fastly.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="bg-secondary">
    <div class="container p-2">
        <div class="card p-4">
            <div class="text-danger" role="alert">
                <?php echo $error['error']; ?>
            </div>

            <?php echo form_open_multipart('backend/filemanager/' . $folder . '/' . $folder2); ?>

            <input class="form-control mb-3" type="file" name="userfile" size="20" />

            <input class="btn btn-primary" type="submit" value="Upload" />

            </form>
        </div>
    </div>
    <script src="https://fastly.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>