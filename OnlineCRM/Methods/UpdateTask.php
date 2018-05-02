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
            include 'db.php';
            
            $id = mysqli_real_escape_string($conn, $_POST['id_u']);
            $todo = mysqli_real_escape_string($conn, $_POST['todo_u']);
            $contact = mysqli_real_escape_string($conn, $_POST['contact_u']);
            $subject = mysqli_real_escape_string($conn, $_POST['subject_u']);
            $date = mysqli_real_escape_string($conn, $_POST['datepicker_u']);
            $isdone = mysqli_real_escape_string($conn, $_POST['isdone_u']);

            $sql = "UPDATE tasks SET todo='$todo', contactId='$contact', subject='$subject', date='$date', isdone='$isdone' WHERE id='$id';";
            
            if ($conn->query($sql) === TRUE) {
                echo "<script>
                        alert('Update is done!');
                        window.location.href='http://localhost:8888/OnlineCRM/home.php?content=tasks';
                        </script>";
            } else {

                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        ?>
    </body>
</html>
