<?php
include(__DIR__."../../connection_database/database.php");
if(isset($_POST['sendid'])){
    getProject();
}

function getAllProjects(){
    $query = "select p.ID,p.Title,p.Description_project,u.Name_user,c.Name_categories from Projets p
    inner join Categories c on 
    p.ID_Categorie=c.ID
    inner join users u on
    p.ID_User = u.ID;";
    
    global $con ;
    $res = mysqli_query($con,$query);

    while($project = mysqli_fetch_assoc( $res )){
        $GLOBALS['projects'][]=$project;
    }
}
function add_project(){
    if(isset($_POST['add_project']))
    {
    $name_project = $_POST['Title'];
    $description = $_POST['Description_project'];
    $id_user = $_POST['ID_User'];
    $id_category = $_POST['ID_Categorie'];
    $addquery = "INSERT INTO Projets (Title, Description_project, ID_User, ID_Categorie)
    VALUES 
    ('$name_project', '$description',$id_user,$id_category);";
    global $con;
    $result = mysqli_query($con,$addquery);
        
    header("Location: /PeoplePerTask/project/dashboard/projects.php");
}

}

add_project();

function deleteProject(){
    if(isset($_POST['deleteId_project'])){
        $id = $_POST['deleteId_project'];
        $query = "delete from Projets where id = $id;";
        global $con ;
        $res = mysqli_query($con,$query);
        header("Location: /PeoplePerTask/project/dashboard/projects.php");

    }
}
deleteProject();
function getProject(){
    $id= $_POST['sendId'] ;
    $query = "select p.ID,p.Title,p.Description_project,u.Name_user,c.Name_categories from Projets p
    inner join Categories c on 
    p.ID_Categorie=c.ID
    inner join users u on
    p.ID_User = u.ID
    where p.ID= '$id';";

    global $con;
    $res = mysqli_query($con,$query);
    while($row = mysqli_fetch_assoc( $res )){
       echo json_encode ($row);
    }
}
?>
