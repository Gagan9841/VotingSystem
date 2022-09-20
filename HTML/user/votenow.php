<?php
include "connection.php";
include "user_uisuccess.php";
if (isset($_SESSION['userLoginId']) && !empty($_SESSION['userLoginId'])) {
?>
    <script src="../../js/jquery.js"></script>
    <link rel="stylesheet" href="../../css/font-awesome-min.css">
<link rel="stylesheet" href="../../css/fontawesome-free-6.0.0-web/css/all.min.css">

<script src="../../js/font-awesome-min.js"></script>
    <?php
    ?>

    <div class="container">

        <?php
        if (!empty($_GET)) {
            if (!empty($_GET['voteSuccess'])) {
                echo "Voted Successfully";
            }
        }
        if (!empty($_GET)) {
            if (!empty($_GET['voted'])) {
                echo "You have already voted this category.";
            }
        }

        ?>
        <div class="votinglist-name">
            <h2>
                <?php
                $votingid = $_GET['votingId'];
                $sql = "select * from candidate_list left join voting_list on voting_list.votingId= candidate_list.votingList left join category_list on category_list.category_Id=candidate_list.categoryList where votingId=$votingid";
                $res = mysqli_query($conn, $sql);
                if (mysqli_num_rows($res) > 0) {
                    $row = mysqli_fetch_assoc($res);
                    echo $row['name'] . "</br>";
                }
                ?>
            </h2>

        </div>

        <div class="candidate-row">
            <?php
            include "connection.php";
            $votingid = $_GET['votingId'];
            $sql = "select * from candidate_list left join voting_list on voting_list.votingId= candidate_list.votingList left join category_list on category_list.category_Id=candidate_list.categoryList where votingId=$votingid AND voting_list.end>now() Order by category_Id";
            $res = mysqli_query($conn, $sql);
            if (mysqli_num_rows($res) > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
                    $categoryId = $row['category_Id'];
                    $user = $_SESSION['userLoginId'];
                    $voted_sql = "SELECT * from voted where user='$user' AND `cat`= '$categoryId' ;";
                    $res_voted = mysqli_query($conn, $voted_sql);
                    $num_rows = mysqli_num_rows($res_voted);
                    echo "<div class=\"candidate-col\">";
                    echo "<div class=\"candidate-detail\">";
                    echo "<div class'catName'>
                    <h3 class='catName'>" . $row['category'] . " </h3> 
                    </div>";
                    echo "<div class=\"candidate-col-img\">
                    <img src=\"../admin/img/$row[can_img]\" alt=\"can-img\">
                </div>";
                    echo "<div class=\"candidate-name\">
                    <span>" . $row['cname'] . "</span>
                </div>";
                    echo "</div>";
                    echo "<div class=\"voting-section\">
                <div class=\"votenow-btn\">
                <form action='storevote.php?can-id=" . $row['cid'] . "&can-name=" . $row['cname'] . "&vid=" . $votingid . "&cat-id=" . $row['category_Id'] . "&user=" . $votingid . "'method=\"POST\">
                <input type='hidden' name='user' value =" . $_SESSION['userLoginId'] . ">";
                    if ($num_rows > 0) {
                        echo  "<div class='voted'>Voted
                            <div class='popup-box popup-box-left'>
                            <h5><i class='fa-solid fa-triangle-exclamation'></i> Multiple Vote is not allowed</h5>
                            <hr>
                            <p>You are trying to vote in the same category you previously voted. Mutiple vote in the same category is not allowed. Vote in another category.</p>
                            </div>
                            </div>";
                        ?>
                   <?php     
                    } else {
                        echo " <button class='vote' type=submit>Vote</button>";
                    }
                    echo "</form>
                    </div>
                    <div class=\"view-detail\">
                    <a id=\"detail-candidate\" href='cnditate.php'>View More</a>
                    </div>";
                    ?>

        </div>
    </div>

<?php }
            } else {
                echo " <div class='no-candidate'>
    <div class='display-message'>
        <p>Candidate List has not yet been published</p>
        <span class=can-empty>Select the appropriate voting list</span>
        </div>
        </div>";
    } ?>

<?php
} else {
    header("location:../guest/lgn.php");
    // echo $_SESSION['userLoginId'];
}
?>
<script>
    $(".voted").mouseover(function() {
$(this).children(".popup-box").show();
// $(".popup-box").css("display", "block");

// $(".popup-box").css("transition-duration", "10s");
}).mouseout(function() {
$(this).children(".popup-box").hide();
});
</script>