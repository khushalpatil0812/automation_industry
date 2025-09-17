<?php
require_once 'config/config.php';
require_once 'classes/Service.php';
$page_title = 'Home - Automation Industry Solutions';
include 'includes/header.php';
?>

<style>
/* Global Reset and Body Adjustments */
body {
    margin: 0 !important;
    padding: 0 !important;
}

main {
    margin: 0;
    padding: 0;
}

section {
    margin: 0;
    padding: 0;
}

/* Hero Section Styles */
.hero-carousel {
    position: relative;
    height: 100vh;
    overflow: hidden;
    margin-top: calc(-1 * var(--navbar-height, 80px)); /* Use CSS variable for consistent spacing */
    padding-top: var(--navbar-height, 80px); /* Add padding to account for fixed navbar */
}

.carousel-item {
    height: 100vh;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    position: relative;
}

.carousel-item::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(0, 0, 0, 0.6) 0%, rgba(31, 41, 55, 0.7) 100%);
    z-index: 1;
}

.carousel-item.slide-1 {
    background-image: url('public/hero/Header_background.jpg');
}

.carousel-item.slide-2 {
    background-image: url('public/hero/industrial-automation-hero.jpg');
}

.carousel-item.slide-3 {
    background-image: url('public/hero/Industry 4.0.jpg');
}

.hero-content {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    color: white;
    z-index: 2;
    max-width: 800px;
    padding: 0 20px;
}

