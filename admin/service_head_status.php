<?php

    require_once 'is_admin.php';
    require_once '../db.php';

    $service_head_id = $_GET['service_head_id'];
    $status = $_GET['status'];

    if ($status == 1) {
        $_SESSION['service_head_activated'] = "Service Head Activated";
    }else {
        $_SESSION['service_head_deactivated'] = "Service Head De-Activated";
    }

    $update_service_head_query = "UPDATE service_heads SET active_status = 0";

    mysqli_query(db_connect(), $update_service_head_query);

    $update_service_head_query = "UPDATE service_heads SET active_status='$status' WHERE id='$service_head_id'";

    mysqli_query(db_connect(), $update_service_head_query);
    
    header('location: service_head.php');
?>