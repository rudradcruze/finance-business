<?php 
    require_once 'is_admin.php';
    
    require_once '../db.php';

    $_SESSION['guest_name'] = $_POST['guest_name'];
    $_SESSION['guest_email'] = $_POST['guest_email'];
    $_SESSION['guest_message'] = $_POST['guest_message'];

    $guest_name = filter_var($_POST['guest_name'], FILTER_SANITIZE_STRING);
    $guest_name = strtoupper($guest_name);
    $guest_email = filter_var($_POST['guest_email'], FILTER_SANITIZE_EMAIL);
    $guest_message = filter_var($_POST['guest_message'], FILTER_SANITIZE_STRING);
    
    $pattern = '/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/';
    $_SESSION['send_value'] = 2;

    $insert_query = "INSERT INTO guest_messages (guest_name, guest_email, guest_message) VALUES ('$guest_name', '$guest_email', '$guest_message')";

    if ($guest_name == null || $guest_email == null || $guest_message == null) {
        $_SESSION['guest_mes_emp'] = "Fields cannot be empty!";
        $_SESSION['send_value'] = 0;
        header('location: ../index.php#callback-form');
    }else {
        $guest_name_check = preg_match('@[A-Z]@', $guest_name);
        $guest_name_check_num = preg_match('@[0-9]@', $guest_name);
        $guest_name_check_pattern = preg_match($pattern, $guest_name);
        
        if($guest_name_check == 1 && $guest_name_check_num == 0 && $guest_name_check_pattern == 0){
            $validate_email = filter_var($guest_email, FILTER_VALIDATE_EMAIL);
            if ($validate_email) {
                mysqli_query($db_connect, $insert_query);
                $_SESSION['guest_mes_success'] = "Message send successfully.";
                header('location: ../index.php#callback-form');
            }else {
                $_SESSION['guest_mes_email'] = "Please enter a validate email.";
                $_SESSION['send_value'] = 0;
                header('location: ../index.php#callback-form');
            }
        }else {
            $_SESSION['guest_mes_name'] = "Full name must be A to Z.";
            $_SESSION['send_value'] = 0;
            header('location: ../index.php#callback-form');
        }
    }
?>