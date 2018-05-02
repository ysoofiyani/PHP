
        <?php
        
        include_once 'db.php';
            session_start();
            
            $productID = mysqli_real_escape_string($conn, $_POST['productname']);
            $customerID = mysqli_real_escape_string($conn, $_POST['customername']);
            $userID = $_SESSION['id'];
            $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);

            $sqlprice = "SELECT * FROM products WHERE id='$productID'";
            $result = mysqli_query($conn, $sqlprice);
            $row = mysqli_fetch_assoc($result);
            $price = $row['price'];
            $totalPrice = $price * $quantity;
            
        if (isset($_POST['add'])) {
            

            $sql = "INSERT INTO orders (userId, productId, customerId, quantity, price) "
                    . "VALUES ('$userID', '$productID', '$customerID', '$quantity', '$totalPrice');";
            if ($conn->query($sql) === TRUE) {
                header("Location: {$_SERVER['HTTP_REFERER']}");
                echo "<script>
                        alert('New record created successfully');
                        window.location.href='http://localhost:8888/OnlineCRM/home.php?content=myOrders';
                    </script>";
            } else {

                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

