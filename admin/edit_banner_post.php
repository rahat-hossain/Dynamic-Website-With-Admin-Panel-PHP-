<?php
session_start();
require_once '../db.php';
// print_r($_POST);

$banner_id = $_POST['banner_id'];
$banner_title = $_POST['banner_title'];
$banner_subtitle = $_POST['banner_subtitle'];

// print_r($_FILES['banner_image']);

$update_query = "UPDATE banners SET banner_title='$banner_title' , banner_subtitle='$banner_subtitle' WHERE id='$banner_id'";
mysqli_query($db_connect , $update_query);
header("location: add_banner.php");

// if($_FILES['banner_image'] ['name'])
// {
//     $uploded_file_original_name = $_FILES['banner_image']['name'];
//     $after_explode = explode('.' , $uploded_file_original_name);
//     $original_extension = end($after_explode); 
//     $excepted_extensions = array('jpg', 'jpeg', 'png', 'JPG', 'JPEG', 'PNG');

//     if(in_array($original_extension, $excepted_extensions))
//     {
//         if($_FILES['banner_image']['size'] <= 2000000)
//         {
//             $get_query = "SELECT photo_location FROM banners WHERE id=$banner_id";
//             $banner_info = mysqli_query($db_connect , $get_query);
//             $after_assoc_banner_info = mysqli_fetch_assoc($banner_info);
//             // print_r($after_assoc_banner_info['photo_location']);
            
            
//             unlink("../".$after_assoc_banner_info['photo_location']);


//             // // -------------------------db te inert ..id dhorar jonno
//             // $insert_query = "INSERT INTO banners(banner_title, banner_subtitle, photo_location) VALUES('$banner_title' , '$banner_subtitle' , 'primary entry')";
//             // mysqli_query($db_connect,$insert_query);
//             // // echo mysqli_insert_id($db_connect);

//             // // ---------------------------tmp location theke amar folder a photo anar jonno with new name
//             $new_name = $banner_id.".".$original_extension;
//             $new_location = '../uploads/banners/'.$new_name;
//             move_uploaded_file($_FILES['banner_image']['tmp_name'], $new_location);

//             // // --------------------db te photo location ta update kora
//             $new_photo_location = 'uploads/banners/'.$new_name;
//             $update_query = "UPDATE banners SET photo_location = '$new_photo_location' WHERE id = $banner_id";
//             mysqli_query($db_connect , $update_query);
//             header("location: add_banner.php");
//         }
//         else
//         {
//             $_SESSION['err_file'] = "This image size is more then 2 MB.";
//             header("location: edit_banner_post.php");
//         }
//     }
//     else
//     {
//         $_SESSION['err_file'] = "This file format is not supported";
//         header("location: edit_banner_post.php");
//     }
// }

// header('location: add_banner.php');

?>