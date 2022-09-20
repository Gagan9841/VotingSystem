<?php
session_start(); 

include "connection.php";

if (isset($_POST['adm_login']) && isset($_POST['adm_pw'])) {

    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }

    $uname = validate($_POST['adm_login']);

    $pass = validate($_POST['adm_pw']);

    if (empty($uname)) {

        header("Location: admin_login.php?error=User Name is required");

        exit();

    }else if(empty($pass)){

        header("Location: admin_login.php?error=Password is required");

        exit();

    }else{

        $sql = "SELECT * FROM `admin` WHERE `loginId`='$uname' AND `pass`='$pass'";

        $res = mysqli_query($conn, $sql);

        if (mysqli_num_rows($res) === 1) {

            $row = mysqli_fetch_assoc($res);

            if ($row['loginId'] === $uname && $row['pass'] === $pass) {

                echo "Logged in!";

                $_SESSION['login_id'] = $row['loginId'];

                // $_SESSION['name'] = $row['name'];

                // $_SESSION['id'] = $row['id'];

                header("Location: dashboard.php");

                exit();

            }else{

                header("Location: admin_login.php?error=Incorect User name or password");

                exit();

            }

        }else{

            header("Location: admin_login.php?error=Incorect User name or password");

            exit();

        }

    }

}else{

    header("Location: hmpg.php");

    exit();

}
?>