<?php

    require_once 'is_admin.php';
    $_SESSION['title'] = "Service head";
    require_once '../header.php';
    require_once 'navbar.php';
    require_once '../db.php';

?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="card mt-4">
                    <div class="card-header">
                        <h5 class="card-title text-success text-capitalize">Service Heading Add form</h5>
                    </div>
                    <div class="card-body">
                        <form action="service_head_post.php" method="post">
                            <?php
                                if (isset($_SESSION['service_null'])):
                            ?>
                            <div class="alert alert-danger" role="alert">
                                <?php
                                    echo $_SESSION['service_null'];
                                    unset($_SESSION['service_null']);
                                ?>
                            </div>
                            <?php
                                endif
                            ?>
                            <div class="mb-3">
                                <label class="form-label">Black Heading</label>
                                <input type="text" required name="black_heading" class="form-control <?php
                                    if (isset($_SESSION['black_null_error'])) {
                                        echo $_SESSION['black_null_error'];
                                        unset($_SESSION['black_null_error']);
                                    }
                                ?>" value="<?php
                                    if (isset($_SESSION['error_check']) && $_SESSION['error_check'] == 0) {
                                        echo $_SESSION['black_heading_fill'];
                                    }
                                ?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Green Heading</label>
                                <input type="text" required name="green_heading" class="form-control <?php
                                    if (isset($_SESSION['green_null_error'])) {
                                        echo $_SESSION['green_null_error'];
                                        unset($_SESSION['green_null_error']);
                                    }
                                ?>" value="<?php
                                    if (isset($_SESSION['error_check']) && $_SESSION['error_check'] == 0) {
                                        echo $_SESSION['green_heading_fill'];
                                    }
                                ?>">
                            </div>
                            
                            <div class="mb-4">
                                <label class="form-label">Sub Heading</label>
                                <input type="text" required name="service_sub_head" class="form-control <?php
                                    if (isset($_SESSION['sub_head_null_error'])) {
                                        echo $_SESSION['sub_head_null_error'];
                                        unset($_SESSION['sub_head_null_error']);
                                    }
                                ?>" value="<?php
                                    if (isset($_SESSION['error_check']) && $_SESSION['error_check'] == 0) {
                                        echo $_SESSION['service_sub_head_fill'];
                                        unset($_SESSION['black_heading_fill']);
                                        unset($_SESSION['green_heading_fill']);
                                        unset($_SESSION['sub_head_null_error']);
                                        unset($_SESSION['error_check']);
                                    }
                                ?>">
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
            <div class="col-lg-8">
                <div class="card mt-4">
                    <div class="card-header">
                        <h5 class="card-title text-capitalize">Service Heading list table</h5>
                    </div>
                    <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <th>Black Head</th>
                            <th>Green Head</th>
                            <th>Sub Head</th>
                            <th>Action</th>
                        </thead>

                        <tbody class="table-striped">
                            <?php
                                foreach(get_all('service_heads') as $service_head) :
                            ?>
                            <tr>
                                <td><?= $service_head['black_head'] ?></td>
                                <td><?= $service_head['green_head'] ?></td>
                                <td><?= $service_head['service_sub_head'] ?></td>
                                <td>
                                    <?php if($service_head['active_status'] == 0): ?>
                                        <a href="service_head_status.php?service_head_id=<?= $service_head['id']?>&status=1" class="btn btn-info">Active</a>
                                    <?php else: ?>
                                        <a href="service_head_status.php?service_head_id=<?= $service_head['id']?>&status=0" class="btn btn-warning">De-Active</a>
                                    <?php endif ?>
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

<?php require_once '../footer.php'; ?>

<script>
    <?php if(isset($_SESSION['service_heading_success'])) : ?>

        const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
        })

        Toast.fire({
            icon: 'success',
            title: '<?= $_SESSION['service_heading_success']?>'
        })

    <?php 
        endif;
        unset($_SESSION['service_heading_success']);
    ?>

    <?php if(isset($_SESSION['service_head_activated'])) : ?>

        const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })

    Toast.fire({
        icon: 'success',
        title: '<?= $_SESSION['service_head_activated']?>'
    })

<?php 
    endif;
    unset($_SESSION['service_head_activated']);
?>

<?php if(isset($_SESSION['service_head_deactivated'])) : ?>
    const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
    })

    Toast.fire({
        iconColor: '#f8bb86',
        icon: 'info',
        title: '<?= $_SESSION['service_head_deactivated'] ?>',
    })
<?php 
    endif;
    unset($_SESSION['service_head_deactivated']);
?>
</script>