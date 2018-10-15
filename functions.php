<?php
include ("connection.php");

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "library";

if($_POST['function'] == 'login')
{
    login();
}
function login()
{
    $conn = mysqli_connect($GLOBALS['dbhost'], $GLOBALS['dbuser'], $GLOBALS['dbpass'], $GLOBALS['dbname']);

    $myusername=$_POST['username'];
    $mypassword=$_POST['password'];

    $sql = "SELECT * FROM employees WHERE email='$myusername' AND  passwords='$mypassword'";


    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0)
    {
        header("location:home.php");
    } else {
        echo "0 results";
    }

    $conn->close();

}


