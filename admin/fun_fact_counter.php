<?php

    require_once 'is_admin.php';
    $_SESSION['title'] = "Fun Fact Counter";
    require_once '../header.php';
    require_once 'navbar.php';
    require_once '../db.php';

    $get_counter_limit_count = "SELECT COUNT(*) as get_count FROM fun_fact_counters WHERE active_status = 1";
    $get_count_from_db = mysqli_query(db_connect(), $get_counter_limit_count);
    $after_count_assoc = mysqli_fetch_assoc($get_count_from_db);
?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="card mt-4">
                    <div class="card-header">
                        <h5 class="card-title text-success text-capitalize">Fun-Fact Counter Add form</h5>
                    </div>
                    <div class="card-body">
                        <form action="fun_fact_counter_post.php" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label">Counting Value</label>
                                <input required type="number" name="count_value" class="form-control <?php
                                    if (isset($_SESSION['count_value_err'])) {
                                        echo $_SESSION['count_value_err'];
                                        unset($_SESSION['count_value_err']);
                                    }
                                ?>" value="<?php
                                    if (isset($_SESSION['count_value_fill'])) {
                                        echo $_SESSION['count_value_fill'];
                                    }
                                ?>">
                                <?php
                                    if (isset($_SESSION['count_value_null'])):
                                ?>
                                    <small class="text-danger">
                                        <?php 
                                            echo $_SESSION['count_value_null'];
                                            unset($_SESSION['count_value_null']);
                                        ?>
                                    </small>
                                <?php
                                    endif
                                ?>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Counting Heading</label>
                                <input required type="text" name="count_head" class="form-control <?php
                                    if (isset($_SESSION['count_head_err'])) {
                                        echo $_SESSION['count_head_err'];
                                        unset($_SESSION['count_head_err']);
                                    }

                                    if (isset($_SESSION['count_value_num_err'])) {
                                        echo $_SESSION['count_value_num_err'];
                                        unset($_SESSION['count_value_num_err']);
                                    }
                                ?>" value="<?php
                                    if (isset($_SESSION['count_head_fill'])) {
                                        echo $_SESSION['count_head_fill'];
                                        unset($_SESSION['count_value_fill']);
                                        unset($_SESSION['count_head_fill']);
                                    }
                                ?>">

                                <?php
                                    if (isset($_SESSION['count_head_null'])):
                                ?>
                                    <small class="text-danger">
                                        <?php 
                                            echo $_SESSION['count_head_null'];
                                            unset($_SESSION['count_head_null']);
                                        ?>
                                    </small>
                                <?php
                                    endif
                                ?>
                                
                                <?php
                                    if (isset($_SESSION['count_value_num'])):
                                ?>
                                    <small class="text-danger">
                                        <?php 
                                            echo $_SESSION['count_value_num'];
                                            unset($_SESSION['count_value_num']);
                                        ?>
                                    </small>
                                <?php
                                    endif
                                ?>
                            </div>

                            <div class="mb-1">
                                <button class="btn btn-primary form-control" type="submit">Add Heading</button>
                            </div>
                            <div class="mb-3">
                                <button type="reset" class="btn btn-warning form-control">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="card mt-4">
                    <div class="card-header">
                        <h5 class="card-title text-capitalize">Fun-Fact Heading list table</h5>
                    </div>
                    <div class="card-body">

                    <?php if (isset($_SESSION['counter_add_successful'])) : ?>
                    <div class="alert alert-success" role="alert">
                        <?php
                            echo $_SESSION['counter_add_successful'];
                            unset($_SESSION['counter_add_successful']);
                        ?>
                    </div>
                    <?php endif ?>

                    <?php if (isset($_SESSION['counter_updated'])) : ?>
                    <div class="alert alert-success" role="alert">
                        <?php
                            echo $_SESSION['counter_updated'];
                            unset($_SESSION['counter_updated']);
                        ?>
                    </div>
                    <?php endif ?>

                    <?php if (isset($_SESSION['counter_activated'])) : ?>
                    <div class="alert alert-success" role="alert">
                        <?php
                            echo $_SESSION['counter_activated'];
                            unset($_SESSION['counter_activated']);
                        ?>
                    </div>
                    <?php endif ?>

                    <?php if (isset($_SESSION['counter_de_activated'])) : ?>
                    <div class="alert alert-warning" role="alert">
                        <?php
                            echo $_SESSION['counter_de_activated'];
                            unset($_SESSION['counter_de_activated']);
                        ?>
                    </div>
                    <?php endif ?>

                    <?php if (isset($_SESSION['counter_deleted'])) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php
                            echo $_SESSION['counter_deleted'];
                            unset($_SESSION['counter_deleted']);
                        ?>
                    </div>
                    <?php endif ?>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Sl:</th>
                                <th>Count Value</th>
                                <th>Count Head</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php foreach (get_all('fun_fact_counters') as $key => $fun_fact_counter) : ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><?= $fun_fact_counter['count_value'] ?></td>
                                    <td><?= $fun_fact_counter['count_head'] ?></td> 
                                    <td class="text-center">
                                        <?php if($fun_fact_counter['active_status'] == 1): ?>
                                            <span class="badge rounded bg-success">Active</span>
                                        <?php else: ?>
                                                <span class="badge rounded text-dark bg-warning">Disable</span>
                                        <?php endif ?>
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm d-flex justify-content-between" role="group" aria-label="Basic mixed styles example">
                                            <?php

                                                if($fun_fact_counter['active_status'] == 1) {
                                                    $_SESSION['delete_disable'] = "disabled";
                                            ?>
                                                <a href="fun_fact_counter_status.php?fun_fact_id=<?=$fun_fact_counter['id']?>&status=0" class="btn btn-warning my-1">Disable</a>
                                            <?php
                                                }else {
                                                    unset($_SESSION['delete_disable']);
                                                    if($after_count_assoc['get_count'] < 4){
                                            ?>
                                                <a href="fun_fact_counter_status.php?fun_fact_id=<?=$fun_fact_counter['id']?>&status=1" class="btn btn-success my-1">Activate</a>
                                            <?php
                                                    }else {
                                            ?>
                                                <a href="" class="btn btn-success my-1 disabled">Activate</a>
                                            <?php
                                                    }
                                                }
                                            ?>


                                            <a href="fun_fact_counter_edit.php?fun_fact_id=<?= $fun_fact_counter['id'] ?>" class="btn btn-info my-1">Edit</a>

                                            
                                            <a href="<?php
                                                if (!isset($_SESSION['delete_disable'])) {
                                                    echo "fun_fact_counter_status.php?fun_fact_id=" . $fun_fact_counter['id'] . "&status=2";
                                                }
                                            ?>" class="btn btn-danger my-1 <?php
                                                if (!isset($_SESSION['delete_disable'])) {
                                                    echo "disabled";
                                                }
                                            ?>">Delete</a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
    require_once '../footer.php';
?>