<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lgn</title>
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
                <li> <a href="rgstr.php">Register</a></li>
            </ul>
        </div>
    </div>
    <div class="container">
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
        <div class="login-pane">
       
            <h2>Please Login to proceed</h2>
            <form action="#">
                <div class="form-group">
                    <input type="text" name="login_id" placeholder="Login ID" aria-required="true">
                </div>
                <div class="form-group">
                    <input type="password" name="password" placeholder="Enter Password" aria-required="true">
                </div>
                <div class="form-group">
                     <input type="Submit" value="Login" class="sbutton"></a>
                </div>
                <span class="or">OR</span>
                <div class="form-group">
                    <a href="../HTML/rgstr.html"><input type="button" value="Register Here" class="sbutton"></a>
                </div>
                
    
            </form>
        </div>
       </div>
    </div>
</body>

</html>