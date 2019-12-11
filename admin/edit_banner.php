<?php
    session_start();
    $title = "Banner edit";

    require_once 'check_access.php'; 
    require_once '../header.php';
    require_once '../db.php';
    require_once 'navbar.php'; 

    $banner_id = $_GET['banner_id'];

    $get_query = "SELECT * FROM banners WHERE id='$banner_id'";
    $from_db = mysqli_query($db_connect , $get_query);
    $after_assoc = mysqli_fetch_assoc($from_db);
    //print_r($after_assoc);
?>


<div class="container">
    <div class="row">
        <div class="col-12 mt-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.php">Dashbord</a></li>
                    <li class="breadcrumb-item"><a href="add_banner.php">Add banner</a></li>
                    <li class="breadcrumb-item active" aria-current="page">banner edit page</li>
                </ol>
            </nav>
            <div class="card bg-light mb-3 mt-3">
                <div class="card-header bg-warning">
                    <h4>Edit Banner</h4>
                </div>
                <div class="card-body">
                    <form action="edit_banner_post.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Banner Title</label>
                            <input type="hidden"  name="banner_id" class="form-control" value="<?= $after_assoc['id'] ?>">
                            <input type="text"  name="banner_title" class="form-control" value="<?= $after_assoc['banner_title'] ?>">
                            
                        </div>
                        <div class="form-group"> 
                            <label>Banner Sub Title</label>
                            <input type="text"  name="banner_subtitle" class="form-control" value="<?= $after_assoc['banner_subtitle'] ?>">
                        </div>

                        <!-- <div class="form-group">
                            <label>Banner Image</label>
                            <input type="file" name="banner_image" class="form-control"> 

                            <?php
                                if(isset($_SESSION['err_file']))
                                {
                            ?>
                            <span class=text-danger>
                                <?php
                                    echo $_SESSION['err_file'];
                                    unset($_SESSION['err_file']);
                                ?>
                            </span>
                            <?php
                                }
                            ?>

                        <br>

                            <img width="250" src="../<?= $after_assoc['photo_location'] ?>">
                        </div> -->
                        
                        <button type="submit" class="btn btn-success">save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<?php
require_once '../footer.php';
?>