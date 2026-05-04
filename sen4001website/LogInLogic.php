<?php
session_start();
include 'connect.php';



if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $Username = trim($_POST['Username']);
    $Email    = trim($_POST['Email']);
    $Password = $_POST['Password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE Username = ? AND Email = ?");
    $stmt->bind_param("ss", $Username, $Email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        die("Invalid Username or Email.");
    }

    $user = $result->fetch_assoc();

    
   
    // checks if password matches
    if (password_verify($Password, $user['Password'])) {

        $_SESSION['UserID']   = $user['UserID'];
        $_SESSION['Username'] = $user['Username'];

        header("Location: index.php");
        exit();

    } else {
        echo "Incorrect password.";
    }

    $stmt->close();
    $conn->close();
}
?>