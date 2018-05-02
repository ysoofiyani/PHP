<?php

session_start();
include 'db.php';

$userID = $_SESSION['id'];

$sql = "SELECT t.id, t.todo, c.firstName, c.lastName, t.subject, t.date, t.isdone FROM tasks t JOIN contacts c ON t.contactId = c.id WHERE t.userId='$userID';";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {

        echo '<tr>
		<td>' . $row['id'] . '</td>
		<td>' . $row['todo'] . '</td>
		<td>' . $row['firstName'] . ' '.$row['lastName']. '</td>
                <td>' . $row['subject'] . '</td>
                <td>' . $row['date'] . '</td>
                <td>' . $row['isdone'] . '</td>
            </tr>';

        //echo "id: " . $row["id"] . " - Name: " . $row["firstname"] . " " . $row["lastname"] . "<br>";
    }
} else {
    echo '<tr>
		<td>No Data</td>
                <td>No Data</td>
                <td>No Data</td>
                <td>No Data</td>
                <td>No Data</td>
                <td>No Data</td>
            </tr>';
}

mysqli_close($conn);