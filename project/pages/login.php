
<?php

require "../../project/pages/handlers/login_sys.php";
//user try to signup
if(isset($_SESSION['email'])){
    header('location: profile.php');
}
if(isset($_POST['register']))
{
  $errors = signup();
}
if(isset($_POST['login'])){
  $errorslogin=login();
}
?>




<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Login and Registration Form in HTML & CSS | CodingLab </title>
      <!-- style links -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <!-- animation links -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <!-- link for icons -->
  <script src="https://kit.fontawesome.com/6cd9388e68.js" crossorigin="anonymous"></script>
    <!-- animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="/project/pages/css/login.css">
    <link rel="stylesheet" href="/project/pages/css/style.css">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
    <!-- Navbar -->
    <?php
    require "navbar.php";
    ?>
  <div class="login_container">
    <div class="containers">
      <input type="checkbox" id="flip">
      <div class="cover">
        <div class="front">
          <img src="images/rocket.jpg" alt="">
          <div class="text">
            <span class="text-1">Every new friend is a <br> new adventure</span>
            <span class="text-2">Let's get connected</span>
          </div>
        </div>
        <div class="back">
          <div class="text">
            <span class="text-1">Complete miles of journey <br> with one step</span>
            <span class="text-2">Let's get started</span>
          </div>
        </div>
      </div>
      <div class="forms">
          <div class="form-content">
            <div class="login-form">
              <div class="title">Login</div>

              <?php if(count($errorslogin) > 0){?>    
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errorslogin as $showerror){
                                echo $showerror;
                            }
                            ?>
            </div>
              <?php
              } ?>

            <form method="post">
              <div class="input-boxes">
                <div class="input-box">
                  <i class="fas fa-envelope"></i>  
                  <input type="text" name="email" placeholder="Enter your email" value="<?=isset($_COOKIE['email']) ? $_COOKIE['email'] : 'Exmp@email.com'?>" required>
                </div>
                <div class="input-box">
                  <i class="fas fa-lock"></i>
                  <input type="password" name="password" placeholder="Enter your password" required>
                </div>
                <div class="text"><a href="#">Forgot password?</a></div>
                <div class="button input-box">
                  <input type="submit" name="login" value="Sumbit">
                </div>
                <div class="text sign-up-text">Don't have an account? <label for="flip">Signup now</label></div>
              </div>
          </form>
        </div>
          <div class="signup-form">
            <div class="title">Signup</div>

              <?php if (count($errors) > 0) { ?>

                  <?php
                  foreach ($errors as $showerror) { ?>
                      <div class="alert alert-danger text-center">
                          <?php
                          echo $showerror;
                          ?>
                      </div>
                  <?php    } ?>
                  <br />
                  <?php
              } ?>
             <form method="post">
              <div class="input-boxes">
                <div class="input-box">
                  <i class="fas fa-user"></i>
                  <input name="full_name" type="text" placeholder="Enter your name" required>
                </div>
                <div class="input-box">
                  <i class="fas fa-envelope"></i>
                  <input type="text" name="email" placeholder="Enter your email" required>
                </div>
                <div class="input-box">
                      <i class="fas fa-lock"></i>
                      <input type="password" name="password" placeholder="Enter your password" required>
                </div>
                <div class="input-box">
                      <i class="fas fa-lock"></i>
                      <input type="password" name="cnfirmpassword" placeholder="Confirm password" required>
                </div>
                <div class="input-box">
                  <i class="fas fa-user"></i>
                  <input type="date" name="birthday" placeholder="Enter your birthday date" required>
                </div>

                  <select name="city" class="input-box" aria-label="Default select example">
                      <option selected disabled>Open this select menu</option>
                      <?php
                      $query = "SELECT * FROM ville;";
                      global $con ;
                      $res = mysqli_query($con,$query);
                      while($row = mysqli_fetch_assoc( $res ))  {
                          ?>

                          <option value="<?= $row['id']?>">
                              <?= $row['ville']?></option>
                      <?php
                      };
                      ?>
                  </select>

                <div class="button input-box">
                  <input type="submit" name="register" value="Sumbit">
                </div>
                <div class="text sign-up-text">Already have an account? <label for="flip">Login now</label></div>
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