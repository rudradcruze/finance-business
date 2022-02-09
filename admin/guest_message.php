<?php 
    require_once 'is_admin.php';
    $_SESSION['title'] = "Guest Message";
    require_once('../header.php');
    require_once('navbar.php');
    require_once('../db.php');

    $get_query = "SELECT * FROM guest_messages";
    $from_db = mysqli_query($db_connect, $get_query);
?>

<section>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="card mt-5">
                        <div class="card-header bg-success text-white">
                            <h5 class="card-title text-capitalize">Guest Message List</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <form action="guest_message_marked_status.php" method="post">
                                    <thead>
                                        <th>SL</th>
                                        <th>Guest Name</th>
                                        <th>Guest Email</th>
                                        <th>Message</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <input type="checkbox" class="btn-check" id="select-all" autocomplete="off">
                                                <label class="btn btn-primary btn-sm" for="select-all">Select All</label>
                                            </td>
                                        </tr>
                                        <?php foreach ($from_db as $key => $messages) : ?>
                                        <tr class="
                                            <?php 
                                                if($messages['read_status'] == 1){
                                                    echo "bg-info";
                                                }else {
                                                    echo "text-dark";
                                                }
                                            ?>
                                        ">
                                            <td><?php
                                                    echo $key + 1;
                                                    if($messages['read_status'] != 1) :
                                                ?>
                                                <input class="form-check-input" name="delete_marked[<?=$messages['id']?>]" type="checkbox">
                                                <?php endif ?>
                                            </td>
                                            <td><?= $messages['guest_name']?></td>
                                            <td><a class="text-dark" href="mailto:<?= $messages['guest_email']?>"><?= $messages['guest_email']?></a></td>
                                            <td><?= $messages['guest_message']?></td>
                                            <td>
                                                <?php if ($messages['read_status'] == 1): ?>
                                                    <a href="message_status.php?message_id=<?= $messages['id']?>&read_status=<?=$messages['read_status']; ?>" class="btn btn-sm btn-warning">Mark as read</a>

                                                <?php elseif($messages['read_status'] == 0): ?>

                                                    <a href="message_status.php?message_id=<?= $messages['id']?>&read_status=<?=$messages['read_status']; ?>" class="btn btn-sm btn-success">Mark as unread</a>

                                                    <button value="message_status.php?message_id=<?= $messages['id']?>&read_status=2" type="button" class="btn btn-sm btn-danger deleteBtn">Delete</button>

                                                <?php endif ?>
                                            </td>
                                        </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td>
                                                <button type="submit" class="btn btn-danger">Delete Marked</button>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </form>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php 
    require_once('../footer.php');
?>

<script>
    document.getElementById('select-all').onclick = function() {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    for (var checkbox of checkboxes) {
        checkbox.checked = this.checked;
    }
}
</script>

<script>

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

<?php if(isset($_SESSION['delete'])) : ?>

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
            icon: 'success',
            title: '<?= $_SESSION['delete']?>'
        })
    </script>
<?php 
    endif;
    unset($_SESSION['delete']);
?>