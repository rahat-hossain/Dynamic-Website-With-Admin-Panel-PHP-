<?php
require_once '../db.php';

$banner_id = $_GET['banner_id'];

// fisrt folder theke delete
$get_query = "SELECT photo_location FROM banners WHERE id = $banner_id";
$from_db = mysqli_query($db_connect, $get_query);
$after_assoc = mysqli_fetch_assoc($from_db );
// print_r($after_assoc['photo_location']);
unlink("../".$after_assoc['photo_location']);

// then db theke delete
$delete_query = "DELETE FROM banners WHERE id = $banner_id";
mysqli_query($db_connect, $delete_query);
header('location: add_banner.php');
?>