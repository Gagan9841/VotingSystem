<?php

include "connection.php";

?>
<link rel="stylesheet" href="../../css/voting_list.css">
<script src="../../js/jquery.js"></script>
<?php
$cat_id = $_GET['cat-id'];
// $sql = "SELECT FROM `candidate_list` WHERE 'c-collegeId' = $can_id";
$sql = "SELECT * FROM `category_list` WHERE `category_Id` = $cat_id ";
$res = mysqli_query($conn, $sql);
if (mysqli_num_rows($res) > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
?>
        <div class="edit-register-pane" id="myForm">
            <div class="close-pane">
                <a href="categoryList.php" class="sbutton-cancel">Go Back</a>
                <!-- <button" class="sbutton-cancel" value="X" onclick="closeForm()"> -->
                <form method="POST" action="updateCategoryList.php?cat-id=<?php echo $row['category_Id'] ?>" >
                    <h1>Edit Category</h1>
                    <div class="form-group">
                <input type="text" name="categoryName" placeholder="Category Name" value=" <?php echo $row['category']; ?> " required>
            </div>
            <span id="desc-error"></span>
            <div class="form-group">
                <textarea placeholder="Description" name="description" id="description" class="form-group"><?php echo $row['cat-description']; ?></textarea>
            </div>
            <span id="selection-error"></span>
            <div class="form-group">
                Voting List:
                <select class="select_votingList" id="votinglist_select" name="votingList" required>
                    <!-- <option disabled value="" selected>-- Select Voting List --</option> -->
                    <?php
    $sql = "Select * from category_list LEFT JOIN voting_list on category_list.votingList=voting_list.votingId where category_list.`category_Id`=$cat_id  Group By voting_list.votingId";
    $res = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($res);
    echo "<option selected disabled value='". $row['votingId'] ."'>" .$row['name'] ."</option>";  // displaying data in option menu
    $sql_disp = "Select * from category_list LEFT JOIN voting_list on category_list.votingList=voting_list.votingId Group By voting_list.votingId";
    $res_disp = mysqli_query($conn,$sql_disp);
    while($row_disp = mysqli_fetch_assoc($res_disp))
           {
                echo "<option value='". $row_disp['votingId'] ."'>" .$row_disp['name'] ."</option>";  // displaying data in option menu
           }		
    ?>
                </select>
                <?php mysqli_close($conn);  
   ?>
            </div>
            <div class="form-group">
                <input type="submit" class="sbutton" id="sbutton" value="Submit" onclick="openSuccess()">
            </div>
                </form>
            </div>
        </div>
<?php }
} 

?>
