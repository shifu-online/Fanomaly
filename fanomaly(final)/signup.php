<?php include('header.php'); ?>

<div class="container">
  <form class="form-container" action="process-signup.php" method="post">
    <h2>Create an Account</h2>
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" placeholder="Choose a username" required>
    
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" placeholder="Enter your email" required>
    
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" placeholder="Enter a password" required>
    
    <label for="confirm_password">Confirm Password:</label>
    <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm your password" required>
    
    <button type="submit" class="btn">Sign Up</button>
  </form>
</div>

<?php include('footer.php'); ?>


