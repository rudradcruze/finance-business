<?php

    require_once 'is_admin.php';
    require_once '../db.php';

    $fun_fact_id = $_GET['fun_fact_id'];
    $status = $_GET['status'];


    if($status == 1) {
        $update_delete_query = "UPDATE fun_fact_counters SET active_status = $status WHERE id = $fun_fact_id";
        $_SESSION['counter_activated'] = "Counter activated";
    }elseif($status == 0){
        $update_delete_query = "UPDATE fun_fact_counters SET active_status = $status WHERE id = $fun_fact_id";
        $_SESSION['counter_de_activated'] = "Counter de-activated";
    }else {
        $update_delete_query = "DELETE FROM fun_fact_counters WHERE id = $fun_fact_id";
        $_SESSION['counter_deleted'] = "Counter deleted";
    }

    mysqli_query(db_connect(), $update_delete_query);
    header('location: fun_fact_counter.php');
?>