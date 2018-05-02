<?php

include 'db.php';

$sql = "SELECT * FROM contacts";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {

        echo '<tr>
		<td>' . $row['id'] . '</td>
		<td>' . $row['firstName'] . '</td>
		<td>' . $row['lastName'] . '</td>
                <td>' . $row['company'] . '</td>
                <td>' . $row['address'] . '</td>
                <td>' . $row['phone'] . '</td>
                <td>' . $row['email'] . '</td>
            </tr>';

    }
} else {
    echo "0 results";
}

mysqli_close($conn);
