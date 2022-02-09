<?php
    require_once 'is_admin.php';
    require_once '../db.php';

    if($_POST['delete_marked']) {
        foreach($_POST['delete_marked'] as $id => $value) {
            $delete_query = "DELETE FROM guest_messages WHERE id = $id";
            mysqli_query(db_connect(), $delete_query);
        }
        $_SESSION['delete'] = "Mark Messages Delete Successfully";
        header('location: guest_message.php');
    }else {
        header('location: guest_message.php');
    }
?>