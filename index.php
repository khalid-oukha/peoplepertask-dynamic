<?php
session_start();
require "../PeoplePerTask/connection_database/database.php";
?>





<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>People per task</title>

    <!-- style links -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/project/pages/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- animation links -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- link for icons -->
    <script src="https://kit.fontawesome.com/6cd9388e68.js" crossorigin="anonymous"></script>
    <!-- animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary navbar-postion ">
    <div class="container">
        <a class="navbar-brand" href="index.php"><img src="project/pages/images/M.png" alt="logo"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php
                if (isset($_SESSION['email'])) {
                ?>
                    <li class="nav-item">
                        <a class="nav-link" style="color: green;" href="/project/pages/profile.php">Profile</a>
                    </li>
                <?php
                }
                ?>
                <li class="nav-item">
                    <a class="nav-link active" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/project/pages/about.php">about</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/project/pages/pack.php">Pricing</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        category
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/project/pages/recherch.php">Ui/Ux</a></li>
                        <li><a class="dropdown-item" href="/project/pages/recherch.php">content writing</a></li>
                        <li><a class="dropdown-item" href="/project/pages/recherch.php">video editing</a></li>
                        <li><a class="dropdown-item" href="/project/pages/recherch.php">Ui/Ux</a></li>
                        <li><a class="dropdown-item" href="/project/pages/recherch.php">content writing</a></li>
                        <li><a class="dropdown-item" href="/project/pages/recherch.php">video editing</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php#testimonials-key">Testimonials</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/project/pages/contact.php">Contact</a>
                </li>
            </ul>
            <!--  -->
            <form class="d-flex input-group w-auto">
                <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                <span class="input-group-text border-0" id="search-addon">
                    <img src="project/pages/images/searchicon.svg" alt="">
                </span>
            </form>
            <?php

            if (isset($_SESSION['email'])) {
            ?>
                <a class="btn btn-primary me-2 sign-style-color" href="/project/pages/handlers/logout.php" role="button">Logout</a>
            <?php } else{ ?>
                <a class="btn btn-primary me-2 sign-style-color" href="/project/pages//login.php" role="button">Login</a>
            <?php } ?>
        </div>
