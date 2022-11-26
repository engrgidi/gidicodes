<?php
include_once('./auth/process_admin.php');
$title = 'Add Education';

include_once('./auth/session.php');
include_once('./includes/header.php');
include_once('./includes/navbar.php');


if (isset($_GET['type']) && $_GET['type'] != '') {
    $type = get_safe_value($conn, $_GET['type']);
}
if ($type == 'delete') {
    $id = get_safe_value($conn, $_GET['id']);
    $delete_sql = "DELETE from education  where id='$id'";
    mysqli_query($conn, $delete_sql);
}
if (isset($_POST['submit'])) {
    $year = $_POST['year'];
    $school = $_POST['school'];
    $school_info = $_POST['school_info'];
    $sql = "INSERT INTO education (year, school, school_info) VALUES ('$year', '$school', '$school_info') ";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $msg = " <div class='alert alert-success'>Education details has been succesfully created.</div> ";
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
                                       
                                        <div class="card-header"><strong>Add Education Information <small>Form</small></strong></div>
                                        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                                            <div class="card-body card-block">
                                                <div class="form-group">
                                                    <label for="year">Year</label>
                                                    <input type="text" placeholder="Enter year" class="form-control bg-transparent text-secondary" name="year" value="" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="school">School</label>
                                                    <input type="text" placeholder="Enter school" class="form-control bg-transparent text-secondary" name="school" value="" required>
                                                </div>
                                                <div class="form-group">

                                                    <pre>SCHOOL INFORMATION:</pre><textarea type="text" placeholder="Enter Qualification" class="form-control bg-transparent text-secondary" name="school_info" value="" required> </textarea>
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
                <h2 class="tm-block-title">Education List</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col"><i class="fas fa-th"></i></th>
                            <th scope="col">YEAR</th>
                            <th scope="col">SCHOOL</th>
                            <th scope="col">QUALIFICATION</th>
                           
                            <th scope="col">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $sql = "SELECT * from education";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {





                        ?>
                                <tr>
                                    <th scope="row"><i class="fas fa-th"></i></th>
                                    <td><b><?php echo $row['year']; ?></b></td>
                                    <td><b><?php echo $row['school']; ?></b></td>
                                    <td><b><?php echo $row['school_info']; ?></b></td>
                                        <td> <a href="?type=delete&id=<?php echo $row['id']; ?>" class="btn btn-alert"><i class="fas fa-trash"></i></a>
                                        <a href="edit_education.php?id=<?php echo $row['id']; ?>" class="btn btn-alert"><i class="fas fa-edit"></i></a>
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