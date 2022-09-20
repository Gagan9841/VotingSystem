<?php
if(isset($_SESSION['login_id']) && !empty($_SESSION['login_id'])) {

$fullname= $_POST['name'];
$Vusername= $_POST['username'];
$gender = $_POST['gender'];
$college_id= $_POST['college_id'];

// $dob= $_POST['dob'];
include "connection.php";
$sql = "INSERT INTO `voter_list` (`Full_name`, `Username`, `Gender`, `College_Id_No.`) VALUES ('$fullname', '$Vusername', '$gender', '$college_id')";
$res = mysqli_query($conn,$sql);
if(!$res){
    die("Unable to register ".mysqli_error($conn));
}
else{
    header('location:voterReg.php?success=true');
}
} 

else {
    header("location:admin_login.php");
} 
?>  