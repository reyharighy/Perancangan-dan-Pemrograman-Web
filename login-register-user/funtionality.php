<?php
    function any_duplicate($conn, $column, $variable) {
        $stmt = $conn->prepare("SELECT * FROM users WHERE $column = ?");
        $stmt->bind_param("s", $variable);
        $stmt->execute();

        return $stmt->get_result();
    }

    function dynamic_element($name, $variable, $is_success) {
        $type = $name == "Username" ? "text" : "email";
        $lowercase = strtolower($name);

        if ($is_success) {
            echo "<tr><td colspan=\"3\"><input type=\"$type\" name=\"$lowercase\" placeholder=\"$lowercase\"></td></tr>";
        } else {
            echo "<tr><td colspan=\"3\"><input type=\"$type\" name=\"$lowercase\" value=\"$variable\"></td></tr>";
        }
    }