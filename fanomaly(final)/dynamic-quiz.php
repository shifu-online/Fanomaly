<?php
session_start();
include('config.php');

if (!isset($_GET['quiz'])) {
    die("No quiz specified.");
}
$quizName = $_GET['quiz'];

// Fetch quiz questions from the database
$stmt = $conn->prepare("SELECT id, question_text, option_a, option_b, option_c, option_d, correct_option FROM quiz_questions WHERE quiz_name = ?");
$stmt->bind_param("s", $quizName);
$stmt->execute();
$result = $stmt->get_result();

$questions = [];
while ($row = $result->fetch_assoc()) {
    $questions[] = $row;
}
$stmt->close();

if (empty($questions)) {
    die("No questions found for this quiz.");
}

include('header.php');
?>

<!-- Include quiz-specific CSS -->
<link rel="stylesheet" href="quiz.css" />

<main class="test-page container">
  <h2><?php echo ucfirst($quizName); ?> Quiz</h2>
  
  <div id="timer">Time Left: <span id="time-left">300</span> seconds</div>
  <div id="progress-container">
    <div id="progress-bar"></div>
  </div>
  
  <form id="quiz-form">
    <?php foreach ($questions as $index => $q): ?>
      <div class="question" data-correct="<?php echo htmlspecialchars($q['correct_option']); ?>">
        <p><?php echo ($index + 1) . ". " . htmlspecialchars($q['question_text']); ?></p>
        <div class="options">
          <button type="button" class="option">A. <?php echo htmlspecialchars($q['option_a']); ?></button>
          <button type="button" class="option">B. <?php echo htmlspecialchars($q['option_b']); ?></button>
          <button type="button" class="option">C. <?php echo htmlspecialchars($q['option_c']); ?></button>
          <button type="button" class="option">D. <?php echo htmlspecialchars($q['option_d']); ?></button>
        </div>
      </div>
    <?php endforeach; ?>
  </form>
  
  <!-- Results Section -->
  <section id="results">
    <div class="container">
      <h2>Your Results</h2>
      <p id="score-summary">You scored X out of <?php echo count($questions); ?>!</p>
      <div class="results-actions">
        <button onclick="retakeTest()" class="btn">Retake Test</button>
        <button id="saveResultBtn" class="btn">Save Quiz Result</button>
        <a href="categories.php" class="btn">Browse Other Quizzes</a>
      </div>
      <!-- Element for displaying a save message -->
      <div id="saveMessage" style="margin-top: 20px; font-size: 18px; color: #E50914;"></div>
    </div>
  </section>
</main>

<?php include('footer.php'); ?>
<script src="quiz.js" defer></script>
