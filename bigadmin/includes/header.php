<header>
    <!-- <div class="header-top blue-bg">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-lg-6 col-md-8 text-center text-md-left">
                        <div class="header-top-cta">
                            <span><i class="fas fa-map-marker-alt"></i>1375 Ash Avenue</span>
                            <span><i class="far fa-envelope-open"></i>info@example.com</span>
                            <span><i class="fas fa-phone"></i>314-326-2990</span>
                        </div>
                    </div>

                </div>
            </div>
        </div> -->
    <div id="sticky-header" class="menu-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-5">
                    <div class="logo">
                        <a href="index.php">
                            <h1 style="color: white;">ADMIN</h1>
                        </a>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 text-right">
                    <div class="main-menu">
                        <nav id="mobile-menu">
                            <ul>




                                <li>
                                    <a href="inbox.php">✉ Messages</a>

                                </li>
                                <li>
                                    <a href="gallery.php">📷 Gallery</a>

                                </li>
                               


                                <li>
                                    <a href="info.php">Info</a>

                                </li>

                                <li>
                                    <form action="./auth/process_admin.php" method="POST">
                                        <button type="submit" class="btn" name="logout">Logout</button>

                                        <!-- <a href="" name="logout">Sign-out</a> -->

                                    </form>

                                </li>



                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-xl-1 col-lg-1 d-none d-lg-block">

                    <div class="menu-icon">

                        <a href="#" class="menu-tigger">
                            <span></span>
                            <span></span>
                            <span></span>
                        </a>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mobile-menu"></div>
                </div>
            </div>
            <div class="offcanvas-menu">
                <span class="menu-close"><i class="fas fa-times"></i></span>
                <ul>


                    <li>
                        <a href="inbox.php">✉ Messages</a>

                    </li>
                    <li>
                        <a href="gallery.php">📷 Gallery</a>

                    </li>
                  



                    <li>
                        <a href="info.php">Info</a>

                    </li>

                    <li>
                        <form action="./auth/process_admin.php" method="POST">
                            <button type="submit" class="btn" name="logout">Logout</button>

                            <!-- <a href="" name="logout">Sign-out</a> -->

                        </form>

                    </li>




                </ul>

            </div>
            <div class="offcanvas-overly"></div>
        </div>
    </div>
</header>