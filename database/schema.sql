-- Combined schema and seed data for automation_industry
-- ------------------------------------------------------

-- Create database
CREATE DATABASE IF NOT EXISTS automation_industry;
USE automation_industry;

-- Table: categories
CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) UNIQUE NOT NULL,
    description TEXT,
    icon VARCHAR(50),
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX idx_name (name)
);

-- Table: services
CREATE TABLE services (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    category_id INT,
    description TEXT NOT NULL,
    image VARCHAR(500),
    features TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX idx_category_id (category_id),
    INDEX idx_created_at (created_at),
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE SET NULL
);

-- Table: admin_users
CREATE TABLE admin_users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100),
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    last_login TIMESTAMP NULL
);

-- Seed data for categories
INSERT INTO categories (name, description, icon) VALUES
('Web Development', 'Custom websites and web applications', 'code'),
('Mobile Apps', 'iOS and Android mobile applications', 'smartphone'),
('Digital Marketing', 'SEO, social media, and online marketing', 'trending-up'),
('Consulting', 'Business and technology consulting services', 'users'),
('E-commerce', 'Online stores and payment solutions', 'shopping-cart'),
('Cloud Services', 'Cloud hosting and infrastructure', 'cloud');

-- Seed data for services
INSERT INTO services (title, category_id, description, image) VALUES
('Custom Web Development', 1, 'Build responsive, modern websites tailored to your business needs with cutting-edge technologies and best practices.', '/modern-web-development.png'),
('E-commerce Solutions', 1, 'Complete online store development with payment integration, inventory management, and customer analytics.', '/placeholder.svg?height=300&width=400'),
('Mobile App Development', 2, 'Native and cross-platform mobile applications for iOS and Android with seamless user experiences.', '/mobile-app-development.png'),
('Progressive Web Apps', 2, 'Fast, reliable web applications that work offline and provide native app-like experiences.', '/placeholder.svg?height=300&width=400'),
('SEO Optimization', 3, 'Improve your search engine rankings and drive organic traffic with comprehensive SEO strategies.', '/digital-marketing-dashboard.png'),
('Social Media Marketing', 3, 'Engage your audience and build brand awareness through strategic social media campaigns.', '/placeholder.svg?height=300&width=400'),
('Business Strategy Consulting', 4, 'Strategic planning and business analysis to help you make informed decisions and achieve growth.', '/placeholder.svg?height=300&width=400'),
('Digital Transformation', 4, 'Guide your business through digital transformation with technology adoption and process optimization.', '/placeholder.svg?height=300&width=400'),
('Cloud Infrastructure', 6, 'Scalable cloud solutions for hosting, storage, and application deployment with enterprise-grade security.', '/placeholder.svg?height=300&width=400'),
('Database Design', 6, 'Efficient database architecture and optimization for high-performance applications and data analytics.', '/placeholder.svg?height=300&width=400'),
('Brand Identity Design', NULL, 'Complete brand identity packages including logos, color schemes, typography, and brand guidelines.', '/placeholder.svg?height=300&width=400'),
('Social Media Management', 3, 'Strategic social media campaigns and content management to build brand awareness and engagement.', '/placeholder.svg?height=300&width=400');

-- Insert default admin user (password: admin123)
INSERT INTO admin_users (username, password, email) VALUES 
('admin', 'kunal', 'admin@automation-industry.com');

-- End of schema and seed data
