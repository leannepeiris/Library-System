<?php
include ("header.php");

$sql = "SELECT * FROM borrowed_books WHERE status != '2'";
$result = mysqli_query($GLOBALS['conn'], $sql);
if ($result->num_rows > 0)
{
    while($row = $result->fetch_assoc()){
        $due_date = new DateTime($row['due_date']);
        $today = new DateTime();
        if($due_date < $today) {
            $id = $row['id'];
            $sql = "UPDATE borrowed_books SET status = '1', overdue = '1' WHERE id = '$id'";
    
            if ($GLOBALS['conn']->query($sql) === TRUE) {  
    
            } else {
                echo "Error: " . $sql . "<br>" . $GLOBALS['conn']->error;
            }
        }
    }
}

$finalSql = "SELECT * FROM borrowed_books WHERE status != '2'";
$finalResult = mysqli_query($GLOBALS['conn'], $finalSql); 

$historySql = "SELECT * FROM borrowed_books WHERE status = '2'";
$history = mysqli_query($GLOBALS['conn'], $historySql);

$booksSql = "SELECT * FROM books";
$books = mysqli_query($GLOBALS['conn'], $booksSql);

$bookNames = [];
while($row = $books->fetch_assoc()) {
    $names = [
        $row['id'] => $row['title']
    ];
    $bookNames = $names + $bookNames;
}

$customersSql = "SELECT * FROM customers";
$customers = mysqli_query($GLOBALS['conn'], $customersSql);

$customerNames = [];
while($row = $customers->fetch_assoc()) {
    $names = [
        $row['id'] => $row['firstname']." ".$row['lastname']
    ];
    $customerNames = $names + $customerNames;
}

$status = [
    0 => 'On Loan',
    1 => 'Overdue',
    2 => 'Completed'
];
?>

<script>
    function newBorrowed() {
        document.getElementById('viewBorrowedDiv').style.display = 'none';
        document.getElementById('newBorrowedbtn').style.display = 'none';
        document.getElementById('historybtn').style.display = 'none';
        document.getElementById('historyDiv').style.display = 'none';
        document.getElementById('borrowedbtn').style.display = 'block';
        document.getElementById('newBorrowedDiv').style.display = 'block';
    }

    function viewBorroweds() {
        document.getElementById('viewBorrowedDiv').style.display = 'block';
        document.getElementById('newBorrowedbtn').style.display = 'block';
        document.getElementById('historybtn').style.display = 'block';
        document.getElementById('historyDiv').style.display = 'none';
        document.getElementById('borrowedbtn').style.display = 'none';
        document.getElementById('newBorrowedDiv').style.display = 'none';
    }

    function viewHistory() {
        document.getElementById('viewBorrowedDiv').style.display = 'none';
        document.getElementById('newBorrowedbtn').style.display = 'block';
        document.getElementById('historyDiv').style.display = 'block';
        document.getElementById('historybtn').style.display = 'none';
        document.getElementById('borrowedbtn').style.display = 'block';
        document.getElementById('newBorrowedDiv').style.display = 'none';
    }
</script>

<ul class="sidenav" style="float:right;">
    <li class="sidenavList" id="newBorrowedbtn"><a href="#" onclick="newBorrowed()" >Add New Book</a></li>
    <li class="sidenavList" id="historybtn"><a href="#" onclick="viewHistory()" >History</a></li>
    <li class="sidenavList" style="display: none" id="borrowedbtn"><a href="#" onclick="viewBorroweds()"> All Borrowed Books </a></li>
</ul>

<div id="newBorrowedDiv" style="display: none">
    <h1>Add New Borrowed</h1>
    <center><div style="width: 90pc">
            <form style="width: content-box" action="functions.php" method="post">
                <div style="position: absolute">
                    <label>Book</label><br/>
                    <select id="book" name="book" style="width: 40pc">
                        <?php foreach ($bookNames as $key => $name) { ?>
                            <option value="<?php echo $key; ?>"><?php echo $name; ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div style="float: right;">
                    <label>Customer</label><br/>
                    <select id="customer" name="customer" style="width: 40pc">
                        <?php foreach ($customerNames as $key => $name) { ?>
                            <option value="<?php echo $key; ?>"><?php echo $name; ?></option>
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
                <th>Overdue Charge</th>
                <th>Status</th>
                <th colspan="2">Options</th>
            </tr>
            </thead>
            <tbody>
            <?php while($row = $finalResult->fetch_assoc()){ ?>
                <tr>
                    <td><?php echo $row["id"]; ?></td>
                    <td><?php echo $GLOBALS['bookNames'][$row["book"]]; ?></td>
                    <td><?php echo $GLOBALS['customerNames'][$row["customer"]]; ?></td>
                    <td><?php echo $row["borrowed_date"]; ?></td>
                    <td><?php echo $row["due_date"]; ?></td>
                    <td><?php if ($row["status"] != "2") { echo 'N/A'; } else { echo $row["overdue_charge"];} ?></td>
                    <td><?php echo $GLOBALS['status'][$row["status"]] ?></td>
                    <td><button class="iconBtn"><i class="fa fa-pencil"></i></button></td>
                    <form action="functions.php" method="post"><input type="text" value="updateStatus" name="function" id="function" style="display: none; position: absolute" >
                    <input type="text" value="<?php echo $row["id"]; ?>" name="id" id="id" style="display: none; position: absolute" >
                    <td><button class="iconBtn" name="updateStatus" id="updateStatus"><i class="fa fa-check"></i></button></td></form>
                    <form action="functions.php" method="post"><input type="text" value="deleteBorrowedBook" name="function" id="function" style="display: none; position: absolute" >
                    <input type="text" value="<?php echo $row["id"]; ?>" name="id" id="id" style="display: none; position: absolute" >
                    <td><button class="iconBtn" name="deleteBorrowedBook" id="deleteBorrowedBook"><i class="fa fa-trash"></i></button></td></form>
                </tr>
            <?php } ?>
            </tbody>
        </table></center>
</div>

<div id="historyDiv" style="display: none">
    <h1>History</h1>
    <center><table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Book</th>
                <th>Customer</th>
                <th>Borrowed Date</th>
                <th>Due Date</th>
                <th>Overdue Charge</th>
                <th>Status</th>
                <th colspan="2">Options</th>
            </tr>
            </thead>
            <tbody>
            <?php while($row = $history->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row["id"]; ?></td>
                    <td><?php echo $row["book"]; ?></td>
                    <td><?php echo $row["customer"]; ?></td>
                    <td><?php echo $row["borrowed_date"]; ?></td>
                    <td><?php echo $row["due_date"]; ?></td>
                    <td><?php if ($row["overdue"] == 1) { echo $row["overdue_charge"]; } else { echo "No Charge"; } ?></td>
                    <td><?php echo $GLOBALS['status'][$row["status"]] ?></td>
                    <td><button class="iconBtn"><i class="fa fa-pencil"></i></button></td>
                    <form action="functions.php" method="post"><input type="text" value="deleteBorrowedBook" name="function" id="function" style="display: none; position: absolute" >
                    <input type="text" value="<?php echo $row["id"]; ?>" name="id" id="id" style="display: none; position: absolute" >
                    <td><button class="iconBtn" name="deleteBorrowedBook" id="deleteBorrowedBook"><i class="fa fa-trash"></i></button></td></form>
                </tr>
            <?php } ?>
            </tbody>
        </table></center>
</div>