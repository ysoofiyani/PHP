
    <div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none; padding: 0 5px;" id="mySidebar">
        <button class="w3-bar-item w3-button w3-large"
                onclick="w3_close()">Close &times;</button>
        
            <form method="post" action="Methods/DBContact.php">
                    <input type="text" name="id" id="id" placeholder="ID" class="w3-input w3-border w3-round-large" readonly="readonly">

                    <input type="text" name="firstname" id="firstname" class="w3-input w3-border w3-round-large" placeholder="First Name" required>

                    <input type="text" name="lastname" id="lastname" class="w3-input w3-border w3-round-large" placeholder="Last Name" required>

                    <input type="text" name="company" id="company" placeholder="Company" class="w3-input w3-border w3-round-large" required>

                    <input type="text" name="address" id="address" class="w3-input w3-border w3-round-large" placeholder="Address" required>

                    <input type="tel" name="phone" id="phone" class="w3-input w3-border w3-round-large" placeholder="Phone" required>

                    <input type="email" name="email" id="email" class="w3-input w3-border w3-round-large" placeholder="Email" required>
                    
                    <input type="submit" name="submit_add" class="w3-button w3-round-xxlarge" value="Add">
                    <input type="submit" name="submit_update" class="w3-button w3-round-xxlarge" value="Update">
                    <input type="submit" name="submit_delete" class="w3-button w3-round-xxlarge" value="Delete" 
                       onclick="return confirm('Would you like to delete contact ?');">
                    
            </form>
        </div>

    <div id="main">

        <div  style="float: left; margin-left: 10px;">
            <button id="openNav" class="w3-button" onclick="w3_open()">&#9776; Customers</button>         
        </div>
        
            <table data-role="table" id="contact_table" data-mode="columntoggle" class="ui-responsive table-stroke data-table">
                <caption class="title"></caption>
                <thead>
                    <tr>
                        <th data-priority="critical">ID</th>
                        <th data-priority="critical">First Name</th>
                        <th data-priority="critical">Last Name</th>
                        <th data-priority="critical">Company</th>
                        <th data-priority="critical">Address</th>
                        <th data-priority="critical">Phone</th>
                        <th data-priority="critical">Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php include 'Methods/GetContactInfo.php'; ?>
                </tbody>
            </table>
        
    </div>


    <script>
        var table = document.getElementById("contact_table"), rIndex;
        for (var i = 1; i < table.rows.length; i++) {
            table.rows[i].onclick = function () {
                
                rIndex = this.rowIndex;
                this.classList.toggle("selected");
                console.log(rIndex);
                document.getElementById("id").value = this.cells[0].innerHTML;
                document.getElementById("firstname").value = this.cells[1].innerHTML;
                document.getElementById("lastname").value = this.cells[2].innerHTML;
                document.getElementById("company").value = this.cells[3].innerHTML;
                document.getElementById("address").value = this.cells[4].innerHTML;
                document.getElementById("phone").value = this.cells[5].innerHTML;
                document.getElementById("email").value = this.cells[6].innerHTML;
                document.getElementById("id").value = this.cells[null].innerHTML;
            };
        }
        
    </script>
