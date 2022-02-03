<?php
    require_once 'is_admin.php';
    require_once '../db.php';

    $fun_fact_id = $_GET['fun_fact_id'];
    $status = $_GET['status'];

    if ($status == 2) {
        $get_image_location_query = "SELECT image_location FROM fun_facts WHERE id = $fun_fact_id";
        $image_location_from_db = mysqli_query($db_connect, $get_image_location_query);
        $after_assoc = mysqli_fetch_assoc($image_location_from_db);

        unlink('../' . $after_assoc['image_location']);

        $delete_query = "DELETE FROM fun_facts WHERE id = $fun_fact_id";
        mysqli_query($db_connect, $delete_query);

        $_SESSION['fun_fact_head_delete'] = "Fun Fact Deleted";
        header('location: fun_fact_head.php');
    }else {
        $update_status_query = "UPDATE fun_facts SET active_status = 0 WHERE id != $fun_fact_id";
        $update_active_status_query = "UPDATE fun_facts SET active_status = 1 WHERE id = $fun_fact_id";
        mysqli_query($db_connect, $update_status_query);
        mysqli_query($db_connect, $update_active_status_query);
        $_SESSION['fun_fact_activated'] = "Fun Fact Head Activated";
        header('location: fun_fact_head.php');
    }
    
?>