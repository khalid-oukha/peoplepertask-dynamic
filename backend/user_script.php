<?php

include(__DIR__."/../connection_database/database.php");

if(isset($_POST['userId'])){
    getUser();
}

function getAllUsers(){
    $query = "SELECT u.ID,u.Name_user,u.Password_user,u.email,u.birthday,v.id,v.ville FROM users u 
    inner JOIN ville v
    ON u.city=v.id;";

    global $con;
    $res = mysqli_query($con,$query);

    while($user = mysqli_fetch_assoc( $res )){
        $GLOBALS['users'][]=$user;
    }
}
function getAllCitys(){
    $query = "SELECT * FROM ville;";

    global $con;
    $res = mysqli_query($con,$query);

    while($city = mysqli_fetch_assoc( $res )){
        $GLOBALS['citys'][]=$city;
    }
}


function adduser(){
    if(isset($_POST['add_user'])){
        $name_user = $_POST['name_user'];
        $email_user = $_POST['email_user'];
        $password_user = $_POST['password_user'];
        $birthday_user = $_POST['birthday_user'];
        $city_user = $_POST['city_user'];
        $addquery = "INSERT INTO users (Name_user, email, Password_user, birthday,city) 
        VALUES 
        ('$name_user', '$email_user','$password_user','$birthday_user',$city_user);";
        global $con;
        $result = mysqli_query($con,$addquery);
        header("Location: /PeoplePerTask/project/dashboard/user.php");
    }
}
adduser();

function deleteuser(){
    if(isset($_POST['deleteId'])){
        $id_user = $_POST['deleteId'];
        $deletequery = "delete from users where ID = '$id_user';";
        global $con;
        $result = mysqli_query($con,$deletequery);
        header("Location: /PeoplePerTask/project/dashboard/user.php");
    }
}
deleteuser();

function getUser(){
    $id= $_POST['userId'] ;
    $query = "SELECT ID, Name_user, Password_user, email, birthday, city FROM users
    where ID = '$id'
    ;";

    global $con;
    $res = mysqli_query($con,$query);
    while($freelancer = mysqli_fetch_assoc( $res )){
       echo json_encode ($freelancer);
    }
}
function newDataFreelancer(){
    if(isset($_POST['newFreelancer'])){
        $id_feerlancer = $_POST['id_freelancer'];
        $name_feerlancer = $_POST['name_freelancer'];
        $skill = $_POST['skill'];
        $birthday_user = $_POST['birthday_user'];
        $email_user = $_POST['email_user'];
        $addquery = "UPDATE Freelances AS f
        INNER JOIN users u ON u.ID = f.ID_user
        SET f.Name_freelance = '$name_feerlancer', f.Skill='$skill', u.birthday='$birthday_user',u.email='$email_user'
        WHERE f.ID=$id_feerlancer;";
        global $con;
        $result = mysqli_query($con,$addquery);
        header("Location: /PeoplePerTask/project/dashboard/freelancers.php");
    }
}
newDataFreelancer();
?>