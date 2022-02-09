<?php
    require_once 'is_admin.php';
    require_once '../db.php';

    $banner_sub_title = $_POST['banner_sub_title'];
    $banner_title = $_POST['banner_title'];
    $banner_detail = $_POST['banner_detail'];
    $banner_id = $_POST['banner_id'];
    
    $error_catch = 0;

    $update_details_query = "UPDATE banners SET banner_sub_title='$banner_sub_title', banner_title='$banner_title', banner_detail='$banner_detail' WHERE id='$banner_id'";
    mysqli_query(db_connect(), $update_details_query);

    if ($_FILES['banner_image']['name']) {

        $upload_image_original_name = $_FILES['banner_image']['name'];
        $upload_image_size = $_FILES['banner_image']['size'];

        if ($upload_image_size <= 2000000) {
            $after_explode = explode('.', $upload_image_original_name);
            $image_extension = end($after_explode);
            $allow_extension = array('jpg', 'JPG', 'jpeg', 'JPEG', 'png', 'PNG', 'gif', 'GIF');
            if (in_array($image_extension, $allow_extension)) {

                $get_location_query = "SELECT image_location FROM banners WHERE id='$banner_id'";

                $image_location_from_db = mysqli_query(db_connect(), $get_location_query);
                $after_assoc_image_location = mysqli_fetch_assoc($image_location_from_db);

                unlink("../" . $after_assoc_image_location['image_location']);

                $image_new_name = $banner_id . '.' . $image_extension;

                $save_location = "../uploads/banner/banner." . $image_new_name;

                move_uploaded_file($_FILES['banner_image']['tmp_name'], $save_location);
                
                $image_location = "uploads/banner/banner." . $image_new_name;

                // Image Update location query
                $update_image_query = "UPDATE banners SET image_location='$image_location' WHERE id='$banner_id'";

                mysqli_query(db_connect(), $update_image_query);
                $error_catch = 0;
            }else {
                $_SESSION['banner_edit_image_file_err'] = "Your image file format must be jpg, jpeg, png, gif";
                $error_catch = 1;
                // header('location: banner_edit.php?banner_id=' . $banner_id);
                header('location: banner_edit.php?banner_id=' . $banner_id);
            }
        }else {
            $_SESSION['banner_edit_image_big'] = "Your image to big! more then 2.0mb";
            $error_catch = 1;
            // header('location: banner_edit.php?banner_id=' . $banner_id);
            header('location: banner_edit.php?banner_id=' . $banner_id);
        }
    }

    if ($error_catch == 0) {
        $_SESSION['banner_edit_success'] = "Banner successfully edit";
        header('location: banner.php');
    }
?>