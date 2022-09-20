<?php


$category= $_POST['categoryName'];
$desc= $_POST['description'];
$votingList = $_POST['votingList'];
include "connection.php";
$sql = "INSERT INTO `category_list` (`category`, `cat-description`, `votingList`) VALUES ('$category', '$desc','$votingList')";
$res = mysqli_query($conn,$sql);
if(!$res){
    die("Unable to register ".mysqli_error($conn));
}
else{
    header('location:categoryList.php?success=true');
}


?>  
