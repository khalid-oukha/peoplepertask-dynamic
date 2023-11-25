<?php

include(__DIR__."/../connection_database/database.php");

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
?>