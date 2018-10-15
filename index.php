<?php
include ("connection.php");
?>
<style>
    <?php include ("style.css") ?>
</style>

<html>
<body>
<div id="login" class="loginBox">
    <h1>Login</h1>
    <form action="functions.php" method="post">
        <label> Username </label> <br/>
        <input type="text" name="username" id="username" > <br/><br/>
        <label> Password </label> <br/>
        <input type="password" name="password" id="password"> <br/><br/>

        <input type="text" value="login" name="function" id="function" style="display: none" > <br/><br/>
        <input class="loginButton" type="submit" value="Login"><br/>
    </form>
</div>
</body>
</html>
