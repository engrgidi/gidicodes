<?php
include_once('./auth/process_admin.php');
$title = 'Edit Education';

include_once('./auth/session.php');
include_once('./includes/header.php');
include_once('./includes/navbar.php');


$id = $_GET['id'];
$msg = "";
if (isset($_POST['submit'])) {
    $year = $_POST['year'];
    $school = $_POST['school'];
    $school_info = $_POST['school_info'];
  $sql = "UPDATE education SET year='$year', school='$school', school_info='$school_info' WHERE id='$id'";
  $result = mysqli_query($conn, $sql);
  if ($result) {
    $msg = " <div class='alert alert-success'>Education details has been succesfully updated.</div> ";
  } else {
    $msg = " <div class='alert alert-danger'>Something went wrong.Please try again</div> ";
  }
}

?>

<div class="container m-5">

  <!-- row -->
  <div class="row ">
    <div class="container">
      <a href="education.php" class="btn btn-primary btn-block text-uppercase" >Education Information</a>
      <div class="container-fluid tm-bg-primary-dark  tm-block tm-block-taller tm-block-scroll">
        <div class="col-12 tm-block-col">

          <div class="content pb-0">
            <div class="animated fadeIn">
              <div class="row">
                <div class="col-lg-12">
                  <?php echo $msg;
                  $sql = "SELECT * from education WHERE id='$id'";
                  $result = mysqli_query($conn, $sql);
                  if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                  ?>
                      <div class="card ">

                        <div class="card-header"><strong>Edit Contact Information <small>Form</small></strong></div>
                        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                                            <div class="card-body card-block">
                                                <div class="form-group">
                                                    <label for="year">Year</label>
                                                    <input type="text" placeholder="Enter year" class="form-control bg-transparent text-secondary" name="year" value="" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="school">School</label>
                                                    <input type="text" placeholder="Enter school" class="form-control bg-transparent text-secondary" name="school" value="" required>
                                                </div>
                                                <div class="form-group">

                                                    <pre>SCHOOL INFORMATION:</pre><textarea type="text" placeholder="Enter Qualification" class="form-control bg-transparent text-secondary" name="school_info" value="" required> </textarea>
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