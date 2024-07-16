<?php 
    require_once (PRIVATE_PATH . '/path.php');

    function connect_db() {
        $conn = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        if ($conn->connect_error) {
            echo "Connection failed: " . $conn->connect_error;
            exit;
        }
        echo "Connected successfully";
        
        
        
    }

    function db_disconnect($connection) {
        if(isset($connection)) {
            $connection -> close();
        }
    }

?>