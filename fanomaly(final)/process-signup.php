<?php
session_start();
include('config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and validate inputs
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    // Basic validation
    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        die("Please fill in all fields.");
    }
    if ($password !== $confirm_password) {
        die("Passwords do not match.");
    }

    // Check if the username already exists
    $stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->close();
        die("Username already exists. Please choose another.");
    }
    $stmt->close();

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert the new user
    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $hashed_password);
    if ($stmt->execute()) {
        // Registration successful - set session and redirect to user homepage
        $_SESSION['user'] = $username;
        header("Location: hpU.php");
        exit();
    } else {
        die("Error: " . $conn->error);
    }
    $stmt->close();
} else {
    die("Invalid request.");
}
?>
