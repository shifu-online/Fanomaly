<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Determine the current page filename
$currentPage = basename($_SERVER['PHP_SELF']);
$isLoggedIn = isset($_SESSION['user']);
$username = $isLoggedIn ? $_SESSION['user'] : '';
include('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Fanomoly</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600&display=swap" rel="stylesheet">
  <!-- External CSS for Netflix Theme -->
  <link rel="stylesheet" href="netflix.css" />
  <style>
    /* Additional styling for active navigation links */
    nav ul li a.active {
      text-shadow: 0 0 8px #E50914;
      color: #E50914;
    }
  </style>
</head>
<body>
  <header>
    <div class="container header-container">
      <h1>Fanomoly</h1>
      <nav>
        <ul>
          <li>
            <a href="<?php echo $isLoggedIn ? 'hpU.php' : 'index.php'; ?>" class="<?php echo ($currentPage=='index.php' || $currentPage=='hpU.php') ? 'active' : ''; ?>">Home</a>
          </li>
          <li>
            <a href="categories.php" class="<?php echo ($currentPage=='categories.php') ? 'active' : ''; ?>">Categories</a>
          </li>
          <li>
            <a href="about.php" class="<?php echo ($currentPage=='about.php') ? 'active' : ''; ?>">About Us</a>
          </li>
          <?php if ($isLoggedIn): ?>
            <li>
              <a href="profile.php" class="<?php echo ($currentPage=='profile.php') ? 'active' : ''; ?>">Profile</a>
            </li>
            <li>
              <a href="logout.php" class="<?php echo ($currentPage=='logout.php') ? 'active' : ''; ?>">Logout</a>
            </li>
            <li>
              <span>Welcome, <?php echo htmlspecialchars($username); ?></span>
            </li>
          <?php else: ?>
            <li>
              <a href="login.php" class="<?php echo ($currentPage=='login.php') ? 'active' : ''; ?>">Login</a>
            </li>
            <li>
              <a href="signup.php" class="<?php echo ($currentPage=='signup.php') ? 'active' : ''; ?>">Sign Up</a>
            </li>
          <?php endif; ?>
        </ul>
      </nav>
    </div>
  </header>
