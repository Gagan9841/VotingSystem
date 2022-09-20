<head>
    <title>Homepage</title>
</head>
<?php
include "connection.php";
include "user_uisuccess.php";
if(isset($_SESSION['userLoginId']) && !empty($_SESSION['userLoginId'])) {
    ?>
    <div class="container">
        <div class="container-left-pane">
            <div class="user-name">
                <?php 
                //  echo "Hello ".$_SESSION['fullname']."";function greeting(){

    $timeOfDay = date('a');
    if($timeOfDay == 'am'){
        echo "Good morning, ".$_SESSION['fullname']."";
    }else{
        echo "Good afternon, ".$_SESSION['fullname']."";
    }

                ?>
            </div>
        </div>
        <div class="container-right-pane">
           <div class="election-heading">
                <span class="election">Election</span>
                <span class="day">Day</span>
            </div>
            <div class="election-content">
                <p>
                In todays world, voting system is very important step to elect a leader or head. So to represent the system we have created a website for this purpose. This is an application where user can register to vote and cast their vote in favor of candidate. The result of the voting will generate in the form of chart after election is done. Register today for upcoming election
                </p>
            </div>
        </div>
        </div>

    </div>
    <?php
} else{
    header("location:../guest/lgn.php");

    // echo $_SESSION['userLoginId'];
}
?>