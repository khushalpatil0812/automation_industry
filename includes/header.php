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
            /* New Color Theme */
            --color-platinum: #D8D5DB;
            --color-french-gray: #ADACB5;
            --color-gunmetal: #2D3142;
            
            /* Bootstrap Color Overrides */
            --bs-primary: #2D3142;
            --bs-secondary: #ADACB5;
            --bs-success: #198754;
            --bs-info: #D8D5DB;
            --bs-warning: #ffc107;
            --bs-danger: #dc3545;
            --bs-light: #f8f9fa;
            --bs-dark: #212529;
            
            /* Custom Gradients with New Theme */
            --gradient-primary: linear-gradient(135deg, #2D3142 0%, #4A5568 100%);
            --gradient-secondary: linear-gradient(135deg, #ADACB5 0%, #D8D5DB 100%);
            --gradient-accent: linear-gradient(135deg, #D8D5DB 0%, #ADACB5 100%);
            --gradient-success: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            
            /* Enhanced Shadows */
            --shadow-sm: 0 0.125rem 0.25rem rgba(45, 49, 66, 0.1);
            --shadow: 0 0.5rem 1rem rgba(45, 49, 66, 0.15);
            --shadow-lg: 0 1rem 3rem rgba(45, 49, 66, 0.2);
        }
        
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            line-height: 1.6;
        }
        
        /* Enhanced Navbar */
        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
        }
        
        .navbar-nav .nav-link {
            font-weight: 500;
            transition: all 0.3s ease;
            border-radius: 0.5rem;
            margin: 0 0.25rem;
        }
        
        .navbar-nav .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
            transform: translateY(-1px);
        }
        
        .dropdown-menu {
            border: none;
            box-shadow: var(--shadow-lg);
            border-radius: 0.75rem;
        }
        
        .dropdown-item {
            transition: all 0.3s ease;
            border-radius: 0.5rem;
            margin: 0.125rem 0.5rem;
        }
        
        .dropdown-item:hover {
            background: var(--gradient-primary);
            color: white;
            transform: translateX(0.25rem);
        }
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
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle px-3 <?php echo basename($_SERVER['PHP_SELF']) == 'services.php' ? 'active' : ''; ?>" 
                           href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-tools me-1"></i>Services
                        </a>
                        <ul class="dropdown-menu shadow">
                            <?php
                            try {
                                require_once 'classes/Service.php';
                                $service = new Service();
                                $categories = $service->getCategories();
                                foreach ($categories as $category): ?>
                                    <li><a class="dropdown-item rounded" href="services.php?category=<?php echo urlencode($category); ?>">
                                        <i class="fas fa-chevron-right me-2" style="color: var(--color-gunmetal);"></i><?php echo htmlspecialchars($category); ?>
                                    </a></li>
                                <?php endforeach;
                            } catch (Exception $e) {
                                // Fallback menu if database is not available
                                echo '<li><a class="dropdown-item rounded" href="services.php"><i class="fas fa-chevron-right me-2" style="color: var(--color-gunmetal);"></i>Industrial Automation</a></li>';
                                echo '<li><a class="dropdown-item rounded" href="services.php"><i class="fas fa-chevron-right me-2" style="color: var(--color-gunmetal);"></i>Robotics Solutions</a></li>';
                                echo '<li><a class="dropdown-item rounded" href="services.php"><i class="fas fa-chevron-right me-2" style="color: var(--color-gunmetal);"></i>IoT Integration</a></li>';
                                echo '<li><a class="dropdown-item rounded" href="services.php"><i class="fas fa-chevron-right me-2" style="color: var(--color-gunmetal);"></i>Process Control</a></li>';
                            }
                            ?>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item rounded" href="services.php">
                                <i class="fas fa-list me-2" style="color: var(--color-gunmetal);"></i>All Services
                            </a></li>
                        </ul>
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
    </script>
        </div>
    </nav>
