<?php
include ("header.php");
?>

<ul class="sidenav" style="float:right;">
    <li class="sidenavList" id="newAuthorbtn"><a href="#" onclick="newAuthor()" >Add New Author</a></li>
    <li class="sidenavList" style="display: none" id="authorbtn"><a href="#" onclick="viewAuthors()"> All Authors </a></li>
</ul>

<div id="newAuthorDiv" style="display: none">
    <h1>Add New Author</h1>
    <center><div style="width: 90pc">
    <form style="width: content-box" action="functions.php?addAuthor">
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

        <input type="text" value="addAuthor" hidden>
        <input type="submit" value="Save Details" class="loginButton"  style="width: 90pc; height: 45px">
    </form>
    </div></center>
</div>

<div id="viewAuthorDiv">
<h1>view or edit authors</h1>
</div>

<?php include ("footer.php"); ?>

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


