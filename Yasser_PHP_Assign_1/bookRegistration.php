
<link rel="stylesheet" href="bookRegistration.css">
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$publication = $_POST['publication'];
$os = $_POST['os'];


echo "<p> Hi <span class='blue'>" .$firstName. "</span>. Thank you for completing the survey.</p>";
echo "<p>You have been added to the <span class='blue'>" .$publication. "</span> mailing list.</p>";
echo "<h3>The following information has been saved in our database:</h3>";
echo "<table class='table'>
  <tr >
    <th>Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>OS</th>
  </tr>
  <tr>
    <td>".$firstName." ".$firstName."</td>
    <td>".$email."</td>
    <td>".$phone."</td>
    <td>".$os."</td>    
  </tr>
</table>";