<?php
    require_once 'is_admin.php';

    $login_email = $_SESSION['email'];
    
    $f_name = filter_var($_POST['f_name'], FILTER_SANITIZE_STRING);
    $f_name = strtoupper($f_name);
    $u_name = $_POST['u_name'];
    $u_name = strtolower($u_name);
    $mobile = $_POST['mobile'];
    
    $pattern = '/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/';

    if($f_name != null && $u_name != null && $mobile != null){
        $full_name_check = preg_match('@[A-Z]@', $f_name);
        $full_name_check_num = preg_match('@[0-9]@', $f_name);
        $full_name_check_pattern = preg_match($pattern, $f_name);
        if($full_name_check == 1 && $full_name_check_num == 0 && $full_name_check_pattern == 0){
            $username_check = preg_match('@[a-z]@', $u_name);
            if ($username_check == 1) {
                $number_number_match = preg_match('@[0-9]@', $mobile);
                if (strlen($mobile) == 11 && $number_number_match == 1 && $mobile[0] == 0 && $mobile[1] == 1) {

                    require_once '../db.php';

                    $update_query = "UPDATE users SET f_name='$f_name', u_name='$u_name', mobile='$mobile' WHERE email='$login_email'";

                    mysqli_query(db_connect(), $update_query);
                    $_SESSION['success_profile_msg'] = "Update Successful";
                    header('location: profile.php');

                }else {
                    $_SESSION['mobile_profile_msg'] = "Your number must be number & 11 character long";
                    header('location: profile_profile.php');
                }
            }else {
                $_SESSION['user_profile_msg'] = "User name must be A to Z.";
                header('location: profile_profile.php');
            }
        }else {
            $_SESSION['fname_profile_msg'] = "Full name must be A to Z.";
            header('location: profile_profile.php');
        }
    }else {
        $_SESSION['empty_profile_msg'] = "Full Name, Username, Mobile cannot be empty! -_-";
        header('location: profile_edit.php');
    }
?>