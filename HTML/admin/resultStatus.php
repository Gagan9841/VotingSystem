<?php
if(isset($_SESSION['login_id']) && !empty($_SESSION['login_id'])) {

include "connection.php";
$votingid=$_POST['votingList'];
if(isset($_POST['publishResult'])){

$resultStatus = $_POST['publishRes'];
$sql ="UPDATE `voting_list` SET `resultStatus` = '$resultStatus' WHERE `voting_list`.`votingId` = '$votingid'";
$res = mysqli_query($conn,$sql);
if(!$res){
    die("Unable to register ".mysqli_error($conn));
}
else{
    header('location:results.php?success=true');
    // echo "<br>status: $resultStatus <br> sql: $sql <br>";
    // echo "voting Id: $votingid ";
}
}
elseif(isset($_POST['unPublish'])){
    
    $un_pub_stat = $_POST['resUnpublish'];
    $un_pubsql ="UPDATE `voting_list` SET `resultStatus` = '$un_pub_stat' WHERE `voting_list`.`votingId` = '$votingid'";
    $un_pubRes = mysqli_query($conn,$un_pubsql);
    if(!$un_pubRes){
        die("Unable to register ".mysqli_error($conn));
    }
    else{
        header('location:results.php?success=true');
        // echo "<br>status: $un_pub_stat <br> sql: $un_pubsql <br>";
        // echo "voting Id: $votingid ";
        
    }
}


}
else{
    header("location:admin_login.php");
}
?>