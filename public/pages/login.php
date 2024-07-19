<?php require_once('../../private/initialize.php');
  if($_SERVER["REQUEST_METHOD"] === "POST") {
    $user_info = [
      "email" => $_POST["email"],
      "password" => $_POST["password"]
    ];
    $result = get_user_login($user_info);
    $error_message = check_user_login($user_info, $result);
    if (isset($error_message)) {
      echo $error_message;
    } else {
      $_SERVER["id"] = $result["id"];
      header('Location: ' . 'index.php');
    }
    db_disconnect($db);
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="../../private/assets/style/login-register.css" />
    <script>
       if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
    </script>
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
        <form id="loginForm" action="login.php" method="post">
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

    <script src="../../private/assets/scripts/login.js"></script>
  </body>
</html>
