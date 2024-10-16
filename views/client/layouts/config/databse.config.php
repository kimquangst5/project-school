<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "thoi-trang";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn) {
	mysqLi_query($conn, "SET NAMES 'utf8' ");
	// echo "Kết nối databse thành công";
}
else{
	echo "Kết nối databse thất bại";
	die("Kết nối databse thất bại: " . $conn->connect_error);
}
?>