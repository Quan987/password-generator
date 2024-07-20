<?php require_once('../../private/initialize.php');
  if (empty($_SESSION["id"])) {
    header('Location: ' . 'login.php');
    exit;
  } 
  $userid = $_SESSION["id"];
  $userName = $_SESSION["user"];
  if ($_SERVER["REQUEST_METHOD"] === "GET" && !empty($GET["password-box"])) {
    $generatePass = strip_space($_GET["password-box"]);
    if (check_duplicate_password($generatePass)) {
      duplicate_password_message();
    } else {
      add_password($userid, $generatePass);
      $_GET["password-box"] = "";
      header('Location: ' . $_SERVER['PHP_SELF']);
      exit;
    }
  } else {
    $get_password = get_all_password($userid);
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../private/assets/style/dashboard.css">
    <title>Password Generator</title>
  </head>
  <body>
    <header id="header">
      <form action="logout.php" method="post">
          <input type="submit" value="Logout" id="logout-btn">
      </form>
    </header>
    <main id="main">
      <h1>Password Generator</h1>
      <br>
      <h2>Welcome <?php echo htmlspecialchars(ucwords($userName));?></h2>
      <br>
      <form action="index.php" method="get" id="form1-pass">
        <div id="password-display">
          <label for="password-box" class="password-box-label">Generate Password</label>
          <input type="text" name="password-box" id="password-box" maxlength="20"></input>
        </div>
        <br>
        <div>
          <div class="options">
            <label for="length">Password Length:</label>
            <input type="range" id="length" min="8" value="8" max="20" required oninput="this.nextElementSibling.value = this.value"/>
            <output>8</output>
          </div>
          <br>
          <div class="options">
            <label for="lowercase">Lowercase Letters:</label>
            <input type="checkbox" id="lowercase" checked />
          </div>
          <br>
          <div class="options">
            <label for="uppercase">Uppercase Letters:</label>
            <input type="checkbox" id="uppercase" checked />
          </div>
          <br>
          <div class="options">
            <label for="numbers">Numbers:</label>
            <input type="checkbox" id="numbers" checked />
          </div>
          <br>
          <div class="options">
            <label for="symbols">Symbols:</label>
            <input type="checkbox" id="symbols" checked />
          </div>
        </div>
        <br>
        <div>
          <button type="button" onclick="generatePassword();" class="form1-btn">Generate</button>
          <button type="submit" class="form1-btn">Add Password</button>
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
          if(!empty($get_password)) {
            for ($i = 0; $i < count($get_password); $i++) {
              $passValue = $get_password[$i]["pass"];
              $passId = $get_password[$i]["id"];
              echo '<tr>';
              echo '<td>' . ($i + 1) . '</td>';
              echo '<td class="password-value" data-value="' . $passValue . '">' . encode_value($passValue) .'</td>';
              echo '<td><button type="button" onclick="buttonEdit();" class="editButton" value="'. encode_value($passId) .'">Edit</button></td>';
              echo '<td><button type="button" onclick="buttonDelete();" class="deleteButton">Delete</button></td>';      
              echo "</tr>";
            }
          }

        ?>
      </table>
    </main>
    <footer id="footer">&copy; Copyright 2024 - Quan Tran, Cayla Bias, John Pham, Jannet Doan</footer>
    <div class="pop-up-edit">
      <form action="edit.php" method="post" id="form2-edit">
        <h3>CURRENT PASSWORD</h3>
        <input type="text" maxlength="20" name="password-box-value" id="password-box-value">
        <input type="hidden" name="password-box-id" id="password-box-id">
        <div class="button-box">
          <button type="submit" class="open-modal form2-btn" onclick="cancel_change();">Submit</button>
          <button type="button" class="close-modal form2-btn" onclick="cancel_change();">Cancel</button>
        </div>
      </form>
    </div>
    <div class="pop-up-delete">
      <form action="delete.php" method="post" id="form3-delete">
        <h3>DELETE THIS PASSWORD?</h3>
        <input type="text" maxlength="20" name="delete-box-value" id="delete-box-value" readonly>
        <input type="hidden" name="delete-box-id" id="delete-box-id" readonly>
        <div class="button-box">
          <button type="submit" class="open-modal form3-btn" onclick="cancel_change();">Submit</button>
          <button type="button" class="close-modal form3-btn" onclick="cancel_change();">Cancel</button>
        </div>
      </form>
    </div>
    <div class="overlay"></div>
    
    <script src="../../private/assets/scripts/password-generator.js"></script>
    <script src="../../private/assets/scripts/pop-up.js"></script>
  </body>
</html>
