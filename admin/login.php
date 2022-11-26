<?php
include_once('./auth/process_admin.php');
include_once('./includes/header.php');
$title = 'Admin Login';




?>

</div>

<div class="container tm-mt-big tm-mb-big">
  <h1 class="tm-block-title mb-4 text-center">Welcome back Admin</h1>
  <div class="row">
    <div class="col-12 mx-auto tm-login-col">
      <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
        <div class="row">
          <div class="col-12 text-center">

            <h2 class="tm-block-title mb-4">Login</h2>
          </div>
        </div>
        <div class="row mt-2">
          <div class="col-12">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="tm-login-form">
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Enter Email">
                <span class="text-danger"> <?php echo $emailErr; ?> </span>
              </div>
              <div class="form-group mt-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Enter Password">
                <span class="text-danger"> <?php echo $passwordErr; ?> </span>
              </div>
              <div class="form-group mt-4">
                <button name="login_admin" type="submit" class="btn btn-primary btn-block text-uppercase">
                  Login
                </button>

              </div>

            </form>

            <?php
            echo "$error"; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
include_once('./includes/footer.php');
include_once('./includes/scripts.php');



?>