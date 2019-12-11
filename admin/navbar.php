<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #82a0ad;">
  <a class="navbar-brand" href="#">Admin Dashboard</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="dashboard.php">Dashboard <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../index.php" target="_blank">Visit Website</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="add_banner.php">Add Banner</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="add_service.php">Add Services</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="guest_message.php">
          Guest Message
          <!------------- unread message count  ---------------->
          <?php
            require_once '../db.php';
            $get_total_message_query = "SELECT COUNT(*) AS total_unread_message FROM messages WHERE read_status = 1";
            $total_message_from_db = mysqli_query($db_connect , $get_total_message_query);
            $after_assoc = mysqli_fetch_assoc($total_message_from_db);
            
          ?>
          <span class="badge badge-danger">
            <?php
              print_r($after_assoc['total_unread_message']);
            ?>
          </span>
        </a>
      </li>

      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    
            <?php
              echo $_SESSION['user_email'];
            ?>
         
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="profile.php">Profile</a>
            <a class="dropdown-item" href="change_password.php">Change Password</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="logout.php"><span class="text-danger">Logout</span></a>
          </div>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>