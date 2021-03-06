<?php
include ("header.php");

$allBooksSql = "SELECT * FROM books";
$books = mysqli_query($GLOBALS['conn'], $allBooksSql);

$authorSql = "SELECT * FROM authors";
$authors = mysqli_query($GLOBALS['conn'], $authorSql);

$authorNames = [];
while($row = $authors->fetch_assoc()) {
    $names = [
        $row['id'] => $row['penname']
    ];
    $authorNames = $names + $authorNames;
}

$publisherSql = "SELECT * FROM publishers";
$publishers = mysqli_query($GLOBALS['conn'], $publisherSql);

$publisherNames = [];
while($row = $publishers->fetch_assoc()) {
    $names = [
        $row['id'] => $row['name']
    ];
    $publisherNames = $names + $publisherNames;
}

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
            <select id="author" name="author" style="width: 40pc">
                <?php foreach ($authorNames as $key => $name) { ?>
                    <option value="<?php echo $key; ?>"><?php echo $name; ?></option>
                <?php } ?>
                </select>
        </div>

        <div style="float: right;">
            <label>Publisher</label><br/>
            <select id="publisher" name="publisher" style="width: 40pc">
                <?php foreach ($publisherNames as $key => $name) { ?>
                    <option value="<?php echo $key; ?>"><?php echo $name; ?></option>
                <?php } ?>
            </select>
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
        <th>Title</th>
        <th>Genre</th>
        <th>Author</th>
        <th>Publisher</th>
        <th colspan="2">Options</th>
    </tr>
    </thead>
    <tbody>
        <?php while($row = $books->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row["title"]; ?></td>
                <td><?php echo $row["genre"]; ?></td>
                <td><?php echo $GLOBALS['authorNames'][$row["author"]]; ?></td>
                <td><?php echo $GLOBALS['publisherNames'][$row["publisher"]]; ?></td>
                <td><button class="iconBtn"><i class="fa fa-pencil"></i></button></td>
                <form action="functions.php" method="post"> <input type="text" value="deleteBook" name="function" id="function" style="display: none; position: absolute" >
                <input type="text" value="<?php echo $row["id"]; ?>" name="id" id="id" style="display: none; position: absolute" >
                <td><button class="iconBtn" name="deleteBook" id="deleteBook"><i class="fa fa-trash"></i></button></td></form>
            </tr>
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