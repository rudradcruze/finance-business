<?php
    require_once 'is_admin.php';
    $_SESSION['title'] = "Service Item Edit";
    require_once '../db.php';
    require_once '../header.php';
    require_once 'navbar.php';

    $item_id = $_GET['item_id'];
    $get_query = "SELECT * FROM service_items WHERE id = $item_id";
    $result_from_db = mysqli_query(db_connect(), $get_query);
    $after_assoc = mysqli_fetch_assoc($result_from_db);
?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <div class="card mt-3">
                    <div class="card-header bg-info">
                        <h5 class="text-capitalize">Service Item Edit</h5>
                    </div>
                    <div class="card-body">
                        <form action="service_item_edit_post.php" enctype="multipart/form-data" method="post">
                            <div class="mb-3">
                                <label class="form-label text-capitalize">Service Head</label>
                                <input type="text" value="<?=$after_assoc['service_item_head']?>" class="form-control <?php
                                    if(isset($_SESSION['service_item_head_null'])) {
                                        echo "is-invalid";
                                        unset($_SESSION['service_item_head_null']);
                                    }
                                ?>" name="service_item_head">
                                <input type="text" name="item_id" hidden value="<?=$item_id?>">
                                <?php if(isset($_SESSION['service_item_head_null'])) :?>
                                    <small class="text-danger">
                                        <?php
                                            echo $_SESSION['service_item_head_null'];
                                            unset($_SESSION['service_item_head_null']);
                                        ?>
                                    </small>
                                <?php endif?>
                            </div>

                            <div class="mb-3">
                                <label class="form-label text-capitalize">Service Item Detail</label>
                                <textarea style="resize: none;" name="service_item_detail" class="form-control <?php
                                    if(isset($_SESSION['service_item_detail_null'])) {
                                        echo "is-invalid";
                                        unset($_SESSION['service_item_detail_null']);
                                    }
                                ?>" cols="30" rows="3"><?=$after_assoc['service_item_detail']?></textarea>
                                <?php if(isset($_SESSION['service_item_detail_null'])) :?>
                                    <small class="text-danger">
                                        <?php
                                            echo $_SESSION['service_item_detail_null'];
                                            unset($_SESSION['service_item_detail_null']);
                                        ?>
                                    </small>
                                <?php endif?>
                            </div>
                            
                            <div class="mb-3 d-flex flex-column">
                                <label class="form-label text-capitalize">Service Image</label>
                                <img src="../<?=$after_assoc['image_location']?>" class="mb-2" style="width: 200px;" alt="Service Image">
                                <input type="file" class="form-control <?php
                                    if(isset($_SESSION['service_edit_img_big'])){
                                        echo "is-invalid ";
                                    }
                                    if(isset($_SESSION['service_edit_img_extension'])){
                                        echo "is-invalid";
                                    }
                                ?>" name="service_image">

                                <?php if(isset($_SESSION['service_edit_img_big'])) :?>
                                    <small class="text-danger">
                                        <?php
                                            echo $_SESSION['service_edit_img_big'];
                                            unset($_SESSION['service_edit_img_big']);
                                        ?>
                                    </small>
                                <?php endif?>

                                <?php if(isset($_SESSION['service_edit_img_extension'])){?>
                                <small class="text-danger">
                                    <?php
                                        echo $_SESSION['service_edit_img_extension'];
                                        unset($_SESSION['service_edit_img_extension']);
                                    ?>
                                </small>
                                <?php } ?>
                            </div>
                            <button class="btn btn-warning" type="submit">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once '../footer.php'; ?>