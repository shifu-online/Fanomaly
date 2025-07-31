<?php
session_start();
include('config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize inputs
    $newUsername = trim($_POST['username']);
    $newEmail = trim($_POST['email']);
    $newPassword = trim($_POST['new_password']);
    $confirmNewPassword = trim($_POST['confirm_new_password']);

    if (empty($newUsername) || empty($newEmail)) {
        die("Username and email cannot be empty.");
    }

    $currentUsername = $_SESSION['user'];

    // If the username is changed, check if new one is available.
    if ($newUsername !== $currentUsername) {
        $stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
        $stmt->bind_param("s", $newUsername);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $stmt->close();
            die("The username is already taken. Please choose another.");
        }
        $stmt->close();
    }

    // Build update query dynamically.
    $updateFields = "username = ?, email = ?";
    $params = [$newUsername, $newEmail];
    $paramTypes = "ss";

    // If new password is provided, verify and hash it.
    if (!empty($newPassword)) {
        if ($newPassword !== $confirmNewPassword) {
            die("New passwords do not match.");
        }
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $updateFields .= ", password = ?";
        $params[] = $hashedPassword;
        $paramTypes .= "s";
    }

    // Check for file upload.
    if (isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['profile_pic']['tmp_name'];
        $fileName = $_FILES['profile_pic']['name'];
        $fileSize = $_FILES['profile_pic']['size'];
        $fileType = $_FILES['profile_pic']['type'];

        // Validate file extension (optional)
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        if (!in_array($fileExtension, $allowedExtensions)) {
            die("Invalid file type. Only JPG, JPEG, PNG, and GIF files are allowed.");
        }
        
        // Generate a unique file name and define upload directory.
        $newFileName = uniqid("profile_", true) . "." . $fileExtension;
        $uploadFileDir = 'uploads/';
        if (!is_dir($uploadFileDir)) {
            mkdir($uploadFileDir, 0755, true);
        }
        $dest_path = $uploadFileDir . $newFileName;
        
        if (!move_uploaded_file($fileTmpPath, $dest_path)) {
            die("Error moving the uploaded file.");
        }
        
        // Update profile_pic field.
        $updateFields .= ", profile_pic = ?";
        $params[] = $newFileName;
        $paramTypes .= "s";
    }

    // Prepare the update statement.
    $stmt = $conn->prepare("UPDATE users SET $updateFields WHERE username = ?");
    $params[] = $currentUsername;
    $paramTypes .= "s";

    // Bind parameters dynamically.
    $stmt->bind_param($paramTypes, ...$params);

    if ($stmt->execute()) {
        // Update session if username changed.
        $_SESSION['user'] = $newUsername;
        header("Location: profile.php");
        exit();
    } else {
        die("Error updating profile: " . $conn->error);
    }
    $stmt->close();
} else {
    die("Invalid request.");
}
?>
