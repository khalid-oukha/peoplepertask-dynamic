<?php
session_start();
require "../../project/pages/handlers/profile_script.php";
if ($_SESSION['role'] == 'user') {
    //add project 
    function add_project()
    {
        $name_project = $_POST['Title'];
        $description = $_POST['Description_project'];
        $id_user = $_SESSION['id'];
        $id_category = $_POST['ID_Categorie'];
        $budget = $_POST['budget'];
        $deadline = $_POST['deadline'];
        $addquery = "INSERT INTO Projets (Title, Description_project, ID_User, ID_Categorie,deadline,budget)
            VALUES 
            ('$name_project', '$description',$id_user,$id_category,'$deadline',$budget);";
        global $con;
        $result = mysqli_query($con, $addquery);
        // header("Location: profile.php");
    }
    if (isset($_POST['addproject'])) {
        add_project();
    }

    if(isset($_GET['offerid'])){
        $id_offer = $_GET['offerid'];
        $query = "UPDATE `offres` SET `is_accepted`='Y' WHERE ID_Offre=$id_offer;";
        $res = mysqli_query($con,$query);
    }
    
}

//check if the user already accept offer
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

if(isset($_GET['skillid'])){
    $skill_id=$_GET['skillid'];
    $deleteskill = "delete from freelancer_skills where ID = $skill_id";
    global $con;
    mysqli_query($con, $deleteskill);
    header('location: profile.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/project/pages/css/profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.2.96/css/materialdesignicons.min.css" integrity="sha512-LX0YV/MWBEn2dwXCYgQHrpa9HJkwB+S+bnBpifSOTO1No27TqNMKYoAn6ff2FBh03THAzAiiCwQ+aPX+/Qt/Ow==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- animation links -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- link for icons -->
    <script src="https://kit.fontawesome.com/6cd9388e68.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    require "navbar.php";
    ?>

    <div class="container">
        <div class="row mt-4">
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body pb-0">
                        <div class="row align-items-center">
                            <a href=""></a>
                            <div class="text-right mt-3 d-flex justify-content-end">
                                <a href="editprofile.php" class="btn btn-primary">Edit Profile</a>&nbsp;
                            </div>
                            <div class="col-md-3">
                                <div class="text-center border-end">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="img-fluid avatar-xxl rounded-circle" alt="">
                                    <?php
                                    if ($_SESSION['role'] == 'freelancer') {
                                    ?>
                                        <h4 class="text-primary font-size-20 mt-3 mb-2"><?= $freelanceName ?></h4>
                                        <h5 class="text-muted font-size-13 mb-0"><?= $freelancejob ?></h5>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    if ($_SESSION['role'] == 'user') {
                                    ?>
                                        <h4 class="text-primary font-size-20 mt-3 mb-2"><?= $username ?></h4>
                                    <?php
                                    }
                                    ?>

                                    <p class="text-muted fw-medium mb-0"><i class="me-2"></i><?= $created_at ?>
                                    </p>
                                </div>
                            </div><!-- end col -->
                            <div class="col-md-9">
                                <div class="ms-3">
                                    <?php
                                    if ($_SESSION['role'] == 'freelancer') {
                                    ?>
                                        <div>
                                            <h4 class="card-title mb-2"><?= $username ?></h4>
                                            <p class="mb-0 text-muted"><?= $fr_description ?></p>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    <div class="row my-4">
                                        <div class="col-md-12">
                                            <div>
                                                <p class="text-muted mb-2 fw-medium"><i class="mdi mdi-email-outline me-2"></i><?= $_SESSION['email'] ?>
                                                </p>
                                                <p class="text-muted fw-medium mb-0"><i class="mdi mdi-phone-in-talk-outline me-2"></i>+212 <?= $phone ?>
                                                </p>
                                            </div>
                                        </div><!-- end col -->
                                    </div><!-- end row -->
                                </div>
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end card body -->
                </div><!-- end card -->
                <?php
                if ($_SESSION['role'] == 'freelancer') {
                ?>
                    <div class="card">
                        <div class="tab-content p-4">
                            <div class="tab-pane active show" id="projects-tab" role="tabpanel">
                                <div class="d-flex align-items-center">
                                    <div class="flex-1">
                                        <h4 class="card-title mb-4">assigned Projects</h4>
                                    </div>
                                </div>

                                <div class="row" id="all-projects">
                                    <?php
                                    $id_freelancer = $_SESSION['id_freelance'];
                                    $fetchproject = "SELECT p.Title,p.Description_project,p.created_at,u.Name_user AS project_owner 
                                FROM offres o 
                                INNER JOIN projets p 
                                ON p.ID = o.ID_Project
                                INNER JOIN users u
                                ON p.ID_User=u.ID
                                WHERE o.ID_Freelance=$id_freelancer AND o.is_accepted='Y'";
                                    $res = mysqli_query($con, $fetchproject);
                                    while ($row = mysqli_fetch_assoc($res)) {

                                    ?>
                                        <div class="col-md-6" id="project-items-1">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="d-flex mb-3">
                                                        <div class="flex-grow-1 align-items-start">
                                                            <div>
                                                                <h6 class="mb-0 text-muted">
                                                                    <i class="mdi mdi-circle-medium text-danger fs-3 align-middle"></i>
                                                                    <span class="team-date"><?= $row['created_at'] ?></span>

                                                                </h6>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="mb-4">
                                                        <h5 class="mb-1 font-size-17 team-title"><?= $row['Title'] ?></h5>
                                                        <p class="text-muted mb-0 team-description">
                                                            <?= $row['Description_project'] ?></p>

                                                    </div>
                                                    <div class="d-flex">
                                                        <div class="avatar-group float-start flex-grow-1 task-assigne">

                                                            <div class="avatar-group-item">
                                                                <a href="javascript: void(0);" class="d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" value="member-1" aria-label="Ruhi Shah" data-bs-original-title="Ruhi Shah">
                                                                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" class="rounded-circle avatar-sm">
                                                                </a>
                                                            </div>
                                                            <span class="mx-2 project_owner"><?= $row['project_owner'] ?></span>
                                                        </div><!-- end avatar group -->

                                                        <div class="align-self-end">
                                                            <span class="badge badge-soft-danger p-2 team-status">Pending</span>
                                                        </div>

                                                    </div>
                                                </div><!-- end cardbody -->
                                            </div><!-- end card -->
                                        </div>

                                    <?php
                                    }
                                    ?>
                                </div><!-- end row -->
                            </div><!-- end tab pane -->
                        </div>
                    </div><!-- end card -->
            </div><!-- end col -->

            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <div class="pb-2">
                            <h4 class="card-title mb-3">About</h4>
                            <p><?= $fr_description ?></p>
                            <ul class="ps-3 mb-0">
                                <li>it will seem like simplified.</li>
                                <li>To achieve this, it would be necessary to have uniform pronunciation</li>
                            </ul>
                            <!-- end ul -->
                        </div>
                        <hr>
                        <div class="pt-2">
                            <h4 class="card-title mb-4" id="skills">My Skill</h4>
                            <div class="d-flex gap-2 flex-wrap">
                                <?php
                                for ($i = 0; $i < count($GLOBALS["skills"]); $i++) {
                                ?>
                                    <span class="badge badge-soft-secondary p-2 py-2"><?= $GLOBALS["skills"][$i]['skill_name'] ?>                                       
                                        <a href="profile.php?skillid=<?php echo htmlentities ($GLOBALS["skills"][$i]['ID']);?>" style="margin-left:10px; color:red;"><i class="fa-solid fa-minus p-2"></i></a>
                                    </span>
                                <?php
                                }

                                ?>

                            </div>
                            <div class="m-4">
                                <?php
                                $id = $_SESSION['id_freelance'];
                                $fetchskills = "SELECT s.skill_name,s.skill_id FROM skills s 
                                WHERE s.skill_name NOT IN (SELECT  s.skill_name FROM freelancer_skills fr INNER JOIN
                                freelances f
                                ON fr.freelancer_id=f.ID
                                INNER JOIN skills s
                                ON s.skill_id=fr.skill_id
                                WHERE f.ID=$id);";
                                $res = mysqli_query($con, $fetchskills);

                                ?>
                                <form action="profile.php" method="POST">
                                    <select name="freelancer_skill" class="form-select" aria-label="Default select example">
                                        <option selected disabled>Open this select menu</option>
                                        <?php
                                        while ($row = mysqli_fetch_assoc($res)) {
                                        ?>
                                            <option value="<?= $row['skill_id'] ?>"> <?= $row['skill_name'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                            </div>
                            <div class="my-2">
                                <button type="submit" name="addskill" class="btn btn-outline-dark">Add skill</button>
                                </form>
                            </div>
                        </div>
                    </div><!-- end cardbody -->
                </div><!-- end card -->
            <?php
                }
            ?>
            <div class="card">
                <div class="card-body">
                    <div>
                        <h4 class="card-title mb-4">Personal Details</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0">
                                <tbody>
                                    <tr>
                                        <th scope="row">Name</th>
                                        <td><?= $username ?></td>
                                    </tr><!-- end tr -->
                                    <tr>
                                        <th scope="row">Location</th>
                                        <td><?= $ville ?></td>
                                    </tr><!-- end tr -->
                                    <tr>
                                        <th scope="row">Birthday Date</th>
                                        <td><?= $birthday ?></td>
                                    </tr><!-- end tr -->
                                    <tr>
                                        <th scope="row">Email</th>
                                        <td><?= $_SESSION['email'] ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">member since</th>
                                        <td><?= $created_at ?></td>
                                    </tr>
                                </tbody><!-- end tbody -->
                            </table><!-- end table -->
                        </div>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
            <?php
            if ($_SESSION['role'] == 'user') {
            ?>           
                <div class="card">
                    <div class="text-right mt-3 mx-2 d-flex justify-content-end">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Add Project
                        </button>
                        <!-- <a href="editprofile.php" class="btn btn-primary">add project</a>&nbsp; -->
                    </div>
                    <div class="tab-content p-4">
                        <div class="tab-pane active show" id="projects-tab" role="tabpanel">
                            <div class="d-flex align-items-center">
                                <div class="flex-1">
                                    <h4 class="card-title mb-4">Projects</h4>
                                </div>
                            </div>
                            <div class="row" id="all-projects">
                                <?php
                                $id_user = $_SESSION['id'];
                                $fetchproject = "SELECT distinct p.ID,p.Title,p.Description_project,c.Name_categories,p.created_at,p.status,u.Name_user
                                FROM projets p
                                inner JOIN users u
                                ON p.ID_User= u.ID
                                INNER JOIN categories c
                                ON c.ID=p.ID_Categorie
                                WHERE p.ID_User=$id_user;";
                                $res = mysqli_query($con, $fetchproject);
                                while ($row = mysqli_fetch_assoc($res)) {
                                ?>
                                    <div class="col-md-6" id="project-items-1">
                                        <div class="card">
                                            <div class="card-body">
                                                
                                            <div class="mx-2 d-flex justify-content-end">
                                            <a href="editproject.php?projectid=<?php echo htmlentities ($row['ID']);?>" class="btn btn-outline-warning btn-sm " style="margin-left:10px;">Edit</a>
                                            <a href="viewproject.php?viewid=<?php echo htmlentities ($row['ID']);?>" class="btn btn-outline-info btn-sm " style="margin-left:10px;">view more</a>
                                                    <?php
                                                    if(checkoffers($row['ID'])):
                                                    ?>
                                                <a href="viewoffers.php?viewid=<?php echo htmlentities ($row['ID']);?>" class="btn btn-outline-success btn-sm " style="margin-left:10px;">view Offers</a>
                                                        <?php
                                                        endif;
                                                        ?>
                                            </div>
                                                <div class="d-flex mb-3">
                                                    <div class="flex-grow-1 align-items-start">
                                                        <div>
                                                            <h6 class="mb-0 text-muted">
                                                                <i class="mdi mdi-circle-medium text-danger fs-3 align-middle"></i>
                                                                <span class="team-date"><?= $row['created_at'] ?></span>

                                                            </h6>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mb-4">
                                                    <h5 class="mb-1 font-size-17 team-title"><?= $row['Title'] ?></h5>
                                                    <p class="text-muted mb-0 team-description"><?= $row['Description_project'] ?></p>
                                                </div>
                                                <div class="d-flex">
                                                    <div class="avatar-group float-start flex-grow-1 task-assigne">

                                                        <div class="avatar-group-item">
                                                            <a href="javascript: void(0);" class="d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" value="member-1" aria-label="Ruhi Shah" data-bs-original-title="Ruhi Shah">
                                                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" class="rounded-circle avatar-sm">
                                                            </a>
                                                        </div>
                                                        <span class="mx-2 project_owner"><?= $row['Name_user'] ?></span>
                                                    </div><!-- end avatar group -->
                                                    <div class="align-self-end">
                                                        <span class="badge badge-soft-danger p-2 team-status"><?= $row['status'] ?></span>
                                                    </div>
                                                </div>
                                            </div><!-- end cardbody -->
                                        </div><!-- end card -->
                                    </div>

                                <?php
                                }
                                ?>
                            </div><!-- end row -->
                        </div><!-- end tab pane -->
                    </div>
                </div><!-- end card -->

                
                <!-- add project modal -->
                <form action="profile.php" method="POST">
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Project</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">Project Name</label>
                                        <input type="text" name="Title" class="form-control" id="recipient-name">
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">Deadline</label>
                                        <input type="date" name="deadline" class="form-control" id="recipient-name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">Budget</label>
                                        <input type="text" name="budget" class="form-control" id="recipient-name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">Desciption</label>
                                        <textarea name="Description_project" id="" cols="30" rows="10"></textarea>
                                        <!-- <input type="text" name="Description_project" class="form-control" id="recipient-name"> -->
                                    </div>
                                    <label for="recipient-name" class="col-form-label">category</label>

                                    <select name="ID_Categorie" class="form-select" aria-label="Default select example">
                                        <option selected disabled>Open this select menu</option>
                                        <?php
                                        $query = "select c.ID,c.Name_categories from Categories c
                                                  WHERE c.ID_Categorie IS  null;";

                                        global $con;
                                        $res = mysqli_query($con, $query);

                                        while ($category = mysqli_fetch_assoc($res)) {
                                            $GLOBALS['categorys'][] = $category;
                                        }
                                        for ($i = 0; $i < count($GLOBALS["categorys"]); $i++) {
                                        ?>
                                            <option value="<?= $GLOBALS["categorys"][$i]["ID"] ?>"><?= $GLOBALS["categorys"][$i]["Name_categories"] ?></option>

                                        <?php
                                        };
                                        ?>
                                    </select>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button name="addproject" type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            <?php
            }
            ?>

            </div><!-- end col -->
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <!-- Place the first <script> tag in your HTML's <head> -->
<script src="https://cdn.tiny.cloud/1/tae69tv15q8646ee9ytsznj2x6mphimtyeq9b9nhu5iyo6jg/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

<!-- Place the following <script> and <textarea> tags your HTML's <body> -->
<script>
  tinymce.init({
    selector: 'textarea',
    plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
    tinycomments_mode: 'embedded',
    tinycomments_author: 'Author name',
    mergetags_list: [
      { value: 'First.Name', title: 'First Name' },
      { value: 'Email', title: 'Email' },
    ],
    ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
  });
</script>
</body>

</html>