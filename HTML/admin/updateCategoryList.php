<?php
if(isset($_SESSION['login_id']) && !empty($_SESSION['login_id'])) {

include "connection.php";
$cat_id = $_GET['cat-id'];
$category= $_POST['categoryName'];
$desc= $_POST['description'];
$votingList = $_POST['votingList'];


// $sql ="UPDATE `category_list` SET `category` = '$cat_id', `cat-description` = '$desc',  `votingList` = '$votingList' WHERE `voting_list`.`votingId` = $votingId";
$sql = "UPDATE `category_list` SET `category_Id` = '$cat_id', `category` = '$category', `cat-description` = '$desc', `votingList` = '$votingList' WHERE `category_list`.`category_Id` = $cat_id";
$res = mysqli_query($conn,$sql);
if(!$res){
    die("Unable to register ".mysqli_error($conn));
}
else{
    header('location:categoryList.php?success=true');
}

}
else{
    header("location:admin_login.php");
}
?>