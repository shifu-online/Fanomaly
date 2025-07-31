<?php include('header.php'); ?>

<style>
  /* About the Categories Page */
  .category-section {
    margin-top: 40px;
    text-align: center;
  }
  .category-section h2 {
    font-size: 36px;
    color: #E50914;
    margin-bottom: 10px;
  }
  .category-section p {
    font-size: 20px;
    color: #ccc;
    margin-bottom: 30px;
  }
  
  /* Grid layout for category cards */
  .category-grid {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
  }
  
  /* Category Card Styling */
  .category-card {
    position: relative;
    width: 300px;
    height: 200px;
    overflow: hidden;
    border-radius: 10px;
    background: #141414;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }
  .category-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.7);
  }
  
  .category-card .image-wrapper {
    position: relative;
    width: 100%;
    height: 100%;
  }
  .category-card .image-wrapper img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: opacity 0.3s ease;
  }
  
  /* Overlay styling on hover */
  .category-card .overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(20, 20, 20, 0.85);
    color: #fff;
    opacity: 0;
    transition: opacity 0.3s ease;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 15px;
    text-align: center;
  }
  .category-card:hover .overlay {
    opacity: 1;
  }
  
  .overlay h3 {
    font-size: 28px;
    margin-bottom: 10px;
    color: #E50914;
  }
  .overlay p {
    font-size: 16px;
    margin-bottom: 15px;
    color: #ccc;
  }
  .overlay .btn {
    padding: 10px 20px;
    background: #E50914;
    color: #fff;
    text-decoration: none;
    font-size: 18px;
    border-radius: 5px;
    transition: background 0.3s ease;
  }
  .overlay .btn:hover {
    background: #b20710;
  }
</style>

<div class="container category-section">
  <h2>Explore Categories &amp; Quizzes</h2>
  <p>Select a category below to try a sample quiz and test your knowledge!</p>
  <div class="category-grid">
    <!-- Anime Category -->
    <div class="category-card">
      <div class="image-wrapper">
        <img src="images/steins gate.jpg" alt="Anime Category">
        <div class="overlay">
          <h3>Anime</h3>
          <p>Test your knowledge of popular anime series.</p>
          <a href="anime.php" class="btn">Take Anime Quiz</a>
        </div>
      </div>
    </div>
    <!-- TV Shows/Movies Category -->
    <div class="category-card">
      <div class="image-wrapper">
        <img src="images/Netflix.png" alt="TV Shows &amp; Movies">
        <div class="overlay">
          <h3>TV Shows &amp; Movies</h3>
          <p>Challenge yourself with iconic films and TV shows.</p>
          <a href="tv.php" class="btn">Take TV/Movie Quiz</a>
        </div>
      </div>
    </div>
    <!-- Gaming Category -->
    <div class="category-card">
      <div class="image-wrapper">
        <img src="images/dolls.jpg" alt="Gaming Category">
        <div class="overlay">
          <h3>Gaming</h3>
          <p>Show off your gaming expertise with our quiz challenges.</p>
          <a href="game.php" class="btn">Take Gaming Quiz</a>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include('footer.php'); ?>
