<?php

    session_start();
    require_once 'is_admin.php';
    require_once '../header.php';
    require_once '../db.php';
    require_once 'navbar.php';

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
                                <input type="text" name="banner_sub_title" class="form-control <?php
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
                                <input type="text" name="banner_title" class="form-control <?php
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
                                <textarea name="banner_detail"style="resize: none;" cols="30" rows="8" class="form-control <?php
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
                                <input type="file" class="form-control <?php
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
                    <div class="card-body"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
    require_once '../footer.php';
?>