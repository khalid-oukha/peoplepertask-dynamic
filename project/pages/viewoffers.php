<?php
session_start();

require "../../connection_database/database.php";
function checkoffers($id_project){
        $acceptedoffers = "select * from offres where ID_Project = $id_project and is_accepted = 'Y'";
        global $con;
        $res = mysqli_query($con, $acceptedoffers);
        $numRows = mysqli_num_rows($res);
        if($numRows>0){
            return false;
        }else{
            return true ; 
        }
}

// fetch project infos with user infos
if (isset($_GET['viewid'])) {
    $id_project = $_GET['viewid'];
    $fetchproject = "SELECT distinct p.ID,p.Title,p.Description_project,c.Name_categories,p.created_at,p.status,u.Name_user,p.deadline,p.budget
    FROM projets p
    inner JOIN users u
    ON p.ID_User= u.ID
    INNER JOIN categories c
    ON c.ID=p.ID_Categorie
    WHERE p.ID=$id_project;";
    $res = mysqli_query($con, $fetchproject);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>projects</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/project/pages/css/style.css">
    <link rel="stylesheet" href="/project/pages/css/style.css">
    <link rel="stylesheet" href="/project/pages/css/recherch.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.2.96/css/materialdesignicons.min.css" integrity="sha512-LX0YV/MWBEn2dwXCYgQHrpa9HJkwB+S+bnBpifSOTO1No27TqNMKYoAn6ff2FBh03THAzAiiCwQ+aPX+/Qt/Ow==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- link for icons -->
    <script src="https://kit.fontawesome.com/6cd9388e68.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    require "navbar.php";
    ?>


    <div class="container my-4">
        <div class="card">
            <?php

            while ($row = mysqli_fetch_assoc($res)) {

            ?>
                <div class="card-body">

                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-sm-6">
                            <div class="white-box text-center mt-3"><img src="../pages/images/html.jpg" class="img-responsive" style="width: 500px;"></div>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-6">
                            <h4 class="box-title mt-3"><?= $row['Title'] ?></h4>
                            <p><?= $row['Description_project'] ?></p>
                            <h2 class="mt-3">
                                <?= $row['budget'] ?>$
                            </h2>
                            <h3 class="box-title mt-3">Key Highlights</h3>
                            <ul class="list-unstyled">
                                <li><i class="fa fa-check text-success"></i>Sturdy structure</li>
                                <li><i class="fa fa-check text-success"></i>Designed to foster easy portability</li>
                                <li><i class="fa fa-check text-success"></i>Perfect furniture to flaunt your wonderful collectibles</li>
                            </ul>
                        </div>
                    </div>

                </div>
            <?php
            }
            ?>
        </div>
    </div>
    <div class="py-8">
        <div class="container">
            <div class="row">
                <?php
                $query = "SELECT  o.ID_Offre,o.Price,o.DeadLine,o.ID_Freelance,o.description , f.Name_freelance,f.job
                FROM offres o 
                inner JOIN freelances f
                on o.ID_Freelance = f.ID
                INNER JOIN projets p
                ON p.ID = o.ID_Project
                WHERE p.ID=$id_project;";
                $res = mysqli_query($con, $query);
                while ($row = mysqli_fetch_assoc($res)) {
                ?>
                    <div class="col-lg-12 col-md-6 col-12">
                        <!-- Card -->
                        <div class="card  mb-4">
                            <!-- Card Body -->
                            <div class="card-body">
                                <div class="d-lg-flex">
                                    <div class="position-relative">
                                        <img src="../pages/images/othmanphoto.svg" alt="" style="width: 50px;" class="rounded-circle  avatar-xl mb-3 mb-lg-0 ">
                                    </div>
                                    <div class="ms-lg-4">
                                        <h4 class="mb-0"><?= $row['Name_freelance'] ?></h4>
                                        <p class="mb-0 fs-6"><?= $row['job'] ?></p>
                                        <p class="mb-0 fs-6">I will deliver :<?= $row['DeadLine'] ?></p>
                                        <p class="fs-6 mb-1 text-warning"></span>It will coast you : <?= $row['Price'] ?><span class="mdi  text-warning  me-2"></span>$<span></p>
                                        </p>
                                        <p>
                                            <?= $row['description'] ?>
                                        </p>
                                        <a href="profile.php?offerid=<?php echo htmlentities ($row['ID_Offre']);?>" class="btn btn-primary btn-block des-project" style="position: absolute; bottom: 5px; right: 5px;">accept offer</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>

            </div>

        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script src="javascript/recherch.js"></script>


    <script src='https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js'></script>
</body>

</html>