<?php
include_once('./auth/process_admin.php');

$title = 'All Informations - Admin';
include_once('./auth/session.php');

include_once('includes/head.php');
include_once('includes/header.php');



if (isset($_GET['type']) && $_GET['type'] != '') {
    $type = get_safe_value($conn, $_GET['type']);
}
if ($type == 'delete') {
    $id = get_safe_value($conn, $_GET['id']);
    $delete_sql = "DELETE from contact  where id='$id'";
    mysqli_query($conn, $delete_sql);
}
if ($type == 'delete') {
    $id = get_safe_value($conn, $_GET['id']);
    $delete_sql = "DELETE from experience  where id='$id'";
    mysqli_query($conn, $delete_sql);
}
if ($type == 'delete') {
    $id = get_safe_value($conn, $_GET['id']);
    $delete_sql = "DELETE from education  where id='$id'";
    mysqli_query($conn, $delete_sql);
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
                        <h2>All Information </h2>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-xl-12 col-xs-12 col-sm-10">
                    <table class="table table-responsive  table-borderless">
                        <thead>
                            <tr>
                                <th scope="col">Address</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Github</th>
                                <th scope="col">Twitter</th>
                                <th scope="col">Instagram</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $sql = "SELECT * from contact";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                $i = 1;

                                while ($row = mysqli_fetch_assoc($result)) {





                            ?>
                                    <tr>
                                        <td><?php echo $row['address']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td><?php echo $row['phone']; ?></td>
                                        <td><?php echo $row['github']; ?></td>
                                        <td><?php echo $row['twitter']; ?></td>
                                        <td><?php echo $row['instagram']; ?></td>

                                        <td>
                                            <a href="edit_socials.php?id=<?php echo $row['id']; ?>"><i class="fas fa-edit"></i></a>
                                            <a href="?type=delete&id=<?php echo $row['id']; ?>" class="text-danger"><i class="fas fa-trash"></i></a>
                                        </td>

                                    </tr>
                                    <tr>
                                    <?php $i++;
                                }
                            } else { ?>
                                    <tr>
                                        <td colspan="7"> NO INFORMATION !!</td>
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
                        <h2>Experience</h2>
                        <span><a href="add_experience.php">Add Experience</a></span>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-12 col-md-12 text-center mb-30">


                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col">Year</th>
                                <th scope="col">Position</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $sql = "SELECT * from experience";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                $i = 1;

                                while ($row = mysqli_fetch_assoc($result)) {






                            ?>
                                    <tr>
                                        <th scope="row"> <?php echo $row['year']; ?></th>
                                        <td><?php echo $row['position']; ?></td>

                                        <td> <a href="edit_experience.php?id=<?php echo $row['id']; ?>"><i class="fas fa-edit"></i></a>
                                            <a href="?type=delete&id=<?php echo $row['id']; ?>" class="text-danger"><i class="fas fa-trash"></i></a>
                                        </td>

                                    </tr>
                                    <tr>
                                    <?php $i++;
                                }
                            } else { ?>
                                    <tr>
                                        <td colspan="7"> NO Experience Yet !!</td>
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
                        <h2>Education</h2>
                        <span><a href="add_education.php">Add Education</a></span>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-12 col-md-12 text-center mb-30">


                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col">Year</th>
                                <th scope="col">School</th>
                                <th scope="col">School Information</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $sql = "SELECT * from education";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                $i = 1;

                                while ($row = mysqli_fetch_assoc($result)) {






                            ?>
                                    <tr>
                                        <th scope="row"> <?php echo $row['year']; ?></th>
                                        <td><?php echo $row['school']; ?></td>
                                        <td><?php echo $row['school_info']; ?></td>
                                        <td> <a href="edit_education.php?id=<?php echo $row['id']; ?>"><i class="fas fa-edit"></i></a>
                                            <a href="?type=delete&id=<?php echo $row['id']; ?>" class="text-danger"><i class="fas fa-trash"></i></a>
                                        </td>

                                    </tr>
                                    <tr>
                                    <?php $i++;
                                }
                            } else { ?>
                                    <tr>
                                        <td colspan="7"> NO Education Yet !!</td>
                                    </tr>
                                <?php } ?>
                                </tr>
                        </tbody>
                    </table><br><br><br>


                </div>



            </div>
        </div>
    </section>
</main>

<?php
include_once('includes/footer.php');
include_once('includes/scripts.php');
?>