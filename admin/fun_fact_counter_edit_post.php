<?php
    require_once 'is_admin.php';
    require_once '../db.php';

    $fun_fact_id = $_POST['fun_fact_id'];
    $count_value = $_POST['count_value'];
    $count_head = $_POST['count_head'];

    $flag = true;

    if ($fun_fact_id) {
        if (!$count_value) {
            $flag = false;
            $_SESSION['count_value_null'] = "Count value cannot be empty";
            $_SESSION['count_v_empty'] = "is-invalid";
        }
    
        if (!$count_head) {
            $flag = false;
            $_SESSION['count_head_null'] = "Count value cannot be empty";
            $_SESSION['count_head_empty'] = "is-invalid";
        }

        if ($flag) {
            $update_counter_query = "UPDATE fun_fact_counters SET count_value = '$count_value', count_head = '$count_head' WHERE id = $fun_fact_id";
            mysqli_query($db_connect, $update_counter_query);
            $_SESSION['counter_updated'] = "Counter updated";
            header('location: fun_fact_counter.php');
        }else {
            header('location: fun_fact_counter_edit.php?fun_fact_id=' . $fun_fact_id);
        }
    }
?>