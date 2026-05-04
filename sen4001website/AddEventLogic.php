<?php
include "connect.php";

$AddedBy = $_POST["AddedBy"];
$EventName = $_POST['EName'];
$EventDescription = $_POST['EDesc'];
$EventCategory = $_POST['Category'];
$StartDate = $_POST['SDate'];
$EndDate = $_POST['EDate'];
$ImageURL = $_POST['IURL'];


$stmt = $conn->prepare("INSERT INTO events (AddedBy, EventName, EventDescription, EventCategory, StartDate, EndDate, ImageURL)
VALUES (?, ?, ?, ?, ?, ?, ?)");

$stmt->bind_param("sssssss", $AddedBy, $EventName, $EventDescription, $EventCategory,  $StartDate, $EndDate, $ImageURL);

if ($stmt->execute()) {
     header("Location: index.php"); // goes back to welcome page
     exit();
    
} else {
    echo "Error: " . $stmt->error;
}

$conn->close();
?>