<?php
include_once('./auth/process_admin.php');

$title = 'Add Informations - Admin';
include_once('./auth/session.php');

include_once('includes/head.php');
include_once('includes/header.php');
$msg = " ";

if (isset($_POST['submit'])) {
    $prog_language = $_POST['prog_language'];
    $prog_bar = $_POST['prog_bar'];
    $sql = "INSERT INTO level (prog_language, prog_bar) VALUES ('$prog_language', '$prog_bar') ";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $msg = " <div class='alert alert-success'>Details has been succesfully added.</div> ";
    } else {
        $msg = " <div class='alert alert-danger'>Something went wrong.Please try again</div> ";
    }
}
if (isset($_GET['type']) && $_GET['type'] != '') {
    $type = get_safe_value($conn, $_GET['type']);
}
if ($type == 'delete') {
    $id = get_safe_value($conn, $_GET['id']);
    $delete_sql = "DELETE from level  where id='$id'";
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
                        <h2>Add All Informations </h2>

                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-12 col-md-12 text-center mb-30">
                    <div class="col-md-8 offset-md-2">
                        <form id="contact-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="contact-form" method="POST">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 mb-20">
                                    <input name="prog_language" type="text" required placeholder="Enter Programming Language">

                                </div>
                                <div class="col-xl-6 col-lg-6 mb-20">
                                    <input name="prog_bar" type="text" required placeholder="Enter Level Bar">

                                </div>
                               

                                
                                <div class="col-xl-12 text-center">

                                    <button  class="btn" name="submit" type="submit">Save</button>
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