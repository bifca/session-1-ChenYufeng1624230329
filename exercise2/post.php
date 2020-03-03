<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

//创建连接
$conn = new mysqli($servername, $username, $password, $dbname);
//检测连接
if ($conn->connect_error) {
    die("连接失败:".$conn->connect_error);
}

$id = $_POST['id'];
$picture = $_POST['picture'];
$title = $_POST['title'];
$decribe = $_POST['decribe'];

$sql = "INSERT INTO myguests (id, picture, title, decribe)
VALUES('$id', '$picture', '$title', '$decribe')";

if ($conn->query($sql) === TRUE) {
  header("Location: ./index.php");
} else {
  echo "Error:".$sql."<br/>".$conn->error;
}

$conn->close();


?>