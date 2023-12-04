<?php
include(__DIR__."/../../../connection_database/database.php");
session_start();

$errors = array();
$errorslogin = array();
function signup(){
    $errors = array();
    global $con;
    $fname = mysqli_real_escape_string($con,$_POST['full_name']) ;
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $password = mysqli_real_escape_string($con,$_POST['password']);
    $cnfirmpassword = $_POST['cnfirmpassword'];
    $birthday = mysqli_real_escape_string($con,$_POST['birthday']);
    $city = mysqli_real_escape_string($con,$_POST['city']);
    $email_check = "SELECT * FROM users u WHERE u.email = '$email'";
    $res = mysqli_query($con, $email_check);

    if($cnfirmpassword!==$password){
        $errors['password'] = "Passwords must match";
     }
     if(mysqli_num_rows($res) > 0){
        $errors['email'] = "Email that you have entered is already exist!";
       }
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $errors['formemail'] = "not valid Email ";
    }

    if(strlen($password)<3 ){
        $errors['strngpassword'] = "please enter strong Password ";
    }
    if(count($errors) == 0){
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $addquery = "INSERT INTO users (Name_user, email, Password_user, birthday, city)
    VALUES ('$fname', '$email', '$hashedPassword', '$birthday', $city);";
    mysqli_query($con,$addquery);    
    }
return $errors;
}
function login(){
    $errorslogin = array();
    global $con;
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $password = mysqli_real_escape_string($con,$_POST['password']);
    $query = "SELECT * FROM users WHERE email = '$email';";
    $res = mysqli_query($con, $query);
    if(mysqli_num_rows($res) > 0){
      $userdata = mysqli_fetch_assoc($res);
      $get_pass = $userdata['Password_user'];
      //checking password
      if(password_verify($password, $get_pass)){
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        $_SESSION['role'] = $userdata['user_role'];
        $_SESSION['id'] = $userdata['ID'];
        $_SESSION['username'] = $userdata['Name_user'];
        $_SESSION['created_at'] = $userdata['created_at'];
        // var_dump($_SESSION['role']);die();
        setcookie('email',$email,time() + 60*2 ,'/');
        if($_SESSION['role'] == 'admin'){
            header('location: ../dashboard/dashboard.php');
        }
        else if($_SESSION['role'] == 'freelancer'){
            header('location: profile.php');
        }
        else if($_SESSION['role'] == 'user'){
            header('location: index.php');
        }

        
       }
    else{
        $errorslogin['email'] = "Incorrect email or password!";
    }
  }
  return $errorslogin;
}
?>