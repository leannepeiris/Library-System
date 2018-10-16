<?php
include ("header.php");

$sql = "SELECT * FROM books";
$result = mysqli_query($GLOBALS['conn'], $sql);

?>

<ul class="sidenav" style="float:right;">
    <li class="sidenavList" id="newBookbtn"><a href="#" onclick="newBook()" >Add New Book</a></li>
    <li class="sidenavList" style="display: none" id="bookbtn"><a href="#" onclick="viewBooks()"> All Books</a></li>
</ul>

<div id="newBookDiv" style="display: none">
    <h1>Add New Book</h1>
    <center><div style="width: 90pc">
    <form style="width: content-box" action="functions.php" method="post">
        <div style="position: absolute">
            <label>Title</label><br/>
            <input type="text" id="title" name="title" style="width: 40pc"><br/><br/>
        </div>

        <div style="float: right;">
        <label>Genre</label><br/>
        <input type="text" id="genre" name="genre" style="width: 40pc">
        </div><br/><br/><br/><br/>

        <div style="position: absolute">
            <label>Author</label><br/>
            <input type="text" id="author" name="author" style="width: 40pc"><br/><br/>

        </div>

        <div style="float: right;">
            <label>Publisher</label><br/>
            <input type="text" id="publisher" name="publisher" style="width: 40pc"><br/><br/>
        </div><br/><br/><br/><br/><br/><br/>

        <input type="text" value="addBook" name="function" id="function" style="display: none" > <br/><br/>
        <input type="submit" value="Save Details" class="loginButton"  style="width: 90pc; height: 45px">
    </form>
    </div></center>
</div>

<div id="viewBookDiv">
<h1>All Books</h1>
<center><table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Genre</th>
        <th>Author</th>
        <th>Publisher</th>
        <th>Options</th>
    </tr>
    </thead>
    <tbody>
        <?php while($row = $result->fetch_assoc()) { ?>
            <form action="functions.php" method="post"><tr>
                <td><?php echo $row["id"]; ?></td>
                <td><?php echo $row["title"]; ?></td>
                <td><?php echo $row["genre"]; ?></td>
                <td><?php echo $row["author"]; ?></td>
                <td><?php echo $row["publisher"]; ?></td>
                <input type="text" value="deleteBook" name="function" id="function" style="display: none; position: absolute" >
                <input type="text" value="<?php echo $row["id"]; ?>" name="id" id="id" style="display: none; position: absolute" >
                <td><button class="iconBtn"><i class="fa fa-pencil"></i></button>&ensp;<button class="iconBtn" name="deleteBook" id="deleteBook"><i class="fa fa-trash"></i></button></td>
            </tr></form>
        <?php } ?>
    </tbody>
</table></center>
</div>


<script>
function newBook() {
    document.getElementById('viewBookDiv').style.display = 'none';
    document.getElementById('newBookbtn').style.display = 'none';
    document.getElementById('bookbtn').style.display = 'block';
    document.getElementById('newBookDiv').style.display = 'block';
}

function viewBooks() {
    document.getElementById('viewBookDiv').style.display = 'block';
    document.getElementById('newBookbtn').style.display = 'block';
    document.getElementById('bookbtn').style.display = 'none';
    document.getElementById('newBookDiv').style.display = 'none';
}
</script>


