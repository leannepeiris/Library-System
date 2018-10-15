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
else if($_POST['function'] == 'addBook')
{
    addBook();
}
else if($_POST['function'] == 'editBook')
{
    editBook();
}
else if($_POST['function'] == 'deleteBook')
{
    deleteBook();
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

function addBook()
{
    $title = $_POST['title'];
    $genre = $_POST['genre'];
    $author = $_POST['author'];
    $publisher = $_POST['publisher'];

    $sql = "INSERT INTO books (title, genre, author, publisher)
    VALUES ('$title', '$genre', '$author', '$publisher')";

    if ($GLOBALS['conn']->query($sql) === TRUE) {
        echo "New record created successfully";
        header("location:books.php");

    } else {
        echo "Error: " . $sql . "<br>" . $GLOBALS['conn']->error;
    }
}
function editBook()
{
    $id = $_POST['id'];
    $title = $_POST['title'];
    $genre = $_POST['genre'];
    $author = $_POST['author'];
    $publisher = $_POST['publisher'];

    $sql = "UPDATE books SET title = '$title', genre = '$genre', author = '$author', publisher = '$publisher' WHERE id = '$id'";

    if ($GLOBALS['conn']->query($sql) === TRUE) {
        echo "Record updated successfully";
        header("location:books.php");

    } else {
        echo "Error: " . $sql . "<br>" . $GLOBALS['conn']->error;
    }
}
function deleteBook()
{
    $id = $_POST['id'];
    $sql = "DELETE FROM books WHERE id = $id";

    if ($GLOBALS['conn']->query($sql) === TRUE) {
        echo "Record deleted successfully";
        header("location:books.php");
    } else {
        echo "Error deleting record: " . $GLOBALS['conn']->error;
    }
}


