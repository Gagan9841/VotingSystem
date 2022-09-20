<?php
// $now = time(); // Checking the time now when home page starts.
if (!isset($_SESSION)){
    session_start();
    

        unset($_SESSION['userLoginId']);
        // session_destroy();
        header("location:../guest/hmpg.php");
    
}
?>

