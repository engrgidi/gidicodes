<?php
include_once('./auth/process_admin.php');

$title = 'Edit Informations - Admin';
include_once('./auth/session.php');

include_once('includes/head.php');
include_once('includes/header.php');
$id = $_GET['id'];
$msg = " ";
if (isset($_POST['update'])) {
    $address = $_POST['address'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $github = $_POST['github'];
    $twitter = $_POST['twitter'];
    $instagram = $_POST['instagram'];
    $sql = "UPDATE contact SET address ='$address', email='$email', phone='$phone', github='$github', twitter='$twitter', instagram='$instagram' WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $msg = " <div class='alert alert-success'>Details has been succesfully updated.</div> ";
    } else {
        $msg = " <div class='alert alert-danger'>Something went wrong.Please try again</div> ";
    }
}
if (isset($_GET['type']) && $_GET['type'] != '') {
    $type = get_safe_value($conn, $_GET['type']);
}
if ($type == 'delete') {
    $id = get_safe_value($conn, $_GET['id']);
    $delete_sql = "DELETE from socials  where id='$id'";
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
                        <h2>Edit Informations </h2>

                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-12 col-md-12 text-center mb-30">
                    <div class="col-md-8 offset-md-2">
                        <form id="contact-form" action="<?php $_SERVER['PHP_SELF']; ?>" class="contact-form" method="POST">
                            <div class="row">
                                <?php

                                $sql = "SELECT * from contact where id='$id'";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {

                                    while ($row = mysqli_fetch_assoc($result)) {





                                ?>
                                        <div class="col-xl-12 col-lg-12 mb-20">
                                            <input name="address" type="text" value="<?php print $row['address']; ?>" required>

                                        </div>
                                        <div class="col-xl-6 col-lg-6 mb-20">
                                            <input name="email" type="text" value="<?php print $row['email']; ?>" required>

                                        </div>
                                        <div class="col-xl-6 col-lg-6 mb-20">
                                            <input name="phone" type="phone" value="<?php print $row['phone']; ?>" required>

                                        </div>
                                        <div class="col-xl-6 col-lg-6 mb-20">
                                            <input name="github" type="text" value="<?php print $row['github']; ?>" required>

                                        </div>
                                        <div class="col-xl-6 col-lg-6 mb-20">
                                            <input name="twitter" type="text" value="<?php print $row['twitter']; ?>" required>

                                        </div>
                                        <div class="col-xl-6 col-lg-6 mb-20">
                                            <input name="instagram" type="text" value="<?php print $row['instagram']; ?>" required>

                                        </div>

                                <?php }
                                } ?>

                                <div class="col-xl-12 text-center">

                                    <button class="btn" name="update" type="submit">Save</button>
                                </div>
                            </div>
                        </form>
                        <br>
                        <?php
                        echo "$msg";
                        ?>


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