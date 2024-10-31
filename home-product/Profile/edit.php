<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <?php
            include "../../functionality/functionality.php";
            include "../../functionality/const.php";

            session_start();
            $conn = new mysqli("localhost", "root","","ecommerce_db");

            if ($conn->connect_error) {
                die("Connection failed: ". $conn->connect_error);
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $first_name = $_POST["first_name"];
                $last_name = $_POST["last_name"];
                $dob = $_POST["dob"];
                $email = $_POST["email"];
                $phone = $_POST["phone"];
                $address1 = $_POST["address1"];
                $address2 = $_POST["address2"];
                $city = $_POST["city"];
                $state = $_POST["state"];
                $country = $_POST["country"];
                $zip = $_POST["zip"];

                $email_duplicate = any_duplicate($conn, "email", $email);
                $row = $email_duplicate->fetch_assoc();

                if ($email_duplicate->num_rows > 0) {
                    if ($_SESSION["email"] != $row["email"]) {
                        $email_error = "Email already registered";
                    }
                }

                $phone_duplicate = any_duplicate($conn, "phone", $phone);
                $row = $phone_duplicate->fetch_assoc();

                if ($phone_duplicate->num_rows > 0) {
                    if ($phone != $row["phone"]) {
                        $phone_error = "Phone already registered";
                    }
                }
            }

            $conn->close();
        ?>

        <nav class="navbar">
            <div class="logo">SHOP<span style="color: #00adb5;">.CO</span></div>
            <ul class="nav-links">
                <li><a href="#">Shop</a></li>
                <li><a href="#">Top Sales</a></li>
                <li><a href="#">Offers</a></li>
                <li><a href="#">Seller</a></li>
            </ul>
            <div class="search-container">
                <button>
                    <a href="#"><img src="../icon/search.svg"></a>
                </button>
                <input type="text" placeholder="Search for products...">
            </div>
            <div class="cart-profile">
                <a href=<?php echo htmlspecialchars($GLOBALS["cart_url"]) ?>>
                    <img src="../icon/cart.svg" alt="Cart">
                </a>
                <a href=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>>
                    <img src="../icon/profile.svg" alt="Profile">
                </a>
                <label>
                    <?php echo "<strong style=\"color: #00ADB5;\">" . $_SESSION["username"] . "</strong>";?>
                </label>
            </div>     
        </nav>
    </header>

    <section class="section-edit">
        <form id="edit" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> method="POST">
            <div class="left-side">
                <label>First Name:</label>
                <input type="text" name="first_name">

                <label>Last Name:</label>
                <input type="text" name="last_name">

                <label>Date of Birth:</label>
                <input type="date" name="dob">

                <?php echo isset($email_error) ? "<label style=\"color: red;\">$email_error</label>" : "<label>Email:</label>" ?>
                <input type="email" name="email" value=<?php echo isset($email_error) ? $row["email"] : $_SESSION["email"]; ?>>
    
                <?php echo isset($phone_error) ? "<label style=\"color: red;\">$phone_error</label>" : "<label>Phone Number:</label>" ?>
                <input type="text" name="phone" value=<?php echo isset($phone_error) ? $row["phone"] : $_SESSION["email"]; ?>>

                <label>Address Line 1:</label>
                <input type="text" name="address1">

                <label>Address Line 2:</label>
                <input type="text" name="address2">

                <label>City:</label>
                <input type="text" name="city">

                <label>State:</label>
                <input type="text" name="state">

                <label>Country:</label>
                <input type="text" name="country">

                <label>Postal Code:</label>
                <input type="text" name="zip">
    
                <input type="submit" id="submit-edit">
            </div>
            <div class="right-side">
                <div><img></div>
                <button class="change-pp">Change Profile Picture</button>
            </div>
        </form>
    </section>
    

    <section class="newsletter">
        <div class="newsletter-content">
            <h2>STAY UPDATE ABOUT OUR LATEST OFFERS</h2><br>
            <form class="newsletter-form">
                <input type="email" placeholder="Enter your email address" required>
                <button type="submit">Subscribe to Newsletter</button>
            </form>
        </div>
    </section>

    <footer class="footer">
        <div class="footer-content">
            <div class="footer-brand">
                <h3>SHOP.CO</h3>
                <p>We have clothes that suits your style and which you’re proud to wear. From women to men.</p><br>
                <div class="social-icons">
                    <a href="#"><img src="../icon/twitter.svg"></a>
                    <a href="#"><img src="../icon/fb.svg"></a>
                    <a href="#"><img src="../icon/ig.svg"></i></a>
                    <a href="#"><img src="../icon/github.svg"></i></a>
                </div>
            </div>
            <div class="footer-links">
                <div class="footer-column">
                    <h4>COMPANY</h4>
                    <a href="#">About</a>
                    <a href="#">Features</a>
                    <a href="#">Works</a>
                    <a href="#">Career</a>
                </div>
                <div class="footer-column">
                    <h4>HELP</h4>
                    <a href="#">Customer Support</a>
                    <a href="#">Delivery Details</a>
                    <a href="#">Terms & Conditions</a>
                    <a href="#">Privacy Policy</a>
                </div>
                <div class="footer-column">
                    <h4>FAQ</h4>
                    <a href="#">Account</a>
                    <a href="#">Manage Deliveries</a>
                    <a href="#">Orders</a>
                    <a href="#">Payments</a>
                </div>
                <div class="footer-column">
                    <h4>RESOURCES</h4>
                    <a href="#">Free eBooks</a>
                    <a href="#">Development Tutorial</a>
                    <a href="#">How to - Blog</a>
                    <a href="#">Youtube Playlist</a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>Shop.co © 2000-2023, All Rights Reserved</p>
        </div>
    </footer>
</body>
</html>