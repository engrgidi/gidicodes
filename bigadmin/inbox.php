<?php
include_once('./auth/process_admin.php');

$title = 'Inbox - Admin';
include_once('./auth/session.php');

include_once('includes/head.php');
include_once('includes/header.php');



if (isset($_GET['type']) && $_GET['type'] != '') {
    $type = get_safe_value($conn, $_GET['type']);
}
if ($type == 'delete') {
    $id = get_safe_value($conn, $_GET['id']);
    $delete_sql = "DELETE from inbox  where id='$id'";
    mysqli_query($conn, $delete_sql);
}



?>
<!-- Modal Search -->
<div class="modal fade" id="search-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">

    </div>
</div>
<main>

    <section class="service-area grey-bg pb-70 pt-100">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 text-center mb-40">
                    <div class="section-title service-title">
                        <h2>New Messages </h2>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-xl-12 col-xs-12 col-sm-10">
                <table class="table table-responsive  table-borderless">
                    <thead>
                        <tr>
                            <th scope="col"><input type="checkbox" name="code" id="code" value=""/> Select All <a href="?type=delete&id=<?php echo $row['id']; ?>" class="text-danger"><i class="fas fa-trash"></i></a></th>
                            <th scope="col">FirstName/LastName</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Message</th>
                            <th scope="col">Time</th>
                            <th scope="col">Action</th>

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
                                    <th scope="row"><input type="checkbox" name="code" id="code" value=""/></th>
                                    <td><?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['phone']; ?></td>
                                    <td><?php echo $row['message']; ?></td>
                                    <td><?php echo $row['created_at']; ?></td>
                                    <td>
                                        <a href="?type=delete&id=<?php echo $row['id']; ?>" class="text-danger"><i class="fas fa-trash"></i></a>
                                    </td>

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
                </table><br><br><br>
                </div>

                



            </div>
        </div>
    </section>
</main>

<?php
include_once('includes/footer.php');
include_once('includes/scripts.php');
?>