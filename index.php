<?php session_start(); 
include 'components/header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Foodies' Paradise | Luxury Dining Experience</title>
    <!-- Enhanced CSS Libraries -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <!-- Add Premium Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <!-- Add Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        :root {
            --primary-color: #B8860B;
            --secondary-color: #2C3E50;
            --accent-color: #D4AF37;
            --text-color: #333333;
            --light-gold: #F4E7BE;
        }

        body {
            font-family: 'Poppins', sans-serif;
            color: var(--text-color);
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Playfair Display', serif;
        }

        /* Premium Hero Section */
        .hero {
            position: relative;
            height: 100vh;
            background-attachment: fixed;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        /* Premium Buttons */
        .btn-premium {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 0;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
        }

        .btn-premium:hover {
            background-color: var(--accent-color);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        /* Premium Cards */
        .premium-card {
            border: none;
            border-radius: 0;
            transition: all 0.3s ease;
            background: white;
        }

        .premium-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        }

        /* Premium Features */
        .feature-box {
            padding: 2rem;
            background: white;
            border: 1px solid var(--light-gold);
            transition: all 0.3s ease;
        }

        .feature-box:hover {
            background: var(--light-gold);
            transform: translateY(-5px);
        }

        /* Premium Testimonials */
        .testimonial-section {
            background: linear-gradient(45deg, var(--secondary-color), var(--primary-color));
            color: white;
        }

        /* Premium Newsletter */
        .newsletter-section {
            background: var(--secondary-color);
            position: relative;
            overflow: hidden;
        }

        .newsletter-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('assets/images/pattern.png');
            opacity: 0.1;
        }

        /* Animated Elements */
        .fade-up {
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.6s ease;
        }

        .fade-up.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Premium Navigation */
        /* .navbar {
            background: transparent;
            transition: all 0.3s ease;
            padding: 1.5rem 0;
        }

        .navbar.scrolled {
            background: rgba(255, 255, 255, 0.95);
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 1rem 0;
        } */

        /* Premium Menu Cards */
        .menu-card {
            position: relative;
            overflow: hidden;
            border-radius: 0;
            margin-bottom: 30px;
        }

        .menu-card img {
            transition: all 0.5s ease;
        }

        .menu-card:hover img {
            transform: scale(1.1);
        }

        .menu-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(transparent, rgba(0,0,0,0.8));
            padding: 2rem;
            color: white;
        }
    </style>
</head>
<body>

<!-- Premium Hero Section -->
<section class="hero d-flex align-items-center" style="background: url('assets/images/image.jpeg') center/cover no-repeat;">
    <div class="container hero-content text-center">
        <h1 class="display-3 mb-4" data-aos="fade-down">Exquisite Culinary Experience</h1>
        <p class="lead mb-5" data-aos="fade-up">Indulge in a symphony of flavors, crafted with passion and precision</p>
        <div class="d-flex justify-content-center gap-3">
            <a href="menu.php" class="btn btn-premium" data-aos="fade-right">
                <i class="fas fa-utensils me-2"></i>Explore Menu
            </a>
            <a href="reservation.php" class="btn btn-premium" data-aos="fade-left">
                <i class="fas fa-calendar-alt me-2"></i>Reserve Table
            </a>
        </div>
    </div>
</section>

<!-- Premium Features Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-4" data-aos="fade-up">
                <div class="feature-box text-center">
                    <i class="fas fa-star fa-2x mb-3" style="color: var(--primary-color)"></i>
                    <h4>Michelin-Starred Chefs</h4>
                    <p>Experience culinary excellence from our award-winning team</p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="feature-box text-center">
                    <i class="fas fa-leaf fa-2x mb-3" style="color: var(--primary-color)"></i>
                    <h4>Organic Ingredients</h4>
                    <p>Sourced daily from local premium suppliers</p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="feature-box text-center">
                    <i class="fas fa-clock fa-2x mb-3" style="color: var(--primary-color)"></i>
                    <h4>Express Delivery</h4>
                    <p>Swift and secure delivery to your doorstep</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Premium Menu Preview -->
<section class="py-5">
    <div class="container">
        <h2 class="text-center mb-5" data-aos="fade-up">Signature Dishes</h2>
        <div class="row">
            <div class="col-md-4" data-aos="zoom-in">
                <div class="menu-card premium-card">
                    <img src="assets/images/image.jpeg" class="card-img-top" alt="Signature Dish">
                    <div class="menu-overlay">
                        <h5>Truffle Infused Risotto</h5>
                        <p class="mb-0">$29.99</p>
                    </div>
                </div>
            </div>
            <!-- Add more menu items similarly -->
        </div>
    </div>
</section>

<!-- Premium Newsletter Section -->
<section class="newsletter-section py-5 text-white">
    <div class="container position-relative">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <h2 class="mb-4">Join Our Culinary Journey</h2>
                <p class="mb-4">Subscribe for exclusive offers and culinary insights</p>
                <form class="d-flex justify-content-center gap-2">
                    <input type="email" class="form-control form-control-lg" style="max-width: 400px;" placeholder="Your Email Address">
                    <button type="submit" class="btn btn-premium">Subscribe</button>
                </form>
            </div>
        </div>
    </div>
</section>

<?php include 'components/footer.php'; ?>

<!-- Enhanced Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
    // Initialize AOS with custom settings
    AOS.init({
        duration: 800,
        once: true,
        offset: 100
    });

    // Navbar scroll effect
    window.addEventListener('scroll', function() {
        if (window.scrollY > 50) {
            document.querySelector('.navbar').classList.add('scrolled');
        } else {
            document.querySelector('.navbar').classList.remove('scrolled');
        }
    });
</script>
</body>
</html>
