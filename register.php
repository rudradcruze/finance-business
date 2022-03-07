<?php

    session_start();
    $_SESSION['title'] = "User Registration";
    if (isset($_SESSION['user_status'])) {
        header('location: admin/dashboard.php');
    }
    require_once('header.php');

?>
<div class="card mx-auto mt-5" style="width: 45%;">
    <div class="card-header bg-success text-white text-center">
        <h2>Registration Form With Validation</h2>
    </div>
    <div class="card-body">
        <?php
        if (isset($_SESSION['empty_msg'])) {
        ?>
            <div class="alert alert-danger" role="alert">
                <?php
                    echo $_SESSION['empty_msg'];
                    unset($_SESSION['empty_msg']);
                ?>
            </div>

        <?php
        }
        if (isset($_SESSION['err_msg'])) {
        ?>
            <div class="alert alert-danger" role="alert">
                <?php
                    echo $_SESSION['err_msg'];
                    unset($_SESSION['err_msg']);
                ?>
            </div>

        <?php
        }
        if (isset($_SESSION['suss_msg'])) {
        ?>
            <div class="alert alert-success" role="alert">
                <?php
                    echo $_SESSION['suss_msg'];
                    unset($_SESSION['suss_msg']);
                ?>
            </div>

        <?php
        }
        ?>

        <form action="register_post.php" method="post">

            <input type="text" name="fullName" required placeholder="Full Name" class="form-control my-3">
            <small class="text-danger">
                <?php
                    if(isset($_SESSION['full_name_msg'])){
                        echo $_SESSION['full_name_msg'];
                        unset($_SESSION['full_name_msg']);
                    }
                ?>
            </small>
            <input type="text" name="userName" required placeholder="User Name" class="form-control my-3">
            <small class="text-danger">
                <?php
                    if(isset($_SESSION['user_name_msg'])){
                        echo $_SESSION['user_name_msg'];
                        unset($_SESSION['user_name_msg']);
                    }
                ?>
            </small>
            <input type="string" name="numberNumber" required placeholder="Mobile Number" class="form-control my-3">
            <small class="text-danger">
                <?php
                    if(isset($_SESSION['number_msg'])){
                        echo $_SESSION['number_msg'];
                        unset($_SESSION['number_msg']);
                    }
                ?>
            </small>
            <input type="email" name="email" required placeholder="Email Address" class="form-control my-3">
            <small class="text-danger">
                <?php
                    if(isset($_SESSION['email_msg'])){
                        echo $_SESSION['email_msg'];
                        unset($_SESSION['email_msg']);
                    }
                ?>
            </small>
            <input type="password" name="password" placeholder="Password" class="form-control my-3" required>
            <small class="text-danger">
                <?php
                    if(isset($_SESSION['pass_msg'])){
                        echo $_SESSION['pass_msg'];
                        unset($_SESSION['pass_msg']);
                    }
                ?>
            </small>
            
            <!-- Buttons -->
            <div class="buttons d-flex justify-content-between">
                <button type="submit" class="btn btn-success" name="submit">Register Now</button>
                <button type="reset" class="btn btn-danger">Reset Form</button>
                <a href="login.php" class="link-primary text-end">Login</a>
            </div>
        </form>

    </div>
</div>

<?php
    require_once('footer.php');
?>