.hero-badge {
    display: inline-block;
    background: linear-gradient(135deg, #f59e0b, #d97706);
    color: white;
    padding: 8px 20px;
    border-radius: 25px;
    font-size: 0.9rem;
    font-weight: 600;
    margin-bottom: 20px;
    box-shadow: 0 4px 15px rgba(245, 158, 11, 0.3);
}

.hero-title {
    font-size: 3.5rem;
    font-weight: 700;
    margin-bottom: 20px;
    line-height: 1.2;
}

.gradient-text {
    background: linear-gradient(135deg, #f59e0b, #fbbf24);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.hero-subtitle {
    font-size: 1.2rem;
    margin-bottom: 30px;
    color: rgba(255, 255, 255, 0.9);
    line-height: 1.6;
}

.hero-cta-buttons {
    display: flex;
    gap: 20px;
    justify-content: center;
    flex-wrap: wrap;
}

.btn-hero-primary {
    background: linear-gradient(135deg, #f59e0b, #d97706);
    color: white;
    padding: 12px 30px;
    border: none;
    border-radius: 8px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.btn-hero-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(245, 158, 11, 0.4);
    color: white;
}

.btn-hero-outline {
    background: transparent;
    color: white;
    padding: 12px 30px;
    border: 2px solid rgba(255, 255, 255, 0.3);
    border-radius: 8px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
}

.btn-hero-outline:hover {
    background: rgba(255, 255, 255, 0.1);
    border-color: rgba(255, 255, 255, 0.6);
    transform: translateY(-2px);
    color: white;
}

/* Custom Carousel Controls */
.carousel-control-prev,
.carousel-control-next {
    width: 60px;
    height: 60px;
    background: rgba(0, 0, 0, 0.5);
    border-radius: 50%;
    top: 50%;
    transform: translateY(-50%);
    transition: all 0.3s ease;
    z-index: 3;
}

.carousel-control-prev {
    left: 30px;
}

.carousel-control-next {
    right: 30px;
}

.carousel-control-prev:hover,
.carousel-control-next:hover {
    background: rgba(245, 158, 11, 0.8);
}

.carousel-control-prev-icon,
.carousel-control-next-icon {
    width: 20px;
    height: 20px;
}

/* Carousel Indicators */
.carousel-indicators {
    bottom: 30px;
    z-index: 3;
}

.carousel-indicators [data-bs-target] {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background-color: rgba(255, 255, 255, 0.5);
    border: none;
    margin: 0 5px;
    transition: all 0.3s ease;
}

.carousel-indicators .active {
    background-color: #f59e0b;
    transform: scale(1.2);
}

/* Responsive Design */
@media (max-width: 768px) {
    .hero-title {
        font-size: 2.5rem;
    }
    
    .hero-subtitle {
        font-size: 1rem;
    }
    
    .hero-cta-buttons {
        flex-direction: column;
        align-items: center;
    }
    
    .carousel-control-prev,
    .carousel-control-next {
        width: 50px;
        height: 50px;
    }
    
    .carousel-control-prev {
        left: 15px;
    }
    
    .carousel-control-next {
        right: 15px;
    }
}
</style>

<style>
/* Third Section - Enhanced Features Section */
.features {
    padding: 80px 0;
    background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #334155 100%);
    position: relative;
    overflow: hidden;
}

.features::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="hexagon" width="50" height="43.4" patternUnits="userSpaceOnUse" patternTransform="scale(0.8)"><polygon points="25,0 43.4,12.5 43.4,37.5 25,50 6.6,37.5 6.6,12.5" fill="none" stroke="%23475569" stroke-width="0.5" opacity="0.3"/></pattern></defs><rect width="100" height="100" fill="url(%23hexagon)"/></svg>');
    opacity: 0.4;
    z-index: 1;
}

.features .container {
    position: relative;
    z-index: 2;
}

.section-header {
    text-align: center;
    margin-bottom: 60px;
}

.section-badge {
    display: inline-block;
    background: linear-gradient(135deg, #f59e0b, #d97706);
    color: white;
    padding: 8px 20px;
    border-radius: 25px;
    font-size: 0.9rem;
    font-weight: 600;
    margin-bottom: 15px;
    box-shadow: 0 4px 15px rgba(245, 158, 11, 0.3);
}

.section-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: white;
    margin-bottom: 15px;
    line-height: 1.2;
}

.section-subtitle {
    font-size: 1.1rem;
    color: rgba(255, 255, 255, 0.8);
    max-width: 600px;
    margin: 0 auto;
    line-height: 1.6;
}

.features-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 30px;
    margin-top: 40px;
}

.feature-card {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    padding: 40px 30px;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.feature-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(135deg, #f59e0b, #d97706);
    transform: scaleX(0);
    transition: transform 0.3s ease;
}

.feature-card:hover::before {
    transform: scaleX(1);
}

.feature-card:hover {
    transform: translateY(-10px);
    background: rgba(255, 255, 255, 0.15);
    border-color: rgba(245, 158, 11, 0.5);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
}

.feature-icon-wrapper {
    position: relative;
    width: 80px;
    height: 80px;
    margin: 0 auto 25px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.feature-icon {
    font-size: 2.5rem;
    background: linear-gradient(135deg, #f59e0b, #d97706);
    color: white;
    width: 80px;
    height: 80px;
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    z-index: 2;
    transition: all 0.3s ease;
}

.feature-glow {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 100px;
    height: 100px;
    background: radial-gradient(circle, rgba(245, 158, 11, 0.3) 0%, transparent 70%);
    border-radius: 50%;
    opacity: 0;
    transition: opacity 0.3s ease;
    z-index: 1;
}

.feature-card:hover .feature-glow {
    opacity: 1;
}

.feature-card:hover .feature-icon {
    transform: scale(1.1) rotate(5deg);
    box-shadow: 0 8px 25px rgba(245, 158, 11, 0.4);
}

.feature-card h3 {
    font-size: 1.4rem;
    font-weight: 600;
    color: white;
    margin-bottom: 15px;
    text-align: center;
}

.feature-card p {
    font-size: 1rem;
    color: rgba(255, 255, 255, 0.8);
    line-height: 1.6;
    margin-bottom: 20px;
    text-align: center;
}

.feature-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.feature-list li {
    font-size: 0.9rem;
    color: rgba(255, 255, 255, 0.7);
    margin-bottom: 8px;
    padding-left: 25px;
    position: relative;
}

.feature-list li::before {
    content: '✓';
    position: absolute;
    left: 0;
    color: #f59e0b;
    font-weight: bold;
}

.feature-action {
    margin-top: 25px;
    text-align: center;
}

.feature-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: linear-gradient(135deg, #f59e0b, #d97706);
    color: white;
    padding: 12px 24px;
    border-radius: 8px;
    text-decoration: none;
    font-weight: 600;
    font-size: 0.9rem;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(245, 158, 11, 0.3);
}

.feature-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(245, 158, 11, 0.4);
    color: white;
}

.feature-btn i {
    transition: transform 0.3s ease;
}

.feature-btn:hover i {
    transform: translateX(3px);
}

/* Responsive Design */
@media (max-width: 768px) {
    .features {
        padding: 60px 0;
    }
    
    .section-title {
        font-size: 2rem;
    }
    
    .features-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    
    .feature-card {
        padding: 30px 20px;
    }
    
    .feature-icon-wrapper {
        width: 70px;
        height: 70px;
    }
    
    .feature-icon {
        width: 70px;
        height: 70px;
        font-size: 2rem;
    }
}
</style>

<style>
/* Second Section - Enhanced Metrics Section */
.metrics-section {
    padding: 80px 0;
    background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #334155 100%);
    position: relative;
    overflow: hidden;
}

.metrics-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="dots" width="20" height="20" patternUnits="userSpaceOnUse"><circle cx="10" cy="10" r="1.5" fill="%23374151" opacity="0.4"/></pattern></defs><rect width="100" height="100" fill="url(%23dots)"/></svg>');
    z-index: 1;
}

.metrics-section .container {
    position: relative;
    z-index: 2;
}

.metrics-wrapper {
    text-align: center;
    margin-bottom: 20px;
}

.metrics-wrapper h2 {
    color: white;
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 15px;
}

.metrics-wrapper p {
    color: rgba(255, 255, 255, 0.8);
    font-size: 1.1rem;
    max-width: 600px;
    margin: 0 auto 50px;
}

.metrics-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 30px;
    margin-top: 40px;
}

.metric-card {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 20px;
    padding: 40px 20px;
    text-align: center;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.metric-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(245, 158, 11, 0.1), transparent);
    transition: left 0.8s ease;
}

