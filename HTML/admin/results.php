<?php
    include "dashboard_ui.php";
if(isset($_SESSION['login_id']) && !empty($_SESSION['login_id'])) {
?>
<head>
    <title>Candidate List</title>
</head>
<link rel="stylesheet" href="../../css/dashboard.css">
<link rel="stylesheet" href="../../css/voting_list.css">
<link rel="stylesheet" href="../../css/font-awesome-min.css">
<script src="../../js/all.js"></script>
<script src="../../js/jquery.js"></script>
<script src="../../js/font-awesome-min.js"></script>

<div class="backdrop">

    <?php
    if (isset($_GET["success"])) {
    ?>

        <div class="success" id="successMessage">
            <?php
            if (isset($_GET["success"])) {
                if (isset($_GET['success'])) {
                    echo "You are sucessfully registered.";
                }
            }
            ?>
            <?php
            if (isset($_GET['delete'])) { {
                    echo "Category deleted successfully.";
                }
            }
            ?>
        </div>
    <?php
    }
    ?>
    <div class="voters">
    <div class="add-btn">
            <button class="open-button" onclick="openForm()"><i class="fa-solid fa-upload"></i>&nbsp;Publish Result</button>
        </div>
        <table class="voters-table" border="1" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th>SN</th>
                    <th>Candidate Name</th>
                    <th>Voting List</th>
                    <th>Position</th>
                    <th>Total Vote</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "connection.php";
                $sql = "select * from vote left join voting_list on voting_list.votingId= vote.votingId left join category_list on category_list.category_Id=vote.categoryId left join candidate_list on candidate_list.cid=vote.candidateId GROUP BY candidateId having count(*)>=1";
                //  $sql = "SELECT * FROM candidate_list ORDER BY cid";
                $res = mysqli_query($conn, $sql);
                if (mysqli_num_rows($res) > 0) {
                    $sn = 1;
                    while ($row = mysqli_fetch_array($res)) {
                        $can_id= $row['candidateId'];
                        echo "<tr>";
                        echo "<td>" . $sn . "</td>";
                        echo "<td>" . $row['cname'] . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['category'] . "</td>";
                        $query= "select sum(voteCount) from vote where `candidateId` = $can_id";
                        $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_array($result)){
                                echo "<td>".$row['sum(voteCount)']."</td>";
                            } 
                        $sn++;
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- <div class="data-analysis">
    <div class="voters">
        <table class="voters-table" border="1" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th>SN</th>
                    <th>Candidate Name</th>
                    <th>Voting List</th>
                    <th>Position</th>
                    <th>Total Vote</th>
                </tr>
            </thead>
            <tbody>
        <?php
       
        ?>
        </tbody>
            </table>
    </div> -->
</div>
</body>
</head>
</html>
<div class="register-pane" id="myForm">

    <div class="close-pane">
        <input type="button" class="sbutton-cancel" value="X" onclick="closeForm()">
    </div>
    <?php
                $sql = "SELECT * FROM vote left join voting_list on vote.votingId = voting_list.votingId GROUP BY `name`;";
                ?>
        <?php
        $res = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($res);
        ?>
        <form action="resultStatus.php" method="POST" >
        <h1>Choose voting List</h1>
        <div class="form-group"></div>
            Voting List:
            <select class="select_votingList" id="votingList" name="votingList" required>
                <option disabled selected>-- Select Voting List --</option>
               <?php
                $res = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($res)) {
                    echo " <option value='" . $row['votingId'] . "'>" . $row['name'] . "</option>
                    ";  // displaying data in option menu
                }
                ?>
            </select>
            <div class="form-group">
                <input type="hidden" name="publishRes" value="1">
                <button type="submit" name="publishResult" class ="sbutton" >Publish</button>
                <input type="hidden" name="resUnpublish" value="0">
                <button type ="submit" name="unPublish" class="sbutton">Hide Result</button>
            </div>
        </div>
    </form>
</div>

<?php
}
else{
    header("location:admin_login.php");
}
?>
    