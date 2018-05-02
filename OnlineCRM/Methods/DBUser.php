
<?php
include_once 'db.php';
$id = mysqli_real_escape_string($conn, $_POST['id']);
$firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
$lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$department = mysqli_real_escape_string($conn, $_POST['department']);
$position = mysqli_real_escape_string($conn, $_POST['position']);

if (isset($_POST['add'])) {


    /* if (!preg_match("/^[a-zA-Z]*$/", $firstname) || !preg_match("/^[a-zA-Z]*$/", $firstname)) {
      echo "<script>
      alert('First Name or Last Name is not correct!');
      window.location.href='http://localhost:8888/OnlineCRM/home.php?content=users';
      </script>";
      exit();
      } else { */
//check if email is valid
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: {$_SERVER['HTTP_REFERER']}");
        echo "<script>
                    alert('Email address is not correct!');
                    window.location.href='http://localhost:8888/OnlineCRM/home.php?content=users';
                    </script>";
        exit();
    } else {
        $sql1 = "SELECT * FROM users WHERE userName = '$username'";
        $result = mysqli_query($conn, $sql1);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck > 0) {
            header("Location: {$_SERVER['HTTP_REFERER']}");
            echo "<script>
                    alert('This UserName is exist!');
                    window.location.href='http://localhost:8888/OnlineCRM/home.php?content=users';
                    </script>";
        } else {
//hashing the password
            $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
//insert the user into the database
            $sql2 = "INSERT INTO users (firstName, lastName, email, userName, password, department, position) "
                    . "VALUES ('$firstname', '$lastname', '$email', '$username', '$hashedPwd', '$department', '$position');";
            mysqli_query($conn, $sql2);
            header("Location: {$_SERVER['HTTP_REFERER']}");
            echo "<script>
                alert('New record created successfully!');
                window.location.href='http://localhost:8888/OnlineCRM/home.php?content=users';
                </script>";
        }
    }
} elseif (isset($_POST['update'])) {


    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

    $sql = "UPDATE users SET firstName='$firstname', lastName='$lastname', email='$email', "
            . "userName='$username', password='$hashedPwd', department='$department', position='$position' WHERE id='$id';";

    if ($conn->query($sql) === TRUE) {
        header("Location: {$_SERVER['HTTP_REFERER']}");
        echo "<script>
                        alert('Update is done!');
                        window.location.href='http://localhost:8888/OnlineCRM/home.php?content=users';
                        </script>";
    } else {

        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
elseif (isset ($_POST['delete'])) {

            $sql = "DELETE FROM users WHERE id='$id'";

            if ($conn->query($sql) === TRUE) {
header("Location: {$_SERVER['HTTP_REFERER']}");
                echo "<script>
alert('Delete successfully');
window.location.href='http://localhost:8888/OnlineCRM/home.php?content=users';
</script>";
            } else {

                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
}
?>
</body>
</html>
