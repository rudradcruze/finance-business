<?php

    require_once 'is_admin.php';
    require_once '../header.php';
    require_once '../db.php';
    require_once 'navbar.php';

    $get_query = "SELECT * FROM banners";
    $from_db = mysqli_query($db_connect, $get_query);
    $after_assoc = mysqli_fetch_assoc($from_db);
?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 mt-5">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title text-capitalize">Banner add form</h5>
                    </div>
                    <div class="card-body">
                        <form action="banner_post.php" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label text-capitalize text-primary">Banner sub title</label>
                                <input type="text" required name="banner_sub_title" class="form-control <?php
                                        if (isset($_SESSION['banner_sub_title'])) {
                                            echo $_SESSION['banner_sub_title'];
                                            unset($_SESSION['banner_sub_title']);
                                        }
                                    ?>" value="<?php 
                                    if (isset($_SESSION['send_value'])) {
                                      if ($_SESSION['send_value'] == 0) {
                                        echo $_SESSION['banner_sub_title_autofill'];
                                      }
                                    }
                                  ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-capitalize text-primary">Banner Title</label>
                                <input type="text" required name="banner_title" class="form-control <?php
                                        if (isset($_SESSION['banner_title'])) {
                                            echo $_SESSION['banner_title'];
                                            unset($_SESSION['banner_title']);
                                        }
                                    ?>"value="<?php 
                                    if (isset($_SESSION['send_value'])) {
                                      if ($_SESSION['send_value'] == 0) {
                                        echo $_SESSION['banner_title_autofill'];
                                      }
                                    }
                                  ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-capitalize text-primary">Banner detail</label>
                                <textarea name="banner_detail" required style="resize: none;" cols="30" rows="8" class="form-control <?php
                                        if (isset($_SESSION['banner_detail'])) {
                                            echo $_SESSION['banner_detail'];
                                            unset($_SESSION['banner_detail']);
                                        }
                                    ?>"><?php 
                                    if (isset($_SESSION['send_value'])) {
                                      if ($_SESSION['send_value'] == 0) {
                                        echo $_SESSION['banner_detail_autofill'];
                                      }
                                    }
                                  ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-capitalize text-primary">banner image</label>
                                <?php
                                    if (isset($_SESSION['banner_image_big'])) {
                                ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php
                                        echo $_SESSION['banner_image_big'];
                                        unset($_SESSION['banner_image_big']);
                                    ?>
                                </div>
                                <?php
                                    }
                                    
                                    if (isset($_SESSION['banner_image_file_err'])) {
                                ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php
                                        echo $_SESSION['banner_image_file_err'];
                                        unset($_SESSION['banner_image_file_err']);
                                    ?>
                                </div>
                                <?php
                                    }
                                ?>
                                <input type="file" required class="form-control <?php
                                        if (isset($_SESSION['banner_image'])) {
                                            echo $_SESSION['banner_image'];
                                            unset($_SESSION['banner_image']);
                                            unset($_SESSION['banner_sub_title_autofill']);
                                            unset($_SESSION['banner_title_autofill']);
                                            unset($_SESSION['banner_detail_autofill']);
                                            unset($_SESSION['send_value']);
                                        }
                                    ?>" name="banner_image">
                            </div>
                            <div class="mb-1">
                                <button type="submit" class="form-control btn btn-primary">Add Banner</button>
                            </div>
                            <div class="mb-3">
                                <button type="reset" class="form-control btn btn-warning">Rest Fields</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 mt-5">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title text-capitalize">Banner add list</h5>
                    </div>
                    <div class="card-body">
                        <?php
                            if(isset($_SESSION['banner_edit_success'])):
                        ?>
                        <div class="alert alert-success" role="alert">
                            <?php
                                echo $_SESSION['banner_edit_success'];
                                unset($_SESSION['banner_edit_success']);
                            ?>
                        </div>
                        <?php
                            endif
                        ?>
                        
                        <?php
                            if(isset($_SESSION['banner_created'])):
                        ?>
                        <div class="alert alert-success" role="alert">
                            <?php
                                echo $_SESSION['banner_created'];
                                unset($_SESSION['banner_created']);
                            ?>
                        </div>
                        <?php
                            endif
                        ?>

                        <?php
                            if(isset($_SESSION['banner_activated'])):
                        ?>
                        <div class="alert alert-success" role="alert">
                            <?php
                                echo $_SESSION['banner_activated'];
                                unset($_SESSION['banner_activated']);
                            ?>
                        </div>
                        <?php
                            endif
                        ?>

                        <?php
                            if(isset($_SESSION['banner_deactivated'])):
                        ?>
                        <div class="alert alert-warning" role="alert">
                            <?php
                                echo $_SESSION['banner_deactivated'];
                                unset($_SESSION['banner_deactivated']);
                            ?>
                        </div>
                        <?php
                            endif
                        ?>

                        <?php
                            if(isset($_SESSION['banner_delete_message'])):
                        ?>
                        <div class="alert alert-danger" role="alert">
                            <?php
                                echo $_SESSION['banner_delete_message'];
                                unset($_SESSION['banner_delete_message']);
                            ?>
                        </div>
                        <?php
                            endif
                        ?>

                        <table class="table table-bordered">
                            <thead class="table-info">
                                <td>Sl</td>
                                <td>Banner Subtitle</td>
                                <td>Banner Title</td>
                                <td>Banner Details</td>
                                <td>Location</td>
                                <td>Active Status</td>
                                <td>Action</td>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($from_db as $key => $banner) :
                                ?>

                                    <tr>
                                        <td><?= $key+1?></td>
                                        <td><?= $banner['banner_sub_title']?></td>
                                        <td><?= $banner['banner_title']?></td>
                                        <td><?= $banner['banner_detail']?></td>
                                        <td>
                                            <img style="width: 100px;" src="../<?= $banner['image_location']?>" alt="Image">
                                        </td>
                                        <td>
                                            <?php
                                                if($banner['read_status'] == 1) :
                                            ?>

                                                <span class="badge badge-sm bg-success">Active</span>

                                            <?php
                                                else:
                                            ?>

                                                <span class="badge badge-sm bg-warning">De-Active</span>

                                            <?php
                                                endif
                                            ?>
                                        </td>
                                        <td>
                                        <div class="btn-group btn-group-sm d-flex flex-column" role="group" aria-label="Basic mixed styles example">
                                            <?php
                                                if($banner['read_status'] == 1) :
                                            ?>
                                                    <a href="banner_status.php?banner_id=<?= $banner['id']?>&active_status=2" class="btn btn-warning my-1">Disable</a>
                                            <?php
                                                else:
                                            ?>
                                                    <a href="banner_status.php?banner_id=<?= $banner['id']?>&active_status=1" class="btn btn-success my-1">Active</a>

                                            <?php
                                                endif
                                            ?>
                                            <a href="banner_edit.php?banner_id=<?= $banner['id']?>" class="btn btn-info my-1">Edit</a>
                                            <a href="banner_delete.php?banner_id=<?= $banner['id']?>" class="btn btn-danger my-1">Delete</a>
                                        </div>
                                        </td>
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