<?php
include ("header.php");

$sql = "SELECT * FROM customers";
$result = mysqli_query($GLOBALS['conn'], $sql);

?>

<ul class="sidenav" style="float:right;">
    <li class="sidenavList" id="newCustomerbtn"><a href="#" onclick="newCustomer()" >Add New Customer</a></li>
    <li class="sidenavList" style="display: none" id="customerbtn"><a href="#" onclick="viewCustomers()"> All Customers </a></li>
</ul>

<div id="newCustomerDiv" style="display: none">
    <h1>Add New Customer</h1>
    <center><div style="width: 90pc">
            <form style="width: content-box" action="functions.php" method="post">
                <div style="position: absolute">
                    <label>First Name</label><br/>
                    <input type="text" id="firstname" name="firstname" style="width: 40pc"><br/><br/>
                </div>

                <div style="float: right;">
                    <label>Last Name</label><br/>
                    <input type="text" id="lastname" name="lastname" style="width: 40pc">
                </div><br/><br/><br/><br/>

                <div style="position: absolute">
                    <label>Email</label><br/>
                    <input type="text" id="email" name="email" style="width: 40pc"><br/><br/>

                </div>

                <div style="float: right;">
                    <label>Contact Number</label><br/>
                    <input type="text" id="contact_no" name="contact_no" style="width: 40pc"><br/><br/>
                </div><br/><br/><br/><br/><br/><br/>

                <input type="text" value="addCustomer" name="function" id="function" style="display: none" > <br/><br/>
                <input type="submit" value="Save Details" class="loginButton"  style="width: 90pc; height: 45px">
            </form>
        </div></center>
</div>

<div id="viewCustomerDiv">
    <h1>All Customers</h1>
    <center><table>
            <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Contact Number</th>
                <th colspan="2">Options</th>
            </tr>
            </thead>
            <tbody>
            <?php while($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row["firstname"]; ?></td>
                    <td><?php echo $row["lastname"]; ?></td>
                    <td><?php echo $row["email"]; ?></td>
                    <td><?php echo $row["contact_number"]; ?></td>
                    <td><button class="iconBtn"><i class="fa fa-pencil"></i></button></td>
                    <form action="functions.php" method="post"><input type="text" value="deleteCustomer" name="function" id="function" style="display: none; position: absolute" >
                    <input type="text" value="<?php echo $row["id"]; ?>" name="id" id="id" style="display: none; position: absolute" >
                    <td><button class="iconBtn" name="deleteCustomer" id="deleteCustomer"><i class="fa fa-trash"></i></button></td></form>
                    </tr>
            <?php } ?>
            </tbody>
        </table></center>
</div>

<script>
    function newCustomer() {
        document.getElementById('viewCustomerDiv').style.display = 'none';
        document.getElementById('newCustomerbtn').style.display = 'none';
        document.getElementById('customerbtn').style.display = 'block';
        document.getElementById('newCustomerDiv').style.display = 'block';
    }

    function viewCustomers() {
        document.getElementById('viewCustomerDiv').style.display = 'block';
        document.getElementById('newCustomerbtn').style.display = 'block';
        document.getElementById('customerbtn').style.display = 'none';
        document.getElementById('newCustomerDiv').style.display = 'none';
    }
</script>