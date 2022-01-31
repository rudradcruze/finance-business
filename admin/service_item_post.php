<?php
    require_once 'is_admin.php';
    require_once '../db.php';

    $service_item_head = filter_var($_POST['service_item_head'], FILTER_SANITIZE_STRING);
    $service_item_detail = filter_var($_POST['service_item_detail'], FILTER_SANITIZE_STRING);

    $_SESSION['service_item_head_autofill'] = $service_item_head;
    $_SESSION['service_item_detail_autofill'] = $service_item_detail;

    $_SESSION['err_service'] = 2;

    if ($service_item_head == null) {
        $_SESSION['err_service'] = 0;
        $_SESSION['service_item_head'] = "is-invalid";
        header('location: service_item.php');
    }else {
        // Check Banner Title
        if ($service_item_detail == null) {
            $_SESSION['err_service'] = 0;
            $_SESSION['service_item_detail'] = "is-invalid";
            header('location: service_item.php');
        }else {
            if(!isset($_FILES['service_item_image']) || $_FILES['service_item_image']['error'] == UPLOAD_ERR_NO_FILE) {
                $_SESSION['err_service'] = 0;
                $_SESSION['service_item_image'] = "is-invalid";
                header('location: service_item.php');
            }else {
                
                $upload_image_original_name = $_FILES['service_item_image']['name'];
                $upload_image_size = $_FILES['service_item_image']['size'];
                
                if ($upload_image_size <= 2000000) {
                    $after_explode = explode('.', $upload_image_original_name);
                    $image_extension = end($after_explode);
                    $allow_extension = array('jpg', 'JPG', 'jpeg', 'JPEG', 'png', 'PNG', 'gif', 'GIF');
                    if (in_array($image_extension, $allow_extension)) {
                        $insert_query = "INSERT INTO service_items (service_item_head, service_item_detail, image_location) VALUES ('$service_item_head', '$service_item_detail', 'Primary Location')";

                        mysqli_query($db_connect, $insert_query);

                        $id_form_db = mysqli_insert_id($db_connect);

                        $image_new_name = $id_form_db . '.' . $image_extension;

                        $save_location = "../uploads/service/service." . $image_new_name;

                        move_uploaded_file($_FILES['service_item_image']['tmp_name'], $save_location);
                        
                        $image_location = "uploads/service/service." . $image_new_name;

                        // Image Update location query
                        $update_query = "UPDATE service_items SET image_location='$image_location' WHERE id='$id_form_db'";

                        mysqli_query($db_connect, $update_query);

                        $_SESSION['service_heading_success'] = "Service Item Successfully Created!";
                        header('location: service_item.php');
                    }else {
                        $_SESSION['err_service'] = 0;
                        $_SESSION['service_item_image'] = "is-invalid";
                        $_SESSION['service_item_image_file_err'] = "Your image file format must be jpg, jpeg, png, gif";
                        header('location: service_item.php');
                    }
                }else {
                    $_SESSION['err_service'] = 0;
                    $_SESSION['service_item_image'] = "is-invalid";
                    $_SESSION['service_item_image_big'] = "Your image to big! more then 2.0mb";
                    header('location: service_item.php');
                }
                
            }
            
        }
    }
?>