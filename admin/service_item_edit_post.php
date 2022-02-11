<?php
    require_once 'is_admin.php';
    require_once '../db.php';

    $service_item_head = filter_var($_POST['service_item_head'], FILTER_SANITIZE_STRING);
    $service_item_detail = filter_var($_POST['service_item_detail'], FILTER_SANITIZE_STRING);
    $item_id = $_POST['item_id'];

    $flag = true;

    if(!$service_item_head) {
        $flag = false;
        $_SESSION['service_item_head_null'] = "Service item head cannot be empty";
    }

    if(!$service_item_detail) {
        $flag = false;
        $_SESSION['service_item_detail_null'] = "Service item detail cannot be empty";
    }

    if($flag){
        $update_details_query = "UPDATE service_items SET service_item_head = '$service_item_head', service_item_detail = '$service_item_detail' WHERE id = $item_id";
        mysqli_query(db_connect(), $update_details_query);
        // header('location: service_item.php');

        if($_FILES['service_image']['name']) {
            $upload_image_original_name = $_FILES['service_image']['name'];
            $upload_image_size = $_FILES['service_image']['size'];

            if($upload_image_size > 2000000){
                $flag = false;
                $_SESSION['service_edit_img_big'] = "Image Size Must be 2.00mb or less";
            }

            $after_explode = explode('.', $upload_image_original_name);
            $image_extension = end($after_explode);
            $allow_extension = array('jpg', 'JPG', 'jpeg', 'JPEG', 'png', 'PNG', 'gif', 'GIF');

            if(!in_array($image_extension, $allow_extension)){
                $flag = false;
                $_SESSION['service_edit_img_extension'] = "Image extension must be jpg, jpeg, png, gif";
            }

            if($flag) {

                $get_location_query = "SELECT image_location FROM service_items WHERE id='$item_id'";

                $image_location_from_db = mysqli_query(db_connect(), $get_location_query);
                $after_assoc_image_location = mysqli_fetch_assoc($image_location_from_db);

                unlink("../" . $after_assoc_image_location['image_location']);

                $image_new_name = $item_id . '.' . $image_extension;

                $save_location = "../uploads/service/service." . $image_new_name;

                move_uploaded_file($_FILES['service_image']['tmp_name'], $save_location);
                
                $image_location = "uploads/service/service." . $image_new_name;

                // Image Update location query
                $update_image_query = "UPDATE service_items SET image_location='$image_location' WHERE id='$item_id'";

                mysqli_query(db_connect(), $update_image_query);
                header('location: service_item.php');
            }else {
                header('location: service_item_edit.php?item_id='. $item_id);
            }
        }

    }else {
        header('location: service_item_edit.php?item_id='. $item_id);
    }
?>