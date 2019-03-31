<?php
header("Content-type:text/html;charset=utf-8"); //设置编码
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "my_db";

$type =$_GET['type'];
$rd = $_GET['rd'];
$t1 = $_GET['t1'];
$t2 = $_GET['t2'];
$t3 = $_GET['t3'];
$t4 = $_GET['t4'];
$client = $_GET['client'];

// 创建连接
$conn = mysqli_connect($servername, $username, $password, $dbname);
// 检测连接
if (!$conn) {
 die("Connection failed: " . mysqli_connect_error());
}
//$t1,$t2,$t3,$t4
$sql = "INSERT INTO time_stamps (type,rd,t1,t2,t3,t4,client) VALUES ('$type',$rd,$t1,$t2,$t3,$t4,'$client')";

if (mysqli_query($conn, $sql)) {
 echo "新记录插入成功";
} else {
 echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
运行结果