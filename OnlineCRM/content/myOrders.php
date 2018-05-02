
<div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none; padding: 0 5px;" id="mySidebar">
    <button class="w3-bar-item w3-button w3-large"
            onclick="w3_close()">Close &times;</button>

    <form method="POST" action="Methods/DBMyOrder.php">
       
            <input type="text" name="id" id="id" placeholder="ID" readonly="readonly">
            
            <select name="customername" id="customername">
                <option>Customers</option>
                <?php include 'Methods/GetCustomerName.php'; ?>
            </select>


            <select name="productname" id="productname">
                <option>Products</option>
                <?php include 'Methods/GetProductName.php'; ?>
            </select>

            <input type="text" name="quantity" id="quantity" placeholder="Quantity">

            <input type="submit" name="add"  value="Add">
            <input type="submit" name="update" value="Update">
            <input type="submit" name="delete" value="Delete" 
               onclick="return confirm('Would you like to delete product ?');">
        
    </form>
</div>


<div id="main">

    <div style="float: left; margin-left: 10px;">
        <button id="openNav" class="w3-button"  onclick="w3_open()">&#9776; My Order</button>

    </div>
    <table data-role="table" id="order_table" data-mode="columntoggle" class="ui-responsive table-stroke data-table">
        <caption class="title"></caption>
        <thead>
            <tr>
                <th data-priority="critical">ID</th>
                <th data-priority="critical">Salesperson</th>
                <th data-priority="critical">Sale Date</th>
                <th data-priority="critical">Customer</th>
                <th data-priority="critical">Product</th>
                <th data-priority="critical">Quantity</th>
                <th data-priority="critical">Total Price</th>
            </tr>
        </thead>
        <tbody>
            <?php include 'Methods/GetMyOrders.php'; ?>
        </tbody>
    </table>
</div>

<script>
    var table = document.getElementById("order_table"), rIndex;
    for (var i = 1; i < table.rows.length; i++) {
        table.rows[i].onclick = function () {
            rIndex = this.rowIndex;
            this.classList.toggle("selected");
            console.log(rIndex);
            document.getElementById("id").value = this.cells[0].innerHTML;
            document.getElementById("customername").selected = this.cells[3].innerHTML;
            document.getElementById("productname").selected = this.cells[4].innerHTML;
            document.getElementById("quantity").value = this.cells[5].innerHTML;
        };
    }
</script>
