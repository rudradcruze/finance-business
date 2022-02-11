<?php
    function alert_success($session_title) {
        if(isset($_SESSION[$session_title])) :
?>

            <script>
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
                        title: '<?=$_SESSION[$session_title]?>',
                    })
            </script>
          
<?php
        unset($_SESSION[$session_title]);
        endif;
    }
?>

<?php
    function alert_warning($session_title){
        if(isset($_SESSION[$session_title])) :
?>
            <script>
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
                    title: '<?= $_SESSION[$session_title] ?>',
                })
            </script>
<?php 
        endif;
        unset($_SESSION[$session_title]);
    }
?>


<?php
    function alert_delete($session_title){
        if(isset($_SESSION[$session_title])) :
?>
            <script>
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
                    title: '<?= $_SESSION[$session_title] ?>',
                })
            </script>
<?php 
        endif;
        unset($_SESSION[$session_title]);
    }
?>

<?php function alert_delete_warning($btn){ ?>

    <script>
        $(<?php 
            echo "'.". $btn . "'";
        ?>).click(function(){
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
<?php } ?>