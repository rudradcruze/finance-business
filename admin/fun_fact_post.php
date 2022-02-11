<?php
    require_once 'is_admin.php';
    require_once '../db.php';

    $sub_head = $_POST['sub_head'];
    $white_head = $_POST['white_head'];
    $green_head = $_POST['green_head'];
    $paragraph_one = $_POST['paragraph_one'];
    $paragraph_two = $_POST['paragraph_two'];

    $sub_head = filter_var($sub_head, FILTER_SANITIZE_STRING);
    $white_head = filter_var($white_head, FILTER_SANITIZE_STRING);
    $green_head = filter_var($green_head, FILTER_SANITIZE_STRING);
    $paragraph_one = filter_var($paragraph_one, FILTER_SANITIZE_STRING);
    $paragraph_two = filter_var($paragraph_two, FILTER_SANITIZE_STRING);

    $_SESSION['sub_head_fill'] = $sub_head;
    $_SESSION['white_head_fill'] = $white_head;
    $_SESSION['green_head_fill'] = $green_head;
    $_SESSION['paragraph_one_fill'] = $paragraph_one;
    $_SESSION['paragraph_two_fill'] = $paragraph_two;

    $flag = true;

    if (!$sub_head) {
        $flag = false;
        $_SESSION['sub_null'] = "Sub head cannot be empty";
        $_SESSION['sub_head_null'] = "is-invalid";
        header('location: fun_fact_head.php');
    }
    
    if(!$white_head){
        $flag = false;
        $_SESSION['white_null'] = "White head cannot be empty";
        $_SESSION['white_head_null'] = "is-invalid";
    }

    if(!$green_head){
        $flag = false;
        $_SESSION['green_null'] = "Green cannot be empty";
        $_SESSION['green_head_null'] = "is-invalid";
    }

    if (!$paragraph_one) {
        $flag = false;
        $_SESSION['para_one_null'] = "Paragraph one cannot be empty";
        $_SESSION['paragraph_one_null'] = "is-invalid";
    }

    if (!$paragraph_two) {
        $flag = false;
        $_SESSION['para_two_null'] = "Paragraph two cannot be empty";
        $_SESSION['paragraph_two_null'] = "is-invalid";
    }

    if (!isset($_FILES['fun_fact_bg_image']) || $_FILES['fun_fact_bg_image']['error'] == UPLOAD_ERR_NO_FILE) {
        $flag = false;
        $_SESSION['fun_fact_image_null'] = "Image cannot be empty";
        $_SESSION['fun_fact_bg_image_null'] = "is-invalid";
    }

    $upload_image_size = $_FILES['fun_fact_bg_image']['size'];

    if ($upload_image_size > 2000000) {
        $flag = false;
        $_SESSION['fun_fact_image_big'] = "Image must be 2.0mb or less.";
        $_SESSION['fun_fact_bg_image_big'] = "is-invalid";
    }
    
    if($flag){

        $upload_image_original_name = $_FILES['fun_fact_bg_image']['name'];
        $after_explode = explode('.', $upload_image_original_name);
        $image_extension = end($after_explode);
        $allow_extension = array('jpg', 'JPG', 'jpeg', 'JPEG', 'png', 'PNG', 'gif', 'GIF');

        if (!in_array($image_extension, $allow_extension)) {
            $_SESSION['fun_fact_image_extension'] = "Image must be jpg, jpeg, png, gif, gif";
            $_SESSION['fun_fact_bg_image_extension'] = "is-invalid";
        }else{
            $insert_query = "INSERT INTO fun_facts (sub_head, white_head, green_head, paragraph_one, paragraph_two, image_location) VALUES ('$sub_head', '$white_head', '$green_head', '$paragraph_one', '$paragraph_two', 'Primary Location')";

            mysqli_query(db_connect(), $insert_query);

            $get_image_id = mysqli_insert_id(db_connect());
            $image_new_name = $get_image_id . '.' . $image_extension;
            
            $save_location = "../uploads/fun-fact/fun-fact." . $image_new_name;
            move_uploaded_file($_FILES['fun_fact_bg_image']['tmp_name'], $save_location);
            $image_location = "uploads/fun-fact/fun-fact." . $image_new_name;

            $update_image_location_query = "UPDATE fun_facts SET image_location = '$image_location' WHERE id = $get_image_id";
            mysqli_query(db_connect(), $update_image_location_query);
            $_SESSION['fun_fact_head_success'] = "Fun Fact Head Successfully Added";

            // Unset All fill values
            unset($_SESSION['sub_head_fill']);
            unset($_SESSION['white_head_fill']);
            unset($_SESSION['green_head_fill']);
            unset($_SESSION['green_head_fill']);
            unset($_SESSION['paragraph_one_fill']);
            unset($_SESSION['paragraph_two_fill']);

            header('location: fun_fact_head.php');
        }
    }else {
        header('location: fun_fact_head.php');
    }
    
?>