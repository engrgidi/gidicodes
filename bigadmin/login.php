<?php
include_once('./auth/process_admin.php');

$title = 'Login - Dashboard';
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
                            Login
                        </p>

                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-12 col-md-12 text-center mb-30">
                    <div class="col-md-8 offset-md-2">
                        <form id="contact-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="contact-form" method="POST">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 mb-20">
                                    <input name="username" type="text" placeholder="Enter Username">
                                    <span class="text-danger"> <?php echo $usernameErr; ?> </span>

                                </div>

                                <div class="col-xl-3 col-lg-3 mb-20">
                                    <input name="password"  type="password"  id="myInput" placeholder="Enter Password">
                                    <span class="text-danger"> <?php echo $passwordErr; ?> </span>
                                </div>
                                <div class="col-xl-3 col-lg-3 mb-20">
                                    <button class="btn btn-primary"  onclick="myFunction()"><i class="fa fa-eye-slash" aria-hidden="true"></i></button>
                                </div>
                               
                              
                                <div class="col-xl-12 text-center">
                                    <button class="btn" name="login_admin" type="submit">Login</button>
                                </div>
                            </div>
                        </form>
                        <br>
                        <?php
                        echo "$msg";
                        echo "$error";
                        ?>


                    </div>




                </div>



            </div>
        </div>
    </section>
</main>
<script>
    function myFunction() {
        var x = document.getElementById("myInput");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
<?php
include_once('includes/footer.php');
include_once('includes/scripts.php');
?>