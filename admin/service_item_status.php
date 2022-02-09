<?php
    require_once 'is_admin.php';
    require_once '../db.php';

    $item_id = $_GET['item_id'];
    $status = $_GET['status'];

    if($status == 1) {
        $status_query = "UPDATE service_items SET active_status = $status WHERE id = $item_id";
        $_SESSION['service_item_activated'] = "Service item activated";
    }elseif($status == 0) {
        $status_query = "UPDATE service_items SET active_status = $status WHERE id = $item_id";
        $_SESSION['service_item_deactivated'] = "Service item de-activated";
    }else {
        $status_query = "DELETE FROM service_items WHERE id = $item_id";
        $_SESSION['service_item_deleted'] = "Service item deleted";
    }

    mysqli_query($db_connect, $status_query);
    header('location: service_item.php');
?>