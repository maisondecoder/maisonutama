<div class="container">
    <h1 class="mb-4"><?= ucfirst($form); ?> Room</h1>
    <div class="card border p-4 mb-4">
        <?php echo validation_errors(); ?>
        <form action="<?= base_url('backend/rooms/' . $form . '/') . $room['room_id']; ?>" method="POST">
            <div class="mb-3">
                <label for="RoomName" class="form-label fw-bold">Room Name</label>
                <input type="text" onchange="fieldonchange();" class="form-control" id="RoomName" name="RoomName" placeholder="Room Name" value="<?= $room['room_name']; ?>">
            </div>
            <div class="mb-3">
                <label for="RoomSlug" class="form-label fw-bold">Slug</label>
                <input type="text" onchange="fieldonchange();" class="form-control" id="RoomSlug" name="RoomSlug" placeholder="room-slug" value="<?= $room['room_slug']; ?>">
            </div>
            <label for="RoomImage" class="form-label fw-bold">Thumbnail</label>
            <?php if ($room['room_img']) { ?><figure><img src="<?= base_url() . 'assets/rooms/' . $room['room_img']; ?>" class="bg-dark img-fluid rounded" width="250"></figure><?php } ?>
            <div class="input-group mb-3">
                <button id="upload" type="button" class="btn btn-outline-success"><i class="fa-solid fa-cloud-arrow-up"></i> Open Uploader</button>

                <input type="text" onchange="fieldonchange();" class="form-control" id="RoomImage" name="RoomImage" placeholder="filename-thumbnail-room.webp" value="<?= $room['room_img']; ?>">
            </div>
            <div class="mb-3">
                <label for="RoomStatus" class="form-label fw-bold">Status</label>
                <select class="form-select" onchange="fieldonchange();" id="RoomStatus" name="RoomStatus">
                    <option value="0" <?php if ($room['room_status'] == 0) {
                                            echo 'selected';
                                        } ?>>OFF</option>
                    <option value="1" <?php if ($room['room_status'] == 1) {
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
                        <?php if ($form == 'edit') { ?><a href="<?= base_url('backend/rooms/trash/') . $room['room_id']; ?>" class="btn btn-outline-danger">Delete</a> <?php } ?>
                    </div>
                </div>

            </div>
        </form>
    </div>

    <script src="https://www.jqueryscript.net/demo/MD5-Hash-String/jquery.md5.min.js"></script>
    <script>
        var mergelama = $('#RoomName').val() + "_" + $('#RoomSlug').val() + "_" + $('#RoomImage').val() + "_" + $('#RoomStatus').val();
        const hashlama = $.MD5(mergelama);
        var mergebaru = mergelama;
        var hashbaru = hashlama;

        function fieldonchange() {
            mergebaru = $('#RoomName').val() + "_" + $('#RoomSlug').val() + "_" + $('#RoomImage').val() + "_" + $('#RoomStatus').val();
            hashbaru = $.MD5(mergebaru);
            if (hashlama != hashbaru) {
                $('#submit').removeClass('disabled');
            } else {
                $('#submit').addClass('disabled');
            }
        }
    </script>

    <script>
        function foo(x) {
            var filename = x.document.getElementById("filename").textContent;
            console.log(filename);
            $('#RoomImage').val(filename);
            $('#RoomImage').trigger("change");
        }

        $('#upload').click(function() {
            var popup = window.open('<?= base_url('backend/filemanager/stores/'); ?>', '_blank', 'width=500,height=200');
            var getvalimage = setInterval(function() {
                foo(popup);
            }, 2000);
        });
    </script>
</div>