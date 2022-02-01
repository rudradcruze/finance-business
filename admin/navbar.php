<nav class="navbar navbar-expand-lg navbar-dark bg-success">
  <div class="container">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="dashboard.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../index.php" target="_blank">Visit Website</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Frontend</a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="guest_message.php">Guest Message<span class="badge bg-warning ms-2">
              <?php
                require_once '../db.php';
                $get_message_notification_query = "SELECT COUNT(*) AS message_notification FROM guest_messages WHERE read_status='1'";
                $db_result = mysqli_query($db_connect, $get_message_notification_query);
                $after_assoc = mysqli_fetch_assoc($db_result);
                
                echo $after_assoc['message_notification'];
              ?>
            </span></a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="banner.php">Banner</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="fun_fact_head.php">Fun-Fact Heading</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Service</a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="service_head.php">Service Heading</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="service_item.php">Service Item</a></li>
          </ul>
        </li>

        <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Fun Fact</a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="fun_fact_head.php">Heading</a></li>
          </ul>
        </li> -->
      </ul>
      <div class="dropdown">
        <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
          <?= $_SESSION['email']; ?>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
          <li><a class="dropdown-item" href="profile.php">Profile</a></li>
          <li><a class="dropdown-item" href="change_password.php">Change Password</a></li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li><a class="dropdown-item text-danger" href="../logout.php">Log Out</a></li>
        </ul>
      </div>
    </div>
  </div>
</nav>