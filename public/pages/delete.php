<?php

require_once('../../private/initialize.php');
require_once('dashboard.php');

    if($_SERVER["REQUEST_METHOD"] !== "POST") {
        header('Location: ' . 'dashboard.php');
        exit;
    } else {
        $user_info = [
            "id" => $_SESSION["id"],
            "passwordID" => $_POST["delete-box-id"],
            "passwordValue" => $_POST["delete-box-value"]
        ];
        if(delete_password($user_info)) {
            $_POST["delete-box-id"] = "";
            $_POST["delete-box-value"] = "";
            echo <<<EOF
                <script type="text/javascript">
                alert("Delete Successful!");
                window.location.href="dashboard.php";
                </script>;
            EOF;
        } else {
            echo <<<EOF
                <script type="text/javascript">
                alert("Password Cannot Be Delete");
                window.location.href="dashboard.php";
                </script>;
            EOF;
        }
        
    }


?>