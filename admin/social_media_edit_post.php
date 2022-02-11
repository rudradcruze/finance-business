<?php
    require_once 'is_admin.php';
    require_once '../db.php';

    $media_id = $_POST['media_id'];
    echo $media_edit_url = filter_var($_POST['media_edit_url'], FILTER_SANITIZE_URL);
    echo $media_edit_icon = filter_var($_POST['media_edit_icon'], FILTER_SANITIZE_STRING);

    $flag = true;

    if(!$media_edit_url) {
        $flag = false;
        $_SESSION['media_edit_url_null'] = "Media url cannot be null";
    }

    if(!$media_edit_icon) {
        $flag = false;
        $_SESSION['media_edit_icon_null'] = "Icon cannot be empty";
    }


    if(!$flag) {
        header('location: social_media_edit.php?media_id=' . $media_id);
    }else {
        echo $update_query = "UPDATE social_medias SET media_url = '$media_edit_url', media_icon = '$media_edit_icon' WHERE id = $media_id";
        mysqli_query(db_connect(), $update_query);
        $_SESSION['media_edit_success'] = "Media edit success";
        header('location: social_media.php');
    }
?>