<?php
include_once('./auth/process_admin.php');

$title = 'Edit Events - Admin';
include_once('./auth/session.php');

include_once('includes/head.php');
include_once('includes/header.php');

$id = $_GET['id'];
$msg = '';

if (isset($_POST['update'])) {
    $hours = $_POST["hours"];
    $pro_done = $_POST["pro_done"];
    $customers = $_POST["customers"];
    $awards = $_POST["awards"];
    $sql = "UPDATE  count SET  hours='$hours', pro_done='$pro_done', customers='$customers', awards='$awards'  WHERE id='$id' ";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $msg = " <div class='alert alert-success'>Details has been succesfully updated.</div> ";
    } else {
        $msg = " <div class='alert alert-danger'>Something went wrong.Please try again</div> ";
    }
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
                        <h2>Edit Events </h2>

                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-12 col-md-12 text-center mb-30">
                    <div class="col-md-8 offset-md-2">
                        <?php
                        $sql = "SELECT * from count where id='$id' ";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {


                            while ($row = mysqli_fetch_assoc($result)) {


                        ?>
                                <form id="contact-form" enctype="multipart/form-data" role="form" action="<?php $_SERVER['PHP_SELF']; ?>" class="contact-form" method="post">
                                    <div class="row">
                                        <div class="col-xl-12 col-lg-12 mb-20">
                                            <input name="hours" type="no" required value="<?php echo $row['hours']; ?>">

                                        </div>
                                        <div class="col-xl-6 col-lg-6 mb-20">
                                            <input name="pro_done" type="no" required value="<?php echo $row['pro_done']; ?>">

                                        </div>
                                        <div class="col-xl-6 col-lg-6 mb-20">
                                            <input name="customers" type="no" required value="<?php echo $row['customers']; ?>">

                                        </div>
                                        <div class="col-xl-6 col-lg-6 mb-20">
                                            <input name="awards" type="no" required value="<?php echo $row['awards']; ?>">

                                        </div>



                                <?php }
                        } ?>

                                <div class="col-xl-12 text-center">
                                    <button class="btn" name="update" type="submit">update</button>

                                </div>
                                    </div>
                                </form>
                                <br>
                                <?php print $msg; ?>


                    </div>




                </div>



            </div>
        </div>
    </section>
</main>

<?php
include_once('includes/footer.php');
include_once('includes/scripts.php');
?>