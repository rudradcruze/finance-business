<?php
    require_once 'is_admin.php';
    $_SESSION['title'] = "Service Head Edit";
    require_once '../header.php';
    require_once 'navbar.php';
    require_once '../db.php';

    $service_head_id = $_GET['service_head_id'];

    $get_query = "SELECT * FROM service_heads WHERE id = $service_head_id";
    $result_from_db = mysqli_query(db_connect(), $get_query);
    $after_assoc_head = mysqli_fetch_assoc($result_from_db);
?>

    <div class="container">
        <div class="row">
        <div class="col-lg-6 mx-auto mb-5">
                <div class="card mt-5">
                    <div class="card-header">
                        <h5 class="card-title text-success text-capitalize">Service Heading Edit form</h5>
                    </div>
                    <div class="card-body">
                        <form action="service_edit_post.php" method="post">
                            <div class="mb-3">
                                <label class="form-label">Black Heading</label>
                                <input type="text"  name="black_heading" class="form-control <?php
                                    if(isset($_SESSION['black_heading_err'])){
                                        echo $_SESSION['black_heading_err'];
                                        unset($_SESSION['black_heading_err']);
                                    }
                                ?>" value="<?= $after_assoc_head['black_head']?>">
                                <input type="text" hidden name="service_head_id" value="<?= $service_head_id?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Green Heading</label>
                                <input type="text"  name="green_heading" class="form-control <?php
                                    if(isset($_SESSION['green_heading_err'])){
                                        echo $_SESSION['green_heading_err'];
                                        unset($_SESSION['green_heading_err']);
                                    }
                                ?>" value="<?= $after_assoc_head['green_head']?>">
                            </div>
                            
                            <div class="mb-4">
                                <label class="form-label">Sub Heading</label>
                                <input type="text"  name="service_sub_head" class="form-control <?php
                                    if(isset($_SESSION['service_sub_head_err'])){
                                        echo $_SESSION['service_sub_head_err'];
                                        unset($_SESSION['service_sub_head_err']);
                                    }
                                ?>" value="<?= $after_assoc_head['service_sub_head']?>">
                            </div>
                            
                            <div class="mb-1">
                                <button class="btn btn-primary form-control" type="submit">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php require_once '../footer.php'; ?>