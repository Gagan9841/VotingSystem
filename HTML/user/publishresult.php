<head>
    <title>Results</title>
</head>
<?php
// session_start();
include "user_uisuccess.php";
if(isset($_SESSION['userLoginId']) && !empty($_SESSION['userLoginId'])) {
    
    ?>        

<script src="../../js/jquery.js"></script>

<div class="container">

    <?php
if(!empty($_GET)){
    if(!empty($_GET['voteSuccess'])){
        echo "Voted Successfully";
    }
}

?>
    <div class="votinglist-name">
        <h2>
            <?php
             $votingid= $_GET['vid'];
             $sql = "select * from vote left join voting_list on voting_list.votingId= vote.votingId left join category_list on category_list.category_Id=vote.categoryId left join candidate_list on candidate_list.cid=vote.candidateId where voting_list.votingId=$votingid AND voting_list.resultStatus=1 GROUP BY candidateId ORDER BY sum(voteCount) DESC, category ASC";
                      $res = mysqli_query($conn,$sql);
                      if(mysqli_num_rows($res)>0){
                          $row = mysqli_fetch_assoc($res);
                          echo $row['name']."</br>";
                        }
                        ?>
        </h2>

    </div>

    <div class="candidate-row">
        <?php
        include "connection.php";
        $votingid= $_GET['vid'];
        $res = mysqli_query($conn,$sql);
        if(mysqli_num_rows($res)>0){
            while($row = mysqli_fetch_assoc($res)){
                            $can_id =$row['candidateId'];
                            echo "<div class=\"candidate-col\">";
                            echo"<div class=\"candidate-detail\">";
          echo "<div class=\"candidate-col-img\">
                    <img src=\"../admin/img/$row[can_img]\" alt=\"can-img\">
                </div>";
              echo "<div class=\"candidate-name\">
                    <span style='margin-right: 10px;'>".$row['cname']."</span>
                    <h4 style='color:white;'> ".$row['category']."</h4>
                </div>";
            echo "</div>";
            $query= "select sum(voteCount) from vote where candidateId= $can_id";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_array($result)){
            echo "<div class=\"voting-section\">
                    Total Vote : ".$row['sum(voteCount)']."
                    ";
                } 
        ?>

    </div>
</div>

<?php }
}else{
    echo" <div class='no-candidate'>
    <div class='display-message'>
        <p>Result list not yet been published</p>
        <span class=can-empty>Select the appropriate voting list</span>
    </div>
</div>";
}
} 
else{

    header("location:../guest/lgn.php");
}
?>