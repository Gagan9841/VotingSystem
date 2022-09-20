<?php
include "connection.php";
// include "dashboard_ui.php";


$can_name= $_POST['cname'];
$can_faculty= $_POST['cfaculty'];
$can_gender=$_POST['cgender'];
$can_collegeId = $_POST['c-collegeId'];
$can_desc=$_POST['cdescription'];
$can_votinglist=$_POST['votingList'];
$can_catlist=$_POST['cat-list'];
// $can_img=$_FILES['can_img'];
$uploads_dir = './img';
$fileName = $_FILES['can_img']['name'];
$fileType = $_FILES['can_img']['type'];
$fileSize = $_FILES['can_img']['size'];


$sql="INSERT INTO `candidate_list` (`cname`, `cfaculty`, `c-collegeId`,`cdescription`,  `votingList`, `categoryList`,`can_img`) VALUES ('$can_name', '$can_faculty', '$can_collegeId','$can_desc', '$can_votinglist', '$can_catlist','$fileName')";
$res = mysqli_query($conn,$sql);
if(!$res){
    die("Unable to register ".mysqli_error($conn));
}
elseif($fileSize>50000000) {
    echo "sorry file size is invalid";
}

elseif(move_uploaded_file($_FILES["can_img"]["tmp_name"], "$uploads_dir/$fileName")) {
    header('location:candidate_List.php?success=true');
}

else {
    echo "The image failed to move <br><a href='./index.php'>back</a>";
}

 
?>
