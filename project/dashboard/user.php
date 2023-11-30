<?php
$projects_active = "";
$freelancer_active = "";
$dashboard_active = "";
$categorys_active = "";
$Testimonial_active = "";

require "../../backend/user_script.php";

$queryuser = "SELECT u.ID,u.Name_user,u.Password_user,u.email,u.birthday,v.id,v.ville FROM users u 
inner JOIN ville v
ON u.city=v.id;";
getall($queryuser,"users");

$queryville = "SELECT * FROM ville;";
getall($queryville,"ville");
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
                <button type="button" class="btn btn-primary my-2" data-bs-toggle="modal" data-bs-target="#exampleModalCenter1"> ADD New User </button>

                <table id="example" class="table table-striped  " style="width:100%">
                    <thead>
                        <tr class="table-dark">
                            <th>ID</th>
                            <th>User NAME</th>
                            <th>EMAIL</th>
                            <th>Password</th>
                            <th>BIRTHDAY</th>
                            <th>Ville</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (!empty($GLOBALS["users"])) {
                            for ($i = 0; $i < count($GLOBALS["users"]); $i++) {
                        ?>
                                <tr>
                                    <td><?= $GLOBALS["users"][$i]["ID"] ?></td>
                                    <td><?= $GLOBALS["users"][$i]["Name_user"] ?></td>
                                    <td><?= $GLOBALS["users"][$i]["email"] ?></td>
                                    <td><?= $GLOBALS["users"][$i]["Password_user"] ?></td>
                                    <td><?= $GLOBALS["users"][$i]["birthday"] ?></td>
                                    <td><?= $GLOBALS["users"][$i]["ville"] ?></td>

                                    <form id="deleteForm" action="../../backend/user_script.php" method="post">
                                        <input type="hidden" name="deleteId" value="<?= $GLOBALS["users"][$i]["ID"] ?>">
                                        <td>
                                            <input type="submit" onclick="confirm('are you sure you want to delete this user')" name="delete_user" value="delete" class="btn btn-danger mx-2">
                                        </td>
                                    </form>
                                    <td>
                                        <button type="button" class="btn btn-dark " onclick="updateUser(<?= $GLOBALS['users'][$i]['ID'] ?>)"> UPDATE
                                        </button>
                                    </td>

                                </tr>

                        <?php
                            }
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
                    <h5 class="modal-title" id="exampleModalCenterTitle">Update freelancer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="mb-3">
                    <input type="hidden" name="id_user" class="form-control" id="idFormUpdate">
                        <label for="recipient-name" class="col-form-label">Name User</label>
                        <input type="text" id="name_user" name="name_user" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">EMAIL</label>
                        <input type="text" id="email_user" name="email_user" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Password</label>
                        <input type="text" id="password_user" name="password_user" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">BIRTHDAY</label>
                        <input type="text" id="birthday_user" name="birthday_user" class="form-control">
                    </div>
                    <label for="recipient-name" class="col-form-label">City</label>

                    <select name="city_user" class="form-select" aria-label="Default select example">
                        <option selected disabled>Open this select menu</option>
                        <?php
                        for ($i = 0; $i < count($GLOBALS["citys"]); $i++) {
                        ?>
                            <option value="<?= $GLOBALS["citys"][$i]["id"] ?>">
                                <?= $GLOBALS["citys"][$i]["ville"] ?></option>
                        <?php
                        };
                        ?>
                    </select>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" name="newFreelancer" class="btn btn-primary">
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- add freelancer modal -->

    <form action="../../backend/user_script.php" method="POST">

        <div class="modal fade modal-lg" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">NEW User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Name User</label>
                            <input type="text" name="name_user" class="form-control" >
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">EMAIL</label>
                            <input type="text" name="email_user" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Password</label>
                            <input type="text" name="password_user" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">BIRTHDAY</label>
                            <input type="text" name="birthday_user" class="form-control" >
                        </div>
                        <label for="recipient-name" class="col-form-label">City</label>

                        <select name="city_user" class="form-select" aria-label="Default select example">
                            <option selected disabled>Open this select menu</option>
                            <?php
                            for ($i = 0; $i < count($GLOBALS["citys"]); $i++) {
                            ?>
                                <option value="<?= $GLOBALS["citys"][$i]["id"] ?>">
                                    <?= $GLOBALS["citys"][$i]["ville"] ?></option>
                            <?php
                            };
                            ?>
                        </select>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-success" name="add_user" value="ADD">
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script src="js/user_script.js"></script>
</body>

</html>