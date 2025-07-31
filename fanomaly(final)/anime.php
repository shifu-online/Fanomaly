<?php include('header.php'); ?>

<style>
  /* Container for the categories section */
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
  
  /* Grid layout for subcategory cards */
  .subcategory-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 15px;
    margin-bottom: 40px;
  }
  
  /* Subcategory Card Styling */
  .subcategory-card {
    position: relative;
    width: 100%;
    height: 150px; /* Smaller height */
    overflow: hidden;
    border-radius: 8px;
    background: #141414;
    box-shadow: 0 0 6px rgba(0, 0, 0, 0.5);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }
  .subcategory-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 0 10px rgba(0,0,0,0.7);
  }
  
  .subcategory-card .image-wrapper {
    width: 100%;
    height: 100%;
    position: relative;
  }
  .subcategory-card .image-wrapper img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: opacity 0.3s ease;
  }
  
  /* Overlay that appears on hover */
  .subcategory-card .overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(20,20,20,0.85);
    color: #fff;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 10px;
    text-align: center;
    opacity: 0;
    transition: opacity 0.3s ease;
  }
  .subcategory-card:hover .overlay {
    opacity: 1;
  }
  .overlay h3 {
    font-size: 20px;
    margin-bottom: 5px;
    color: #E50914;
  }
  .overlay p {
    font-size: 14px;
    margin-bottom: 10px;
  }
  .overlay a.btn {
    font-size: 14px;
    padding: 8px 15px;
    background: #E50914;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    transition: background 0.3s ease;
  }
  .overlay a.btn:hover {
    background: #b20710;
  }
</style>

<div class="container category-section">
  <h2>Anime Categories</h2>
  <p>Discover quizzes for various anime genres and eras.</p>
  
  <section class="subcategory-grid">
    <!-- Shonen Anime Card -->
    <div class="subcategory-card">
      <a href="dynamic-quiz.php?quiz=shonen">
        <div class="image-wrapper">
          <img src="images/shunen.jpg" alt="Shonen Anime">
          <div class="overlay">
            <h3>Shonen Anime</h3>
            <p>Action-packed adventures</p>
            <a href="dynamic-quiz.php?quiz=shonen" class="btn">Quiz Now</a>
          </div>
        </div>
      </a>
    </div>
    <!-- Shojo Anime Card -->
    <div class="subcategory-card">
      <a href="dynamic-quiz.php?quiz=shojo">
        <div class="image-wrapper">
          <img src="images/shojo.jpg" alt="Shojo Anime">
          <div class="overlay">
            <h3>Shojo Anime</h3>
            <p>Heartfelt stories</p>
            <a href="dynamic-quiz.php?quiz=shojo" class="btn">Quiz Now</a>
          </div>
        </div>
      </a>
    </div>
    <!-- Seinen Anime Card -->
    <div class="subcategory-card">
      <a href="dynamic-quiz.php?quiz=seinen">
        <div class="image-wrapper">
          <img src="images/se.avif" alt="Seinen Anime">
          <div class="overlay">
            <h3>Seinen Anime</h3>
            <p>Mature and complex</p>
            <a href="dynamic-quiz.php?quiz=seinen" class="btn">Quiz Now</a>
          </div>
        </div>
      </a>
    </div>
    <!-- Isekai Anime Card -->
    <div class="subcategory-card">
      <a href="dynamic-quiz.php?quiz=isekai">
        <div class="image-wrapper">
          <img src="images/iskai.jpg" alt="Isekai Anime">
          <div class="overlay">
            <h3>Isekai Anime</h3>
            <p>Fantastical new worlds</p>
            <a href="dynamic-quiz.php?quiz=isekai" class="btn">Quiz Now</a>
          </div>
        </div>
      </a>
    </div>
    <!-- Classic / Ghibli & Eras Anime Card -->
    <div class="subcategory-card">
      <a href="dynamic-quiz.php?quiz=classic">
        <div class="image-wrapper">
          <img src="images/ghji.jpg" alt="Classic / Ghibli &amp; Eras">
          <div class="overlay">
            <h3>Classic / Ghibli & Eras</h3>
            <p>Timeless masterpieces</p>
            <a href="dynamic-quiz.php?quiz=classic" class="btn">Quiz Now</a>
          </div>
        </div>
      </a>
    </div>
  </section>
</div>

<?php include('footer.php'); ?>
