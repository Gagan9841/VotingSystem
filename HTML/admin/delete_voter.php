<?php
if(isset($_SESSION['login_id']) && !empty($_SESSION['login_id'])) {

$college_id = $_GET['College_Id_No'];
include "connection.php";
$sql = "DELETE FROM `voter_list` WHERE `College_Id_No.` = '$college_id';";

$res = mysqli_query($conn, $sql);

if(!$res){
    die("Failed to delete".mysqli_error($conn));
}
else{
    header('location:voters.php?delete=true');
}
}
else {
    header("location:admin_login.php");
} 
?>