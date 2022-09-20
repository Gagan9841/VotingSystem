<?php

$server = 'localhost';
$username = 'root';
$password = '';
$dbname = 'online_voting';

$conn = mysqli_connect($server,$username,$password,$dbname);
if(!$conn){
    die ("Conection Failed".mysqli_connect_error($conn));
}
?>