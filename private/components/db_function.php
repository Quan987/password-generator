<?php require_once (PRIVATE_PATH . '/path.php');

    function connect_db() {
        $conn = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        if ($conn->connect_error) {
            echo "Connection failed: " . $conn->connect_error;
            exit;
        }
        echo "Connected successfully";   
        return $conn;
    }

    function db_disconnect($connection) {
        if(isset($connection)) {
            $connection -> close();
        }
    }

    function register_user($info) {
        global $db;
        // $hashed_password = password_hash($info["password"], PASSWORD_DEFAULT);
        $query = "INSERT INTO user (first_name, last_name, email, password) VALUES (?, ?, ?, ?)";
        $stmt = $db->prepare($query);
        $stmt->bind_param('ssss', $info["first_name"], $info["last_name"], $info["email"], $info["password"]);
    
        if ($stmt->execute()) {
            return true;
        } else {
            echo "Error: " . $stmt->error;
        }
    }

    function check_register_duplicate($userEmail) {
        global $db;
        $query = "SELECT email FROM user ORDER BY id ASC";
        $stmt = $db->query($query);
        while($result = $stmt->fetch_assoc()) {
            if ($userEmail === $result["email"]) {
                return true;
            }
        }
        return false;
        
    }

?>