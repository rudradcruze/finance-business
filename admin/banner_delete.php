<?php
    
    require_once 'is_admin.php';
    require_once '../db.php';

    $banner_id = $_GET['banner_id'];

    $get_banner_location_query = "SELECT image_location FROM banners WHERE id='$banner_id'";
    $db_result = mysqli_query(db_connect(), $get_banner_location_query);
    $after_assoc = mysqli_fetch_assoc($db_result);

    unlink("../" . $after_assoc['image_location']);

    $delete_query = "DELETE FROM banners WHERE id='$banner_id'";
    mysqli_query(db_connect(), $delete_query);
    
    $_SESSION['banner_delete_message'] = "Banner Delete Successful";
    header('location: banner.php');
?>