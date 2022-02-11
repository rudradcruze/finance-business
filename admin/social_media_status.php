<?php
    require_once 'is_admin.php';
    require_once '../db.php';

    $media_id = $_GET['media_id'];
    $status = $_GET['status'];

    if($status == 1) {
        $_SESSION['social_media_activate'] = "Media Activated";
        $update_query = "UPDATE social_medias SET active_status = 1 WHERE id = $media_id";
    }elseif($status == 0) {
        $_SESSION['social_media_deactivate'] = "Media De-Activated";
        $update_query = "UPDATE social_medias SET active_status = 0 WHERE id = $media_id";
    }else {
        $_SESSION['social_media_delete'] = "Media Deleted";
        $update_query = "DELETE FROM social_medias WHERE id = $media_id";
    }

    mysqli_query(db_connect(), $update_query);
    header('location: social_media.php');
?>