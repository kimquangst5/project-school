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
	$pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} else {
	echo "Kết nối databse thất bại";
	die("Kết nối databse thất bại: " . $conn->connect_error);
}
