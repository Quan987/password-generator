<?php require './register.php'; ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register</title>
    <link rel="stylesheet" href="../../private/assets/style/login-register.css" />
  </head>
  <body>
    <div class="header">
      <div class="buttons">
        <button onclick="window.location.href='login.html'" type="button">
          Log In
        </button>
        <button onclick="window.location.href='register.html'" type="button">
          Register
        </button>
      </div>
    </div>

    <div class="content">
      <h1>Pass Generator</h1>
      <h2>Register</h2>
      <div class="form-container">
        <form action="register.php" method="post">
          <span class="error" id="first_err"></span>
          <label for="first">First Name</label><br />
          <input
            type="text"
            id="first"
            name="first_name"
            placeholder="Enter your First Name"
            required
          /><br />

          <span class="error" id="last_err"></span>
          <label for="last">Last Name</label><br />
          <input
            type="text"
            id="last"
            name="last_name"
            placeholder="Enter your Last Name"
            required
          /><br />

          <span class="error" id="email_err"></span>
          <label for="email">Email</label><br />
          <input
            type="email"
            id="email"
            name="email"
            placeholder="Enter your email address"
            required
          /><br />

          <span class="error" id="pass_err"></span>
          <label for="password">Password</label><br />
          <input
            type="password"
            id="password"
            name="password"
            placeholder="Enter your password"
            required
          /><br />

          <button type="button" onclick="register()">Submit</button>
        </form>
      </div>
    </div>

    <script src="../../private/assets/scripts/login-register.js"></script>
  </body>
</html>
