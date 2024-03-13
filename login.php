<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "project"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $role = $row['role'];
    
    switch ($role) {
        case 'user':
            header("Location: userform.php");
            break;
        case 'admin':
            header("Location: controladmin.php");
            break;
        case 'stockmanager':
            header("Location: supplierform.php");
            break;
        default:
            echo "Invalid role";
    }
} else {
    echo "Invalid username or password";
}

$conn->close();
?>