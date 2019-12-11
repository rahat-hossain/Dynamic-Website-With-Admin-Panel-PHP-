<?php
    session_start();
    $title = "change password";

    require_once 'check_access.php';
    require_once '../header.php';
    require_once '../db.php';
    require_once 'navbar.php'; 

    $email = $_SESSION['user_email'];

    $get_query = "SELECT name, email, phone_number FROM users WHERE email='$email'";
    $from_db = mysqli_query($db_connect , $get_query);
    $after_assoc = mysqli_fetch_assoc($from_db);
    //print_r($after_assoc);
?>


<div class="container">
    <div class="row">
        <div class="col-12 bg-dark mt-3">
            <div class="card bg-light mb-3 mt-3">
                <div class="card-header bg-warning">
                    <h4>Change password</h4>
                </div>
                <div class="card-body">
                    <form action="change_password_post.php" method="post">
                        <div class="form-group">
                            <label>Old Password</label>
                            <input type="hidden"  name="email" class="form-control" value="<?= $after_assoc['email'] ?>">
                            <input type="password"  name="old_password" class="form-control">
                            
                            <?php
                                if(isset($_SESSION['err_msg']))
                                {
                            ?>
                            <span class=text-danger>
                            <?php
                                echo $_SESSION['err_msg'];
                                unset($_SESSION['err_msg']);
                            ?>
                            </span>
                            <?php
                                }
                            ?>

                        </div>
                        <div class="form-group">
                            <label>New Password</label>
                            <input type="password"  name="new_password" class="form-control">

                            <?php
                                if(isset($_SESSION['err_msg_same']))
                                {
                            ?>
                            <span class=text-danger>
                            <?php
                                echo $_SESSION['err_msg_same'];
                                unset($_SESSION['err_msg_same']);
                            ?>
                            </span>
                            <?php
                                }
                            ?>

                            <?php
                                if(isset($_SESSION['err_msg_pass']))
                                {
                            ?>
                            <span class=text-danger>
                                <?php
                                    echo $_SESSION['err_msg_pass'];
                                    unset($_SESSION['err_msg_pass']);
                                ?>
                            </span>
                            <?php
                                }
                            ?>

                        </div>
                        <button type="submit" class="btn btn-warning">change</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
    if(isset($_SESSION['suc_msg']))
    {
    ?>
    <div class="alert alert-success text-center" role="alert">
    <?php
        echo $_SESSION['suc_msg'];
        unset($_SESSION['suc_msg']);
    ?>
    </div>
    <?php    
    }
    ?>

</div>




<?php
require_once '../footer.php';
?>