<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookHaven - Your Literary Sanctuary</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600|playfair-display:700" rel="stylesheet" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Instrument Sans', sans-serif;
            background: linear-gradient(135deg, #f5f1e8 0%, #e8dcc8 100%);
            color: #2c2416;
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Header */
        header {
            padding: 20px 0;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-family: 'Playfair Display', serif;
            font-size: 28px;
            font-weight: 700;
            color: #8b4513;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo::before {
            content: "";
            width: 32px;
            height: 32px;
            background: #8b4513;
            border-radius: 4px;
            display: inline-block;
            position: relative;
        }

        .logo::after {
            content: "";
            position: absolute;
            left: 8px;
            top: 8px;
            width: 16px;
            height: 16px;
            border: 2px solid white;
            border-left: none;
        }

        .nav-links {
            display: flex;
            gap: 30px;
            list-style: none;
        }

        .nav-links a {
            text-decoration: none;
            color: #2c2416;
            font-weight: 500;
            transition: color 0.3s;
            position: relative;
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: #8b4513;
            transition: width 0.3s;
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        .auth-buttons {
            display: flex;
            gap: 15px;
        }

        .btn {
            padding: 10px 24px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s;
            border: none;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-outline {
            background: transparent;
            border: 1px solid #8b4513;
            color: #8b4513;
        }

        .btn-outline:hover {
            background: #8b4513;
            color: white;
        }

        .btn-primary {
            background: #8b4513;
            color: white;
            box-shadow: 0 4px 15px rgba(139, 69, 19, 0.3);
        }

        .btn-primary:hover {
            background: #6d3610;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(139, 69, 19, 0.4);
        }

        /* Hero Section */
        .hero {
            padding: 100px 0;
            text-align: center;
        }

        .hero h1 {
            font-family: 'Playfair Display', serif;
            font-size: 64px;
            color: #2c2416;
            margin-bottom: 20px;
            line-height: 1.2;
        }

        .hero p {
            font-size: 20px;
            color: #6b5d4f;
            margin-bottom: 40px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .hero-buttons {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn-large {
            padding: 16px 40px;
            font-size: 16px;
        }

        /* Features Section */
        .features {
            padding: 80px 0;
            background: white;
        }

        .features h2 {
            font-family: 'Playfair Display', serif;
            font-size: 42px;
            text-align: center;
            margin-bottom: 60px;
            color: #2c2416;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 40px;
        }

        .feature-card {
            text-align: center;
            padding: 40px 30px;
            border-radius: 12px;
            background: linear-gradient(135deg, #faf8f3 0%, #f0ebe0 100%);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
        }

        .feature-icon {
            width: 64px;
            height: 64px;
            margin: 0 auto 20px;
            background: #8b4513;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .feature-icon::before {
            content: "";
            width: 30px;
            height: 30px;
            border: 3px solid white;
            border-radius: 4px;
        }

        .icon-collection::after {
            content: "";
            position: absolute;
            width: 20px;
            height: 2px;
            background: white;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .icon-personalized::after {
            content: "";
            position: absolute;
            width: 20px;
            height: 20px;
            border: 3px solid white;
            border-radius: 50%;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .icon-instant::after {
            content: "";
            position: absolute;
            width: 0;
            height: 0;
            border-left: 15px solid white;
            border-top: 10px solid transparent;
            border-bottom: 10px solid transparent;
            top: 50%;
            left: 52%;
            transform: translate(-50%, -50%);
        }

        .icon-price::after {
            content: "$";
            position: absolute;
            color: white;
            font-size: 24px;
            font-weight: bold;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .icon-reviews::after {
            content: "★";
            position: absolute;
            color: white;
            font-size: 28px;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .icon-rewards::after {
            content: "";
            position: absolute;
            width: 18px;
            height: 18px;
            border: 3px solid white;
            border-radius: 2px;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(45deg);
        }

        .feature-card h3 {
            font-size: 24px;
            margin-bottom: 15px;
            color: #8b4513;
        }

        .feature-card p {
            color: #6b5d4f;
            line-height: 1.8;
        }

        /* Book Categories */
        .categories {
            padding: 80px 0;
        }

        .categories h2 {
            font-family: 'Playfair Display', serif;
            font-size: 42px;
            text-align: center;
            margin-bottom: 60px;
            color: #2c2416;
        }

        .category-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 30px;
        }

        .category-item {
            aspect-ratio: 3/4;
            border-radius: 12px;
            background: linear-gradient(135deg, #8b4513 0%, #6d3610 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            font-weight: 600;
            color: white;
            cursor: pointer;
            transition: transform 0.3s, box-shadow 0.3s;
            position: relative;
            overflow: hidden;
        }

        .category-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0) 100%);
            opacity: 0;
            transition: opacity 0.3s;
        }

        .category-item:hover {
            transform: scale(1.05);
            box-shadow: 0 15px 40px rgba(139, 69, 19, 0.4);
        }

        .category-item:hover::before {
            opacity: 1;
        }

        /* CTA Section */
        .cta {
            padding: 80px 0;
            background: linear-gradient(135deg, #8b4513 0%, #6d3610 100%);
            color: white;
            text-align: center;
        }

        .cta h2 {
            font-family: 'Playfair Display', serif;
            font-size: 42px;
            margin-bottom: 20px;
        }

        .cta p {
            font-size: 18px;
            margin-bottom: 40px;
            opacity: 0.9;
        }

        .btn-white {
            background: white;
            color: #8b4513;
        }

        .btn-white:hover {
            background: #f5f1e8;
        }

        /* Footer */
        footer {
            background: #2c2416;
            color: white;
            padding: 40px 0 20px;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
            margin-bottom: 30px;
        }

        .footer-section h3 {
            font-family: 'Playfair Display', serif;
            margin-bottom: 20px;
            color: #d4a574;
        }

        .footer-section ul {
            list-style: none;
        }

        .footer-section ul li {
            margin-bottom: 10px;
        }

        .footer-section a {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-section a:hover {
            color: white;
        }

        .footer-bottom {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: rgba(255, 255, 255, 0.6);
        }

        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }

            .hero h1 {
                font-size: 42px;
            }

            .hero p {
                font-size: 16px;
            }

            .features h2, .categories h2, .cta h2 {
                font-size: 32px;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="container">
            <nav>
                <a href="#" class="logo">BookHaven</a>
                <ul class="nav-links">
                    <li><a href="#home">Home</a></li>
                    <li><a href="#features">Features</a></li>
                    <li><a href="#categories">Categories</a></li>
                    <li><a href="#about">About</a></li>
                </ul>
                <div class="auth-buttons">
                    @auth
                        @if(Auth::user()->isAdmin())
                            <a href="/admin/dashboard" class="btn btn-outline">Dashboard Admin</a>
                        @else
                            <a href="/user/dashboard" class="btn btn-outline">Dashboard</a>
                        @endif
                        <form action="/logout" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-primary">Keluar</button>
                        </form>
                    @else
                        <a href="/login" class="btn btn-outline">Log in</a>
                        <a href="/register" class="btn btn-primary">Register</a>
                    @endauth
                </div>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="container">
            <h1>Your Literary Sanctuary</h1>
            <p>Discover thousands of books, from timeless classics to contemporary bestsellers. Your next great read awaits.</p>
            <div class="hero-buttons">
                <a href="#categories" class="btn btn-primary btn-large">Explore Books</a>
                <a href="#features" class="btn btn-outline btn-large">Learn More</a>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features" id="features">
        <div class="container">
            <h2>Why Choose BookHaven?</h2>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon icon-collection"></div>
                    <h3>Vast Collection</h3>
                    <p>Access over 100,000 books across all genres. From fiction to non-fiction, we have it all.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon icon-personalized"></div>
                    <h3>Personalized</h3>
                    <p>Get book recommendations tailored to your reading preferences and history.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon icon-instant"></div>
                    <h3>Instant Access</h3>
                    <p>Download books instantly or get them delivered to your doorstep within 24 hours.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon icon-price"></div>
                    <h3>Best Prices</h3>
                    <p>Competitive pricing with regular discounts and special offers for members.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon icon-reviews"></div>
                    <h3>Reviews & Ratings</h3>
                    <p>Read authentic reviews from fellow book lovers to make informed choices.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon icon-rewards"></div>
                    <h3>Rewards Program</h3>
                    <p>Earn points with every purchase and redeem them for exclusive benefits.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="categories" id="categories">
        <div class="container">
            <h2>Browse by Category</h2>
            <div class="category-grid">
                <div class="category-item">Fiction</div>
                <div class="category-item">Mystery</div>
                <div class="category-item">Romance</div>
                <div class="category-item">Sci-Fi</div>
                <div class="category-item">Biography</div>
                <div class="category-item">History</div>
                <div class="category-item">Self-Help</div>
                <div class="category-item">Children's</div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta">
        <div class="container">
            <h2>Start Your Reading Journey Today</h2>
            <p>Join thousands of readers who have found their perfect books with us</p>
            <a href="/register" class="btn btn-white btn-large">Get Started Now</a>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>BookHaven</h3>
                    <p>Your trusted online bookstore for all your reading needs. Discover, explore, and enjoy the world of books.</p>
                </div>
                <div class="footer-section">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">FAQs</a></li>
                        <li><a href="#">Shipping Info</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h3>Categories</h3>
                    <ul>
                        <li><a href="#">Fiction</a></li>
                        <li><a href="#">Non-Fiction</a></li>
                        <li><a href="#">Best Sellers</a></li>
                        <li><a href="#">New Releases</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h3>Connect</h3>
                    <ul>
                        <li><a href="#">Facebook</a></li>
                        <li><a href="#">Twitter</a></li>
                        <li><a href="#">Instagram</a></li>
                        <li><a href="#">Newsletter</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2024 BookHaven. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>
