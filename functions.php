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
else if($_POST['function'] == 'addEmployee')
{
    addEmployee();
}
else if($_POST['function'] == 'editEmployee')
{
    editEmployee();
}
else if($_POST['function'] == 'deleteEmployee')
{
    deleteEmployee();
}
else if($_POST['function'] == 'addBorrowedBook')
{
    addBorrowedBook();
}
else if($_POST['function'] == 'editBorrowedBook')
{
    editBorrowedBook();
}
else if($_POST['function'] == 'deleteBorrowedBook')
{
    deleteBorrowedBook();
}
else if($_POST['function'] == 'updateStatus')
{
    updateStatus();
}
else 
{
    logout();
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
        $data = "Incorrect";
        header("location:index.php?data=".$data);
    }
    $GLOBALS['conn']->close();
}

function logout()
{
    session_start();
    session_unset(); 
    session_destroy(); 
    header("location:index.php");
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

function addEmployee()
{
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $contact_no = $_POST['contact_no'];
    $date_of_birth = $_POST['date_of_birth'];
    $type = $_POST['type'];

    $sql = "INSERT INTO employees (firstname, lastname, email, password, contact_number, date_of_birth, type)
    VALUES ('$firstname', '$lastname', '$email', '$password', '$contact_no', '$date_of_birth', '$type')";

    if ($GLOBALS['conn']->query($sql) === TRUE) {
        echo "New record created successfully";
        header("location:employees.php");

    } else {
        echo "Error: " . $sql . "<br>" . $GLOBALS['conn']->error;
    }
}
function editEmployee()
{
    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $contact_no = $_POST['contact_no'];
    $date_of_birth = $_POST['date_of_birth'];
    $type = $_POST['$type'];

    $sql = "UPDATE employees SET firstname = '$firstname', lastname = '$lastname', email = '$email', password = '$password' , contact_number = '$contact_no' , date_of_birth = '$date_of_birth' , type = '$type' WHERE id = '$id'";

    if ($GLOBALS['conn']->query($sql) === TRUE) {
        echo "Record updated successfully";
        header("location:employees.php");

    } else {
        echo "Error: " . $sql . "<br>" . $GLOBALS['conn']->error;
    }
}
function deleteEmployee()
{
    $id = $_POST['id'];
    $sql = "DELETE FROM employees WHERE id = $id";

    if ($GLOBALS['conn']->query($sql) === TRUE) {
        echo "Record deleted successfully";
        header("location:employees.php");
    } else {
        echo "Error deleting record: " . $GLOBALS['conn']->error;
    }
}

function addBorrowedBook()
{
    $book = $_POST['book'];
    $customer = $_POST['customer'];
    $borrowed_date = $_POST['borrowed_date'];
    $due_date = $_POST['due_date'];
    $overdue_charge = $_POST['overdue_charge'];
    $overdue = 0;
    $status = 0;

    $sql = "INSERT INTO borrowed_books (book, customer, borrowed_date, due_date, overdue_charge, overdue, status)
    VALUES ('$book', '$customer', '$borrowed_date', '$due_date', '$overdue_charge', '$overdue', '$status')";

    if ($GLOBALS['conn']->query($sql) === TRUE) {
        echo "New record created successfully";
        header("location:borrowed.php");

    } else {
        echo "Error: " . $sql . "<br>" . $GLOBALS['conn']->error;
    }
}
function editBorrowedBook()
{
    $id = $_POST['id'];
    $book = $_POST['book'];
    $customer = $_POST['customer'];
    $borrowed_date = $_POST['borrowed_date'];
    $due_date = $_POST['due_date'];
    $overdue_charge = $_POST['overdue_charge'];

    $sql = "UPDATE borrowed_books SET book = '$book', customer = '$customer', borrowed_date = '$borrowed_date', due_date = '$due_date', overdue_charge = '$overdue_charge' WHERE id = '$id'";

    if ($GLOBALS['conn']->query($sql) === TRUE) {
        echo "Record updated successfully";
        header("location:borrowed.php");

    } else {
        echo "Error: " . $sql . "<br>" . $GLOBALS['conn']->error;
    }
}
function deleteBorrowedBook()
{
    $id = $_POST['id'];
    $sql = "DELETE FROM borrowed_books WHERE id = $id";

    if ($GLOBALS['conn']->query($sql) === TRUE) {
        echo "Record deleted successfully";
        header("location:borrowed.php");
    } else {
        echo "Error deleting record: " . $GLOBALS['conn']->error;
    }
}
function updateStatus()
{ 
    $id = $_POST['id'];
    $sql = "UPDATE borrowed_books SET status = '2' WHERE id = '$id'";
    
    if ($GLOBALS['conn']->query($sql) === TRUE) {
        echo "Record Status Updated successfully"; 
        header("location:borrowed.php");
    } else {
        echo "Error updating record: " . $GLOBALS['conn']->error;
    }
}