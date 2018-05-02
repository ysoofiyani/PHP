<?php
session_start();
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        if (isset($_POST['submit'])) {
            include_once 'db.php';

            $user_name = mysqli_real_escape_string($conn, $_POST['username']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);
            
            $sql = "SELECT * FROM users WHERE userName = '$user_name'";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
           
            if ($resultCheck < 1) {
                echo "<script>
                    alert('username is not correct!');
                    window.location.href='http://localhost:8888/OnlineCRM/index.php';
                    </script>";
                //header("Location: index.php?login=error");
                //exit();
            } else {
                if ($row = mysqli_fetch_assoc($result)) {
                    //De-hashing the password
                    $hashedPwdCheck = password_verify($password, $row['password']);
                    if ($hashedPwdCheck == FALSE) {
                        echo "<script>
                    alert('password is not correct!');
                    window.location.href='http://localhost:8888/OnlineCRM/index.php';
                    </script>";
                        // header("Location: index.php?login=error");
                        //exit();
                    } elseif ($hashedPwdCheck == TRUE) {
                        //Log in the user here
                        $_SESSION['id'] = $row['id'];
                        $_SESSION['firstname'] = $row['firstName'];
                        $_SESSION['lastname'] = $row['lastName'];
                        $_SESSION['department'] = $row['department'];
                        $_SESSION['position'] = $row['position'];

                        echo "<script>
                    alert('Welcome!');
                    window.location.href='http://localhost:8888/OnlineCRM/home.php';
                    </script>";
                        //header('Location: http://localhost:8888/OnlineCRM/home.php');
                        
                        //exit();
                    }
                }
            }
        }
        ?>
    </body>
</html>
