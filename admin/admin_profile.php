<?php
include_once('./auth/process_admin.php');
$title = 'Add Admin Profile';

include_once('./auth/session.php');
include_once('./includes/header.php');
include_once('./includes/navbar.php');


$msg = " ";

if (isset($_POST['upload'])) {
    $bio = $_POST["bio"];
    $filename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];
    $folder = "uploads/" . $filename;
    $sql = "INSERT INTO admin_profile (bio, image) VALUES ('$bio', '$folder')";
    $result = $conn->query($sql);
    if ($result === TRUE) {
        if (move_uploaded_file($tempname, $folder)) {
            $msg = "<div class='alert alert-success'>Details uploaded successfully</div>";
        } else {
            die(mysqli_error($conn));
            $msg = "<div class='alert alert-danger'>Failed to upload image</div>";
        }
    }
}
if (isset($_GET['type']) && $_GET['type'] != '') {
    $type = get_safe_value($conn, $_GET['type']);
}
if ($type == 'delete') {
    $id = get_safe_value($conn, $_GET['id']);
    $delete_sql = "DELETE from admin_profile  where id='$id'";
    mysqli_query($conn, $delete_sql);
}

?>

<div class="container m-5">

    <!-- row -->
    <div class="row ">
        <div class="container">
            <div class="container-fluid tm-bg-primary-dark  tm-block tm-block-taller tm-block-scroll">
                <div class="col-12 tm-block-col">

                    <div class="content pb-0">
                        <div class="animated fadeIn">
                            <div class="row">
                                <div class="col-lg-12">
                                    <?php echo $msg; ?>
                                    <div class="card ">

                                        <div class="card-header"><strong>Add Admin  Information <small>Form</small></strong></div>
                                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data" method="POST">
                                            <div class="card-body card-block">
                                                <div class="form-group">
                                                    <label for="name">Select Image</label>
                                                    <input type="file" name="image">
                                                    <!-- <input type="submit" name="upload" value="Upload"> -->
                                                </div>


                                                <div class="form-group">

                                                    <pre>BIO:</pre><textarea type="text" placeholder="Enter Bio" class="form-control bg-transparent text-secondary" name="bio" value="" required> </textarea>
                                                </div>


                                            </div>

                                            <button id="payment-button" disabled name="upload" type="submit" class="btn btn-primary btn-block text-uppercase btn-lg">
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
        <div class="col-12 tm-block-col">
            <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
                <h2 class="tm-block-title">Admin info List</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col"><i class="fas fa-th"></i></th>
                            <th scope="col">IMAGE</th>
                            <th scope="col">BIO</th>
                            <th scope="col">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $sql = "SELECT * from admin_profile";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            $i = 1;

                            while ($row = mysqli_fetch_assoc($result)) {

                                $filename = $row["image"];
                                $bio = $row["bio"];



                        ?>
                       
                                <tr>
                                    <th scope="row"><?php print $i; ?></th>
                                    <td><b> <img alt="image" src="<?php echo $row['image']; ?>" width="35"></b></td>
                                    <td><b><?php echo $row['bio']; ?></b></td>
                                    <td> <a href="?type=delete&id=<?php echo $row['id']; ?>" class="btn btn-alert"><i class="fas fa-trash"></i></a>
                                        <a href="edit_profile.php?id=<?php echo $row['id']; ?>" class="btn btn-alert"><i class="fas fa-edit"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                        <?php $i++;
                                    }
                                } else { ?>
                                        <tr>
                                            <td colspan="7"> NO RECORDS FOUND!!</td>
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