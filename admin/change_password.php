<?php
    require_once 'is_admin.php';
    require_once '../header.php';
    require_once 'navbar.php';
    require_once '../db.php';
?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 m-auto">
                <div class="card mt-5">
                    <div class="card-header bg-secondary text-white    ">
                        <h5 class="card-title text-capitalize d-flex align-items-center justify-content-between">Password Change Form</h5>
                    </div>
                    <div class="card-body">
                    <?php
                        if (isset($_SESSION['empty_change_pass'])) {
                    ?>
                            <div class="alert alert-danger" role="alert">
                                <?php
                                    echo $_SESSION['empty_change_pass'];
                                    unset($_SESSION['empty_change_pass']);
                                ?>
                            </div>
                    <?php
                        }

                        if (isset($_SESSION['same_change_pass'])) {
                    ?>
                            <div class="alert alert-danger" role="alert">
                                <?php
                                    echo $_SESSION['same_change_pass'];
                                    unset($_SESSION['same_change_pass']);
                                ?>
                            </div>
                    <?php
                        }

                        if (isset($_SESSION['success_change_pass'])) {
                    ?>
                            <div class="alert alert-success" role="alert">
                                <?php
                                    echo $_SESSION['success_change_pass'];
                                    unset($_SESSION['success_change_pass']);
                                ?>
                            </div>
                    <?php
                        }

                        if (isset($_SESSION['pass_change_pass'])) {
                    ?>
                            <div class="alert alert-danger" role="alert">
                                <?php
                                    echo $_SESSION['pass_change_pass'];
                                    unset($_SESSION['pass_change_pass']);
                                ?>
                            </div>
                    <?php
                        }

                        if (isset($_SESSION['same_change_pass'])) {
                    ?>
                            <div class="alert alert-danger" role="alert">
                                <?php
                                    echo $_SESSION['same_change_pass'];
                                    unset($_SESSION['same_change_pass']);
                                ?>
                            </div>
                    <?php
                        }

                        if (isset($_SESSION['dontmatch_change_pass'])) {
                    ?>
                            <div class="alert alert-danger" role="alert">
                                <?php
                                    echo $_SESSION['dontmatch_change_pass'];
                                    unset($_SESSION['dontmatch_change_pass']);
                                ?>
                            </div>
                    <?php
                        }

                        if (isset($_SESSION['same_as_old_change_pass'])) {
                    ?>
                            <div class="alert alert-danger" role="alert">
                                <?php
                                    echo $_SESSION['same_as_old_change_pass'];
                                    unset($_SESSION['same_as_old_change_pass']);
                                ?>
                            </div>
                    <?php
                        }
                    ?>
                    <form action="change_password_post.php" method="post">
                            <div class="mb-3">
                                <label class="text-primary text-capitalize">old password</label>
                                <input type="password" class="form-control" name="old_password">
                            </div>

                            <div class="mb-3">
                                <label class="text-primary text-capitalize">new password</label>
                                <input type="password" class="form-control" name="new_password">
                            </div>

                            <div class="mb-3">
                                <label class="text-primary text-capitalize">confirm password</label>
                                <input type="password" class="form-control" name="confirm_password">
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Change password</button>
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