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
    <title>Online Voting System</title>
</head>
<!-- <link rel="stylesheet" href="../../css/dashboard.css"> -->
<link rel="stylesheet" href="../../css/voting_list.css">
<script src="../../js/all.js"></script>
<script src="../../js/jquery.js"></script>
<link rel="stylesheet" href="../../css/font-awesome-min.css">
<script src="../../js/font-awesome-min.js"></script>

<?php
?>
    <div class="backdrop">
        <div class="success" id="successMessage">
            <?php
 if(isset($_GET["success"])) {
     ?>

<?php
                if(isset($_GET["success"]))
                {
                    if(isset($_GET['success']))
                    {
                        echo "Category Added sucessfully";
                    }
                }
            


        }
        if(isset($_GET["delete"]))
                {
                    if(isset($_GET['delete']))
                    {
                        echo "Category deleted sucessfully .";
                    }
                }
                ?>
        </div>
        <div class="voters">
            <div class="add-btn">
                <button class="open-button" onclick="openForm()"><i class="fa-solid fa-plus"></i>&nbsp;Add New
                    Category</button>
            </div>
            <table class="voters-table" border="1" cellspacing="0" cellpadding="0">
                <thead>
                    <tr>
                        <th>Category ID</th>
                        <th>Category Name</th>
                        <th>Voting List</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
             include "connection.php";
             $sql = "select * from category_list left join voting_list on voting_list.votingId= category_list.votingList;";
             $res = mysqli_query($conn,$sql);
                if(mysqli_num_rows($res)>0){
                    while($row = mysqli_fetch_assoc($res)){
                        echo "<tr>";            
                        echo "<td>".$row['category_Id']."</td>";            
                        echo "<td>".$row['category']."</td>";
                        echo "<td>".$row['name']."</td>";            
                        echo "<td>".$row['cat-description']."</td>";
                        echo "<td id=\"td-action\"><form method=\"POST\" action=\"deleteCategoryList.php?category_Id=".$row['category_Id']."\"><button type=\"submit\" onclick=\"return confirm('Are you sure you want to Delete?')\" id=\"del-btn\"><i class=\"fa-solid fa-trash-can\"></i></button>&nbsp;<a href=\"editCategory.php?cat-id=".$row['category_Id']."\"><i class=\"fa-regular fa-pen-to-square\"></i></a>
                        </form>
                        </td>";                   
                        echo "</tr>";      
                            }
                        }
         ?>
                </tbody>
            </table>
        </div>
    </div>



    <div class="register-pane" id="myForm">
        <div class="close-pane">
            <input type="button" class="sbutton-cancel" value="X" onclick="closeForm()">
        </div>
        <form action="addCategoryList.php" method="POST">
            <h1>Add Category List</h1>
            <div class="form-group">
                <input type="text" name="categoryName" placeholder="Category Name" required>
            </div>
            <span id="desc-error"></span>
            <div class="form-group">
                <textarea placeholder="Description" name="description" id="description" class="form-group"></textarea>
            </div>
            <span id="selection-error"></span>
            <div class="form-group">
                Voting List:
                <select class="select_votingList" id="votinglist_select" name="votingList" required>
                    <option disabled value="" selected>-- Select Voting List --</option>
                    <?php
    $sql = "Select * from voting_list";
    $res = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($res))
        {
            echo "<option value='". $row['votingId'] ."'>" .$row['name'] ."</option>";  // displaying data in option menu
        }	
    ?>
                </select>
                <?php mysqli_close($conn);  
   ?>
            </div>
            <div class="form-group">
                <input type="submit" class="sbutton" id="sbutton" value="Submit" onclick="openSuccess()">
            </div>

</body>
</head>

</html>
<script type="text/javascript">
setTimeout(openSuccess, 1000)

function openSuccess() {
    document.getElementById("successMessage").style.display = "block";
}
$(document).ready(function() {
$('#description').on('keypress', function(key) {
    var desc_length= $("#description").val().match(/\S+/g).length;
    if (desc_length<20) {
            // If name is too short
            $("#desc-error").html("Description should be more than 20 words.");
            // console.log(!$("#description").val().match(/\S+/g).length);
            // console.log(desc_length);
            $("#sbutton").attr("disabled",true);  
          }
          else if($('#description').val()==""){
            $("#desc-error").html("Description cannot be empty.");
            $("#sbutton").attr("disabled",true);  

          }
          else {  
            // If there is no errors, clear the HTML
            $("#desc-error").html(""); 
            $("#sbutton").attr("disabled",false);      
          }
});
$('#votinglist_select').on('submit', function(submit) {
    $("#sbutton").click(function () {
            var voting_list = $("#votinglist_select");
            if (voting_list.val() == "") {
                //If the "Please Select" option is selected display error.
                // alert("Please select an option!");
            $("#selection-error").html("Description should be more than 100 words.");
            // $("#sbutton").attr("disabled",true);  

                return false;
            }
            else{
                $("#selection-error").html(""); 
                return true;
            // $("#sbutton").attr("disabled",false);  
            }

});
});
});
</script>
<?php

} 
else {
    header("location:admin_login.php");
}
?>