<?php include('header.php'); ?>

<div class="container">
  <form class="form-container" action="process-login.php" method="post">
    <h2>Login</h2>
    <label for="username">Username or Email:</label>
    <input type="text" id="username" name="username" placeholder="Enter your username or email" required>
    
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" placeholder="Enter your password" required>
    
    <button type="submit" class="btn">Login</button>
  </form>
</div>

<?php include('footer.php'); ?>
