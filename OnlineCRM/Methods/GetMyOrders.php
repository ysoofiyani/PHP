<?php

include 'db.php';
session_start();

if ($_SESSION['position'] === 'Manager'){
$sql = "SELECT o.id o_id, u.firstName u_firstName, u.lastName u_lastName, p.productName p_productName, c.firstName c_firstName, c.lastName c_lastName, o.quantity o_quantity, o.price o_price, o.saleDate o_saleDate FROM orders o JOIN users u ON o.userId = u.id JOIN products p ON o.productId = p.id JOIN  contacts c ON o.customerId = c.id;";
}
 else {
    $uid = $_SESSION['id'];
    $sql = "SELECT o.id o_id, u.firstName u_firstName, u.lastName u_lastName, p.productName p_productName, c.firstName c_firstName, c.lastName c_lastName, o.quantity o_quantity, o.price o_price, o.saleDate o_saleDate FROM orders o JOIN users u ON o.userId = u.id JOIN products p ON o.productId = p.id JOIN  contacts c ON o.customerId = c.id WHERE u.id='$uid';";
}
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {

        echo '<tr>
		<td>' . $row['o_id'] . '</td>
		<td>' . $row['u_firstName'] . ' ' . $row['u_lastName'] . '</td>
		<td>' . $row['o_saleDate'] . '</td>
                <td>' . $row['c_firstName'] . ' ' . $row['c_lastName'] . '</td>
                <td>' . $row['p_productName'] . '</td>
                <td>' . $row['o_quantity'] . '</td>
                <td>' . $row['o_price'] . '</td>
            </tr>';
    }
} else {
    echo '<tr>
		<td>No Data</td>
                <td>No Data</td>
                <td>No Data</td>
                <td>No Data</td>
                <td>No Data</td>
                <td>No Data</td>
                <td>No Data</td>
            </tr>';
}

mysqli_close($conn);
