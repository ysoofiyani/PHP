<?php

include 'db.php';

$sql = "SELECT * FROM contacts";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {

        echo '<option value=' . $row['id'] . '>' . $row['id'] .'_'. $row['firstName'] .' '. $row['lastName'] . '</option>';

        
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
