
<?php

include 'db.php';

$id = mysqli_real_escape_string($conn, $_POST['id']);
$productname = mysqli_real_escape_string($conn, $_POST['productname']);
$price = mysqli_real_escape_string($conn, $_POST['price']);
$quantity = mysqli_real_escape_string($conn, $_POST['quantity']);

if (isset($_POST['add'])) {

    $sql1 = "SELECT * FROM products WHERE productName = '$productname'";
    $result = mysqli_query($conn, $sql1);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0) {
        header("Location: {$_SERVER['HTTP_REFERER']}");
        echo "<script>
                    alert('This product is exist!');
                    window.location.href='http://localhost:8888/OnlineCRM/home.php?content=products';
                    </script>";
    } else {

        $sql2 = "INSERT INTO products (productName, price, quantity) "
                . "VALUES ('$productname', '$price', '$quantity');";
        mysqli_query($conn, $sql2);
        header("Location: {$_SERVER['HTTP_REFERER']}");
        echo "<script>
                alert('New record created successfully!');
                window.location.href='http://localhost:8888/OnlineCRM/home.php?content=products';
                </script>";
    }
} elseif (isset($_POST['update'])) {
    $sql = "UPDATE products SET productName='$productname', price='$price', quantity='$quantity' WHERE id = $id';";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../home.php?content=products");
    } else {

        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
} elseif (isset($_POST['delete'])) {
    $sql = "DELETE FROM products WHERE id='$id'";

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
