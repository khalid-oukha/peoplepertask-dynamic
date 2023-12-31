<!-- Navbar -->
<?php

// require "../../connection_database/database.php";
?>
<nav class="navbar navbar-expand-lg bg-body-tertiary navbar-postion ">
    <div class="container">
        <a class="navbar-brand" href="../../index.php"><img src="images/M.png" alt="logo"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php
                if (isset($_SESSION['email'])) {
                ?>
                    <li class="nav-item">
                        <a class="nav-link" style="color: green;" href="profile.php">Profile</a>
                    </li>
                <?php
                }
                ?>
                <li class="nav-item">
                    <a class="nav-link active" href="../../index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">about</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pack.php">Pricing</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        category
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="recherch.php">Ui/Ux</a></li>
                        <li><a class="dropdown-item" href="recherch.php">content writing</a></li>
                        <li><a class="dropdown-item" href="recherch.php">video editing</a></li>
                        <li><a class="dropdown-item" href="recherch.php">Ui/Ux</a></li>
                        <li><a class="dropdown-item" href="recherch.php">content writing</a></li>
                        <li><a class="dropdown-item" href="recherch.php">video editing</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../../index.php#testimonials-key">Testimonials</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>
            </ul>
            <!--  -->
            <form class="d-flex input-group w-auto">
                <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                <span class="input-group-text border-0" id="search-addon">
                    <img src="project/pages/images/searchicon.svg" alt="">
                </span>
            </form>
            <?php
            if(isset($_SESSION['email']) && $_SESSION['role'] == 'user'){
            ?>
            <a class="btn btn-primary me-2 sign-style-color" href="../pages/switchmode.php" role="button">Seller Mode</a>
            <?php
            }
            if (isset($_SESSION['email'])) {
            ?>
                <a class="btn btn-primary me-2 sign-style-color" href="handlers/logout.php" role="button">Logout</a>
            <?php } else{ ?>
                <a class="btn btn-primary me-2 sign-style-color" href="../pages/login.php" role="button">Login</a>
            <?php } ?>
        </div>
</nav>