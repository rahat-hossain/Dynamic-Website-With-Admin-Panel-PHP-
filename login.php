<?php
session_start();
$title = "Login";

//login ase kina check korbe..jodi thake tahole dashboard a niye jabe
if(isset($_SESSION['user_status']))
    {
        header('location: admin/dashboard.php');
   
    }

    
require_once 'header.php';
?>

<body>
    <div id="reg">
        <h3 class="text-center text-white pt-2 a">Login form</h3>
        <div class="container">
            <div id="reg-row" class="row justify-content-center align-items-center">
                <div id="reg-column" class="col-md-6">
                    <div id="reg-box" class="col-md-12">
                        <form id="reg-form" class="form" action="login_post.php" method="post">
                            <h3 class="text-center text-info">LOGIN</h3>

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

                           <button type="submit" class="btn btn-info">Login</button>

                        </form>
                                <?php
                                    if(isset($_SESSION['login_err']))
                                    {
                                ?>
                                <div class="alert alert-danger" role="alert">
                                <?php
                                        echo $_SESSION['login_err'];
                                        unset($_SESSION['login_err']);
                                    ?>
                               </div>
                                <?php
                                    }
                                ?>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
</body>

<?php
require_once 'footer.php';
?>