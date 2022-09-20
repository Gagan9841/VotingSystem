<?php


$category_Id = $_GET['category_Id'];
include "connection.php";
$sql = "DELETE FROM `category_list` WHERE `category_Id` = $category_Id";

$res = mysqli_query($conn, $sql);

if(!$res){
    die("Failed to delete".mysqli_error($conn));
}
else{
    header('location:categoryList.php?delete=true');
}

?>