<?php

    require_once 'is_admin.php';
    require_once '../header.php';
    require_once 'navbar.php';
    require_once '../db.php';

    $get_query = "SELECT * FROM fun_facts";
    $from_db = mysqli_query($db_connect, $get_query);
?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="card mt-4">
                    <div class="card-header">
                        <h5 class="card-title text-success text-capitalize">Fun-Fact Heading Add form</h5>
                    </div>
                    <div class="card-body">
                        <form action="fun_fact_post.php" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label">Sub Heading</label>
                                <input type="text" name="sub_head" class="form-control <?php
                                    if (isset($_SESSION['sub_head_null'])) {
                                        echo $_SESSION['sub_head_null'];
                                        unset($_SESSION['sub_head_null']);
                                    }
                                ?>" value="<?php
                                    if (isset($_SESSION['sub_head_fill'])) {
                                        echo $_SESSION['sub_head_fill'];
                                    }
                                ?>">
                                <?php
                                    if (isset($_SESSION['sub_null'])):
                                ?>
                                    <small class="text-danger">
                                        <?php 
                                            echo $_SESSION['sub_null'];
                                            unset($_SESSION['sub_null']);
                                        ?>
                                    </small>
                                <?php
                                    endif
                                ?>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">White Heading</label>
                                <input type="text" name="white_head" class="form-control <?php
                                    if (isset($_SESSION['white_head_null'])) {
                                        echo $_SESSION['white_head_null'];
                                        unset($_SESSION['white_head_null']);
                                    }
                                ?>" value="<?php
                                    if (isset($_SESSION['white_head_fill'])) {
                                        echo $_SESSION['white_head_fill'];
                                    }
                                ?>">
                                <?php
                                    if (isset($_SESSION['white_null'])):
                                ?>
                                    <small class="text-danger">
                                        <?php 
                                            echo $_SESSION['white_null'];
                                            unset($_SESSION['white_null']);
                                        ?>
                                    </small>
                                <?php
                                    endif
                                ?>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Green Heading</label>
                                <input type="text" name="green_head" class="form-control <?php
                                    if (isset($_SESSION['green_head_null'])) {
                                        echo $_SESSION['green_head_null'];
                                        unset($_SESSION['green_head_null']);
                                    }
                                ?>" value="<?php
                                    if (isset($_SESSION['green_head_fill'])) {
                                        echo $_SESSION['green_head_fill'];
                                    }
                                ?>">
                                <?php
                                    if (isset($_SESSION['green_null'])):
                                ?>
                                    <small class="text-danger">
                                        <?php 
                                            echo $_SESSION['green_null'];
                                            unset($_SESSION['green_null']);
                                        ?>
                                    </small>
                                <?php
                                    endif
                                ?>
                            </div>
                            
                            <div class="mb-4">
                                <label class="form-label">Paragraph One</label>
                                <textarea name="paragraph_one" style="resize: none;" cols="30" rows="4" class="form-control <?php
                                    if (isset($_SESSION['paragraph_one_null'])) {
                                        echo $_SESSION['paragraph_one_null'];
                                        unset($_SESSION['paragraph_one_null']);
                                    }
                                ?>"><?php 
                                    if(isset($_SESSION['paragraph_one_fill'])) {
                                        echo $_SESSION['paragraph_one_fill'];
                                    }
                                ?></textarea>
                                <?php if (isset($_SESSION['para_one_null'])): ?>
                                    <small class="text-danger">
                                        <?php 
                                            echo $_SESSION['para_one_null'];
                                            unset($_SESSION['para_one_null']);
                                        ?>
                                    </small>
                                <?php
                                    endif
                                ?>
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Paragraph Two</label>
                                <textarea name="paragraph_two" style="resize: none;" cols="30" rows="4" class="form-control <?php
                                    if (isset($_SESSION['paragraph_two_null'])) {
                                        echo $_SESSION['paragraph_two_null'];
                                        unset($_SESSION['paragraph_two_null']);
                                    }
                                ?>"><?php 
                                    if(isset($_SESSION['paragraph_two_fill'])) {
                                        echo $_SESSION['paragraph_two_fill'];
                                    }
                            ?></textarea>
                            <?php
                                if (isset($_SESSION['para_two_null'])):
                            ?>
                                <small class="text-danger">
                                    <?php 
                                        echo $_SESSION['para_two_null'];
                                        unset($_SESSION['para_two_null']);
                                    ?>
                                </small>
                            <?php
                                endif
                            ?>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Background Image</label>
                                <input type="file" name="fun_fact_bg_image" class="form-control <?php
                                    if ($_SESSION['fun_fact_bg_image_null']) {
                                        echo $_SESSION['fun_fact_bg_image_null'];
                                        unset($_SESSION['fun_fact_bg_image_null']);
                                    }

                                    if(isset($_SESSION['fun_fact_bg_image_big'])) {
                                        echo $_SESSION['fun_fact_bg_image_big'];
                                        unset($_SESSION['fun_fact_bg_image_big']);
                                    }

                                    if (isset($_SESSION['fun_fact_bg_image_extension'])) {
                                        echo $_SESSION['fun_fact_bg_image_extension'];
                                        unset($_SESSION['fun_fact_bg_image_extension']);
                                    }
                                ?>">
                                <?php if(isset($_SESSION['fun_fact_image_null'])) : ?>
                                    <small class="text-danger">
                                        <?php
                                            $_SESSION['fun_fact_image_null'];
                                            unset($_SESSION['fun_fact_image_null']);
                                        ?>
                                    </small>
                                <?php endif ?>

                                <?php if(isset($_SESSION['fun_fact_image_big'])) : ?>
                                    <small class="text-danger">
                                        <?php
                                            echo $_SESSION['fun_fact_image_big'];
                                            unset($_SESSION['fun_fact_image_big']);
                                        ?>
                                    </small>
                                <?php endif ?>

                                <?php if(isset($_SESSION['fun_fact_image_extension'])) : ?>
                                    <small class="text-danger">
                                        <?php
                                            echo $_SESSION['fun_fact_image_extension'];
                                            unset($_SESSION['fun_fact_image_extension']);
                                        ?>
                                    </small>
                                <?php endif ?>
                            </div>

                            <?php
                                // Unset the fill value again... if any error happen
                                unset($_SESSION['sub_head_fill']);
                                unset($_SESSION['white_head_fill']);
                                unset($_SESSION['green_head_fill']);
                                unset($_SESSION['green_head_fill']);
                                unset($_SESSION['paragraph_one_fill']);
                                unset($_SESSION['paragraph_two_fill']);
                            ?>
                            
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

                    <?php if (isset($_SESSION['fun_fact_head_success'])) : ?>
                    <div class="alert alert-success" role="alert">
                        <?php
                            echo $_SESSION['fun_fact_head_success'];
                            unset($_SESSION['fun_fact_head_success']);
                        ?>
                    </div>
                    <?php endif ?>

                    <?php if (isset($_SESSION['fun_fact_head_delete'])) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php
                            echo $_SESSION['fun_fact_head_delete'];
                            unset($_SESSION['fun_fact_head_delete']);
                        ?>
                    </div>
                    <?php endif ?>

                    <?php if (isset($_SESSION['fun_fact_activated'])) : ?>
                    <div class="alert alert-success" role="alert">
                        <?php
                            echo $_SESSION['fun_fact_activated'];
                            unset($_SESSION['fun_fact_activated']);
                        ?>
                    </div>
                    <?php endif ?>

                    <?php if (isset($_SESSION['fun_fact_head_edit_ss'])) : ?>
                    <div class="alert alert-success" role="alert">
                        <?php
                            echo $_SESSION['fun_fact_head_edit_ss'];
                            unset($_SESSION['fun_fact_head_edit_ss']);
                        ?>
                    </div>
                    <?php endif ?>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Sl:</th>
                                <th>Sub Head</th>
                                <th>White Head</th>
                                <th>Green Head</th>
                                <th>Paragraph One</th>
                                <th>Paragraph Two</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php foreach ($from_db as $key => $fun_fact_head) : ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><?= $fun_fact_head['sub_head'] ?></td>
                                    <td><?= $fun_fact_head['white_head'] ?></td>
                                    <td><?= $fun_fact_head['green_head'] ?></td>
                                    <td><?= $fun_fact_head['paragraph_one'] ?></td>
                                    <td><?= $fun_fact_head['paragraph_two'] ?></td>
                                    <td>
                                        <img style="width: 120px;" src="../<?= $fun_fact_head['image_location'] ?>" alt="Image Location">
                                    </td>
                                    <td>
                                        <?php if($fun_fact_head['active_status'] == 1): ?>
                                            <span class="badge rounded bg-success">Active</span>
                                        <?php else: ?>
                                                <span class="badge rounded text-dark bg-warning">Disable</span>
                                        <?php endif ?>
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm d-flex flex-column" role="group" aria-label="Basic mixed styles example">
                                            <?php 
                                                if($fun_fact_head['active_status'] == 1):
                                                $_SESSION['delete_disable'] = "disabled";
                                            ?>
                                                <a href="" class="btn btn-warning my-1 disabled">Disable</a>
                                            <?php
                                                else:
                                                unset($_SESSION['delete_disable']);    
                                            ?>
                                                <a href="fun_fact_status.php?fun_fact_id=<?= $fun_fact_head['id'] ?>&status=1" class="btn btn-success my-1">Activate</a>
                                            <?php endif ?>
                                            <a href="fun_fact_head_edit.php?fun_fact_id=<?= $fun_fact_head['id'] ?>" class="btn btn-info my-1">Edit</a>
                                            <a href="<?php
                                                if (!isset($_SESSION['delete_disable'])) {
                                                    echo "fun_fact_status.php?fun_fact_id =" . $fun_fact_head['id'] . "&status=2    ";
                                                }
                                            ?>" class="btn btn-danger my-1 <?php
                                                if ($_SESSION['delete_disable']) {
                                                    echo $_SESSION['delete_disable'];
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