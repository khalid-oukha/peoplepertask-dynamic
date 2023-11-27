<?php

include(__DIR__."/../connection_database/database.php");

function getAlltestimonials(){
    $query = "SELECT t.ID,t.testimonial_Message,u.Name_user,t.created_at FROM testimonial t
    INNER JOIN users u
    ON t.ID=u.ID;";

    global $con;
    $res = mysqli_query($con,$query);

    while($row = mysqli_fetch_assoc( $res )){
        $GLOBALS['testimonials'][]=$row;
    }
}