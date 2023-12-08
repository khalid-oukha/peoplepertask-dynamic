<?php
session_start();

if ($_SESSION['role'] != 'admin') {
    header('location: ../../index.php');
}

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
                                            <input type="submit" onclick="return confirm('are you sure you want to delete this testimonial : ')" name="delete_testimonial" value="delete" class="btn btn-danger mx-2">
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