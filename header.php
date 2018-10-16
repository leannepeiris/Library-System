<?php
$pageType = basename($_SERVER["SCRIPT_FILENAME"], '.php');
include ("connection.php");
session_start();
?>

<style>
    <?php include ("style.css") ?>
</style>

<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="background" >

<ul class="navbar">
    <li class="navbarList"><a href="home.php">Dashboard</a></li>
    <li class="navbarList"><a href="authors.php">Authors</a></li>
    <li class="navbarList"><a href="publishers.php">Publishers</a></li>
    <li class="navbarList"><a href="books.php">Books</a></li>
    <li class="navbarList"><a href="customers.php">Customers</a></li>
    <li <?php if($_SESSION["type"] == "employee") { ?> style="display: none" <?php } ?> class="navbarList"><a href="employees.php">Employees</a></li>
    <li class="navbarList" style="float: right">
        <div class="dropdown">
            <button class="dropbtn">Hello, <?php echo $_SESSION["logged_in_user_name"]; ?>
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="functions.php">Log Out</a>
            </div>
        </div>
    </li>
</ul>
