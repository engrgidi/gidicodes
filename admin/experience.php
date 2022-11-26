<?php
include_once('./auth/process_admin.php');
$title = 'Add Experience';

include_once('./auth/session.php');
include_once('./includes/header.php');
include_once('./includes/navbar.php');


if (isset($_GET['type']) && $_GET['type'] != '') {
    $type = get_safe_value($conn, $_GET['type']);
}
if ($type == 'delete') {
    $id = get_safe_value($conn, $_GET['id']);
    $delete_sql = "DELETE from experience  where id='$id'";
    mysqli_query($conn, $delete_sql);
}
if (isset($_POST['submit'])) {
    $year = $_POST['year'];
    $position = $_POST['position'];
    $sql = "INSERT INTO experience (year, position) VALUES ('$year', '$position') ";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $msg = " <div class='alert alert-success'>Experience details has been succesfully created.</div> ";
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
                                       
                                        <div class="card-header"><strong>Add Experience Information <small>Form</small></strong></div>
                                        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                                            <div class="card-body card-block">
                                                <div class="form-group">
                                                    <label for="year">Year</label>
                                                    <input type="text" placeholder="Enter year" class="form-control bg-transparent text-secondary" name="year" value="" required>
                                                </div>
                                               
                                                <div class="form-group">

                                                    <pre>QUALIFICATION:</pre><textarea type="text" placeholder="Enter Qualification" class="form-control bg-transparent text-secondary" name="position" value="" required> </textarea>
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
                <h2 class="tm-block-title">Experience List</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col"><i class="fas fa-th"></i></th>
                            <th scope="col">YEAR</th>
                            <th scope="col">QUALIFICATION</th>
                            <th scope="col">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $sql = "SELECT * from experience";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {





                        ?>
                                <tr>
                                    <th scope="row"><i class="fas fa-th"></i></th>
                                    <td><b><?php echo $row['year']; ?></b></td>
                                    <td><b><?php echo $row['position']; ?></b></td>
                                        <td> <a href="?type=delete&id=<?php echo $row['id']; ?>" class="btn btn-alert"><i class="fas fa-trash"></i></a>
                                        <a href="edit_experience.php?id=<?php echo $row['id']; ?>" class="btn btn-alert"><i class="fas fa-edit"></i></a>
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