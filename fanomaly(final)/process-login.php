<?php
session_start();
include('config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username_or_email = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username_or_email) || empty($password)) {
        die("Please fill in both fields.");
    }

    // Retrieve the user (check by username or email)
    $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE username = ? OR email = ?");
    $stmt->bind_param("ss", $username_or_email, $username_or_email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        $stmt->bind_result($id, $username, $hashed_password);
        $stmt->fetch();
        if (password_verify($password, $hashed_password)) {
            // Successful login
            $_SESSION['user'] = $username;
            header("Location: hpU.php");
            exit();
        } else {
            die("Invalid username/email or password.");
        }
    } else {
        die("Invalid username/email or password.");
    }
    $stmt->close();
} else {
    die("Invalid request.");
}
?>
