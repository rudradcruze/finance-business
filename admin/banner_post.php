<?php 

    session_start();
    require_once 'is_admin.php';
    require_once '../db.php';
    
    $banner_sub_title = filter_var($_POST['banner_sub_title'], FILTER_SANITIZE_STRING);
    $banner_title = filter_var($_POST['banner_title'], FILTER_SANITIZE_STRING);
    $banner_detail = filter_var($_POST['banner_detail'], FILTER_SANITIZE_STRING);
    
    $_SESSION['banner_sub_title_autofill'] = $banner_sub_title;
    $_SESSION['banner_title_autofill'] = $banner_title;
    $_SESSION['banner_detail_autofill'] = $banner_detail;

    $validate_sub_title_char_lw = preg_match('@[a-z]@', $banner_sub_title);
    $validate_sub_title_char_cap = preg_match('@[A-Z]@', $banner_sub_title);
    $validate_banner_title_char_lw = preg_match('@[a-z]@', $banner_title);
    $validate_banner_title_char_cap = preg_match('@[A-Z]@', $banner_title);
    $validate_banner_detail_char_lw = preg_match('@[a-z]@', $banner_detail);
    $validate_banner_detail_char_cap = preg_match('@[A-Z]@', $banner_detail);

    $_SESSION['send_value'] = 2;

    if ($banner_sub_title == null || $banner_sub_title == "" || $banner_sub_title == " " || ($validate_sub_title_char_lw != 1 || $validate_sub_title_char_cap != 1)) {
        $_SESSION['send_value'] = 0;
        $_SESSION['banner_sub_title'] = "is-invalid";
        header('location: banner.php');
    }else {
        // Check Banner Title
        if ($banner_title == null || ($validate_banner_title_char_lw != 1 || $validate_banner_title_char_cap != 1)) {
            $_SESSION['send_value'] = 0;
            $_SESSION['banner_title'] = "is-invalid";
            header('location: banner.php');
        }else {
            if ($banner_detail == null || ($validate_banner_detail_char_lw != 1 || $validate_banner_detail_char_cap != 1)) {
                $_SESSION['send_value'] = 0;
                $_SESSION['banner_detail'] = "is-invalid";
                header('location: banner.php');
            }else {
                if(!isset($_FILES['banner_image']) || $_FILES['banner_image']['error'] == UPLOAD_ERR_NO_FILE) {
                    $_SESSION['send_value'] = 0;
                    $_SESSION['banner_image'] = "is-invalid";
                    header('location: banner.php');
                }else {
                    
                    $upload_image_original_name = $_FILES['banner_image']['name'];
                    $upload_image_size = $_FILES['banner_image']['size'];
                    
                    if ($upload_image_size <= 2000000) {
                        $after_explode = explode('.', $upload_image_original_name);
                        $image_extension = end($after_explode);
                        $allow_extension = array('jpg', 'JPG', 'jpeg', 'JPEG', 'png', 'PNG', 'gif', 'GIF');
                        if (in_array($image_extension, $allow_extension)) {
                            $insert_query = "INSERT INTO banners (banner_sub_title, banner_title, banner_sub_detail, image_location) VALUES ('$banner_sub_title', '$banner_title', '$banner_detail', 'Primary Location')";

                            mysqli_query($db_connect, $insert_query);

                            $id_form_db = mysqli_insert_id($db_connect);

                            $image_new_name = $id_form_db . '.' . $image_extension;

                            $save_location = "../uploads/banner/banner." . $image_new_name;

                            move_uploaded_file($_FILES['banner_image']['tmp_name'], $save_location);
                            echo "Done";
                        }else {
                            $_SESSION['send_value'] = 0;
                            $_SESSION['banner_image'] = "is-invalid";
                            $_SESSION['banner_image_file_err'] = "Your image file format must be jpg, jpeg, png, gif";
                            header('location: banner.php');
                        }
                    }else {
                        $_SESSION['send_value'] = 0;
                        $_SESSION['banner_image'] = "is-invalid";
                        $_SESSION['banner_image_big'] = "Your image to big! more then 2.0mb";
                        header('location: banner.php');
                    }
                    
                }
            }
        }
    }
?>