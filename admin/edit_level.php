<?php
include_once('./auth/process_admin.php');
$title = 'Edit Level';

include_once('./auth/session.php');
include_once('./includes/header.php');
include_once('./includes/navbar.php');


$id = $_GET['id'];
$msg = "";
if (isset($_POST['submit'])) {
    $prog_language = $_POST['prog_language'];
    $prog_bar = $_POST['prog_bar'];
    $sql = "UPDATE level SET prog_language='$prog_language', prog_bar='$prog_bar' WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $msg = " <div class='alert alert-success'>Skill level details has been succesfully updated.</div> ";
    } else {
        $msg = " <div class='alert alert-danger'>Something went wrong.Please try again</div> ";
    }
}

?>

<div class="container m-5">

    <!-- row -->
    <div class="row ">
        <div class="container">
            <a href="level.php" class="btn btn-primary btn-block text-uppercase">Skill level Information</a>
            <div class="container-fluid tm-bg-primary-dark  tm-block tm-block-taller tm-block-scroll">
                <div class="col-12 tm-block-col">

                    <div class="content pb-0">
                        <div class="animated fadeIn">
                            <div class="row">
                                <div class="col-lg-12">
                                    <?php echo $msg;
                                    $sql = "SELECT * from level WHERE id='$id'";
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                            <div class="card ">

                                                <div class="card-header"><strong>Edit Experience Information <small>Form</small></strong></div>
                                                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                                                    <div class="card-body card-block">
                                                        <div class="form-group">
                                                            <label for="language">Programming language</label>
                                                            <input type="text" placeholder="Enter Programming language" class="form-control bg-transparent text-secondary" name="prog_language" value="" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="progress">Progress Bar</label>
                                                            <input type="text" placeholder="Enter Progress Bar" class="form-control bg-transparent text-secondary" name="prog_bar" value="" required>
                                                        </div>





                                                    </div>





                                            <?php
                                        }
                                    }
                                            ?>

                                            <button id="payment-button" name="submit" type="submit" class="btn btn-primary btn-block text-uppercase btn-lg">
                                                <span id="payment-button-amount">Submit</span>
                                            </button>

                                                </form>


                                            </div>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

<?php
include_once('./includes/footer.php');
include_once('./includes/scripts.php');



?>