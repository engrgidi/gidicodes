<?php
include_once('./auth/process_admin.php');

$title = 'Admin Register - BignameXchange';
include_once('includes/head.php');

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
                        <h2>Welcome Admin! </h2>
                        <p>
                            Sign up
                        </p>

                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-12 col-md-12 text-center mb-30">
                    <div class="col-md-8 offset-md-2">
                        <form id="contact-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="contact-form" method="POST">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 mb-20" <?php if (isset($usernameErr)) : ?> <?php endif ?>>
                                    <input name="username" type="text" placeholder="Enter Username">
                                    <span class="text-danger"> <?php echo $usernameErr; ?> </span>
                                </div>
                                <div class="col-xl-6 col-lg-6 mb-20" <?php if (isset($emailErr)) : ?> <?php endif ?>>
                                    <input name="admin_email" type="email" placeholder="Enter Email">
                                    <span class="text-danger"> <?php echo $emailErr; ?> </span>
                                </div>
                                <div class="col-xl-6 col-lg-6 mb-20" <?php if (isset($passwordErr)) : ?> <?php endif ?>>
                                    <input name="password" type="password" placeholder="Enter Password">
                                    <span class="text-danger"> <?php echo $passwordErr; ?> </span>

                                </div>

                                <div class="col-xl-6 col-lg-6 mb-20" <?php if (isset($password_confirmationErr)) : ?> <?php endif ?>>
                                    <input name="password_confirmation" type="password" placeholder="Confirm Password">
                                    <span class="text-danger"> <?php echo $password_confirmationErr; ?> </span>

                                </div>

                                <div class="col-xl-12 text-center">
                                    <button disabled class="btn" name="reg_admin" type="submit">Sign up</button>
                                    <a href="login.php">Login</a>
                                </div>
                            </div>
                        </form>
                        <br><?php
                            echo "$msg";
                            echo "$error";
                            ?>

                    </div>




                </div>



            </div>
        </div>
    </section>
</main>

<?php
include_once('includes/footer.php');
include_once('includes/scripts.php');
?>