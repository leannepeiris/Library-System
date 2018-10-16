<?php
if (empty($_SESSION["logged_in_user"]))
{
    header("location:index.php");
}

include ("header.php");

$sql = "SELECT * FROM authors";
$result = mysqli_query($GLOBALS['conn'], $sql);

?>

<ul class="sidenav" style="float:right;">
    <li class="sidenavList" id="newAuthorbtn"><a href="#" onclick="newAuthor()" >Add New Author</a></li>
    <li class="sidenavList" style="display: none" id="authorbtn"><a href="#" onclick="viewAuthors()"> All Authors </a></li>
</ul>

<div id="newAuthorDiv" style="display: none">
    <h1>Add New Author</h1>
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
            <label>Pen Name</label><br/>
            <input type="text" id="penname" name="penname" style="width: 40pc"><br/><br/>

        </div>

        <div style="float: right;">
            <label>Genre</label><br/>
            <input type="text" id="genre" name="genre" style="width: 40pc"><br/><br/>
        </div><br/><br/><br/><br/>

        <div style="position: absolute">
            <label>Publisher</label><br/>
            <input type="text" id="publisher" name="publisher" style="width: 40pc"><br/><br/><br/>
        </div><br/><br/><br/><br/><br/><br/>

        <input type="text" value="addAuthor" name="function" id="function" style="display: none" > <br/><br/>
        <input type="submit" value="Save Details" class="loginButton"  style="width: 90pc; height: 45px">
    </form>
    </div></center>
</div>

<div id="viewAuthorDiv">
<h1>All Authors</h1>
<center><table>
    <thead>
    <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Pen Name</th>
        <th>Genre</th>
        <th>Publisher</th>
        <th>Options</th>
    </tr>
    </thead>
    <tbody>
        <?php while($row = $result->fetch_assoc()) { ?>
            <form action="functions.php" method="post"><tr>
                <td><?php echo $row["id"]; ?></td>
                <td><?php echo $row["firstname"]; ?></td>
                <td><?php echo $row["lastname"]; ?></td>
                <td><?php echo $row["penname"]; ?></td>
                <td><?php echo $row["genre"]; ?></td>
                <td><?php echo $row["publisher"]; ?></td>
                <input type="text" value="deleteAuthor" name="function" id="function" style="display: none; position: absolute" >
                <input type="text" value="<?php echo $row["id"]; ?>" name="id" id="id" style="display: none; position: absolute" >
                <td><button class="iconBtn"><i class="fa fa-pencil"></i></button>&ensp;<button class="iconBtn" name="deleteAuthor" id="deleteAuthor"><i class="fa fa-trash"></i></button></td>
            </tr></form>
        <?php } ?>
    </tbody>
</table></center>
</div>


<script>
function newAuthor() {
    document.getElementById('viewAuthorDiv').style.display = 'none';
    document.getElementById('newAuthorbtn').style.display = 'none';
    document.getElementById('authorbtn').style.display = 'block';
    document.getElementById('newAuthorDiv').style.display = 'block';
}

function viewAuthors() {
    document.getElementById('viewAuthorDiv').style.display = 'block';
    document.getElementById('newAuthorbtn').style.display = 'block';
    document.getElementById('authorbtn').style.display = 'none';
    document.getElementById('newAuthorDiv').style.display = 'none';
}
</script>


