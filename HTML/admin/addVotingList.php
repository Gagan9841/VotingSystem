<?php
if(isset($_SESSION['login_id']) && !empty($_SESSION['login_id'])) {

$name= $_POST['name'];
$desc= $_POST['description'];
$organizer = $_POST['organizer'];
$start = $_POST['start'];
$end = $_POST['end'];
// $dob= $_POST['dob'];
include "connection.php";
$sql = "INSERT INTO `voting_list` (`name`, `description`, `organizer`, `start`, `end`) VALUES ('$name', '$desc', '$organizer', '$start', '$end')";
$res = mysqli_query($conn,$sql);
if(!$res){
    die("Unable to register ".mysqli_error($conn));
}
else{
    header('location:voting_list.php?success=true');
}
} 

else {
    header("location:admin_login.php");
} 
?>  
