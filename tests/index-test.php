<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Minimal index test
$page_title = 'Test Home Page';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background: #f5f5f5; }
        .container { max-width: 1200px; margin: 0 auto; background: white; padding: 20px; }
        .hero { background: linear-gradient(135deg, #0d9488, #1e293b); color: white; padding: 60px 20px; text-align: center; }
        .section { padding: 40px 20px; }
    </style>
</head>
<body>
    <!-- Simple Navbar -->
    <nav style="background: white; padding: 15px 20px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
        <div style="max-width: 1200px; margin: 0 auto; display: flex; justify-content: space-between; align-items: center;">
            <div style="font-size: 24px; font-weight: bold; color: #0d9488;">BusinessPro</div>
            <div>
                <a href="../index.php" style="margin: 0 15px; text-decoration: none; color: #333;">Home</a>
                <a href="../services.php" style="margin: 0 15px; text-decoration: none; color: #333;">Services</a>
                <a href="../contact.php" style="margin: 0 15px; text-decoration: none; color: #333;">Contact</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <!-- Hero Section -->
        <section class="hero">
            <h1>Transform Manufacturing with Smart Automation</h1>
            <p>Revolutionize your production with cutting-edge robotics, IoT integration, and AI-powered solutions.</p>
            <div style="margin-top: 30px;">
                <a href="../services.php" style="background: white; color: #0d9488; padding: 12px 24px; text-decoration: none; border-radius: 5px; margin: 0 10px;">Explore Solutions</a>
                <a href="../contact.php" style="background: transparent; color: white; padding: 12px 24px; text-decoration: none; border: 2px solid white; border-radius: 5px; margin: 0 10px;">Contact Us</a>
            </div>
        </section>

        <!-- Test Content -->
        <section class="section">
            <h2>🔧 This is a Test Version</h2>
            <p>If you can see this content, then the basic PHP and HTML rendering is working fine.</p>
            
            <h3>Configuration Test:</h3>
            <?php
            try {
                require_once '../config/config.php';
                echo "<p>✅ Configuration loaded successfully</p>";
                echo "<p>Site URL: " . (defined('SITE_URL') ? SITE_URL : 'Not defined') . "</p>";
            } catch (Exception $e) {
                echo "<p>❌ Configuration error: " . $e->getMessage() . "</p>";
            }
            ?>

            <h3>Database Test:</h3>
            <?php
            try {
                require_once '../config/database.php';
                $database = new Database();
                $connection = $database->getConnection();
                if ($connection) {
                    echo "<p>✅ Database connection successful</p>";
                } else {
                    echo "<p>❌ Database connection failed</p>";
                }
            } catch (Exception $e) {
                echo "<p>❌ Database error: " . $e->getMessage() . "</p>";
            }
            ?>

            <h3>Next Steps:</h3>
            <ul>
                <li><a href="setup-database.php">Setup Database</a></li>
                <li><a href="test.php">Run Quick Test</a></li>
                <li><a href="../index.php">Try Original Index Page</a></li>
            </ul>
        </section>

        <!-- Sample Services Section -->
        <section class="section" style="background: #f8f9fa;">
            <h2>Our Services</h2>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px; margin-top: 20px;">
                <div style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                    <h3>🤖 Industrial Automation</h3>
                    <p>Complete automation solutions for manufacturing processes.</p>
                </div>
                <div style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                    <h3>📊 IoT Integration</h3>
                    <p>Smart sensors and data analytics for real-time monitoring.</p>
                </div>
                <div style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                    <h3>🔧 Robotics Solutions</h3>
                    <p>Advanced robotic systems for precision manufacturing.</p>
                </div>
            </div>
        </section>
    </div>

    <footer style="background: #1e293b; color: white; text-align: center; padding: 20px; margin-top: 40px;">
        <p>&copy; 2025 BusinessPro. All rights reserved.</p>
    </footer>

    <script>
        console.log('JavaScript is working!');
        console.log('Page loaded successfully');
    </script>
</body>
</html>
