console.log("quiz.js loaded");

document.addEventListener('DOMContentLoaded', () => {
  // Initialize quiz variables
  let timeLeft = 300; // seconds
  const timeDisplay = document.getElementById('time-left');
  const progressBar = document.getElementById('progress-bar');
  const questions = document.querySelectorAll('.question');
  let score = 0;
  let answeredCount = 0;
  const totalQuestions = questions.length;
  
  if (totalQuestions === 0) {
    console.warn("No quiz questions found on the page.");
  }
  
  // Start the countdown timer, if the element exists
  if (timeDisplay) {
    const countdown = setInterval(() => {
      timeLeft--;
      timeDisplay.textContent = timeLeft;
      if (timeLeft <= 0) {
        clearInterval(countdown);
        displayResults(score, totalQuestions);
      }
    }, 1000);
  } else {
    console.error("Timer element not found.");
  }
  
  // Attach click events for each question's options
  questions.forEach(question => {
    const correctAnswer = question.getAttribute('data-correct').toUpperCase();
    const options = question.querySelectorAll('.option');
    
    options.forEach(option => {
      option.addEventListener('click', () => {
        // Prevent multiple selections for the same question
        if (question.classList.contains('answered')) return;
        
        question.classList.add('answered');
        answeredCount++;
        
        // Determine selected answer based on the first letter
        const answerText = option.textContent.trim();
        const selectedLetter = answerText.charAt(0).toUpperCase();
        
        // Check correctness and update UI
        if (selectedLetter === correctAnswer) {
          option.classList.add('correct');
          score++;
        } else {
          option.classList.add('incorrect');
          // Highlight the correct answer
          options.forEach(opt => {
            if (opt.textContent.trim().charAt(0).toUpperCase() === correctAnswer) {
              opt.classList.add('correct');
            }
          });
        }
        
        // Update the progress bar
        if (progressBar) {
          const progressPercent = (answeredCount / totalQuestions) * 100;
          progressBar.style.width = progressPercent + '%';
        }
        
        // When all questions are answered, display results
        if (answeredCount === totalQuestions) {
          displayResults(score, totalQuestions);
        }
      });
    });
  });
  
  // Function to display the quiz results and show the save option
  function displayResults(score, total) {
    const resultsSection = document.getElementById('results');
    const scoreSummary = document.getElementById('score-summary');
    scoreSummary.textContent = `You scored ${score} out of ${total}!`;
    resultsSection.style.display = 'block';
    resultsSection.scrollIntoView({ behavior: 'smooth' });
    console.log("Quiz complete. Score:", score, "Total Questions:", total);
    // The user must click the Save Quiz Result button manually
  }
  
  // Flag to ensure we only save once
  let hasSaved = false;
  // Attach event listener to the "Save Quiz Result" button
  const saveResultBtn = document.getElementById('saveResultBtn');
  if (saveResultBtn) {
    saveResultBtn.addEventListener('click', () => {
      if (hasSaved) return; // Prevent duplicate save
      hasSaved = true;
      console.log("Save Quiz Result button clicked.");
      saveResultBtn.disabled = true;
      saveResultBtn.textContent = "Saving...";
      
      const quizName = new URLSearchParams(window.location.search).get('quiz') || 'unknown';
      saveQuizResult(score, totalQuestions, quizName);
    });
  } else {
    console.error("Save Quiz Result button not found.");
  }
  
  // Function to save the quiz result via AJAX
  function saveQuizResult(score, total, quizName) {
    const formData = new FormData();
    formData.append('score', score);
    formData.append('total', total);
    formData.append('quiz', quizName);
  
    fetch('save-quiz-result.php', {
      method: 'POST',
      body: formData
    })
    .then(response => response.text())
    .then(result => {
      console.log("Quiz result saved:", result);
      const saveMessage = document.getElementById('saveMessage');
      if (saveMessage) {
        saveMessage.textContent = "Quiz result saved successfully!";
      } else {
        alert("Quiz result saved: " + result);
      }
    })
    .catch(error => {
      console.error('Error saving quiz result:', error);
      const saveMessage = document.getElementById('saveMessage');
      if (saveMessage) {
        saveMessage.textContent = "Error saving quiz result: " + error;
      } else {
        alert("Error saving quiz result: " + error);
      }
    });
  }
  
  // Function to retake the quiz (reload the page)
  window.retakeTest = function() {
    location.reload();
  };
});
