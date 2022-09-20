<?php
include "connection.php";
// session_start(); 

if (isset($_POST['name']) && isset($_POST['gender']) && isset($_POST['college_id']) && isset($_POST['password']) && isset($_POST['cpassword'])) {

    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }

    $check_sql="Select * from voter_list";
    $check_res=mysqli_query($conn,$check_sql);
    $row=mysqli_fetch_assoc($check_res);
    $user_cid= $row['College_Id_No.'];

    $fullname= validate($_POST['name']);
$gender = validate($_POST['gender']);
$college_id= validate($_POST['college_id']);
$pw = validate($_POST['password']);
$cpw = validate($_POST['cpassword']);


if(empty($fullname)) {

        header("Location: ../guest/rgstr.php?error=Enter your fullname");

        exit();

    }
    else if(empty($gender)){

        header("Location: ../guest/rgstr.php?error=Please mention your gender");

        exit();

    }
    else if(empty($pw)){

        header("Location: ../guest/rgstr.php?error=Password is required");

        exit();

    }
    else if(empty($cpw)){

        header("Location: ../guest/rgstr.php?error= Confirm Password is required");

        exit();

    }
    else if($pw != $cpw){
        header("Location: ../guest/rgstr.php?error= Password does not match");

        exit();

    }

    else if($user_cid==$college_id){

        header("Location: ../guest/rgstr.php?error=User already exist");

        exit();
    }
    else{
        $sql = "INSERT INTO `voter_list` (`Full_name`,  `Gender`, `College_Id_No.`, `password`) VALUES ('$fullname', '$gender', '$college_id','$pw')";
        $res = mysqli_query($conn,$sql);
        if(!$res) {
            die("Unable to register".mysqli_error($conn));
        }
        else{
            header('location:../guest/lgn.php?success=true');
        }
    }

}
else if(empty($fullname)&&empty($gender)&&empty($college_id)&&empty($pw)&&empty($cpw)) {

    header("Location: ../guest/rgstr.php?error=All fields are required!");

    exit();

}
else
    die();

