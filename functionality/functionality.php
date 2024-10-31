<?php
    function any_duplicate($conn, $column, $variable) {
        $stmt = $conn->prepare("SELECT * FROM users WHERE $column = ?");
        $stmt->bind_param("s", $variable);
        $stmt->execute();

        return $stmt->get_result();
    }

    function dynamic_element($name, $variable, $is_saved) {
        $type = $name == "Username" ? "text" : "email";
        $lowercase = strtolower($name);

        if ($is_saved) {
            echo "<tr><td colspan=\"3\"><input type=\"$type\" name=\"$lowercase\" placeholder=\"$lowercase\"></td></tr>";
        } else {
            echo "<tr><td colspan=\"3\"><input type=\"$type\" name=\"$lowercase\" value=\"$variable\"></td></tr>";
        }
    }

    function promotion_header() {
        if (!isset($_SESSION["user_id"])) {
            echo "<div class=\"top-bar\">
                    <p>Sign up and get 20% off your first order. 
                    <a href=\"http://localhost/project/Perancangan-dan-Pemrograman-Web/login-register-user/signup.php\">Sign Up Now</a></p>
                 </div>";
        }
    }