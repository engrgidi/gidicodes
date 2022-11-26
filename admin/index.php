<?php
include_once('./auth/process_admin.php');
$title = 'Admin-Dashboard';

include_once('./auth/session.php');
include_once('./includes/header.php');
include_once('./includes/navbar.php');

if (isset($_GET['type']) && $_GET['type'] != '') {
    $type = get_safe_value($conn, $_GET['type']);
}
if ($type == 'delete') {
    $id = get_safe_value($conn, $_GET['id']);
    $delete_sql = "DELETE from count  where id='$id'";
    mysqli_query($conn, $delete_sql);
}
if (isset($_POST['submit'])) {
    $hours = $_POST['hours'];
    $pro_done = $_POST['pro_done'];
    $customers = $_POST['customers'];
    $awards = $_POST['awards'];
    $sql = "INSERT INTO count (hours, pro_done, customers, awards) VALUES ('$hours', '$pro_done', '$customers', '$awards') ";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $msg = " <div class='alert alert-success'>count details has been succesfully created.</div> ";
    } else {
        $msg = " <div class='alert alert-danger'>Something went wrong.Please try again</div> ";
    }
}




?>

<div class="container">
    <div class="row">
        <?php
        $sql = "SELECT * from admin";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {




        ?>
                <div class="col">
                    <p class="text-white mt-5 mb-5">Welcome back,<?php echo $row['admin_name']; ?><b></b></p>
                </div>
        <?php

            }
        }
        ?>
    </div>
    <!-- row -->
    <div class="row tm-content-row">
        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 tm-block-col">
            <div class="tm-bg-primary-dark tm-block tm-scrow">
                <h2 class="tm-block-title"> </h2>


                <?php

                $sql = "SELECT * from admin_profile";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $filename = $row["image"];




                ?>
                        <div class="col-md-5">
                            <div class="pr20">
                                <?php echo   '  <img src="' . $filename . '" class="img-auto img-rounded img-responsive" width="100" alt="">' ?>
                            </div>
                        </div>


                <?php

                    }
                }
                ?>

                <div class="spacer-double"></div>
                <?php

                $sql = "SELECT * from level";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {





                ?>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="skill-bar style-2">
                                    <h5 class="text-info-italic text-bg"><?php echo $row['prog_language']; ?>
                                        <div class="progress">

                                            <div class="progress-bar progress-bar-striped" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $row['prog_bar']; ?>% ;" data-value="<?php echo $row['prog_bar']; ?>%">
                                            <?php echo $row['prog_bar']; ?>%
                                            </div>
                                        </div>
                                    </h5>




                                </div>




                            </div>
                        </div>

                <?php

                    }
                }
                ?>



            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 tm-block-col">
            <div class="tm-bg-primary-dark tm-block tm-block-scroll">
                <h2 class="tm-block-title">Add Project</h2>
                <div class="">
                    <?php echo $msg; ?>

                   
                </div>

            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 tm-block-col">
            <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
                <h2 class="tm-block-title"> Add Counts </h2>
                <div class="">
                    <?php echo $msg; ?>

                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                        <div class="card-body card-block">
                            <div class="form-group">
                                <label for="hours">Hours of work</label>
                                <input type="text" placeholder="no of hours" class="form-control bg-transparent text-secondary" name="hours" required>
                            </div>


                            <div class="form-group">
                                <label for="project">Project done</label>
                                <input type="text" placeholder=" no of projects done " class="form-control bg-transparent text-secondary" name="pro_done" required>
                            </div>
                            <div class="form-group">
                                <label for="customers">Satisfied customers</label>
                                <input type="text" placeholder="no of satisfied customers" class="form-control bg-transparent text-secondary" name="customers" required>
                            </div>
                            <div class="form-group">
                                <label for="awards">Awards won</label>
                                <input type="text" placeholder="no of awards" class="form-control bg-transparent text-secondary" name="awards" required>
                            </div>

                        </div>


                        <button id="payment-button" disabled name="submit" type="submit" class="btn btn-primary btn-block text-uppercase btn-lg">
                            <span id="payment-button-amount">Add Counts</span>
                        </button>


                    </form>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 tm-block-col">
            <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll ">
                <h2 class="tm-block-title">Count List</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col"><i class="fas fa-th"></i></th>
                            <th scope="col">Hours of Works</th>
                            <th scope="col">Projects Done</th>
                            <th scope="col">Satisfied Customers</th>
                            <th scope="col">Awards Winning</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $sql = "SELECT * from count";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {





                        ?>
                                <tr>
                                    <th scope="row"><i class="fas fa-th"></i></th>
                                    <td><b><?php echo $row['hours']; ?></b></td>
                                    <td><b><?php echo $row['pro_done']; ?></b></td>
                                    <td><b><?php echo $row['customers']; ?></b></td>
                                    <td><b><?php echo $row['awards']; ?></b></td>

                                    <td> <a href="?type=delete&id=<?php echo $row['id']; ?>" class="btn btn-alert"><i class="fas fa-trash"></i></a>
                                        <a href="edit_counts.php?id=<?php echo $row['id']; ?>" class="btn btn-alert"><i class="fas fa-edit"></i></a>
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