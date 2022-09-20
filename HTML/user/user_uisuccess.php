
<?php
include "connection.php";
session_start();
if((isset($_SESSION['userLoginId'])) || (isset($_SESSION['fullname'])) && (!empty($_SESSION['userLoginId'])) ) {
    // $user=$_SESSION['fullname'];
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hmpg</title>
    <link rel="stylesheet" href="../../css/hmpg.css">
    <link rel="stylesheet" href="../../css/candidate.css">
<link rel="stylesheet" href="../../css/font-awesome-min.css">
<link rel="stylesheet" href="../../css/fontawesome-free-6.0.0-web/css/all.min.css">


<script src="../../js/font-awesome-min.js"></script>

    
</head>

<body>
    <!-- <img class="background" src="../../image/bg.jpg" alt="background image"> -->
    <div class="header-sec">
    <div class="center-heading">
                <span class="election">Online Voting</span>
                <span class="day">System</span>
</div>
        <div class="right-header">
        </div>
        <div class="navigation">
            <div class="logo">
                <a href="../HTML/hmpg.html"><img src="../../img/logow.png" alt="logo"></a>
            </div>
        
            <nav class="nav-content">
                <ul>
                    <li> <a href="hmpgsuccess.php"> Home</a></li>
                    <li><a href="#">Result</a>
                    <ul class="dropdown-votingList" id="voting-list">
                            <?php 
                 include "result_dropdown.php";
                             ?></li>
                        </ul>
                </li>
                    <li><a href="cnditate.php">Candidates</a></li>
                    <li><a href="#">Vote Now</a>
                        <ul class="dropdown-votingList" id="voting-list">
                            <?php 
                 include "votinglist_dropdown.php";
                             ?></li>
                        </ul>
                    </li>
                </ul>
                <div class="nav-right-content">
                       <div class="user"><i class="fa-solid fa-user"></i>&nbsp;<?php  echo $_SESSION['fullname']; ?></div> 
                      <div><button class="logout-btn" id="logout">Logout&nbsp;<i class="fa-solid fa-right-from-bracket"></i></button></div>
                      

            </nav>
            
              
        </div>
    </div>
    
</body>
<?php
}  
?>
<script type="text/javascript">
    document.getElementById("logout").onclick = function () {
        location.href = "logout.php";
    };
</script>

