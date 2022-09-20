<?php
if(isset($_SESSION['login_id']) && !empty($_SESSION['login_id'])) {

include "connection.php";

$can_name= $_POST['cname'];
$can_faculty= $_POST['cfaculty'];
$can_gender=$_POST['cgender'];
$can_collegeId = $_POST['c-collegeId'];
$can_desc=$_POST['cdescription'];
$can_agenda=$_POST['agenda'];
$can_votinglist=$_POST['votingList'];

$can_catlist=$_POST['cat-list'];
// $can_img=$_FILES['can_img'];
$uploads_dir = './img';
$fileName = $_FILES['can_img']['name'];
$fileType = $_FILES['can_img']['type'];
$fileSize = $_FILES['can_img']['size'];


$sql ="UPDATE `candidate_list` SET `cname` = '$can_name', `cfaculty` = '$can_faculty ', `c-collegeId` = '$can_collegeId', `votingList` = '$can_votinglist', `categoryList` = '$can_catlist', `cdescription` = '$can_desc', `cagenda` = '$can_agenda', `can_img` = '$fileName' WHERE `candidate_list`.`c-collegeId` = $can_collegeId";
$res = mysqli_query($conn,$sql);
if(!$res){
    // die("Unable to register ".mysqli_error($conn));
    print_r($_POST);
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

}
else{
    header("location:admin_login.php");
}
?>
