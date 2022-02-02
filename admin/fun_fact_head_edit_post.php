<?php
    require_once 'is_admin.php';
    require_once '../db.php';

    $sub_head = $_POST['sub_head'];
    $white_head = $_POST['white_head'];
    $green_head = $_POST['green_head'];
    $paragraph_one = $_POST['paragraph_one'];
    $paragraph_two = $_POST['paragraph_two'];
    $fun_fact_id = $_POST['fun_fact_id'];
    
    $error_catch = true;

    if(!$sub_head){
        $error_catch = false;
        $_SESSION['sub_head_null'] = "Sub head cannot be empty";
        $_SESSION['sub_head_err'] = "is-invalid";
    }

    if(!$white_head){
        $error_catch = false;
        $_SESSION['white_head_null'] = "White head cannot be empty";
        $_SESSION['white_head_err'] = "is-invalid";
    }

    if(!$green_head){
        $error_catch = false;
        $_SESSION['green_head_null'] = "Green head cannot be empty";
        $_SESSION['green_head_err'] = "is-invalid";
    }

    if(!$paragraph_one){
        $error_catch = false;
        $_SESSION['paragraph_one_null'] = "Paragraph one cannot be empty";
        $_SESSION['paragraph_one_err'] = "is-invalid";
    }

    if(!$paragraph_two){
        $error_catch = false;
        $_SESSION['paragraph_two_null'] = "Paragraph two cannot be empty";
        $_SESSION['paragraph_two_err'] = "is-invalid";
    }

    if(!$error_catch){
        header('location: fun_fact_head_edit.php?fun_fact_id=' . $fun_fact_id);
    }else {
        $error_catch = true;
        $update_details_query = "UPDATE fun_facts SET sub_head='$sub_head', white_head='$white_head', green_head='$green_head', paragraph_one='$paragraph_one', paragraph_two='$paragraph_two' WHERE id='$fun_fact_id'";
        mysqli_query($db_connect, $update_details_query);
    }

    if($_FILES['fun_fact_bg']['name']) {

        $image_original_name = $_FILES['fun_fact_bg']['name'];
        $image_size = $_FILES['fun_fact_bg']['size'];

        if($image_size > 2000000) {
            $error_catch = false;
            $_SESSION['fun_fact_big'] = " Your is to big! more then 2.0mb";
            $_SESSION['fun_fact_big_err'] = "is-invalid";
        }

        $after_explode = explode('.', $image_original_name);
        $image_extension = end($after_explode);
        $allow_extension = array('jpg', 'JPG', 'JPEG', 'JPEG', 'png', 'PNG', 'gif', 'GIF');
        
        if(!in_array($image_extension, $allow_extension)) {
            $error_catch = false;
            $_SESSION['fun_fact_image_ex_error'] = " Image must be jpg, jpeg, png, gif format";
            $_SESSION['fun_fact_image_ex'] = "is-invalid";
        }

        if (!$error_catch) {
            header('location: fun_fact_head_edit.php?fun_fact_id=' . $fun_fact_id);
        }else {
            
            $get_location_query = "SELECT image_location FROM fun_facts WHERE id='$fun_fact_id'";
            $image_location_from_db = mysqli_query($db_connect, $get_location_query);
            $after_assoc_image_location = mysqli_fetch_assoc($image_location_from_db);

            unlink("../" . $after_assoc_image_location['image_location']);

            $image_new_name = $fun_fact_id . '.' . $image_extension;

            $save_location = "../uploads/fun-fact/fun-fact." . $image_new_name;

            move_uploaded_file($_FILES['fun_fact_bg']['tmp_name'], $save_location);
            
            $image_location = "uploads/fun-fact/fun-fact." . $image_new_name;

            $update_image_query = "UPDATE fun_facts SET image_location='$image_location' WHERE id='$fun_fact_id'";

            mysqli_query($db_connect, $update_image_query);
            $error_catch = true;
        }
    }

    if ($error_catch) {
        $_SESSION['fun_fact_head_edit_ss'] = "Fun Fact Head Successfully Edited";
        header('location: fun_fact_head.php');
    }
?>