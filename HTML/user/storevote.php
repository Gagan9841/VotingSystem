<?php
include "connection.php";
session_start();
if(!empty($_SESSION['login_id'])){
    if(!isset($_SESSION['login_id'])){
        header("location:lgn.php");
    }}
    // $user=$_SESSION['username'];
    $candidate_id = $_GET['can-id'];
    $candidate_name = $_GET['can-name'];
    $voting_list = $_GET['vid'];
    $category_id = $_GET['cat-id'];
    $user = $_POST['user'];
    $sql = "SELECT * from voted where user='$user' AND `cat`='$category_id';";
    // $sql="SELECT `voter_list`.*, `category_list`.* FROM `voter_list`,`category_list` WHERE `voter_list`.`Status`= '1' AND `category_list`.`category_Id`=$category_id;;";
    $res = mysqli_query($conn,$sql);
    $num_rows=mysqli_num_rows($res);
    if ($num_rows>0) {
        header("location:votenow.php?votingId=$voting_list&voted=true");
    }
    
    else{
        $vote = 1;
        $ins_sql= "INSERT INTO `voted`(`user`,`cat`) VALUES('$user','$category_id');";
        $ins_sql .= "INSERT INTO `vote` (`candidateId`, `votingId`, `categoryId`, `voteCount`) VALUES ('$candidate_id', '$voting_list', '$category_id', '$vote');";
        // $main_sql=$ins_sql.";".$ins_vote_sql;
        $ins_res= mysqli_multi_query($conn,$ins_sql);
        // // $ins_vote_res= mysqli_query($conn,$ins_vote_sql);
        // $ins_rows=mysqli_num_rows($ins_res);
        if($ins_res){
            header('location:votenow.php?votingId='.$voting_list.'&voteSuccess=true');
        }
        mysqli_close($conn);
    }
?> 