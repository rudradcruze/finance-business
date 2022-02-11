<?php

    require_once 'is_admin.php';
    $_SESSION['title'] = "Fun Fact Counter Edit";
    require_once '../db.php';
    require_once '../header.php';
    require_once 'navbar.php';

    $fun_fact_id = $_GET['fun_fact_id'];

    $get_query = "SELECT * FROM fun_fact_counters WHERE id='$fun_fact_id'";
    $counter_from_db = mysqli_query(db_connect(), $get_query);
    $after_assoc = mysqli_fetch_assoc($counter_from_db);
?>


<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card mt-4">
                    <div class="card-header">
                        <h5 class="card-title text-capitalize">Counter Edit form</h5>
                    </div>
                    <div class="card-body">
                        <form action="fun_fact_counter_edit_post.php" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label text-capitalize text-primary">Counter Value</label>
                                <input type="number" required name="count_value" class="form-control <?php
                                    if (isset($_SESSION['count_v_empty'])) {
                                        echo $_SESSION['count_v_empty'];
                                        unset($_SESSION['count_v_empty']);
                                    }
                                ?>" value="<?= $after_assoc['count_value']?>">
                                <input type="text" name="fun_fact_id" hidden class="form-control" value="<?= $after_assoc['id']?>">
                                <?php if(isset($_SESSION['count_value_null'])) :?>
                                    <small class="text-danger text-capitalize">
                                        <?php
                                            echo $_SESSION['count_value_null'];
                                            unset($_SESSION['count_value_null']);
                                        ?>
                                    </small>
                                <?php endif ?>
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-capitalize text-primary">Counter Head</label>
                                <input type="text" required name="count_head" class="form-control <?php
                                    if(isset($_SESSION['count_head_empty'])) {
                                        echo $_SESSION['count_head_empty'];
                                        unset($_SESSION['count_head_empty']);
                                    }
                                ?>"value="<?= $after_assoc['count_head']?>">
                                <?php if(isset($_SESSION['count_head_null'])) :?>
                                    <small class="text-danger text-capitalize">
                                        <?php
                                            echo $_SESSION['count_head_null'];
                                            unset($_SESSION['count_head_null']);
                                        ?>
                                    </small>
                                <?php endif ?>
                            </div>

                            <div class="mb-1">
                                <button type="submit" class="form-control btn btn-primary">Save Changes</button>
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