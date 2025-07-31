<?php include('header.php'); ?>

<style>
  /* About Us Page Custom Styles */
  .about-us { 
    margin-top: 40px; 
    padding: 20px;
  }
  /* Hero Section with Logo */
  .hero-about {
    text-align: center;
    padding: 40px 20px;
    background: #222;
    border-radius: 8px;
    margin-bottom: 30px;
    position: relative;
    color: #fff;
  }
  .hero-about img {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    margin-bottom: 20px;
    border: 4px solid #E50914;
  }
  .hero-about h1 {
    font-size: 42px;
    color: #E50914;
    margin-bottom: 10px;
  }
  .hero-about p {
    font-size: 20px;
    color: #ccc;
    max-width: 800px;
    margin: 0 auto;
  }
  /* Section Blocks */
  .section {
    background: #141414;
    border-radius: 8px;
    padding: 30px 20px;
    margin-bottom: 30px;
  }
  .section h2 {
    font-size: 32px;
    color: #E50914;
    margin-bottom: 20px;
    text-align: center;
  }
  .section p, .section ul {
    font-size: 18px;
    color: #ccc;
    line-height: 1.6;
    max-width: 900px;
    margin: 0 auto 20px;
  }
  .section ul {
    list-style: none;
    padding-left: 0;
  }
  .section li {
    margin-bottom: 10px;
  }
</style>

<div class="container about-us">
  <!-- Hero Section with Logo -->
  <section class="hero-about">
    <img src="logo.jpg" alt="Fanomoly Logo">
    <h1>About Fanomoly</h1>
    <p>Fanomoly is your ultimate destination for fandom trivia and quizzes. Our platform brings together fans from around the world to test their knowledge across a wide array of topics—ranging from movies, TV shows, anime, gaming, horror, and more. Whether you're here to challenge yourself or simply to have fun, Fanomoly offers an engaging experience for every enthusiast!</p>
  </section>
  
  <!-- Features Section -->
  <section class="section features">
    <h2>Our Features</h2>
    <ul>
      <li><strong>Dynamic Quizzes:</strong> Every quiz is generated dynamically from our extensive database, ensuring fresh challenges every time you play.</li>
      <li><strong>User Dashboard:</strong> Track your progress, review quiz history, and view detailed statistics on your performance.</li>
      <li><strong>Multiple Categories:</strong> Enjoy a variety of quizzes covering Anime, TV & Movies, Gaming, Horror, Animation, and more.</li>
      <li><strong>Responsive Design:</strong> Our site looks great on all devices—desktop, tablet, and mobile.</li>
      <li><strong>Community Engagement:</strong> Connect with other fans, challenge your friends, and share your achievements.</li>
    </ul>
  </section>
  
  <!-- Categories Overview Section -->
  <section class="section categories-overview">
    <h2>Our Categories</h2>
    <p>At Fanomoly, we cover an extensive range of topics to suit every interest:</p>
    <ul>
      <li><strong>Anime:</strong> From Shonen, Shojo, Seinen, Isekai, to Classic/Ghibli and Era Anime.</li>
      <li><strong>TV & Movies:</strong> Test your knowledge on popular series and films from networks like Netflix, DC, Marvel, and more.</li>
      <li><strong>Gaming:</strong> Dive into quizzes on iconic video games including Call of Duty, God of War, Infamous Second Son, Fortnite, and more.</li>
      <li><strong>Horror:</strong> Explore spooky movies and chilling TV shows through our horror quizzes.</li>
      <li><strong>Animation:</strong> Enjoy quizzes on both Western and Eastern animated series and films.</li>
    </ul>
  </section>
  
  <!-- Mission Section -->
  <section class="section mission">
    <h2>Our Mission</h2>
    <p>We believe that learning and fun go hand in hand. Our mission at Fanomoly is to provide a dynamic platform where fans can explore their passions, challenge themselves with engaging quizzes, and connect with a community that shares their interests. We continuously update our content to reflect the ever-evolving landscape of pop culture.</p>
  </section>
</div>

<?php include('footer.php'); ?>
