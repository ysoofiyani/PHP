
<div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none; padding: 0 5px;" id="mySidebar">
    <button class="w3-bar-item w3-button w3-large"
            onclick="w3_close()">Close &times;</button>

    <form method="POST" action="Methods/DBUser.php">


        <input type="text" name="id" id="id" placeholder="ID" readonly="readonly">
        
        <input type="text" name="firstname" id="firstname" placeholder="First Name">

        <input type="text" name="lastname" id="lastname" placeholder="Last Name">

        <input type="email" name="email" id="email" placeholder="Email">

        <input type="text" name="username" id="username" placeholder="User Name">

        <input type="password" name="password" id="password" placeholder="Password">

        <label for="department" class="select">Department</label>
        <select name="department" id="department">
            <option value="IT">IT</option>
            <option value="Sales">Sales</option>
            <option value="Finance">Finance</option>
            <option value="Marketing">Marketing</option>
        </select>

        <label for="position" class="select">Position</label>
        <select name="position" id="position">
            <option value="Manager">Manager</option>
            <option value="Salesperson">Salesperson</option>
            <option value="Clerk">Clerk</option>
        </select>

        <input type="submit" name="add" data-inline="true" value="Add">
        <input type="submit" name="update" data-inline="true" value="Update">
        <input type="submit" name="delete" value="Delete" 
               onclick="return confirm('Would you like to delete user ?');">
    </form>
</div>

<div id="main">

    <div style="float: left; margin-left: 10px;">
        <?php
        if ($_SESSION['position'] === 'Manager') {
            echo '<button id="openNav" class="w3-button" onclick="w3_open()">&#9776; Users</button>';
        }
        ?>


    </div>
    <table data-role="table" id="user_table" data-mode="columntoggle" class="ui-responsive table-stroke data-table">
        <caption class="title"></caption>
        <thead>
            <tr>
                <th data-priority="critical">ID</th>
                <th data-priority="critical">First Name</th>
                <th data-priority="critical">Last Name</th>
                <th data-priority="critical">Email</th>
                <th data-priority="critical">Department</th>
                <th data-priority="critical">Position</th>
            </tr>
        </thead>
        <tbody>
            <?php include 'Methods/GetUsers.php'; ?>
        </tbody>
    </table>
</div>
<script>
    var table = document.getElementById("user_table"), rIndex;
    for (var i = 1; i < table.rows.length; i++) {

        table.rows[i].onclick = function () {
            rIndex = this.rowIndex;
            this.classList.toggle("selected");
            console.log(rIndex);
            document.getElementById("id").value = this.cells[0].innerHTML;

            document.getElementById("firstname").value = this.cells[1].innerHTML;
            document.getElementById("lastname").value = this.cells[2].innerHTML;
            document.getElementById("email").value = this.cells[3].innerHTML;
            document.getElementById("department").value = this.cells[4].innerHTML;
            document.getElementById("position").value = this.cells[5].innerHTML;
        };
    }
</script>
