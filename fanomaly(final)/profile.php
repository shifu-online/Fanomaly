<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

include('config.php');

// Retrieve current user details from the database.
$currentUsername = $_SESSION['user'];
$stmt = $conn->prepare("SELECT username, email, profile_pic, created_at FROM users WHERE username = ?");
$stmt->bind_param("s", $currentUsername);
$stmt->execute();
$stmt->bind_result($username, $email, $profile_pic, $created_at);
$stmt->fetch();
$stmt->close();

// If no profile picture is set, use a default one.
if (!$profile_pic) {
    $profile_pic = "default-avatar.png";
}

include('header.php');
?>

<main class="container">
  <div class="profile-container" style="background: #1a1a1a; border-radius: 12px; padding: 30px; box-shadow: 0 0 15px rgba(0,0,0,0.6); margin-top: 40px;">
    <div class="profile-avatar" style="width: 150px; height: 150px; margin: 0 auto 20px; border-radius: 50%; overflow: hidden; border: 4px solid #E50914;">
      <img src="uploads/<?php echo htmlspecialchars($profile_pic); ?>" alt="Profile Picture" style="width: 100%; height: 100%; object-fit: cover;">
    </div>
    <div class="profile-info" style="text-align: center;">
      <h2 style="font-size: 30px; color: #E50914;">Hi, <?php echo htmlspecialchars($username); ?>!</h2>
      <p style="font-size: 18px; color: #aaa;">Email: <?php echo htmlspecialchars($email); ?></p>
      <p style="font-size: 18px; color: #aaa;">Member Since: <?php echo date("F Y", strtotime($created_at)); ?></p>
      <p style="font-size: 16px; color: #ccc; margin-top: 10px;">We're glad you're here—explore quizzes and have fun!</p>
    </div>
    <div style="text-align: center; margin-top: 20px;">
      <a href="edit-profile.php" class="edit-btn" style="display: inline-block; padding: 10px 20px; background: #E50914; color: #fff; text-decoration: none; border-radius: 5px; transition: background 0.3s ease;">Edit Your Profile</a>
    </div>
  </div>
</main>

<?php include('footer.php'); ?>
