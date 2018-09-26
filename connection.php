<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "library";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass);

if(!$conn) {
    die("Could not Connect: ". mysqli_error($conn)); echo "<br/>";
} //echo "Connected Successfully"; echo "<br/>";
mysqli_select_db($conn,$dbname);

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS ". $dbname;
if ($conn->query($sql) === TRUE) {
    //echo "Database created successfully"; echo "<br/>";
} else {

    echo "Error creating database: " . $conn->error; echo "<br/>";
}

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// creating the tables in the database
//employee table
$employees = "CREATE TABLE IF NOT EXISTS employees (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
firstname VARCHAR(191) NOT NULL,
lastname VARCHAR(191) NOT NULL,
email VARCHAR(191),
created_at TIMESTAMP
)";

if ($conn->query($employees) === TRUE) {
    //echo "Table Employees created successfully"; echo "<br/>";
} else {
    echo "Error creating table: " . $conn->error; echo "<br/>";
}

//books table
$books = "CREATE TABLE IF NOT EXISTS  books (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
title VARCHAR(191) NOT NULL,
author VARCHAR(191) NOT NULL,
publisher VARCHAR(191),
created_at TIMESTAMP
)";

if ($conn->query($books) === TRUE) {
    //echo "Table Books created successfully"; echo "<br/>";
} else {
    echo "Error creating table: " . $conn->error; echo "<br/>";
}