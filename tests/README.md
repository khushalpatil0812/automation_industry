# Test Suite - Automation Industry Website

This folder contains all testing and diagnostic tools for the Automation Industry website. These tools help identify and resolve common issues during development and deployment.

## 📁 Files Overview

### Core Test Files
- **`index.php`** - Main test dashboard with system status and links to all tools
- **`test.php`** - Quick system test covering basic functionality
- **`diagnostic.php`** - Comprehensive system diagnostics with detailed analysis
- **`setup-database.php`** - Database creation and setup script
- **`index-test.php`** - Minimal working website example for comparison

## 🚀 How to Use

### 1. Access the Test Dashboard
Visit: `http://localhost/automation_industry/tests/`

### 2. Run Tests in Order
1. **Database Setup** (if you're getting database errors)
2. **Quick Test** (for routine checks)
3. **Full Diagnostics** (for detailed troubleshooting)
4. **Minimal Website Test** (to verify basic functionality)

## 🔧 Test Descriptions

### Database Setup (`setup-database.php`)
- Creates the `automation_industry` database
- Sets up all required tables (categories, services, admin_users)
- Inserts sample data
- Verifies database structure
- **Run this first** if you see "Unknown database" errors

### Quick Test (`test.php`)
- Tests PHP basic functionality
- Checks config file loading
- Verifies database connection
- Tests session functionality
- Checks class loading
- Tests header inclusion

### Full Diagnostics (`diagnostic.php`)
- Comprehensive PHP configuration check
- File system and permissions analysis
- Database structure verification
- Session diagnostics
- Class loading tests
- CSS/JS asset verification
- Error log analysis
- Detailed recommendations

### Minimal Website Test (`index-test.php`)
- Simplified version of the main website
- Uses inline CSS (no external dependencies)
- Tests basic PHP functionality
- Shows what a working page should look like
- Useful for comparison when main site fails

## 🎯 Common Issues & Solutions

### Blank Page Issue
- **Cause**: Usually database connection failure or PHP errors
- **Solution**: Run Database Setup, then Quick Test

### Database Connection Errors
- **Error**: "Unknown database 'automation_industry'"
- **Solution**: Run `setup-database.php`

### CSS Not Loading
- **Cause**: File path issues or web server problems
- **Solution**: Check file paths in diagnostics

### Class Loading Errors
- **Cause**: Missing files or incorrect paths
- **Solution**: Review file structure in diagnostics

## 📊 System Requirements

- PHP 7.4+ (8.0+ recommended)
- MySQL 5.7+ or MariaDB 10.2+
- PDO MySQL extension
- Session support
- File write permissions for uploads directory

## 🔍 Troubleshooting Tips

1. **Always start with Database Setup** if you see database errors
2. **Check XAMPP services** are running (Apache + MySQL)
3. **Review error logs** shown in Full Diagnostics
4. **Compare with Minimal Website Test** to isolate issues
5. **Check file permissions** for uploads and cache directories

## 📝 Notes

- All test files use relative paths (`../`) to access main website files
- Tests are non-destructive and safe to run multiple times
- Database setup can be run multiple times (it won't duplicate data)
- Tests provide color-coded results: ✅ Pass, ⚠️ Warning, ❌ Fail

## 🆘 Getting Help

If tests show issues you can't resolve:

1. Run Full Diagnostics and check recommendations
2. Review the error logs section
3. Ensure all system requirements are met
4. Check XAMPP configuration
5. Verify file permissions

Remember: The goal is to get all tests showing ✅ (green checkmarks) for optimal website performance.
