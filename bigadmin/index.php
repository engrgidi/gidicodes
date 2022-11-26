<?php
include_once('./auth/process_admin.php');

$title = 'Dashboard - Admin';
include_once('./auth/session.php');

include_once('includes/head.php');
include_once('includes/header.php');


if (isset($_GET['type']) && $_GET['type'] != '') {
    $type = get_safe_value($conn, $_GET['type']);
}
if ($type == 'delete') {
    $id = get_safe_value($conn, $_GET['id']);
    $delete_sql = "DELETE from count  where id='$id'";
    mysqli_query($conn, $delete_sql);
}
if ($type == 'delete') {
    $id = get_safe_value($conn, $_GET['id']);
    $delete_sql = "DELETE from level  where id='$id'";
    mysqli_query($conn, $delete_sql);
}
if ($type == 'delete') {
    $id = get_safe_value($conn, $_GET['id']);
    $delete_sql = "DELETE from project  where id='$id'";
    mysqli_query($conn, $delete_sql);
}


?>
<!-- Modal Search -->
<div class="modal fade" id="search-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">

    </div>
</div>
<main>

    <section class="about-area grey-bg pb-60 pt-100">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 mb-40">
                    <?php
                    $sql = "SELECT * from admin";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {

                        while ($row = mysqli_fetch_assoc($result)) {

                    ?>

                            <div class="section-title">
                                <h2>Welcome 🖐🏾<?php echo $row['username']; ?></h2>
                            </div>
                    <?php }
                    } ?>

                    <div class="about-content">
                        <?php

                        $sql = "SELECT * from admin_profile";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $filename = $row["image"];
                                $bio = $row["bio"];



                        ?>
                                <p><?php echo $row['bio']; ?></p>

                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 mb-20 md-margin">
                    <div class="row">

                        <div class="col-xl-6 col-md-6 mb-20">
                            <div class="about-img">
                                <img src="./uploads/<?php echo    $filename ?>" class="img-fluid" alt="">

                            </div>
                            <br>

                            <a href="edit_bio.php?id=<?php echo $row['id']; ?>" class="btn" data-animation="fadeInUp" data-delay=".6s"><i class="fas fa-edit"> Edit Bio</i></a>
                            <!-- <a disabled href="?type=delete&id=<?php echo $row['id']; ?>" class="inactiveLink"><i class="fas fa-trash"></i></a> -->


                        </div>

                    </div>

                </div>
        <?php

                            }
                        }
        ?>


            </div>
        </div>
    </section>




    <section class="service-area grey-bg pb-70 pt-100">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 mb-40">
                    <div class="section-title ">
                        <h2>Counter</h2>
                        <span><a href="add_count.php">Add Count</a></span>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-12 col-md-12 text-center mb-30">


                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col">Hours of Work</th>
                                <th scope="col">Project Done</th>
                                <th scope="col">Satisfied Customers</th>
                                <th scope="col">Awards</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $sql = "SELECT * from count";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                $i = 1;

                                while ($row = mysqli_fetch_assoc($result)) {






                            ?>
                                    <tr>
                                        <th scope="row"> <?php echo $row['hours']; ?></th>
                                        <td><?php echo $row['pro_done']; ?></td>
                                        <td><?php echo $row['customers']; ?></td>

                                        <td><?php echo $row['awards']; ?></td>
                                        <td> <a href="edit_count.php?id=<?php echo $row['id']; ?>"><i class="fas fa-edit"></i></a>
                                            <a href="?type=delete&id=<?php echo $row['id']; ?>" class="text-danger"><i class="fas fa-trash"></i></a>

                                        </td>

                                    </tr>
                                    <tr>
                                    <?php $i++;
                                }
                            } else { ?>
                                    <tr>
                                        <td colspan="7"> NO Counts !!</td>
                                    </tr>
                                <?php } ?>
                                </tr>
                        </tbody>
                    </table><br><br><br>


                </div>



            </div>
        </div>
    </section>
    <section class="service-area grey-bg pb-70 pt-100">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 mb-40">
                    <div class="section-title ">
                        <h2>Programming Lang</h2>
                        <span><a href="add_skill.php">Add Programming Language</a></span>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-12 col-md-12 text-center mb-30">


                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col">Programming Language</th>
                                <th scope="col">Skill Level</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $sql = "SELECT * from level";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                $i = 1;

                                while ($row = mysqli_fetch_assoc($result)) {






                            ?>
                                    <tr>
                                        <th scope="row"> <?php echo $row['prog_language']; ?></th>
                                        <td><?php echo $row['prog_bar']; ?></td>

                                        <td> <a href="edit_skill.php?id=<?php echo $row['id']; ?>"><i class="fas fa-edit"></i></a>
                                            <a href="?type=delete&id=<?php echo $row['id']; ?>" class="text-danger"><i class="fas fa-trash"></i></a>
                                        </td>

                                    </tr>
                                    <tr>
                                    <?php $i++;
                                }
                            } else { ?>
                                    <tr>
                                        <td colspan="7"> NO Programming Language !!</td>
                                    </tr>
                                <?php } ?>
                                </tr>
                        </tbody>
                    </table><br><br><br>


                </div>



            </div>
        </div>
    </section>
    <section class="service-area grey-bg pb-70 pt-100">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 mb-40">
                    <div class="section-title ">
                        <h2>Project </h2>
                        <span><a href="add_project.php">Add Project</a></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php

                $sql = "SELECT * from project";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    $i = 1;

                    while ($row = mysqli_fetch_assoc($result)) {
                        $filename = $row["image"];




                ?>
                        <div class="col-lg-4 col-md-6 text-center mb-30">
                            <div class="features-wrap" style="background-image: url(./uploads/<?php echo    $filename ?>)">
                                <div class="features-icon">

                                </div>
                                <a href="./uploads/<?php echo    $filename ?>"><?php echo $row['name']; ?></a>
                                <h4><?php echo $row['link']; ?></h4>


                            </div>
                            <a href="edit_project.php?id=<?php echo $row['id']; ?>"><i class="fas fa-edit"></i></a>
                            <a href="?type=delete&id=<?php echo $row['id']; ?>" class="text-danger"><i class="fas fa-trash"></i></a>

                        </div>
                    <?php $i++;
                    }
                } else { ?>

                    <h1 class="text-danger">No Causes Here..</h1>
                <?php } ?>

            </div>
        </div>
    </section>







</main>

<?php
include_once('includes/footer.php');
include_once('includes/scripts.php');
?>