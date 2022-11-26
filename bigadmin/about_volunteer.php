<?php
include_once('./auth/process_admin.php');

$title = 'Volunteers Details - Admin';
include_once('./auth/session.php');

include_once('includes/head.php');
include_once('includes/header.php');
$id = $_GET['id'];
$msg = '';
if (isset($_GET['type']) && $_GET['type'] != '') {
    $type = get_safe_value($conn, $_GET['type']);
}
if ($type == 'delete') {
    $id = get_safe_value($conn, $_GET['id']);
    $delete_sql = "DELETE from volunteer  where id='$id'";
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
                        <h2>Volunteers Forms</h2>

                    </div>
                </div>
                <div class="w-100 d-none d-sm-block d-lg-none spacer-60"></div>



            </div>

            <div class="row">
                <?php

                $sql = "SELECT * from volunteer where id='$id' ";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    $i = 1;

                    while ($row = mysqli_fetch_assoc($result)) {
                        $filename = $row["image"];



                ?>

                        <div class="card mb-3 " style="max-width: 540px;">
                            <div class="row g-0">
                                
                                <div class="col-md-4">
                                <a href="?type=delete&id=<?php echo $row['id']; ?>" class="text-danger"><i class="fas fa-trash"></i></a>

                                    <img src="./uploads/<?php echo    $filename ?>"  class="img-fluid rounded-start" alt="" srcset="">

                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $row['name']; ?></h5>
                                        <p class="card-text"><?php echo $row['reason']; ?> </p>
                                        <p class="card-text"><small class="text-muted"><?php echo $row['created_at']; ?> </small></p>
                                        <a href="mailto:<?php echo $row['email']; ?>" class="card-link"><?php echo $row['email']; ?></a>
                                        <a href="tel:<?php echo $row['phone']; ?>" class="card-link"><?php echo $row['phone']; ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php $i++;
                    }
                } else { ?>

                    <h1 class="text-danger">No Volunteer Profile Here..</h1>
                <?php } ?>

            </div>






        </div>
    </section>






</main>

<?php
include_once('includes/footer.php');
include_once('includes/scripts.php');
?>