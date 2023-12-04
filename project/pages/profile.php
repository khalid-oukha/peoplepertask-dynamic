<?php 

require "../../project/pages/handlers/profile_script.php";
require "../../project/pages/handlers/login_sys.php";


if($_SESSION['role'] != 'freelancer'){
    header('Location: /PeoplePerTask/project/pages/index.php');
}

$id_user=$_SESSION['id'];
$query = "SELECT u.email,u.user_role,u.created_at,u.phone,f.Name_freelance,f.ID,f.job,f.description FROM users u 
INNER JOIN freelances f 
ON u.ID=f.ID_user
WHERE u.ID = $id_user;";
global $con;
$res=mysqli_query($con,$query);

// Check if the query was successful and data was fetched
if ($res && mysqli_num_rows($res) > 0) {
    // Fetching data into variables
    while ($row = mysqli_fetch_assoc($res)) {
        $created_at = $row['created_at'];
        $freelanceName = $row['Name_freelance'];
        $freelancejob = $row['job'];
        $fr_description = $row['description'];
        $phone = $row['phone'];
        
        $_SESSION['id_freelance']= $row['ID'];
    }
} else {
    echo "No data found for the user.";
}
//get all skills for a freelancer
$id_freelancer=$_SESSION['id_freelance'];
$query = "SELECT s.skill_name FROM freelancer_skills fr INNER JOIN
freelances f
ON fr.freelancer_id=f.ID
INNER JOIN skills s
ON s.skill_id=fr.skill_id
WHERE f.ID=$id_freelancer;";
global $con;
$res = mysqli_query($con,$query);
while($row = mysqli_fetch_assoc($res)){
    $GLOBALS['skills'][]=$row;
}
//add a skill for freelancer
if(isset($_POST['addskill'])){
    $id_freelancer=$_SESSION['id_freelance'];
    $id_skill = $_POST['freelancer_skill'];
    $addskill = "INSERT INTO freelancer_skills(`freelancer_id`, `skill_id`) 
    VALUES ('$id_freelancer','$id_skill');";
    $res=mysqli_query($con,$addskill);
    header("Location: profile.php");

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
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.2.96/css/materialdesignicons.min.css"
        integrity="sha512-LX0YV/MWBEn2dwXCYgQHrpa9HJkwB+S+bnBpifSOTO1No27TqNMKYoAn6ff2FBh03THAzAiiCwQ+aPX+/Qt/Ow=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- animation links -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- link for icons -->
    <script src="https://kit.fontawesome.com/6cd9388e68.js" crossorigin="anonymous"></script>
    <!-- animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
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
                            <div class="col-md-3">
                                <div class="text-center border-end">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png"
                                        class="img-fluid avatar-xxl rounded-circle" alt="">
                                    <h4 class="text-primary font-size-20 mt-3 mb-2"><?=$_SESSION['username']?></h4>
                                    <h5 class="text-muted font-size-13 mb-0"><?=$freelancejob?></h5>
                                    <p class="text-muted fw-medium mb-0"><i class="me-2"></i><?= $created_at?>
                                    </p>
                                </div>
                            </div><!-- end col -->
                            <div class="col-md-9">
                                <div class="ms-3">
                                    <div>
                                        <h4 class="card-title mb-2"><?= $_SESSION['id_freelance']?></h4>
                                        <p class="mb-0 text-muted"><?= $fr_description?></p>
                                    </div>
                                    <div class="row my-4">
                                        <div class="col-md-12">
                                            <div>
                                                <p class="text-muted mb-2 fw-medium"><i
                                                        class="mdi mdi-email-outline me-2"></i><?=$_SESSION['email']?>
                                                </p>
                                                <p class="text-muted fw-medium mb-0"><i
                                                        class="mdi mdi-phone-in-talk-outline me-2"></i>+212 <?= $phone?>
                                                </p>
                                            </div>
                                        </div><!-- end col -->
                                    </div><!-- end row -->

                                    <ul class="nav nav-tabs nav-tabs-custom border-bottom-0 mt-3 nav-justfied"
                                        role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link px-4 active" data-bs-toggle="tab" href="#projects-tab"
                                                role="tab" aria-selected="false" tabindex="-1">
                                                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                                <span class="d-none d-sm-block">Projects</span>
                                            </a>
                                        </li><!-- end li -->
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link px-4"
                                                href="https://bootdey.com/snippets/view/profile-task-with-team-cards"
                                                target="__blank">
                                                <span class="d-block d-sm-none"><i class="mdi mdi-menu-open"></i></span>
                                                <span class="d-none d-sm-block">Tasks</span>
                                            </a>
                                        </li><!-- end li -->
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link px-4 "
                                                href="https://bootdey.com/snippets/view/profile-with-team-section"
                                                target="__blank">
                                                <span class="d-block d-sm-none"><i
                                                        class="mdi mdi-account-group-outline"></i></span>
                                                <span class="d-none d-sm-block">Team</span>
                                            </a>
                                        </li><!-- end li -->
                                    </ul><!-- end ul -->
                                </div>
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end card body -->
                </div><!-- end card -->

                <div class="card">
                    <div class="tab-content p-4">
                        <div class="tab-pane active show" id="projects-tab" role="tabpanel">
                            <div class="d-flex align-items-center">
                                <div class="flex-1">
                                    <h4 class="card-title mb-4">Projects</h4>
                                </div>
                            </div>

                            <div class="row" id="all-projects">
                                <?php
                                 $id_freelancer=$_SESSION['id_freelance'];
                                $fetchproject = "SELECT p.Title,p.Description_project,p.created_at,u.Name_user AS project_owner 
                                FROM offres o 
                                INNER JOIN projets p 
                                ON p.ID = o.ID_Project
                                INNER JOIN users u
                                ON p.ID_User=u.ID
                                WHERE o.ID_Freelance=$id_freelancer AND o.is_accepted='Y'";
                                $res = mysqli_query($con,$fetchproject);
                                while($row = mysqli_fetch_assoc($res)){

                                ?>
                                <div class="col-md-6" id="project-items-1">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex mb-3">
                                                <div class="flex-grow-1 align-items-start">
                                                    <div>
                                                        <h6 class="mb-0 text-muted">
                                                            <i
                                                                class="mdi mdi-circle-medium text-danger fs-3 align-middle"></i>



                                                            <span class="team-date"><?= $row['created_at']?></span>

                                                        </h6>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-4">
                                                <h5 class="mb-1 font-size-17 team-title"><?= $row['Title']?></h5>
                                                <p class="text-muted mb-0 team-description">
                                                    <?= $row['Description_project']?></p>

                                            </div>
                                            <div class="d-flex">
                                                <div class="avatar-group float-start flex-grow-1 task-assigne">

                                                    <div class="avatar-group-item">
                                                        <a href="javascript: void(0);" class="d-inline-block"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            value="member-1" aria-label="Ruhi Shah"
                                                            data-bs-original-title="Ruhi Shah">
                                                            <img src="https://bootdey.com/img/Content/avatar/avatar1.png"
                                                                alt="" class="rounded-circle avatar-sm">
                                                        </a>
                                                    </div>
                                                    <span class="mx-2 project_owner"><?= $row['project_owner']?></span>
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
                            <p><?= $fr_description?></p>
                            <ul class="ps-3 mb-0">
                                <li>it will seem like simplified.</li>
                                <li>To achieve this, it would be necessary to have uniform pronunciation</li>
                            </ul>
                            <!-- end ul -->
                        </div>
                        <hr>
                        <div class="pt-2">
                            <h4 class="card-title mb-4">My Skill</h4>
                            <div class="d-flex gap-2 flex-wrap">
                                <?php
                                   for ($i = 0; $i < count($GLOBALS["skills"]); $i++) {
                                ?>
                                <span
                                    class="badge badge-soft-secondary p-2 py-2"><?=$GLOBALS["skills"][$i]['skill_name']?>
                                    <i class="fa-solid fa-minus p-2"></i></span>
                                <?php
                                }
                                
                                ?>

                            </div>
                            <div class="m-4">
                                <?php
                                $id= $_SESSION['id_freelance'];
                                $fetchskills="SELECT s.skill_name,s.skill_id FROM skills s 
                                WHERE s.skill_name NOT IN (SELECT  s.skill_name FROM freelancer_skills fr INNER JOIN
                                freelances f
                                ON fr.freelancer_id=f.ID
                                INNER JOIN skills s
                                ON s.skill_id=fr.skill_id
                                WHERE f.ID=$id);";
                                $res = mysqli_query($con,$fetchskills);    
                                 
                                ?>
                                <form action="profile.php" method="POST">
                                    <select name="freelancer_skill" class="form-select"
                                        aria-label="Default select example">
                                        <option selected disabled>Open this select menu</option>
                                        <?php
                                    while($row = mysqli_fetch_assoc($res)){
                                    ?>
                                        <option value="<?=$row['skill_id']?>"> <?=$row['skill_name']?></option>
                                        <?php
                                    }
                                        ?>
                                    </select>
                            </div>
                            <div class="my-2">
                                <button type="submit" name="addskill" class="btn btn-outline-dark">Add skill</button>
                                <button type="button" class="btn btn-outline-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div><!-- end cardbody -->
                </div><!-- end card -->

                <div class="card">
                    <div class="card-body">
                        <div>
                            <h4 class="card-title mb-4">Personal Details</h4>
                            <div class="table-responsive">
                                <table class="table table-bordered mb-0">
                                    <tbody>
                                        <tr>
                                            <th scope="row">Name</th>
                                            <td>Jansh Wells</td>
                                        </tr><!-- end tr -->
                                        <tr>
                                            <th scope="row">Location</th>
                                            <td>California, United States</td>
                                        </tr><!-- end tr -->
                                        <tr>
                                            <th scope="row">Language</th>
                                            <td>English</td>
                                        </tr><!-- end tr -->
                                        <tr>
                                            <th scope="row">Website</th>
                                            <td>abc12@probic.com</td>
                                        </tr><!-- end tr -->
                                    </tbody><!-- end tbody -->
                                </table><!-- end table -->
                            </div>
                        </div>
                    </div><!-- end card body -->
                </div><!-- end card -->

                <div class="card">
                    <div class="card-body">
                        <div>
                            <h4 class="card-title mb-4">Work Experince</h4>
                            <ul class="list-unstyled work-activity mb-0">
                                <li class="work-item" data-date="2020-21">
                                    <h6 class="lh-base mb-0">ABCD Company</h6>
                                    <p class="font-size-13 mb-2">Web Designer</p>
                                    <p>To achieve this, it would be necessary to have uniform grammar, and more
                                        common words.</p>
                                </li>
                                <li class="work-item" data-date="2019-20">
                                    <h6 class="lh-base mb-0">XYZ Company</h6>
                                    <p class="font-size-13 mb-2">Graphic Designer</p>
                                    <p class="mb-0">It will be as simple as occidental in fact, it will be
                                        Occidental person, it will seem like simplified.</p>
                                </li>
                            </ul><!-- end ul -->
                        </div>
                    </div><!-- end card-body -->
                </div><!-- end card -->
            </div><!-- end col -->
        </div>
    </div>
</body>

</html>