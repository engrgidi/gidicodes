<?php
include_once('./auth/process_admin.php');
$title = 'Add Contact';

include_once('./auth/session.php');
include_once('./includes/header.php');
include_once('./includes/navbar.php');


if (isset($_GET['type']) && $_GET['type'] != '') {
    $type = get_safe_value($conn, $_GET['type']);
}
if ($type == 'delete') {
    $id = get_safe_value($conn, $_GET['id']);
    $delete_sql = "DELETE from contact  where id='$id'";
    mysqli_query($conn, $delete_sql);
}
if (isset($_POST['submit'])) {
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $github = $_POST['github'];
    $instagram = $_POST['instagram'];
    $twitter = $_POST['twitter'];
    $sql = "INSERT INTO contact (phone, address, email, github, instagram, twitter) VALUES ('$phone', '$address', '$email', '$github', '$instagram', '$twitter') ";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $msg = " <div class='alert alert-success'>Contact details has been succesfully created.</div> ";
    } else {
        $msg = " <div class='alert alert-danger'>Something went wrong.Please try again</div> ";
    }
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
                                       
                                        <div class="card-header"><strong>Add Contact Information <small>Form</small></strong></div>
                                        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                                            <div class="card-body card-block">
                                                <div class="form-group">
                                                    <label for="phone">Phone</label>
                                                    <input type="phone" placeholder="Enter phone" class="form-control bg-transparent text-secondary" name="phone" value="" required>
                                                </div>
                                                <div class="form-group">

                                                    <pre>Address:</pre><textarea type="text" placeholder="Enter Address" class="form-control bg-transparent text-secondary" name="address" value="" required> </textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="email" placeholder="Enter email" class="form-control bg-transparent text-secondary" name="email" value="" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="github">Github</label>
                                                    <input type="text" placeholder="Enter github url " class="form-control bg-transparent text-secondary" name="github" value="" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="instagram">Instagram</label>
                                                    <input type="text" placeholder="Enter instagram url" class="form-control bg-transparent text-secondary" name="instagram" value="" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="twitter">Twitter</label>
                                                    <input type="text" placeholder="Enter twitter url" class="form-control bg-transparent text-secondary" name="twitter" value="" required>
                                                </div>

                                            </div>

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
        <div class="col-12 tm-block-col">
            <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
                <h2 class="tm-block-title">Contact List</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col"><i class="fas fa-th"></i></th>
                            <th scope="col">PHONE</th>
                            <th scope="col">ADDRESS</th>
                            <th scope="col">EMAIL</th>
                            <th scope="col">GITHUB</th>
                            <th scope="col">INSTAGRAM</th>
                            <th scope="col">TWITTER</th>
                            <th scope="col">TIME</th>
                            <th scope="col">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $sql = "SELECT * from contact";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {





                        ?>
                                <tr>
                                    <th scope="row"><i class="fas fa-th"></i></th>
                                    <td><b><?php echo $row['phone']; ?></b></td>
                                    <td><b><?php echo $row['address']; ?></b></td>
                                    <td><b><?php echo $row['email']; ?></b></td>
                                    <td><b><?php echo $row['github']; ?></b></td>
                                    <td><b><?php echo $row['instagram']; ?></b></td>
                                    <td><b><?php echo $row['twitter']; ?></b></td>
                                    <td><b><?php echo $row['created_at']; ?></b></td>
                                    <td> <a href="?type=delete&id=<?php echo $row['id']; ?>" class="btn btn-alert"><i class="fas fa-trash"></i></a>
                                        <a href="edit_contact.php?id=<?php echo $row['id']; ?>" class="btn btn-alert"><i class="fas fa-edit"></i></a>
                                    </td>
                                </tr>
                        <?php

                            }
                        }
                        ?>
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