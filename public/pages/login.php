<?php require_once('../../private/initialize.php');
  if (isset($_SESSION["id"])) {
    header('Location: ' . 'dashboard.php');
  }
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
      $_SESSION["id"] = $result["id"];
      $_SESSION["user"] = $result["first_name"] . " " . $result["last_name"];
      db_disconnect($db);
      header('Location: ' . 'dashboard.php');
      exit;
    }
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
      <img id="logo" src="../../private/assets/images/logo.png" alt="logo">
      <div class="buttons">
        <button class="login-btn"><a href="<?php echo encode_url('login.php');?>">Login</a></button>
        <button class="register-btn"><a href="<?php echo encode_url('register.php');?>">Register</a></button>
      </div>
    </div>

    <div class="content">
      <h1 class="title">Password Generator</h1>
      <h2 class="subtitle">Login Here!</h2>
      <div class="form-container">
        <form id="loginForm" action="login.php" method="post">
          
          <label for="email">Email:</label><br />
          <input
            type="email"
            id="email"
            name="email"
            placeholder="Enter your email address"
            required
          />
          <span class="error" id="email_err"></span>
          <br />

          
          <label for="password">Password:</label><br />
          <input
            type="password"
            id="password"
            name="password"
            placeholder="Enter your password"
            required
          />
          <span class="error" id="pass_err"></span>
          <br /><br>

          <button id="sign-in-btn" type="button" onclick="login()">Login</button>
        </form>
		<br>
		<p> Not registered? <a href = "<?php echo encode_url('register.php');?>"> Register Now</a></p>
      </div>
    </div>
    <footer>&copy; 2024 The Software Cats, All Rights Reserved</footer>
    <script src="../../private/assets/scripts/login.js"></script>
  </body>
</html>
