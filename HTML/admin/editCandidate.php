<link rel="stylesheet" href="../../css/voting_list.css">
<script src="../../js/jquery.js"></script>
<?php
    include "connection.php";
?>
<?php
        $can_id= $_GET['c-collegeId'];
        $vid= $_GET['vid'];
        // $sql = "SELECT FROM `candidate_list` WHERE 'c-collegeId' = $can_id";
        $sql = "SELECT * FROM `candidate_list` WHERE `c-collegeId` = $can_id ";
        $res = mysqli_query($conn,$sql);
         if(mysqli_num_rows($res)>0){
            while($row = mysqli_fetch_assoc($res)){
                    ?>
                    <div class="edit-register-pane" id="myForm">
                    <div class="close-pane">
                        <a href="candidate_list.php" class="sbutton-cancel">Go Back</a>
        <!-- <button" class="sbutton-cancel" value="X" onclick="closeForm()"> -->
    </div>
<form action="updateCandidate.php?id=<?php echo $can_id; ?>" method="POST" enctype="multipart/form-data">
<h1>Add Voting List</h1>
<div class="form-group">
    <input type="text" name="cname" placeholder="Candidate Name" required value="<?php echo $row['cname'];?>">
</div>

<div class="form-group">
    <select name="cfaculty" required>
        <option value="1"selected><?php echo $row['cfaculty'];  ?></option>
        <option value="BBS">BBS</option>
        <option value="BBM">BBM</option>
        <option value="BCA">BCA</option>
        <option value="BIM">BIM</option>
        <option value="BBA">BBA</option>
        <option value="Bsc.Csit">BSc.Csit</option>
        <option value="MBS">MBS</option>
    </select>
</div>
<div class="form-group gender-group">
    <input type="radio" id="gender" name="cgender" value="Male" required> Male
    <input type="radio" id="gender" name="cgender" value="Female" required> Female
</div>
<div class="form-group">
    <input type="text" name="c-collegeId" placeholder="College Id No." value="<?php echo $row['c-collegeId'];  ?>" required>
</div>
<div class="form-group">
    <textarea placeholder="Description" name="cdescription" id="description" class="form-group"><?php echo $row['cdescription'];  ?></textarea>
</div>
<div class="form-group">
    Voting List:
    <select class="select_votingList" id="votingList" name="votingList" required>
        <?php
        $sql = "Select * from candidate_list LEFT JOIN voting_list on candidate_list.votingList=voting_list.votingId where candidate_list.`c-collegeId`=$can_id Group By voting_list.votingId";
             $res = mysqli_query($conn,$sql);
             $row = mysqli_fetch_assoc($res);
             echo "<option selected value='". $row['votingId'] ."'>" .$row['name'] ."</option>";  // displaying data in option menu
             $sql_disp = "Select * from candidate_list LEFT JOIN voting_list on candidate_list.votingList=voting_list.votingId Group By voting_list.votingId";
             $res_disp = mysqli_query($conn,$sql_disp);
             while($row_disp = mysqli_fetch_assoc($res_disp))
                    {
                         echo "<option value='". $row_disp['votingId'] ."'>" .$row_disp['name'] ."</option>";  // displaying data in option menu
                    }	
        ?>
    </select>
</div>
<div class="form-group">
    Category List:
        <select class="select_votingList" id="category" name="cat-list" required>
    <?php
        
        $sql = "select * from candidate_list Left Join category_list on candidate_list.categoryList=category_list.category_Id where candidate_list.`c-collegeId`=$can_id Group By category_list.category_Id ";
             $res = mysqli_query($conn,$sql);
             $row = mysqli_fetch_assoc($res);
             echo "<option selected value='". $row['category_Id'] ."'>" .$row['category'] ."</option>";  // displaying data in option menu
             $sql_disp = "select * from candidate_list Left Join category_list on candidate_list.categoryList=category_list.category_Id where category_list.votingList= $vid GROUP BY category_list.category_Id";
             $res_disp = mysqli_query($conn,$sql_disp);
             while($row_disp = mysqli_fetch_assoc($res_disp))
                    {
                         echo "<option value='". $row_disp['category_Id'] ."'>" .$row_disp['category'] ."</option>";  // displaying data in option menu
                    }	
        ?> 
    </select>
    <?php mysqli_close($conn);  
        ?>
</div>
<div class="form-group">
    <input type="file" name="can_img">
    <input type="submit" class="sbutton" value="Submit" onclick="openSuccess()">
</div>
</form>
                </div>
<?php }} ?>

<script>
    $(document).ready(function() {
    $('#votingList').on('change', function() {
        var voting_id = this.value;
        $.ajax({
            url: "fetch_category.php",
            type: "POST",
            data: {
                voting_id: voting_id
            },
            cache: false,
            success: function(result) {
                $("#category").html(result);
            }
        });
    });
});
</script>


