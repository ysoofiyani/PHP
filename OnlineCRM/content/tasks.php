
<div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none; padding: 0 5px;" id="mySidebar">
    <button class="w3-bar-item w3-button w3-large"
            onclick="w3_close()">Close &times;</button>

        <form method="POST" action="Methods/DBTask.php">
                <input type="text" name="id" id="id" placeholder="ID" readonly="readonly">

                <select name="todo" id="todo">
                    <option value="Email">Email</option>
                    <option value="Call">Call</option>
                </select>

                <select name="contact" id="contact">
                    <?php include 'Methods/GetCustomerName.php'; ?>
                </select>

                <input type="text" name="subject" id="subject" placeholder="Subject">

                <input type="text" data-role="date" name="datepicker" id="datepicker" placeholder="Date">

                <fieldset data-role="controlgroup">
                    <input type="checkbox" name="isdone" id="isdone" value="IsDone">
                    <label for="isdone">Is Done</label>
                </fieldset>
                <br/>
                <input type="submit" name="add"  value="Add">
                <input type="submit" name="update" value="Add">
                <input type="submit" name="delete" value="Delete" 
                   onclick="return confirm('Would you like to delete task <?php echo $id ?> ?');">
        </form>
    </div>

<div id="main">

    <div style="float: left; margin-left: 10px;">
        <button id="openNav" class="w3-button"  onclick="w3_open()">&#9776; My Task</button>

    </div>
    <table data-role="table" id="task_table" data-mode="columntoggle" class=" ui-responsive table-stroke data-table">
        <caption class="title"></caption>
        <thead>
            <tr>
                <th data-priority="critical">ID</th>
                <th data-priority="critical">To Do</th>
                <th data-priority="critical">Contact</th>
                <th data-priority="critical">Subject</th>
                <th data-priority="critical">Date</th>
                <th data-priority="critical">Status</th>

            </tr>
        </thead>
        <tbody>
            <?php include 'Methods/GetTasks.php'; ?>
        </tbody>
    </table>
</div>

<script>
    var table = document.getElementById("task_table"), rIndex;
    for (var i = 1; i < table.rows.length; i++) {
        table.rows[i].onclick = function () {
            rIndex = this.rowIndex;
            this.classList.toggle("selected");
            console.log(rIndex);
            document.getElementById("id").value = this.cells[0].innerHTML;
            document.getElementById("todo").selected = this.cells[1].innerHTML;
            document.getElementById("contact").selected = this.cells[2].innerHTML;
            document.getElementById("subject").value = this.cells[3].innerHTML;
            document.getElementById("datepicker").value = this.cells[4].innerHTML;
            document.getElementById("isdone").value = this.cells[5].innerHTML;
        };
    }
</script>
