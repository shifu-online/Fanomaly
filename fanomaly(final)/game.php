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
    height: 150px; /* Adjust height as needed */
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
  <h2>Gaming Subcategories</h2>
  <p>Select a subcategory to test your gaming knowledge!</p>
  
  <section class="subcategory-grid">
    <!-- Undertale -->
    <div class="subcategory-card">
      <a href="dynamic-quiz.php?quiz=undertale">
        <div class="image-wrapper">
          <img src="images/und.png" alt="Undertale">
          <div class="overlay">
            <h3>Undertale</h3>
            <p>Explore the indie classic's lore.</p>
            <a href="dynamic-quiz.php?quiz=undertale" class="btn">Quiz Now</a>
          </div>
        </div>
      </a>
    </div>
    <!-- Call of Duty -->
    <div class="subcategory-card">
      <a href="dynamic-quiz.php?quiz=callofduty">
        <div class="image-wrapper">
          <img src="images/cod.avif" alt="Call of Duty">
          <div class="overlay">
            <h3>Call of Duty</h3>
            <p>Test your tactical skills.</p>
            <a href="dynamic-quiz.php?quiz=callofduty" class="btn">Quiz Now</a>
          </div>
        </div>
      </a>
    </div>
    <!-- God of War -->
    <div class="subcategory-card">
      <a href="dynamic-quiz.php?quiz=godofwar">
        <div class="image-wrapper">
          <img src="images/gg.jpg" alt="God of War">
          <div class="overlay">
            <h3>God of War</h3>
            <p>Myth and mayhem await.</p>
            <a href="dynamic-quiz.php?quiz=godofwar" class="btn">Quiz Now</a>
          </div>
        </div>
      </a>
    </div>
    <!-- Infamous Second Son -->
    <div class="subcategory-card">
      <a href="dynamic-quiz.php?quiz=infamous">
        <div class="image-wrapper">
          <img src="images/son.webp" alt="Infamous 2nd Son">
          <div class="overlay">
            <h3>Infamous 2nd Son</h3>
            <p>Harness superpowers, choose your fate.</p>
            <a href="dynamic-quiz.php?quiz=infamous" class="btn">Quiz Now</a>
          </div>
        </div>
      </a>
    </div>
    <!-- Fortnite -->
    <div class="subcategory-card">
      <a href="dynamic-quiz.php?quiz=fortnite">
        <div class="image-wrapper">
          <img src="images/fn.avif" alt="Fortnite">
          <div class="overlay">
            <h3>Fortnite</h3>
            <p>Build, battle, and survive.</p>
            <a href="dynamic-quiz.php?quiz=fortnite" class="btn">Quiz Now</a>
          </div>
        </div>
      </a>
    </div>
    <!-- Five Nights at Freddy's -->
    <div class="subcategory-card">
      <a href="dynamic-quiz.php?quiz=fivenights">
        <div class="image-wrapper">
          <img src="images/fnaf.jpg" alt="FNAF">
          <div class="overlay">
            <h3>FNAF</h3>
            <p>Face your worst nightmares.</p>
            <a href="dynamic-quiz.php?quiz=fivenights" class="btn">Quiz Now</a>
          </div>
        </div>
      </a>
    </div>
  </section>
</div>

<?php include('footer.php'); ?>
