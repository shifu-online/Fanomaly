<?php include('header.php'); ?>

<style>
  /* Container and Hero Styles */
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
    height: 150px; /* Fixed smaller height */
    overflow: hidden;
    border-radius: 8px;
    background: #141414;
    box-shadow: 0 0 6px rgba(0,0,0,0.5);
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
  
  /* Overlay styling on hover */
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
    color: #ccc;
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
  <h2>TV & Movies Subcategories</h2>
  <p>Select a subcategory to discover related quizzes and content.</p>
  
  <section class="subcategory-grid">
    <!-- Cartoon Network -->
    <div class="subcategory-card">
      <a href="dynamic-quiz.php?quiz=cartoon_network">
        <div class="image-wrapper">
          <img src="images/cn.webp" alt="Cartoon Network">
          <div class="overlay">
            <h3>Cartoon Network</h3>
            <p>Test your knowledge of classic cartoons.</p>
            <a href="dynamic-quiz.php?quiz=cartoon_network" class="btn">Quiz Now</a>
          </div>
        </div>
      </a>
    </div>
    <!-- DC -->
    <div class="subcategory-card">
      <a href="dynamic-quiz.php?quiz=dc">
        <div class="image-wrapper">
          <img src="images/dc1.jpg" alt="DC">
          <div class="overlay">
            <h3>DC</h3>
            <p>Explore iconic DC shows and movies.</p>
            <a href="dynamic-quiz.php?quiz=dc" class="btn">Quiz Now</a>
          </div>
        </div>
      </a>
    </div>
    <!-- Marvel -->
    <div class="subcategory-card">
      <a href="dynamic-quiz.php?quiz=marvel">
        <div class="image-wrapper">
          <img src="images/marvel.jpg" alt="Marvel">
          <div class="overlay">
            <h3>Marvel</h3>
            <p>Challenge yourself with Marvel trivia.</p>
            <a href="dynamic-quiz.php?quiz=marvel" class="btn">Quiz Now</a>
          </div>
        </div>
      </a>
    </div>
    <!-- Netflix -->
    <div class="subcategory-card">
      <a href="dynamic-quiz.php?quiz=netflix">
        <div class="image-wrapper">
          <img src="images/ne.webp" alt="Netflix">
          <div class="overlay">
            <h3>Netflix</h3>
            <p>Explore Netflix originals and hits.</p>
            <a href="dynamic-quiz.php?quiz=netflix" class="btn">Quiz Now</a>
          </div>
        </div>
      </a>
    </div>
    <!-- Horror -->
    <div class="subcategory-card">
      <a href="dynamic-quiz.php?quiz=horror">
        <div class="image-wrapper">
          <img src="images/it.webp" alt="Horror">
          <div class="overlay">
            <h3>Horror</h3>
            <p>Face chilling horror trivia.</p>
            <a href="dynamic-quiz.php?quiz=horror" class="btn">Quiz Now</a>
          </div>
        </div>
      </a>
    </div>
    <!-- Animation -->
    <div class="subcategory-card">
      <a href="dynamic-quiz.php?quiz=animation">
        <div class="image-wrapper">
          <img src="images/an.jpeg" alt="Animation">
          <div class="overlay">
            <h3>Animation</h3>
            <p>Test your knowledge on animated shows.</p>
            <a href="dynamic-quiz.php?quiz=animation" class="btn">Quiz Now</a>
          </div>
        </div>
      </a>
    </div>
    <!-- Action -->
    <div class="subcategory-card">
      <a href="dynamic-quiz.php?quiz=action">
        <div class="image-wrapper">
          <img src="images/action.jpg" alt="Action">
          <div class="overlay">
            <h3>Action</h3>
            <p>Get your adrenaline pumping with action trivia.</p>
            <a href="dynamic-quiz.php?quiz=action" class="btn">Quiz Now</a>
          </div>
        </div>
      </a>
    </div>
  </section>
</div>

<?php include('footer.php'); ?>
