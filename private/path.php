<?php 
    // Database constants variable (change here per local machine):
    $server = "localhost";
    $username = "webuser";
    $password = "pass2402";
    $database_name = "passgen";

    // Database constants;
    define ("DB_SERVER", $server);
    define ("DB_USER", $username);
    define ("DB_PASS", $password);
    define ("DB_NAME", $database_name);

    // File path constants;
    define("PROJECT_PATH", dirname(dirname(__FILE__)));
    define("PUBLIC_PATH", PROJECT_PATH . "/public");
    define("PRIVATE_PATH", PROJECT_PATH . "/private");
    define("COMPONENTS_PATH", PRIVATE_PATH . "/components");
    
    



?>