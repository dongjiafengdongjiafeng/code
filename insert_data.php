<?php
header("Content-type:text/html;charset=utf-8"); //���ñ���
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

// ��������
$conn = mysqli_connect($servername, $username, $password, $dbname);
// �������
if (!$conn) {
 die("Connection failed: " . mysqli_connect_error());
}
//$t1,$t2,$t3,$t4
$sql = "INSERT INTO time_stamps (type,rd,t1,t2,t3,t4,client) VALUES ('$type',$rd,$t1,$t2,$t3,$t4,'$client')";

if (mysqli_query($conn, $sql)) {
 echo "�¼�¼����ɹ�";
} else {
 echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
���н��