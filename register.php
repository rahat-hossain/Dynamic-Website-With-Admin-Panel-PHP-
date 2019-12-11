<?php
session_start();
$title = "Regiter";
require_once 'header.php';
?>

<body>
    <div id="reg">
        <h3 class="text-center text-white pt-2 a">Registration form</h3>
        <div class="container">
            <div id="reg-row" class="row justify-content-center align-items-center">
                <div id="reg-column" class="col-md-6">
                    <div id="reg-box" class="col-md-12">
                        <form id="reg-form" class="form" action="register_post.php" method="post">
                            <!-- <h3 class="text-center text-info">Registration</h3> -->
<!-- ----------------------------------------------name--------------------------------- -->
                            <div class="form-group">
                                <label class="text-info">Name:</label><br>
                                <input type="text" name="user_name" class="form-control" placeholder="enter your name">

                                <?php
                                    if(isset($_SESSION['err_msg_name']))
                                    {
                                ?>
                                <span class=text-danger>
                                    <?php
                                        echo $_SESSION['err_msg_name'];
                                        unset($_SESSION['err_msg_name']);
                                    ?>
                                </span>
                                <?php
                                    }
                                ?>

                            </div>
<!-- ----------------------------------------------email--------------------------------- -->
                            <div class="form-group">
                                <label class="text-info">Email:</label><br>
                                <input type="email" name="email" class="form-control" placeholder="enter your email">
                                <?php
                                    if(isset($_SESSION['err_msg_email']))
                                    {
                                ?>
                                <span class=text-danger>
                                    <?php
                                        echo $_SESSION['err_msg_email'];
                                        unset($_SESSION['err_msg_email']);
                                    ?>
                                </span>
                                <?php
                                    }
                                ?>
                            </div>
<!-- ----------------------------------------------number--------------------------------- -->                            
                            <div class="form-group">
                                <label class="text-info">Phone Number:</label><br>
                                <input type="text" name="phone_number" class="form-control" placeholder="enter your phone number">

                                <?php
                                    if(isset($_SESSION['err_msg_number']))
                                    {
                                ?>
                                <span class=text-danger>
                                    <?php
                                        echo $_SESSION['err_msg_number'];
                                        unset($_SESSION['err_msg_number']);
                                    ?>
                                </span>
                                <?php
                                    }
                                ?>

                            </div>
<!-- ----------------------------------------------password--------------------------------- -->
                            <div class="form-group">
                                <label class="text-info">Password:</label><br>
                                <input type="password" name="password" class="form-control" placeholder="enter your password">

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
<!-- ----------------------------------------------retype password--------------------------------- -->
                            <div class="form-group">
                                <label class="text-info">Retype Password:</label><br>
                                <input type="password" name="retype_password" class="form-control" placeholder="enter your password again">

                                <?php
                                    if(isset($_SESSION['err_msg_retype_password']))
                                    {
                                ?>
                                <span class=text-danger>
                                    <?php
                                        echo $_SESSION['err_msg_retype_password'];
                                        unset($_SESSION['err_msg_retype_password']);
                                    ?>
                                </span>
                                <?php
                                    }
                                ?>

                            </div>


                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-primary btn-md" value="Register">
                                <a href="login.php">Login</a>
                            </div>

                            

                        </form>
                    </div>
                </div>
            </div>
            </br>
           

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
    </div>
</body>

<?php
require_once 'footer.php';
?>