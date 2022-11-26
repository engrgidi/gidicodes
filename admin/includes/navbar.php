<body id="reportsPage">
    <div class="" id="home">
        <nav class="navbar navbar-expand-xl">
            <div class="container h-100">
               
                <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars tm-nav-icon"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto h-100">
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php">
                                <i class="fas fa-tachometer-alt"></i>
                              Admin  Dashboard
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="add_project.php">
                                <i class="fa fa-briefcase"></i>
                                Project
                            </a>
                        </li>
                       
                        <li class="nav-item">
                            <a class="nav-link" href="education.php">
                                <i class="fa fa-user-graduate"></i>
                                Education
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="experience.php">
                                <i class="fa fa-file-alt"></i>
                                Experience
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="level.php">
                                <i class="fa fa-file-alt"></i>
                                Skill level
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="inbox.php">
                                <i class="fas fa-envelope"></i>
                                Inbox
                            </a>
                        </li>
                       
                        
                        <li class="nav-item">
                            <a class="nav-link" href="contacts.php">
                                <i class="far fa-id-card"></i>
                                Contacts
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="accounts.php">
                                <i class="far fa-user"></i>
                                Accounts
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-cog"></i>
                                <span>
                                    Settings <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="admin_profile.php">Profile</a>
                                <a class="dropdown-item" href="#">Billing</a>
                                <a class="dropdown-item" href="#">Customize</a>
                            </div>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <form action="./auth/process_admin.php" method="POST">
                                <button type="submit" class="btn btn-primary btn-block text-uppercase" name="logout">Logout</button>
                                <!-- <a class="nav-link d-block">
                                Admin, <b>Logout</b>
                            </a> -->

                            </form>

                        </li>
                    </ul>
                </div>
            </div>

        </nav>