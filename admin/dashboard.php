<?php 
    require_once 'is_admin.php';
    $_SESSION['title'] = "Admin Dashboard";
    require_once('../header.php');
    require_once('navbar.php');
    require_once('../db.php');
?>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="card mt-5">
                        <div class="card-header bg-success text-white">
                            <h5 class="card-title text-capitalize">All Users List</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Contact</th>
                                </thead>
                                <tbody>
                                    <?php
                                        $count = 1;
                                        foreach (get_all('users') as $user) {
                                    ?>
                                    <tr>
                                        <td><?= $count ?></td>
                                        <td><?= $user['f_name']?></td>
                                        <td><?= $user['u_name']?></td>
                                        <td><?= $user['email']?></td>
                                        <td><?= $user['mobile']?></td>
                                    </tr>
                                    <?php
                                            $count++;
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php 
    require_once('../footer.php');
?>