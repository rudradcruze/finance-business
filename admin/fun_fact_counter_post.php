<?php
    require_once 'is_admin.php';
    require_once '../db.php';

    $count_value = filter_var($_POST['count_value'], FILTER_SANITIZE_NUMBER_INT);
    $count_head = filter_var($_POST['count_head'], FILTER_SANITIZE_STRING);

    $_SESSION['count_value_fill'] = "$count_value";
    $_SESSION['count_head_fill'] = "$count_head";

    $flag = true;

    if(!is_numeric($count_value)) {
        $flag = false;
        $_SESSION['count_value_num'] = "Count Value must be numeric";
        $_SESSION['count_value_num_err'] = "is-invalid";
    }

    if(!$count_value) {
        $flag = false;
        $_SESSION['count_value_null'] = "Count Value Cannot be empty";
        $_SESSION['count_value_err'] = "is-invalid";
    }

    if(!$count_head) {
        $flag = false;
        $_SESSION['count_head_null'] = "Count Head Cannot be empty";
        $_SESSION['count_head_err'] = "is-invalid";
    }

    if ($flag) {

        $inset_counter_query = "INSERT INTO fun_fact_counters (count_head, count_value) VALUES ('$count_head', '$count_value')";
        mysqli_query(db_connect(), $inset_counter_query);

        $_SESSION['counter_add_successful'] = "Counter Successfully Added";

        // Unset The fill values
        unset($_SESSION['count_value_fill']);
        unset($_SESSION['count_head_fill']);

        header('location: fun_fact_counter.php');
    }else {
        header('location: fun_fact_counter.php');
    }
?>