.metric-card:hover::before {
    left: 100%;
}

.metric-card:hover {
    transform: translateY(-10px);
    background: rgba(255, 255, 255, 0.15);
    border-color: rgba(245, 158, 11, 0.5);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
}

.metric-icon {
    margin-bottom: 20px;
    position: relative;
}

.icon-bg {
    display: inline-block;
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, #f59e0b, #d97706);
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2.5rem;
    box-shadow: 0 10px 30px rgba(245, 158, 11, 0.3);
    transition: all 0.3s ease;
    position: relative;
    z-index: 2;
}

.metric-card:hover .icon-bg {
    transform: scale(1.1) rotate(5deg);
    box-shadow: 0 15px 40px rgba(245, 158, 11, 0.5);
}

.metric-content {
    margin-bottom: 15px;
    display: flex;
    align-items: baseline;
    justify-content: center;
    gap: 5px;
}

.metric-number {
    font-size: 3rem;
    font-weight: 700;
    color: white;
    line-height: 1;
    transition: color 0.3s ease;
}

.metric-suffix {
    font-size: 2rem;
    font-weight: 600;
    color: #f59e0b;
    line-height: 1;
}

.metric-card:hover .metric-number {
    color: #f59e0b;
}

.metric-label {
    font-size: 1.2rem;
    font-weight: 600;
    color: white;
    margin-bottom: 8px;
    transition: color 0.3s ease;
}

.metric-description {
    font-size: 0.9rem;
    color: rgba(255, 255, 255, 0.7);
    font-weight: 400;
}

.metric-card:hover .metric-label {
    color: #fbbf24;
}

/* Counter Animation */
@keyframes countUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.metric-number.counting {
    animation: countUp 0.6s ease-out;
}

/* Pulse Effect for Icons */
@keyframes pulse {
    0% {
        box-shadow: 0 0 0 0 rgba(245, 158, 11, 0.7);
    }
    70% {
        box-shadow: 0 0 0 20px rgba(245, 158, 11, 0);
    }
    100% {
        box-shadow: 0 0 0 0 rgba(245, 158, 11, 0);
    }
}

.metric-card.animate-pulse .icon-bg {
    animation: pulse 2s infinite;
}

/* Responsive Design */
@media (max-width: 768px) {
    .metrics-section {
        padding: 60px 0;
    }
    
    .metrics-wrapper h2 {
        font-size: 2rem;
    }
    
    .metrics-grid {
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
    }
    
    .metric-card {
        padding: 30px 15px;
    }
    
    .icon-bg {
        width: 70px;
        height: 70px;
        font-size: 2rem;
    }
    
    .metric-number {
        font-size: 2.5rem;
    }
    
    .metric-suffix {
        font-size: 1.5rem;
    }
}

@media (max-width: 480px) {
    .metrics-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .metric-card {
        padding: 25px 10px;
    }
    
    .metric-number {
        font-size: 2rem;
    }
    
    .metric-label {
        font-size: 1rem;
    }
}
</style>

<style>
/* Fourth Section - Professional Services Preview */
.services-preview {
    padding: 80px 0;
    background: linear-gradient(135deg, #1e293b 0%, #334155 50%, #475569 100%);
    position: relative;
    overflow: hidden;
}

.services-preview::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="circuit" width="40" height="40" patternUnits="userSpaceOnUse"><circle cx="20" cy="20" r="2" fill="%23475569" opacity="0.4"/><line x1="20" y1="0" x2="20" y2="40" stroke="%23475569" stroke-width="0.5" opacity="0.3"/><line x1="0" y1="20" x2="40" y2="20" stroke="%23475569" stroke-width="0.5" opacity="0.3"/></pattern></defs><rect width="100" height="100" fill="url(%23circuit)"/></svg>');
    z-index: 1;
}

.services-preview .container {
    position: relative;
    z-index: 2;
}

.services-preview .section-title {
    color: white;
}

.services-preview .section-subtitle {
    color: rgba(255, 255, 255, 0.8);
}

.services-preview-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 30px;
    margin-top: 50px;
}

