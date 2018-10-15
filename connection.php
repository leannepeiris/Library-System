<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "library";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass);

if(!$conn)
{
    die("Could not Connect: ". mysqli_error($conn)); echo "<br/>";
}
mysqli_select_db($conn,$dbname);

$sql = "CREATE DATABASE IF NOT EXISTS ". $dbname;
if ($conn->query($sql) === TRUE) {
    //echo "Database created successfully"; echo "<br/>";
} else {
    echo "Error creating database: " . $conn->error; echo "<br/>";
}

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

$employees = "CREATE TABLE IF NOT EXISTS employees (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
firstname VARCHAR(191),
lastname VARCHAR(191),
email VARCHAR(191),
passwords VARCHAR(191),
contact_number VARCHAR(191),
date_of_birth VARCHAR(191),
created_at TIMESTAMP
)";

if ($conn->query($employees) === TRUE) {
    //echo "Table Employees created successfully"; echo "<br/>";
} else {
    echo "Error creating table: " . $conn->error; echo "<br/>";
}

$books = "CREATE TABLE IF NOT EXISTS  books (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
title VARCHAR(191) NOT NULL,
genre VARCHAR(191),
author VARCHAR(191),
publisher VARCHAR(191),
created_at TIMESTAMP
)";

if ($conn->query($books) === TRUE) {
    //echo "Table Books created successfully"; echo "<br/>";
} else {
    echo "Error creating table: " . $conn->error; echo "<br/>";
}

$authors = "CREATE TABLE IF NOT EXISTS  authors (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
firstname VARCHAR(191),
lastname VARCHAR(191),
genre VARCHAR(191),
publisher VARCHAR(191),
created_at TIMESTAMP
)";

if ($conn->query($authors) === TRUE) {
   // echo "Table Authors created successfully"; echo "<br/>";
} else {
    echo "Error creating table: " . $conn->error; echo "<br/>";
}

$publishers = "CREATE TABLE IF NOT EXISTS  publishers (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
name VARCHAR(191),
city VARCHAR(191),
created_at TIMESTAMP
)";

if ($conn->query($publishers) === TRUE) {
    //echo "Table publishers created successfully"; echo "<br/>";
} else {
    echo "Error creating table: " . $conn->error; echo "<br/>";
}

$customers = "CREATE TABLE IF NOT EXISTS  customers (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
firstname VARCHAR(191) NOT NULL,
lastname VARCHAR(191) NOT NULL,
email VARCHAR(191),
contact_number VARCHAR(191),
created_at TIMESTAMP
)";

if ($conn->query($customers) === TRUE) {
    //echo "Table customers created successfully"; echo "<br/>";
} else {
    echo "Error creating table: " . $conn->error; echo "<br/>";
}

$borrowed_books = "CREATE TABLE IF NOT EXISTS  borrowed_books (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
book VARCHAR(191) NOT NULL,
customer VARCHAR(191) NOT NULL,
borrowed_date TIMESTAMP,
due_date VARCHAR(191),
overdue VARCHAR(191),
overdue_charge VARCHAR(191),
fine VARCHAR(191),
created_at TIMESTAMP
)";

if ($conn->query($borrowed_books) === TRUE) {
    //echo "Table borrowed_books created successfully"; echo "<br/>";
} else {
    echo "Error creating table: " . $conn->error; echo "<br/>";
}



