<?php
    session_start();
    $title = "profile edit";

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
                    <h4>Profile Edit</h4>
                </div>
                <div class="card-body">
                    <form action="profile_edit_post.php" method="post">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="hidden"  name="email" class="form-control" value="<?= $after_assoc['email'] ?>">
                            <input type="text"  name="user_name" class="form-control" value="<?= $after_assoc['name'] ?>">
                            
                        </div>
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="text"  name="phone_number" class="form-control" value="<?= $after_assoc['phone_number'] ?>">
                        </div>
                        <button type="submit" class="btn btn-primary">save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<?php
require_once '../footer.php';
?>