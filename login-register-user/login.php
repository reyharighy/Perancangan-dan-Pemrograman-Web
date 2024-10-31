<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        include("funtionality.php");

        session_start();
        $conn = new mysqli("localhost","root","","ecommerce_db");

        if ($conn->connect_error) {
            die("Connection failed: ". $conn->connect_error);
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST["email"];
            $password = $_POST["password"];

            $email_duplicate = any_duplicate($conn, "email", $email);
            
            if ($email_duplicate->num_rows == 0) {
                $email_error = "Email does not exist";
            } else {
                $row = $email_duplicate->fetch_assoc();
                $stored_hashed_password = $row["password"];

                if (password_verify($password, $stored_hashed_password)) {
                    $_SESSION["user_id"] = $row["user_id"];
                    $_SESSION["username"] = $row["username"];
                    $_SESSION["email"] = $row["email"];
                    header("Location: http://localhost/ppw_project/home-product/Homepage/index.php?");
                } else {
                    $password_error = "Password is incorrect";
                }
            }
        }
    ?>
    <section class="image">
        <div><img style="width: 100%; object-fit: contain" src="img/signup.png"></div>
    </section>
    
    <section class="right-side">
        <div>
            <h1>Welcome Back!</h1>
            <p>Please enter your contact detail to connect</p>
            <form id="regisform" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                <table>
                    <tr>
                        <td colspan="3">
                            <button id="google">
                                <img width="20vw" src="img/google.png">
                                <a>Sign in with Google</a>
                            </button> 
                        </td>
                    </tr>
        
                    <tr>
                        <td style="width: 45%;">
                            <div id="garis"></div>
                        </td>
                        <td style="width: 10%; text-align: center;">
                            <p>OR</p>
                        </td>
                        <td style="width: 45%;">
                            <div id="garis"></div>
                        </td>
                    </tr>

                    <?php
                        if (isset($email_error)) {
                            echo "<tr><td colspan=\"3\" style=\"color: red;\">$email_error</td></tr>";
                        } else {
                            echo "<tr><td colspan=\"3\"><label>Email</label></td></tr>";
                        }

                        if (isset($email)) {
                            $element = !isset($email_error) ? "value=\"$email\"" : "placeholder=\"email\"";
                            echo "<tr><td colspan=\"3\"><input type=\"email\" name=\"email\" " . $element . "></td></tr>";
                        } else {
                            echo "<tr><td colspan=\"3\"><input type=\"email\" name=\"email\" placeholder=\"email\"></td></tr>";
                        }
                    
                        if (isset($password_error)) {
                            echo "<tr><td colspan=\"3\" style=\"color: red;\">$password_error</td></tr>";
                        } else {
                            echo "<tr><td colspan=\"3\"><label>Password</label></td></tr>";
                        }
                    ?>

                    <tr><td colspan="3"><input type="password" name="password" placeholder="password"></td></tr>
    
                    <tr>
                        <td colspan="3">
                            <button id="submit" type="submit">Sign in</button>
                        </td>
                    </tr>
    
                    <tr>
                        <td colspan="3" style="text-align: center;">
                            Don't have an account? 
                            <a href="http://localhost/ppw_project/login-register-user/signup.php" style="text-decoration:none;">
                            <strong style="color: #00ADB5;">Sign Up</strong></a>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </section>
</body>
</html>

