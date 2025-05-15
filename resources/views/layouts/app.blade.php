<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Солнышко - Магазин детской одежды</title>
    <!-- Prevent flash of wrong theme -->
    <script>
        // Apply theme immediately before page rendering
        const savedTheme = localStorage.getItem('theme');
        if (savedTheme === 'dark') {
            document.documentElement.setAttribute('data-theme', 'dark');
        }
    </script>
    <link rel="icon" href="{{ asset('img/logo/favicon.svg') }}" type="image/svg+xml">
    <link rel="alternate icon" href="{{ asset('img/logo/favicon.png') }}" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Comfortaa:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        :root {
            /* Light Theme Variables */
            --primary-color: #ff9f43;
            --secondary-color: #54a0ff;
            --accent-color: #ff6b6b;
            --light-color: #f8f9fa;
            --dark-color: #343a40;
            --soft-bg: #f7f9fc;
            --text-color: #333;
            --card-bg: white;
            --navbar-bg: white;
            --body-bg: #f7f9fc;
            --footer-bg: #2d3436;
            --footer-text: white;
            --border-color: #eee;
            --dropdown-bg: white;
            --dropdown-text: #555;
            --input-bg: white;
            --input-text: #333;
            --input-border: #ddd;
            --promo-bg: #fcf8f2;
        }
        
        /* Dark Theme Variables */
        [data-theme="dark"] {
            --primary-color: #ff9f43;
            --secondary-color: #54a0ff;
            --accent-color: #ff6b6b;
            --light-color: #2c3e50;
            --dark-color: #f8f9fa;
            --soft-bg: #222831;
            --text-color: #f0f0f0;
            --card-bg: #2d3436;
            --navbar-bg: #1a1d21;
            --body-bg: #222831;
            --footer-bg: #1a1d21;
            --footer-text: #f0f0f0;
            --border-color: #444;
            --dropdown-bg: #2d3436;
            --dropdown-text: #f0f0f0;
            --input-bg: #2c3e50;
            --input-text: #f0f0f0;
            --input-border: #444;
            --promo-bg: #2c3e50;
        }
        
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: var(--body-bg);
            color: var(--text-color);
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        
        /* Theme Toggle Button */
        #theme-toggle {
            background: transparent;
            border: none;
            color: var(--text-color);
            font-size: 1.2rem;
            cursor: pointer;
            padding: 8px;
            transition: all 0.3s ease;
            border-radius: 50%;
        }
        
        #theme-toggle:hover {
            background-color: rgba(0, 0, 0, 0.1);
        }
        
        /* Navbar Styling */
        .navbar {
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
            padding: 12px 0;
            transition: all 0.3s ease;
            background-color: var(--navbar-bg);
        }
        
        .navbar-brand {
            display: flex;
            align-items: center;
        }
        
        .brand-text {
            font-family: 'Comfortaa', cursive;
            font-weight: 700;
            font-size: 24px;
            color: var(--primary-color);
            margin-left: 5px;
        }
        
        .main-menu .nav-item {
            margin: 0 5px;
            position: relative;
        }
        
        .main-menu .nav-link {
            font-weight: 500;
            color: var(--text-color);
            padding: 8px 16px;
            position: relative;
            transition: all 0.3s ease;
        }
        
        .main-menu .nav-link:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 2px;
            background-color: var(--primary-color);
            transition: width 0.3s ease;
        }
        
        .main-menu .nav-link:hover {
            color: var(--primary-color);
        }
        
        .main-menu .nav-link:hover:after {
            width: 80%;
        }
        
        /* Mega Dropdown */
        .mega-dropdown {
            position: static !important;
        }
        
        .mega-dropdown-menu {
            width: 100%;
            padding: 20px 0;
            border: none;
            border-radius: 0;
            margin-top: 0;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            background-color: var(--dropdown-bg);
        }
        
        .dropdown-header {
            font-weight: 600;
            color: var(--primary-color);
            padding: 0.5rem 1.5rem;
            margin-bottom: 10px;
        }
        
        .dropdown-item {
            color: var(--dropdown-text);
            padding: 8px 1.5rem;
            font-size: 0.9rem;
            transition: all 0.2s ease;
        }
        
        .dropdown-item:hover {
            color: var(--primary-color);
            background-color: rgba(255, 159, 67, 0.05);
            transform: translateX(5px);
        }
        
        .menu-featured {
            position: relative;
            overflow: hidden;
            border-radius: 10px;
            height: 200px;
        }
        
        .menu-featured img {
            height: 100%;
            width: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        
        .menu-featured:hover img {
            transform: scale(1.1);
        }
        
        .menu-featured-content {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 15px;
            background: linear-gradient(to top, rgba(0,0,0,0.7), rgba(0,0,0,0));
            color: white;
        }
        
        /* Search Box */
        .search-box {
            margin-right: 15px;
        }
        
        .search-form {
            width: 250px;
        }
        
        .search-input {
            border-radius: 30px 0 0 30px;
            border: 1px solid var(--input-border);
            background-color: var(--input-bg);
            color: var(--input-text);
            transition: all 0.3s ease;
        }
        
        .search-input:focus {
            box-shadow: none;
            border-color: var(--primary-color);
        }
        
        .btn-search {
            border-radius: 0 30px 30px 0;
            background-color: var(--primary-color);
            color: white;
            border: 1px solid var(--primary-color);
        }
        
        .btn-search:hover {
            background-color: #e88f35;
            color: white;
        }
        
        /* Cart Icon */
        .cart-icon .nav-link {
            font-size: 1.2rem;
            position: relative;
            padding: 8px 15px;
        }
        
        .badge-cart {
            position: absolute;
            top: 0;
            right: 5px;
            background-color: var(--accent-color);
            font-size: 0.6rem;
            padding: 0.25rem 0.4rem;
        }
        
        /* User dropdown */
        .user-dropdown {
            min-width: 220px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            border: none;
            padding: 10px 0;
        }
        
        .user-dropdown .dropdown-item {
            padding: 10px 20px;
        }
        
        /* Header Promo */
        .header-promo {
            background-color: var(--promo-bg);
            font-size: 0.9rem;
            font-weight: 500;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
            margin-bottom: 20px;
            color: var(--text-color);
        }
        
        .promo-item {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .promo-icon {
            color: var(--primary-color);
            margin-right: 10px;
        }
        
        /* Card and Product Styling */
        .category-card {
            background: var(--card-bg);
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 100%;
        }
        
        .category-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }
        
        .category-img {
            height: 220px;
            overflow: hidden;
        }
        
        .category-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        
        .category-card:hover .category-img img {
            transform: scale(1.1);
        }
        
        .category-title {
            padding: 15px;
            text-align: center;
            font-weight: 600;
            color: var(--text-color);
            font-size: 18px;
        }
        
        /* Banner/Carousel */
        .carousel-item {
            height: 450px;
        }
        
        .carousel-item img {
            object-fit: cover;
            height: 100%;
            width: 100%;
        }
        
        .carousel-caption {
            background: linear-gradient(to top, rgba(0,0,0,0.7), rgba(0,0,0,0));
            border-radius: 10px;
            padding: 30px;
            bottom: 0;
            left: 0;
            right: 0;
            text-align: left;
        }
        
        .carousel-caption h2 {
            font-weight: 700;
            margin-bottom: 10px;
        }
        
        /* Banner */
        .banner {
            background-color: var(--primary-color);
            padding: 2rem 0;
            margin: 2rem 0;
            color: white;
            border-radius: 10px;
        }
        
        /* Products */
        .product-card {
            background: var(--card-bg);
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            margin-bottom: 20px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 100%;
        }
        
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }
        
        .product-img {
            height: 250px;
            overflow: hidden;
            position: relative;
        }
        
        .product-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        
        .product-card:hover .product-img img {
            transform: scale(1.1);
        }
        
        .product-info {
            padding: 15px;
        }
        
        .product-title {
            font-weight: 600;
            font-size: 1rem;
            margin-bottom: 10px;
            height: 40px;
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            color: var(--text-color);
        }
        
        .product-price {
            font-weight: 700;
            color: var(--accent-color);
            font-size: 1.1rem;
        }
        
        /* Product Badge */
        .product-badge {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: var(--primary-color);
            color: white;
            font-size: 0.8rem;
            font-weight: 600;
            padding: 5px 10px;
            border-radius: 30px;
            z-index: 1;
        }
        
        /* Sale Badge / Discount Badge */
        .sale-badge {
            position: absolute;
            top: 10px;
            right: 10px;
            background: linear-gradient(135deg, #ff416c, #ff4b2b);
            color: white;
            font-size: 0.9rem;
            font-weight: 700;
            padding: 8px 12px;
            border-radius: 50px;
            box-shadow: 0 3px 8px rgba(255, 75, 43, 0.5);
            z-index: 10;
            transform: rotate(5deg);
            animation: pulse 1.5s infinite;
        }
        
        /* New Badge */
        .new-badge {
            position: absolute;
            top: 10px;
            left: 10px;
            background: linear-gradient(135deg, #43cea2, #185a9d);
            color: white;
            font-size: 0.9rem;
            font-weight: 700;
            padding: 8px 15px;
            border-radius: 50px;
            box-shadow: 0 3px 8px rgba(67, 206, 162, 0.5);
            z-index: 10;
            transform: rotate(-5deg);
            animation: float 3s ease-in-out infinite;
        }
        
        @keyframes float {
            0% {
                transform: rotate(-5deg) translateY(0px);
            }
            50% {
                transform: rotate(-5deg) translateY(-5px);
            }
            100% {
                transform: rotate(-5deg) translateY(0px);
            }
        }
        
        @keyframes pulse {
            0% {
                transform: rotate(5deg) scale(1);
            }
            50% {
                transform: rotate(5deg) scale(1.1);
            }
            100% {
                transform: rotate(5deg) scale(1);
            }
        }
        
        .old-price {
            text-decoration: line-through;
            color: var(--dropdown-text);
            font-size: 0.9rem;
            display: inline-block;
            margin-right: 8px;
        }
        
        .new-price, .discount-price {
            color: #ff416c;
            font-weight: 700;
            font-size: 1.1rem;
        }
        
        /* Special Offer Alert */
        .special-offer {
            background-color: rgba(255, 159, 67, 0.1);
            border-color: var(--primary-color);
            color: #333;
            border-radius: 10px;
        }
        
        /* Season Cards */
        .season-card {
            position: relative;
            border-radius: 10px;
            overflow: hidden;
            height: 300px;
        }
        
        .season-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        
        .season-card:hover img {
            transform: scale(1.1);
        }
        
        .season-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 20px;
            background: linear-gradient(to top, rgba(0,0,0,0.8), rgba(0,0,0,0));
            color: white;
        }
        
        .season-content h3 {
            font-weight: 700;
            margin-bottom: 10px;
        }
        
        /* Testimonial Cards */
        .testimonial-card {
            height: 100%;
            transition: transform 0.3s ease;
        }
        
        .testimonial-card:hover {
            transform: translateY(-5px);
        }
        
        .testimonial-rating i {
            margin-right: 3px;
        }
        
        /* Blog Cards */
        .blog-card {
            height: 100%;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            overflow: hidden;
        }
        
        .blog-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }
        
        .blog-card img {
            height: 200px;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        
        .blog-card:hover img {
            transform: scale(1.1);
        }
        
        /* Partners Slider */
        .partners-slider {
            padding: 20px 0;
        }
        
        .partners-slider img {
            max-height: 60px;
            opacity: 0.7;
            transition: opacity 0.3s ease;
            filter: grayscale(100%);
        }
        
        .partners-slider img:hover {
            opacity: 1;
            filter: grayscale(0%);
        }
        
        /* Buttons */
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            border-radius: 4px;
            padding: 8px 20px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            background-color: #e88f35;
            border-color: #e88f35;
            transform: translateY(-2px);
        }
        
        .btn-outline-primary {
            color: var(--primary-color);
            border-color: var(--primary-color);
            border-radius: 4px;
            padding: 8px 20px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .btn-outline-primary:hover {
            background-color: var(--primary-color);
            color: white;
            transform: translateY(-2px);
        }
        
        .btn-sm {
            padding: 5px 15px;
            font-size: 0.85rem;
        }
        
        /* Features section */
        .feature-icon {
            height: 70px;
            width: 70px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: rgba(255, 159, 67, 0.1);
            border-radius: 50%;
            transition: all 0.3s ease;
        }
        
        .feature-icon i {
            color: var(--primary-color);
            font-size: 2rem;
        }
        
        /* Footer */
        .footer {
            background-color: var(--footer-bg);
            color: var(--footer-text);
            padding: 4rem 0 1rem;
            margin-top: 4rem;
        }
        
        .footer h5 {
            font-weight: 600;
            margin-bottom: 20px;
            color: var(--primary-color);
        }
        
        .footer-links {
            list-style: none;
            padding: 0;
        }
        
        .footer-links li {
            margin-bottom: 12px;
        }
        
        .footer-links a {
            color: #ddd;
            text-decoration: none;
            transition: color 0.3s ease, transform 0.3s ease;
            display: inline-block;
        }
        
        .footer-links a:hover {
            color: var(--primary-color);
            transform: translateX(5px);
        }
        
        .social-icons a {
            color: white;
            font-size: 1.5rem;
            margin-right: 15px;
            transition: all 0.3s ease;
            display: inline-block;
        }
        
        .social-icons a:hover {
            color: var(--primary-color);
            transform: translateY(-3px);
        }
        
        /* Section Title */
        .section-title {
            position: relative;
            text-align: center;
            margin-bottom: 30px;
            font-weight: 600;
            color: #333;
            padding-bottom: 15px;
        }
        
        .section-title:after {
            content: '';
            position: absolute;
            width: 60px;
            height: 3px;
            background-color: var(--primary-color);
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
        }
        
        /* Main Categories */
        .main-category-card {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            margin-bottom: 20px;
            height: 100%;
        }
        
        .main-category-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }
        
        .main-category-card .category-image {
            height: 280px;
            overflow: hidden;
        }
        
        .main-category-card .category-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        
        .main-category-card:hover .category-image img {
            transform: scale(1.08);
        }
        
        .main-category-card .category-title {
            background: var(--card-bg);
            padding: 15px 20px;
            text-align: center;
        }
        
        .main-category-card .category-title h3 {
            margin: 0;
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--text-color);
        }
        
        /* Popular Categories */
        .popular-categories .category-image {
            width: 140px;
            height: 140px;
            overflow: hidden;
            margin: 0 auto;
            border: 3px solid var(--card-bg);
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }
        
        .popular-categories .category-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .pop-category-card:hover .category-image {
            transform: scale(1.05);
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        }
        
        /* Product Cards */
        .product-article {
            font-size: 0.8rem;
            margin-bottom: 5px;
        }
        
        /* Collections */
        .collection-card {
            position: relative;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            margin-bottom: 20px;
            height: 250px;
        }
        
        .collection-img {
            height: 100%;
            width: 100%;
        }
        
        .collection-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        
        .collection-card:hover .collection-img img {
            transform: scale(1.1);
        }
        
        .collection-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
            padding: 20px;
            color: white;
        }
        
        .collection-name {
            font-size: 1.2rem;
            font-weight: 600;
        }
        
        /* Brand Features */
        .brand-features {
            background-color: var(--soft-bg);
            border-radius: 15px;
            padding: 25px;
            height: 100%;
        }
        
        .feature-item {
            transition: transform 0.3s ease;
        }
        
        .feature-item:hover {
            transform: translateX(5px);
        }
        
        /* Subscription Box */
        .subscription-box {
            border: 2px solid var(--primary-color);
            background-color: var(--promo-bg);
            border-radius: 15px;
        }
        
        .subscription-form .form-control {
            border-radius: 30px 0 0 30px;
            border: 1px solid var(--input-border);
        }
        
        .subscription-form .btn {
            border-radius: 0 30px 30px 0;
        }
        
        /* Responsive adjustments */
        @media (max-width: 991px) {
            .mega-dropdown-menu {
                width: auto;
                margin-top: 0;
            }
            
            .menu-featured {
                display: none;
            }
            
            .search-form {
                width: 100%;
                margin-bottom: 10px;
            }
            
            .carousel-item {
                height: 350px;
            }
        }
        
        @media (max-width: 767px) {
            .carousel-item {
                height: 280px;
            }
            
            .carousel-caption {
                padding: 15px;
            }
            
            .carousel-caption h2 {
                font-size: 1.5rem;
            }
            
            .promo-item {
                margin-bottom: 10px;
            }
        }
        
        /* Featured Products Carousel */
        .featured-card {
            margin: 10px;
            border: none;
            transition: all 0.3s ease;
        }
        
        .featured-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }
        
        .product-buttons {
            display: flex;
            justify-content: space-between;
        }
        
        .new-price {
            color: #ff416c;
            font-weight: 700;
            font-size: 1.1rem;
        }
        
        /* Enhanced Category Cards */
        .category-card.enhanced {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            transition: all 0.4s ease;
            height: 100%;
        }
        
        .category-card.enhanced:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }
        
        .category-info {
            padding: 20px;
            background: var(--card-bg);
        }
        
        .category-description {
            font-size: 0.9rem;
            color: var(--text-color);
            margin-top: 8px;
        }
        
        .category-count {
            color: var(--primary-color);
            font-size: 0.85rem;
            font-weight: 600;
            margin-top: 8px;
        }
        
        .category-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.4);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .category-card:hover .category-overlay {
            opacity: 1;
        }
        
        .category-btn {
            background: var(--primary-color);
            color: white;
            padding: 10px 20px;
            border-radius: 30px;
            font-weight: 600;
            transform: translateY(20px);
            transition: transform 0.3s ease;
        }
        
        .category-card:hover .category-btn {
            transform: translateY(0);
        }
        
        /* Countdown Timer */
        .sale-countdown {
            background: rgba(255, 255, 255, 0.2);
            padding: 10px;
            border-radius: 10px;
            display: inline-flex;
            margin-top: 10px;
        }
        
        .countdown-timer {
            display: flex;
        }
        
        .countdown-item {
            background: var(--card-bg);
            border-radius: 8px;
            padding: 8px 12px;
            margin: 0 5px;
            text-align: center;
            min-width: 60px;
        }
        
        .countdown-value {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary-color);
            line-height: 1;
        }
        
        .countdown-label {
            font-size: 0.7rem;
            color: var(--text-color);
            text-transform: uppercase;
        }
        
        /* Feature Boxes */
        .features-banner {
            background-color: var(--soft-bg);
            border-top: 1px solid var(--border-color);
            border-bottom: 1px solid var(--border-color);
        }
        
        .feature-box {
            padding: 30px 20px;
            background: var(--card-bg);
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            height: 100%;
        }
        
        .feature-box:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }
        
        .feature-icon-large {
            width: 80px;
            height: 80px;
            background: rgba(255, 159, 67, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 2.5rem;
            color: var(--primary-color);
            transition: all 0.3s ease;
        }
        
        .feature-box:hover .feature-icon-large {
            background: var(--primary-color);
            color: white;
            transform: rotateY(180deg);
        }
        
        .feature-box h4 {
            margin-bottom: 15px;
            font-weight: 600;
            color: var(--text-color);
        }
        
        .feature-box p {
            color: var(--text-color);
            font-size: 0.9rem;
        }
        
        /* Modal styling for dark theme */
        .modal-content {
            background-color: var(--card-bg);
            color: var(--text-color);
        }
        
        .modal-header {
            border-bottom: 1px solid var(--border-color);
        }
        
        .modal-footer {
            border-top: 1px solid var(--border-color);
        }
        
        .close {
            color: var(--text-color);
        }
        
        .form-control {
            background-color: var(--input-bg);
            border-color: var(--input-border);
            color: var(--input-text);
        }
        
        .form-control:focus {
            background-color: var(--input-bg);
            color: var(--input-text);
        }
        
        /* Фиксированные стили для всех бейджей и особенно для темного режима */
        .badge {
            display: inline-block !important;
            padding: 0.4em 0.65em !important;
            font-size: 85% !important;
            font-weight: 700 !important;
            line-height: 1 !important;
            text-align: center !important;
            white-space: nowrap !important;
            vertical-align: baseline !important;
            border-radius: 0.25rem !important;
            text-shadow: 0 1px 1px rgba(0,0,0,0.3) !important;
            pointer-events: none !important;
            position: relative !important;
            z-index: 10 !important;
        }
        
        /* Конкретные цвета для каждого типа бейджа */
        .badge-primary {
            background-color: #007bff !important;
            color: #ffffff !important;
            border: 1px solid #0069d9 !important;
        }
        
        .badge-danger {
            background-color: #dc3545 !important;
            color: #ffffff !important;
            border: 1px solid #c82333 !important;
        }
        
        .badge-success {
            background-color: #28a745 !important;
            color: #ffffff !important;
            border: 1px solid #218838 !important;
        }
        
        .badge-info {
            background-color: #17a2b8 !important;
            color: #ffffff !important;
            border: 1px solid #138496 !important;
        }
        
        .badge-warning {
            background-color: #ffc107 !important;
            color: #212529 !important;
            border: 1px solid #e0a800 !important;
        }
        
        .badge-secondary {
            background-color: #6c757d !important;
            color: #ffffff !important;
            border: 1px solid #5a6268 !important;
        }
        
        /* Защита для темного режима */
        [data-theme="dark"] .badge-primary {
            background-color: #007bff !important;
            color: #ffffff !important;
        }
        
        [data-theme="dark"] .badge-danger {
            background-color: #dc3545 !important;
            color: #ffffff !important;
        }
        
        [data-theme="dark"] .badge-success {
            background-color: #28a745 !important;
            color: #ffffff !important;
        }
        
        [data-theme="dark"] .badge-info {
            background-color: #17a2b8 !important;
            color: #ffffff !important;
        }
        
        [data-theme="dark"] .badge-warning {
            background-color: #ffc107 !important;
            color: #212529 !important;
        }
        
        [data-theme="dark"] .badge-secondary {
            background-color: #6c757d !important;
            color: #ffffff !important;
        }
        
        /* Особая защита от наследования при наведении */
        tr:hover .badge-primary,
        table tr:hover .badge-primary,
        [data-theme="dark"] tr:hover .badge-primary,
        [data-theme="dark"] table tr:hover .badge-primary {
            background-color: #007bff !important;
            color: #ffffff !important;
        }
        
        tr:hover .badge-danger,
        table tr:hover .badge-danger,
        [data-theme="dark"] tr:hover .badge-danger,
        [data-theme="dark"] table tr:hover .badge-danger {
            background-color: #dc3545 !important;
            color: #ffffff !important;
        }
        
        tr:hover .badge-success,
        table tr:hover .badge-success,
        [data-theme="dark"] tr:hover .badge-success,
        [data-theme="dark"] table tr:hover .badge-success {
            background-color: #28a745 !important;
            color: #ffffff !important;
        }
        
        tr:hover .badge-info,
        table tr:hover .badge-info,
        [data-theme="dark"] tr:hover .badge-info,
        [data-theme="dark"] table tr:hover .badge-info {
            background-color: #17a2b8 !important;
            color: #ffffff !important;
        }
        
        tr:hover .badge-warning,
        table tr:hover .badge-warning,
        [data-theme="dark"] tr:hover .badge-warning,
        [data-theme="dark"] table tr:hover .badge-warning {
            background-color: #ffc107 !important;
            color: #212529 !important;
        }
        
        tr:hover .badge-secondary,
        table tr:hover .badge-secondary,
        [data-theme="dark"] tr:hover .badge-secondary,
        [data-theme="dark"] table tr:hover .badge-secondary {
            background-color: #6c757d !important;
            color: #ffffff !important;
        }
    </style>
</head>
<body>
    @include('layouts.navbar')

    <main>
        @if(Route::has('login') && !Auth::check())
            <!-- Модальное окно для входа -->
            <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="loginModalLabel">Вход в систему</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('login') }}" id="loginForm">
                                @csrf
                                <div class="form-group">
                                    <label for="login-email">Email</label>
                                    <input id="login-email" type="email" class="form-control" name="email" required autocomplete="email" autofocus>
                                    <div class="invalid-feedback" id="login-email-error"></div>
                                </div>

                                <div class="form-group">
                                    <label for="login-password">Пароль</label>
                                    <input id="login-password" type="password" class="form-control" name="password" required autocomplete="current-password">
                                    <div class="invalid-feedback" id="login-password-error"></div>
                                </div>

                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" name="remember" id="login-remember">
                                        <label class="custom-control-label" for="login-remember">
                                            Запомнить меня
                                        </label>
                                    </div>
                                </div>

                                <div class="alert alert-danger" style="display: none;" id="login-error"></div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                            <button type="button" class="btn btn-primary" id="loginButton">Войти</button>
                            <button type="button" class="btn btn-link" id="showRegisterModal">Нет аккаунта? Зарегистрироваться</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Модальное окно для регистрации -->
            <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="registerModalLabel">Регистрация</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('register') }}" id="registerForm">
                                @csrf
                                <div class="form-group">
                                    <label for="register-name">Имя</label>
                                    <input id="register-name" type="text" class="form-control" name="name" required autocomplete="name" autofocus>
                                    <div class="invalid-feedback" id="register-name-error"></div>
                                </div>

                                <div class="form-group">
                                    <label for="register-email">Email</label>
                                    <input id="register-email" type="email" class="form-control" name="email" required autocomplete="email">
                                    <div class="invalid-feedback" id="register-email-error"></div>
                                </div>

                                <div class="form-group">
                                    <label for="register-password">Пароль</label>
                                    <input id="register-password" type="password" class="form-control" name="password" required autocomplete="new-password">
                                    <div class="invalid-feedback" id="register-password-error"></div>
                                </div>

                                <div class="form-group">
                                    <label for="register-password-confirm">Подтверждение пароля</label>
                                    <input id="register-password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>

                                <div class="alert alert-danger" style="display: none;" id="register-error"></div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                            <button type="button" class="btn btn-primary" id="registerButton">Зарегистрироваться</button>
                            <button type="button" class="btn btn-link" id="showLoginModal">Уже есть аккаунт? Войти</button>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-3 mb-4">
                    <h5>О нас</h5>
                    <p>Детский магазин "Солнышко" - лучшие товары для ваших детей по доступным ценам.</p>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-vk"></i></a>
                        <a href="#"><i class="fab fa-telegram"></i></a>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <h5>Каталог</h5>
                    <ul class="footer-links">
                        <li><a href="{{ route('boys') }}">Для мальчиков</a></li>
                        <li><a href="{{ route('girls') }}">Для девочек</a></li>
                        <li><a href="{{ route('newborns') }}">Для новорожденных</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-4">
                    <h5>Информация</h5>
                    <ul class="footer-links">
                        <li><a href="{{ route('about') }}">О компании</a></li>
                        <li><a href="{{ route('contact') }}">Контакты</a></li>
                        <li><a href="#">Доставка и оплата</a></li>
                        <li><a href="#">Политика конфиденциальности</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-4">
                    <h5>Контакты</h5>
                    <ul class="footer-links">
                        <li><i class="fas fa-map-marker-alt mr-2"></i> г. Москва, ул. Примерная, 123</li>
                        <li><i class="fas fa-phone mr-2"></i> 8-800-555-35-35</li>
                        <li><i class="fas fa-envelope mr-2"></i> info@solnyshko.ru</li>
                    </ul>
                </div>
            </div>
            <hr class="bg-light">
            <div class="text-center py-3">
                <p class="mb-0">&copy; 2025 Солнышко - Магазин детской одежды. Все права защищены.</p>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    
    <script>
        $(document).ready(function(){
            // Check for saved theme preference or use default
            const currentTheme = localStorage.getItem('theme') || 'light';
            
            // Apply the saved theme on page load
            if (currentTheme === 'dark') {
                $('.dark-icon').hide();
                $('.light-icon').show();
            } else {
                $('.dark-icon').show();
                $('.light-icon').hide();
            }
            
            // Theme toggle handler
            $('#theme-toggle').click(function() {
                let theme = 'light';
                
                // If document currently has dark theme attribute
                if (document.documentElement.getAttribute('data-theme') === 'dark') {
                    document.documentElement.removeAttribute('data-theme');
                    $('.dark-icon').show();
                    $('.light-icon').hide();
                } else {
                    document.documentElement.setAttribute('data-theme', 'dark');
                    theme = 'dark';
                    $('.dark-icon').hide();
                    $('.light-icon').show();
                }
                
                // Save preference to localStorage
                localStorage.setItem('theme', theme);
            });
            
            // Инициализация карусели Slick
            $('.carousel').slick({
                autoplay: true,
                autoplaySpeed: 3000,
                dots: true,
                arrows: false
            });
            
            // Фиксированное меню при прокрутке
            $(window).scroll(function() {
                if ($(this).scrollTop() > 100) {
                    $('.navbar').addClass('navbar-shrink');
                } else {
                    $('.navbar').removeClass('navbar-shrink');
                }
            });
            
            // Мега-меню на ховер
            $('.mega-dropdown').hover(
                function() {
                    $(this).find('.dropdown-menu').stop(true, true).delay(100).fadeIn(300);
                },
                function() {
                    $(this).find('.dropdown-menu').stop(true, true).delay(100).fadeOut(300);
                }
            );
            
            // Показать уведомления об успехе
            $('.toast').toast('show');
            
            // Переключение между модальными окнами
            $('#showRegisterModal').click(function() {
                $('#loginModal').modal('hide');
                $('#registerModal').modal('show');
            });
            
            $('#showLoginModal').click(function() {
                $('#registerModal').modal('hide');
                $('#loginModal').modal('show');
            });
            
            // Обработка формы входа
            $('#loginButton').click(function() {
                const form = $('#loginForm');
                const loginError = $('#login-error');
                
                // Сброс предыдущих ошибок
                loginError.hide();
                form.find('.is-invalid').removeClass('is-invalid');
                
                $.ajax({
                    url: form.attr('action'),
                    type: 'POST',
                    data: form.serialize(),
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        // Перезагрузка страницы при успешном входе
                        window.location.reload();
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            const errors = xhr.responseJSON.errors;
                            
                            // Отображение ошибок валидации
                            $.each(errors, function(field, messages) {
                                const input = $('#login-' + field);
                                const feedback = $('#login-' + field + '-error');
                                
                                input.addClass('is-invalid');
                                feedback.text(messages[0]);
                            });
                        } else {
                            // Общая ошибка аутентификации
                            loginError.text('Неверный email или пароль.').show();
                        }
                    }
                });
            });
            
            // Обработка формы регистрации
            $('#registerButton').click(function() {
                const form = $('#registerForm');
                const registerError = $('#register-error');
                
                // Сброс предыдущих ошибок
                registerError.hide();
                form.find('.is-invalid').removeClass('is-invalid');
                
                $.ajax({
                    url: form.attr('action'),
                    type: 'POST',
                    data: form.serialize(),
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        // Перезагрузка страницы при успешной регистрации
                        window.location.reload();
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            const errors = xhr.responseJSON.errors;
                            
                            // Отображение ошибок валидации
                            $.each(errors, function(field, messages) {
                                const input = $('#register-' + field);
                                const feedback = $('#register-' + field + '-error');
                                
                                input.addClass('is-invalid');
                                feedback.text(messages[0]);
                            });
                        } else {
                            // Общая ошибка
                            registerError.text('Произошла ошибка при регистрации. Пожалуйста, попробуйте позже.').show();
                        }
                    }
                });
            });
        });
    </script>
    
    @if(session('success'))
    <div class="toast-container position-fixed bottom-0 right-0 p-3">
        <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true" data-delay="5000">
            <div class="toast-header bg-success text-white">
                <strong class="mr-auto">Успешно</strong>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
                {{ session('success') }}
            </div>
        </div>
    </div>
    @endif

    @if(session('error'))
    <div class="toast-container position-fixed bottom-0 right-0 p-3">
        <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true" data-delay="5000">
            <div class="toast-header bg-danger text-white">
                <strong class="mr-auto">Ошибка</strong>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
                {{ session('error') }}
            </div>
        </div>
    </div>
    @endif

    <!-- Toast для динамических сообщений -->
    <div class="toast-container position-fixed bottom-0 right-0 p-3" id="toastContainer" style="z-index: 1050;">
    </div>

    <script>
        // Функция для отображения динамических сообщений
        function showToast(message, type = 'success') {
            const toastContainer = document.getElementById('toastContainer');
            const toastId = 'toast-' + Date.now();
            
            const bgClass = type === 'success' ? 'bg-success' : 'bg-danger';
            const title = type === 'success' ? 'Успешно' : 'Ошибка';
            
            const toastHtml = `
                <div class="toast show" id="${toastId}" role="alert" aria-live="assertive" aria-atomic="true" data-delay="5000">
                    <div class="toast-header ${bgClass} text-white">
                        <strong class="mr-auto">${title}</strong>
                        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="toast-body">
                        ${message}
                    </div>
                </div>
            `;
            
            toastContainer.insertAdjacentHTML('beforeend', toastHtml);
            
            // Автоматическое скрытие через 5 секунд
            setTimeout(() => {
                const toast = document.getElementById(toastId);
                if (toast) {
                    $(toast).toast('hide');
                    // Удаление элемента после скрытия
                    $(toast).on('hidden.bs.toast', function () {
                        toast.remove();
                    });
                }
            }, 5000);
        }
    </script>

    <!-- Дополнительный скрипт для гарантированного исправления бейджей в админке -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Функция для принудительного форматирования бейджей
        function fixAllBadges() {
            // Стили по умолчанию для разных типов бейджей
            const badgeStyles = {
                'badge-primary': { bg: '#007bff', color: '#ffffff' },
                'badge-danger': { bg: '#dc3545', color: '#ffffff' },
                'badge-success': { bg: '#28a745', color: '#ffffff' },
                'badge-info': { bg: '#17a2b8', color: '#ffffff' },
                'badge-warning': { bg: '#ffc107', color: '#212529' },
                'badge-secondary': { bg: '#6c757d', color: '#ffffff' }
            };
            
            // Применение форматирования ко всем бейджам
            document.querySelectorAll('.badge').forEach(badge => {
                let badgeType = '';
                
                // Определение типа бейджа по классу
                for (const cls of badge.classList) {
                    if (badgeStyles[cls]) {
                        badgeType = cls;
                        break;
                    }
                }
                
                if (badgeType) {
                    // Применяем жестко заданные стили
                    badge.style.setProperty('background-color', badgeStyles[badgeType].bg, 'important');
                    badge.style.setProperty('color', badgeStyles[badgeType].color, 'important');
                    badge.style.setProperty('pointer-events', 'none', 'important');
                    badge.style.setProperty('text-shadow', '0 1px 1px rgba(0,0,0,0.3)', 'important');
                }
            });
            
            // Особая обработка для таблиц
            document.querySelectorAll('table').forEach(table => {
                table.addEventListener('mouseover', function(e) {
                    if (e.target.tagName === 'TD' || e.target.tagName === 'TR') {
                        // Находим ближайшую строку таблицы
                        const row = e.target.closest('tr');
                        if (row) {
                            // Обрабатываем все бейджи в этой строке
                            row.querySelectorAll('.badge').forEach(badge => {
                                let badgeType = '';
                                for (const cls of badge.classList) {
                                    if (badgeStyles[cls]) {
                                        badgeType = cls;
                                        break;
                                    }
                                }
                                
                                if (badgeType) {
                                    // Принудительно устанавливаем правильные цвета
                                    badge.style.setProperty('background-color', badgeStyles[badgeType].bg, 'important');
                                    badge.style.setProperty('color', badgeStyles[badgeType].color, 'important');
                                }
                            });
                        }
                    }
                }, true);
            });
        }
        
        // Запускаем функцию сразу после загрузки страницы
        fixAllBadges();
        
        // И также периодически каждые 500мс для гарантии
        setInterval(fixAllBadges, 500);
        
        // Запускаем функцию при переключении темы
        document.getElementById('theme-toggle')?.addEventListener('click', function() {
            setTimeout(fixAllBadges, 100);
        });
    });
    </script>

    <!-- ДОПОЛНИТЕЛЬНЫЙ СКРИПТ ДЛЯ ИСПРАВЛЕНИЯ БЕЙДЖЕЙ В АДМИНКЕ - ЭКСТРЕМАЛЬНЫЙ ВАРИАНТ -->
    <script>
    // Этот код внедряет прямой обработчик MutationObserver для непрерывного отслеживания
    // и принудительного стилизования всех бейджей, независимо от их состояния и контекста
    document.addEventListener('DOMContentLoaded', function() {
        // Немедленно исправляем стили всех существующих бейджей
        function forceFixBadge(badge) {
            // Определяем тип бейджа и применяем соответствующие стили
            if (badge.classList.contains('badge-primary')) {
                Object.assign(badge.style, {
                    backgroundColor: '#007bff !important',
                    color: '#ffffff !important',
                    border: '1px solid #0069d9 !important',
                    display: 'inline-block !important',
                    padding: '0.4em 0.65em !important',
                    fontSize: '85% !important',
                    fontWeight: '700 !important',
                    textAlign: 'center !important',
                    whiteSpace: 'nowrap !important',
                    verticalAlign: 'baseline !important',
                    borderRadius: '0.25rem !important',
                    position: 'relative !important',
                    zIndex: '100 !important'
                });
            } else if (badge.classList.contains('badge-danger')) {
                Object.assign(badge.style, {
                    backgroundColor: '#dc3545 !important',
                    color: '#ffffff !important',
                    border: '1px solid #c82333 !important',
                    display: 'inline-block !important',
                    padding: '0.4em 0.65em !important',
                    fontSize: '85% !important',
                    fontWeight: '700 !important',
                    textAlign: 'center !important',
                    whiteSpace: 'nowrap !important',
                    verticalAlign: 'baseline !important',
                    borderRadius: '0.25rem !important',
                    position: 'relative !important',
                    zIndex: '100 !important'
                });
            } else if (badge.classList.contains('badge-success')) {
                Object.assign(badge.style, {
                    backgroundColor: '#28a745 !important',
                    color: '#ffffff !important',
                    border: '1px solid #218838 !important',
                    display: 'inline-block !important',
                    padding: '0.4em 0.65em !important',
                    fontSize: '85% !important',
                    fontWeight: '700 !important',
                    textAlign: 'center !important',
                    whiteSpace: 'nowrap !important',
                    verticalAlign: 'baseline !important',
                    borderRadius: '0.25rem !important',
                    position: 'relative !important',
                    zIndex: '100 !important'
                });
            } else if (badge.classList.contains('badge-info')) {
                Object.assign(badge.style, {
                    backgroundColor: '#17a2b8 !important',
                    color: '#ffffff !important',
                    border: '1px solid #138496 !important',
                    display: 'inline-block !important',
                    padding: '0.4em 0.65em !important',
                    fontSize: '85% !important',
                    fontWeight: '700 !important',
                    textAlign: 'center !important',
                    whiteSpace: 'nowrap !important',
                    verticalAlign: 'baseline !important',
                    borderRadius: '0.25rem !important',
                    position: 'relative !important',
                    zIndex: '100 !important'
                });
            } else if (badge.classList.contains('badge-warning')) {
                Object.assign(badge.style, {
                    backgroundColor: '#ffc107 !important',
                    color: '#212529 !important',
                    border: '1px solid #e0a800 !important',
                    display: 'inline-block !important',
                    padding: '0.4em 0.65em !important',
                    fontSize: '85% !important',
                    fontWeight: '700 !important',
                    textAlign: 'center !important',
                    whiteSpace: 'nowrap !important',
                    verticalAlign: 'baseline !important',
                    borderRadius: '0.25rem !important',
                    position: 'relative !important',
                    zIndex: '100 !important'
                });
            } else if (badge.classList.contains('badge-secondary')) {
                Object.assign(badge.style, {
                    backgroundColor: '#6c757d !important',
                    color: '#ffffff !important',
                    border: '1px solid #5a6268 !important',
                    display: 'inline-block !important',
                    padding: '0.4em 0.65em !important',
                    fontSize: '85% !important',
                    fontWeight: '700 !important',
                    textAlign: 'center !important',
                    whiteSpace: 'nowrap !important',
                    verticalAlign: 'baseline !important',
                    borderRadius: '0.25rem !important',
                    position: 'relative !important',
                    zIndex: '100 !important'
                });
            }
            
            // Принудительно внедряем важные стили, используя setAttribute
            // для преодоления любых других CSS правил
            const currentStyle = badge.getAttribute('style') || '';
            badge.setAttribute('style', currentStyle + '; visibility: visible !important;');
        }

        // Функция массового применения стилей ко всем бейджам
        function fixAllBadgesExtreme() {
            document.querySelectorAll('.badge').forEach(forceFixBadge);
            
            // Особый случай: находим возможные бейджи внутри таблиц
            document.querySelectorAll('table tr').forEach(row => {
                row.querySelectorAll('.badge').forEach(forceFixBadge);
            });
        }
        
        // Запускаем исправление сразу
        fixAllBadgesExtreme();
        
        // Запускаем каждые 100 мс для гарантированного эффекта
        const badgeInterval = setInterval(fixAllBadgesExtreme, 100);
        
        // Добавляем MutationObserver для отслеживания изменений в DOM
        const observer = new MutationObserver((mutations) => {
            mutations.forEach(mutation => {
                // Проверяем изменения в DOM и применяем стили
                if (mutation.type === 'childList') {
                    mutation.addedNodes.forEach(node => {
                        if (node.nodeType === 1) { // Только элементы
                            // Проверяем сам элемент
                            if (node.classList && node.classList.contains('badge')) {
                                forceFixBadge(node);
                            }
                            
                            // Проверяем дочерние элементы
                            const badges = node.querySelectorAll('.badge');
                            badges.forEach(forceFixBadge);
                        }
                    });
                }
                
                // Также проверяем атрибуты, так как могли измениться классы
                if (mutation.type === 'attributes' && 
                    mutation.attributeName === 'class' && 
                    mutation.target.classList && 
                    mutation.target.classList.contains('badge')) {
                    forceFixBadge(mutation.target);
                }
            });
        });
        
        // Наблюдаем за всем документом на предмет изменений
        observer.observe(document.body, {
            childList: true,
            subtree: true,
            attributes: true,
            attributeFilter: ['class', 'style']
        });
        
        // Особая обработка наведения на строки таблицы
        document.addEventListener('mouseover', function(event) {
            const row = event.target.closest('tr');
            if (row) {
                row.querySelectorAll('.badge').forEach(forceFixBadge);
            }
        }, true);
        
        // Обработка переключения темы
        const themeToggle = document.getElementById('theme-toggle');
        if (themeToggle) {
            themeToggle.addEventListener('click', function() {
                // Запускаем серию исправлений с разными задержками
                setTimeout(fixAllBadgesExtreme, 50);
                setTimeout(fixAllBadgesExtreme, 150);
                setTimeout(fixAllBadgesExtreme, 300);
                setTimeout(fixAllBadgesExtreme, 500);
            });
        }
    });
    </script>
</body>
</html>