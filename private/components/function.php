<?php
    function encode_url($url) {
        return htmlspecialchars(urlencode($url));
    }

    function duplicate_password_message() {
        echo <<<EOF
            <script type="text/javascript">
            alert("Password already exist, please generate a different one");
            window.location.href="dashboard.php";
            </script>;
        EOF;
    }

    function encode_value($value) {
        return htmlspecialchars($value);
    }

    function strip_space($value) {
        return preg_replace('/\s+/', '', $value);
    }

?>