<?php

include(__DIR__."/../connection_database/database.php");
if(isset($_POST['categorieId'])){
    getcategorie();
}
function getAllCategorys(){
    $query = "select c.ID,c.Name_categories,count(p.ID_Categorie) as 'number of projects' from Categories c
    left JOIN Projets p 
    on c.ID = p.ID_Categorie
    group by c.id;";

    global $con;
    $res = mysqli_query($con,$query);

    while($category = mysqli_fetch_assoc( $res )){
        $GLOBALS['categorys'][]=$category;
    }
}


function addcategory(){
    if(isset($_POST['add_category'])){
        $category_name = $_POST['category_name'];
        if(!empty($_POST['ID_Categorie'])){
            $ID_Categorie = $_POST['ID_Categorie'];
            $addquery = "INSERT INTO categories(Name_categories, ID_Categorie) 
                        VALUES
                            ('$category_name', $ID_Categorie);
                        ";
        }else {
            $addquery = "INSERT INTO categories(Name_categories) 
                        VALUES
                            ('$category_name');";
        }
        
        global $con;
        $result = mysqli_query($con,$addquery);
        header("Location: /PeoplePerTask/project/dashboard/categorys.php");
    }
}
addcategory();

function deleteCategorie(){
    if(isset($_POST['deletesubmit'])){
        $deleteId = $_POST['deleteId'];
        $query = "DELETE FROM categories WHERE ID=$deleteId";
        global $con;
        $res = mysqli_query($con,$query);
        header("Location: /PeoplePerTask/project/dashboard/categorys.php");
    }
}
deleteCategorie();

function getcategorie(){
    $id= $_POST['categorieId'] ;
    $query = "SELECT * from categories WHERE id=$id;";

    global $con;
    $res = mysqli_query($con,$query);
    while($row = mysqli_fetch_assoc( $res )){
       echo json_encode ($row);
    }
}
function newDatacategorie(){
    if(isset($_POST['edit_category'])){
        $ID = $_POST['Id'];
        $ID_Categorie = $_POST['ID_Categorie'];
        $category_name = $_POST['category_name'];
        if(!empty($_POST['ID_Categorie'])){
            $editquery = "UPDATE categories
            SET Name_categories ='$category_name',ID_Categorie='$ID_Categorie'
            WHERE ID ='$ID';";

        }else {
            $editquery = "UPDATE categories SET Name_categories='$category_name' 
            WHERE ID ='$ID'
            ;"; 
        }
        
        global $con;
        $result = mysqli_query($con,$editquery);
        header("Location: /PeoplePerTask/project/dashboard/categorys.php");
    }
}
newDatacategorie();