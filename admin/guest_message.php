<?php
    session_start();
    $title = "Guest Message";
    
    require_once 'check_access.php';
    require_once '../header.php';
    require_once '../db.php';
    require_once 'navbar.php'; 


    $get_query = "SELECT * FROM messages";
    $from_db = mysqli_query($db_connect , $get_query);
    
?>



<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card bg-light mb-3 mt-3">
            <div class="card-header bg-info text-white"><h4>Guest Messages</h4></div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th>ID</th>
                        <th>Guest Name</th>
                        <th>Guest Email</th>
                        <th>Guest Messages</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            foreach($from_db as $message):
                            
                        ?>
                        <tr class="<?= ($message['read_status'] == 1) ? "bg-info" : "" ?>">
                        <th><?= $message['id'] ?></th>
                        <td><?= $message['guest_name'] ?></td>
                        <td><?= $message['guest_email'] ?></td>
                        <td><?= $message['guest_message'] ?></td>
                        <td>
                            <?php
                                if($message['read_status'] == 1):
                            ?>
                                <a class="btn btn-sm btn-success" href="message_read.php?message_id=<?= $message['id'] ?>">mark as read</a>
                            <?php
                                endif;
                            ?>    
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
    </div>
</div>



<?php
require_once '../footer.php';
?>