<?php 

require_once '../db.php'; 

$banner_id = $_GET['banner_id'];

$update_query1 = "UPDATE banners SET active_status = 1 WHERE id = $banner_id";
$update_query2 = "UPDATE banners SET active_status = 2 WHERE id != $banner_id";
mysqli_query($db_connect , $update_query1);
mysqli_query($db_connect , $update_query2);
header("location: add_banner.php");
?>