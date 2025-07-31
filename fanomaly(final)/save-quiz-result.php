<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();
include('config.php');

echo "<pre>SESSION: ";
print_r($_SESSION);
echo "\nPOST Data: ";
print_r($_POST);
echo "</pre>";

if (isset($_SESSION['user'], $_POST['score'], $_POST['total'], $_POST['quiz'])) {
    $username = $_SESSION['user'];
    
    // Retrieve user ID based on the username
    $stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($user_id);
    if (!$stmt->fetch()) {
        $stmt->close();
        die("User not found.");
    }
    $stmt->close();
    
    $score = intval($_POST['score']);
    $total = intval($_POST['total']);
    $quiz = $_POST['quiz'];
    
    // Insert the quiz result into the database
    $stmt = $conn->prepare("INSERT INTO quiz_results (user_id, quiz_name, score, total) VALUES (?, ?, ?, ?)");
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param("isii", $user_id, $quiz, $score, $total);
    if ($stmt->execute()) {
        echo "Result saved successfully!";
    } else {
        echo "Error saving result: " . $stmt->error;
    }
    $stmt->close();
} else {
    echo "Missing data.";
}
?>
