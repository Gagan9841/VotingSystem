<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>rgstr</title>
    <link rel="stylesheet" href="../css/hmpg.css">
    <link rel="stylesheet" href="../css/lgn.css">
    <link rel="stylesheet" href="../css/rgstr.css">
</head>
<body>
    <div class="header-sec">
        <div class="left-header">
            <span>This is in left header</span>
        </div>
        <div class="center-header">
            <!-- <img src="../img/pec.jpg" alt="Prime Election Commission"> -->
        </div>
        <div class="right-header">
        </div>
    </div>
   
    <div class="navigation">
    <div class="logo">
        <a href="../HTML/hmpg.html"><img src="../img/logow.png" alt="logo"></a>
    </div>
        <div class="nav-content">
            <ul>
            <li> <a href="hmpg.html"> Home</a></li>
                <li><a href="howtovote..html">How to vote?</a></li>
                <li><a href="cnditate.html">Candidates</a></li>
                <li><a href="votenow.php">Vote Now</a></li>
            </ul>
        </div>
        <div class="nav-right-content">
            <ul>
                <li><a href="lgn.php">Login</a></li>
                <li> <a href="#">Register</a></li>
            </ul>
        </div>
    </div>
    <div class="container">
        <div class="register-pane">
        <h1>Register Here</h1>
                <form action="../admin/submit.php" method="POST">
            <div class="form-group">
                <input type="text" name="name" placeholder="Full Name" required>
            </div>
            <div class="form-group">
                <input type="text" name="username" placeholder="Username" required>
            </div>
            <span class="gender-span">Gender:</span>
            <div class="form-group gender-group">
                <input type="radio" id="gender" name="gender" value="Male" required> Male 
                <input type="radio" id="gender" name="gender" value="Female"  required> Female
                
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
            <div class="form-group">
                <a href="../HTML/lgn.html">
                    <span>Already have an account?</span>
                    <input type="button" value="Back to Login" class="sbutton"></a>
            </div>
        </form>
    </div>
    </div>
    
</body>
</html>