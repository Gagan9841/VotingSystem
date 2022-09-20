<?php
include "connection.php";
    include "user_ui.php";
?>
<div class="can-heading-container">

<div class= "can-heading">
<span class="can-heading-center">
Candidates List
</span>
</div>
</div>
    <div class="container">
        <?php 
                include "connection.php";
                $sql = "select * from candidate_list left join voting_list on voting_list.votingId= candidate_list.votingList left join category_list on category_list.category_Id=candidate_list.categoryList ORDER BY cid ";
                //  $sql = "SELECT * FROM candidate_list ORDER BY cid";
                 $res = mysqli_query($conn,$sql);
                    if(mysqli_num_rows($res)>0){
                        while($row = mysqli_fetch_array($res)){
                            $i=1;
                            echo "<div class ='candidate-container' id='can-fade'>";
                             echo "<div class= 'image-sec'>
                                    <img class='can-img' src='../admin/img/$row[can_img]' alt='candidate-image'>
                                        <span class='can-name'>".$row['cname']."</span>
                                        </div>";
                             echo "<div class ='description-sec'>
                                    <div class = 'can-desc'>
                                    <div class='can-image-footer'>
                                            <span class='votingList'>".$row['name'] ."</span>
                                            <span class='category'>".$row['category']."</span>
                                        </div>
                                    <p>".$row['cdescription'].
                                    "</p> </div></div> ";
                            echo "</div>";
                                                                
                        }
                        
                            }
                ?>
        
    </div>

    </div>
</body>

</html>
</div>
<div class="footer">
    hello worlds
</div>
</body>

</html>


