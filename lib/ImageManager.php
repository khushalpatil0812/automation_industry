<?php
/**
 * Image Configuration and Management
 * Central place to manage all website images
 */

class ImageManager {
    
    // Base path for images
    const BASE_PATH = 'public/';
    
    // Image categories and their paths
    const CATEGORIES = [
        'hero' => 'hero/',
        'services' => 'services/',
        'company' => 'company/',
        'projects' => 'projects/',
        'icons' => 'icons/',
        'uploads' => '../uploads/services/'
    ];
    
    /**
     * Get image URL with proper path
     * @param string $category
     * @param string $filename
     * @return string
     */
    public static function getImageUrl($category, $filename) {
        if (isset(self::CATEGORIES[$category])) {
            return self::BASE_PATH . self::CATEGORIES[$category] . $filename;
        }
        return self::BASE_PATH . $filename;
    }
    
    /**
     * Get all images in a category
     * @param string $category
     * @return array
     */
    public static function getImagesInCategory($category) {
        $path = __DIR__ . '/../' . self::BASE_PATH . self::CATEGORIES[$category];
        if (is_dir($path)) {
            $files = scandir($path);
            return array_filter($files, function($file) {
                return !in_array($file, ['.', '..']) && 
                       preg_match('/\.(jpg|jpeg|png|webp|svg)$/i', $file);
            });
        }
        return [];
    }
    
    /**
     * Check if image exists
     * @param string $category
     * @param string $filename
     * @return bool
     */
    public static function imageExists($category, $filename) {
        $path = __DIR__ . '/../' . self::BASE_PATH . self::CATEGORIES[$category] . $filename;
        return file_exists($path);
    }
    
    /**
     * Get optimized image tag
     * @param string $category
     * @param string $filename
     * @param string $alt
     * @param array $attributes
     * @return string
     */
    public static function getImageTag($category, $filename, $alt = '', $attributes = []) {
        $src = self::getImageUrl($category, $filename);
        $attrs = '';
        
        foreach ($attributes as $key => $value) {
            $attrs .= " {$key}=\"{$value}\"";
        }
        
        return "<img src=\"{$src}\" alt=\"{$alt}\"{$attrs}>";
    }
    
    /**
     * Predefined images for easy access
     */
    const IMAGES = [
        // Hero images
        'hero_main' => ['category' => 'hero', 'file' => 'automation-factory-main.jpg'],
        'hero_secondary' => ['category' => 'hero', 'file' => 'industrial-robotics.jpg'],
        
        // Service images
        'service_automation' => ['category' => 'services', 'file' => 'robotics-automation.jpg'],
        'service_iot' => ['category' => 'services', 'file' => 'iot-sensors.jpg'],
        'service_ai' => ['category' => 'services', 'file' => 'ai-analytics.jpg'],
        
        // Company images
        'company_team' => ['category' => 'company', 'file' => 'team-meeting.jpg'],
        'company_office' => ['category' => 'company', 'file' => 'office-building.jpg'],
        
        // Project images
        'project_factory' => ['category' => 'projects', 'file' => 'factory-automation.jpg'],
        'project_warehouse' => ['category' => 'projects', 'file' => 'warehouse-system.jpg'],
        
        // Icons and logos
        'logo_main' => ['category' => 'icons', 'file' => 'company-logo.png'],
        'icon_automation' => ['category' => 'icons', 'file' => 'automation-icon.svg'],
    ];
    
    /**
     * Get predefined image
     * @param string $key
     * @param string $alt
     * @param array $attributes
     * @return string
     */
    public static function getPredefinedImage($key, $alt = '', $attributes = []) {
        if (isset(self::IMAGES[$key])) {
            $image = self::IMAGES[$key];
            return self::getImageTag($image['category'], $image['file'], $alt, $attributes);
        }
        return '';
    }
}