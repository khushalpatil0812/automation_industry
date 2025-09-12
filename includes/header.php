<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? $page_title . ' - ' : ''; ?>Professional Business Solutions</title>
    
    <!-- Preload critical CSS -->
    <link rel="preload" href="assets/css/utils/variables.css" as="style">
    <link rel="preload" href="assets/css/components/navigation.css" as="style">
    
    <!-- Main CSS - imports all modular components -->
    <link rel="stylesheet" href="assets/css/main.css">
    
    <!-- External libraries -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>

    <!-- Scroll progress indicator -->
    <div class="scroll-indicator"></div>
    
    <!-- Skip link for accessibility -->
    <a href="#main-content" class="skip-link">Skip to main content</a>
    
    <nav class="navbar">
        <div class="nav-container">
            <div class="nav-logo">
                <a href="index.php">BusinessPro</a>
            </div>
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="index.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a href="about.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'about.php' ? 'active' : ''; ?>">About Us</a>
                </li>
                <li class="nav-item dropdown">
                    <a href="services.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'services.php' ? 'active' : ''; ?>">
                        Services <span class="dropdown-arrow">▼</span>
                    </a>
                    <div class="dropdown-menu">
                        <?php
                        try {
                            require_once 'classes/Service.php';
                            $service = new Service();
                            $categories = $service->getCategories();
                            foreach ($categories as $category): ?>
                                <a href="services.php?category=<?php echo urlencode($category); ?>" class="dropdown-item">
                                    <?php echo htmlspecialchars($category); ?>
                                </a>
                            <?php endforeach;
                        } catch (Exception $e) {
                            // Fallback menu if database is not available
                            echo '<a href="services.php" class="dropdown-item">Web Development</a>';
                            echo '<a href="services.php" class="dropdown-item">Mobile Apps</a>';
                            echo '<a href="services.php" class="dropdown-item">Digital Marketing</a>';
                            echo '<a href="services.php" class="dropdown-item">Consulting</a>';
                        }
                        ?>
                        <div class="dropdown-divider"></div>
                        <a href="services.php" class="dropdown-item">All Services</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="contact.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'contact.php' ? 'active' : ''; ?>">Contact</a>
                </li>
            </ul>
            <div class="nav-toggle">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </nav>
