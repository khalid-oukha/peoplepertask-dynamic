<?php

include(__DIR__ . "/../../../connection_database/database.php");


if(isset($_POST['query'])){
    $input = $_POST['query'];
    $query = "select p.ID,p.Title,p.Description_project,p.budget,u.Name_user,c.Name_categories from Projets p
    left join Categories c on 
    p.ID_Categorie=c.ID
    inner join users u on
    p.ID_User = u.ID
    where p.Title like '%$input%';";

    global $con;
    $res = mysqli_query($con, $query);
    $projects = [];


    while($row = mysqli_fetch_assoc($res)) {
        $projects[] = $row;
    }

    echo json_encode($projects);
}