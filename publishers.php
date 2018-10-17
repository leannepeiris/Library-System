<?php
include ("header.php");

$sql = "SELECT * FROM publishers";
$result = mysqli_query($GLOBALS['conn'], $sql);

?>

<ul class="sidenav" style="float:right;">
    <li class="sidenavList" id="newPublisherbtn"><a href="#" onclick="newPublisher()" >Add New Publisher</a></li>
    <li class="sidenavList" style="display: none" id="publisherbtn"><a href="#" onclick="viewPublishers()"> All Publishers</a></li>
</ul>

<div id="newPublisherDiv" style="display: none">
    <h1>Add New Publisher</h1>
    <center><div style="width: 90pc">
            <form style="width: content-box" action="functions.php" method="post">
                <div style="position: absolute">
                    <label>Name</label><br/>
                    <input type="text" id="name" name="name" style="width: 40pc"><br/><br/>
                </div>

                <div style="float: right;">
                    <label>City</label><br/>
                    <input type="text" id="city" name="city" style="width: 40pc"><br/><br/>
                </div><br/><br/><br/><br/><br/><br/>

                <input type="text" value="addPublisher" name="function" id="function" style="display: none" > <br/><br/>
                <input type="submit" value="Save Details" class="loginButton"  style="width: 90pc; height: 45px">
            </form>
        </div></center>
</div>

<div id="viewPublisherDiv">
    <h1>All Publishers</h1>
    <center><table>
            <thead>
            <tr>
                <th>Name</th>
                <th>City</th>
                <th colspan="2">Options</th>
            </tr>
            </thead>
            <tbody>
            <?php while($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row["name"]; ?></td>
                    <td><?php echo $row["city"]; ?></td>
                    <td><button class="iconBtn"><i class="fa fa-pencil"></i></button></td>
                    <form action="functions.php" method="post"><input type="text" value="deletePublisher" name="function" id="function" style="display: none; position: absolute" >
                    <input type="text" value="<?php echo $row["id"]; ?>" name="id" id="id" style="display: none; position: absolute" >
                    <td><button class="iconBtn" name="deletePublisher" id="deletePublisher"><i class="fa fa-trash"></i></button></td></form>
                    </tr>
            <?php } ?>
            </tbody>
        </table></center>
</div>


<script>
    function newPublisher() {
        document.getElementById('viewPublisherDiv').style.display = 'none';
        document.getElementById('newPublisherbtn').style.display = 'none';
        document.getElementById('publisherbtn').style.display = 'block';
        document.getElementById('newPublisherDiv').style.display = 'block';
    }

    function viewPublishers() {
        document.getElementById('viewPublisherDiv').style.display = 'block';
        document.getElementById('newPublisherbtn').style.display = 'block';
        document.getElementById('publisherbtn').style.display = 'none';
        document.getElementById('newPublisherDiv').style.display = 'none';
    }
</script>


