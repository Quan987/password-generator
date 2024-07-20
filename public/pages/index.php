<?php require_once('../../private/initialize.php');
  if (empty($_SESSION["id"])) {
    header('Location: ' . 'login.php');
    exit;
  } 
  $userid = $_SESSION["id"];
  $userName = $_SESSION["user"];
  if ($_SERVER["REQUEST_METHOD"] === "GET" && !empty($_GET["password-box"])) {
    $generatePass = preg_replace('/\s+/', '', $_GET["password-box"]);
    if (check_duplicate_password($generatePass)) {
      echo <<<EOF
      <script type="text/javascript">
      alert("Password already exist, please generate a different one");
      window.location.href="index.php";
      </script>;
    EOF;
    } else {
      add_password($userid, $generatePass);
      $_GET["password-box"] = "";
      header('Location: ' . $_SERVER['PHP_SELF']);
      exit;
    }
    
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <script src="../scripts/script.js"></script>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../private/assets/style/dashboard.css">
    <title>Password Generator</title>
    <script>
       if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
    </script>
  </head>
  <body>
    <header>
      <form action="logout.php" method="post">
          <input type="submit" value="Logout">
      </form>
    </header>
    <main id="main">
      <h1>Password Generator</h1>
      <h2>Welcome <?php echo htmlspecialchars(ucwords($userName));?></h2>
      <form action="index.php" method="get">
        <div id="password-display">
          <label for="password-box">Generate Password</label>
          <input type="text" name="password-box" id="password-box" maxlength="20"></input>
        </div>
        <br>
        <div class="options">
          <label for="length">Password Length:</label>
          <input type="range" id="length" min="8" value="8" max="20" required oninput="this.nextElementSibling.value = this.value"/>
          <output>8</output>
        </div>
        <div class="options">
          <label for="lowercase">Include Lowercase Letters:</label>
          <input type="checkbox" id="lowercase" checked />
        </div>
        <div class="options">
          <label for="uppercase">Include Uppercase Letters:</label>
          <input type="checkbox" id="uppercase" checked />
        </div>
        <div class="options">
          <label for="numbers">Include Numbers:</label>
          <input type="checkbox" id="numbers" checked />
        </div>
        <div class="options">
          <label for="symbols">Include Symbols:</label>
          <input type="checkbox" id="symbols" checked />
        </div>
        <br>
        <div>
          <button type="button" onclick="generatePassword();">Generate</button>
          <button type="submit">Add Password</button>
        </div>
      </form>
      <br>
      <table id="password-table">
        <tr>
          <th>Number</th>
          <th class="th-password">Password</th>
          <th>Modify</th>
          <th>Remove</th>
        </tr>
       <?php
          $get_password = get_all_password($userid);
          if(!empty($get_password)) {
            for ($i = 0; $i < count($get_password); $i++) {
              echo "<tr>";
              echo "<td>" . ($i+1) . "</td>";
              echo "<td>" . htmlspecialchars($get_password[$i]["pass"]) ."</td>";
              echo "<td>Edit</td>";
              echo "<td>Delete</td>";
              echo "</tr>";
            }
          }

        ?>
      </table>

    </main>
    <?php db_disconnect($db); ?>
    <script src="../../private/assets/scripts/password-generator.js"></script>
  </body>
</html>
