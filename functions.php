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
else if($_POST['function'] == 'addPublisher')
{
    addPublisher();
}
else if($_POST['function'] == 'editPublisher')
{
    editPublisher();
}
else if($_POST['function'] == 'deletePublisher')
{
    deletePublisher();
}
else if($_POST['function'] == 'addCustomer')
{
    addCustomer();
}
else if($_POST['function'] == 'editCustomer')
{
    editCustomer();
}
else if($_POST['function'] == 'deleteCustomer')
{
    deleteCustomer();
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

function addPublisher()
{
    $name = $_POST['name'];
    $city = $_POST['city'];

    $sql = "INSERT INTO publishers (name, city)
    VALUES ('$name', '$city')";

    if ($GLOBALS['conn']->query($sql) === TRUE) {
        echo "New record created successfully";
        header("location:publishers.php");

    } else {
        echo "Error: " . $sql . "<br>" . $GLOBALS['conn']->error;
    }
}
function editPublisher()
{
    $id = $_POST['id'];
    $name = $_POST['name'];
    $city = $_POST['city'];

    $sql = "UPDATE publishers SET name = '$name', city = '$city' WHERE id = '$id'";

    if ($GLOBALS['conn']->query($sql) === TRUE) {
        echo "Record updated successfully";
        header("location:publishers.php");

    } else {
        echo "Error: " . $sql . "<br>" . $GLOBALS['conn']->error;
    }
}
function deletePublisher()
{
    $id = $_POST['id'];
    $sql = "DELETE FROM publishers WHERE id = $id";

    if ($GLOBALS['conn']->query($sql) === TRUE) {
        echo "Record deleted successfully";
        header("location:publishers.php");
    } else {
        echo "Error deleting record: " . $GLOBALS['conn']->error;
    }
}

function addCustomer()
{
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $contact_no = $_POST['contact_no'];

    $sql = "INSERT INTO customers (firstname, lastname, email, contact_number)
    VALUES ('$firstname', '$lastname', '$email', '$contact_no')";

    if ($GLOBALS['conn']->query($sql) === TRUE) {
        echo "New record created successfully";
        header("location:customers.php");

    } else {
        echo "Error: " . $sql . "<br>" . $GLOBALS['conn']->error;
    }
}
function editCustomer()
{
    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $contact_no = $_POST['contact_no'];

    $sql = "UPDATE customers SET firstname = '$firstname', lastname = '$lastname', email = '$email', contact_number = '$contact_no' WHERE id = '$id'";

    if ($GLOBALS['conn']->query($sql) === TRUE) {
        echo "Record updated successfully";
        header("location:customers.php");

    } else {
        echo "Error: " . $sql . "<br>" . $GLOBALS['conn']->error;
    }
}
function deleteCustomer()
{
    $id = $_POST['id'];
    $sql = "DELETE FROM customers WHERE id = $id";

    if ($GLOBALS['conn']->query($sql) === TRUE) {
        echo "Record deleted successfully";
        header("location:customers.php");
    } else {
        echo "Error deleting record: " . $GLOBALS['conn']->error;
    }
}