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
         <h1>Welcome to Lab 02</h1>
        <p>Today is Apr. 16, 2018</p>
        
        
        <p>Today is <?php echo date('M j, Y'); ?>
        </p>
        
        <?php
        // put your code here
        
        //
        echo date("l js \of F Y h:i:s A");
        echo "<br />";
        //
        echo "April 21, 2018 is on a " .
                date ("l", mktime(0,0,0,3,21,2018));
                echo "<br />";
        //
        echo date (DATE_RFC822);
        echo "<br />";
        
        //
        echo date(DATE_ATOM, mktime(0,0,0,7,1,2020));
        echo "<br />";
        
        ?>
    </body>
</html>
