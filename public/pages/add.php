<?php
    require_once('../../private/initialize.php');
    require_once('dashboard.php');

    if($_SERVER["REQUEST_METHOD"] !== "POST" &&  isset($_POST["generate-password-box"])) {
        header('Location: ' . 'dashboard.php');
        exit;
    } else {
        $user_info = [
            "id" => $_SESSION["id"],
            "genPassword" => strip_space($_POST["generate-password-box"])
        ];
        if (check_duplicate_password($user_info["genPassword"])) {
            duplicate_password_message();
        }
        if(add_password($user_info)) {
            $_POST["generate-password-box"] = "";
            echo <<<EOF
                <script type="text/javascript">
                alert("Password Add Succesful!");
                window.location.href="dashboard.php";
                </script>;
            EOF;
        } else {
            echo <<<EOF
                <script type="text/javascript">
                alert("Password Cannot Be Add");
                window.location.href="dashboard.php";
                </script>;
            EOF;
        }

    }


?>