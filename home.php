<?php
if (empty($_SESSION["logged_in_user"]))
{
    header("location:index.php");
}

include ("header.php");

?>

<h1>Dashboard</h1></Home>
