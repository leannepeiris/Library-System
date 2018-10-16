<?php
include ("header.php");

$sql = "SELECT * FROM borrowed_books";
$result = mysqli_query($GLOBALS['conn'], $sql);

$booksSql = "SELECT * FROM books";
$books = mysqli_query($GLOBALS['conn'], $booksSql);

$customersSql = "SELECT * FROM customers";
$customers = mysqli_query($GLOBALS['conn'], $customersSql);

?>

<ul class="sidenav" style="float:right;">
    <li class="sidenavList" id="newBorrowedbtn"><a href="#" onclick="newBorrowed()" >Add New Book</a></li>
    <li class="sidenavList" style="display: none" id="borrowedbtn"><a href="#" onclick="viewBorroweds()"> All Borrowed Books </a></li>
</ul>

<div id="newBorrowedDiv" style="display: none">
    <h1>Add New Borrowed</h1>
    <center><div style="width: 90pc">
            <form style="width: content-box" action="functions.php" method="post">
                <div style="position: absolute">
                    <label>Book</label><br/>
                    <select id="book" name="book" style="width: 40pc">
                        <?php while($row = $books->fetch_assoc()) { ?>
                            <option value="<?php echo $row['title']; ?>"><?php echo $row["title"]; ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div style="float: right;">
                    <label>Customer</label><br/>
                    <select id="customer" name="customer" style="width: 40pc">
                        <?php while($row = $customers->fetch_assoc()) { ?>
                            <option value="<?php echo $row['firstname']." ".$row['lastname']; ?>"><?php echo $row['firstname']." ".$row['lastname'];; ?></option>
                        <?php } ?>
                    </select>
                </div><br/><br/><br/><br/>

                <div style="position: absolute">
                    <label>Borrowed On</label><br/>
                    <input type="date" id="borrowed_date" name="borrowed_date" style="width: 40pc"><br/><br/>
                </div>

                <div style="float: right;">
                    <label>Due On</label><br/>
                    <input type="date" id="due_date" name="due_date" style="width: 40pc">
                </div><br/><br/><br/><br/>

                <div style="position: absolute">
                    <label>Overdue Charge</label><br/>
                    <input type="text" id="overdue_charge" name="overdue_charge" style="width: 40pc"><br/><br/>
                </div><br/><br/><br/><br/><br/><br/>

                <input type="text" value="addBorrowedBook" name="function" id="function" style="display: none" > <br/><br/>
                <input type="submit" value="Save Details" class="loginButton"  style="width: 90pc; height: 45px">
            </form>
        </div></center>
</div>

<div id="viewBorrowedDiv">
    <h1>All Borrowed Books</h1>
    <center><table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Book</th>
                <th>Customer</th>
                <th>Borrowed Date</th>
                <th>Due Date</th>
                <th>Overdue</th>
                <th>Overdue Charge</th>
                <th>Options</th>
            </tr>
            </thead>
            <tbody>
            <?php while($row = $result->fetch_assoc()) { ?>
                <form action="functions.php" method="post"><tr>
                    <td><?php echo $row["id"]; ?></td>
                    <td><?php echo $row["book"]; ?></td>
                    <td><?php echo $row["customer"]; ?></td>
                    <td><?php echo $row["borrowed_date"]; ?></td>
                    <td><?php echo $row["due_date"]; ?></td>
                    <td><?php echo $row["overdue"]; ?></td>
                    <td><?php echo $row["overdue_charge"]; ?></td>
                    <input type="text" value="deleteBorrowedBook" name="function" id="function" style="display: none; position: absolute" >
                    <input type="text" value="<?php echo $row["id"]; ?>" name="id" id="id" style="display: none; position: absolute" >
                    <td><button class="iconBtn"><i class="fa fa-pencil"></i></button>&ensp;<button class="iconBtn" name="deleteBorrowedBook" id="deleteBorrowedBook"><i class="fa fa-trash"></i></button></td>
                </tr></form>
            <?php } ?>
            </tbody>
        </table></center>
</div>


<script>
    function newBorrowed() {
        document.getElementById('viewBorrowedDiv').style.display = 'none';
        document.getElementById('newBorrowedbtn').style.display = 'none';
        document.getElementById('borrowedbtn').style.display = 'block';
        document.getElementById('newBorrowedDiv').style.display = 'block';
    }

    function viewBorroweds() {
        document.getElementById('viewBorrowedDiv').style.display = 'block';
        document.getElementById('newBorrowedbtn').style.display = 'block';
        document.getElementById('borrowedbtn').style.display = 'none';
        document.getElementById('newBorrowedDiv').style.display = 'none';
    }
</script>


