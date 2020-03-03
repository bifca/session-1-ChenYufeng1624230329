<?php
// include database connection file

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
 
// Get genreid from URL to delete that genre
$id = $_GET['id'];
 
// Delete genre row from table based on given genreid
$sql = ("DELETE FROM myguests WHERE id=$id");
 if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
// After delete redirect to Home, so that latest genre list will be displayed.
header("Location:index.php");
?>