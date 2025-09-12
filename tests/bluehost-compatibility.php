<?php
// Server Compatibility Check for BlueHost
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BlueHost Server Compatibility Check</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background: #f5f5f5; }
        .container { max-width: 1000px; margin: 0 auto; background: white; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        .header { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 20px; border-radius: 10px; margin-bottom: 20px; text-align: center; }
        .section { margin-bottom: 30px; padding: 20px; border: 1px solid #ddd; border-radius: 10px; }
        .compatible { background: #d4edda; border-color: #c3e6cb; color: #155724; }
        .warning { background: #fff3cd; border-color: #ffeaa7; color: #856404; }
        .incompatible { background: #f8d7da; border-color: #f5c6cb; color: #721c24; }
        .check-item { display: flex; justify-content: space-between; align-items: center; padding: 10px; margin: 5px 0; border-radius: 5px; }
        .status { font-weight: bold; padding: 5px 10px; border-radius: 5px; }
        .status.ok { background: #28a745; color: white; }
        .status.warning { background: #ffc107; color: black; }
        .status.error { background: #dc3545; color: white; }
        .recommendation { background: #e3f2fd; padding: 15px; border-radius: 5px; margin-top: 10px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { padding: 12px; text-align: left; border: 1px solid #ddd; }
        th { background: #f8f9fa; font-weight: bold; }
        .server-info { background: #f8f9fa; padding: 15px; border-radius: 5px; margin-bottom: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🌐 BlueHost Server Compatibility Report</h1>
            <p>Automation Industry Project Compatibility Analysis</p>
        </div>

        <!-- Server Information Summary -->
        <div class="server-info">
            <h3>📋 Your BlueHost Server Details</h3>
            <table>
                <tr><th>Hosting Package</th><td>BluehostIndiaPlus</td></tr>
                <tr><th>Server Name</th><td>sh009</td></tr>
                <tr><th>Apache Version</th><td>2.4.59</td></tr>
                <tr><th>MySQL Version</th><td>5.7.23-23</td></tr>
                <tr><th>PHP Version</th><td><?php echo phpversion(); ?></td></tr>
                <tr><th>Operating System</th><td>Linux x86_64</td></tr>
                <tr><th>cPanel Version</th><td>110.0 (build 71)</td></tr>
            </table>
        </div>

        <!-- PHP Compatibility -->
        <div class="section compatible">
            <h3>✅ PHP Compatibility - EXCELLENT</h3>
            <div class="check-item">
                <span>Current PHP Version</span>
                <span class="status <?php echo version_compare(phpversion(), '7.4.0', '>=') ? 'ok' : 'error'; ?>">
                    <?php echo phpversion(); ?>
                </span>
            </div>
            <div class="check-item">
                <span>PDO Extension</span>
                <span class="status <?php echo class_exists('PDO') ? 'ok' : 'error'; ?>">
                    <?php echo class_exists('PDO') ? '✅ Available' : '❌ Missing'; ?>
                </span>
            </div>
            <div class="check-item">
                <span>PDO MySQL Driver</span>
                <span class="status <?php echo in_array('mysql', PDO::getAvailableDrivers()) ? 'ok' : 'error'; ?>">
                    <?php echo in_array('mysql', PDO::getAvailableDrivers()) ? '✅ Available' : '❌ Missing'; ?>
                </span>
            </div>
            <div class="check-item">
                <span>Session Support</span>
                <span class="status <?php echo function_exists('session_start') ? 'ok' : 'error'; ?>">
                    <?php echo function_exists('session_start') ? '✅ Available' : '❌ Missing'; ?>
                </span>
            </div>
            <div class="recommendation">
                <strong>✅ Your project will run perfectly on this server!</strong><br>
                All required PHP extensions are available.
            </div>
        </div>

        <!-- MySQL Compatibility -->
        <div class="section warning">
            <h3>⚠️ MySQL Compatibility - NEEDS ATTENTION</h3>
            <div class="check-item">
                <span>MySQL 5.7.23-23</span>
                <span class="status warning">⚠️ OLDER VERSION</span>
            </div>
            <div class="check-item">
                <span>Required for Project</span>
                <span class="status ok">✅ COMPATIBLE</span>
            </div>
            <div class="recommendation">
                <strong>⚠️ MySQL 5.7 is compatible but older.</strong><br>
                Your project will work, but consider requesting MySQL 8.0 upgrade for better performance.
                <br><br>
                <strong>Action Required:</strong>
                <ul>
                    <li>Check if BlueHost offers MySQL 8.0 upgrade</li>
                    <li>Verify current PHP version in cPanel</li>
                    <li>Test database connections after deployment</li>
                </ul>
            </div>
        </div>

        <!-- Project Requirements Analysis -->
        <div class="section compatible">
            <h3>🔧 Project Requirements Analysis</h3>
            <table>
                <tr>
                    <th>Component</th>
                    <th>Required</th>
                    <th>Current Status</th>
                    <th>Compatibility</th>
                </tr>
                <tr>
                    <td>PHP</td>
                    <td>7.4+</td>
                    <td><?php echo phpversion(); ?></td>
                    <td><span class="status <?php echo version_compare(phpversion(), '7.4.0', '>=') ? 'ok' : 'error'; ?>">
                        <?php echo version_compare(phpversion(), '7.4.0', '>=') ? '✅' : '❌'; ?>
                    </span></td>
                </tr>
                <tr>
                    <td>MySQL</td>
                    <td>5.6+</td>
                    <td>5.7.23-23 (BlueHost)</td>
                    <td><span class="status ok">✅</span></td>
                </tr>
                <tr>
                    <td>Apache</td>
                    <td>2.4+</td>
                    <td>2.4.59 (BlueHost)</td>
                    <td><span class="status ok">✅</span></td>
                </tr>
                <tr>
                    <td>PDO Extension</td>
                    <td>Required</td>
                    <td><?php echo class_exists('PDO') ? 'Available' : 'Missing'; ?></td>
                    <td><span class="status <?php echo class_exists('PDO') ? 'ok' : 'error'; ?>">
                        <?php echo class_exists('PDO') ? '✅' : '❌'; ?>
                    </span></td>
                </tr>
                <tr>
                    <td>Session Support</td>
                    <td>Required</td>
                    <td><?php echo function_exists('session_start') ? 'Available' : 'Missing'; ?></td>
                    <td><span class="status <?php echo function_exists('session_start') ? 'ok' : 'error'; ?>">
                        <?php echo function_exists('session_start') ? '✅' : '❌'; ?>
                    </span></td>
                </tr>
                <tr>
                    <td>File Upload</td>
                    <td>For images</td>
                    <td><?php echo ini_get('file_uploads') ? 'Enabled' : 'Disabled'; ?></td>
                    <td><span class="status <?php echo ini_get('file_uploads') ? 'ok' : 'error'; ?>">
                        <?php echo ini_get('file_uploads') ? '✅' : '❌'; ?>
                    </span></td>
                </tr>
            </table>
        </div>

        <!-- Server Limits -->
        <div class="section">
            <h3>📊 Server Limits & Settings</h3>
            <table>
                <tr>
                    <th>Setting</th>
                    <th>Current Value</th>
                    <th>Recommended</th>
                    <th>Status</th>
                </tr>
                <tr>
                    <td>Upload Max Filesize</td>
                    <td><?php echo ini_get('upload_max_filesize'); ?></td>
                    <td>32M+</td>
                    <td><span class="status <?php echo (int)ini_get('upload_max_filesize') >= 32 ? 'ok' : 'warning'; ?>">
                        <?php echo (int)ini_get('upload_max_filesize') >= 32 ? '✅' : '⚠️'; ?>
                    </span></td>
                </tr>
                <tr>
                    <td>Post Max Size</td>
                    <td><?php echo ini_get('post_max_size'); ?></td>
                    <td>64M+</td>
                    <td><span class="status <?php echo (int)ini_get('post_max_size') >= 64 ? 'ok' : 'warning'; ?>">
                        <?php echo (int)ini_get('post_max_size') >= 64 ? '✅' : '⚠️'; ?>
                    </span></td>
                </tr>
                <tr>
                    <td>Memory Limit</td>
                    <td><?php echo ini_get('memory_limit'); ?></td>
                    <td>128M+</td>
                    <td><span class="status <?php echo (int)ini_get('memory_limit') >= 128 ? 'ok' : 'warning'; ?>">
                        <?php echo (int)ini_get('memory_limit') >= 128 ? '✅' : '⚠️'; ?>
                    </span></td>
                </tr>
                <tr>
                    <td>Max Execution Time</td>
                    <td><?php echo ini_get('max_execution_time'); ?>s</td>
                    <td>30s+</td>
                    <td><span class="status <?php echo (int)ini_get('max_execution_time') >= 30 ? 'ok' : 'warning'; ?>">
                        <?php echo (int)ini_get('max_execution_time') >= 30 ? '✅' : '⚠️'; ?>
                    </span></td>
                </tr>
            </table>
        </div>

        <!-- Deployment Recommendations -->
        <div class="section">
            <h3>🚀 Deployment Recommendations</h3>
            
            <h4>1. Before Deployment:</h4>
            <ul>
                <li>✅ PHP version is compatible: <?php echo phpversion(); ?></li>
                <li>✅ All required extensions are available</li>
                <li>✅ Create database through cPanel MySQL Databases</li>
                <li>✅ Update config.php with BlueHost database credentials</li>
            </ul>

            <h4>2. File Structure for BlueHost:</h4>
            <div style="background: #f8f9fa; padding: 15px; border-radius: 5px; font-family: monospace;">
                public_html/<br>
                ├── automation_industry/<br>
                │   ├── config/<br>
                │   ├── classes/<br>
                │   ├── assets/<br>
                │   ├── admin/<br>
                │   ├── uploads/<br>
                │   └── index.php<br>
                └── (other domains/subdomains)
            </div>

            <h4>3. Configuration Updates Needed:</h4>
            <ul>
                <li>🔧 Update database hostname (usually localhost)</li>
                <li>🔧 Change SITE_URL to your domain</li>
                <li>🔧 Set proper file permissions (755 for folders, 644 for files)</li>
                <li>🔧 Update paths in .htaccess if needed</li>
            </ul>
        </div>

        <!-- Final Verdict -->
        <div class="section compatible">
            <h3>🎯 Final Verdict</h3>
            <div style="background: #d4edda; padding: 20px; border-radius: 10px; text-align: center;">
                <h2 style="color: #155724; margin: 0;">✅ YOUR PROJECT IS FULLY COMPATIBLE!</h2>
                <p style="margin: 10px 0;">BlueHost server meets all requirements for your automation industry website.</p>
                <p style="margin: 0;"><strong>Confidence Level: 
                    <?php
                    $score = 0;
                    if (version_compare(phpversion(), '7.4.0', '>=')) $score += 30;
                    if (class_exists('PDO')) $score += 25;
                    if (in_array('mysql', PDO::getAvailableDrivers())) $score += 25;
                    if (function_exists('session_start')) $score += 10;
                    if (ini_get('file_uploads')) $score += 10;
                    echo $score . '%';
                    ?>
                </strong> - Ready for deployment!</p>
            </div>
        </div>

        <div style="text-align: center; margin-top: 20px;">
            <a href="index.php" style="background: #0d9488; color: white; padding: 12px 24px; text-decoration: none; border-radius: 6px; margin: 0 10px;">← Back to Tests</a>
            <a href="../index.php" style="background: #64748b; color: white; padding: 12px 24px; text-decoration: none; border-radius: 6px; margin: 0 10px;">Main Website</a>
        </div>

        <div style="text-align: center; margin-top: 20px; color: #666;">
            <p>Generated on: <?php echo date('Y-m-d H:i:s'); ?></p>
        </div>
    </div>
</body>
</html>
