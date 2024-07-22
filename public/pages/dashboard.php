<?php require_once('../../private/initialize.php');
  if (empty($_SESSION["id"])) {
    header('Location: ' . 'login.php');
    exit;
  } 
  $userid = $_SESSION["id"];
  $userName = $_SESSION["user"];
  $get_password = get_all_password($userid);
  
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
      <img id="logo" src="../../private/assets/images/logo.png" alt="logo">
      <form action="logout.php" method="post" id="logout-form">
          <input type="submit" value="Logout" id="logout-btn">
      </form>
    </header>
    <main id="main">
      <!-- <h1 class="title">Password Generator</h1> -->
      <h1 class="title">Welcome <?php echo htmlspecialchars(ucwords($userName));?></h1>
      
      <form action="add.php" method="post" id="form1-pass">
        <div id="pass-generate-box">
          <div id="password-display">
            <!-- <label for="password-box" class="password-box-label">Generate Password</label> -->
            <input type="text" name="generate-password-box" id="generate-password-box" maxlength="20"></input>
          </div>
          <div id="selection">
            <div class="options">
              <output id="output">8</output>
              <input type="range" id="length" min="8" value="8" max="20" required oninput="updateOutput(this.value)"/>
              <label for="length">Length</label>
            </div>
            
            <div class="options">
              <input type="checkbox" id="lowercase" checked />
              <label for="lowercase">Lowercase</label>
            </div>
            
            <div class="options">
              <input type="checkbox" id="uppercase" checked />
              <label for="uppercase">Uppercase</label>
            </div>
            
            <div class="options">
              <input type="checkbox" id="numbers" checked />
              <label for="numbers">Numbers</label>
            </div>
            
            <div class="options">
              <input type="checkbox" id="symbols" checked />
              <label for="symbols">Symbols</label>
            </div>
          </div>
        </div>
        
        <div id="password-generate-btn">
          <button type="button" onclick="generatePassword();" class="generate-btn form1-btn">Generate</button>
          <button type="submit" class="store-btn form1-btn">Store</button>
        </div>
      </form>
      
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
              echo '<td><button type="button" onclick="buttonDelete();" class="deleteButton" value="' . encode_value($passId). '">Delete</button></td>';      
              echo "</tr>";
            }
          }

        ?>
      </table>
    </main>
    <footer id="footer">&copy; 2024 The Software Cats, All Rights Reserved</footer>
    <div class="pop-up-edit">
      <form action="edit.php" method="post" id="form2-edit">
        <h3>CURRENT PASSWORD</h3>
        <input type="text" maxlength="20" name="password-box-value" id="password-box-value">
        <input type="hidden" name="password-box-id" id="password-box-id">
        <div class="button-box">
          <button type="submit" class="open-modal form2-btn">Submit</button>
          <button type="button" class="close-modal form2-btn" onclick="cancel_change();">Cancel</button>
        </div>
      </form>
    </div>
    <div class="pop-up-delete">
      <form action="delete.php" method="post" id="form3-delete">
        <h3>DELETE THIS PASSWORD?</h3>
        <input type="text" maxlength="20" name="delete-box-value" id="delete-box-value" readonly>
        <input type="hidden" name="delete-box-id" id="delete-box-id">
        <div class="button-box">
          <button type="submit" class="open-modal form3-btn">Submit</button>
          <button type="button" class="close-modal form3-btn" onclick="cancel_change();">Cancel</button>
        </div>
      </form>
    </div>
    <div class="overlay"></div>
    
    <script src="../../private/assets/scripts/password-generator.js"></script>
    <script src="../../private/assets/scripts/pop-up.js"></script>
  </body>
</html>
