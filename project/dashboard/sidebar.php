
<?php
if ($_SESSION['role'] != 'admin') {
    header('location: ../../index.php');
}

// include "../pages/handlers/login_sys.php"
?>
<aside id="sidebar" class="side">
            <div class="h-100">
                <div class="sidebar_logo d-flex align-items-end">
                    <img src="img/logo.svg" alt="icon">
                    <a href="#" class="nav-link text-white-50">Dashboard</a>
                    <img class="close align-self-start" src="img/close.svg" alt="icon">
                </div>

                <ul class="sidebar_nav">
                    <li class="sidebar_item <?=$dashboard_active?>" style="width: 100%;">
                        <a href="dashboard.php" class="sidebar_link"> <img src="img/1. overview.svg"
                                alt="icon">statistics</a>
                    </li>
                    <li class="sidebar_item <?=$projects_active?>">
                        <a href="Projects.php" class="sidebar_link"> <img src="img/task.svg" alt="icon">Projects</a>
                    </li>
                    <?php
                    if($_SESSION['role']=='admin'){

                    
                    ?>
                    <li class="sidebar_item <?=$freelancer_active?>">
                        <a href="freelancers.php" class="sidebar_link"> <img src="img/agents.svg"
                                alt="icon">freelancer</a>
                    </li>
                    <li class="sidebar_item">
                        <a href="user.php" class="sidebar_link"> <img src="img/agents.svg"
                                alt="icon">Users</a>
                    </li>

                    <li class="sidebar_item <?=$categorys_active?>">
                        <a href="Categories.php" class="sidebar_link"><img src="img/agent.svg" alt="icon">Categorys</a>
                    </li>
                    <li class="sidebar_item <?=$Testimonial_active?>">
                        <a href="testimonial.php" class="sidebar_link"><img src="img/agent.svg" alt="icon">Testimonial</a>
                    </li>
                    <?php
                }
                    
                    ?>
                </ul>
                <div class="line"></div>
                <a href="#" class="sidebar_link"><img src="img/settings.svg" alt="icon">Settings</a>


            </div>
</aside>
<div class="main">
            <nav class="navbar justify-content-space-between pe-4 ps-2">
                <button class="btn open">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar gap-4">
                    <div class="">
                        <input type="search" class="search" placeholder="Search" />
                        <img class="search_icon" src="img/search.svg" alt="iconicon" />
                    </div>
                    <!-- <img src="img/search.svg" alt="icon"> -->
                    <img class="notification" src="img/new.svg" alt="icon" />
                    <div class="card new w-auto">
                        <div class="list-group list-group-light">
                            <div class="list-group-item px-3 d-flex justify-content-between align-items-center">
                                <p class="mt-auto">Notification</p>
                                <a href="#"><img src="img/settingsno.svg" alt="icon" /></a>
                            </div>
                            <div class="list-group-item px-3 d-flex">
                                <img src="img/notif.svg" alt="iconimage" />
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text mb-3">
                                        Some quick example text to build on the card title and
                                        make up the bulk of the card's content.
                                    </p>
                                    <small class="card-text">1 day ago</small>
                                </div>
                            </div>
                            <div class="list-group-item px-3 d-flex">
                                <img src="img/notif.svg" alt="iconimage" />
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text mb-3">
                                        Some quick example text to build on the card title and
                                        make up the bulk of the card's content.
                                    </p>
                                    <small class="card-text">1 day ago</small>
                                </div>
                            </div>
                            <div class="list-group-item px-3 text-center">
                                <a href="#">View all notifications</a>
                            </div>
                        </div>
                    </div>
                    <div class="inline"></div>
                    <div class="name">lahcen Admin</div>
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-icon pe-md-0 position-relative" data-bs-toggle="dropdown">
                                <img src="img/photo_admin.svg" alt="icon" />
                            </a>
                            <div class="dropdown-menu dropdown-menu-end position-absolute">
                                <a class="dropdown-item" href="#">Profile</a>
                                <a class="dropdown-item" href="#">Account Setting</a>
                                <a class="dropdown-item" href="../pages/handlers/logout.php">Log out</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>