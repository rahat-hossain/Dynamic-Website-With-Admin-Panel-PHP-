<?php
session_start();
    
require_once '../db.php';

$email = $_POST['email'];
$user_name = $_POST['user_name'];
$phone_number = $_POST['phone_number'];

$update_query = "UPDATE users SET name='$user_name' , phone_number='$phone_number' WHERE email='$email'";
mysqli_query($db_connect , $update_query);

header('location: profile.php');



?>