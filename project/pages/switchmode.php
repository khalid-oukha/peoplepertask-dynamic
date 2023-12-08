<?php
session_start();
require "../../connection_database/database.php";

function switchFreelancer()
{
    $id_user = $_SESSION['id'];
    $username = $_POST['fname'];
    $job = $_POST['job'];
    $Description = $_POST['Description'];
    $addquery = "INSERT INTO `freelances`(`Name_freelance`, `ID_user`, `job`, `description`) 
    VALUES ('$username','$id_user','$job','$Description')";
    global $con;
    $result = mysqli_query($con, $addquery);
    if($result){
      $updaterole = "UPDATE users u  
      SET u.user_role='freelancer' 
      WHERE u.ID='$id_user';";
      $result = mysqli_query($con, $updaterole);
      if($result){
        $_SESSION['role']='freelancer';
      }
    }
    header("Location: profile.php");
}
if (isset($_POST['switchfreelancer'])) {
    switchFreelancer();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="/project/pages/css/editprofile.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.2.96/css/materialdesignicons.min.css" integrity="sha512-LX0YV/MWBEn2dwXCYgQHrpa9HJkwB+S+bnBpifSOTO1No27TqNMKYoAn6ff2FBh03THAzAiiCwQ+aPX+/Qt/Ow==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
  <div class="container light-style flex-grow-1 container-p-y">

    <h4 class="font-weight-bold py-3 mb-4">
      Account settings
    </h4>
    <div class="card overflow-hidden">
      <div class="row no-gutters row-bordered row-border-light">
        <div class="col-md-3 pt-0">
          <div class="list-group list-group-flush account-settings-links">
            <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account-general">General</a>
          </div>
        </div>
        <div class="col-md-9">
          <div class="tab-content">
            <div class="tab-pane fade active show" id="account-general">

              <div class="card-body media align-items-center">
                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" class="d-block ui-w-80">
                <div class="media-body ml-4">
                  <label class="btn btn-outline-primary">
                    Upload new photo
                    <input type="file" class="account-settings-fileinput">
                  </label> &nbsp;
                  <button type="button" class="btn btn-default md-btn-flat">Reset</button>
                </div>
              </div>
              <hr class="border-light m-0">

              <div class="card-body">
            <form action="switchmode.php" method="post">
                    <div class="form-group">
                      <label class="form-label">Freelancer Username</label>
                      <input name="fname" type="text" class="form-control mb-1" value="">
                    </div>
                    <div class="form-group">
                      <label class="form-label">job</label>
                      <input name="job" type="text" class="form-control" value="">
                    </div>
                  <div class="form-group">
                    <label class="form-label">Phone</label>
                    <input name="phone" type="text" class="form-control mb-1" value="">
                  </div>
                    <div class="form-group">
                      <label class="form-label">Description</label>
                      <textarea class="form-control my-4" name="description" id="" cols="30" rows="5"></textarea>
                      <!-- <textarea  class="form-control" name="description" id="" cols="30" rows="3"></textarea> -->
                    </div>
                  <div class="text-right mt-3">
                    <button name="switchfreelancer" type="submit" class="btn btn-primary">Save changes</button>
                  </div>
            </form>

              </div>

            </div>
          </div>
        </div>
      </div>

    </div>
</body>

</html>