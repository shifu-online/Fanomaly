<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

include('config.php');

// Retrieve current user details (including profile_pic)
$currentUsername = $_SESSION['user'];
$stmt = $conn->prepare("SELECT username, email, profile_pic FROM users WHERE username = ?");
$stmt->bind_param("s", $currentUsername);
$stmt->execute();
$stmt->bind_result($username, $email, $profile_pic);
$stmt->fetch();
$stmt->close();

// Use default avatar if none is set.
if (!$profile_pic) {
    $profile_pic = "default-avatar.png";
}

include('header.php');
?>

<main class="container">
  <h2>Edit Your Profile</h2>
  <form class="form-container" action="process-edit-profile.php" method="post" enctype="multipart/form-data">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($username); ?>" required>
    
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
    
    <!-- New password fields (optional) -->
    <label for="new_password">New Password (leave blank to keep current):</label>
    <input type="password" id="new_password" name="new_password" placeholder="Enter new password">
    
    <label for="confirm_new_password">Confirm New Password:</label>
    <input type="password" id="confirm_new_password" name="confirm_new_password" placeholder="Confirm new password">
    
    <!-- Profile picture upload -->
    <label for="profile_pic">Profile Picture (optional):</label>
    <input type="file" id="profile_pic" name="profile_pic" accept="image/*">
    
    <button type="submit" class="btn">Update Profile</button>
  </form>
</main>

<?php include('footer.php'); ?>
