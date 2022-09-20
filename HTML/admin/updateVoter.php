<?php
if(isset($_SESSION['login_id']) && !empty($_SESSION['login_id'])) {

include "connection.php";

$fullname= $_POST['name'];
$Vusername= $_POST['username'];
$gender = $_POST['gender'];
$college_id= $_POST['college_id'];
$pw = md5($_POST['password']);

  

$sql ="UPDATE `voter_list` SET `Full_name` = '$fullname', `Username` = 'Vusername', `Gender` = '$gender', `College_Id_No.` = '$college_id', `password` = '$pw' WHERE `voter_list`.`College_Id_No.` = '$college_id'";

$res = mysqli_query($conn,$sql);
if(!$res){
    die("Unable to register ".mysqli_error($conn));
}
else{
    header('location:voters.php?success=true');
}

}
else{
    header("location:admin_login.php");
}
?>