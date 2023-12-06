<?php

require "../../connection_database/database.php";

// if($_SESSION['role'] != 'admin'){
//     header('Location: /PeoplePerTask/project/pages/index.php');
// }

if ($_SESSION['role'] == 'user') {
    $id_user = $_SESSION['id'];
    $query = "SELECT u.Name_user,u.email,u.created_at,u.phone,u.birthday,v.ville FROM users u 
    JOIN ville v 
    ON v.id=u.city
    WHERE u.ID = $id_user;";
    global $con;
    $res = mysqli_query($con, $query);

    // Check if the query was successful and data was fetched
    if ($res && mysqli_num_rows($res) > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
            $created_at = $row['created_at'];
            $birthday = $row['birthday'];
            $phone = $row['phone'];
            $ville = $row['ville'];
            $username = $row['Name_user'];
        }
    } else {
        echo "No data found for the user.";
    }

    function editprofile()
    {
        $id = $_SESSION['id'];
        $username = $_POST['username'];
        $birthday = $_POST['birthday'];
        $city = $_POST['city_user'];
        $phone = $_POST['phone'];
        $addquery = "UPDATE users u
        SET u.Name_user='$username',u.birthday='$birthday',u.city='$city',phone='$phone'
        WHERE ID=$id;";
        global $con;
        $result = mysqli_query($con, $addquery);
        header("Location: profile.php");
    }
    if (isset($_POST['editfreelancer'])) {
        editprofile();
    }
 
 }   
















// if user is a freelancer :

if ($_SESSION['role'] == 'freelancer') {
    $id_user = $_SESSION['id'];
    $query = "SELECT u.Name_user,u.email,u.user_role,u.created_at,u.phone,f.Name_freelance,f.ID,f.job,f.description,u.birthday,v.ville FROM users u 
INNER JOIN freelances f 
ON u.ID=f.ID_user
JOIN ville v 
ON v.id=u.city
WHERE u.ID = $id_user;";
    global $con;
    $res = mysqli_query($con, $query);

    // Check if the query was successful and data was fetched
    if ($res && mysqli_num_rows($res) > 0) {
        // Fetching data into variables
        while ($row = mysqli_fetch_assoc($res)) {
            $created_at = $row['created_at'];
            $freelanceName = $row['Name_freelance'];
            $freelancejob = $row['job'];
            $fr_description = $row['description'];
            $birthday = $row['birthday'];
            $phone = $row['phone'];
            $ville = $row['ville'];
            $username = $row['Name_user'];
            if ($_SESSION['role'] == 'freelancer') {
                $_SESSION['id_freelance'] = $row['ID'];
            }
        }
    } else {
        echo "No data found for the user.";
    }

    //get all skills for a freelancer
    $id_freelancer = $_SESSION['id_freelance'];
    $query = "SELECT s.skill_name FROM freelancer_skills fr INNER JOIN
freelances f
ON fr.freelancer_id=f.ID
INNER JOIN skills s
ON s.skill_id=fr.skill_id
WHERE f.ID=$id_freelancer;";
    global $con;
    $res = mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($res)) {
        $GLOBALS['skills'][] = $row;
    }


    //add a skill for freelancer
    if (isset($_POST['addskill'])) {
        $id_freelancer = $_SESSION['id_freelance'];
        $id_skill = $_POST['freelancer_skill'];
        $addskill = "INSERT INTO freelancer_skills(`freelancer_id`, `skill_id`) 
    VALUES ('$id_freelancer','$id_skill');";
        $res = mysqli_query($con, $addskill);
        header("Location: profile.php");
    }



    //add a skill for freelancer
    function editprofile()
    {

        $id_freelancer = $_SESSION['id_freelance'];
        $username = $_POST['username'];
        $fname = $_POST['fname'];
        $job = $_POST['job'];
        $birthday = $_POST['birthday'];
        $city = $_POST['city_user'];
        $description = $_POST['description'];
        $addquery = "UPDATE Freelances AS f
        INNER JOIN users u ON u.ID = f.ID_user
        SET f.Name_freelance = '$fname',f.description='$description',u.Name_user='$username',f.job='$job',u.birthday='$birthday',u.city='$city'
        WHERE f.ID=$id_freelancer;";
        global $con;
        $result = mysqli_query($con, $addquery);
        header("Location: profile.php");
    }
    if (isset($_POST['editfreelancer'])) {
        editprofile();
    }
}
