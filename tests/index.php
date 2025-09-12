<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Suite - Automation Industry</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            margin: 0;
            padding: 20px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            border-radius: 12px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        .header {
            background: linear-gradient(135deg, #0d9488, #1e293b);
            color: white;
            padding: 40px 30px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 2.5rem;
            font-weight: 700;
        }
        .header p {
            margin: 10px 0 0 0;
            opacity: 0.9;
            font-size: 1.1rem;
        }
        .content {
            padding: 40px 30px;
        }
        .test-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        .test-card {
            background: #f8fafc;
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            padding: 25px;
            transition: all 0.3s ease;
            text-decoration: none;
            color: inherit;
            display: block;
        }
        .test-card:hover {
            border-color: #0d9488;
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
        .test-card h3 {
            margin: 0 0 10px 0;
            color: #1e293b;
            font-size: 1.3rem;
        }
        .test-card p {
            margin: 0;
            color: #64748b;
            line-height: 1.6;
        }
        .test-icon {
            font-size: 2rem;
            margin-bottom: 15px;
            display: block;
        }
        .btn-primary {
            background: #0d9488;
            color: white;
            padding: 12px 24px;
            border-radius: 6px;
            text-decoration: none;
            display: inline-block;
            font-weight: 600;
            transition: background 0.3s ease;
        }
        .btn-primary:hover {
            background: #0f766e;
        }
        .btn-secondary {
            background: #64748b;
            color: white;
            padding: 12px 24px;
            border-radius: 6px;
            text-decoration: none;
            display: inline-block;
            font-weight: 600;
            margin-left: 10px;
            transition: background 0.3s ease;
        }
        .btn-secondary:hover {
            background: #475569;
        }
        .status-section {
            background: #f1f5f9;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 30px;
        }
        .status-section h3 {
            margin: 0 0 15px 0;
            color: #1e293b;
        }
        .status-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 8px 0;
            border-bottom: 1px solid #e2e8f0;
        }
        .status-item:last-child {
            border-bottom: none;
        }
        .status-good { color: #059669; font-weight: 600; }
        .status-warning { color: #d97706; font-weight: 600; }
        .status-error { color: #dc2626; font-weight: 600; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🧪 Test Suite</h1>
            <p>Automation Industry Website Testing Tools</p>
        </div>
        
        <div class="content">
            <div class="status-section">
                <h3>📊 Quick System Status</h3>
                <div class="status-item">
                    <span>PHP Version</span>
                    <span class="status-good"><?php echo phpversion(); ?></span>
                </div>
                <div class="status-item">
                    <span>Session Support</span>
                    <span class="<?php echo function_exists('session_start') ? 'status-good' : 'status-error'; ?>">
                        <?php echo function_exists('session_start') ? 'Available' : 'Not Available'; ?>
                    </span>
                </div>
                <div class="status-item">
                    <span>PDO MySQL</span>
                    <span class="<?php echo (class_exists('PDO') && in_array('mysql', PDO::getAvailableDrivers())) ? 'status-good' : 'status-error'; ?>">
                        <?php echo (class_exists('PDO') && in_array('mysql', PDO::getAvailableDrivers())) ? 'Available' : 'Not Available'; ?>
                    </span>
                </div>
                <div class="status-item">
                    <span>Database Connection</span>
                    <?php
                    try {
                        require_once '../config/database.php';
                        $db = new Database();
                        $conn = $db->getConnection();
                        if ($conn) {
                            echo '<span class="status-good">Connected</span>';
                        } else {
                            echo '<span class="status-error">Failed</span>';
                        }
                    } catch (Exception $e) {
                        echo '<span class="status-error">Error</span>';
                    }
                    ?>
                </div>
            </div>

            <h2>🔧 Available Test Tools</h2>
            
            <div class="test-grid">
                <a href="bluehost-compatibility.php" class="test-card">
                    <span class="test-icon">🌐</span>
                    <h3>BlueHost Compatibility</h3>
                    <p>Check compatibility with your BlueHost server. Analyzes PHP version, extensions, and server limits.</p>
                </a>

                <a href="database-debug.php" class="test-card">
                    <span class="test-icon">�</span>
                    <h3>Database Debug</h3>
                    <p>Check what's wrong with your database. Shows existing databases, tables, and row counts to identify issues.</p>
                </a>

                <a href="setup-database-v2.php" class="test-card">
                    <span class="test-icon">🗄️</span>
                    <h3>Database Setup (Improved)</h3>
                    <p>Reliable database creation with better error handling. Creates fresh database and all tables properly.</p>
                </a>

                <a href="setup-database.php" class="test-card">
                    <span class="test-icon">📄</span>
                    <h3>Database Setup (Original)</h3>
                    <p>Original database setup script that reads from schema.sql file. Use improved version if this fails.</p>
                </a>

                <a href="test.php" class="test-card">
                    <span class="test-icon">⚡</span>
                    <h3>Quick Test</h3>
                    <p>Fast system check covering PHP, config, database, sessions, and classes. Great for quick troubleshooting.</p>
                </a>

                <a href="diagnostic.php" class="test-card">
                    <span class="test-icon">🔍</span>
                    <h3>Full Diagnostics</h3>
                    <p>Comprehensive system analysis including file permissions, error logs, and detailed recommendations.</p>
                </a>

                <a href="index-test.php" class="test-card">
                    <span class="test-icon">🌐</span>
                    <h3>Minimal Website Test</h3>
                    <p>A simplified version of your website that bypasses complex dependencies to test basic functionality.</p>
                </a>
            </div>

            <h2>🚀 Quick Actions</h2>
            <div style="margin-bottom: 20px;">
                <a href="../index.php" class="btn-primary">Go to Main Website</a>
                <a href="../admin/" class="btn-secondary">Admin Panel</a>
            </div>

            <div style="background: #fef3c7; border: 1px solid #f59e0b; border-radius: 6px; padding: 15px; margin-top: 20px;">
                <h4 style="margin: 0 0 10px 0; color: #92400e;">💡 Testing Tips</h4>
                <ul style="margin: 0; color: #92400e;">
                    <li>Start with <strong>Database Setup</strong> if you're seeing database errors</li>
                    <li>Use <strong>Quick Test</strong> for routine checks</li>
                    <li>Run <strong>Full Diagnostics</strong> when you need detailed troubleshooting</li>
                    <li>Try <strong>Minimal Website Test</strong> to verify basic functionality</li>
                </ul>
            </div>

            <div style="background: #dbeafe; border: 1px solid #3b82f6; border-radius: 6px; padding: 15px; margin-top: 15px;">
                <h4 style="margin: 0 0 10px 0; color: #1d4ed8;">📝 Common Issues</h4>
                <ul style="margin: 0; color: #1d4ed8;">
                    <li><strong>Blank Page:</strong> Usually database connection or PHP errors</li>
                    <li><strong>CSS Not Loading:</strong> Check file paths and web server</li>
                    <li><strong>Database Errors:</strong> Run Database Setup first</li>
                    <li><strong>Permission Errors:</strong> Check file/folder permissions</li>
                </ul>
            </div>
        </div>
    </div>

    <script>
        // Add some interactivity
        document.addEventListener('DOMContentLoaded', function() {
            console.log('Test Suite loaded successfully');
            
            // Add click tracking for analytics
            document.querySelectorAll('.test-card').forEach(card => {
                card.addEventListener('click', function(e) {
                    console.log('Test clicked:', this.querySelector('h3').textContent);
                });
            });
        });
    </script>
</body>
</html>
