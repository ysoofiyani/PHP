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
        // put your code here
        $firstName = 'Andy';
        $lastName = 'Tall';
        $myVar = 'Hi my name is ' .$firstName. ' '.$lastName. '.';
        echo $myVar;
        ?>
        <br>
        
        <?php
        $myName = 'Andy & Amos';
        echo htmlspecialchars($myName);
        ?>
        <br>
        
        <?php
        $myVar = 'the book of days';
        echo ucfirst($myVar);
        ?>
        <br>
        
        <?php
        $myVar = 'THE BOOK OF daYs';
        echo ucwords(strtolower($myVar));
        ?>
        <br>
        
        <?php
        //$employee = array('Sally Meyers', 'George Smith');
        
        $employee = array('name'=>'Sally Meyers', 'position'=>'President', 'yearEmployed'=>2017);
        $employee['name'] = 'Sally Meyers';
        $employee['position'] = 'President';
        $employee['yearEmployed'] = 2017;
        
        print_r($employee);
        ?>
        <br>
        
        <?php
        $employees = array(
            array('name'=>'Sally Meyers', 'position'=>'President', 'yearEmployed'=>2017),
            array('name'=>'George Smith', 'position'=>'Treasurer', 'yearEmployed'=>2016),
            array('name'=>'Peter Hengel', 'position'=>'Clerk', 'yearEmployed'=>1992),
        );
        ?>
        <pre>
            <?php print_r($employees);?>
        </pre>
    </body>
</html>
