<?php
session_start();
 include "user_ui.php";
 if(isset($_SESSION['userLoginId']) && !empty($_SESSION['userLoginId'])) {
    header("location:../user/hmpgsuccess.php");
 }
 else{
     
    ?> 
    <div class="container">
    <div class="success">
             <?php
            if(isset($_GET["success"]))
            {
                if(isset($_GET['success']))
                {
                    echo "You are sucessfully registered.";
                }
            }
                if(isset($_GET['login']))
                {
                    if(isset($_GET['login']))
                    {
                        echo "Sorry invalid credential.";
                    }
                }

            ?>
    </div>
        <div class="login-pane">
       
            <h2>Please Login to proceed</h2>
            <form action="checkLogin.php" method="POST">
            <?php if (isset($_GET['error'])) { ?>
<p class="error">
    <?php
    echo $_GET['error']; 
    ?>
</p>
<?php } 
    if (isset($_GET['viewresult'])){ ?>
<p class="error">
    <?php
    echo "Please Login to view result";
    ?>
</p>
    <?php }
    if (isset($_GET['vote'])){ ?>
        <p class="error">
            <?php
            echo "Please Login to cast your Vote";
            ?>
        </p>
    <?php } ?> 

                <div class="form-group">
                    <input type="text" name="login_id" placeholder="Login ID / College ID" aria-required="true">
                </div>
                <div class="form-group">
                    <input type="password" name="password" placeholder="Enter Password" aria-required="true">
                </div>
                <div class="form-group">
                     <input type="Submit" value="Login" class="sbutton"></a>
                </div>
                <span class="or">OR</span>
                <div class="form-group">
                    <a href="rgstr.php"><input type="button" value="Register Here" class="sbutton"></a>
                </div>
                
    
            </form>
        </div>
       </div>
    </div>
</body>

</html>
<?php
 }
?>