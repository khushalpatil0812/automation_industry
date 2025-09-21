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
    
    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <style>
        :root {
            /* Automation Industry Color Theme */
            --color-platinum: #d5d7dbff;
            --color-french-gray: #ADACB5;
            --color-gunmetal: #2D3142;
            --color-steel-blue: #4682B4;
            --color-electric-blue: #007BFF;
            --color-industrial-orange: #FF6B35;
            --color-machine-silver: #C0C0C0;
            
            /* Bootstrap Color Overrides */
            --bs-primary: #2D3142;
            --bs-secondary: #ADACB5;
            --bs-success: #198754;
            --bs-info: #D8D5DB;
            --bs-warning: #ffc107;
            --bs-danger: #dc3545;
            --bs-light: #f8f9fa;
            --bs-dark: #212529;
            
            /* Industrial Gradients */
            --gradient-primary: linear-gradient(135deg, #2D3142 0%, #4682B4 50%, #007BFF 100%);
            --gradient-secondary: linear-gradient(135deg, #ADACB5 0%, #D8D5DB 100%);
            --gradient-accent: linear-gradient(135deg, #FF6B35 0%, #FFA500 100%);
            --gradient-tech: linear-gradient(45deg, #667eea 0%, #764ba2 100%);
            --gradient-metallic: linear-gradient(135deg, #C0C0C0 0%, #A8A8A8 50%, #808080 100%);
            
            /* Professional Shadows */
            --shadow-sm: 0 0.125rem 0.25rem rgba(45, 49, 66, 0.1);
            --shadow: 0 0.5rem 1rem rgba(45, 49, 66, 0.15);
            --shadow-lg: 0 1rem 3rem rgba(45, 49, 66, 0.2);
            --shadow-glow: 0 0 20px rgba(70, 130, 180, 0.3);
            
            /* Animation Variables */
            --transition-fast: 0.2s ease-out;
            --transition-normal: 0.3s ease-in-out;
            --transition-slow: 0.5s ease-in-out;
        }
        
        /* Google Fonts Import */
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Space+Grotesk:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            line-height: 1.6;
            overflow-x: hidden;
        }
        
        /* Enhanced Professional Navbar */
        .navbar {
            background: linear-gradient(135deg, #242c26ff 0%, #1f241fff 50%, #252e26ff 100%) !important;
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(216, 213, 219, 0.1);
            transition: all var(--transition-normal);
            z-index: 1000;
        }
        
        .navbar.scrolled {
            background: linear-gradient(135deg, rgba(26, 29, 46, 0.95) 0%, rgba(45, 49, 66, 0.95) 50%, rgba(22, 33, 62, 0.95) 100%) !important;
            box-shadow: var(--shadow-lg);
        }
        
        .navbar-brand {
            font-family: 'Space Grotesk', sans-serif;
            font-weight: 700;
            font-size: 1.6rem;
            color: var(--color-platinum) !important;
            transition: all var(--transition-normal);
            position: relative;
            overflow: hidden;
        }
        
        .navbar-brand:hover {
            transform: scale(1.05);
            text-shadow: 0 0 15px rgba(216, 213, 219, 0.5);
        }
        
        .navbar-brand i {
            background: var(--gradient-accent);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: rotate-gears 3s linear infinite;
            filter: drop-shadow(0 0 5px rgba(49, 54, 39, 0.3));
        }
        
        @keyframes rotate-gears {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        /* Advanced Navigation Links */
        .navbar-nav .nav-link {
            font-family: 'Inter', sans-serif;
            font-weight: 500;
            font-size: 0.95rem;
            color: var(--color-platinum) !important;
            transition: all var(--transition-normal);
            border-radius: 0.5rem;
            margin: 0 0.25rem;
            position: relative;
            padding: 0.75rem 1rem !important;
            overflow: hidden;
        }
        
        .navbar-nav .nav-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: var(--gradient-tech);
            transition: left var(--transition-normal);
            z-index: -1;
            border-radius: 0.5rem;
        }
        
        .navbar-nav .nav-link:hover::before {
            left: 0;
        }
        
        .navbar-nav .nav-link:hover {
            color: white !important;
            transform: translateY(-2px);
            box-shadow: var(--shadow-glow);
        }
        
        .navbar-nav .nav-link.active {
            background: var(--gradient-primary);
            color: white !important;
            box-shadow: var(--shadow);
        }
        
        .navbar-nav .nav-link i {
            margin-right: 0.5rem;
            transition: all var(--transition-fast);
        }
        
        .navbar-nav .nav-link:hover i {
            transform: scale(1.1);
            filter: brightness(1.2);
        }
        
        /* Professional Dropdown */
        .dropdown-menu {
            background: linear-gradient(135deg, rgba(45, 49, 66, 0.95) 0%, rgba(26, 29, 46, 0.95) 100%);
            border: 1px solid rgba(216, 213, 219, 0.1);
            box-shadow: var(--shadow-lg);
            border-radius: 0.75rem;
            backdrop-filter: blur(15px);
            margin-top: 0.5rem;
            padding: 0.75rem;
        }
        
        .dropdown-item {
            color: var(--color-platinum);
            transition: all var(--transition-normal);
            border-radius: 0.5rem;
            margin: 0.125rem 0;
            padding: 0.75rem 1rem;
            font-weight: 500;
            position: relative;
            overflow: hidden;
        }
        
        .dropdown-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: var(--gradient-accent);
            transition: left var(--transition-normal);
            z-index: -1;
            border-radius: 0.5rem;
        }
        
        .dropdown-item:hover::before {
            left: 0;
        }
        
        .dropdown-item:hover {
            color: white;
            transform: translateX(0.5rem);
            box-shadow: var(--shadow);
        }
        
        /* Mobile Navbar Toggle */
        .navbar-toggler {
            border: 2px solid var(--color-platinum);
            border-radius: 0.5rem;
            padding: 0.5rem;
            transition: all var(--transition-normal);
        }
        
        .navbar-toggler:hover {
            border-color: var(--color-industrial-orange);
            box-shadow: 0 0 10px rgba(35, 33, 32, 0.3);
        }
        
        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28216, 213, 219, 1%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='m4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }
        
        /* Industrial Loading Animation */
        @keyframes pulse-glow {
            0%, 100% { 
                box-shadow: 0 0 5px rgba(70, 130, 180, 0.5);
                transform: scale(1);
            }
            50% { 
                box-shadow: 0 0 20px rgba(70, 130, 180, 0.8);
                transform: scale(1.02);
            }
        }
        
        .navbar-brand:active {
            animation: pulse-glow 0.3s ease-out;
        }
        
        /* Responsive Design Enhancements */
        @media (max-width: 991.98px) {
            .navbar-collapse {
                background: linear-gradient(135deg, rgba(45, 49, 66, 0.98) 0%, rgba(26, 29, 46, 0.98) 100%);
                border-radius: 0.75rem;
                margin-top: 1rem;
                padding: 1rem;
                backdrop-filter: blur(15px);
                border: 1px solid rgba(216, 213, 219, 0.1);
            }
            
            .navbar-nav .nav-link {
                margin: 0.25rem 0;
                text-align: center;
            }
        }
        
        /* Industrial Tech Pattern Background */
        .navbar::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: 
                radial-gradient(circle at 25% 25%, rgba(70, 130, 180, 0.1) 2px, transparent 2px),
                radial-gradient(circle at 75% 75%, rgba(255, 107, 53, 0.1) 1px, transparent 1px);
            background-size: 50px 50px;
            pointer-events: none;
            z-index: -1;
        }

        /* hi */
        
        /* hi */
    </style>
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top shadow-lg">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="index.php">
                <i class="fas fa-cogs me-2 fs-3" style="color: var(--color-platinum);"></i>
                <span class="fw-bold">AutomationPro</span>
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link px-3 <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>" href="index.php">
                            <i class="fas fa-home me-1"></i>Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3 <?php echo basename($_SERVER['PHP_SELF']) == 'about.php' ? 'active' : ''; ?>" href="about.php">
                            <i class="fas fa-building me-1"></i>About Us
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3 <?php echo basename($_SERVER['PHP_SELF']) == 'services.php' ? 'active' : ''; ?>" href="services.php">
                            <i class="fas fa-tools me-1"></i>Services
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3 <?php echo basename($_SERVER['PHP_SELF']) == 'contact.php' ? 'active' : ''; ?>" href="contact.php">
                            <i class="fas fa-envelope me-1"></i>Contact
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    
    <!-- AOS Animation JavaScript -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // Initialize AOS animations
        AOS.init({
            duration: 1000,
            once: true,
            offset: 50
        });
        
        // Enhanced Navbar Scroll Effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
        
        // Smooth scroll for anchor links
        document.addEventListener('DOMContentLoaded', function() {
            const links = document.querySelectorAll('a[href^="#"]');
            links.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });
        });
        
        // Mobile menu auto-close on link click
        document.addEventListener('DOMContentLoaded', function() {
            const navLinks = document.querySelectorAll('.navbar-nav .nav-link');
            const navbarCollapse = document.querySelector('.navbar-collapse');
            
            navLinks.forEach(link => {
                link.addEventListener('click', function() {
                    if (window.innerWidth < 992) {
                        const bsCollapse = new bootstrap.Collapse(navbarCollapse);
                        bsCollapse.hide();
                    }
                });
            });
        });
        
        // Add loading state to navigation links
        document.addEventListener('DOMContentLoaded', function() {
            const navLinks = document.querySelectorAll('.navbar-nav .nav-link');
            navLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    if (this.getAttribute('href') !== '#' && !this.getAttribute('href').startsWith('#')) {
                        this.style.opacity = '0.7';
                        this.style.pointerEvents = 'none';
                        
                        // Reset after a short delay (for visual feedback)
                        setTimeout(() => {
                            this.style.opacity = '1';
                            this.style.pointerEvents = 'auto';
                        }, 1000);
                    }
                });
            });
        });
    </script>
        </div>
    </nav>
