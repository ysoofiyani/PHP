
        <?php
        
        session_start();
            include 'db.php';
$id = mysqli_real_escape_string($conn, $_POST['id']);
            $todo = mysqli_real_escape_string($conn, $_POST['todo']);
            $contact = mysqli_real_escape_string($conn, $_POST['contact']);
            $subject = mysqli_real_escape_string($conn, $_POST['subject']);
            $date = mysqli_real_escape_string($conn, $_POST['datepicker']);
            $isdone = mysqli_real_escape_string($conn, $_POST['isdone']);
            $userID = $_SESSION['id'];
            
        if (isset($_POST['add'])) {
            

            $sql = "INSERT INTO tasks (todo, contactId, subject, date, isdone, userId) "
                    . "VALUES ('$todo', '$contact', '$subject', '$date', '$isdone', '$userID');";
            if ($conn->query($sql) === TRUE) {
                header("Location: {$_SERVER['HTTP_REFERER']}");
                echo "<script>
                        alert('New record created successfully');
                        window.location.href='http://localhost:8888/OnlineCRM/home.php?content=tasks';
                        </script>";
            } else {

                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        elseif (isset ($_POST['update'])) {
        $sql = "UPDATE tasks SET todo='$todo', contactId='$contact', subject='$subject', date='$date', isdone='$isdone' WHERE id='$id';";
            
            if ($conn->query($sql) === TRUE) {
                header("Location: {$_SERVER['HTTP_REFERER']}");
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
