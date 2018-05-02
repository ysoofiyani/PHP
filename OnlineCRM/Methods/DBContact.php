
<?php

include 'db.php';


//get values
$id = mysqli_real_escape_string($conn, $_POST['id']);
$firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
$lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
$company = mysqli_real_escape_string($conn, $_POST['company']);
$address = mysqli_real_escape_string($conn, $_POST['address']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);
$email = mysqli_real_escape_string($conn, $_POST['email']);

if (isset($_POST['submit_add'])) {

    $sql = "INSERT INTO contacts (firstName, lastName, company, address, phone, email)
VALUES ('$firstname', '$lastname', '$company', '$address', '$phone', '$email')";

    if ($conn->query($sql) === TRUE) {
        header("Location: {$_SERVER['HTTP_REFERER']}");
        $messageAdd = "Customer information added!";
    } else {

        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
} elseif (isset($_POST['submit_update'])) {

    $sql = "UPDATE contacts SET firstName='$firstname', lastName ='$lastname', company='$company', "
            . "address='$address', phone='$phone', email='$email' WHERE id='$id'";


    if ($conn->query($sql) === TRUE) {

        //header("Location: {$_SERVER['HTTP_REFERER']}");
        header("Location: ../home.php?content=contact");
        echo "<script language='javascript'>alert('Update Done!')</script>";
    } else {

        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
} elseif (isset($_POST['submit_delete'])) {
    $sql = "DELETE FROM contacts WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: {$_SERVER['HTTP_REFERER']}");
    } else {

        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

