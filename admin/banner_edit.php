<?php
    require_once 'is_admin.php';
    require_once '../db.php';
    require_once '../header.php';
    require_once 'navbar.php';

    $banner_id = $_GET['banner_id'];

    $get_query = "SELECT * FROM banners WHERE id='$banner_id'";
    $banner_from_db = mysqli_query($db_connect, $get_query);
    $after_assoc = mysqli_fetch_assoc($banner_from_db);
?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card mt-4">
                    <div class="card-header">
                        <h5 class="card-title text-capitalize">Banner Edit form</h5>
                    </div>
                    <div class="card-body">
                        <form action="banner_edit_post.php" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label text-capitalize text-primary">Banner sub title</label>
                                <input type="text" name="banner_sub_title" class="form-control" value="<?= $after_assoc['banner_sub_title']?>">
                                <input type="text" name="banner_id" hidden class="form-control" value="<?= $after_assoc['id']?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-capitalize text-primary">Banner Title</label>
                                <input type="text" name="banner_title" class="form-control"value="<?= $after_assoc['banner_title']?>">
                            </div>
                            <div class="mb-4">
                                <label class="form-label text-capitalize text-primary">Banner detail</label>
                                <textarea name="banner_detail" style="resize: none;" cols="30" rows="5" class="form-control"><?= $after_assoc['banner_detail']?></textarea>
                            </div>

                            <div class="mb-3">
                                <img style="width: 150px;" src="../<?= $after_assoc['image_location']?>" alt="Image">
                            </div>

                            <div class="mb-3">
                                <label class="form-label text-capitalize text-primary">banner image</label>
                                <input type="file" class="form-control" name="banner_image">
                            </div>
                            <div class="mb-1">
                                <button type="submit" class="form-control btn btn-primary">Add Banner</button>
                            </div>
                            <div class="mb-3">
                                <button type="reset" class="form-control btn btn-warning">Rest Fields</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php 
    require_once '../footer.php';
?>