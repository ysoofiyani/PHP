<?php

include_once 'db.php';


$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {

        echo '<tr>
		<td>' . $row['id'] . '</td>
		<td>' . $row['productName'] . '</td>
		<td>' . $row['price'] . '</td>
                <td>' . $row['quantity'] . '</td>
            </tr>';
    }
} else {
    echo '<tr>
		<td>No Data</td>
                <td>No Data</td>
                <td>No Data</td>
                <td>No Data</td>
            </tr>';
}

mysqli_close($conn);
