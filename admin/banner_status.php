<?php 
    require_once 'is_admin.php';
    require_once '../db.php';

    $banner_id = $_GET['banner_id'];
    $active_status = $_GET['active_status'];

    if ($active_status == 1) {
        $_SESSION['banner_activated'] = "Banner Activated";
    }else {
        $_SESSION['banner_deactivated'] = "Banner De-Activated";
    }

    $update_message_query = "UPDATE banners SET read_status='$active_status' WHERE id='$banner_id'";
    mysqli_query($db_connect, $update_message_query);
    header('location: banner.php');
?>