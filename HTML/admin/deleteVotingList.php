<?php
if(isset($_SESSION['login_id']) && !empty($_SESSION['login_id'])) {

$votingId = $_GET['votingId'];
include "connection.php";
$sql = "DELETE FROM `voting_list` WHERE `votingId` = $votingId";

$res = mysqli_query($conn, $sql);

if(!$res){
    die("Failed to delete".mysqli_error($conn));
}
else{
    header('location:voting_list.php?delete=true');
}
}
else {
    header("location:admin_login.php");
} 
?>