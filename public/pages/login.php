<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="../assets/style/login-register.css" />
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
      <h2>Login</h2>
      <div class="form-container">
        <form id="loginForm">
          <span class="error" id="email_err"></span>
          <label for="email">Email:</label><br />
          <input
            type="email"
            id="email"
            name="email"
            placeholder="Enter your email address"
            required
          /><br />

          <span class="error" id="pass_err"></span>
          <label for="password">Password:</label><br />
          <input
            type="password"
            id="password"
            name="password"
            placeholder="Enter your password"
            required
          /><br />

          <button type="button" onclick="login()">Login</button>
        </form>
      </div>
    </div>

    <script src="../scripts/login-register.js"></script>
  </body>
</html>
