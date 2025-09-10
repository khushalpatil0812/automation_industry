-- Seed initial services data
-- This script populates the services table with sample data

INSERT INTO services (title, category, description, image) VALUES
('Custom Web Development', 'Web Development', 'Build responsive, modern websites tailored to your business needs with cutting-edge technologies and best practices.', '/modern-web-development.png'),
('Mobile App Development', 'Mobile Development', 'Create native and cross-platform mobile applications that engage users and drive business growth.', '/mobile-app-development.png'),
('Digital Marketing Strategy', 'Digital Marketing', 'Comprehensive digital marketing solutions to boost your online presence and reach your target audience effectively.', '/digital-marketing-dashboard.png'),
('E-commerce Solutions', 'Web Development', 'Complete e-commerce platforms with secure payment processing, inventory management, and customer analytics.', '/placeholder.svg?height=300&width=400'),
('SEO Optimization', 'Digital Marketing', 'Improve your search engine rankings and organic traffic with data-driven SEO strategies and implementation.', '/placeholder.svg?height=300&width=400'),
('Cloud Infrastructure', 'Cloud Services', 'Scalable cloud solutions for hosting, storage, and application deployment with enterprise-grade security.', '/placeholder.svg?height=300&width=400'),
('iOS App Development', 'Mobile Development', 'Native iOS applications built with Swift, optimized for performance and App Store guidelines.', '/placeholder.svg?height=300&width=400'),
('Brand Identity Design', 'Design', 'Complete brand identity packages including logos, color schemes, typography, and brand guidelines.', '/placeholder.svg?height=300&width=400'),
('Database Design', 'Cloud Services', 'Efficient database architecture and optimization for high-performance applications and data analytics.', '/placeholder.svg?height=300&width=400'),
('Social Media Management', 'Digital Marketing', 'Strategic social media campaigns and content management to build brand awareness and engagement.', '/placeholder.svg?height=300&width=400');

-- Update the updated_at timestamp trigger (PostgreSQL specific)
CREATE OR REPLACE FUNCTION update_updated_at_column()
RETURNS TRIGGER AS $$
BEGIN
    NEW.updated_at = CURRENT_TIMESTAMP;
    RETURN NEW;
END;
$$ language 'plpgsql';

CREATE TRIGGER update_services_updated_at 
    BEFORE UPDATE ON services 
    FOR EACH ROW 
    EXECUTE FUNCTION update_updated_at_column();
