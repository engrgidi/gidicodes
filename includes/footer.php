<footer>
    <div class="container text-center text-light">
        <div class="row">
            <div class="col-md-12">
                <?php

                $sql = "SELECT * from contact";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {





                ?>
                        <div class="social-icons big">
                            <a href="<?php echo $row['github']; ?>"><i class="fa fa-github fa-lg"></i></a>
                            <a href="<?php echo $row['twitter']; ?>"><i class="fa fa-twitter fa-lg"></i></a>
                            <a href="<?php echo $row['instagram']; ?>"><i class="fa fa-instagram fa-lg"></i></a>

                        </div>
                <?php

                    }
                }
                ?>
            </div>
        </div>
    </div>

    <div class="subfooter">
        <div class="container text-center">
            <div class="row">
                <div class="col-md-12">
                    <p> Copyright &copy; <?php echo date('Y') ?> gidicodes. All Rights Reserved </p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer close -->

<a href="#" id="back-to-top"></a>
<div id="preloader">
    <div class="s1">
        <span></span>
        <span></span>
    </div>
</div>
