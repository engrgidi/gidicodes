<?php
include_once('./auth/process_admin.php');
$title = 'Inbox';
include_once('./auth/session.php');
include_once('./includes/header.php');
include_once('./includes/navbar.php');


if (isset($_GET['type']) && $_GET['type'] != '') {
    $type = get_safe_value($conn, $_GET['type']);
}
if ($type == 'delete') {
    $id = get_safe_value($conn, $_GET['id']);
    $delete_sql = "DELETE from inbox  where id='$id'";
    mysqli_query($conn, $delete_sql);
}

?>

<div class="container">
    <div class="row">

        <div class="col">
            <p class="text-white mt-5 mb-5">Welcome back<b></b></p>
        </div>

        
    </div>
    <!-- row -->
    <div class="row tm-content-row">

        <div class="col-12 tm-block-col">
            <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-overflow">
                <h2 class="tm-block-title">Notification List</h2>
                <div class="tm-notification-items">
                    <div class="media tm-notification-item">
                        <div class="tm-gray-circle"><img src="img/notification-01.jpg" alt="Avatar Image" class="rounded-circle"></div>
                        <div class="media-body">
                            <p class="mb-2"><b>Jessica</b> and <b>6 others</b> sent you new <a href="#" class="tm-notification-link">product updates</a>. Check new orders.</p>
                            <span class="tm-small tm-text-color-secondary">6h ago.</span>
                        </div>
                    </div>


                    <div class="media tm-notification-item">
                        <div class="tm-gray-circle"><img src="img/notification-01.jpg" alt="Avatar Image" class="rounded-circle"></div>
                        <div class="media-body">
                            <p class="mb-2"><b>Lily A</b> and <b>6 others</b> sent you <a href="#" class="tm-notification-link">product updates</a>.</p>
                            <span class="tm-small tm-text-color-secondary">6h ago.</span>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <div class="col-12 tm-block-col">
            <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
                <h2 class="tm-block-title">Messages List</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col"><i class="fas fa-th"></i></th>
                            <th scope="col">NAME</th>
                            <th scope="col">EMAIL</th>
                            <th scope="col">PHONE NO</th>
                            <th scope="col">MESSAGES</th>
                            <th scope="col">TIME</th>
                            <th scope="col">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $sql = "SELECT * from inbox";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            $i = 1;

                            while ($row = mysqli_fetch_assoc($result)) {





                        ?>
                                <tr>
                                    <th scope="row"><?php print $i; ?></th>
                                    <td><b><?php echo $row['name']; ?></b></td>
                                    <td><b><?php echo $row['email']; ?></b></td>
                                    <td><b><?php echo $row['phone']; ?></b></td>
                                    <td><b><?php echo $row['text']; ?></b></td>
                                    <td><b><?php echo $row['created_at']; ?></b></td>
                                    <td> <a href="?type=delete&id=<?php echo $row['id']; ?>" class="btn btn-alert"><i class="fas fa-trash"></i></a></td>
                                </tr>
                                <tr>
                                        <?php $i++;
                                    }
                                } else { ?>
                                        <tr>
                                            <td colspan="7"> NO INBOX !!</td>
                                        </tr>
                                    <?php } ?>
                                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
include_once('./includes/footer.php');
include_once('./includes/scripts.php');



?>