<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
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
        <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
        <link href="CSS/main.css" rel="stylesheet" type="text/css"/>
        <link href="CSS/util.css" rel="stylesheet" type="text/css"/>
        <title></title>
        <style>
            body, html {
                height: 100%;
                margin: 0;
            }
        </style>
    </head>
    <body>
        <div class="limiter">
            <div class="container-login100" style="background-image: url('images/img-01.jpg');">
                <div class="wrap-login100 p-t-190 p-b-30">
                    <form class="login100-form validate-form" method="POST" action="Methods/Login.php">

                        <div class="wrap-input100 validate-input m-b-10">
                            <input class="input100" type="text" name="username" id="username" placeholder="Username" required="required">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-user"></i>
                            </span>
                        </div>

                        <div class="wrap-input100 validate-input m-b-10" >
                            <input class="input100" type="password" name="password" id="password" placeholder="Password" required="required">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-lock"></i>
                            </span>
                        </div>

                        <div class="container-login100-form-btn p-t-10">
                            <button class="login100-form-btn" type="submit" name="submit">
                                Login
                            </button>
                        </div>

                        <div class="text-center w-full p-t-25 p-b-230">
                            <a href="#" class="txt1">
                                Forgot Username / Password?
                            </a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
