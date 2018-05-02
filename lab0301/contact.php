
    <div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="mySidebar">
        <button class="w3-bar-item w3-button w3-large"
                onclick="w3_close()">Close &times;</button>
        <div data-role="collapsible" >
            <h2>Add New Contact Info</h2>
            <form method="post" action="Methods/AddContactInfo.php">
                <div>

                    <label for="firstName" class="ui-hidden-accessible">First Name:</label>
                    <input type="text" name="firstName" id="firstName" placeholder="First Name">

                    <label for="lastName" class="ui-hidden-accessible">Last Name</label>
                    <input type="text" name="lastName" id="lastName" placeholder="Last Name">

                    <label for="company" class="ui-hidden-accessible">Company</label>
                    <input type="text" name="company" id="company" placeholder="Company">

                    <label for="address" class="ui-hidden-accessible">Address</label>
                    <input type="text" name="address" id="address" placeholder="Address">

                    <label for="phone" class="ui-hidden-accessible">Phone</label>
                    <input type="text" name="phone" id="phone" placeholder="Phone">

                    <label for="email" class="ui-hidden-accessible">Email</label>
                    <input type="text" name="email" id="email" placeholder="Email">

                    <input type="submit" data-inline="true" value="Add">
                </div>
            </form>
        </div>

        <div data-role="collapsible">
            <h2>Update Contact Info</h2>
            <form method="post" action="Methods/UpdateContactInfo.php">
                <div>

                    <label for="id_u" class="ui-hidden-accessible">ID:</label>
                    <input type="text" name="id_u" id="id_u" placeholder="ID" readonly="readonly">

                    <label for="firstName_u" class="ui-hidden-accessible">First Name:</label>
                    <input type="text" name="firstName_u" id="firstName_u" placeholder="First Name">

                    <label for="lastName_u" class="ui-hidden-accessible">Last Name</label>
                    <input type="text" name="lastName_u" id="lastName_u" placeholder="Last Name">

                    <label for="company_u" class="ui-hidden-accessible">Company</label>
                    <input type="text" name="company_u" id="company_u" placeholder="Company">

                    <label for="address_u" class="ui-hidden-accessible">Address</label>
                    <input type="text" name="address_u" id="address_u" placeholder="Address">

                    <label for="phone_u" class="ui-hidden-accessible">Phone</label>
                    <input type="text" name="phone_u" id="phone_u" placeholder="Phone">

                    <label for="email_u" class="ui-hidden-accessible">Email</label>
                    <input type="text" name="email_u" id="email_u" placeholder="Email">

                    <input type="submit" data-inline="true" value="Update">
                </div>
            </form>
        </div>
        <div>
            <form method="post" action="Methods/DeleteContactInfo.php">
                <input type="text" name="id_d" id="id_d">
                <input type="submit" name="delete" value="Delete" 
                       onclick="return confirm('Would you like to delete contact of\n <span></span>?');">

            </form >
        </div> 
    </div>

    <div id="main">

        <div style="float: left; margin-left: 10px;">
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
                document.getElementById("id_u").value = this.cells[0].innerHTML;
                document.getElementById("id_d").value = this.cells[0].innerHTML;
                document.getElementById("firstName_u").value = this.cells[1].innerHTML;
                document.getElementById("firstName_a").value = this.cells[1].innerHTML;
                document.getElementById("lastName_u").value = this.cells[2].innerHTML;
                document.getElementById("lastName_a").value = this.cells[2].innerHTML;
                document.getElementById("company_u").value = this.cells[3].innerHTML;
                document.getElementById("address_u").value = this.cells[4].innerHTML;
                document.getElementById("phone_u").value = this.cells[5].innerHTML;
                document.getElementById("email_u").value = this.cells[6].innerHTML;
            };
        }
    </script>
