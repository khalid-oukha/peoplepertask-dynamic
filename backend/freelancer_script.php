<?php

include(__DIR__."/../connection_database/database.php");

if(isset($_POST['sendId'])){
    getFreelancer();
}

function getAllFreelancer(){
    $query = "select f.ID,f.Name_freelance,f.Skill,u.email,u.birthday from freelances f
    inner join users u 
    on f.ID_user = u.ID;";

    global $con;
    $res = mysqli_query($con,$query);

    while($freelancer = mysqli_fetch_assoc( $res )){
        $GLOBALS['freelancers'][]=$freelancer;
    }
}

function addfreelancer(){
    if(isset($_POST['add_freelancers'])){
        $name_feerlancer = $_POST['name_freelancer'];
        $skill = $_POST['skill'];
        $ID_user = $_POST['ID_user'];
        $addquery = "INSERT INTO Freelances (Name_freelance, Skill, ID_user) 
        VALUES 
        ('$name_feerlancer', '$skill',$ID_user);";
        global $con;
        $result = mysqli_query($con,$addquery);
        header("Location: /PeoplePerTask/project/dashboard/freelancers.php");
    }
}
addfreelancer();

function deleteFreelancer(){
    if(isset($_POST['deleteId'])){
        $id_feerlancer = $_POST['deleteId'];
        $deletequery = "delete from Freelances where ID = '$id_feerlancer';";
        global $con;
        $result = mysqli_query($con,$deletequery);
        header("Location: /PeoplePerTask/project/dashboard/freelancers.php");
    }
}
deleteFreelancer();
function getFreelancer(){
    $id= $_POST['sendId'] ;
    $query = "select f.ID, f.Name_freelance, f.Skill, u.email,
    u.birthday from freelances f
    inner join users u 
    on f.ID_user = u.ID
    where f.ID = '$id'
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