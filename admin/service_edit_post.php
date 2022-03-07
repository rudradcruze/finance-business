<?php
    require_once 'is_admin.php';
    $_SESSION['title'] = "Service Head Edit Post";
    require_once '../db.php';


    $black_heading = filter_var($_POST['black_heading'], FILTER_SANITIZE_STRING);
    $green_heading = filter_var($_POST['green_heading'], FILTER_SANITIZE_STRING);
    $service_sub_head = filter_var($_POST['service_sub_head'], FILTER_SANITIZE_STRING);
    $service_head_id = $_POST['service_head_id'];

    $flag = true;

    if($black_heading == NULL){
        $flag = false;
        $_SESSION['black_heading_err'] = "is-invalid";
    }

    if($green_heading == NULL){
        $flag = false;
        $_SESSION['green_heading_err'] = "is-invalid";
    }

    if($service_sub_head == NULL){
        $flag = false;
        $_SESSION['service_sub_head_err'] = "is-invalid";
    }

    if($flag != true){
        header('location: service_edit.php?service_head_id=' . $service_head_id);
    }else {
        $update_query = "UPDATE service_heads SET black_head='$black_heading', green_head='$green_heading', service_sub_head='$service_sub_head' WHERE id = '$service_head_id'";
        mysqli_query(db_connect(), $update_query);
        header('location: service_head.php');
    }
?>