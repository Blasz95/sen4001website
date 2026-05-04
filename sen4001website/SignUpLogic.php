<?php
include 'connect.php';

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get inputs from the form
    $FirstName = trim($_POST['FirstName']);
    $Surname   = trim($_POST['Surname']);
    $Username  = trim($_POST['Username']);
    $Email     = trim($_POST['Email']);
    $DOB       = $_POST['DOB'];
    $Password  = $_POST['Password'];
    $ConPass   = $_POST['ConPass'];

    

    // checks if user already exists
    $stmt = $conn->prepare("SELECT * FROM users WHERE Username = ? OR Email = ?");
    $stmt->bind_param("ss", $Username, $Email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        die("Username or Email already exists.");
    }

    // hashes the password
    $HashedPassword = password_hash($Password, PASSWORD_DEFAULT);

    // prepares and inserts the user data into the users table
    $stmt = $conn->prepare("INSERT INTO users (FirstName, Surname, Username, Email, DOB, Password) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $FirstName, $Surname, $Username, $Email, $DOB, $HashedPassword);

    if ($stmt->execute()) {
        echo "Signup successful! <a href='Login.php'>Login here</a>"; //sends to diff page
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>