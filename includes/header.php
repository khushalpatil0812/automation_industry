<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo isset($page_description) ? $page_description : 'Leading provider of industrial automation solutions, robotics, AI, and smart manufacturing systems.'; ?>">
    <meta name="keywords" content="industrial automation, robotics, AI, manufacturing, PLC, HMI, IoT, smart factory">
    <meta name="author" content="AutomationPro Industries">
    <title><?php echo isset($page_title) ? $page_title . ' - ' : ''; ?>AutomationPro - Industrial Solutions</title>
    
    <!-- Preconnect to external domains for performance -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://cdn.jsdelivr.net">
    <link rel="preconnect" href="https://cdnjs.cloudflare.com">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous">
    
    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="public/icons/logo_300_250.png">
    <link rel="icon" type="image/png" href="public/icons/logo_300_250.png">
    
    <style>
        :root {
            /* Enhanced Automation Industry Color Theme */
            --color-platinum: #D8D5DB;
            --color-french-gray: #ADACB5;
            --color-gunmetal: #212529;
            --color-steel-blue: #4682B4;
            --color-electric-blue: #007BFF;
            --color-industrial-orange: #FF6B35;
            --color-machine-silver: #C0C0C0;
            --color-dark-slate: #1a1d2e;
            --color-tech-blue: #0d6efd;
            --color-success-green: #198754;
            
            /* Professional Gradients */
            --gradient-primary: linear-gradient(135deg, #212529 0%, #495057 50%, #6c757d 100%);
            --gradient-accent: linear-gradient(135deg, #FF6B35 0%, #e55100 100%);
            --gradient-tech: linear-gradient(45deg, #0d6efd 0%, #4682B4 100%);
            --gradient-dark: linear-gradient(135deg, #1a1d2e 0%, #212529 50%, #343a40 100%);
            --gradient-metallic: linear-gradient(135deg, #C0C0C0 0%, #A8A8A8 50%, #808080 100%);
            
            /* Advanced Shadows */
            --shadow-xs: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow-sm: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
            --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            --shadow-glow: 0 0 20px rgba(70, 130, 180, 0.4);
            --shadow-glow-orange: 0 0 20px rgba(255, 107, 53, 0.4);
            
            /* Smooth Transitions */
            --transition-fast: 0.15s cubic-bezier(0.4, 0, 0.2, 1);
            --transition-normal: 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            --transition-slow: 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            --transition-bounce: 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            
            /* Typography */
            --font-primary: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            --font-display: 'Space Grotesk', -apple-system, BlinkMacSystemFont, sans-serif;
        }
        
        /* Performance-optimized Google Fonts */
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Space+Grotesk:wght@300;400;500;600;700;800&display=swap');
        
        /* Global Styles */
        * {
            box-sizing: border-box;
        }
        
        html {
            scroll-behavior: smooth;
            scroll-padding-top: 80px;
        }
        
        body {
            font-family: var(--font-primary);
            line-height: 1.6;
            overflow-x: hidden;
            background-color: #212529;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
        
        /* Enhanced Transparent Navigation Bar */
        .navbar {
            background: transparent !important;
            backdrop-filter: blur(5px) saturate(120%);
            -webkit-backdrop-filter: blur(5px) saturate(120%);
            border-bottom: 1px solid rgba(255, 255, 255, 0.02);
            transition: all var(--transition-normal);
            z-index: 1050;
            min-height: 80px;
            padding: 0.5rem 0;
        }
        
        .navbar.scrolled {
            background: rgba(33, 37, 41, 0.3) !important;
            backdrop-filter: blur(8px) saturate(150%);
            -webkit-backdrop-filter: blur(8px) saturate(150%);
            box-shadow: var(--shadow-xl);
            border-bottom: 1px solid rgba(255, 107, 53, 0.1);
        }
        
        .navbar::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(90deg, 
                transparent 0%,
                rgba(255, 107, 53, 0.005) 25%,
                rgba(70, 130, 180, 0.005) 50%,
                rgba(255, 107, 53, 0.005) 75%,
                transparent 100%
            );
            opacity: 0;
            transition: opacity var(--transition-slow);
            pointer-events: none;
            z-index: -1;
        }
        
        .navbar::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(180deg, 
                rgba(0, 0, 0, 0.02) 0%,
                rgba(0, 0, 0, 0.01) 50%,
                transparent 100%
            );
            pointer-events: none;
            z-index: -1;
        }
        
        .navbar.scrolled::before {
            opacity: 1;
            background: linear-gradient(90deg, 
                transparent 0%,
                rgba(255, 107, 53, 0.02) 25%,
                rgba(70, 130, 180, 0.02) 50%,
                rgba(255, 107, 53, 0.02) 75%,
                transparent 100%
            );
        }
        
        /* Professional Brand Logo with Enhanced Visibility */
        .navbar-brand {
            font-family: var(--font-display);
            font-weight: 800;
            font-size: 1.75rem;
            color: var(--color-platinum) !important;
            transition: all var(--transition-normal);
            position: relative;
            display: flex;
            align-items: center;
            text-decoration: none;
            padding: 0.5rem 0;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
        }
        
        .navbar-brand:hover {
            color: var(--color-platinum) !important;
            transform: scale(1.03);
            filter: brightness(1.1);
            text-shadow: 0 4px 8px rgba(0, 0, 0, 0.7);
        }
        
        .navbar-brand:focus {
            outline: 2px solid var(--color-industrial-orange);
            outline-offset: 4px;
            border-radius: 8px;
        }
        
        .brand-logo {
            height: 3.5rem;
            width: auto;
            margin-right: 0.5rem;
            transition: all var(--transition-normal);
            filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.3));
        }
        
        .navbar-brand:hover .brand-logo {
            transform: scale(1.05);
            filter: drop-shadow(0 4px 8px rgba(0, 0, 0, 0.5));
        }
        
        @keyframes rotate-pulse {
            0%, 100% { 
                transform: rotate(0deg) scale(1);
            }
            25% { 
                transform: rotate(90deg) scale(1.05);
            }
            50% { 
                transform: rotate(180deg) scale(1);
            }
            75% { 
                transform: rotate(270deg) scale(1.05);
            }
        }
        
        .brand-text {
            font-weight: 800;
            letter-spacing: -0.02em;
            background: linear-gradient(135deg, #ffffff 0%, var(--color-platinum) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.5));
        }
        
        /* Advanced Navigation Links with Enhanced Visibility */
        .navbar-nav {
            align-items: center;
        }
        
        .navbar-nav .nav-link {
            font-family: var(--font-primary);
            font-weight: 500;
            font-size: 0.95rem;
            color: rgba(255, 255, 255, 0.95) !important;
            transition: all var(--transition-normal);
            border-radius: 12px;
            margin: 0 0.25rem;
            padding: 0.75rem 1.25rem !important;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            text-decoration: none;
            text-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
        }
        
        .navbar-nav .nav-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: var(--gradient-tech);
            transition: left var(--transition-normal) cubic-bezier(0.68, -0.55, 0.265, 1.55);
            z-index: -1;
            border-radius: 12px;
        }
        
        .navbar-nav .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 2px;
            background: var(--gradient-accent);
            transition: all var(--transition-normal);
            transform: translateX(-50%);
        }
        
        .navbar-nav .nav-link:hover::before {
            left: 0;
        }
        
        .navbar-nav .nav-link:hover::after {
            width: 80%;
        }
        
        .navbar-nav .nav-link:hover {
            color: white !important;
            transform: translateY(-2px);
            box-shadow: var(--shadow-glow);
        }
        
        .navbar-nav .nav-link:focus {
            outline: 2px solid var(--color-industrial-orange);
            outline-offset: 2px;
            color: white !important;
        }
        
        .navbar-nav .nav-link.active {
            background: var(--gradient-primary);
            color: white !important;
            box-shadow: var(--shadow-lg);
            transform: translateY(-1px);
        }
        
        .navbar-nav .nav-link.active::after {
            width: 80%;
            background: var(--gradient-accent);
        }
        
        .nav-link-icon {
            margin-right: 0.5rem;
            transition: all var(--transition-fast);
            font-size: 0.9rem;
        }
        
        .navbar-nav .nav-link:hover .nav-link-icon {
            transform: scale(1.1) rotate(5deg);
            filter: brightness(1.2);
        }
        
        /* Mobile Menu Toggle with Enhanced Visibility */
        .navbar-toggler {
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 12px;
            padding: 0.5rem 0.75rem;
            transition: all var(--transition-normal);
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(5px);
            position: relative;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
        
        .navbar-toggler::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: var(--gradient-accent);
            transition: left var(--transition-normal);
            z-index: -1;
        }
        
        .navbar-toggler:hover::before {
            left: 0;
        }
        
        .navbar-toggler:hover {
            border-color: var(--color-industrial-orange);
            box-shadow: var(--shadow-glow-orange);
            transform: scale(1.05);
        }
        
        .navbar-toggler:focus {
            outline: 2px solid var(--color-industrial-orange);
            outline-offset: 4px;
            box-shadow: none;
        }
        
        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 255, 255, 0.9%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2.5' d='m4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
            width: 1.5em;
            height: 1.5em;
            transition: all var(--transition-normal);
        }
        
        .navbar-toggler:hover .navbar-toggler-icon {
            transform: rotate(90deg);
        }
        
        /* Enhanced Mobile Navigation for Transparency */
        @media (max-width: 991.98px) {
            .navbar-collapse.show {
                background: linear-gradient(135deg, rgba(26, 29, 46, 0.85) 0%, rgba(33, 37, 41, 0.85) 100%);
                border-radius: 16px;
                margin-top: 1rem;
                padding: 1.5rem;
                backdrop-filter: blur(15px) saturate(150%);
                border: 1px solid rgba(255, 255, 255, 0.08);
                box-shadow: var(--shadow-xl);
                animation: slideDown var(--transition-normal) ease-out;
            }
            
            /* Ensure collapsed state is properly hidden */
            .navbar-collapse:not(.show) {
                display: none !important;
            }
            
            .navbar-nav .nav-link {
                margin: 0.5rem 0;
                text-align: center;
                padding: 1rem 1.5rem !important;
                border-radius: 16px;
                background: rgba(255, 255, 255, 0.02);
                border: 1px solid rgba(255, 255, 255, 0.05);
            }
            
            .navbar-nav .nav-link:hover {
                transform: translateX(10px);
                background: rgba(255, 255, 255, 0.05);
            }
            
            /* Enhanced mobile menu button */
            .navbar-toggler {
                border: 2px solid rgba(255, 255, 255, 0.3);
                border-radius: 12px;
                padding: 0.5rem 0.75rem;
                transition: all var(--transition-normal);
                background: rgba(255, 255, 255, 0.05);
                backdrop-filter: blur(5px);
                position: relative;
                overflow: hidden;
                box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            }
            
            .navbar-toggler::before {
                content: '';
                position: absolute;
                top: 0;
                left: -100%;
                width: 100%;
                height: 100%;
                background: var(--gradient-accent);
                transition: left var(--transition-normal);
                z-index: -1;
            }
            
            .navbar-toggler:hover::before {
                left: 0;
            }
            
            .navbar-toggler:hover {
                border-color: var(--color-industrial-orange);
                box-shadow: var(--shadow-glow-orange);
                transform: scale(1.05);
            }
            
            .navbar-toggler:focus {
                outline: 2px solid var(--color-industrial-orange);
                outline-offset: 4px;
                box-shadow: none;
            }
            
            .navbar-toggler-icon {
                background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 255, 255, 0.9%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2.5' d='m4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
                width: 1.5em;
                height: 1.5em;
                transition: all var(--transition-normal);
            }
            
            /* Transform hamburger to X when menu is open */
            .navbar-toggler[aria-expanded="true"] .navbar-toggler-icon {
                background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 255, 255, 0.9%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2.5' d='M6 6l18 18M6 24L24 6'/%3e%3c/svg%3e");
                transform: rotate(90deg);
            }
            
            .navbar-toggler:hover .navbar-toggler-icon {
                transform: rotate(90deg);
            }
            
            .navbar-toggler[aria-expanded="true"]:hover .navbar-toggler-icon {
                transform: rotate(180deg);
            }
        }
        
        @keyframes slideInFromLeft {
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        

        
        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* Advanced Loading States */
        .nav-link.loading {
            opacity: 0.7;
            pointer-events: none;
            position: relative;
        }
        
        .nav-link.loading::after {
            content: '';
            position: absolute;
            top: 50%;
            right: 1rem;
            width: 12px;
            height: 12px;
            border: 2px solid transparent;
            border-top: 2px solid currentColor;
            border-radius: 50%;
            animation: spin 0.8s linear infinite;
            transform: translateY(-50%);
        }
        
        @keyframes spin {
            0% { transform: translateY(-50%) rotate(0deg); }
            100% { transform: translateY(-50%) rotate(360deg); }
        }
        
        /* Accessibility Enhancements */
        @media (prefers-reduced-motion: reduce) {
            * {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
            }
            
            html {
                scroll-behavior: auto;
            }
        }
        
        /* High contrast mode support */
        @media (prefers-contrast: high) {
            .navbar {
                border-bottom: 2px solid white;
            }
            
            .navbar-nav .nav-link {
                border: 1px solid rgba(255, 255, 255, 0.3);
            }
            
            .navbar-nav .nav-link:hover,
            .navbar-nav .nav-link:focus {
                border-color: white;
                background: rgba(255, 255, 255, 0.2);
            }
        }
        
        /* Skip to content link for accessibility */
        .skip-link {
            position: absolute;
            top: -40px;
            left: 6px;
            background: var(--color-industrial-orange);
            color: white;
            padding: 8px;
            text-decoration: none;
            border-radius: 4px;
            z-index: 9999;
            font-weight: 600;
            transition: top var(--transition-fast);
        }
        
        .skip-link:focus {
            top: 6px;
            outline: 2px solid white;
            outline-offset: 2px;
        }
        
        /* Performance optimizations */
        .navbar,
        .navbar-nav .nav-link,
        .navbar-brand {
            will-change: transform, opacity;
        }
        
        /* Reduced motion fallbacks */
        @media (prefers-reduced-motion: reduce) {
            .brand-icon {
                animation: none;
            }
            
            .navbar-nav .nav-link:hover {
                transform: none;
            }
            
            .navbar-toggler:hover {
                transform: none;
            }
        }
    </style>
</head>
<body>
    <!-- Skip to content link for accessibility -->
    <!-- <a href="#main-content" class="skip-link" aria-label="Skip to main content">Skip to main content</a>
     -->
    <!-- Enhanced Navigation Bar -->
    <nav class="navbar navbar-expand-lg fixed-top" role="navigation" aria-label="Main navigation">
        <div class="container">
            <!-- Professional Brand -->
            <a class="navbar-brand" href="index.php" aria-label="AutomationPro - Industrial Solutions Homepage">
                <img src="public/icons/LOGO_SILVER.png" alt="AutomationPro Logo" class="brand-logo" aria-hidden="true">

            </a>
            
            <!-- Mobile Menu Toggle -->
            <button class="navbar-toggler" 
                    type="button" 
                    data-bs-toggle="collapse" 
                    data-bs-target="#navbarNav" 
                    aria-controls="navbarNav" 
                    aria-expanded="false" 
                    aria-label="Toggle navigation menu">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <!-- Navigation Menu -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto" role="menubar">
                    <li class="nav-item" role="none">
                        <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>" 
                           href="index.php" 
                           role="menuitem"
                           aria-current="<?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'page' : 'false'; ?>">
                            <i class="fas fa-home nav-link-icon" aria-hidden="true"></i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li class="nav-item" role="none">
                        <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'about.php' ? 'active' : ''; ?>" 
                           href="about.php" 
                           role="menuitem"
                           aria-current="<?php echo basename($_SERVER['PHP_SELF']) == 'about.php' ? 'page' : 'false'; ?>">
                            <i class="fas fa-building nav-link-icon" aria-hidden="true"></i>
                            <span>About Us</span>
                        </a>
                    </li>
                    <li class="nav-item" role="none">
                        <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'services.php' || basename($_SERVER['PHP_SELF']) == 'service-detail.php' ? 'active' : ''; ?>" 
                           href="services.php" 
                           role="menuitem"
                           aria-current="<?php echo (basename($_SERVER['PHP_SELF']) == 'services.php' || basename($_SERVER['PHP_SELF']) == 'service-detail.php') ? 'page' : 'false'; ?>">
                            <i class="fas fa-cogs nav-link-icon" aria-hidden="true"></i>
                            <span>Services</span>
                        </a>
                    </li>
                    <li class="nav-item" role="none">
                        <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'contact.php' ? 'active' : ''; ?>" 
                           href="contact.php" 
                           role="menuitem"
                           aria-current="<?php echo basename($_SERVER['PHP_SELF']) == 'contact.php' ? 'page' : 'false'; ?>">
                            <i class="fas fa-envelope nav-link-icon" aria-hidden="true"></i>
                            <span>Contact</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <!-- Main Content Wrapper -->
  
    
    <!-- Bootstrap JavaScript Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
    <!-- AOS Animation JavaScript -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <script>
        // Performance-optimized initialization
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize AOS with performance optimizations
            AOS.init({
                duration: 800,
                once: true,
                offset: 50,
                easing: 'ease-out-cubic',
                disable: window.innerWidth < 768 ? true : false, // Disable on mobile for performance
            });
            
            // Enhanced Navbar Scroll Effect with debouncing
            let scrollTimeout;
            const navbar = document.querySelector('.navbar');
            
            function handleScroll() {
                if (scrollTimeout) {
                    cancelAnimationFrame(scrollTimeout);
                }
                
                scrollTimeout = requestAnimationFrame(() => {
                    if (window.scrollY > 50) {
                        navbar.classList.add('scrolled');
                    } else {
                        navbar.classList.remove('scrolled');
                    }
                });
            }
            
            window.addEventListener('scroll', handleScroll, { passive: true });
            
            // Smooth scroll for anchor links with offset for fixed navbar
            const anchorLinks = document.querySelectorAll('a[href^="#"]');
            anchorLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const targetId = this.getAttribute('href');
                    const targetElement = document.querySelector(targetId);
                    
                    if (targetElement) {
                        const navbarHeight = navbar.offsetHeight;
                        const targetPosition = targetElement.offsetTop - navbarHeight - 20;
                        
                        window.scrollTo({
                            top: targetPosition,
                            behavior: 'smooth'
                        });
                    }
                });
            });
            
            // Mobile menu toggle functionality
            const navbarCollapse = document.querySelector('.navbar-collapse');
            const navbarToggler = document.querySelector('.navbar-toggler');
            const navLinks = document.querySelectorAll('.navbar-nav .nav-link');
            let isMenuOpen = false;
            
            if (navbarCollapse && navbarToggler) {
                // Disable Bootstrap's default behavior for manual control
                navbarToggler.removeAttribute('data-bs-toggle');
                navbarToggler.removeAttribute('data-bs-target');
                
                // Toggle menu function
                function toggleMenu() {
                    if (window.innerWidth >= 992) return;
                    
                    isMenuOpen = !isMenuOpen;
                    navbarCollapse.classList.toggle('show', isMenuOpen);
                    navbarToggler.setAttribute('aria-expanded', isMenuOpen);
                }
                
                // Close menu function
                function closeMenu() {
                    if (isMenuOpen) {
                        isMenuOpen = false;
                        navbarCollapse.classList.remove('show');
                        navbarToggler.setAttribute('aria-expanded', 'false');
                    }
                }
                
                // Toggle button click
                navbarToggler.addEventListener('click', function(e) {
                    e.preventDefault();
                    toggleMenu();
                });
                
                // Auto-close on nav link click
                navLinks.forEach(link => {
                    link.addEventListener('click', function() {
                        if (window.innerWidth < 992) closeMenu();
                    });
                });
                
                // Auto-close on window resize to desktop
                window.addEventListener('resize', function() {
                    if (window.innerWidth >= 992) closeMenu();
                });
                
                // Auto-close on outside click
                document.addEventListener('click', function(e) {
                    if (window.innerWidth < 992 && isMenuOpen) {
                        const isClickInsideNav = navbarCollapse.contains(e.target);
                        const isToggleButton = navbarToggler.contains(e.target);
                        
                        if (!isClickInsideNav && !isToggleButton) {
                            closeMenu();
                        }
                    }
                });
            }
            
            // Preload critical pages
            ['services.php', 'about.php', 'contact.php'].forEach(page => {
                const link = document.createElement('link');
                link.rel = 'prefetch';
                link.href = page;
                document.head.appendChild(link);
            });
            
            // Handle reduced motion preferences
            if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
                AOS.init({
                    duration: 0,
                    once: true,
                    offset: 0,
                    disable: true
                });
                
                const style = document.createElement('style');
                style.textContent = `
                    *, *::before, *::after {
                        animation-duration: 0.01ms !important;
                        animation-iteration-count: 1 !important;
                        transition-duration: 0.01ms !important;
                    }
                `;
                document.head.appendChild(style);
            }
        });
        
        // Service Worker removed - not needed for this project
        // You can add it back later if you create a sw.js file for offline functionality
    </script>
