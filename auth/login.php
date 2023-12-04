<?php require_once "../auth/auth.php" ?>
<!DOCTYPE html>
<html>

<head>
  <title>Login Page</title>
  <style>
    <?php include_once '../auth/css/auth_styles.css'; ?>
  </style>
</head>

<body>

  <?php if (isset($_POST['submit'])) : ?>
    <?php $email = $_POST['email']; ?>
    <?php $password = $_POST['password']; ?>
    <?php echo $_POST['email']; ?>
    <?php echo $_POST['password']; ?>
    <?php signIn($email, $password); ?>
  <?php endif; ?>

  <div id="authdiv">
    <form id="authform" action="" method="post">
      <h1 id="loginheader">Login From</h1>
      <table id="authtable">
        <tr>
          <td>
            <label for="email">Email: </label>
          </td>
          <td>
            <input type="email" name="email" required />
          </td>
        </tr>
        <tr>
          <td>
            <label for="password">Password: </label>
          </td>
          <td>
            <input type="password" name="password" minlength="8" required />
          </td>
        </tr>
      </table>
      <input id="authButton" name="submit" type="submit" value="Login" />
      <p id="noacc">Not a Member? <a href="register.php" style="color: gray; font-size: 16px;">Sign up now</a></p>
    </form>
  </div>
</body>

</html>