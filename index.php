<?php
include_once('admin/auth/process_admin.php');
$title = 'Mygidicodes - Home';

include_once('includes/header.php');
$result = false;

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $text = $_POST['text'];
    $sql = "INSERT INTO inbox (name, email, phone, text) VALUES ('$name', '$email', '$phone', '$text') ";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $msg = " <div class='alert alert-success'>Thanks we will be in touch.</div> ";
    } else {
        $msg = " <div class='alert alert-danger'>Something went wrong.Please try again</div> ";
    }
}


?>
<!-- header close -->

<!-- content begin -->
<div id="content" class="no-bottom no-top">
    <div id="top"></div>

    <!-- section begin -->
    <section id="section-hero-3" style="background-image: url('images/background/6d.jpg');" class="full-height relative no-top no-bottom text-light" data-stellar-background-ratio=".2">
        <div class="overlay-bg">
            <div class="center-y fadeScroll relative text-center" data-scroll-speed="4">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="spacer-double"></div>
                            <h1 class="very-big font-Orbitron">I'm Maxwell</h1>
                            <div class="h2_s1 text-white mt10">
                                <div class="typed-strings font-Orbitron">
                                    <p>Product Designer</p>
                                    <p>Programmer</p>
                                    <p>Mathematician</p>
                                </div>
                                <div class="typed"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section close -->


    <!-- section begin -->
    <section id="section-about">
        <div class="container relative">
            <div class="row">
                <?php

                $sql = "SELECT * from admin_profile";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $filename = $row["image"];
                        $bio = $row["bio"];



                ?>
                        <div class="col-md-5">
                            <div class="pr20">
                                <?php echo   '  <img src="admin/' . $filename . '" class="img-auto img-rounded img-responsive" alt="">' ?>
                            </div>
                        </div>

                        <div class="col-md-7">
                            <div class="spacer-half"></div>
                            <h5><span class="id-color">About Me</span></h5>
                            <h2>A Quick Bio</h2>

                            <p><?php echo $row['bio']; ?></p>




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
                        <div class="col-md-4">
                            <div class="skill-bar style-2">
                                <h5><?php echo $row['prog_language']; ?></h5>
                                <div class="de-progress">
                                    <div class="value"></div>
                                    <div class="progress-bar" data-value="<?php echo $row['prog_bar']; ?>%">
                                    </div>
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
    <!-- section close -->

    <!-- section begin -->
    <section id="section-services" class="no-top no-bottom text-light index-4" data-stellar-background-ratio=".2">
        <div class="overlay-solid">
            <div class="overlay-bg t70">
                <div class="container">

                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h5><span class="id-color">My Projects</span></h5>
                            <h2>I'm Available For Hire <i class="icon_lightbulb_alt id-color"></i>
                                <i class="icon_pencil-edit id-color"></i>
                                <i class="icon_tag_alt id-color"></i>
                                <i class="icon_search id-color"></i>
                                <i class="icon_datareport id-color"></i>
                            </h2>




                            <!-- feature box begin -->
                            <?php

                            $sql = "SELECT * from project";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {





                            ?>
                                  <div class="feature-box col-md-4" style="background-image:   url('admin/<?php echo $row['image']; ?>');"> 
                                        <div class="inner">
                                            <a href="<?php echo $row['link']; ?>">
                                                <div class="text " >
                                                    <h3><?php echo $row['name']; ?></h3>
                                                   
                                                </div>
                                            </a>

                                        </div>
                                    </div>
                            <?php

                                }
                            }
                            ?>
                            <!-- feature box close -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section close -->



    <!-- section begin -->
    <section id="section-experiences" style="background-image: url('images/background/3.jpg');" class="no-top no-bottom text-light index-4" data-stellar-background-ratio=".2">
        <div class="overlay-solid">
            <div class="overlay-bg t70">
                <div class="container">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="padding20 wow fadeInRight">
                                <h2>Experiences</h2>
                                <?php

                                $sql = "SELECT * from experience";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {

                                ?>
                                        <div class="exp-box">
                                            <h5><?php echo $row['year']; ?></h5>
                                            <h3><?php echo $row['position']; ?></h3>
                                        </div>
                                <?php

                                    }
                                }
                                ?>

                            </div>
                        </div>


                        <div class="col-md-6">

                            <div class="padding20 wow fadeInRight" data-wow-delay=".25s">
                                <h2>Education</h2>
                                <?php

                                $sql = "SELECT * from education";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {

                                ?>
                                        <div class="exp-box">
                                            <h5><?php echo $row['year']; ?></h5>
                                            <h3><?php echo $row['school']; ?></h3>
                                            <h4><?php echo $row['school_info']; ?></h4>
                                        </div>
                                <?php

                                    }
                                }
                                ?>


                            </div>

                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section close -->


    <!-- section begin -->
    <section id="section-fun-facts" class="pt60 pb60">
        <div class="container">
            <?php

            $sql = "SELECT * from count";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {





            ?>

                    <div class="row">
                        
                        <div class="col-md-3 col-sm-3 wow fadeIn" data-wow-delay="0">
                            <div class="de_count">
                                <h3 class="timer" data-to="<?php echo $row['hours']; ?>" data-speed="2500">0</h3>
                                <span>Hours of Works</span>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-3 wow fadeIn" data-wow-delay=".25s">
                            <div class="de_count">
                                <h3 class="timer" data-to="<?php echo $row['pro_done']; ?>" data-speed="2500">0</h3>
                                <span>Projects Done</span>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-3 wow fadeIn" data-wow-delay=".5s">
                            <div class="de_count">
                                <h3 class="timer" data-to="<?php echo $row['customers']; ?>" data-speed="2500">0</h3>
                                <span>Satisfied Customers</span>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-3 wow fadeIn" data-wow-delay=".75s">
                            <div class="de_count">
                                <h3 class="timer" data-to="<?php echo $row['awards']; ?>" data-speed="2500">0</h3>
                                <span>Awards Winning</span>
                            </div>
                        </div>
                                <?php

                                }
                            }
                                ?>

                    </div>
        </div>
    </section>
    <!-- section close -->



    <!-- section begin -->
    <section id="section-contact" class="no-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h5><span class="id-color">Have Question?</span></h5>
                    <h2>Contact Me Now</h2>
                </div>

                <div class="col-md-8 col-md-offset-2 wow fadeInUp">

                    <div class="row">
                        <?php echo $msg; ?>
                        <form name="contactForm" id='contact_form' class="form-group" method="post" action='<?php $_SERVER['PHP_SELF']; ?>'>
                            <div class="col-md-6">
                                <div class="field-set">
                                    <input type='text' name='name' class="form-control text-danger" placeholder="Your Name" required>
                                    <div class="line-fx"></div>
                                </div>

                                <div class="field-set">
                                    <input type='text' name='email' class="form-control text-danger" placeholder="Your Email" required>
                                    <div class="line-fx"></div>
                                </div>

                                <div class="field-set">
                                    <input type='text' name='phone' class="form-control text-danger" placeholder="Your Phone" required>
                                    <div class="line-fx"></div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="field-set">
                                    <textarea name='text' class="form-control text-danger" placeholder="Your Message" required></textarea>
                                    <div class="line-fx"></div>
                                </div>
                            </div>

                            <div class="spacer-single"></div>

                            <div class="col-md-12 text-center">

                                <button class="btn btn-custom color-2" type="submit" name="submit">Send message</button>

                            </div>
                        </form>
                    </div>


                    <div class="spacer-double"></div>
                    <?php

                    $sql = "SELECT * from contact";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {





                    ?>

                            <div class="row text-center wow fadeInUp ">
                                <div class="col-md-4">
                                    <div class="wm-1"></div>
                                    <i class="icon_mobile id-color size40 mb20"></i>
                                    <h6 class="id-color">Call Us</h6>
                                    <h4><a href="tel:<?php echo $row['phone']; ?>"><?php echo $row['phone']; ?></a></h4>
                                </div>

                                <div class="col-md-4">
                                    <div class="wm-1"></div>
                                    <i class="icon_house_alt id-color size40 mb20"></i>
                                    <h6 class="id-color">Address</h6>
                                    <h4><?php echo $row['address']; ?></h4>
                                </div>

                                <div class="col-md-4">

                                    <div class="wm-1"></div>
                                    <i class="icon_mail_alt id-color size40 mb20"></i>
                                    <h6 class="id-color">Email Us</h6>
                                    <h4><a class="text-darker" href="mailto:<?php echo $row['email']; ?>"><?php echo $row['email']; ?></a></h4>
                                </div>
                            </div>
                    <?php

                        }
                    }
                    ?>

                </div>
            </div>

        </div>
    </section>


</div>
<!-- content close -->

<!-- footer begin -->

</div>


<?php
include('includes/footer.php');
include('includes/scripts.php');
?>