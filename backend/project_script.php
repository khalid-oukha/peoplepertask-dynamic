<?php
include(__DIR__."../../connection_database/database.php");
if(isset($_POST['projectId'])){
    getProject();
}
if(isset($_POST['deleteId_project'])){
    deleteProject();
}

function getAllProjects(){
    $query = "select p.ID,p.Title,p.Description_project,u.Name_user,c.Name_categories from Projets p
    left join Categories c on 
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
   
        $id = $_POST['deleteId_project'];
        $query = "DELETE FROM projets WHERE Id='$id';";
        global $con ;
        $res = mysqli_query($con,$query);
        header("Location: /PeoplePerTask/project/dashboard/projects.php");


}


function getProject(){
    $id= $_POST['projectId'] ;
    $query = "select p.ID,p.Title,p.Description_project,u.Name_user,p.ID_Categorie from Projets p
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

function newDataproject(){
    if(isset($_POST['new_project'])){
        $id = $_POST['id_project'];
        $title = $_POST['newtitle'];
        $description = $_POST['Description_project'];
        $newID_Categorie = $_POST['newID_Categorie'];
        $editquery = "UPDATE projets
        SET Title ='$title',Description_project='$description',ID_Categorie='$newID_Categorie'
        WHERE ID ='$id';";
        global $con;
        $result = mysqli_query($con,$editquery);
        header("Location: /PeoplePerTask/project/dashboard/projects.php");
    }
}

newDataproject();
?>