</nav>
    <!-- hero section -->
    <section class="hero">
        <div class="container ">
            <div class="row d-flex align-items-center">
                <div class="col-lg-6 col-md-12 col-sm-12 align-items-center">
                    <div class="text-content">
                        <div class="text-label">
                            <h3 class="text-dark">discover your perfect</h3>
                        </div>
                        <div class="text-hero-bold">
                            <h1 class="display-1 fw-bold mb-3">free<span class="text-half-orange-effect">lancer</span>
                            </h1>
                        </div>
                        <div class="text-hero-p ">
                            <p class="pe-lg-10 mb-5">"Welcome to people per task, the premier destination for connecting
                                talented
                                freelancers with exciting projects and opportunities. Whether you're a skilled
                                professional seeking your
                                next gig or a business in need of top-tier expertise, we've got you covered. Our
                                platform empowers you
                                to work with the best and achieve your goals."</p>
                        </div>
                        <div class="hero-button">
                            <a class="btn btn-primary primary-btn-orange" href="#">Get started</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 d-flex justify-content-center py-3">
                    <div class="position-relative hero-img-container ">
                        <img src="project\pages\images\heroimg.svg" alt="hero svg" id="hero-img-animation"
                            class="mx-auto scale-hero-img" style="width: 40vw;">
                        <img src="project/pages/images/flowerxl.svg" alt="flower" id="flower-img-animation"
                            class=" position-absolute end-0 bottom-0 " style="width: 8vw;">
                        <img src="project/pages/images/flowerm.svg" alt="icon" id="flower-small-animation"
                            class=" position-absolute bottom-0  " style="width: 4vw;">
                        <img src="project/pages/images/flowerxl.svg" alt="flower" id="flowerxl-img-animation"
                            class=" position-absolute  bottom-0 end-100 " style="width: 8vw;">
                        <img src="project/pages/images/Vectorsetting.svg" id="setting-icon-animation" alt="setting"
                            class=" position-absolute  top-0 end-100  " style="width: 4vw;">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- category section -->
    <section class="category my-4 py-4">
        <div class="container ">
            <div class="row">
                <div class="col-12">
                    <div class="row text-center justify-content-center">
                        <h2 class="display-5 fw-bold mb-3">Browse talent <span class="text-half-orange-effect">by
                                category</span>
                        </h2>
                        <div class="text-hero-p col-10 ">
                            <p class="pe-lg-10 mb-5">your gateway to a diverse community of skilled freelancers ready to
                                bring your
                                projects to life. We've organized our talent pool into various categories to help you
                                find the perfect
                                match for your unique needs.Our team members are experts in all facets of the design
                                industry including:
                                print design, illustration, branding, identity and more.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row ">
                <?php
                    $query = "SELECT * FROM categories LIMIT 8 ;";
                
                    global $con;
                    $res = mysqli_query($con,$query);
                

                    while($row = mysqli_fetch_assoc( $res ))  {                
                ?>
                <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                    <div class="card category-card-style my-2">
                        <div class="d-flex justify-content-center ">
                            <img src="project/pages/images/categorycoding.svg" alt="category">
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title fw-semibold"><?=$row['Name_categories']?></h5>
                            <p class="card-text"><?=$row['description']?></p>
                        </div>
                    </div>
                </div>

                <?php
                    }
                ?>

            </div>
    </section>
    <!-- famous freelancers -->
    <section class="section-famous-freelancers my-4 py-4">
        <div class="container position-relative">
            <img src="project/pages/images/Circle2.svg" id="circles-animation1" alt="flower"
                class=" position-absolute end-0 bottom-0 ">
            <img src="project/pages/images/Circle2.svg" id="circles-animation2" alt="flower"
                class=" position-absolute end-0 bottom-10 ">
            <img src="project/pages/images/Circle4.svg" id="circles-animation3" alt="flower"
                class=" position-absolute end-0 top-10 ">
            <img src="project/pages/images/Circle4.svg" id="circles-animation4" alt="flower"
                class=" position-absolute end-100 top-10 ">
            <div class="row z-index-modifier">
                <div class="col-12">
                    <div class="row text-center justify-content-center">
                        <h2 class="display-5 fw-bold mb-3 z-index-modifier">Expert free<span
                                class="text-half-orange-effect z-index-modifier">lancers</span>
                        </h2>
                        <div class="text-hero-p col-10 z-index-modifier">
                            <p class="pe-lg-10 mb-5">Search and contact freelancers directly with no obligation </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row z-index-modifier">
                <div class=" col-lg-4 col-md-6 col-12 my-4 d-flex flex-column align-items-center ">
                    <div class="card" style="max-width: 23rem;">
                        <img class="my-2 " src="project/pages/images/fatiphoto.svg" alt="lahcen" style="height: 9rem; ">
                        <div class="card-body ">
                            <div class="card-head">
                                <h5 class="card-title fw-semibold text-center">Fati</h5>
                            </div>

                            <p class="text-center ">full-Stack Developer</p>
                            <div class="d-flex align-items-center justify-content-center">
                                <img src="project/pages/images/Star_light.svg" alt="star for reviews">
                                <img src="project/pages/images/Star_light.svg" alt="star for reviews">
                                <img src="project/pages/images/Star_light.svg" alt="star for reviews">
                                <img src="project/pages/images/Star_light.svg" alt="star for reviews">
                                <img src="project/pages/images/Star_lightimpty.svg" alt="">
                            </div>

                            <p class="card-text text-center">Some quick example text to build on the card title and make
                                up the bulk of the card's
                                content.</p>
                            <div class="hero-button d-flex justify-content-center my-2">
                                <a class="btn btn-primary primary-btn-orange" href="#">Get started</a>
                            </div>
                            <div class="card-footer my-2">
                                <span class="text-body-secondary my-2">UX-UI-Designer-adobe-figma</span>
                                <div>
                                    <div class="row project-num my-2 d-flex justify-content-between">
                                        <div class="col-3  ">
                                            <span class="row">Project</span>
                                            <span class="row">5457</span>
                                        </div>
                                        <div class="col-6">
                                            <span class="row">Member since</span>
                                            <span class="row">01-11-2020</span>
                                        </div>
                                        <div class="col-3">
                                            <span class="row fw-bold fs-4" style="color: green;">50$</span>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" col-lg-4 col-md-6 col-12 my-4 d-flex flex-column align-items-center ">
                    <div class="card" style="max-width: 23rem;">
                        <img class="my-2 " src="project/pages/images/lahcenphoto.svg" alt="lahcen" style="height: 9rem; ">
                        <div class="card-body ">
                            <div class="card-head">
                                <h5 class="card-title fw-semibold text-center">lahcen</h5>
                            </div>

                            <p class="text-center ">UX/UI Designer</p>
                            <div class="d-flex align-items-center justify-content-center">
                                <img src="project/pages/images/Star_light.svg" alt="star for reviews">
                                <img src="project/pages/images/Star_light.svg" alt="star for reviews">
                                <img src="project/pages/images/Star_light.svg" alt="star for reviews">
                                <img src="project/pages/images/Star_light.svg" alt="star for reviews">
                                <img src="project/pages/images/Star_light.svg" alt="star for reviews">

                            </div>

                            <p class="card-text text-center">Some quick example text to build on the card title and make
                                up the bulk of the card's
                                content.</p>
                            <div class="hero-button d-flex justify-content-center my-2">
                                <a class="btn btn-primary primary-btn-orange" href="#">Get started</a>
                            </div>
                            <div class="card-footer my-2">
                                <span class="text-body-secondary my-2">UX-UI-Designer-adobe-figma</span>
                                <div>
                                    <div class="row project-num my-2 d-flex justify-content-between">
                                        <div class="col-3  ">
                                            <span class="row">Project</span>
                                            <span class="row">5457</span>
                                        </div>
                                        <div class="col-6">
                                            <span class="row">Member since</span>
                                            <span class="row">01-11-2020</span>
                                        </div>
                                        <div class="col-3">
                                            <span class="row fw-bold fs-4" style="color: green;">700$</span>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class=" col-lg-4 col-md-6 col-12 my-4 d-flex flex-column align-items-center ">
                    <div class="card" style="max-width: 23rem;">
                        <img class="my-2 position-relative" src="project/pages/images/gara.svg" alt="gara" style="height: 9rem; ">
                        <div class="card-body ">
                            <div class="card-head">
                                <h5 class="card-title fw-semibold text-center">khalid gara</h5>
                            </div>

                            <p class="text-center ">Video Editing</p>
                            <div class="d-flex align-items-center justify-content-center">
                                <img src="project/pages/images/Star_light.svg" alt="star for reviews">
                                <img src="project/pages/images/Star_light.svg" alt="star for reviews">
                                <img src="project/pages/images/Star_light.svg" alt="star for reviews">
                                <img src="project/pages/images/Star_light.svg" alt="star for reviews">
                                <img src="project/pages/images/Star_lightimpty.svg" alt="">
                            </div>

                            <p class="card-text text-center">Some quick example text to build on the card title and make
                                up the bulk of the card's
                                content.</p>
                            <div class="hero-button d-flex justify-content-center my-2">
                                <a class="btn btn-primary primary-btn-orange" href="#">Get started</a>
                            </div>
                            <div class="card-footer my-2">
                                <span class="text-body-secondary my-2">UX-UI-Designer-adobe-figma</span>
                                <div>
                                    <div class="row project-num my-2 d-flex justify-content-between">
                                        <div class="col-3  ">
                                            <span class="row">Project</span>
                                            <span class="row">5457</span>
                                        </div>
                                        <div class="col-6">
                                            <span class="row">Member since</span>
                                            <span class="row">11-11-2023</span>
                                        </div>
                                        <div class="col-3">
                                            <span class="row fw-bold fs-4" style="color: green;">87$</span>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" col-lg-4 col-md-6 col-12 my-4 d-flex flex-column align-items-center freelancer-card-display"
                    style="display: none !important;">
                    <div class="card" style="max-width: 23rem;">
                        <img class="my-2 position-relative" src="project/pages/images/nan.svg" alt="lahcen" style="height: 9rem; ">
                        <div class="card-body ">
                            <div class="card-head">
                                <h5 class="card-title fw-semibold text-center">nana late</h5>
                            </div>

                            <p class="text-center ">Song Writer</p>
                            <div class="d-flex align-items-center justify-content-center">
                                <img src="project/pages/images/Star_light.svg" alt="star for reviews">
                                <img src="project/pages/images/Star_light.svg" alt="star for reviews">
                                <img src="project/pages/images/Star_light.svg" alt="star for reviews">
                                <img src="project/pages/images/Star_light.svg" alt="star for reviews">
                                <img src="project/pages/images/Star_lightimpty.svg" alt="">
                            </div>

                            <p class="card-text text-center">Some quick example text to build on the card title and make
                                up the bulk of the card's
                                content.</p>
                            <div class="hero-button d-flex justify-content-center my-2">
                                <a class="btn btn-primary primary-btn-orange" href="#">Get started</a>
                            </div>
                            <div class="card-footer my-2">
                                <span class="text-body-secondary my-2">UX-UI-Designer-adobe-figma</span>
                                <div>
                                    <div class="row project-num my-2 d-flex justify-content-between">
                                        <div class="col-3  ">
                                            <span class="row">Project</span>
                                            <span class="row">5457</span>
                                        </div>
                                        <div class="col-6">
                                            <span class="row">Member since</span>
                                            <span class="row">01-11-2020</span>
                                        </div>
                                        <div class="col-3">
                                            <span class="row fw-bold fs-4" style="color: green;">5$</span>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class=" col-lg-4 col-md-6 col-12 my-4 d-flex flex-column align-items-center freelancer-card-display"
                    style="display: none !important;">
                    <div class="card" style="max-width: 23rem;">
                        <img class="my-2 position-relative" src="project/pages/images/dad.svg" alt="lahcen" style="height: 9rem; ">
                        <div class="card-body ">
                            <div class="card-head">
                                <h5 class="card-title fw-semibold text-center">Sand john</h5>
                            </div>

                            <p class="text-center ">Beat Maker</p>
                            <div class="d-flex align-items-center justify-content-center">
                                <img src="project/pages/images/Star_light.svg" alt="star for reviews">
                                <img src="project/pages/images/Star_light.svg" alt="star for reviews">
                                <img src="project/pages/images/Star_light.svg" alt="star for reviews">
                                <img src="project/pages/images/Star_light.svg" alt="star for reviews">
                                <img src="project/pages/images/Star_light.svg" alt="star for reviews">

                            </div>

                            <p class="card-text text-center">Some quick example text to build on the card title and make
                                up the bulk of the card's
                                content.</p>
                            <div class="hero-button d-flex justify-content-center my-2">
                                <a class="btn btn-primary primary-btn-orange" href="#">Get started</a>
                            </div>
                            <div class="card-footer my-2">
                                <span class="text-body-secondary my-2">HipHop-Dj-beat-grandM</span>
                                <div>
                                    <div class="row project-num my-2 d-flex justify-content-between">
                                        <div class="col-3  ">
                                            <span class="row">Project</span>
                                            <span class="row">57</span>
                                        </div>
                                        <div class="col-6">
                                            <span class="row">Member since</span>
                                            <span class="row">01-02-2016</span>
                                        </div>
                                        <div class="col-3">
                                            <span class="row fw-bold fs-4" style="color: green;">800$</span>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class=" col-lg-4 col-md-6 col-12 my-4 d-flex flex-column align-items-center freelancer-card-display"
                    style="display: none !important;">
                    <div class="card" style="max-width: 23rem;">
                        <img class="my-2 position-relative" src="project/pages/images/nanana.svg" alt="lahcen" style="height: 9rem; ">
                        <div class="card-body ">
                            <div class="card-head">
                                <h5 class="card-title fw-semibold text-center">kaylie sffa</h5>
                            </div>

                            <p class="text-center ">Advertising</p>
                            <div class="d-flex align-items-center justify-content-center">
                                <img src="project/pages/images/Star_light.svg" alt="star for reviews">
                                <img src="project/pages/images/Star_light.svg" alt="star for reviews">
                                <img src="project/pages/images/Star_light.svg" alt="star for reviews">
                                <img src="project/pages/images/Star_light.svg" alt="star for reviews">
                                <img src="project/pages/images/Star_lightimpty.svg" alt="">
                            </div>

                            <p class="card-text text-center">Some quick example text to build on the card title and make
                                up the bulk of the card's
                                content.</p>
                            <div class="hero-button d-flex justify-content-center my-2">
                                <a class="btn btn-primary primary-btn-orange" href="#">Get started</a>
                            </div>
                            <div class="card-footer my-2">
                                <span class="text-body-secondary my-2">UX-UI-Designer-adobe-figma</span>
                                <div>
                                    <div class="row project-num my-2 d-flex justify-content-between">
                                        <div class="col-3  ">
                                            <span class="row">Project</span>
                                            <span class="row">5457</span>
                                        </div>
                                        <div class="col-6">
                                            <span class="row">Member since</span>
                                            <span class="row">01-11-2020</span>
                                        </div>
                                        <div class="col-3">
                                            <span class="row fw-bold fs-4" style="color: green;">72$</span>
                                        </div>
                                    </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class=" col-lg-4 col-md-6 col-12 my-4 d-flex flex-column align-items-center freelancer-card-display"
                    style="display: none !important;">
                    <div class="card" style="max-width: 23rem;">
                        <img class="my-2 position-relative" src="project/pages/images/othmanphoto.svg" alt="lahcen"
                            style="height: 9rem; ">
                        <div class="card-body ">
                            <div class="card-head">
                                <h5 class="card-title fw-semibold text-center">othman</h5>
                            </div>

                            <p class="text-center ">Song Writer</p>
                            <div class="d-flex align-items-center justify-content-center">
                                <img src="project/pages/images/Star_light.svg" alt="star for reviews">
                                <img src="project/pages/images/Star_light.svg" alt="star for reviews">
                                <img src="project/pages/images/Star_light.svg" alt="star for reviews">
                                <img src="project/pages/images/Star_light.svg" alt="star for reviews">
                                <img src="project/pages/images/Star_lightimpty.svg" alt="">
                            </div>

                            <p class="card-text text-center">Some quick example text to build on the card title and make
                                up the bulk of the card's
                                content.</p>
                            <div class="hero-button d-flex justify-content-center my-2">
                                <a class="btn btn-primary primary-btn-orange" href="#">Get started</a>
                            </div>
                            <div class="card-footer my-2">
                                <span class="text-body-secondary my-2">UX-UI-Designer-adobe-figma</span>
                                <div>
                                    <div class="row project-num my-2 d-flex justify-content-between">
                                        <div class="col-3  ">
                                            <span class="row">Project</span>
                                            <span class="row">5457</span>
                                        </div>
                                        <div class="col-6">
                                            <span class="row">Member since</span>
                                            <span class="row">01-11-2020</span>
                                        </div>
                                        <div class="col-3">
                                            <span class="row fw-bold fs-4" style="color: green;">5$</span>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class=" col-lg-4 col-md-6 col-12 my-4 d-flex flex-column align-items-center freelancer-card-display"
                    style="display: none !important;">
                    <div class="card" style="max-width: 23rem;">
                        <img class="my-2 position-relative" src="project/pages/images/kala.svg" alt="lahcen" style="height: 9rem; ">
                        <div class="card-body ">
                            <div class="card-head">
                                <h5 class="card-title fw-semibold text-center">Grand-M</h5>
                            </div>

                            <p class="text-center ">Beat Maker</p>
                            <div class="d-flex align-items-center justify-content-center">
                                <img src="project/pages/images/Star_light.svg" alt="star for reviews">
                                <img src="project/pages/images/Star_light.svg" alt="star for reviews">
                                <img src="project/pages/images/Star_light.svg" alt="star for reviews">
                                <img src="project/pages/images/Star_light.svg" alt="star for reviews">
                                <img src="project/pages/images/Star_light.svg" alt="star for reviews">

                            </div>

                            <p class="card-text text-center">Some quick example text to build on the card title and make
                                up the bulk of the card's
                                content.</p>
                            <div class="hero-button d-flex justify-content-center my-2">
                                <a class="btn btn-primary primary-btn-orange" href="#">Get started</a>
                            </div>
                            <div class="card-footer my-2">
                                <span class="text-body-secondary my-2">HipHop-Dj-beat-grandM</span>
                                <div>
                                    <div class="row project-num my-2 d-flex justify-content-between">
                                        <div class="col-3  ">
                                            <span class="row">Project</span>
                                            <span class="row">57</span>
                                        </div>
                                        <div class="col-6">
                                            <span class="row">Member since</span>
                                            <span class="row">01-02-2016</span>
                                        </div>
                                        <div class="col-3">
                                            <span class="row fw-bold fs-4" style="color: green;">800$</span>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class=" col-lg-4 col-md-6 col-12 my-4 d-flex flex-column align-items-center freelancer-card-display"
                    style="display: none !important;">
                    <div class="card" style="max-width: 23rem;">
                        <img class="my-2 position-relative" src="project/pages/images/ouissal.svg" alt="lahcen"
                            style="height: 9rem; ">
                        <div class="card-body ">
                            <div class="card-head">
                                <h5 class="card-title fw-semibold text-center">Ouissal</h5>
                            </div>

                            <p class="text-center ">Advertising</p>
                            <div class="d-flex align-items-center justify-content-center">
                                <img src="project/pages/images/Star_light.svg" alt="star for reviews">
                                <img src="project/pages/images/Star_light.svg" alt="star for reviews">
                                <img src="project/pages/images/Star_light.svg" alt="star for reviews">
                                <img src="project/pages/images/Star_light.svg" alt="star for reviews">
                                <img src="project/pages/images/Star_lightimpty.svg" alt="">
                            </div>

                            <p class="card-text text-center">Some quick example text to build on the card title and make
                                up the bulk of the card's
                                content.</p>
                            <div class="hero-button d-flex justify-content-center my-2">
                                <a class="btn btn-primary primary-btn-orange" href="#">Get started</a>
                            </div>
                            <div class="card-footer my-2">
                                <span class="text-body-secondary my-2">UX-UI-Designer-adobe-figma</span>
                                <div>
                                    <div class="row project-num my-2 d-flex justify-content-between">
                                        <div class="col-3  ">
                                            <span class="row">Project</span>
                                            <span class="row">5457</span>
                                        </div>
                                        <div class="col-6">
                                            <span class="row">Member since</span>
                                            <span class="row">01-11-2020</span>
                                        </div>
                                        <div class="col-3">
                                            <span class="row fw-bold fs-4" style="color: green;">72$</span>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <button id="loadmore" class="btn btn-primary primary-btn-orange">Load More</button>
                </div>
            </div>
        </div>

    </section>
    <!-- Testimonials section -->
    <section id="testimonials-key" class="Testimonials my-4 py-4">
        <div class="container position-relative">
            <div style="z-index: -1;">
                <img src="project/pages/images/orangeCircle.svg" alt="flower" id="testimontial-animation1" class="position-absolute ">
                <img src="project/pages/images/Circle4.svg" alt="flower" id="testimontial-animation2" class=" position-absolute">
            </div>
            <div class="row ">
                <div class="col-12 z-index-modifier">
                    <div class="row text-center justify-content-center">
                        <h2 class="display-5 fw-bold mb-3 ">Test<span class="text-half-orange-effect">imonials</span>
                        </h2>
                        <div class="text-hero-p col-10 ">
                            <p class="pe-lg-10 mb-5 ">your gateway to a diverse community of skilled freelancers ready
                                to bring your
                                projects to life. We've organized our talent pool into various categories to help you
                                find the perfect
                                match for your unique needs.Our team members are experts in all facets of the design
                                industry including:
                                print design, illustration, branding, identity and more.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row ">
                <div id="carouselExample" class="carousel slide">
                    <div class="carousel-inner">

                        <?php
                    $query = "SELECT t.user_slugn, t.testimonial_Message,u.Name_user,t.created_at FROM testimonial t
                    INNER JOIN users u
                    ON t.ID=u.ID;";
                    global $con;
                    $result = mysqli_query($con,$query);
                    
                    $active = true;
                    while($row = mysqli_fetch_assoc($result))  {                
                          ?>
                        <div class="carousel-item <?php if($active){echo "active";}?>">
                            <div class="col-lg-6 col-md-6 col-12 mx-auto ">
                                <div class="card category-card-style  my-4">
                                    <div class="card-body m-4 ">
                                        <div class="d-flex  justify-content-between card-flex">
                                            <div class="d-flex align-items-center m-3">
                                                <img src="project/pages/images/fatiha.svg" alt=""
                                                    class="rounded-circle avatar-xl mb-3 mb-lg-0 ">
                                            </div>
                                            <div class="">
                                                <h4 class="mb-0"><?=$row['Name_user']?></h4>
                                                <p class="mb-0 fs-6"><?=$row['user_slugn']?></p>
                                                <i class="fa-solid fa-quote-left fa-xl" style="color: #ff7300;"></i>
                                                <p><?=$row['testimonial_Message']?>
                                                </p>
                                                <i class="fa-solid fa-quote-left fa-rotate-180 fa-xl"
                                                    style="color: #ff7300;"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                        $active = false;
                    }
                    
                        ?>

                    </div>
                    <a class="carousel-control-prev " href="#carouselExampleCaptions" role="button"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-bs-slide="next">
                        <i class="fa-solid fa-angles-right fa-2xl" style="color: #ff6600;"></i>
                    </a>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                        data-bs-slide="prev">
                        <i class="fa-solid fa-angles-left fa-2xl" style="color: #ff6600;"></i>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
    </section>
    <!-- trusted company -->
    <section class="trusted-company">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row text-center justify-content-center">
                        <h2 class="display-5 fw-bold mb-3">Browse talent <span class="text-half-orange-effect">by
                                category</span>
                        </h2>
                        <div class="text-hero-p col-10 ">
                            <p class="pe-lg-10 mb-5">your gateway to a diverse community of skilled freelancers ready to
                                bring your
                                projects to life. We've organized our talent pool into various categories to help you
                                find the perfect
                                match for your unique needs.Our team members are experts in all facets of the design
                                industry including:
                                print design, illustration, branding, identity and more.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-2 col-md-4 col-6">
                    <div class="mb-4 text-center align-middle">
                        <a href="https://www.rolls-roycemotorcars.com/en_GB/home.php" target="_blank">
                            <img src="project/pages/images/lg4.svg" alt="company logo" style="width: 10vw;">
                        </a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-4 col-6">
                    <div class="mb-4 d-flex justify-content-between">
                        <a href="https://www.bmw.com/en/index.php" target="_blank">
                            <img src="project/pages/images/lg1.svg" alt="company logo" style="width: 10vw;">
                        </a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-4 col-6">
                    <div class="mb-4 d-flex justify-content-between">
                        <a href="https://www.starbucks.com/" target="_blank">
                            <img src="project/pages/images/lg2.svg" alt="company logo" style="width: 10vw;">
                        </a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-4 col-6">
                    <div class="mb-4 d-flex justify-content-between">
                        <a href="https://www.binance.com/en" target="_blank">
                            <img src="project/pages/images/binance.svg" alt="binance" style="width: 10vw;">
                        </a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-4 col-6">
                    <div class="mb-4 d-flex justify-content-between">
                        <a href="https://titan.email/" target="_blank">
                            <img src="project/pages/images/lg3.svg" alt="company logo" style="width: 10vw;">
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="mb-4 d-flex justify-content-between">
                        <a href="https://en.dragon-ball-official.com/" target="_blank">
                            <img src="project/pages/images/namek.svg" alt="company logo" style="width: 10vw;">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- footer -->
    <footer class="pt-lg-10 pt-5 footer footer-color">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- about company -->
                    <div class="mb-4">
                        <img src="project/pages/images/M.png" alt="" class="logo-inverse ">
                        <div class="mt-4 text-light">
                            <p>Youssofia, youcode school.
                                691 South El aamala Blvd.
                                Morocco, CA 155
                            </p>
                            <!-- social media -->
                            <div class="fs-2">
                                <i class="fa-brands fa-linkedin" style="color: #ffff;"></i>
                                <i class="fa-brands fa-instagram" style="color: #ffff;"></i>
                                <i class="fa-brands fa-facebook" style="color: #ffff;"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="offset-lg-1 col-lg-2 col-md-3 col-6">
                    <div class="mb-4">
                        <!-- list -->
                        <h3 class="fw-semibold text-light mb-3">Company</h3>
                        <ul class="list-unstyled nav nav-footer flex-column nav-x-0">
                            <li><a href="#" class="nav-link text-light">About</a></li>
                            <li><a href="#" class="nav-link text-light">Pricing</a></li>
                            <li><a href="#" class="nav-link text-light">Blog</a></li>
                            <li><a href="#" class="nav-link text-light">Careers</a></li>
                            <li><a href="#" class="nav-link text-light">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-6">
                    <div class="mb-4">
                        <h3 class="fw-semibold text-light mb-3">Resources</h3>
                        <ul class="list-unstyled nav nav-footer flex-column nav-x-0">
                            <li><a href="#" class="nav-link text-light">Success Stories </a></li>
                            <li><a href="#" class="nav-link text-light">Become Freelancer</a></li>
                            <li><a href="#" class="nav-link text-light">Get the app</a></li>
                            <li><a href="about.php" class="nav-link text-light">FAQ’s</a></li>
                            <li><a href="#" class="nav-link text-light">Tutorial</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-6">
                    <div class="mb-4">
                        <h3 class="fw-semibold text-light mb-3">Information</h3>
                        <ul class="list-unstyled nav nav-footer flex-column nav-x-0">
                            <li><a href="#" class="nav-link text-light">Careers
                                </a></li>
                            <li><a href="#" class="nav-link text-light">FAQ</a></li>
                            <li><a href="#" class="nav-link text-light">Privacy Policy </a></li>
                            <li><a href="about.php" class="nav-link text-light">FAQ’s</a></li>
                            <li><a href="#" class="nav-link text-light">Information</a></li>
                        </ul>
                    </div>
                </div>

            </div>
            <div class="row align-items-center g-0 border-top py-2 mt-6">
                <!-- Desc -->
                <div class="col-lg-4 col-md-5 col-12">
                    <span class="text-light">
                        ©
                        <span id="copyright" class="text-light">
                            <script>
                            document.getElementById('copyright').appendChild(document.createTextNode(new Date()
                                .getFullYear()))
                            </script>
                            <span class="text-light">By Goch tavn and Per Task Team</span>
                        </span>

                    </span>
                </div>
            </div>
        </div>
    </footer>
    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- javascript links -->
    <script src="/project/pages/javascript/main.js"></script>
</body>

</html>