<?php require_once "../auth/auth.php" ?>
<!DOCTYPE html>
<html>

<head>
  <title>Register Page</title>
  <style>
    <?php include_once '../auth/css/auth_styles.css'; ?>
  </style>
</head>

<body>

  <?php if (isset($_POST['submit'])) : ?>
    <?php $name = $_POST['name']; ?>
    <?php $email = $_POST['email']; ?>
    <?php $password = $_POST['password']; ?>
    <?php createUser($name, $email, $password); ?>
  <?php endif; ?>
  <div id="authdiv">
    <form id="authform" action="" method="post">
      <h1 style="font-size: 30px; top: -50px; position: relative">Register From</h1>
      <table id="authtable">
        <tr>
          <td>
            <label for="name">Name:</label>
          </td>
          <td>
            <input type="text" name="name" required />
          </td>
        </tr>
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
      <input id="authButton" name="submit" type="submit" value="Register" />
    </form>
  </div>
</body>

</html>