<?php

include(__DIR__."/../connection_database/database.php");

function project_count(){
    $query = "select count(*) AS project_count  from projets;";
    global $con;
    $res = mysqli_query($con,$query);
    if($res){
        $row = mysqli_fetch_assoc($res);
        return $row['project_count'];
    }
    else{
        return 0;
    }
}

function users_count(){
    $query = "select count(*) as users_count from users;";
    global $con ;
    $res = mysqli_query($con,$query);
    if($res){
        $row = mysqli_fetch_assoc($res);
        return $row['users_count'];
    }
    else{
        return 0;
    }
    
}
function freelancers_count(){
    $query = "select count(*) as freelancers_count from freelances;";
    global $con ;
    $res = mysqli_query($con,$query);
    if($res){
        $row = mysqli_fetch_assoc($res);
        return $row['freelancers_count'];
    }
    else{
        return 0;
    }
    
}
function categorys_count(){
    $query = "select count(*) as Categories_count from Categories;";
    global $con ;
    $res = mysqli_query($con,$query);
    if($res){
        $row = mysqli_fetch_assoc($res);
        return $row['Categories_count'];
    }
    else{
        return 0;
    }
    
}
function live_offers_count(){
    $query = "select count(*) as Offres_count from Offres
    where Deadline >= CURDATE();";
    global $con ;
    $res = mysqli_query($con,$query);
    if($res){
        $row = mysqli_fetch_assoc($res);
        return $row['Offres_count'];
    }
    else{
        return 0;
    }
    
}
function offers_count(){
    $query = "select count(*) as Offres_count from Offres;";
    global $con ;
    $res = mysqli_query($con,$query);
    if($res){
        $row = mysqli_fetch_assoc($res);
        return $row['Offres_count'];
    }
    else{
        return 0;
    }
    
}
function user_projects(){
    $query = "SELECT u.Name_user, count(p.ID_User) as 'number of projects' from projets p
    inner join users u 
    on p.ID_User=u.ID
    WHERE Date(p.created_at) = CURDATE()
    group by u.Name_user
    ORDER BY count(p.ID_User) desc
    LIMIT 5;";

    global $con ;
    
    $res = mysqli_query($con,$query);
    if($res){
        if(mysqli_num_rows($res)>0){
            while($top_usersperday = mysqli_fetch_assoc( $res )){
            $GLOBALS['users'][]=$top_usersperday;
            }
        }
    }
    else{
        echo 'there is no projects today';
    }

    
}

