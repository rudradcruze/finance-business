<?php
    session_start();
    $_SESSION['title'] = "Login Page";
    if (isset($_SESSION['user_status'])) {
        header('location: admin/dashboard.php');
    }

    require_once('header.php');
?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card mt-5">
                    <div class="card-header bg-success text-white">
                        <h5 class="card-title">Login Form</h5>
                    </div>
                    <div class="card-body">
                        <form action="login_post.php" method="post">
                            <?php
                                if(isset($_SESSION['login_error'])){
                            ?>

                            <div class="alert alert-danger" role="alert">
                                <?php 
                                    echo $_SESSION['login_error'];
                                    unset($_SESSION['login_error']);
                                ?>
                            </div>

                            <?php
                                }
                            ?>
                            <input type="email" name="email" required placeholder="Email Address" class="form-control my-3">
                            <input type="password" name="password" placeholder="Password" class="form-control my-3" required>
                            <!-- Buttons -->
                            <div class="buttons d-flex justify-content-between">
                                <button type="submit" class="btn btn-success" name="submit">Login</button>
                                <a href="register.php" class="link-primary text-end">Registration</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
    require_once('footer.php');
?>