.service-preview-card {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    transition: all 0.4s ease;
    position: relative;
}

.service-preview-card:hover {
    transform: translateY(-15px);
    background: rgba(255, 255, 255, 0.15);
    border-color: rgba(245, 158, 11, 0.5);
    box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3);
}

.service-image {
    position: relative;
    height: 250px;
    overflow: hidden;
}

.service-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s ease;
}

.service-preview-card:hover .service-image img {
    transform: scale(1.1);
}

.service-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(245, 158, 11, 0.8) 0%, rgba(217, 119, 6, 0.9) 100%);
    opacity: 0;
    transition: opacity 0.4s ease;
    display: flex;
    align-items: center;
    justify-content: center;
}

.service-preview-card:hover .service-overlay {
    opacity: 1;
}

.service-overlay::after {
    content: 'View Details';
    color: white;
    font-size: 1.1rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.service-content {
    padding: 30px;
    position: relative;
}

.service-icon {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, #f59e0b, #d97706);
    border-radius: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.8rem;
    margin-bottom: 20px;
    box-shadow: 0 8px 20px rgba(245, 158, 11, 0.3);
    transition: all 0.3s ease;
}

.service-preview-card:hover .service-icon {
    transform: scale(1.1) rotate(5deg);
    box-shadow: 0 12px 25px rgba(245, 158, 11, 0.4);
}

.service-content h3 {
    font-size: 1.5rem;
    font-weight: 700;
    color: white;
    margin-bottom: 15px;
    line-height: 1.3;
}

.service-content p {
    font-size: 1rem;
    color: rgba(255, 255, 255, 0.8);
    line-height: 1.6;
    margin-bottom: 20px;
}

.service-features {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    margin-bottom: 25px;
}

.feature-tag {
    background: rgba(255, 255, 255, 0.1);
    color: rgba(255, 255, 255, 0.9);
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 500;
    border: 1px solid rgba(255, 255, 255, 0.2);
    transition: all 0.3s ease;
}

.service-preview-card:hover .feature-tag {
    background: rgba(245, 158, 11, 0.2);
    color: #fbbf24;
    border-color: rgba(245, 158, 11, 0.5);
    transform: translateY(-2px);
}

.service-link {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    color: #fbbf24;
    font-weight: 600;
    text-decoration: none;
    font-size: 1rem;
    transition: all 0.3s ease;
    position: relative;
}

.service-link::before {
    content: '';
    position: absolute;
    bottom: -2px;
    left: 0;
    width: 0;
    height: 2px;
    background: linear-gradient(135deg, #fbbf24, #f59e0b);
    transition: width 0.3s ease;
}

.service-link:hover::before {
    width: 100%;
}

.service-link:hover {
    color: #f59e0b;
    transform: translateX(5px);
}

.arrow {
    transition: transform 0.3s ease;
    font-size: 1.2rem;
}

.service-link:hover .arrow {
    transform: translateX(5px);
}

/* Professional Badge Overlay */
.service-preview-card::before {
    content: '';
    position: absolute;
    top: 20px;
    right: 20px;
    width: 0;
    height: 0;
    border-left: 15px solid transparent;
    border-right: 15px solid transparent;
    border-top: 15px solid #f59e0b;
    z-index: 10;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.service-preview-card:hover::before {
    opacity: 1;
}

/* Responsive Design */
@media (max-width: 768px) {
    .services-preview {
        padding: 60px 0;
    }
    
    .services-preview-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    
    .service-preview-card {
        margin: 0 10px;
    }
    
    .service-image {
        height: 200px;
    }
    
    .service-content {
        padding: 25px 20px;
    }
    
    .service-content h3 {
        font-size: 1.3rem;
    }
    
    .service-icon {
        width: 50px;
        height: 50px;
        font-size: 1.5rem;
    }
}

@media (max-width: 480px) {
    .service-features {
        justify-content: center;
    }
    
    .feature-tag {
        font-size: 0.75rem;
        padding: 4px 8px;
    }
    
    .service-content {
        padding: 20px 15px;
    }
}
</style>

<style>
/* Fifth Section - Enhanced Professional CTA Section */
.cta {
    padding: 100px 0;
    background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #334155 100%);
    position: relative;
    overflow: hidden;
}

.cta::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200"><defs><pattern id="automation" width="60" height="60" patternUnits="userSpaceOnUse"><g fill="none" stroke="%23475569" stroke-width="0.8" opacity="0.3"><circle cx="30" cy="30" r="8"/><circle cx="30" cy="30" r="15"/><line x1="30" y1="0" x2="30" y2="60"/><line x1="0" y1="30" x2="60" y2="30"/><circle cx="10" cy="10" r="2" fill="%23475569"/><circle cx="50" cy="10" r="2" fill="%23475569"/><circle cx="10" cy="50" r="2" fill="%23475569"/><circle cx="50" cy="50" r="2" fill="%23475569"/></g></pattern></defs><rect width="200" height="200" fill="url(%23automation)"/></svg>');
    opacity: 0.4;
    z-index: 1;
}

.cta::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: radial-gradient(circle at 20% 80%, rgba(245, 158, 11, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(245, 158, 11, 0.08) 0%, transparent 50%);
    z-index: 2;
}

.cta .container {
    position: relative;
    z-index: 3;
}

.cta-content {
    text-align: center;
    max-width: 800px;
    margin: 0 auto;
    background: rgba(255, 255, 255, 0.05);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 30px;
    padding: 60px 40px;
    position: relative;
    overflow: hidden;
}

.cta-content::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: linear-gradient(135deg, #f59e0b, #d97706, #fbbf24);
    z-index: 1;
}

.cta-badge {
    display: inline-block;
    background: linear-gradient(135deg, #f59e0b, #d97706);
    color: white;
    padding: 10px 25px;
    border-radius: 30px;
    font-size: 1rem;
    font-weight: 600;
    margin-bottom: 25px;
    box-shadow: 0 8px 25px rgba(245, 158, 11, 0.4);
    position: relative;
    z-index: 2;
}

.cta h2 {
    font-size: 3rem;
    font-weight: 700;
    color: white;
    margin-bottom: 20px;
    line-height: 1.2;
    background: linear-gradient(135deg, #ffffff, #f8fafc);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.cta p {
    font-size: 1.2rem;
    color: rgba(255, 255, 255, 0.8);
    line-height: 1.6;
    margin-bottom: 40px;
    max-width: 600px;
    margin-left: auto;
    margin-right: auto;
}

.cta-buttons {
    display: flex;
    gap: 20px;
    justify-content: center;
    margin-bottom: 50px;
    flex-wrap: wrap;
}

.btn {
    padding: 15px 35px;
    border-radius: 12px;
    font-weight: 600;
    font-size: 1.1rem;
    text-decoration: none;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
    border: none;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    gap: 8px;
}

.btn.btn-primary {
    background: linear-gradient(135deg, #f59e0b, #d97706);
    color: white;
    box-shadow: 0 8px 25px rgba(245, 158, 11, 0.4);
}

.btn.btn-primary:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 35px rgba(245, 158, 11, 0.5);
    background: linear-gradient(135deg, #d97706, #b45309);
}

.btn.btn-outline {
    background: transparent;
    color: white;
    border: 2px solid rgba(255, 255, 255, 0.3);
}

.btn.btn-outline:hover {
    background: rgba(255, 255, 255, 0.1);
    border-color: rgba(245, 158, 11, 0.8);
    transform: translateY(-3px);
    color: #fbbf24;
}

.animated-btn {
    position: relative;
    overflow: hidden;
}

.btn-glow {
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.6s ease;
}

.animated-btn:hover .btn-glow {
    left: 100%;
}

.cta-stats {
    display: flex;
    justify-content: center;
    gap: 60px;
    margin-top: 30px;
    flex-wrap: wrap;
}

.cta-stat {
    text-align: center;
    position: relative;
}

.cta-stat::after {
    content: '';
    position: absolute;
    top: 50%;
    right: -30px;
    transform: translateY(-50%);
    width: 1px;
    height: 40px;
    background: rgba(255, 255, 255, 0.2);
}

.cta-stat:last-child::after {
    display: none;
}

.stat-number {
    display: block;
    font-size: 2rem;
    font-weight: 700;
    color: #f59e0b;
    line-height: 1;
    margin-bottom: 5px;
}

.stat-text {
    font-size: 0.9rem;
    color: rgba(255, 255, 255, 0.7);
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 1px;
}

/* Floating elements animation */
@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-10px); }
}

.cta-badge {
    animation: float 3s ease-in-out infinite;
}

/* Responsive Design */
@media (max-width: 768px) {
    .cta {
        padding: 80px 0;
    }
    
    .cta-content {
        padding: 40px 25px;
        margin: 0 15px;
    }
    
    .cta h2 {
        font-size: 2.5rem;
    }
    
    .cta p {
        font-size: 1.1rem;
    }
    
    .cta-buttons {
        flex-direction: column;
        align-items: center;
        gap: 15px;
    }
    
    .btn {
        padding: 12px 25px;
        font-size: 1rem;
        width: 100%;
        max-width: 280px;
        justify-content: center;
    }
    
    .cta-stats {
        gap: 40px;
    }
    
    .stat-number {
        font-size: 1.5rem;
    }
}

@media (max-width: 480px) {
    .cta-stats {
        flex-direction: column;
        gap: 25px;
    }
    
    .cta-stat::after {
        display: none;
    }
    
    .cta h2 {
        font-size: 2rem;
    }
    
    .cta-content {
        padding: 30px 20px;
    }
}
</style>

<main id="main-content">
    <!-- Hero Carousel Section -->
    <section id="heroCarousel" class="carousel slide hero-carousel" data-bs-ride="carousel" data-bs-interval="5000">
        <!-- Carousel Indicators -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        
        <!-- Carousel Content -->
        <div class="carousel-inner">
            <!-- Slide 1 -->
            <div class="carousel-item active slide-1">
                <div class="hero-content">
                    <div class="hero-badge">Industry 4.0 Solutions</div>
                    <h1 class="hero-title">
                        <span class="gradient-text">Transform Manufacturing</span>
                        <br>with Smart Automation
                    </h1>
                    <p class="hero-subtitle">Revolutionize your production with cutting-edge robotics, IoT integration, and AI-powered solutions designed for the future of manufacturing.</p>
                    
                    <div class="hero-cta-buttons">
                        <a href="contact.php" class="btn-hero-primary">
                            <i class="fas fa-rocket me-2"></i>Get Started Today
                        </a>
                        <a href="services.php" class="btn-hero-outline">
                            <i class="fas fa-tools me-2"></i>Explore Services
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Slide 2 -->
            <div class="carousel-item slide-2">
                <div class="hero-content">
                    <div class="hero-badge">Industrial Excellence</div>
                    <h1 class="hero-title">
                        <span class="gradient-text">Advanced Robotics</span>
                        <br>& Process Control
                    </h1>
                    <p class="hero-subtitle">Enhance productivity and precision with state-of-the-art robotic systems and intelligent process control technologies.</p>
                    
                    <div class="hero-cta-buttons">
                        <a href="contact.php" class="btn-hero-primary">
                            <i class="fas fa-cogs me-2"></i>Learn More
                        </a>
                        <a href="services.php" class="btn-hero-outline">
                            <i class="fas fa-eye me-2"></i>View Solutions
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Slide 3 -->
            <div class="carousel-item slide-3">
                <div class="hero-content">
                    <div class="hero-badge">Next-Gen Technology</div>
                    <h1 class="hero-title">
                        <span class="gradient-text">IoT Integration</span>
                        <br>& Smart Analytics
                    </h1>
                    <p class="hero-subtitle">Connect your operations with intelligent IoT solutions and real-time analytics for optimized performance and predictive maintenance.</p>
                    
                    <div class="hero-cta-buttons">
                        <a href="contact.php" class="btn-hero-primary">
                            <i class="fas fa-chart-line me-2"></i>Discover IoT
                        </a>
                        <a href="services.php" class="btn-hero-outline">
                            <i class="fas fa-network-wired me-2"></i>Our Technology
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Carousel Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </section>

    <!-- Enhanced Metrics Section -->
    <section class="metrics-section">
        <div class="container">
            <div class="metrics-wrapper">
                <h2 data-aos="fade-up">Proven Track Record</h2>
                <p data-aos="fade-up" data-aos-delay="100">Our commitment to excellence is reflected in the numbers that matter most to our clients</p>
                
                <div class="metrics-grid">
                    <div class="metric-card modern" data-aos="fade-up" data-aos-delay="200">
                        <div class="metric-icon">
                            <span class="icon-bg">🏭</span>
                        </div>
                        <div class="metric-content">
                            <div class="metric-number" data-target="500">0</div>
                            <div class="metric-suffix">+</div>
                        </div>
                        <div class="metric-label">Automated Systems</div>
                        <div class="metric-description">Successfully deployed worldwide</div>
                    </div>
                    
                    <div class="metric-card modern" data-aos="fade-up" data-aos-delay="300">
                        <div class="metric-icon">
                            <span class="icon-bg">📈</span>
                        </div>
                        <div class="metric-content">
                            <div class="metric-number" data-target="98">0</div>
                            <div class="metric-suffix">%</div>
                        </div>
                        <div class="metric-label">Efficiency Increase</div>
                        <div class="metric-description">Average productivity improvement</div>
                    </div>
                    
                    <div class="metric-card modern" data-aos="fade-up" data-aos-delay="400">
                        <div class="metric-icon">
                            <span class="icon-bg">🤝</span>
                        </div>
                        <div class="metric-content">
                            <div class="metric-number" data-target="150">0</div>
                            <div class="metric-suffix">+</div>
                        </div>
                        <div class="metric-label">Industry Partners</div>
                        <div class="metric-description">Trusted global manufacturers</div>
                    </div>
                    
                    <div class="metric-card modern" data-aos="fade-up" data-aos-delay="500">
                        <div class="metric-icon">
                            <span class="icon-bg">🏆</span>
                        </div>
                        <div class="metric-content">
                            <div class="metric-number" data-target="15">0</div>
                            <div class="metric-suffix">+</div>
                        </div>
                        <div class="metric-label">Years Experience</div>
                        <div class="metric-description">Proven industry expertise</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Enhanced Features Section -->
    <section class="features">
        <div class="container">
            <div class="section-header" data-aos="fade-up">
                <span class="section-badge">Why Choose Us</span>
                <h2 class="section-title">Advanced Automation Solutions</h2>
                <p class="section-subtitle">Cutting-edge technology meets industrial expertise to deliver unparalleled automation solutions that transform your manufacturing processes</p>
            </div>
            <div class="features-grid">
                <div class="feature-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="feature-icon-wrapper">
                        <div class="feature-icon">🤖</div>
                        <div class="feature-glow"></div>
                    </div>
                    <h3>Advanced Robotics</h3>
                    <p>State-of-the-art robotic systems with AI integration for precision manufacturing, assembly, and quality control processes.</p>
                    <ul class="feature-list">
                        <li>6-axis industrial robots</li>
                        <li>Collaborative cobots</li>
                        <li>Vision-guided systems</li>
                        <li>Automated material handling</li>
                    </ul>
                    <div class="feature-action">
                        <a href="services.php?category=Robotics" class="feature-btn">
                            <i class="fas fa-robot"></i>
                            Explore Robotics
                        </a>
                    </div>
                </div>
                
                <div class="feature-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="feature-icon-wrapper">
                        <div class="feature-icon">🔧</div>
                        <div class="feature-glow"></div>
                    </div>
                    <h3>Custom Integration</h3>
                    <p>Seamlessly integrate automation solutions with existing infrastructure using industry-standard protocols and custom configurations.</p>
                    <ul class="feature-list">
                        <li>PLC programming & setup</li>
                        <li>SCADA system integration</li>
                        <li>MES connectivity</li>
                        <li>Legacy system upgrades</li>
                    </ul>
                    <div class="feature-action">
                        <a href="services.php?category=Integration" class="feature-btn">
                            <i class="fas fa-cogs"></i>
                            View Integration
                        </a>
                    </div>
                </div>
                
                <div class="feature-card" data-aos="fade-up" data-aos-delay="300">
                    <div class="feature-icon-wrapper">
                        <div class="feature-icon">📊</div>
                        <div class="feature-glow"></div>
                    </div>
                    <h3>IoT & Analytics</h3>
                    <p>Real-time monitoring and predictive analytics powered by industrial IoT sensors and advanced machine learning algorithms.</p>
                    <ul class="feature-list">
                        <li>Predictive maintenance</li>
                        <li>Real-time dashboards</li>
                        <li>Performance optimization</li>
                        <li>Energy management</li>
                    </ul>
                    <div class="feature-action">
                        <a href="services.php?category=IoT" class="feature-btn">
                            <i class="fas fa-chart-line"></i>
                            Discover IoT
                        </a>
                    </div>
                </div>
                
                <div class="feature-card" data-aos="fade-up" data-aos-delay="400">
                    <div class="feature-icon-wrapper">
                        <div class="feature-icon">🛡️</div>
                        <div class="feature-glow"></div>
                    </div>
                    <h3>Safety & Compliance</h3>
                    <p>Comprehensive safety systems and regulatory compliance solutions for secure and efficient industrial operations.</p>
                    <ul class="feature-list">
                        <li>Safety light curtains</li>
                        <li>Emergency stop systems</li>
                        <li>ISO compliance audits</li>
                        <li>Risk assessment</li>
                    </ul>
                    <div class="feature-action">
                        <a href="services.php?category=Safety" class="feature-btn">
                            <i class="fas fa-shield-alt"></i>
                            Safety Solutions
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Professional Services Preview -->
    <section class="services-preview">
        <div class="container">
            <div class="section-header" data-aos="fade-up">
                <span class="section-badge">Our Solutions</span>
                <h2 class="section-title">Industrial Automation Expertise</h2>
                <p class="section-subtitle">Comprehensive automation solutions tailored to your industry needs</p>
            </div>
            <div class="services-preview-grid">
                <div class="service-preview-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-image">
                        <img src="public/services/Manufacturing_automation.jpg" alt="Industrial Manufacturing Automation">
                        <div class="service-overlay"></div>
                    </div>
                    <div class="service-content">
                        <div class="service-icon">🏭</div>
                        <h3>Industrial Automation</h3>
                        <p>Complete factory automation solutions with PLC programming, SCADA systems, and advanced process control.</p>
                        <div class="service-features">
                            <span class="feature-tag">PLC Programming</span>
                            <span class="feature-tag">SCADA Systems</span>
                            <span class="feature-tag">Process Control</span>
                        </div>
                        <a href="services.php" class="service-link">
                            Learn More <span class="arrow">→</span>
                        </a>
                    </div>
                </div>
                <div class="service-preview-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-image">
                        <img src="public/services/robotics-arm.jpg" alt="Advanced Robotics Solutions">
                        <div class="service-overlay"></div>
                    </div>
                    <div class="service-content">
                        <div class="service-icon">🤖</div>
                        <h3>Robotics Solutions</h3>
                        <p>Advanced robotic systems for assembly, welding, and material handling with precision control.</p>
                        <div class="service-features">
                            <span class="feature-tag">6-Axis Robots</span>
                            <span class="feature-tag">Collaborative Robots</span>
                            <span class="feature-tag">Vision Systems</span>
                        </div>
                        <a href="services.php" class="service-link">
                            Learn More <span class="arrow">→</span>
                        </a>
                    </div>
                </div>
                <div class="service-preview-card" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-image">
                        <img src="public/services/HMI.jpg" alt="IoT Integration and Smart Systems">
                        <div class="service-overlay"></div>
                    </div>
                    <div class="service-content">
                        <div class="service-icon">🌐</div>
                        <h3>Smart IoT Integration</h3>
                        <p>IoT sensors and smart devices for real-time monitoring, predictive maintenance, and data analytics.</p>
                        <div class="service-features">
                            <span class="feature-tag">Smart Sensors</span>
                            <span class="feature-tag">Edge Computing</span>
                            <span class="feature-tag">Real-time Analytics</span>
                        </div>
                        <a href="services.php" class="service-link">
                            Learn More <span class="arrow">→</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Enhanced CTA Section -->
    <section class="cta">
        <div class="cta-background"></div>
        <div class="container">
            <div class="cta-content" data-aos="fade-up">
                <div class="cta-badge">Ready to Transform?</div>
                <h2>Automate Your Future Today</h2>
                <p>Join industry leaders who have revolutionized their operations with our cutting-edge automation solutions. Let's build the factory of tomorrow, together.</p>
                <div class="cta-buttons">
                    <a href="contact.php" class="btn btn-primary animated-btn">
                        <span>Start Your Journey</span>
                        <div class="btn-glow"></div>
                    </a>
                    <a href="services.php" class="btn btn-outline">
                        <span>View All Services</span>
                    </a>
                </div>
                <div class="cta-stats">
                    <div class="cta-stat">
                        <span class="stat-number">24/7</span>
                        <span class="stat-text">Support</span>
                    </div>
                    <div class="cta-stat">
                        <span class="stat-number">30+</span>
                        <span class="stat-text">Countries</span>
                    </div>
                    <div class="cta-stat">
                        <span class="stat-number">ISO</span>
                        <span class="stat-text">Certified</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<script>
    // Enhanced animated counter function for metrics section
    function animateCounter(element, target, duration = 2000) {
        let start = 0;
        const increment = target / (duration / 16);
        const timer = setInterval(() => {
            start += increment;
            if (start >= target) {
                element.textContent = target;
                element.classList.add('counting');
                clearInterval(timer);
            } else {
                element.textContent = Math.floor(start);
            }
        }, 16);
    }

    // Add pulse animation to metric cards
    function addPulseAnimation(card) {
        card.classList.add('animate-pulse');
        setTimeout(() => {
            card.classList.remove('animate-pulse');
        }, 2000);
    }

    // Initialize counters when metrics section is in viewport
    const observerOptions = {
        threshold: 0.3,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const counters = entry.target.querySelectorAll('[data-target]');
                const metricCards = entry.target.querySelectorAll('.metric-card');
                
                // Start counter animations with staggered timing
                counters.forEach((counter, index) => {
                    setTimeout(() => {
                        const target = parseInt(counter.getAttribute('data-target'));
                        animateCounter(counter, target);
                        
                        // Add pulse animation to corresponding card
                        const card = metricCards[index];
                        if (card) {
                            addPulseAnimation(card);
                        }
                    }, index * 200); // 200ms delay between each counter
                });
                
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // Observe metrics section when page loads
    document.addEventListener('DOMContentLoaded', () => {
        const metricsSection = document.querySelector('.metrics-section');
        if (metricsSection) {
            observer.observe(metricsSection);
        }
        
        // Add hover effects to metric cards
        const metricCards = document.querySelectorAll('.metric-card');
        metricCards.forEach(card => {
            card.addEventListener('mouseenter', () => {
                card.style.transform = 'translateY(-10px) scale(1.02)';
            });
            
            card.addEventListener('mouseleave', () => {
                card.style.transform = 'translateY(0) scale(1)';
            });
        });
    });
</script>

<?php include 'includes/footer.php'; ?>