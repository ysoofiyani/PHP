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
        if(isset($_POST['submit'])){
            session_unset();
            session_destroy();
            echo "<script>
                    alert('Logout success!');
                    window.location.href='http://localhost:8888/OnlineCRM/index.php';
                    </script>";
        }
        ?>
    </body>
</html>
