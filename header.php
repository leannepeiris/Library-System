<?php
include ("connection.php");
session_start();

?>

<style>
    <?php include ("style.css") ?>
</style>

<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body class="background">

<ul class="navbar">
    <li class="navbarList"><a href="#dashboard">Dashboard</a></li>
    <li class="navbarList"><a href="#authors">Authors</a></li>
    <li class="navbarList"><a href="#publishers">Publishers</a></li>
    <li class="navbarList"><a href="#books">Books</a></li>
    <li class="navbarList"><a href="#customers">Customers</a></li>
    <li <?php if($_SESSION["type"] == "employee") { ?> style="display: none" <?php } ?> class="navbarList"><a href="#employees">Employees</a></li>
    <li class="navbarList" style="float: right">
        <div class="dropdown">
            <button class="dropbtn">Hello, <?php echo $_SESSION["logged_in_user_name"]; ?>
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="#">Log Out</a>
            </div>
        </div>
    </li>
</ul>
