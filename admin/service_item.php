<?php

    require_once 'is_admin.php';
    require_once '../header.php';
    require_once 'navbar.php';
    require_once '../db.php';

    $get_query = "SELECT * FROM service_items";
    $from_db = mysqli_query($db_connect, $get_query);
?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="card mt-4">
                    <div class="card-header">
                        <h5 class="card-title text-success text-capitalize">Service Item Add form</h5>
                    </div>
                    <div class="card-body">
                        <form action="service_item_post.php" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label">Item Heading</label>
                                <input required type="text" name="service_item_head" class="form-control <?php
                                    if (isset($_SESSION['service_item_head'])) {
                                        echo $_SESSION['service_item_head'];
                                        unset($_SESSION['service_item_head']);
                                    }
                                ?>" value="<?php
                                    if (isset($_SESSION['service_item_head_autofill']) && $_SESSION['err_service'] == 0) {
                                        echo $_SESSION['service_item_head_autofill'];
                                    }
                                ?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Item Detail</label>
                                <textarea required name="service_item_detail" style="resize: none;" class="form-control <?php
                                    if (isset($_SESSION['service_item_detail'])) {
                                        echo $_SESSION['service_item_detail'];
                                        unset($_SESSION['service_item_detail']);
                                    }
                                ?>" cols="30" rows="6"><?php
                                    if (isset($_SESSION['service_item_detail_autofill']) && $_SESSION['err_service'] == 0) {
                                        echo $_SESSION['service_item_detail_autofill'];
                                    }
                            ?></textarea>
                            </div>
                            
                            <div class="mb-4">
                                <label class="form-label">Item Image</label>
                                <input required type="file" name="service_item_image" class="form-control <?php
                                    if (isset($_SESSION['service_item_image'])) {
                                        echo $_SESSION['service_item_image'];
                                        unset($_SESSION['service_item_image']);
                                        unset($_SESSION['service_item_head_autofill']);
                                        unset($_SESSION['service_item_detail_autofill']);
                                    }
                                ?>">
                            </div>
                            
                            <div class="mb-1">
                                <button class="btn btn-primary form-control" type="submit">Add Button</button>
                            </div>
                            <div class="mb-3">
                                <button type="reset" class="btn btn-warning form-control">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card mt-4">
                    <div class="card-header">
                        <h5 class="card-title">Service Heading table</h5>
                    </div>
                    <div class="card-body">

                    <?php
                        if (isset($_SESSION['service_heading_success'])) :
                    ?>
                    <div class="alert alert-success" role="alert">
                        <?php
                            echo $_SESSION['service_heading_success'];
                            unset($_SESSION['service_heading_success']);
                        ?>
                    </div>
                    <?php
                        endif
                    ?>
                    <table class="table table-bordered">
                        <thead class="bg-light">
                            <th>Service Head</th>
                            <th>Service Details</th>
                            <th>Image</th>
                            <th>Action</th>
                        </thead>

                        <tbody class="table-striped">
                            <?php
                                foreach($from_db as $service_item):
                            ?>
                            <tr>
                                <td><?= $service_item['service_item_head'] ?></td>
                                <td><?= $service_item['service_item_detail'] ?></td>
                                <td>
                                    <img style="width: 100px;" src="../<?= $service_item['image_location'] ?>" alt="Service Item Image">
                                </td>
                                <td>Action Here</td>
                            </tr>
                            <?php
                                endforeach
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
    require_once '../footer.php';
?>