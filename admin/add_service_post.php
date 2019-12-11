<?php
session_start();
require_once '../db.php';
// print_r($_POST);
// echo "<pre>";
// print_r($_FILES['banner_image']['name']);

$service_title = $_POST['service_title'];
$service_description = $_POST['service_description'];

$uploded_file_original_name = $_FILES['service_photo']['name'];
$after_explode = explode('.' , $uploded_file_original_name);
$original_extension = end($after_explode);
$excepted_extensions = array('jpg', 'jpeg', 'png', 'JPG', 'JPEG', 'PNG');

if(in_array($original_extension, $excepted_extensions))
{
    if($_FILES['service_photo']['size'] <= 2000000)
    {
        // -------------------------db te inert ..id dhorar jonno
        $insert_query = "INSERT INTO services(service_title, service_description, service_photo) VALUES('$service_title' , '$service_description' , 'primary entry')";
        mysqli_query($db_connect,$insert_query);
        // echo mysqli_insert_id($db_connect);

        // ---------------------------tmp location theke amar folder a photo anar jonno with new name
        $new_name = mysqli_insert_id($db_connect).".".$original_extension;
        $new_location = '../uploads/services/'.$new_name;
        move_uploaded_file($_FILES['service_photo']['tmp_name'], $new_location);

        // --------------------db te photo location ta update kora
        $new_photo_location = 'uploads/services/'.$new_name;
        $id_from_table = mysqli_insert_id($db_connect);
        $update_query = "UPDATE services SET service_photo = '$new_photo_location' WHERE id = $id_from_table";
        mysqli_query($db_connect , $update_query);
        header("location: add_service.php");
    }
    else
    {
        $_SESSION['err_file'] = "This image size is more then 2 MB.";
        header("location: add_service.php");
    }
}
else
{
    $_SESSION['err_file'] = "This file format is not supported";
    header("location: add_service.php");
}

?>