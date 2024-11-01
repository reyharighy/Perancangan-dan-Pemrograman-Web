<?php include 'db_conn.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop.CO</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- Header -->
    <header>
        <?php
            include "../../functionality/functionality.php";
            include "../../functionality/const.php";

            session_start();
            promotion_header();

            $conn = new mysqli("localhost", "root","","ecommerce_db");

            if ($conn->connect_error) {
                die("Connection failed: ". $conn->connect_error);
            }
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
            <?php
                if (isset($_SESSION["user_id"])) {
                    $href = [$GLOBALS["cart_url"], $GLOBALS["profile_url"]];
                } else {
                    $href = [$GLOBALS["sign_in_url"], $GLOBALS["sign_in_url"]];
                }
            ?>
            <div class="cart-profile">
                <a href=<?php echo htmlspecialchars($href[0]) ?>>
                    <img src="../icon/cart.svg" alt="Cart">
                </a>
                <a href=<?php echo htmlspecialchars($href[1]) ?> >
                    <img src="../icon/profile.svg" alt="Profile">
                </a>
                <label>
                    <?php
                        $text_signin = "<strong style=\"color: #00ADB5;\">Sign In</strong>";
                        $signin = "<a href=$href[0] style=\"text-decoration: none;\">$text_signin</a>";
                        echo isset($_SESSION["user_id"]) ? "<strong style=\"color: #00ADB5;\">" . $_SESSION["username"] . "</strong>" : $signin;
                    ?>
                </label>
            </div>     
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-text">
            <h1>Search and Find Your Favorites</h1>
            <p style="opacity: 0.6;">Browse through our diverse range of meticulously crafted garments, designed to bring out your individuality and cater to your sense of style.</p><br>
            <a href="#">Shop Now</a>
            <div class="statsnum">
                <div>200+ <span id="stats"><br> International Brands</span></div>
                <div>2,000+ <span id="stats"><br> High-Quality Products</span></div>
                <div>30,000+ <span id="stats"><br> Happy Customers</span></div>
            </div>
        </div>
        <div class="hero-image">
            <img src="../icon/hero.png">
        </div>
    </section>

    <div id="blank"></div>

    <!-- Offers Section -->
    <section class="offers">
        <h2>Offers</h2>
        <div class="products">
            <div class="product-card">
                <a href="#">
                    <img src="../pict/99129445_p0.jpg" alt="Product"><br>
                </a>
                <div class="product-card-details">
                    <a href="#">Product Name</a>
                    <div class="rating">
                        ★★★★☆ <span id="rating"> 4/5</span>
                    </div>
                    <p class="price">Price<span id="price2">Price</span><span id="discount">XX%</span></p>
                </div>
            </div>

            <div class="product-card">
                <a href="#">
                    <img src="../pict/110666530_p0.jpg" alt="Product"><br>
                </a>
                <div class="product-card-details">
                    <a href="#">Product Name</a>
                    <div class="rating">
                        ★★★★☆ <span id="rating"> 4/5</span>
                    </div>
                    <p class="price">Price<span id="price2">Price</span><span id="discount">XX%</span></p>
                </div>
            </div>

            <div class="product-card">
                <a href="#">
                    <img src="../pict/110666530_p0.jpg" alt="Product"><br>
                </a>
                <div class="product-card-details">
                    <a href="#">Product Name</a>
                    <div class="rating">
                        ★★★★☆ <span id="rating"> 4/5</span>
                    </div>
                    <p class="price">Price<span id="price2">Price</span><span id="discount">XX%</span></p>
                </div>
            </div>

            <div class="product-card">
                <a href="#">
                    <img src="../pict/99129445_p0.jpg" alt="Product"><br>
                </a>
                <div class="product-card-details">
                    <a href="#">Product Name</a>
                    <div class="rating">
                        ★★★★☆ <span id="rating"> 4/5</span>
                    </div>
                    <p class="price">Price<span id="price2">Price</span><span id="discount">XX%</span></p>
                </div>
            </div>
        </div>
        <a href="#" class="view-all">View All</a>
        <hr>
    </section>
    <a href="#" class="view-all">View All</a>
    <hr>

    <!-- Top Sales Section -->
    <section class="top-sales">
        <h2>Top Sales</h2>
        <div class="products">
            <div class="product-card">
                <a href="#">
                    <img src="../pict/99129445_p0.jpg" alt="Product"><br>
                </a>
                <div class="product-card-details">
                    <a href="#">Product Name</a>
                    <div class="rating">
                        ★★★★☆ <span id="rating"> 4/5</span>
                    </div>
                    <p class="price">Price<span id="price2">Price</span><span id="discount">XX%</span></p>
                </div>
            </div>

            <div class="product-card">
                <a href="#">
                    <img src="../pict/110666530_p0.jpg" alt="Product"><br>
                </a>
                <div class="product-card-details">
                    <a href="#">Product Name</a>
                    <div class="rating">
                        ★★★★☆ <span id="rating"> 4/5</span>
                    </div>
                    <p class="price">Price<span id="price2">Price</span><span id="discount">XX%</span></p>
                </div>
            </div>

            <div class="product-card">
                <a href="#">
                    <img src="../pict/110666530_p0.jpg" alt="Product"><br>
                </a>
                <div class="product-card-details">
                    <a href="#">Product Name</a>
                    <div class="rating">
                        ★★★★☆ <span id="rating"> 4/5</span>
                    </div>
                    <p class="price">Price<span id="price2">Price</span><span id="discount">XX%</span></p>
                </div>
            </div>

            <div class="product-card">
                <a href="#">
                    <img src="../pict/99129445_p0.jpg" alt="Product"><br>
                </a>
                <div class="product-card-details">
                    <a href="#">Product Name</a>
                    <div class="rating">
                        ★★★★☆ <span id="rating"> 4/5</span>
                    </div>
                    <p class="price">Price<span id="price2">Price</span><span id="discount">XX%</span></p>
                </div>
            </div>
        </div>
        <a href="#" class="view-all">View All</a>
    </section>
    <a href="#" class="view-all">View All</a>

      <!-- Category Section -->
      <section class="category">
          <div class="categories">
            <div class="categories-container">
                <h2>Category</h2>
                <a href="#">
                    <img src="../icon/makeup.svg" alt="Category Name" class="category-image">
                </a>
                
                <a href="#">
                    <img src="../icon/gaming.svg" alt="Category Name" class="category-image">
                </a>
            
                <a href="#">
                    <img src="../icon/kitchen.svg" alt="Category Name" class="category-image">
                </a>
            
                <a href="#">
                    <img src="../icon/clothes.svg" alt="Category Name" class="category-image">
                </a>
            
                <a href="#">
                    <img src="../icon/books.svg" alt="Category Name" class="category-image">
                </a>
            
                <a href="#">
                    <img src="../icon/toys.svg" alt="Category Name" class="category-image">
                </a>
            </div>
        </div>
    </section>
    

    <!-- Newsletter Section -->
    <section class="newsletter">
        <div class="newsletter-content">
            <h2>STAY UPTO DATE ABOUT OUR LATEST OFFERS</h2>
            <form class="newsletter-form">
                <input type="email" placeholder="Enter your email address" required>
                <button type="submit">Subscribe to Newsletter</button>
            </form>
        </div>
    </section>

    <!-- Footer Section -->
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
