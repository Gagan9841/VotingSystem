
<?php
    include "dashboard_ui.php";
if(isset($_SESSION['login_id']) && !empty($_SESSION['login_id'])) {
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voters</title>
</head>
<link rel="stylesheet" href="../../css/dashboard.css">
<link rel="stylesheet" href="../../css/voting_list.css">
<script src="../../js/all.js"></script>
<script src="../../js/jquery.js"></script>
<link rel="stylesheet" href="../../css/font-awesome-min.css">
<script src="../../js/font-awesome-min.js"></script>

<body>
<?php
?>
    <div class="backdrop">
<?php
if(!empty($_GET)){
    if(!empty($_GET['success'])){
        echo "Value Inserted Successfully";
    }
}
?>
<?php
if(!empty($_GET)){
    if(!empty($_GET['delete'])){
        echo "Value Deleted Successfully";
    }
}
?>
<!-- <form action="voterReg.php">
    <div class="addnew-btn">
        <button type="submit" class="btn-addnew">
            Add Voter
        </button>
    </div> -->

</form>
<div class="voters">
<div class="add-btn">
                <button class="open-button" onclick="openForm()"><i class="fa-solid fa-plus"></i>&nbsp;Add New
                    Voter</button>
            </div>
    <table class="voters-table" border="1" cellspacing="0" cellpadding="0">
        <thead>
            <tr>
                <th>SN</th>
                <th>Full Name</th>
                <th>Gender</th>
                <th>College Id No.</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
</div>
<?php
    include "connection.php";
    $sql = "Select * from voter_list";
    $res = mysqli_query($conn,$sql);
    if(mysqli_num_rows($res)>0){
        $sn=1;
        while($row = mysqli_fetch_assoc($res)){
            echo "<tr>";            
            echo "<td>".$sn."</td>";            
            echo "<td>".$row['Full_name']."</td>";                    
            echo "<td>".$row['Gender']."</td>";           
            echo "<td>".$row['College_Id_No.']."</td>";   
            echo "<td id=\"td-action\"><form method=\"POST\" action=\"delete_voter.php?votingId=".$row['College_Id_No.']."\">
                        <button type=\"submit\" onclick=\"return confirm('Are you sure you want to Delete?')\" id=\"del-btn\"><i class=\"fa-solid fa-trash-can\"></i></button>&nbsp;
                        <a href =\"editVoter.php?collegeId=".$row['College_Id_No.']."\"><i class=\"fa-regular fa-pen-to-square\"></i></a>
                        </form>

                        </td>";      
            // echo "<td><a href=\"delete_voter.php?College_Id_No=".$row['College_Id_No.']."\">Delete</a> || <a href=\"edit.php?id=".$row['College_Id_No.']."\">Edit</a></td>";  
            // echo "</tr>";      
            $sn++; 
                      

        }
    }
    ?>
</tbody>
</table>
</div>
</div>

<div class="container">
        <div class="register-pane">
        <h1>Register Here</h1>
                <form action="../admin/submit.php" method="POST">
            <div class="form-group">
                <span class="message"></span>
                <input type="text" name="name" placeholder="Full Name" required>
            </div>
            <div class="form-group">
            <span class="message"></span>
                <input type="text" name="username" placeholder="Username" required>
            </div>
            <span class="gender-span">Gender:</span>
            <div class="form-group gender-group">
            <span class="message"></span>
                <input type="radio" id="gender" name="gender" value="Male" required> Male 
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
                <input type="text" name="college_id" placeholder="College ID No." required>
            </div>
            <div class="form-group">
            <span class="message"></span>
               <input type="submit" value="Register" class="sbutton">
            </div>
            <div class="form-group">
                <a href="../HTML/lgn.html">
                    <span>Already have an account?</span>
                    <input type="button" value="Back to Login" class="sbutton" onclick=registerValidate() ></a>
            </div>
        </form>
    </div>

</body>
</head>

</html>
<script type="text/javascript">
setTimeout(openSuccess, 3000)

function openSuccess() {
    document.getElementById("successMessage").style.display = "block";
}
</script>
<?php
}
else{
    header("location:admin_login.php");
}
?>