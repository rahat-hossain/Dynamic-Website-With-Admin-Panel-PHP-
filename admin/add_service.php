<?php
    session_start();
    $title = "Add Services";

    require_once 'check_access.php';
    require_once '../header.php';
    require_once '../db.php';
    require_once 'navbar.php'; 

    $get_query = "SELECT * FROM services";
    $from_db = mysqli_query($db_connect, $get_query);
    // print_r($from_db);

?>


<div class="container">
    <div class="row">
        <div class="col-8 mt-3">
            <div class="card bg-light mb-3 mt-3">
                <div class="card-header bg-info">
                    <h4>Services List</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th>ID</th>
                            <th>Services Title</th>
                            <th>Services Description</th>
                            <th>Services Image</th>
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
                                <td><?= $upload['service_title'] ?></td>
                                <td><?= $upload['service_description'] ?></td>
                                <td>
                                    <img width="100" src="../<?= $upload['service_photo'] ?>">
                                </td>
                                <td>
                                    Action
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
                <div class="card-header bg-info">
                    <h4>Add Service</h4>
                </div>
                <div class="card-body">
                    <form action="add_service_post.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Service Title</label>
                            <input type="text"  name="service_title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Service Description</label>
                            <input type="text"  name="service_description" class="form-control">
                        </div>
                        <div class="form-group">
                            <!-- <label>Banner Image</label>
                            <input type="file"  name="banner_image" class="form-control"> -->


                                <!-- image upload korar age image select korle niche image dekhabe...github thehe nea  -->
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label>Service Image</label>
                                    <input name="service_photo" id="tenant_photo" type="file" class="form-control" accept="image/x-png, image/jpeg" onchange="readURL(this);">
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
                        <button type="submit" class="btn btn-success">Add Service</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<?php
require_once '../footer.php';
?>