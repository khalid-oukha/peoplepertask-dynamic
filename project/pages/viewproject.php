<?php
session_start();

require "../../connection_database/database.php";


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


// Send offer
if (isset($_POST['sendoffer'])) {
    $id_freelancer = $_SESSION['id_freelance'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $deadline = $_POST['deadline'];
    $sendoffer = "INSERT INTO `offres`(`Price`,`DeadLine`,`ID_Freelance`,`ID_Project`,`description`) 
    VALUES ('$price','$deadline',$id_freelancer,$id_project,'$description')";
    mysqli_query($con, $sendoffer);
}
//add a tags for project
if (isset($_POST['addtags'])) {
    $tag = $_POST['tags'];
    $addtag = "INSERT INTO project_tags (`tags_id`, `project_id`) 
    VALUES ('$tag','$id_project');";
    $result = mysqli_query($con, $addtag);
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>projects</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/project/pages/css/recherch.css">
    <link rel="stylesheet" href="/project/pages/css/style.css">
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

                            <div class="pt-2">
                                <h4 class="card-title mb-4" id="tags">project tags</h4>
                                <div class="d-flex gap-2 flex-wrap">
                                    <?php
                                    $projectTags = "SELECT t.NAME FROM project_tags pt
                                     INNER JOIN tags t 
                                    ON t.id = pt.tags_id
                                    INNER JOIN projets p
                                     ON p.ID = pt.project_id
                                     WHERE p.ID = $id_project";
                                    $result = mysqli_query($con, $projectTags);
                                    while ($fetchtags = mysqli_fetch_assoc($result)) {
                                    ?>
                                        <span class="p-2 py-2" style="background-color:bisque"><?= $fetchtags["NAME"] ?></span>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <?php
                            if($_SESSION['role'] == 'user'){
                            ?>
                                <div class="m-4">

                                    <form method="POST">
                                        <select name="tags" class="form-select" aria-label="Default select example">
                                            <option selected disabled>Open this select menu</option>
                                            <?php
                                            $fetchtags = "SELECT * from tags";
                                            $result = mysqli_query($con, $fetchtags);
                                            while ($tagslist = mysqli_fetch_assoc($result)) {
                                            ?>
                                                <option value="<?= $tagslist['id'] ?>"><?= $tagslist['NAME'] ?></option>

                                            <?php
                                            }
                                            ?>
                                        </select>

                                </div>
                                <div class="my-2">
                                    <button name="addtags" class="btn btn-outline-dark">Add tag</button>
                                    </form>
                                </div>
                            </div>
                            <?php
                            }
                            ?>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <h3 class="box-title mt-3">General Info</h3>
                                <div class="table-responsive">
                                    <table class="table table-striped table-product">
                                        <tbody>
                                            <tr>
                                                <td width="390">project create Date</td>
                                                <td><?= $row['created_at'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Status</td>
                                                <td><?= $row['status'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>categorie</td>
                                                <td><?= $row['Name_categories'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>project owner</td>
                                                <td><?= $row['Name_user'] ?></td>
                                            </tr>
                                            <tr>
                                                <?php
                                                $id_project = $_GET['viewid'];
                                                $fetchoffers = "SELECT COUNT(*) AS numOffer FROM offres o
                                             WHERE o.ID_Project=0";
                                                $res = mysqli_query($con, $fetchoffers);

                                                ?>
                                                <td>Number of Offer Submissions </td>
                                                <td><?= mysqli_fetch_assoc($res)['numOffer']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Project Deadline</td>
                                                <td><?= $row['deadline'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Client Budget</td>
                                                <td><?= $row['budget'] ?>$</td>
                                            </tr>
                                            <tr>
                                                <td>Upholstery Type</td>
                                                <td>Cushion</td>
                                            </tr>
                                            <tr>
                                                <td>Head Support</td>
                                                <td>No</td>
                                            </tr>
                                            <tr>
                                                <td>Suitable For</td>
                                                <td>Study&amp;Home Office</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
                                <div style="margin: 10px;">
                                    <?php
                                    if (isset($_SESSION['id_freelance'])) {
                                        $id_freelancer = $_SESSION['id_freelance'];
                                        $countoffers = "SELECT count(*) from offres o WHERE o.ID_Project = $id_project AND o.ID_Freelance = $id_freelancer;";
                                        $res = mysqli_query($con, $countoffers);
                                        $count = mysqli_fetch_array($res)[0];
                                    }

                                    if ($_SESSION['role'] == 'freelancer' && $count == 0) {

                                    ?>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            Send Offer
                                        </button>

                                        <!-- Modal -->
                                        <form method="post">
                                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Send Your Offer</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- Textarea -->
                                                            <div class="mb-3">
                                                                <label for="textarea-input" class="form-label">I will do </label>
                                                                <textarea name="description" class="form-control" id="textarea-input" rows="5"></textarea>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="recipient-name" class="col-form-label">i will deliver the project in </label>
                                                                <input name="deadline" type="date" class="form-control">
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="message-text" class="col-form-label">It will coast you </label>
                                                                <input name="price" type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" name="sendoffer" class="btn btn-primary">Send Offer</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
            }
                ?>
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