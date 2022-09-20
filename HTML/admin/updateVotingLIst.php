<?php
if(isset($_SESSION['login_id']) && !empty($_SESSION['login_id'])) {

include "connection.php";
$votingId = $_GET['vid'];

$name= $_POST['name'];
$desc= $_POST['description'];
$organizer = $_POST['organizer'];
$start = $_POST['start'];
$end = $_POST['end'];


$sql ="UPDATE `voting_list` SET `name` = '$name', `description` = '$desc', `organizer` = '$organizer', `start` = '$start', `end` = '$end' WHERE `voting_list`.`votingId` = $votingId";
$res = mysqli_query($conn,$sql);
if(!$res){
    die("Unable to register ".mysqli_error($conn));
}
else{
    header('location:voting_list.php?success=true');
}

}
else{
    header("location:admin_login.php");
}
?>