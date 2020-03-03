<?php
// This page is used to update database content
$id = $_POST["id"];
$picture = $_POST["picture"];
$title= $_POST["title"];
$decribe = $_POST["decribe"];

 session_start();
 $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "mydb";
  
  //创建连接
  $conn = new mysqli($servername, $username, $password, $dbname);
  //检测连接
  if ($conn->connect_error) {
      die("Connection failed:".$conn->connect_error);
  }

 $sql = "update myguests set picture='$picture',title='$title',decribe='$decribe' where id=$id";
 
 if ($conn->query($sql) == TRUE) {
  //查看有多少行记录影响
  if ($conn->affected_rows>0) {
    header("Location: index.php?ok=1");
  } else {
    header("Location: index.php");
  }
} else {
  echo "Error:".$sql."<br/>".$conn->error;
}
$conn->close();
?>