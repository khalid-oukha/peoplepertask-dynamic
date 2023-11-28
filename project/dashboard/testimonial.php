<?php
$projects_active = "";
$freelancer_active = "";
$dashboard_active = "";
$categorys_active = "";
$Testimonial_active = "active";
require "../../backend/testimonial_script.php";
require "../../backend/freelancer_script.php";
getAlltestimonials();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PeoplePerTask</title>
    <link rel="stylesheet" href="dashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
    <div class="wrapper">
        <?php
        require "sidebar.php";
        ?>
        <div class="main">
            <nav class="navbar justify-content-space-between pe-4 ps-2">
                <button class="btn open">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar  gap-4">
                    <div class="">
                        <input type="search" class="search " placeholder="Search">
                        <img class="search_icon" src="img/search.svg" alt="iconicon">
                    </div>
                    <img class="notification" src="img/new.svg" alt="icon">
                    <div class="card new w-auto">
                        <div class="list-group list-group-light">
                            <div class="list-group-item px-3 d-flex justify-content-between align-items-center ">
                                <p class="mt-auto">Notification</p><a href="#"><img src="img/settingsno.svg" alt="icon"></a>
                            </div>
                            <div class="list-group-item px-3 d-flex"><img src="img/notif.svg" alt="iconimage">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text mb-3">Some quick example text to build on the card title and
                                        make up
                                        the bulk of the card's content.</p>
                                    <small class="card-text">1 day ago</small>
                                </div>
                            </div>
                            <div class="list-group-item px-3 d-flex"><img src="img/notif.svg" alt="iconimage">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text mb-3">Some quick example text to build on the card title and
                                        make up
                                        the bulk of the card's content.</p>
                                    <small class="card-text">1 day ago</small>
                                </div>
                            </div>
                            <div class="list-group-item px-3 text-center"><a href="#">View all notifications</a></div>
                        </div>
                    </div>
                    <div class="inline"></div>
                    <div class="name">lahcen Admin</div>
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-icon pe-md-0 position-relative" data-bs-toggle="dropdown">
                                <img src="img/photo_admin.svg" alt="icon">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end position-absolute">
                                <a class="dropdown-item" href="#">Profile</a>
                                <a class="dropdown-item" href="#">Account Setting</a>
                                <a class="dropdown-item" href="/PeoplePerTask/project/pages/index.html">Log out</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="container my-4 py-4">
                <!-- Primary Button -->


                <table id="example" class="table table-striped  " style="width:100%">
                    <thead>
                        <tr class="table-dark">
                            <th>ID</th>
                            <th>Name user</th>
                            <th>testimonial</th>
                            <th>created at</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        for ($i = 0; $i < count($GLOBALS["testimonials"]); $i++) {
                        ?>
                            <tr>
                                <td><?= $GLOBALS["testimonials"][$i]["ID"] ?></td>
                                <td><?= $GLOBALS["testimonials"][$i]["Name_user"] ?></td>
                                <td><?= $GLOBALS["testimonials"][$i]["testimonial_Message"] ?></td>
                                <td><?= $GLOBALS["testimonials"][$i]["created_at"] ?></td>
                                <td>
                                </td>
                                
                                <form id="deleteForm" action="../../backend/testimonial_script.php" method="post">
                                        <input type="hidden" name="deleteId" value="<?= $GLOBALS["testimonials"][$i]["ID"] ?>">
                                        <td>
                                            <input type="submit" onclick="confirm('are you sure you want to delete this testimonial')" name="delete_testimonial" value="delete" class="btn btn-danger mx-2">
                                        </td>
                                </form>

                            </tr>

                        <?php
                        }
                        global $con;
                        mysqli_close($con);
                        ?>
                    </tbody>

                </table>

            </div>

        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script src="dashboard.js"></script>
    <script src="js/script.js"></script>
</body>

</html>