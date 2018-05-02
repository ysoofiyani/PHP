
<div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none; padding: 0 5px;" id="mySidebar">
    <button class="w3-bar-item w3-button w3-large"
            onclick="w3_close()">Close &times;</button>

    <form method="POST" action="Methods/DBProduct.php">
        <input type="text" name="id_u" id="id" placeholder="ID" readonly="readonly">

        <input type="text" name="productname" id="productname" placeholder="Product Name">

        <input type="text" name="price" id="price" placeholder="Price">

        <input type="text" name="quantity" id="quantity" placeholder="Quantity">

        <input type="submit" name="add" class="w3-button w3-round-xxlarge" value="Add">
        <input type="submit" name="update" class="w3-button w3-round-xxlarge" value="Update">
        <input type="submit" name="delete" class="w3-button w3-round-xxlarge" value="Delete" 
               onclick="return confirm('Would you like to delete product ?');">
    </form>
</div>

<div id="main">

    <div style="float: left; margin-left: 10px;">
        <?php
        if ($_SESSION['position'] === 'Manager') {
            echo '<button id="openNav" class="w3-button" onclick="w3_open()">&#9776; Products</button>';
        }
        ?>

    </div>
    <table data-role="table" id="product_table" data-mode="columntoggle" class="ui-responsive table-stroke data-table">
        <caption class="title"></caption>
        <thead>
            <tr>
                <th data-priority="critical">ID</th>
                <th data-priority="critical">Product Name</th>
                <th data-priority="critical">Price</th>
                <th data-priority="critical">Quantity</th>
            </tr>
        </thead>
        <tbody>
            <?php include 'Methods/GetProducts.php'; ?>
        </tbody>
    </table>
</div>
<script>
    var table = document.getElementById("product_table"), rIndex;
    for (var i = 1; i < table.rows.length; i++) {
        table.rows[i].onclick = function () {
            rIndex = this.rowIndex;
            this.classList.toggle("selected");
            console.log(rIndex);
            document.getElementById("id").value = this.cells[0].innerHTML;
            document.getElementById("productname").value = this.cells[1].innerHTML;
            document.getElementById("price").value = this.cells[2].innerHTML;
            document.getElementById("quantity").value = this.cells[3].innerHTML;
        };
    }
</script>
