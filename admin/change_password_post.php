<?php
session_start();

require_once '../db.php';

$email = $_POST['email'];
$old_password = md5($_POST['old_password']);
$new_password = md5($_POST['new_password']);

$checking_query = "SELECT COUNT(*) AS total_count FROM users WHERE email = '$email' AND password = '$old_password'";
$from_db = mysqli_query($db_connect , $checking_query);
$after_assoc = mysqli_fetch_assoc($from_db);


//------------------checking password
$if_capital = preg_match("@[A-Z]@" , $_POST['new_password']);
$if_small = preg_match("@[a-z]@" , $_POST['new_password']);
$if_number = preg_match("@[0-9]@" , $_POST['new_password']);


if($old_password == $new_password)
{
    $_SESSION['err_msg_same'] = "old password and new password is same";
    header("location: change_password.php");
}
else
{
    
        if($after_assoc['total_count'] == 1)
        {

            if($if_capital == 1 && $if_small == 1 && $if_number == 1 && strlen($new_password)>=8)
            {
                $update_query = "UPDATE users SET password = '$new_password' WHERE email = '$email'";
                mysqli_query($db_connect , $update_query);
                $_SESSION['suc_msg'] = "password changed Successfully!!";
                header("location: change_password.php");
                
            }
            else
            {
                $_SESSION['err_msg_pass'] = "password should have 1 capital,1 small,1 number and minimum 8 length";
                header("location: change_password.php");
            }
            
        }
        else
        {
            $_SESSION['err_msg'] = "old password is wrong";
            header("location: change_password.php");
    
        }
}


    


// print_r($after_assoc);
?>