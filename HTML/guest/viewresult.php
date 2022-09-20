<?php
include "connection.php";
session_start();
if(!empty($_SESSION['login_id'])){
    if(!isset($_SESSION['login_id'])){
        // $user=$_SESSION['username'];
        header("location:lgn.php");
}}
include "user_ui.php";

?>
