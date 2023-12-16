<?php
require "../auth/auth_func.php";
?>
<!DOCTYPE html>
<html>

<head>
  <title>Login Page</title>
  <style>
    <?php require '../auth/css/auth_styles.css'; ?>
  </style>
</head>

<body>

  <!-- Login -->
  <?php if (isset($_POST['sign-in'])) : ?>
    <?php $email = $_POST['email']; ?>
    <?php $password = $_POST['password']; ?>
    <?php signIn($email, $password); ?>
  <?php endif; ?>
  <!-- Register -->
  <?php if (isset($_POST['sign-up'])) : ?>
    <?php $name = $_POST['name'] ?>
    <?php $email = $_POST['email']; ?>
    <?php $password = $_POST['password']; ?>
    <?php createUser($name, $email, $password); ?>
  <?php endif; ?>

  <div class="container" id="container">
    <div class="form-container sign-up">
      <form id="authform" action="" method="post">
        <h1 id="loginheader">Create Account</h1>
        <span>Use your email for registeration</span>
        <input type="text" name="name" required placeholder="name">
        <input type="email" name="email" required placeholder="Email">
        <input type="password" name="password" minlength="8" required placeholder="Password">

        <input id="authButton" name="sign-up" type="submit" value="Sign Up" />
      </form>
    </div>
    <div class="form-container sign-in">
      <form id="authform" action="" method="post">
        <h1 id="loginheader">Sign In</h1>
        <span>Use your email and password</span>
        <input type="email" name="email" required placeholder="Email">
        <input type="password" name="password" minlength="8" required placeholder="Password">

        <input id="authButton" name="sign-in" type="submit" value="Sign In" />
      </form>
    </div>
    <div class="toggle-container">
      <div class="toggle">
        <div class="toggle-panel toggle-left">
          <h1>Welcome Back</h1>
          <p>Enter your personal details</p>
          <button class="hidden" id="login">Sign In</button>
        </div>
        <div class="toggle-panel toggle-right">
          <h1>Hello Friend</h1>
          <p>Register with your personal details</p>
          <button class="hidden" id="register">Sign Up</button>
        </div>
      </div>
    </div>
  </div>
  <script src="script.js"> </script>
</body>

</html>