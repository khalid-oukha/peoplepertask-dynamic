<?php
$projects_active = "";
$freelancer_active = "";
$dashboard_active = "";
$categorys_active = "active";
$Testimonial_active = "";
require "../../backend/categorys_script.php";
getAllCategorys();
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
                    <!-- <img src="img/search.svg" alt="icon"> -->
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
                    <div class="name">lighten Admin</div>
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
                <button type="button" class="btn btn-primary my-2" data-bs-toggle="modal" data-bs-target="#exampleModalCenter3"> ADD new Category </button>

                <table id="example" class="table table-striped  " style="width:100%">
                    <thead>
                        <tr class="table-dark">
                            <th>ID</th>
                            <th>category NAME</th>
                            <th>number of project</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        for ($i = 0; $i < count($GLOBALS["categorys"]); $i++) {
                        ?>
                            <tr>
                                <td><?= $GLOBALS["categorys"][$i]["ID"] ?></td>
                                <td><?= $GLOBALS["categorys"][$i]["Name_categories"] ?></td>
                                <td><?= $GLOBALS["categorys"][$i]["number of projects"] ?></td>
                                <form id="deleteForm" action="../../backend/categorys_script.php" method="post">
                                        <input type="hidden" name="deleteId" value="<?= $GLOBALS["categorys"][$i]["ID"] ?>">
                                        <td>
                                            <input type="submit" name="deletesubmit" onclick="confirm('are you sure you want to delete this categorie')" name="delete_freelancer" value="delete" class="btn btn-danger mx-2">
                                            <button type="button" class="btn btn-dark " onclick="updateCategorie(<?= $GLOBALS['categorys'][$i]['ID'] ?>)"> UPDATE </button>                                        </td>
                                </form>


                            </tr>


                        <?php
                        }
                        ?>
                    </tbody>

                </table>

            </div>

        </div>
    </div>


    <!-- Modal update -->
    <div class="modal fade modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">UPDATE CATEGORIES</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="../../backend/categorys_script.php" method="post">
                    <div class="mb-3">
                        <input type="hidden" name="Id" class="form-control" id="idFormUpdate">
                            <label for="recipient-name" class="col-form-label">category Name</label>
                            <input type="text" name="category_name" class="form-control" id="Oldcategory-name">
                        </div>
                        <select name="ID_Categorie" class="form-select" aria-label="Default select example">
                            <option id=""   selected disabled>Open this select menu</option>
                            <?php
                            for ($i = 0; $i < count($GLOBALS["categorys"]); $i++) {
                            ?>
                                <option value="<?= $GLOBALS["categorys"][$i]["ID"] ?>"><?= $GLOBALS["categorys"][$i]["Name_categories"] ?></option>
                            <?php
                            };
                            ?>
                        </select>
                        <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-success" name="edit_category" value="save changes">
                </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade modal-lg" id="exampleModalCenter3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">add new category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="../../backend/categorys_script.php" method="post">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">category Name</label>
                            <input type="text" name="category_name" class="form-control" id="recipient-name">
                        </div>
                        <select name="ID_Categorie" class="form-select" aria-label="Default select example">
                            <option id="oldID_Categorie" value="label" disabled selected>Open this select menu</option>
                            <?php
                            for ($i = 0; $i < count($GLOBALS["categorys"]); $i++) {
                            ?>
                                <option value="<?= $GLOBALS["categorys"][$i]["ID"] ?>"><?= $GLOBALS["categorys"][$i]["Name_categories"] ?></option>
                            <?php
                            };
                            ?>
                        </select>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-success" name="add_category" value="ADD">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script src="js/categorie_script.js"></script>
</body>

</html>