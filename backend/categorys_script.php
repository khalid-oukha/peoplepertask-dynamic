<?php

include(__DIR__."/../connection_database/database.php");

function getAllCategorys(){
    $query = "select c.ID,c.Name_categories,count(p.ID_Categorie) as 'number of projects' from Categories c
    inner join Projets p 
    on c.ID = p.ID_Categorie
    group by c.id;";

    global $con;
    $res = mysqli_query($con,$query);

    while($category = mysqli_fetch_assoc( $res )){
        $GLOBALS['categorys'][]=$category;
    }
}


function addcategorys(){
    
}