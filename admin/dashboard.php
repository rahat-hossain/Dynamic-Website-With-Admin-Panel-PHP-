<?php
    session_start();
    $title = "Dashboard";
    
    require_once 'check_access.php';
    require_once '../header.php';
    require_once '../db.php';
    require_once 'navbar.php'; 


    $get_query = "SELECT id, name, email, phone_number FROM users";
    $from_db = mysqli_query($db_connect , $get_query);
    
?>



<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card bg-light mb-3 mt-3">
            <div class="card-header"><h4>Admin List</h4></div>
            <div class="card-body">
                <table class="table table-bordered" id="user_list">
                    <thead>
                        <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone number</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            foreach($from_db as $admin_list):
                            
                        ?>
                        <tr>
                        <th><?= $admin_list['id'] ?></th>
                        <td><?= $admin_list['name'] ?></td>
                        <td><?= $admin_list['email'] ?></td>
                        <td><?= $admin_list['phone_number'] ?></td>
                        </tr>
                        <?php
                            endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
</div>



<?php
require_once '../footer.php';
?>