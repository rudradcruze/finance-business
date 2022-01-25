    <?php 
    require_once('header.php');
    ?>
    <div class="card mx-auto mt-5" style="width: 45%;">
        <div class="card-header text-center">
            <h2>Registration Form</h2>
        </div>
        <div class="card-body">

            <form action="register_post.php" method="post">

                <input type="text" name="fullName" required placeholder="Full Name" class="form-control my-3">
                <input type="text" name="userName" required placeholder="User Name" class="form-control my-3">
                <input type="text" name="numberNumber" required placeholder="Mobile Number" class="form-control my-3">
                <input type="email" name="email" required placeholder="Email Address" class="form-control my-3">
                <input type="password" name="password" placeholder="Password" class="form-control my-3" required>

                <button type="submit" class="btn btn-success" name="submit">Register Now</button>
            </form>

        </div>
    </div>
    <?php 
    require_once('footer.php');
    ?>