<?php 
    session_start();
    require_once 'is_admin.php';
    require_once('../header.php');
    require_once('navbar.php');
    require_once('../db.php');

    $get_query = "SELECT * FROM guest_messages";
    $from_db = mysqli_query($db_connect, $get_query);
    $after_assoc = mysqli_fetch_assoc($from_db);
?>

<section>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="card mt-5">
                        <div class="card-header bg-success text-white">
                            <h5 class="card-title text-capitalize">Guest Message List</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <th>SL</th>
                                    <th>Guest Name</th>
                                    <th>Guest Email</th>
                                    <th>Message</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    <?php
                                        $count = 1;
                                        foreach ($from_db as $messages) {
                                    ?>
                                    <tr class="
                                        <?php 
                                            if($messages['read_status'] == 1){
                                                echo "bg-info";
                                            }else {
                                                echo "text-dark";
                                            }
                                        ?>
                                    ">
                                        <td><?= $count ?></td>
                                        <td><?= $messages['guest_name']?></td>
                                        <td><?= $messages['guest_email']?></td>
                                        <td><?= $messages['guest_message']?></td>
                                        <td>
                                            <?php
                                                if ($messages['read_status'] == 1):
                                            ?>
                                            <a href="message_status.php?message_id=<?= $messages['id']?>&read_status=<?=$messages['read_status']; ?>" class="btn btn-sm btn-warning">Mark as read</a>

                                            <?php
                                            elseif($messages['read_status'] == 0):
                                            ?>

                                            <a href="message_status.php?message_id=<?= $messages['id']?>&read_status=<?=$messages['read_status']; ?>" class="btn btn-sm btn-success">Mark as unread</a>

                                            <a href="" class="btn btn-sm btn-danger">Delete</a>

                                            <?php
                                                endif
                                            ?>
                                        </td>
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