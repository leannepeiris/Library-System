<?php
include ("connection.php");

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "library";
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if($_POST['function'] == 'login')
{
    login();
}
else if($_POST['function'] == 'addAuthor')
{
    addAuthor();
}
else if($_POST['function'] == 'addAuthor')
{
    addAuthor();
}
else if($_POST['function'] == 'editAuthor')
{
    editAuthor();
}
else if($_POST['function'] == 'deleteAuthor')
{
    deleteAuthor();
}

function login()
{
    $myusername=$_POST['username'];
    $mypassword=$_POST['password'];

    $sql = "SELECT * FROM employees WHERE email='$myusername' AND  password='$mypassword'";

    $result = mysqli_query($GLOBALS['conn'], $sql);

    if ($result->num_rows > 0)
    {
        if ($row = $result->fetch_assoc())
        {
            session_start();
            $_SESSION["logged_in_user_id"] = $row['id'];
            $_SESSION["logged_in_user_name"] = $row['firstname'];
            $_SESSION["type"] = $row['type'];
            header("location:home.php");
        }

    } else {
        header("location:index.php");
    }
    $GLOBALS['conn']->close();
}

function addAuthor()
{
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $penname = $_POST['penname'];
    $genre = $_POST['genre'];
    $publisher = $_POST['publisher'];

    $sql = "INSERT INTO authors (firstname, lastname, penname, genre, publisher)
    VALUES ('$firstname', '$lastname', '$penname', '$genre', '$publisher')";

    if ($GLOBALS['conn']->query($sql) === TRUE) {
        echo "New record created successfully";
        header("location:authors.php");

    } else {
        echo "Error: " . $sql . "<br>" . $GLOBALS['conn']->error;
    }
}
function editAuthor()
{
    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $penname = $_POST['penname'];
    $genre = $_POST['genre'];
    $publisher = $_POST['publisher'];

    $sql = "UPDATE authors SET firstname = '$firstname', lastname = '$lastname', penname = '$penname', genre = '$genre', publisher = '$publisher' WHERE id = '$id'";

    if ($GLOBALS['conn']->query($sql) === TRUE) {
        echo "Record updated successfully";
        header("location:authors.php");

    } else {
        echo "Error: " . $sql . "<br>" . $GLOBALS['conn']->error;
    }
}
function deleteAuthor()
{
    $id = $_POST['id'];
    $sql = "DELETE FROM authors WHERE id = $id";

    if ($GLOBALS['conn']->query($sql) === TRUE) {
        echo "Record deleted successfully";
        header("location:authors.php");
    } else {
        echo "Error deleting record: " . $GLOBALS['conn']->error;
    }
}



