<?php
include "connection.php";
session_start(); 


if (isset($_POST['login_id']) && isset($_POST['password'])) {

    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }

    $uname = validate($_POST['login_id']);

    $pass = validate($_POST['password']);

    if (empty($uname)) {

        // header("Location: lgn.php?error=Login ID is required");
        echo "lgn id req";

        exit();

    }else if(empty($pass)){

        // header("Location: lgn.php?error=Password is required");
        echo "pw req";

        exit();

    }else{

        $sql = "SELECT * FROM `voter_list` WHERE `College_Id_No.`= '$uname' AND `password`= '$pass';";

        $res = mysqli_query($conn,$sql);
        
        if(mysqli_num_rows($res)>0){
            
            $row = mysqli_fetch_array($res);
            
            if ($row['College_Id_No.'] === $uname && $row['password'] === $pass) {
                
                

                $_SESSION['userLoginId'] = $row['College_Id_No.'];
                $_SESSION['start'] = time();
                $_SESSION['expire'] = $_SESSION['start'] + (1 * 60);
                $_SESSION['fullname'] = $row['Full_name'];

                // $_SESSION['id'] = $row['id'];
                echo $_SESSION['fullname'];
                                echo "user success";


                // header("location:../user/hmpgsuccess.php");

                exit();

            }else{

                echo "incorrect username and password";
                // header("Location: lgn.php?error=Incorect User name or password");

                exit();

            }

        }else{

            echo "incorrect username or pw";
            // header("Location: lgn.php?error=Incorect User name or password");

            exit();

        }

    }

}else{

    // echo $sql;

    exit();

}