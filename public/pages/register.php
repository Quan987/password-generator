<?php require_once ('../../private/initialize.php');
  if (isset($_SESSION["id"])) {
    header('Location: ' . 'dashboard.php');
  }

  if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user_info = [
      "first_name" => $_POST['first_name'],
      "last_name" => $_POST['last_name'],
      "email" => $_POST['email'],
      "password" => $_POST['password']
    ];
    
    if(check_register_duplicate($user_info["email"])) {
      echo "<script>alert(\"Email has already been used\");</script>";
    } else {
      register_user($user_info);
      db_disconnect($db);
      echo <<<EOF
        <script type="text/javascript">
        alert("Register Successfully!");
        window.location.href="login.php";
        </script>;
      EOF;
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register</title>
    <link
      rel="stylesheet"
      href="../../private/assets/style/login-register.css"
    />
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
        <button><a href="<?php echo encode_url('login.php');?>">Login</a></button>
        <button><a href="<?php echo encode_url('register.php');?>">Register</a></button>
      </div>
    </div>

    <div class="content">
      <h1 class="title">Pass Generator</h1>
      <h2 class="subtitle">Register</h2>
      <div class="form-container">
        <form action="register.php" method="post">
          
          <label for="first">First Name</label><br />
          <input
            type="text"
            id="first"
            name="first_name"
            placeholder="Enter your First Name"
            required
          />
          <span class="error" id="first_err"></span>
          <br />

          
          <label for="last">Last Name</label><br />
          <input
            type="text"
            id="last"
            name="last_name"
            placeholder="Enter your Last Name"
            required
          />
          <span class="error" id="last_err"></span>
          <br />

          
          <label for="email">Email</label><br />
          <input
            type="email"
            id="email"
            name="email"
            placeholder="Enter your email address"
            required
          />
          <span class="error" id="email_err"></span>
          <br />

          
          <label for="password">Password</label><br />
          <input
            type="password"
            id="password"
            name="password"
            placeholder="Enter your password"
            required
          />
          <span class="error" id="pass_err"></span>
          <br /> <br>

          <button id="sign-in-btn" type="button" onclick="register()">Submit</button>
        </form>
      </div>
    </div>
    <footer>
    © 2024 The Software Cats, All Rights Reserved
    </footer>
    
    <script src="../../private/assets/scripts/register.js"></script>
  </body>
</html>
