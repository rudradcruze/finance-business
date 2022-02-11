<?php
    require_once 'is_admin.php';
    $_SESSION['title'] = "Profile";
    require_once '../db.php';

    $black_heading = $_POST['black_heading'];
    $green_heading = $_POST['green_heading'];
    $service_sub_head = $_POST['service_sub_head'];

    $_SESSION['black_heading_fill'] = $black_heading;
    $_SESSION['green_heading_fill'] = $green_heading;
    $_SESSION['service_sub_head_fill'] = $service_sub_head;

    $_SESSION['error_check'] = 1;

    $black_heading = filter_var($black_heading, FILTER_SANITIZE_STRING);
    $green_heading = filter_var($green_heading, FILTER_SANITIZE_STRING);
    $service_sub_head = filter_var($service_sub_head, FILTER_SANITIZE_STRING);

    if ($black_heading == null) {
        $_SESSION['error_check'] = 0;
        $_SESSION['service_null'] = "Fields cannot be empty";
        $_SESSION['black_null_error'] = "is-invalid";
        header('location: service_head.php');
        
    }else {
        if($green_heading == null){
            $_SESSION['error_check'] = 0;
            $_SESSION['service_null'] = "Fields cannot be empty";
            $_SESSION['green_null_error'] = "is-invalid";
            header('location: service_head.php');
        }else {
            if($service_sub_head == null){
                $_SESSION['error_check'] = 0;
                $_SESSION['service_null'] = "Fields cannot be empty";
                $_SESSION['sub_head_null_error'] = "is-invalid";
                header('location: service_head.php');
            }else {
                $insert_query = "INSERT INTO service_heads (black_head, green_head, service_sub_head) VALUES ('$black_heading', '$green_heading', '$service_sub_head')";

                mysqli_query(db_connect(), $insert_query);
                $_SESSION['service_heading_success'] = "Service Head Successfully added";
                header('location: service_head.php');
            }
        }
    }
    
?>