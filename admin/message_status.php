<?php

    require_once 'is_admin.php';
    require_once '../db.php';

    $message_id = $_GET['message_id'];
    $read_status = $_GET['read_status'];

    if ($read_status == 1) {
        $read_status = 0;
    }else {
        $read_status = 1;
    }

    $update_message_query = "UPDATE guest_messages SET read_status='$read_status' WHERE id='$message_id'";
    mysqli_query($db_connect, $update_message_query);
    header('location: guest_message.php');

?>