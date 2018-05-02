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
       
        <h2>Get Method</h2>
        <form action="Get_process.php" method="get">
            <label for="name">Name</label>
            <input type="text" id="name" name="name">
            <br>
            <label for="password">Password</label>
            <input type="password" id="password" name="password">
            <button type="submit">Submit</button>
            <br>
        </form>
        <form>
            <h2>Post Method</h2>
            <form action="Post_process.php" method="post">
            <label for="name">Name</label>
            <input type="text" id="name" name="name">
            <br>
            <label for="password">Password</label>
            <input type="password" id="password" name="password">
            <button type="submit">Submit</button>
         </form>       
        
        <?php
        // put your code here
        ?>
    </body>
</html>
