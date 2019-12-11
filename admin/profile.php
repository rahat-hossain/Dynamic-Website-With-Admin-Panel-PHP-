<?php
    session_start();
    $title = "profile info";

    require_once 'check_access.php';
    require_once '../header.php';
    require_once '../db.php';
    require_once 'navbar.php'; 

    $email = $_SESSION['user_email'];

    $get_query = "SELECT name, email, phone_number FROM users WHERE email='$email'";
    $from_db = mysqli_query($db_connect , $get_query);
    $after_assoc = mysqli_fetch_assoc($from_db);
    // print_r($after_assoc);
?>


<div class="container">
    <div class="row">
        <div class="col-12 bg-dark mt-3">
            <div class="card bg-light mb-3 mt-3">
                <div class="card-header bg-info">
                    <h4>Profile Information
                        <a class="btn btn-sm btn-warning" href="profile_edit.php">Edit</a>
                    </h4>
                </div>
                <div class="card-body">
                    <p><b>Name : </b><?= $after_assoc['name'] ?> </p>
                    <p><b>Email :  </b><?= $after_assoc['email'] ?> </p>
                    <p><b>Phone Number :  </b><?= $after_assoc['phone_number'] ?> </p>
                </div>
            </div>
        </div>
    </div>
</div>



<?php
require_once '../footer.php';
?>