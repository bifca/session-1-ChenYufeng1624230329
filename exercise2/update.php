<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>修改雇员</title>
</head>
<body>
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

$id = $_GET['id'];
$sql = "select * from myguests where id=$id";
$res = $conn->query($sql) or
die("获取失败:".$conn->error);
    $row=$res->fetch_assoc();
?>
<h1>update</h1>
<form action="updateHandle.php" method="post">
<table>
    <tr>
        <td><input type="hidden" name="id" value="<?php echo $row["id"] ?>"></td>
    </tr>
    <tr>
        <td>picture</td>
        <td><input type="text" name="picture" value="<?php echo $row["picture"] ?>"></td>
    </tr>
    <tr>
        <td>title</td>
        <td><input type="text" name="title" value="<?php echo $row["title"] ?>"></td>
    </tr>
    <tr>
        <td>decribe</td>
        <td><input type="text" name="decribe" value="<?php echo $row["decribe"] ?>"></td>
    </tr>
    <input type="hidden" name="flag" value="updateEmp" />
    <tr>
        <td><input type="submit" value="update"/></td>
    </tr>
</table>