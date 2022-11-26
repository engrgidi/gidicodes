<?php
include_once('./auth/process_admin.php');
$title = 'Edit Admin Profile';
include_once('./auth/session.php');
include_once('./includes/header.php');
include_once('./includes/navbar.php');

$id = $_GET['id'];
$msg = '';

if (isset($_POST['update'])) {
    $name = $_POST["name"];
    $link = $_POST["link"];
    $filename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];
    $folder = "uploads/" . $filename;
    $sql = "UPDATE  project SET name='$name', link='$link', image='$folder' WHERE id='$id' ";
    $result = $conn->query($sql);
   
    if ($result === TRUE) {
        if (move_uploaded_file($tempname, $folder)) {
            $msg = "<div class='alert alert-success'>{$name} Updated successfully</div>";
        } else {
            die(mysqli_error($conn));
            $msg = "<div class='alert alert-danger'>Failed to upload image</div>";
        }
    }
}


?>

<div class="container m-5">

    <!-- row -->
    <div class="row ">
        <div class="container">
            <div class="container-fluid tm-bg-primary-dark  tm-block tm-block-taller tm-block-scroll">
                <div class="col-12 tm-block-col">

                    <section class="panel">

                        <header class="panel-heading">
                            <?php print $msg; ?>
                        </header>
                        <?php
                        $sql = "SELECT * from project where id='$id' ";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            $i = 1;

                            while ($row = mysqli_fetch_assoc($result)) {


                        ?>

                                <div class="panel-body">
                                    <form action="<?php $_SERVER['PHP_SELF']; ?>" class="form-horizontal" role="form" method="post" enctype="multipart/form-data">


                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" placeholder="Enter Name" class="form-control bg-transparent-secondary" name="name" value="<?php print $row['name']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="link">Link</label>
                                            <input type="text" placeholder="Enter Link" class="form-control bg-transparent-secondary" name="link" value="<?php print $row['link']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Select Image</label>
                                            <input type="file" name="image" value="<?php print $row['image']; ?>" required>
                                            <!-- <input type="submit" name="upload" value="Upload"> -->
                                        </div>
                                <?php }
                        } ?>


                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <button type="submit" class="btn btn-danger" name="update">Update</button>
                                    </div>
                                </div>
                                    </form>
                                </div>
                    </section>

                </div>
            </div>
        </div>

    </div>
</div>

<?php
include_once('./includes/footer.php');
include_once('./includes/scripts.php');



?>