<?php

session_start();
require_once 'db.php';
// print_r($_POST);

$user_name = $_POST['user_name'];
$email = $_POST['email'];
$phone_number = $_POST['phone_number'];
$password = $_POST['password'];
$retype_password = $_POST['retype_password'];


$after_sanitize_email = filter_var($email , FILTER_SANITIZE_EMAIL);

//------------------checking password
$if_capital = preg_match("@[A-Z]@" , $password);
$if_small = preg_match("@[a-z]@" , $password);
$if_number = preg_match("@[0-9]@" , $password);
//------------------checking name
$if_name = preg_match("/^[a-zA-Z ]*$/" , $user_name);



//---------------email validation
if(!filter_var($after_sanitize_email , FILTER_VALIDATE_EMAIL))
{
    $_SESSION['err_msg_email'] = "This is  an invalid email address";
    header("location: register.php");
}
else
{
    if($if_capital == 1 && $if_small == 1 && $if_number == 1 && strlen($password)>=8)
    {
        //-------------------check phone number
        if(strlen($phone_number)<=11)
        {
            if($password == $retype_password)
            {
                $encrepted_password = md5($password);

                //---------------------checking email already exist or not
                $checking_query = "SELECT COUNT(*) AS total_count FROM users WHERE email='$after_sanitize_email'";
                $after_checking = mysqli_query($db_connect,$checking_query);
                $after_assoc = mysqli_fetch_assoc($after_checking);

                if($after_assoc['total_count'] == 0)
                {
                    if($if_name == 1)
                    {
                        $insert_query = "INSERT INTO users(name, email, phone_number, password) VALUES('$user_name' , '$after_sanitize_email' , '$phone_number' , '$encrepted_password')";
                        mysqli_query($db_connect,$insert_query);
                        $_SESSION['suc_msg'] = "Registration Successful!!";
                        header("location: register.php");
                                
                    }
                    else
                    {
                        $_SESSION['err_msg_name'] = "no tag or symbol is allowed in name";
                        header("location: register.php");
                                
                    }
                        
                }
                else
                {
                    $_SESSION['err_msg'] = "this email already exist";
                    header("location: register.php");
                        
                }       
            }
            else
            {
                $_SESSION['err_msg_retype_password'] = "password is not same";
                header("location: register.php");
            }
        }
        else
        {
            $_SESSION['err_msg_number'] = "please enter 11 digit phone number or less";
            header("location: register.php");
                
        }
    }
    else
    {
        $_SESSION['err_msg_pass'] = "password should have 1 capital,1 small,1 number and minimum 8 length";
        header("location: register.php");
        
    }
}

?>