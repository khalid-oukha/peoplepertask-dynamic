<?php
session_start();

require "../../connection_database/database.php";
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
        <div class="row">
            <div class="col-lg-3">
                <div class="sidebar">

                    <div class="widget border-0">
                        <div class="locations">
                            <input class="form-control" id="searchinput" type="text" placeholder="All Locations">
                        </div>
                    </div>
                    <div class="widget">
                        <div class="widget-title widget-collapse">
                            <h6>Date Posted</h6>
                            <a class="ml-auto" data-toggle="collapse" href="#dateposted" role="button" aria-expanded="false" aria-controls="dateposted"> <i class="fas fa-chevron-down"></i> </a>
                        </div>
                        <div class="collapse show" id="dateposted">
                            <div class="widget-content">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="dateposted1">
                                    <label class="custom-control-label" for="dateposted1">Last hour</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="dateposted2">
                                    <label class="custom-control-label" for="dateposted2">Last 24 hour</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="dateposted3">
                                    <label class="custom-control-label" for="dateposted3">Last 7 days</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="dateposted4">
                                    <label class="custom-control-label" for="dateposted4">Last 14 days</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="dateposted5">
                                    <label class="custom-control-label" for="dateposted5">Last 30 days</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="widget">
                        <div class="widget-title widget-collapse">
                            <h6>Specialism</h6>
                            <a class="ml-auto" data-toggle="collapse" href="#specialism" role="button" aria-expanded="false" aria-controls="specialism"> <i class="fas fa-chevron-down"></i> </a>
                        </div>
                        <div class="collapse show" id="specialism">
                            <div class="widget-content">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="specialism1">
                                    <label class="custom-control-label" for="specialism1">IT Contractor</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="specialism2">
                                    <label class="custom-control-label" for="specialism2">Clinical Psychology</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="specialism3">
                                    <label class="custom-control-label" for="specialism3">Digital &amp; Creative</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="specialism4">
                                    <label class="custom-control-label" for="specialism4">Estate Agency</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="specialism5">
                                    <label class="custom-control-label" for="specialism5">Graduate</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="widget">
                        <div class="widget-title widget-collapse">
                            <h6>Job Type</h6>
                            <a class="ml-auto" data-toggle="collapse" href="#jobtype" role="button" aria-expanded="false" aria-controls="jobtype"> <i class="fas fa-chevron-down"></i> </a>
                        </div>
                        <div class="collapse show" id="jobtype">
                            <div class="widget-content">
                                <div class="custom-control custom-checkbox fulltime-job">
                                    <input type="checkbox" class="custom-control-input" id="jobtype1">
                                    <label class="custom-control-label" for="jobtype1">Full Time</label>
                                </div>
                                <div class="custom-control custom-checkbox parttime-job">
                                    <input type="checkbox" class="custom-control-input" id="jobtype2">
                                    <label class="custom-control-label" for="jobtype2">Part-Time</label>
                                </div>
                                <div class="custom-control custom-checkbox freelance-job">
                                    <input type="checkbox" class="custom-control-input" id="jobtype3">
                                    <label class="custom-control-label" for="jobtype3">Freelance</label>
                                </div>
                                <div class="custom-control custom-checkbox temporary-job">
                                    <input type="checkbox" class="custom-control-input" id="jobtype4">
                                    <label class="custom-control-label" for="jobtype4">Temporary</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="widget">
                        <div class="widget-title widget-collapse">
                            <h6>Experience</h6>
                            <a class="ml-auto" data-toggle="collapse" href="#experience" role="button" aria-expanded="false" aria-controls="experience"> <i class="fas fa-chevron-down"></i> </a>
                        </div>
                        <div class="collapse show" id="experience">
                            <div class="widget-content">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="experience1">
                                    <label class="custom-control-label" for="experience1">fresher</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="experience2">
                                    <label class="custom-control-label" for="experience2">Less than 1 year</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="experience3">
                                    <label class="custom-control-label" for="experience3">2 Year</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="experience4">
                                    <label class="custom-control-label" for="experience4">3 Year</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="experience5">
                                    <label class="custom-control-label" for="experience5">4 Year</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="widget">
                        <div class="widget-title widget-collapse">
                            <h6>Offered Salary</h6>
                            <a class="ml-auto" data-toggle="collapse" href="#Offeredsalary" role="button" aria-expanded="false" aria-controls="Offeredsalary"> <i class="fas fa-chevron-down"></i> </a>
                        </div>
                        <div class="collapse show" id="Offeredsalary">
                            <div class="widget-content">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="Offeredsalary1">
                                    <label class="custom-control-label" for="Offeredsalary1">10k - 20k</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="Offeredsalary2">
                                    <label class="custom-control-label" for="Offeredsalary2">20k - 30k</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="Offeredsalary3">
                                    <label class="custom-control-label" for="Offeredsalary3">30k - 40k</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="Offeredsalary4">
                                    <label class="custom-control-label" for="Offeredsalary4">40k - 50k</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="Offeredsalary5">
                                    <label class="custom-control-label" for="Offeredsalary5">50k - 60k</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="widget">
                        <div class="widget-title widget-collapse">
                            <h6>Gender</h6>
                            <a class="ml-auto" data-toggle="collapse" href="#gender" role="button" aria-expanded="false" aria-controls="gender"><i class="fas fa-chevron-down"></i></a>
                        </div>
                        <div class="collapse show" id="gender">
                            <div class="widget-content">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="gender1">
                                    <label class="custom-control-label" for="gender1">Male</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="gender2">
                                    <label class="custom-control-label" for="gender2">Female</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="widget">
                        <div class="widget-title widget-collapse">
                            <h6>Qualification</h6>
                            <a class="ml-auto" data-toggle="collapse" href="#qualification" role="button" aria-expanded="false" aria-controls="qualification"> <i class="fas fa-chevron-down"></i></a>
                        </div>
                        <div class="collapse show" id="qualification">
                            <div class="widget-content">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="qualification1">
                                    <label class="custom-control-label" for="qualification1">Matriculation</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="qualification2">
                                    <label class="custom-control-label" for="qualification2">Intermediate</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="qualification3">
                                    <label class="custom-control-label" for="qualification3">Graduate</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="widget border-0">
                        <div class="widget-add">
                            <img class="img-fluid" src="images/add-banner.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 ">
                <div class="row g-2 " id="projects-container">
                    <?php
                        $query = "select p.ID,p.Title,p.Description_project,p.budget,u.Name_user,c.Name_categories from Projets p
                        left join Categories c on 
                        p.ID_Categorie=c.ID
                        inner join users u on
                        p.ID_User = u.ID";

                    global $con;
                    $res = mysqli_query($con, $query);
                    while ($project = mysqli_fetch_assoc($res)) {

                    ?>
                        <div class="col-4" id="projectData">
                            <!-- Basic -->
                            <div class="card" style="width: 20rem;">
                                <img src="/project/pages/images/html.jpg" class="card-img-top" alt="">
                                <div class="card-body" style="height: 180px; overflow: hidden;">
                                    <h5 class="card-title"><?= $project['Title'] ?></h5>
                                    <h5 class="card-title"><?= $project['budget'] ?>$</h5>
                                    <?php

                                    ?>
                                    <p class="card-text des-project"><?= $project['Description_project'] ?></p>
                                    <a href="viewproject.php?viewid=<?php echo htmlentities ($project['ID']);?>" class="btn btn-primary btn-block des-project" style="position: absolute; bottom: 5px; right: 5px;">view more</a>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>

            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script src="javascript/recherch.js"></script>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js'></script>
    <script src="javascript/livesearch.js"></script>


</body>

</html>