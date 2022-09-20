
<link rel="stylesheet" href="../../css/voting_list.css">
<script src="../../js/jquery.js"></script>
<?php
    include "connection.php";
?>
<?php
        $id= $_GET['collegeId'];
        // $sql = "SELECT FROM `candidate_list` WHERE 'c-collegeId' = $can_id";
        $sql = "SELECT * FROM `voter_list` WHERE `College_Id_No.` = $id ";
        $res = mysqli_query($conn,$sql);
         if(mysqli_num_rows($res)>0){
            while($row = mysqli_fetch_assoc($res)){
                    ?>
                    <div class="edit-register-pane" id="myForm">
                    <div class="close-pane">
                        <a href="voters.php" class="sbutton-cancel">Go Back</a>
                        <!-- <button" class="sbutton-cancel" value="X" onclick="closeForm()"> -->
                        <form action="updateVoter.php" method="POST">
                            <div class="form-group">
                                <span class="message"></span>
                                <input type="text" name="name" placeholder="Full Name" value="<?php echo $row['Full_name'];?>" required>
                            </div>
                            <div class="form-group">
                                <span class="message"></span>
                                <input type="text" name="username" placeholder="Username" value="<?php echo $row['Username'];?>"required>
                            </div>
                            <span class="gender-span">Gender:</span>
                            <div class="form-group gender-group">
                                <span class="message"></span>
                                
                                <input type="radio" id="gender" name="gender" value="<?php echo $row['Gender'];?>" selected required> Male 
                                <input type="radio" id="gender" name="gender" value="Female"  required> Female
                
            </div>
            <div class="form-group">
            <span class="message"></span>
                <input type="password" name="password" id="pswd" placeholder="New Password" >
                <span class="message"></span>
                <input type="password" name="password" id="pswd" placeholder="Confirm Password">
            </div>
            <div class="form-group">
                <span class="message"></span>
                <input type="text" name="college_id"  value="<?php echo $id;?>"placeholder="College ID No." required>
            </div>
            <div class="form-group">
                <span class="message"></span>
                <input type="submit" value="Register" class="sbutton">
            </div>
            <div class="form-group">
                <input type="button" value="Back to Login" class="sbutton" onclick=registerValidate() ></a>
            </div>
        </form>
    </div>
</div>
    <?php }}
    


?> 
