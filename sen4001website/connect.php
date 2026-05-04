<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Eventify</title>
</head>
<?php 

$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "eventifydb";

// Create connection 

$conn = new mysqli($servername, $username, $password, $database); 

// Check connection 

if ($conn->connect_error) { 

  die("Connection failed: " . $conn->connect_error); 

} 

?> 
<body>
</body>
</html>