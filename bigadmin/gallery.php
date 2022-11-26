<?php
include_once('./auth/process_admin.php');

$title = 'Gallery - Admin';
include_once('./auth/session.php');

include_once('includes/head.php');
include_once('includes/header.php');


if (isset($_GET['type']) && $_GET['type'] != '') {
    $type = get_safe_value($conn, $_GET['type']);
}
if ($type == 'delete') {
    $id = get_safe_value($conn, $_GET['id']);
    $delete_sql = "DELETE from slider  where id='$id'";
    mysqli_query($conn, $delete_sql);
}
if ($type == 'delete') {
    $id = get_safe_value($conn, $_GET['id']);
    $delete_sql = "DELETE from gallery  where id='$id'";
    mysqli_query($conn, $delete_sql);
}


?>
<!-- Modal Search -->
<div class="modal fade" id="search-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">

    </div>
</div>
<main>
    <section class="about-area pb-60 pt-100">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 mb-40">
                    <div class="section-title">
                        <h2>Ricvia Logo</h2>
                        <span><a href="add_logo.php">Add Logo Image</a></span>

                    </div>
                    <?php

                    $sql = "SELECT * from logo";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        $i = 1;

                        while ($row = mysqli_fetch_assoc($result)) {
                            $filename = $row["image"];



                    ?>
                            <div class="Our Motto">
                                <p>
                                    <?php echo $row['descr']; ?>

                                </p>
                            </div>
                </div>
                <div class="col-xl-6 col-lg-6 mb-20 md-margin">
                    <div class="row">
                        <div class="col-xl-6 col-md-6 mb-20">
                            <div class="about-img">
                                <img src="./uploads/<?php echo    $filename ?>" class="img-fluid" alt="">
                                <a href="edit_logo.php?id=<?php echo $row['id']; ?>" data-animation="fadeInUp" data-delay=".6s"><i class="fas fa-edit"></i></a>

                            </div>

                        </div>

                    </div>
                </div>
            <?php $i++;
                        }
                    } else { ?>

            <h1 class="text-danger">No Logo</h1>
        <?php } ?>
            </div>
        </div>
    </section>


    <section class="service-area grey-bg pb-70 pt-100">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 mb-40">
                    <div class="section-title ">
                        <h2>Slider Image</h2>
                        <span><a href="add_slider.php">Add Slider Image</a></span>
                    </div>
                </div>
            </div>
            <div class="clients-area pt-50 pb-50">
                <div class="container">
                    <div class="row">

                        <div class="clients-active owl-carousel">
                            <?php

                            $sql = "SELECT * from slider";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                $i = 1;

                                while ($row = mysqli_fetch_assoc($result)) {
                                    $filename = $row["image"];



                            ?>
                                    <div class="col-sm-12">
                                        <div class="single-clients">
                                            <a href="edit_slider.php?id=<?php echo $row['id']; ?>"><i class="fas fa-edit"></i></a>
                                            <a href="?type=delete&id=<?php echo $row['id']; ?>" class="text-danger"><i class="fas fa-trash"></i></a>

                                            <a href="<?php echo $row['link']; ?> "> <img src="./uploads/<?php echo    $filename ?>" class="img-fluid" alt="">
                                            </a>
                                        </div>
                                    </div>
                                <?php $i++;
                                }
                            } else { ?>

                                <h1 class="text-danger">No Images</h1>
                            <?php } ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="portfoilo-area grey-bg pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 mb-40">
                    <div class="section-title ">
                        <h2>Photo Gallery</h2>
                        <span><a href="add_gallery.php">Add Event Picture</a></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="portfolio-menu mb-55">

                    </div>
                </div>
            </div>
            <div class="row portfolio-active">
                <?php

                $sql = "SELECT * from gallery";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    $i = 1;

                    while ($row = mysqli_fetch_assoc($result)) {
                        $filename = $row["image"];






                ?>

                        <div class="col-xl-4 col-lg-4 col-md-6 mb-30 grid-item cat-two">

                            <div class="portfolio-wrapper">
                                <div class="portfolio-thumb">
                                    <img src="./uploads/<?php echo    $filename ?>" class="img-fluid" alt="">


                                </div>
                                <div class="portfolio-content">
                                    <h5><?php echo $row['category']; ?> </h5>
                                    <span><?php echo $row['aim']; ?> </span>
                                    <a href="edit_gallery.php?id=<?php echo $row['id']; ?>"><i class="fas fa-edit"></i></a>
                                    <a href="?type=delete&id=<?php echo $row['id']; ?>" class="text-danger"><i class="fas fa-trash"></i></a>
                                </div>
                            </div>

                        </div>
                    <?php $i++;
                    }
                } else { ?>

                    <h1 class="text-danger">No Gallery Images</h1>
                <?php } ?>

            </div>
        </div>
    </section>
   







</main>

<?php
include_once('includes/footer.php');
include_once('includes/scripts.php');
?>