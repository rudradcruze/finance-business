<?php

    require_once 'is_admin.php';
    $_SESSION['title'] = "Profile Edit";
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
            <div class="col-lg-6 m-auto">
                <div class="card mt-5">
                    <div class="card-header bg-warning">
                        <h5 class="card-title bg-warning text-capitalize d-flex justify-content-between">Edit Profile Information</h5>
                    </div>
                    <div class="card-body">
                    <?php
                        if (isset($_SESSION['empty_profile_msg'])) {
                    ?>
                            <div class="alert alert-danger" role="alert">
                                <?php
                                    echo $_SESSION['empty_profile_msg'];
                                    unset($_SESSION['empty_profile_msg']);
                                ?>
                            </div>
                    <?php
                        }
                    ?>
                        <form action="profile_edit_post.php" method="post">
                            <div class="mb-3">
                                <label class="text-primary text-capitalize">full name</label>
                                <input type="text" value="<?= $after_assoc['f_name']?>" class="form-control" name="f_name">
                                <small class="text-danger">
                                    <?php
                                        if(isset($_SESSION['fname_profile_msg'])){
                                            echo $_SESSION['fname_profile_msg'];
                                            unset($_SESSION['fname_profile_msg']);
                                        }
                                    ?>
                                </small>
                            </div>

                            <div class="mb-3">
                                <label class="text-primary text-capitalize">user name</label>
                                <input type="text" value="<?= $after_assoc['u_name']?>" class="form-control" name="u_name">
                                <small class="text-danger">
                                    <?php
                                        if(isset($_SESSION['user_profile_msg'])){
                                            echo $_SESSION['user_profile_msg'];
                                            unset($_SESSION['user_profile_msg']);
                                        }
                                    ?>
                                </small>
                            </div>

                            <div class="mb-3">
                                <label class="text-primary text-capitalize">mobile</label>
                                <input type="text" value="<?= $after_assoc['mobile']?>" class="form-control" name="mobile">
                                <small class="text-danger">
                                    <?php
                                        if(isset($_SESSION['mobile_edit_msg'])){
                                            echo $_SESSION['mobile_edit_msg'];
                                            unset($_SESSION['mobile_edit_msg']);
                                        }
                                    ?>
                                </small>
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-danger">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
    require_once '../footer.php';
?>