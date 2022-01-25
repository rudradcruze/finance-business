<?php
    session_start();
    require_once '../db.php';

    if (!isset($_SESSION['user_status'])) {
        header('location: login.php');
    }

    require_once '../header.php';
    require_once 'navbar.php';

    if($_POST['old_password'] == null || $_POST['old_password'] == null || $_POST['old_password'] == null) {
        $_SESSION['empty_change_pass'] = "Password Files cannot be empty! -_-";
        header('location: change_password.php');
    }else {
        $old_password = $_POST['old_password'];
        $encrypted_old_password = md5($old_password);
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['new_password'];

        // Password Validation
        $password_cap = preg_match('@[A-Z]@', $new_password);
        $password_low = preg_match('@[a-z]@', $new_password);
        $password_num = preg_match('@[0-9]@', $new_password);
        $pattern = '/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/';
        $password_char = preg_match($pattern, $new_password);

        if (strlen($new_password) > 5 && $password_cap == 1 && $password_low == 1 && $password_num == 1 && $password_char == 1) {
            if($new_password == $confirm_password) {
                $login_email = $_SESSION['email'];

                $old_match = "SELECT password FROM users WHERE email='$login_email'";
                $db_result = mysqli_query($db_connect, $old_match);
                $after_assoc = mysqli_fetch_assoc($db_result);

                $encrypted_password = md5($new_password);
                
                if($encrypted_old_password == $after_assoc['password']){
                    if ($encrypted_password != $after_assoc['password']) {
                        $update_query = "UPDATE users set password='$encrypted_password' WHERE email='$login_email'";
                        mysqli_query($db_connect, $update_query);
                        $_SESSION['success_change_pass'] = "Successfully Password Change!";
                        header('location: change_password.php');
                    }else {
                        $_SESSION['same_as_old_change_pass'] = "Previous Password and new password is same.";
                        header('location: change_password.php');
                    }
                }else {
                    $_SESSION['dontmatch_change_pass'] = "Password doesn't match. Please enter correct password.";
                    header('location: change_password.php');
               }
            }else {
                $_SESSION['same_change_pass'] = "New Password and confirm password must be same.";
                header('location: change_password.php');
            }
        }else {
            $_SESSION['pass_change_pass'] = "6 character long, 1 uppercase, 1 lowercase, 1 number & 1 special character!";
            header('location: change_password.php');
        }
    }
?>