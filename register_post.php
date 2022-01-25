<?php

    require_once('header.php');

    // Database Info
    $db_host = "localhost";
    $db_user_name = "root";
    $db_password = "";
    $db_name = "finance_business";

    // Database Connect
    $db_connect = mysqli_connect($db_host, $db_user_name, $db_password, $db_name);

    $fullName = $_POST['fullName'];
    $userName = $_POST['userName'];
    $mobileNumber = $_POST['numberNumber'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $insert_query = "INSERT INTO users (full_name, user_name, mobile, email, password) VALUES ('$fullName', '$userName', '$mobileNumber', '$email', '$password')";

    mysqli_query($db_connect, $insert_query);
?>

<div class="container mx-auto">
    <div class="alert alert-info my-5" role="alert">
        Successfully Register
    </div>

    <a href="registration.php"class="btn btn-success w-100">Back to Registration</a>
</div>

<?php 
    require_once('footer.php');
?>