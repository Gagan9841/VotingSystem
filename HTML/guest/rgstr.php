<?php
 include "user_ui.php";
?>
    <div class="container">
        <div class="register-pane">
        <h1>Register Here</h1>
        <?php if (isset($_GET['error'])) { ?>
<p class="error">
    <?php
    echo $_GET['error']; 
    ?>
</p>
      <?php  } ?>
                <form action="../admin/submit.php" method="POST">
            <div class="form-group">
                <span id="fullname-error"></span>
                <input type="text" name="name" id="full_name" placeholder="Full Name">
            </div>
            <span class="gender-span">Gender:</span>
            <div class="form-group gender-group">
            <!-- <span class="validation-error"></span> -->
                <input type="radio" name="gender" value="Male"> Male 
                <input type="radio" name="gender" value="Female"> Female
            </div>
            <div class="form-group">
            <span id="pswd-notmatch-error"></span>
                <input type="password" name="password" id="pswd" class="pswd" placeholder="New Password" >
                <span id="pswd-error"></span>
                <input type="password" name="cpassword" class="pswd" id="cpswd" placeholder="Confirm Password">
            </div>
            <div class="form-group">
            <span id="college-id-error"></span>
                <input type="text" name="college_id" id="college_id" placeholder="College ID No.">
            </div>
            <div class="form-group">
            <!-- <span class="college-id-error"></span> -->
               <input type="submit" disabled="disabled" value="Register" id="sbutton" class="sbutton">
            </div>
            <div class="form-group">
            </div>
            <div class="form-group">
                <a href="lgn.php">
                    <span>Already have an account?</span>
        </a>
                    <input type="button" value="Back to Login" class="sbutton" onclick=registerValidate()>
            </div>
        </form>
    </div>
    </div>
    
</body>
</html>

<script>
//    $("#full_name").keyup('input', function(){
//     // Creates a timeout.
//     var check = setTimeout(function(){
        
//       if (!$("#full_name").val().match(/^([a-zA-Z]{2,}\s[a-zA-z]{1,}'?-?[a-zA-Z]{2,}\s?([a-zA-Z]{1,})?)/)) {
        
//         // If name is too short
//         $(".validation-error").html("Please Enter your Full Name");
      
      
//       } else {
          
//         // If there is no errors, clear the HTML
//         $(".validation-error").html("");   
          
//       }

//     }, 300);
// })
</script>
<script>
// $(document).ready(function() {
// 	$('#full_name').on('keypress', function(key) {
// 		if (!$("#full_name").val().match(/^([a-zA-Z]{2,}\s[a-zA-z]{1,}'?-?[a-zA-Z]{2,}\s?([a-zA-Z]{1,})?)/)) {
//                 // If name is too short
//                 return false;
//                 $("#fullname-error").html("Please Enter your Full Name");
//               } else {   
//                 // If there is no errors, clear the HTML
//                 $("#fullname-error").html("");           
//               }
// 	});

// 	$('#pswd,#cpswd').on('keypress', function(key) {
//         var password = $('#pswd').val();
//         var cpassword = $('$cpswd').val();

//         if(password!=cpassword){
// 			return false;
//             $("#pswd-error").html("Please Enter ");
//               } 
//               else {   
//                 // If there is no errors, clear the HTML
//                 $("#pswd-error").html("");           
              
// 		}
//     });
// });
var empty = true;
$('input[type="text"]'&& 'input[type="password"]'&& 'input[type="radio"]').each(function() {
   if ($(this).val() != "") {
    $("#fullname-error").html("All fields are required");
                $("#sbutton").attr("disabled",true);  
              } else {  
                // If there is no errors, clear the HTML
                $("#fullname-error").html(""); 
                $("#sbutton").attr("disabled",false);      
              }
});
$(document).ready(function() {
	$('#full_name').on('keypress', function(key) {
		if (!$("#full_name").val().match(/^([a-zA-Z]{2,}\s[a-zA-z]{1,}'?-?[a-zA-Z]{2,}\s?([a-zA-Z]{1,})?)/)) {
                // If name is too short
                $("#fullname-error").html("Please Enter your Full Name");
                $("#sbutton").attr("disabled",true);  
              } else {  
                // If there is no errors, clear the HTML
                $("#fullname-error").html(""); 
                $("#sbutton").attr("disabled",false);      
              }
	});
	$('.pswd,#cpswd').on('keyup', function(key) {
        var password = $('#pswd').val();
        var cpassword = $('#cpswd').val();
        console.log(password);
        if(password.length<=8){
            $("#pswd-notmatch-error").html("Password should be at least 8 character long.");
            return false;
            $("#sbutton").attr("disabled",true);

        }
        else {
                // If there is no errors, clear the HTML
                $("#pswd-notmatch-error").html("");    
                $("#sbutton").attr("disabled",false);

              }
		if(password!=cpassword) {
                // If name is too short
                $("#pswd-error").html("Password doesnot Match");
                return false;
                $("#sbutton").attr("disabled",true);

              }
            else {
                // If there is no errors, clear the HTML
                $("#pswd-error").html("");   
                $("#sbutton").attr("disabled",false);

                // $("#pswd-notmatch-error").html("");  /  
              }
	});
    $('#college_id').on('keypress', function(key) {
		if (!$("#college_id").val().match(/^[1-9][0-9]*$/)) {
                // If name is too short
                $("#college-id-error").html("Id cannot start with 0 and should not contain alphabets.");
                $("#sbutton").attr("disabled",true);  
              } else {  
                // If there is no errors, clear the HTML
                $("#college-id-error").html(""); 
                $("#sbutton").attr("disabled",false);      
              }
	});
});
</script>