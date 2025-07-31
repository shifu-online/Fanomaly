<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
include('config.php');

// Get current username from session
$username = $_SESSION['user'];

// Retrieve the user ID from the users table
$stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->bind_result($user_id);
if (!$stmt->fetch()) {
    $stmt->close();
    die("User not found.");
}
$stmt->close();

// Fetch recent quiz results for the user (limit to the latest 5)
$stmt = $conn->prepare("SELECT quiz_name, score, total, taken_at FROM quiz_results WHERE user_id = ? ORDER BY taken_at DESC LIMIT 5");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$recentResults = [];
while ($row = $result->fetch_assoc()) {
    $recentResults[] = $row;
}
$stmt->close();

// Get overall quiz stats: total quizzes taken, total score, and total questions
$stmt = $conn->prepare("SELECT COUNT(*) as count, SUM(score) as sumScore, SUM(total) as sumTotal FROM quiz_results WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($quizCount, $totalScore, $totalQuestions);
$stmt->fetch();
$stmt->close();
$averageScore = ($quizCount > 0 && $totalQuestions > 0) ? round(($totalScore / $totalQuestions) * 100, 2) : 0;
?>

<?php include('header.php'); ?>

<style>
/* Hero Section with Video Background */
.hero {
  position: relative;
  height: 60vh; /* 60% of viewport height */
  overflow: hidden;
  background: #000;
  display: flex;
  align-items: center;
  justify-content: center;
  text-align: center;
  color: #fff;
}

/* Background video covers the entire hero section */
.hero-video {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
  z-index: 1;
}

/* Hero content overlays on top of the video */
.hero-content {
  position: relative;
  z-index: 2;
  padding: 20px;
}

/* Logo styling */
.hero-content img {
  width: 200px;
  height: 200px;
  border-radius: 50%;
  border: 4px solid #E50914;
  margin-bottom: 20px;
}

/* Button styling */
.btn {
  display: inline-block;
  padding: 12px 25px;
  background: #E50914;
  color: #fff;
  text-decoration: none;
  font-size: 18px;
  border-radius: 5px;
  margin-top: 20px;
  transition: background 0.3s ease;
}
.btn:hover {
  background: #b20710;
}

/* Additional sections styling */
.user-stats, .recent-history, .recommended-quizzes, .recent-activity {
  padding: 20px;
}
.user-stats {
  background: #141414;
  color: #fff;
  text-align: center;
}
.recent-history, .recommended-quizzes, .recent-activity {
  background: #222;
  color: #fff;
  text-align: center;
}
</style>

<!-- Hero Section with Video Background -->
<section class="hero">
  <!-- Background video -->
  <video class="hero-video" autoplay muted loop playsinline>
    <source src="images/u.mp4" type="video/mp4">
    Your browser does not support the video tag.
  </video>
  <!-- Content overlay -->
  <div class="hero-content">
    <img src="logo.jpg" alt="Fanomoly Logo">
    <h1>Welcome, <?php echo htmlspecialchars($username); ?>!</h1>
    <p>Ready to challenge your fandom knowledge? Take a quiz or check your progress below!</p>
    <a href="categories.php" class="btn">Take a Quiz</a>
  </div>
</section>

<!-- User Quiz Stats Section -->
<section class="user-stats">
  <h2>Your Quiz Stats</h2>
  <p>Total Quizzes Taken: <?php echo $quizCount; ?></p>
  <p>Average Score: <?php echo $averageScore; ?>%</p>
</section>

<!-- Recent Quiz History Section -->
<section class="recent-history">
  <h2 style="color:#E50914;">Recent Quiz History</h2>
  <?php if (count($recentResults) > 0): ?>
    <table style="width:100%; border-collapse:collapse; background:#141414; color:#fff;">
      <thead>
        <tr style="background:#262641;">
          <th>Quiz Name</th>
          <th>Score</th>
          <th>Total Questions</th>
          <th>Date Taken</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($recentResults as $res): ?>
          <tr>
            <td><?php echo htmlspecialchars(ucfirst($res['quiz_name'])); ?></td>
            <td><?php echo htmlspecialchars($res['score']); ?></td>
            <td><?php echo htmlspecialchars($res['total']); ?></td>
            <td><?php echo htmlspecialchars($res['taken_at']); ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php else: ?>
    <p>No quiz results found. Take a quiz to see your history!</p>
  <?php endif; ?>
</section>

<!-- Recommended Quizzes Section -->
<section class="recommended-quizzes">
  <h2 style="color:#E50914;">Recommended Quizzes</h2>
  <div style="display:flex; justify-content:center; gap:20px; flex-wrap:wrap;">
    <a href="dynamic-quiz.php?quiz=undertale" class="btn">Undertale</a>
    <a href="dynamic-quiz.php?quiz=callofduty" class="btn">Call of Duty</a>
    <a href="dynamic-quiz.php?quiz=godofwar" class="btn">God of War</a>
    <a href="dynamic-quiz.php?quiz=cartoon_network" class="btn">Cartoon Network</a>
    <!-- Add more recommended quizzes as needed -->
  </div>
</section>

<!-- Recent Activity Feed (Optional) -->
<section class="recent-activity">
  <h2 style="color:#E50914;">Recent Activity</h2>
  <p>Stay tuned for updates on your latest quiz attempts and scores.</p>
</section>

<?php include('footer.php'); ?>
