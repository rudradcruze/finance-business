<?php

    require_once 'is_admin.php';
    $_SESSION['title'] = "Service Item";
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
                        <h5 class="card-title">Service Item list table</h5>
                    </div>
                    <div class="card-body">
                    <table class="table table-bordered">
                        <thead class="bg-light">
                            <th>Service Head</th>
                            <th>Service Details</th>
                            <th>Image</th>
                            <th>Action</th>
                        </thead>

                        <tbody class="table-striped">
                            <?php foreach($from_db as $service_item): ?>
                            <tr>
                                <td><?= $service_item['service_item_head'] ?></td>
                                <td><?= $service_item['service_item_detail'] ?></td>
                                <td>
                                    <img style="width: 100px;" src="../<?= $service_item['image_location'] ?>" alt="Service Item Image">
                                </td>
                                <td>
                                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic mixed styles example">
                                        <?php if($service_item['active_status'] == '1'): ?>
                                            <a href="service_item_status.php?item_id=<?=$service_item['id']?>&status=0" class="btn btn-warning">Disable</a>
                                        <?php
                                            else:
                                            $get_activated_query = "SELECT COUNT(*) AS total_activate FROM service_items WHERE active_status = 1";
                                            $result_activated_db = mysqli_query($db_connect, $get_activated_query);
                                            $after_assoc_activated = mysqli_fetch_assoc($result_activated_db);
                                            if($after_assoc_activated['total_activate'] < 3) :
                                        ?>
                                            <a href="service_item_status.php?item_id=<?=$service_item['id']?>&status=1" class="btn btn-success">Activate</a>
                                            <?php else: ?>
                                            <button type="button" disabled class="disable btn btn-success">Activate</button>
                                            <?php endif ?>
                                        <?php endif ?>
                                        <a href="service_item_edit.php?item_id=<?=$service_item['id']?>" class="btn btn-info">Edit</a>
                                        <button type="button" value="service_item_status.php?item_id=<?=$service_item['id']?>&status=2" class="btn deleteBtn btn-danger <?php
                                            if($service_item['active_status'] == 1){
                                                echo "disabled";
                                            }
                                        ?>">Delete</button>
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
            title: '<?=$_SESSION['service_heading_success']?>'
        })

<?php
    unset($_SESSION['service_heading_success']);
    endif
?>

<?php if(isset($_SESSION['service_item_activated'])) : ?>

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
            title: '<?=$_SESSION['service_item_activated']?>'
        })

<?php
    unset($_SESSION['service_item_activated']);
    endif
?>

<?php if(isset($_SESSION['service_item_deactivated'])) : ?>
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
        title: '<?= $_SESSION['service_item_deactivated'] ?>',
    })
<?php 
    endif;
    unset($_SESSION['service_item_deactivated']);
?>

<?php if(isset($_SESSION['service_item_deleted'])) : ?>
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
        iconColor: 'rgb(221, 51, 51)',
        icon: 'info',
        title: '<?= $_SESSION['service_item_deleted'] ?>',
    })
    <?php 
        endif;
        unset($_SESSION['service_item_deleted']);
    ?>

// Service item Delete 
$('.deleteBtn').click(function(){
    var link = $(this).val();
    Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if(result.isConfirmed){
            window.location.href = link;
        }
    })
});
</script>