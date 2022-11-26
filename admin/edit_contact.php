<?php
include_once('./auth/process_admin.php');
$title = 'Edit Contact';

include_once('./auth/session.php');
include_once('./includes/header.php');
include_once('./includes/navbar.php');


$id = $_GET['id'];
$msg = "";
if (isset($_POST['submit'])) {
  $phone = $_POST['phone'];
  $address = $_POST['address'];
  $email = $_POST['email'];
  $github = $_POST['github'];
  $instagram = $_POST['instagram'];
  $twitter = $_POST['twitter'];
  $sql = "UPDATE contact SET phone='$phone', address='$address', email='$email', github='$github', instagram='$instagram', twitter='$twitter' WHERE id='$id'";
  $result = mysqli_query($conn, $sql);
  if ($result) {
    $msg = " <div class='alert alert-success'>Contact details has been succesfully updated.</div> ";
  } else {
    $msg = " <div class='alert alert-danger'>Something went wrong.Please try again</div> ";
  }
}

?>

<div class="container m-5">

  <!-- row -->
  <div class="row ">
    <div class="container">
      <a href="contacts.php" class="btn btn-primary btn-block text-uppercase" >Contacts Information</a>
      <div class="container-fluid tm-bg-primary-dark  tm-block tm-block-taller tm-block-scroll">
        <div class="col-12 tm-block-col">

          <div class="content pb-0">
            <div class="animated fadeIn">
              <div class="row">
                <div class="col-lg-12">
                  <?php echo $msg;
                  $sql = "SELECT * from contact WHERE id='$id'";
                  $result = mysqli_query($conn, $sql);
                  if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                  ?>
                      <div class="card ">

                        <div class="card-header"><strong>Edit Contact Information <small>Form</small></strong></div>
                        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                          <div class="card-body card-block">
                            <div class="form-group">
                              <label for="phone">Phone</label>
                              <input type="phone" placeholder="Enter phone" class="form-control bg-transparent text-secondary" name="phone" value="<?php echo $row['phone']; ?>" required>
                            </div>
                            <div class="form-group">

                              <pre>Address:</pre><textarea type="text" placeholder="Enter Address" class="form-control bg-transparent text-secondary" name="address" value="" required> <?php echo $row['address']; ?></textarea>
                            </div>
                            <div class="form-group">
                              <label for="email">Email</label>
                              <input type="email" placeholder="Enter email" class="form-control bg-transparent text-secondary" name="email" value="<?php echo $row['email']; ?>" required>
                            </div>
                            <div class="form-group">
                              <label for="github">Github</label>
                              <input type="text" placeholder="Enter github url " class="form-control bg-transparent text-secondary" name="github" value="<?php echo $row['github']; ?>" required>
                            </div>
                            <div class="form-group">
                              <label for="instagram">Instagram</label>
                              <input type="text" placeholder="Enter instagram url" class="form-control bg-transparent text-secondary" name="instagram" value="<?php echo $row['instagram']; ?>" required>
                            </div>
                            <div class="form-group">
                              <label for="twitter">Twitter</label>
                              <input type="text" placeholder="Enter twitter url" class="form-control bg-transparent text-secondary" name="twitter" value="<?php echo $row['twitter']; ?>" required>
                            </div>

                          </div>
                      <?php
                    }
                  }
                      ?>

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

  </div>
</div>

<?php
include_once('./includes/footer.php');
include_once('./includes/scripts.php');



?>