<?php
include_once('./auth/process_admin.php');
$title = 'Add Count';

include_once('./auth/session.php');
include_once('./includes/header.php');
include_once('./includes/navbar.php');

$id = $_GET['id'];
$msg = "";
if (isset($_POST['submit'])) {
  $hours = $_POST['hours'];
  $pro_done = $_POST['pro_done'];
  $customers = $_POST['customers'];
  $awards = $_POST['awards'];
  $sql = "UPDATE count SET hours='$hours', pro_done='$pro_done', customers='$customers', awards='$awards' WHERE id='$id'";
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
      <a href="dashboard.php" class="btn btn-primary btn-block text-uppercase">Counts Information</a>
      <div class="container-fluid tm-bg-primary-dark  tm-block tm-block-taller tm-block-scroll">
        <div class="col-12 tm-block-col">

          <div class="content pb-0">
            <div class="animated fadeIn">
              <div class="row">
                <div class="col-12 tm-block-col">
                  <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
                    <h2 class="tm-block-title">Edit Counts </h2>
                    <div class="">
                      <?php echo $msg;
                      $sql = "SELECT * from count WHERE id='$id'";
                      $result = mysqli_query($conn, $sql);
                      if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                      ?>

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


                            <button id="payment-button" name="submit" type="submit" class="btn btn-primary btn-block text-uppercase btn-lg">
                              <span id="payment-button-amount">Update Counts</span>
                            </button>


                          </form>
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

        </div>
      </div>
    </div>

  </div>
</div>

<?php
include_once('./includes/footer.php');
include_once('./includes/scripts.php');



?>