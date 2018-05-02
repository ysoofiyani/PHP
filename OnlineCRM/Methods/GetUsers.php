<?php

include_once 'db.php';


$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {

        echo '<tr>
		<td>' . $row['id'] . '</td>
		<td>' . $row['firstName'] . '</td>
		<td>' . $row['lastName'] . '</td>
                <td>' . $row['email'] . '</td>
                <td>' . $row['department'] . '</td>
                <td>' . $row['position'] . '</td>
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
