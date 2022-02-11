<?php
    require_once 'is_admin.php';
    $_SESSION['title'] = "Fun Fact Head Edit";
    require_once '../db.php';
    require_once '../header.php';
    require_once 'navbar.php';

    $fun_fact_id = $_GET['fun_fact_id'];

    $get_query = "SELECT * FROM fun_facts WHERE id='$fun_fact_id'";
    $fun_fact_from_db = mysqli_query(db_connect(), $get_query);
    $after_assoc = mysqli_fetch_assoc($fun_fact_from_db);
?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-10 m-auto">
                <div class="card mt-4">
                    <div class="card-header text-danger">
                        <h5 class="card-title text-capitalize">Fun-Fact Head Edit form</h5>
                    </div>
                    <div class="card-body">
                        <form action="fun_fact_head_edit_post.php" method="post" enctype="multipart/form-data">
                            <div class="input-group mb-3">
                                <label class="input-group-text text-capitalize <?php
                                    if(isset($_SESSION['sub_head_null'])) :
                                        echo "text-danger";
                                    else:
                                        echo "text-primary";
                                    endif
                                ?>">
                                    <?php
                                        if(isset($_SESSION['sub_head_null'])) :
                                            echo $_SESSION['sub_head_null'];
                                            unset($_SESSION['sub_head_null']);
                                        else:
                                            echo "Sub Head";
                                        endif
                                    ?>
                                </label>
                                <input type="text" name="sub_head" class="form-control <?php
                                    if(isset($_SESSION['sub_head_err'])) {
                                        echo $_SESSION['sub_head_err'];
                                        unset($_SESSION['sub_head_err']);
                                    }
                                ?>" value="<?= $after_assoc['sub_head']?>">
                                <label class="input-group-text text-capitalize <?php
                                    if(isset($_SESSION['white_head_null'])) :
                                        echo "text-danger";
                                    else:
                                        echo "text-primary";
                                    endif
                                ?>">
                                    <?php
                                        if(isset($_SESSION['white_head_null'])) :
                                            echo $_SESSION['white_head_null'];
                                            unset($_SESSION['white_head_null']);
                                        else:
                                            echo "White Head";
                                        endif
                                    ?>
                                </label>
                                <input type="text" name="white_head" class="form-control <?php
                                    if (isset($_SESSION['white_head_err'])) {
                                        echo $_SESSION['white_head_err'];
                                        unset($_SESSION['white_head_err']);
                                    }
                                ?>" value="<?= $after_assoc['white_head']?>">
                                <input type="text" name="fun_fact_id" hidden class="form-control" value="<?= $fun_fact_id?>">
                            </div>
                            <div class="input-group mb-3">
                                <label class="input-group-text text-capitalize <?php
                                    if(isset($_SESSION['green_head_null'])) :
                                        echo "text-danger";
                                    else:
                                        echo "text-primary";
                                    endif
                                ?>">
                                    <?php
                                        if(isset($_SESSION['green_head_null'])) :
                                            echo $_SESSION['green_head_null'];
                                            unset($_SESSION['green_head_null']);
                                        else:
                                            echo "Green Head";
                                        endif
                                    ?>
                                </label>
                                <input type="text" name="green_head" class="form-control <?php
                                    if (isset($_SESSION['green_head_err'])) {
                                        echo $_SESSION['green_head_err'];
                                        unset($_SESSION['green_head_err']);
                                    }
                                ?>" value="<?= $after_assoc['green_head']?>">
                            </div>
                            <div class="input-group mb-4">
                                <label class="input-group-text text-capitalize <?php
                                    if(isset($_SESSION['paragraph_one_null'])) :
                                        echo "text-danger";
                                    else:
                                        echo "text-primary";
                                    endif
                                ?>">
                                    <?php
                                        if(isset($_SESSION['paragraph_one_null'])) :
                                            echo $_SESSION['paragraph_one_null'];
                                            unset($_SESSION['paragraph_one_null']);
                                        else:
                                            echo "Paragraph One";
                                        endif
                                    ?>
                                </label>
                                <textarea name="paragraph_one" style="resize: none;" cols="30" rows="5" class="form-control <?php
                                    if (isset($_SESSION['paragraph_one_err'])) {
                                        echo $_SESSION['paragraph_one_err'];
                                        unset($_SESSION['paragraph_one_err']);
                                    }
                                ?>"><?= $after_assoc['paragraph_one']?></textarea>

                                <label class="input-group-text text-capitalize <?php
                                    if(isset($_SESSION['paragraph_two_null'])) :
                                        echo "text-danger";
                                    else:
                                        echo "text-primary";
                                    endif
                                ?>">
                                    <?php
                                        if(isset($_SESSION['paragraph_two_null'])) :
                                            echo $_SESSION['paragraph_two_null'];
                                            unset($_SESSION['paragraph_two_null']);
                                        else:
                                            echo "Paragraph Two";
                                        endif
                                    ?>
                                </label>
                                <textarea name="paragraph_two" style="resize: none;" cols="30" rows="5" class="form-control <?php
                                    if (isset($_SESSION['paragraph_two_err'])) {
                                        echo $_SESSION['paragraph_two_err'];
                                        unset($_SESSION['paragraph_two_err']);
                                    }
                                ?>"><?= $after_assoc['paragraph_two']?></textarea>
                            </div>

                            <div class="mb-3">
                                <img style="width: 150px;" src="../<?= $after_assoc['image_location']?>" alt="Image">
                            </div>

                            <div class="mb-3">
                                <label class="from-label mb-2 text-capitalize <?php
                                        if(isset($_SESSION['fun_fact_big']) || isset($_SESSION['fun_fact_image_ex_error'])) :
                                            echo "text-danger";
                                        else:
                                            echo "text-primary";
                                        endif
                                    ?>">
                                    <?php
                                        if(isset($_SESSION['fun_fact_big'])) {
                                            echo $_SESSION['fun_fact_big'];
                                            unset($_SESSION['fun_fact_big']);
                                        }else {
                                            echo "Background Image";
                                        }

                                        if(isset($_SESSION['fun_fact_image_ex_error'])) {
                                            echo $_SESSION['fun_fact_image_ex_error'];
                                            unset($_SESSION['fun_fact_image_ex_error']);
                                        }
                                    ?>
                                </label>
                                <input type="file" class="form-control <?php
                                    if (isset($_SESSION['fun_fact_big_err'])) {
                                        echo $_SESSION['fun_fact_big_err'];
                                        unset($_SESSION['fun_fact_big_err']);
                                    }
                                ?>" name="fun_fact_bg">
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