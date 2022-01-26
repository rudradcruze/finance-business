<?php
    require_once 'is_admin.php';
    require_once '../header.php';
    require_once 'navbar.php';
    require_once '../db.php';

    $login_email = $_SESSION['email'];

    $get_query = "SELECT email, f_name, u_name, mobile FROM users WHERE email='$login_email'";
    $db_result = mysqli_query($db_connect, $get_query);
    $after_assoc = mysqli_fetch_assoc($db_result);
?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 m-auto">
                <div class="card mt-5">
                    <div class="card-header bg-secondary text-white">
                        <h5 class="card-title text-capitalize d-flex align-items-center justify-content-between">Profile Information <a href="profile_edit.php" class="btn btn-warning">edit</a></h5>
                    </div>
                    <div class="card-body">
                        <?php
                        if (isset($_SESSION['success_profile_msg'])) {
                        ?>
                            <div class="alert alert-info" role="alert">
                                <?php
                                    echo $_SESSION['success_profile_msg'];
                                    unset($_SESSION['success_profile_msg']);
                                ?>
                            </div>
                        <?php
                        }
                        ?>
                        <p><span class="text-primary text-capitalize">Full name: </span><?= $after_assoc['f_name'] ?></p>
                        <p><span class="text-primary text-capitalize">User name: </span><?= $after_assoc['u_name'] ?></p>
                        <p><span class="text-primary text-capitalize">email: </span><?= $after_assoc['email'] ?></p>
                        <p><span class="text-primary text-capitalize">phone: </span><?= $after_assoc['mobile'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
require_once '../footer.php';
?>