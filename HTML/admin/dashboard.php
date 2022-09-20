<?php
// session_start();
include "dashboard_ui.php";
if(isset($_SESSION['login_id']) && !empty($_SESSION['login_id'])) {
    
   ?>
   <script src="../../js/all.js"></script>
<script src="../../js/jquery.js"></script>
<link rel="stylesheet" href="../../css/font-awesome-min.css">
<script src="../../js/font-awesome-min.js"></script>
<div class="container-main">
    <div class="container-content">
        <div class="content">
            <div class="main-content">
                <span>Total Voter</span>
                <div class="total_voter">
                    <?php
                        include "connection.php";
                            foreach ($conn -> query('select count(*) from voter_list')as $row) {
                                echo $row['count(*)'];
                            }
                        ?>
                </div>
            </div>
            <div class="main-content">
                <span>Total Candidate</span>
                <div class="total_voter">
                    <?php
                        include "connection.php";
                            foreach ($conn -> query('select count(*) from candidate_list')as $row) {
                                echo $row['count(*)'];
                            }
                        ?>
                </div>
            </div>
            <div class="main-content">
                <span>Voting List</span>
                <div class="total_voter">
                    <?php
                        include "connection.php";
                            foreach ($conn -> query('select count(*) from voting_list')as $row) {
                                echo $row['count(*)'];
                            }
                        ?>
                </div>
            </div>
            <div class="main-content">
                <span>Active Voting List</span>
                <div class="total_voter">
                    <?php
                        include "connection.php";
                            foreach ($conn -> query('select count(*) from voting_list WHERE end>now() ')as $row) {
                                echo $row['count(*)'];
                            }
                        ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php 

}
// else{
//     header("location:admin_login.php");
// }
?>