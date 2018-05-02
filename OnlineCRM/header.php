<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
session_start();
require_once 'includes/functions.php';
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>       
<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
  <script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
http://code.jquery.com/mobile/1.4.5/jquery.mobile.structure-1.4.5.min.css
--> 
<html>
    <head>
        <meta charset="UTF-8">
        <link href="css/table.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"/>
        <link rel="stylesheet" type="text/css" href="CSS/w3.css"/>
        <meta http-equiv="cache-control" content="no-cache" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.12.4.js"></script>
        <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>



        <title></title>
    </head>
    <body>
        
       <!-- <img src="images/webstrip.jpg" class="w3-round" alt="CRM" style="height: 100px; width: 100%"> -->

        <div class="w3-bar w3-light-blue w3-hide-small">

            <a href="home.php?content=tasks" class="w3-bar-item w3-button">My Tasks</a>
            <a href="home.php?content=contact" class="w3-bar-item w3-button w3-hide-small">Contacts</a>
            <a href="home.php?content=users" class="w3-bar-item w3-button w3-hide-small">Users</a>
            <a href="home.php?content=products" class="w3-bar-item w3-button w3-hide-small">Products</a>
            <a href="home.php?content=myOrders" class="w3-bar-item w3-button w3-hide-small">My Order</a>
            <form method="POST" action="Methods/logout.php" >
                <button type="submit" name="submit"class=" w3-bar-item w3-button w3-right w3-light-blue" style="margin-right: 20px;">Logout</button>
            </form>
            <span class="w3-bar-item w3-right"><?php echo $_SESSION['firstname']. ' '.$_SESSION['lastname']; ?></span>
            
        </div>
        
        <div class="w3-bar w3-light-blue w3-hide-medium w3-hide-large">

            <a href="home.php?content=tasks" class="w3-bar-item w3-button" title="My Task">T</a>
            <a href="home.php?content=contact" class="w3-bar-item w3-button" title="Contacts">C</a>
            <a href="home.php?content=users" class="w3-bar-item w3-button" title="Users">U</a>
            <a href="home.php?content=products" class="w3-bar-item w3-button" title="Products">P</a>
            <a href="home.php?content=myOrders" class="w3-bar-item w3-button" title="My Order">O</a>
            <form method="POST" action="Methods/logout.php" >
                <button type="submit" name="submit"class=" w3-bar-item w3-button w3-right w3-light-blue" style="margin-right: 20px;">Logout</button>
            </form>
            <span class="w3-bar-item w3-right"><?php echo $_SESSION['firstname']. ' '.$_SESSION['lastname']; ?></span>
            
        </div>
        
        

