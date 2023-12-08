<?php

include(__DIR__."/../connection_database/database.php");

if(isset($_POST['userId'])){
    getUser();
}

function getAllUsers(){
    $query = "SELECT u.ID,u.Name_user,u.Password_user,u.email,u.birthday,v.id,v.ville,u.user_role FROM users u 
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
        $GLOBALS['citys'][] = $city;
    }
}


function adduser(){
    if(isset($_POST['add_user'])){
        $name_user = $_POST['name_user'];
        $email_user = $_POST['email_user'];
        $password_user = password_hash($_POST['password_user'],PASSWORD_DEFAULT);
        $birthday_user = $_POST['birthday_user'];
        $city_user = $_POST['city_user'];
        $user_role = $_POST['user_role'];
        $addquery = "INSERT INTO users (Name_user, email, Password_user, birthday,city,user_role) 
        VALUES 
        ('$name_user', '$email_user','$password_user','$birthday_user','$city_user','$user_role');";
        global $con;
        $result = mysqli_query($con,$addquery);
        header("Location: ..\project\dashboard\user.php");
    }
}
adduser();

function deleteuser(){
    if(isset($_POST['deleteId'])){
        $id_user = $_POST['deleteId'];
        $deletequery = "delete from users where ID = '$id_user';";
        global $con;
        $result = mysqli_query($con,$deletequery);
        header("Location: ..\project\dashboard\user.php");
    }
}
deleteuser();

function getUser(){
    $id= $_POST['userId'] ;
    $query = "SELECT ID, Name_user, email, birthday, city,user_role FROM users
    where ID = '$id'
    ;";

    global $con;
    $res = mysqli_query($con,$query);
    while($row = mysqli_fetch_assoc( $res )){    
       echo json_encode($row);
    }
}
function newDatauser(){
    if(isset($_POST['updateuser'])){
        $id_user = $_POST['id_user'];
        $name_user = $_POST['name_user'];
        $email_user = $_POST['email_user'];
        $birthday_user = $_POST['birthday_user'];
        $city_user = $_POST['city_user'];
        $user_role = $_POST['user_role'];

        // TODO: implement the validation of inputs

        $addquery = "UPDATE users
        SET Name_user = '$name_user', birthday='$birthday_user',email='$email_user',city=$city_user,user_role ='$user_role'
        WHERE ID=$id_user;";
        global $con;
        $result = mysqli_query($con,$addquery);
        header("Location: ..\project\dashboard\user.php");
    }
}
newDatauser();
?>