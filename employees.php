<?php
include ("header.php");

$sql = "SELECT * FROM employees";
$result = mysqli_query($GLOBALS['conn'], $sql);

?>

<ul class="sidenav" style="float:right;">
    <li class="sidenavList" id="newEmployeebtn"><a href="#" onclick="newEmployee()" >Add New Employee</a></li>
    <li class="sidenavList" style="display: none" id="employeebtn"><a href="#" onclick="viewEmployees()"> All Employees </a></li>
</ul>

<div id="newEmployeeDiv" style="display: none">
    <h1>Add New Employee</h1>
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
                    <input type="text" id="contact_no" name="contact_no" style="width: 40pc">
                </div><br/><br/><br/><br/>

                <div style="position: absolute">
                    <label>Date Of Birth</label><br/>
                    <input type="date" id="date_of_birth" name="date_of_birth" style="width: 40pc"><br/><br/>
                </div>

                <div style="float: right;">
                    <label>Type</label><br/>
                    <input type="text" id="type" name="type" style="width: 40pc"><br/><br/>
                </div><br/><br/><br/><br/>

                <div style="position: absolute">
                    <label>Password</label><br/>
                    <input type="password" id="password" name="password" style="width: 40pc"><br/><br/><br/>
                </div><br/><br/><br/><br/><br/><br/>

                <input type="text" value="addEmployee" name="function" id="function" style="display: none" > <br/><br/>
                <input type="submit" value="Save Details" class="loginButton"  style="width: 90pc; height: 45px">
            </form>
        </div></center>
</div>

<div id="viewEmployeeDiv">
    <h1>All Employees</h1>
    <center><table>
            <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Contact Number</th>
                <th>Type</th>
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
                    <td><?php echo $row["type"]; ?></td>
                    <td><button class="iconBtn"><i class="fa fa-pencil"></i></button></td>
                    <form action="functions.php" method="post"><input type="text" value="deleteEmployee" name="function" id="function" style="display: none; position: absolute" >
                    <input type="text" value="<?php echo $row["id"]; ?>" name="id" id="id" style="display: none; position: absolute" >
                    <td><button class="iconBtn" name="deleteEmployee" id="deleteEmployee"><i class="fa fa-trash"></i></button></td></form>
                    </tr>
            <?php } ?>
            </tbody>
        </table></center>
</div>


<script>
    function newEmployee() {
        document.getElementById('viewEmployeeDiv').style.display = 'none';
        document.getElementById('newEmployeebtn').style.display = 'none';
        document.getElementById('employeebtn').style.display = 'block';
        document.getElementById('newEmployeeDiv').style.display = 'block';
    }

    function viewEmployees() {
        document.getElementById('viewEmployeeDiv').style.display = 'block';
        document.getElementById('newEmployeebtn').style.display = 'block';
        document.getElementById('employeebtn').style.display = 'none';
        document.getElementById('newEmployeeDiv').style.display = 'none';
    }
</script>


