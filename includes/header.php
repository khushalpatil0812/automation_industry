<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? $page_title . ' - ' : ''; ?>Professional Business Solutions</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
    <style>
        /* Reset default margins and padding */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        :root {
            --primary-blue: #1e3a8a;
            --primary-blue-dark: #1e40af;
            --secondary-gray: #475569;
            --accent-orange: #f59e0b;
            --light-gray: #f8fafc;
            --dark-gray: #334155;
            --text-light: #64748b;
            --navbar-height: 80px; /* Define consistent navbar height */
        }
        
        .navbar-custom {
            background-image: url('public/freepics/491362538070.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            width: 100%;
            height: var(--navbar-height);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease;
            z-index: 1030;
        }
        
        .navbar-custom::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(0, 0, 0, 0.7) 0%, rgba(31, 41, 55, 0.8) 100%);
            z-index: 1;
        }
        
        .navbar-custom .container {
            position: relative;
            z-index: 2;
            height: 100%;
            display: flex;
            align-items: center;
        }
        
        .navbar-custom.scrolled {
            height: 60px; /* Smaller height when scrolled */
            background-attachment: scroll;
        }
        
        .navbar-custom.scrolled::before {
            background: linear-gradient(135deg, rgba(0, 0, 0, 0.85) 0%, rgba(17, 24, 39, 0.9) 100%);
        }
        
        .navbar-brand-custom {
            font-size: 1.8rem;
            font-weight: 700;
            color: white !important;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
        }
        
        .navbar-brand-custom:hover {
            color: var(--accent-orange) !important;
            transform: translateY(-2px);
        }
        
        .navbar-brand-custom i {
            font-size: 2rem;
            color: var(--accent-orange);
        }
        
        .navbar-nav .nav-link {
            color: rgba(255, 255, 255, 0.9) !important;
            font-weight: 500;
            padding: 0.75rem 1.25rem !important;
            margin: 0 0.25rem;
            border-radius: 8px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .navbar-nav .nav-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.1), transparent);
            transition: left 0.5s ease;
        }
        
        .navbar-nav .nav-link:hover::before {
            left: 100%;
        }
        
        .navbar-nav .nav-link:hover {
            color: white !important;
            background: rgba(255, 255, 255, 0.1);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        
        .navbar-nav .nav-link.active {
            background: var(--accent-orange);
            color: white !important;
            box-shadow: 0 3px 8px rgba(245, 158, 11, 0.3);
        }
        
        .navbar-nav .nav-link.active:hover {
            background: #d97706;
            transform: translateY(-2px);
        }
        
        .navbar-nav .nav-link.home-btn {
            background: linear-gradient(135deg, #f59e0b, #d97706);
            color: white !important;
            font-weight: 600;
            box-shadow: 0 2px 8px rgba(245, 158, 11, 0.3);
            border: 2px solid rgba(255, 255, 255, 0.2);
        }
        
        .navbar-nav .nav-link.home-btn:hover {
            background: linear-gradient(135deg, #d97706, #b45309);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(245, 158, 11, 0.5);
            border-color: rgba(255, 255, 255, 0.4);
        }
        
        .navbar-nav .nav-link.home-btn.active {
            background: linear-gradient(135deg, #b45309, #92400e);
            box-shadow: 0 3px 10px rgba(180, 83, 9, 0.4);
        }
        
        .dropdown-menu {
            background: white;
            border: none;
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
            border-radius: 12px;
            padding: 0.5rem 0;
            margin-top: 0.5rem;
        }
        
        .dropdown-item {
            padding: 0.75rem 1.5rem;
            color: var(--dark-gray);
            font-weight: 500;
            transition: all 0.3s ease;
            border-left: 3px solid transparent;
        }
        
        .dropdown-item:hover {
            background: var(--light-gray);
            color: var(--primary-blue);
            border-left-color: var(--accent-orange);
            transform: translateX(5px);
        }
        
        .dropdown-divider {
            margin: 0.5rem 0;
            border-color: #e2e8f0;
        }
        
        .navbar-toggler {
            border: 2px solid rgba(255,255,255,0.2);
            padding: 0.5rem 0.75rem;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        
        .navbar-toggler:hover {
            border-color: var(--accent-orange);
            background: rgba(245, 158, 11, 0.1);
        }
        
        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 255, 255, 0.8%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='m4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }
        
        .navbar-toggler:focus {
            box-shadow: 0 0 0 0.25rem rgba(245, 158, 11, 0.25);
        }
        
        @media (max-width: 991.98px) {
            .navbar-nav {
                background: rgba(255,255,255,0.05);
                border-radius: 12px;
                padding: 1rem;
                margin-top: 1rem;
                backdrop-filter: blur(10px);
            }
            
            .navbar-nav .nav-link {
                margin: 0.25rem 0;
                text-align: center;
            }
        }
        
        /* Animation for dropdown */
        .dropdown-menu {
            opacity: 0;
            transform: translateY(-10px);
            transition: all 0.3s ease;
        }
        
        .dropdown-menu.show {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-custom fixed-top" id="mainNavbar">
        <div class="container">
            <a class="navbar-brand-custom" href="index.php">
                <i class="fas fa-cogs"></i>
                <span>AutomationPro</span>
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link home-btn <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>" href="index.php">
                            <i class="fas fa-home me-1"></i>Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'about.php' ? 'active' : ''; ?>" href="about.php">
                            <i class="fas fa-building me-1"></i>About Us
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle <?php echo basename($_SERVER['PHP_SELF']) == 'services.php' ? 'active' : ''; ?>" 
                           href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-tools me-1"></i>Services
                        </a>
                        <ul class="dropdown-menu">
                            <?php
                            try {
                                require_once 'classes/Service.php';
                                $service = new Service();
                                $categories = $service->getCategories();
                                foreach ($categories as $category): ?>
                                    <li><a class="dropdown-item" href="services.php?category=<?php echo urlencode($category); ?>">
                                        <i class="fas fa-chevron-right me-2"></i><?php echo htmlspecialchars($category); ?>
                                    </a></li>
                                <?php endforeach;
                            } catch (Exception $e) {
                                // Fallback menu if database is not available
                                echo '<li><a class="dropdown-item" href="services.php"><i class="fas fa-chevron-right me-2"></i>Industrial Automation</a></li>';
                                echo '<li><a class="dropdown-item" href="services.php"><i class="fas fa-chevron-right me-2"></i>Robotics Solutions</a></li>';
                                echo '<li><a class="dropdown-item" href="services.php"><i class="fas fa-chevron-right me-2"></i>IoT Integration</a></li>';
                                echo '<li><a class="dropdown-item" href="services.php"><i class="fas fa-chevron-right me-2"></i>Process Control</a></li>';
                            }
                            ?>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="services.php">
                                <i class="fas fa-list me-2"></i>All Services
                            </a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'contact.php' ? 'active' : ''; ?>" href="contact.php">
                            <i class="fas fa-envelope me-1"></i>Contact
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <script>
        // Dynamic navbar height adjustment and scroll effect
        document.addEventListener('DOMContentLoaded', function() {
            const navbar = document.getElementById('mainNavbar');
            const heroCarousel = document.getElementById('heroCarousel');
            
            // Calculate and set actual navbar height
            if (navbar) {
                const navbarHeight = navbar.offsetHeight;
                document.documentElement.style.setProperty('--navbar-height', navbarHeight + 'px');
                
                // Adjust hero carousel if it exists
                if (heroCarousel) {
                    heroCarousel.style.marginTop = '-' + navbarHeight + 'px';
                    heroCarousel.style.paddingTop = navbarHeight + 'px';
                }
            }
        });
        
        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('mainNavbar');
            if (navbar) {
                if (window.scrollY > 50) {
                    navbar.classList.add('scrolled');
                } else {
                    navbar.classList.remove('scrolled');
                }
            }
        });
        
        // Smooth dropdown animation
        document.addEventListener('DOMContentLoaded', function() {
            const dropdownElements = document.querySelectorAll('.dropdown-toggle');
            dropdownElements.forEach(function(dropdown) {
                dropdown.addEventListener('show.bs.dropdown', function() {
                    const menu = this.nextElementSibling;
                    menu.style.display = 'block';
                    setTimeout(() => menu.classList.add('show'), 10);
                });
                
                dropdown.addEventListener('hide.bs.dropdown', function() {
                    const menu = this.nextElementSibling;
                    menu.classList.remove('show');
                    setTimeout(() => menu.style.display = 'none', 300);
                });
            });
        });
    </script>
        </div>
    </nav>
