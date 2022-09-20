<?php 
session_start();
if(isset($_SESSION['login_id']) && !empty($_SESSION['login_id'])) {
   $admin_user=$_SESSION['login_id'];
   header('location:dashboard.php');
}
   ?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Login</title>
    <link rel="stylesheet" href="../../css/admin_login.css" />
  </head>
  <body>
    <div class="content">
      <div class="flex-div">
        <div class="name-content">
          <h1 class="logo">
              <span class="election">Online Voting</span>
                <span class="day">System</span></h1>
        </div>
          <form method="POST" action="check_login.php">
          <?php if (isset($_GET['error'])) { ?>

<p class="error"><?php echo $_GET['error']; ?></p>

<?php } ?>
            <input type="text" placeholder="Login Id" name="adm_login" required />
            <input type="password" placeholder="Password" name="adm_pw" required>
            <button class="login">Log In</button>
            <hr>
            <button class="user-login" onclick="userLogin()">User Login</button>
          </form>
      </div>
    </div>
  </body>
</html>
<script>
  function userLogin(){
      window.location.href='../user/lgn.php';
  }
</script>
