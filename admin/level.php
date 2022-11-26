<?php
include_once('./auth/process_admin.php');
$title = 'Add Programming Level';

include_once('./auth/session.php');
include_once('./includes/header.php');
include_once('./includes/navbar.php');


if (isset($_GET['type']) && $_GET['type'] != '') {
    $type = get_safe_value($conn, $_GET['type']);
}
if ($type == 'delete') {
    $id = get_safe_value($conn, $_GET['id']);
    $delete_sql = "DELETE from level  where id='$id'";
    mysqli_query($conn, $delete_sql);
}
if (isset($_POST['submit'])) {
    $prog_language = $_POST['prog_language'];
    $prog_bar = $_POST['prog_bar'];
    $sql = "INSERT INTO level (prog_language, prog_bar) VALUES ('$prog_language', '$prog_bar') ";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $msg = " <div class='alert alert-success'>Skill level details has been succesfully created.</div> ";
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
                                       
                                        <div class="card-header"><strong>Add Skill level Information <small>Form</small></strong></div>
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
                <h2 class="tm-block-title">Skill level List</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col"><i class="fas fa-th"></i></th>
                            <th scope="col">PROGRAMMING LANGUAGE</th>
                            <th scope="col">PROGRESS BAR</th>
                            <th scope="col">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $sql = "SELECT * from level";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {





                        ?>
                                <tr>
                                    <th scope="row"><i class="fas fa-th"></i></th>
                                    <td><b><?php echo $row['prog_language']; ?></b></td>
                                    <td><b><?php echo $row['prog_bar']; ?> %</b></td>
                                        <td> <a href="?type=delete&id=<?php echo $row['id']; ?>" class="btn btn-alert"><i class="fas fa-trash"></i></a>
                                        <a href="edit_level.php?id=<?php echo $row['id']; ?>" class="btn btn-alert"><i class="fas fa-edit"></i></a>
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