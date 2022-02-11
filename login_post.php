<?php 

    session_start();
    
    require_once('db.php');

    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $checking_query = "SELECT COUNT(*) AS total_users FROM users WHERE email='$email' AND password='$password'";


    $from_db = mysqli_query(db_connect(), $checking_query);
    $after_assoc = mysqli_fetch_assoc($from_db);

    if ($after_assoc['total_users'] == 1) {
        $_SESSION['email'] = $email;
        $_SESSION['user_status'] = "yes";
        header('location: admin/dashboard.php');
    }else {
        $_SESSION['login_error'] = "Your Credentials are wrong or register!";
        header('location: login.php');
    }


?>