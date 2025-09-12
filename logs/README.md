# Logs Directory

This directory stores error logs and other application logs.

## Files in this directory:
- `error.log` - PHP error log (created automatically)
- `access.log` - Custom access log (if implemented)
- `debug.log` - Debug information (development only)

## Security Note:
This directory should be protected from web access in production.
The included .htaccess file denies web access to all files here.

## Log Rotation:
Consider implementing log rotation for production environments to prevent large log files.
