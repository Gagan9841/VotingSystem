<?php


$can_id = $_GET['c-collegeId'];
include "connection.php";
// $sql = "DELETE FROM `category_list` WHERE `category_Id` = $category_Id";
 $sql = "DELETE FROM `candidate_list` WHERE `c-collegeId` = $can_id";

$res = mysqli_query($conn, $sql);

if(!$res){
    die("Failed to delete".mysqli_error($conn));
}
else{
    header('location:candidate_list.php?delete=true');
}

?>