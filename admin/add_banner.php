<?php
    session_start();
    $title = "Add Banner";

    require_once 'check_access.php';
    require_once '../header.php';
    require_once '../db.php';
    require_once 'navbar.php'; 

    $get_query = "SELECT * FROM banners";
    $from_db = mysqli_query($db_connect, $get_query);
    // print_r($from_db);

?>


<div class="container">
    <div class="row">
        <div class="col-8 mt-3">
            <div class="card bg-light mb-3 mt-3">
                <div class="card-header bg-success">
                    <h4>Banner List</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th>ID</th>
                            <th>Banner Title</th>
                            <th>Banner sub Title</th>
                            <th>Banner Image</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $id = 1;
                                foreach($from_db as $upload):  
                            ?>
                            <tr>
                                <td><?= $id++ ?></td>
                                <td><?= $upload['banner_title'] ?></td>
                                <td><?= $upload['banner_subtitle'] ?></td>
                                <td>
                                    <img width="250" src="../<?= $upload['photo_location'] ?>">
                                </td>
                                <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="edit_banner.php?banner_id=<?= $upload['id'] ?>" class="btn btn-warning">Edit</a>
                                    <?php
                                        if($upload['active_status'] == 2)
                                        {
                                    ?>
                                    <a href="active_banner.php?banner_id=<?= $upload['id'] ?>" class="btn btn-success">Active</a>
                                    <button value="<?= $upload['id'] ?>" class="btn btn-danger banner_delete_button">Delete</button>
                                    <?php
                                        }
                                    ?>
                                    
                                </div>
                                </td>
                            </tr>
                            <?php
                                endforeach;
                            ?>                       
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-4 mt-3">
            <div class="card bg-dark text-white mb-3 mt-3">
                <div class="card-header bg-success">
                    <h4>Add Banner</h4>
                </div>
                <div class="card-body">
                    <form action="add_banner_post.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Banner Title</label>
                            <input type="text"  name="banner_title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Banner Sub Title</label>
                            <input type="text"  name="banner_subtitle" class="form-control">
                        </div>
                        <div class="form-group">
                            <!-- <label>Banner Image</label>
                            <input type="file"  name="banner_image" class="form-control"> -->


                                <!-- image upload korar age image select korle niche image dekhabe...github thehe nea  -->
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label>Banner Image</label>
                                    <input name="banner_image" id="tenant_photo" type="file" class="form-control" accept="image/x-png, image/jpeg" onchange="readURL(this);">
                                    <img class="hidden" id="tenant_photo_viewer" src="#" alt="image" />
                                    <script>
                                    function readURL(input) {
                                    if (input.files && input.files[0]) {
                                        var reader = new FileReader();
                                        reader.onload = function (e) {
                                        $('#tenant_photo_viewer').attr('src', e.target.result).width(150).height(195);
                                        };
                                        $('#tenant_photo_viewer').removeClass('hidden');
                                        reader.readAsDataURL(input.files[0]);
                                    }
                                    }
                                    </script>
                                </div>
                                </div>
                                <!-- image upload korar age image select korle niche image dekhabe...github thehe nea  -->


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

                        </div>
                        <button type="submit" class="btn btn-success">Add Banner</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<?php
require_once '../footer.php';
?>