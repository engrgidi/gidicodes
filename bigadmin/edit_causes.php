<?php
include_once('./auth/process_admin.php');

$title = 'Edit Causes - Admin';
include_once('./auth/session.php');

include_once('includes/head.php');
include_once('includes/header.php');

$id = $_GET['id'];
$msg = '';

if (isset($_POST['update'])) {
    $category = $_POST["category"];
    $purpose = $_POST["purpose"];
    $descr = $_POST["descr"];
    $filename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];
    $folder = "uploads/" . $filename;
    $sql = "UPDATE  causes SET  category='$category', purpose='$purpose', descr='$descr',  image='$filename' WHERE id='$id' ";
    $result = $conn->query($sql);
    if ($result === TRUE) {
        if (move_uploaded_file($tempname, $folder)) {
            $msg = "<div class='alert alert-success'>{$category} Updated successfully</div>";
        } else {
            die(mysqli_error($conn));
            $msg = "<div class='alert alert-danger'>Failed to update details</div>";
        }
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
                        <h2>Edit Causes </h2>

                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-12 col-md-12 text-center mb-30">
                    <div class="col-md-8 offset-md-2">
                        <?php
                        $sql = "SELECT * from causes where id='$id' ";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {


                            while ($row = mysqli_fetch_assoc($result)) {


                        ?>
                                <form id="contact-form" enctype="multipart/form-data" role="form" action="<?php $_SERVER['PHP_SELF']; ?>" class="contact-form" method="post">
                                    <div class="row">
                                        <div class="col-xl-6 col-lg-6 mb-20">
                                            <select name="category" aria-label=" select example" required>
                                                <option value="<?php echo $row['category']; ?>" selected>Select category</option>
                                                <option>Education</option>
                                                <option>Child Welfare</option>
                                                <option>People</option>
                                                <option>Health</option>
                                                <option>Others</option>

                                            </select>
                                        </div>



                                        <div class="col-xl-6 col-lg-6 mb-20">
                                            <input name="image" value="<?php print $row['image']; ?>" type="file" required>

                                        </div>
                                        <div class="col-xl-6 col-lg-6 mb-20">
                                            <input name="purpose"  value="<?php echo $row['purpose']; ?>" required type="text" required>

                                        </div>



                                        <div class="col-xl-6 col-lg-6 mb-20">
                                            <textarea name="descr" id="text-message" cols="30" rows="10"   required><?php echo $row['descr']; ?></textarea>
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