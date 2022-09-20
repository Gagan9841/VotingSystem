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
    <title>Dashboard</title>
</head>
<link rel="stylesheet" href="../../css/dashboard.css">
<link rel="stylesheet" href="../../css/voting_list.css">
<link rel="stylesheet" href="../../css/font-awesome-min.css">
<script src="../../js/all.js"></script>
<script src="../../js/jquery.js"></script>
<script src="../../js/font-awesome-min.js"></script>

<body>

<?php
?>
    <div class="backdrop">
        <?php
           if(isset($_GET["success"])) {
            ?>

        <div class="success" id="successMessage">
            <?php
                if(isset($_GET["success"]))
                {
                    if(isset($_GET['success']))
                    {
                        echo "You are sucessfully registered.";
                    }
                }
            ?>
            <?php
                if(isset($_GET['delete']))
                {
                  
                    {
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
                <button class="open-button" onclick="openForm()"><i class="fa-solid fa-plus"></i>&nbsp;Add New Voting
                    List</button>
            </div>
            <table class="voters-table" border="1" cellspacing="0" cellpadding="0">
                <thead>
                    <tr>
                        <th>Voting ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Organizer</th>
                        <th>Start</th>
                        <th>End</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
             include "connection.php";
             $sql = "Select * from voting_list";
             $res = mysqli_query($conn,$sql);
                if(mysqli_num_rows($res)>0){
                    while($row = mysqli_fetch_assoc($res)){
                        echo "<tr>";            
                        echo "<td>".$row['votingId']."</td>";            
                        echo "<td>".$row['name']."</td>";            
                        echo "<td>".$row['description']."</td>";           
                        echo "<td>".$row['organizer']."</td>";           
                        echo "<td>".$row['start']."</td>";         
                        echo "<td>".$row['end']."</td>";         
                        // echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete?')\" href=\"deleteVotingList.php?votingId=".$row['votingId']."\" >Delete </a> || <a href=\"edit.php?id=".$row['votingId']."\">Edit</a></td>";
                        echo "<td id=\"td-action\"><form method=\"POST\" action=\"deletevotingList.php?votingId=".$row['votingId']."\">
                        <button type=\"submit\" onclick=\"return confirm('Are you sure you want to Delete?')\" id=\"del-btn\"><i class=\"fa-solid fa-trash-can\"></i></button>&nbsp;<a href=\"editVotingList.php?votingid=".$row['votingId']."\"><i class=\"fa-regular fa-pen-to-square\"></i></a>
                        </form>
                        </td>";
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
        <form action="addVotingList.php" method="POST">
            <h1>Add Voting List</h1>
            <span id="fullname-error"></span>
            <div class="form-group">
                <input type="text" name="name" id="full_name" placeholder="Name" required>
            </div>
            <span id="desc-error"></span>
            <div class="form-group">
                <textarea placeholder="Description" name="description" id="description" class="form-group"></textarea>
            </div>
            <div class="form-group">
                <input type="text" name="organizer" placeholder="Organizer" required>
            </div>
            <span id="date-error"></span>
            <div class="form-group">
                Start Time
                <?php 
               $timezone= date_default_timezone_set('Asia/Kathmandu');
                ?>
                <input type="datetime-local" name="start" id='start_time' min="<?php echo date("Y-m-d")."T". date('H:i'); ?>" required>
                
            </div>
            <div class="form-group">
                End Time
                <input type="datetime-local" name="end" id='end_time'  required>
            </div>
            
            <div class="form-group">
                <input type="submit" class="sbutton" id="sbutton" disabled="disabled" value="Submit" onclick="openSuccess()">
            </div>
        </form>
    </div>
</body>
</head>

</html>
<script>
setTimeout(openSuccess, 1000)

function openSuccess() {
    document.getElementById("successMessage").style.display = "block";
}
$(document).ready(function() {
    // var now = date().format("YYYY/D/M, h:mm:ss A");
    // Saturday, June 9th, 2007, 5:46:21 PM
    $('#start_time').on('submit', function(key) {
    var start_time = new $('#start_time').val();
var start = start_time.toString();
var end_time = new $('#end_time').val();
var end = end_time.toString();
if(end>start){
    $("#date-error").html("Value must be '\ + start \' or later");
                return false;
                $("#sbutton").attr("disabled",true);
}
else {
                // If there is no errors, clear the HTML
                $("#date-error").html("");   
                $("#sbutton").attr("disabled",false);
                // $("#pswd-notmatch-error").html("");  /  
              }
	});

$('#full_name').on('keypress', function(key) {
    if (!$("#full_name").val().match(/^([a-zA-Z]{2,}\s[a-zA-z]{1,}'?-?[a-zA-Z]{2,}\s?([a-zA-Z]{1,})?)/)) {
            // If name is too short
            $("#fullname-error").html("Please Enter Full Name");
            $("#sbutton").attr("disabled",true);  
          } else {  
            // If there is no errors, clear the HTML
            $("#fullname-error").html(""); 
            $("#sbutton").attr("disabled",false);      
          }
});
$('#description').on('keypress', function(key) {
    var desc_length= $("#description").val().match(/\S+/g).length;
    if (desc_length<10) {
            // If name is too short
            $("#desc-error").html("Description should be more than 10 words.");
            // console.log(!$("#description").val().match(/\S+/g).length);
            // console.log(desc_length);
            $("#sbutton").attr("disabled",true);  
          } else {  
            // If there is no errors, clear the HTML
            $("#desc-error").html(""); 
            $("#sbutton").attr("disabled",false);      
          }
});
});
</script>
<?php
}
else{
    header("location:admin_login.php");
}
?>