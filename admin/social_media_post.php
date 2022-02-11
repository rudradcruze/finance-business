<?php
    require_once 'is_admin.php';
    require_once '../db.php';

    $media_url = filter_var($_POST['media_url'], FILTER_SANITIZE_URL);
    $media_icon = filter_var($_POST['media_icon'], FILTER_SANITIZE_STRING);

    $flag = true;

    if(!$media_url) {
        $flag = false;
        $_SESSION['media_url_null'] = "Media url cannot be empty";
    }

    if(!$media_icon) {
        $flag = false;
        $_SESSION['media_icon_null'] = "Icon cannot be empty";
    }

    if(!$flag) {
        header('location: social_media.php');
    }else {
        $insert_query = "INSERT INTO social_medias (media_url, media_icon) VALUES ('$media_url', '$media_icon')";
        mysqli_query(db_connect(), $insert_query);
        $_SESSION['social_media_added'] = "Social Media Added";
        header('location: social_media.php');
    }
?>