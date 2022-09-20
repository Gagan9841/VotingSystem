<?php
session_start();
if(isset($_SESSION['login_id']) && !empty($_SESSION['login_id'])) {
   $admin_user=$_SESSION['login_id'];
   
   ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<link rel="stylesheet" href="../../css/dashboard.css">
<!-- <link rel="stylesheet" href="../../css/all.css"> -->


<body>
    <div class="top-navbar">
        <div class="nav-content">
            <div class="nav-left-content">
                <div class="logo">
                    <img src="../../img/logow.png" alt="logo">
                </div>
            </div>
            <div class="nav-center-content">
                <div class="adm_greet">
                <li><a><?php echo "Hello ".$_SESSION['login_id'].""; ?></a></li>
                </div>
                <ul type="none">
                    <li> <a href="#"> Dashboard </a></li>
                    </ul>
                    
            </div>
            <div class="nav-right-content">
                <ul type="none">
                    <li><a href="logout.php?logout=true"><i class="fa-solid fa-right-from-bracket"></i>&nbsp;Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="left-panel">
        <div class="left-panel-content">
            
            <ul type="none">
            
            <li><a href="dashboard.php"><i class="fa-solid fa-list-squares"></i>&nbsp;Dashboard</a></li>
                <li><a href="voting_list.php"><i class="fa-solid fa-vote-yea"></i>&nbsp;Voting List</a></li>
                <li><a href="categoryList.php"><i class="fa-solid fa-clipboard-check"></i>&nbsp;Category List</a></li>
                <li><a href="candidate_list.php"><i class="fa-solid fa-people-arrows-left-right"></i>&nbsp;Candidates</a></li>
                <li><a href="voters.php"><i class="fa-solid fa-users"></i>&nbsp;Voters</a></li>
                <li><a href="results.php"><i class="fa-solid fa-square-poll-vertical"></i>&nbsp;Results</a></li>
            </ul>
        </div>
    </div>
</body>

</html>
<?php

}
else{
    header("location:../admin_login.php");
}
?>