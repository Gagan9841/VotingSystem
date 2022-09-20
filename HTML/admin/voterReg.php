<?php  
if(isset($_SESSION['login_id']) && !empty($_SESSION['login_id'])) {

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voter Registration</title>
</head>

<body>
    <link rel="stylesheet" href="../../css/voterReg.css">
    <div class="container">
        <div class="register-pane">
            <h1>Register Here</h1>
            <div class="success">
                <?php
                if(!empty($_GET))
                {
                    if($_GET['success'])
                    {
                        echo "You are sucessfully registered.";
                    }
                }
            ?>
            </div>

            <form action="adm voter submit.php" method="POST">
                <div class="form-group">
                    <input type="text" name="name" placeholder="Full Name" required>
                </div>
                <div class="form-group">
                    <input type="text" name="username" placeholder="Username" required>
                </div>
                <span class="gender-span">Gender:</span>
                <div class="form-group gender-group">
                    <input type="radio" id="gender" name="gender" value="Male" required> Male
                    <input type="radio" id="gender" name="gender" value="Female" required> Female

                </div>
                <div class="form-group">
                    <input type="password" name="password" placeholder="New Password" aria-required="true">
                    <input type="password" name="password" placeholder="Confirm Password" aria-required="true">
                </div>
                <div class="form-group">
                    <input type="text" name="college_id" placeholder="College ID No." required>
                </div>
                <div class="form-group">
                    <input type="submit" value="Register" class="sbutton">
                </div>
            </form>
        </div>
</body>

</html>
<?php
}
else{
    header("location:admin_login.php");
}
?>