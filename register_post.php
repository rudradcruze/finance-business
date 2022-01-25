<?php

session_start();

// Database Information
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "finance_business";

$db_connect = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (isset($_POST['submit'])) {

    $fullName = filter_var($_POST['fullName'], FILTER_SANITIZE_STRING);
    $fullName = strtoupper($fullName);
    $userName = $_POST['userName'];
    $userName = strtolower($userName);
    $numberNumber = $_POST['numberNumber'];
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];



    // Password Validation
    $password_cap = preg_match('@[A-Z]@', $password);
    $password_low = preg_match('@[a-z]@', $password);
    $password_num = preg_match('@[0-9]@', $password);
    $pattern = '/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/';
    $password_char = preg_match($pattern, $password);

    $validate_email = filter_var($email, FILTER_VALIDATE_EMAIL);

    if ($fullName != null && $userName != null && $numberNumber != null && $email != null && $password != null) {
        $full_name_check = preg_match('@[A-Z]@', $fullName);
        $full_name_check_num = preg_match('@[0-9]@', $fullName);
        $full_name_check_pattern = preg_match($pattern, $fullName);
        if($full_name_check == 1 && $full_name_check_num == 0 && $full_name_check_pattern == 0){
            $username_check = preg_match('@[a-z]@', $userName);
            if ($username_check == 1) {
                $number_number_match = preg_match('@[0-9]@', $numberNumber);
            if (strlen($numberNumber) == 11 && $number_number_match == 1 && $numberNumber[0] == 0 && $numberNumber[1] == 1) {
                if ($validate_email) {
                    if (strlen($password) > 5 && $password_cap == 1 && $password_low == 1 && $password_num == 1 && $password_char == 1) {
                        $encrypted_password = md5($password);
                        //  Insert query
                        $checking_Query = "SELECT COUNT(*) AS check_user FROM users WHERE email = '$validate_email'";
                        $checking_db_result = mysqli_query($db_connect, $checking_Query);
        
                        $checking_fetch_result = mysqli_fetch_assoc($checking_db_result);
        
                        if ($checking_fetch_result['check_user'] == 0) {
                            //  Insert query
                            $insert_query = "INSERT INTO users (f_name, u_name, mobile, email, password) VALUES ('$fullName', '$userName', '$numberNumber', '$email', '$encrypted_password')";
        
                            mysqli_query($db_connect, $insert_query);
                            $_SESSION['suss_msg'] = "Congratulation! You Successfully Registered.";
                            header('location: register.php');
                        } else {
                            $_SESSION['err_msg'] = "The user is already excised. You can't register";
                            header('location: register.php');
                        }
                    } else {
                        $_SESSION['pass_msg'] = "6 character long, 1 uppercase, 1 lowercase, 1 number & 1 special character";
                        header('location: register.php');
                    }
                } else {
                    $_SESSION['email_msg'] = "Invalid Email. Please input a valid email.";
                    header('location: register.php');
                }
            }else {
                $_SESSION['number_msg'] = "Your number must be number & 11 character long";
                header('location: register.php');
                }
            }else {
                $_SESSION['user_name_msg'] = "Username must be a to z.";
            }
        }else {
            $_SESSION['full_name_msg'] = "Full name must be A to Z.";
            header('location: register.php');
        }
    } else {
        $_SESSION['empty_msg'] = "Full Name, Username, Mobile Number, Email, Password cannot be empty! -_-";
        header('location: register.php');
    }
}
