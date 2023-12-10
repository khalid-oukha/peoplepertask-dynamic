<?php

include(__DIR__."/../connection_database/database.php");

function statistic_count($column,$table){
    $query = "select count(*) AS $column  from $table;";
    global $con;
    $res = mysqli_query($con,$query);
    if($res){
        $row = mysqli_fetch_assoc($res);
        return $row["$column"];
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

function user_projects(){
    $query = "SELECT u.Name_user, count(p.ID_User) as 'number of projects' from projets p
    inner join users u 
    on p.ID_User=u.ID
    WHERE Date(p.created_at) = CURDATE()
    group by u.Name_user
    ORDER BY count(p.ID_User) desc
    LIMIT 5;";
    global $con ;
    $GLOBALS['users']=[];
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

