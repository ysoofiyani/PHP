<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="bookRegistration.css">
        <title></title>
       
    </head>
    <body>
        <h2>Book Registration Form</h2>
        <p>Please fill in all fields and click Register.</p>
        <form method="post" action="bookRegistration.php">
            <h3 class="title">User Information</h3>
            <p class="blue">Please fill out the fields below.</p>
            <label class="lb" for="firstName">First Name</label>
            <input type="text" name="firstName" id="firstName" required="required"/>
            <br/>
            <label class="lb" for="lastName">Last Name</label>
            <input type="text" name="lastName" id="lastName" required="required"/>
            <br/>
            <label class="lb" for="email">Email</label>
            <input type="text" name="email" id="email" required="required"/>
            <br/>
            <label class="lb" for="phone">Phone</label>
            <input type="tel" pattern="^(\([0-9]{3}\))[0-9]{3}-[0-9]{4}$" name="phone" id="phone" required="required" />
            <br/>
            <p>Must be in the form (555)555-5555</p>
            <h3 class="title">Publication</h3>
            <p class="blue">Which book would you like information about?</p>
            <select name="publication" id="publication">
                <option value="Programming PHP 3E">Programming PHP 3E</option>
                <option value="Practical PHP and MySQL Website Database">Practical PHP and MySQL Website Database</option>
                <option value="PHP Quick Scripting Reference">PHP Quick Scripting Reference</option>
                <option value="Object-Oriented PHP">Object-Oriented PHP</option>
            </select>
            <h3 class="title">Operating System</h3>
            <p class="blue">Which operating system are you currently using?</p>
            <input type="radio" name="os" value="Windows XP" checked> Windows XP
            <input type="radio" name="os" value="Windows Vista">Windows Vista<br/>
            <input type="radio" name="os" value="Mac OS X"> Mac OS X
            <input type="radio" name="os" value="Linux"> Linux
            <input type="radio" name="os" value="Other"> Other <br/>
            <br/>
            <input type="submit" value="Register"/> 
        </form>
       
    </body>
</html>
