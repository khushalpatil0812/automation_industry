/* Animation and Intersection Observer Component */

class AnimationComponent {
  constructor() {
    this.observers = new Map();
    this.init();
  }

  init() {
    this.initScrollAnimations();
    this.initCounterAnimations();
    this.initCarouselAnimations();
    this.initParallaxEffects();
  }

  // Scroll-triggered animations
  initScrollAnimations() {
    const observerOptions = {
      threshold: 0.1,
      rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          this.animateElement(entry.target);
          observer.unobserve(entry.target);
        }
      });
    }, observerOptions);

    // Elements to animate on scroll
    const animatedElements = document.querySelectorAll(
      '.service-card, .feature-card, .metric-card, .hero-content, .section-header, .cta-section'
    );

    animatedElements.forEach((element, index) => {
      // Add initial hidden state
      element.style.opacity = '0';
      element.style.transform = 'translateY(30px)';
      element.style.transition = `opacity 0.6s ease ${index * 0.1}s, transform 0.6s ease ${index * 0.1}s`;
      
      observer.observe(element);
    });

    this.observers.set('scroll', observer);
  }

  animateElement(element) {
    element.style.opacity = '1';
    element.style.transform = 'translateY(0)';
    
    // Add specific animations based on element type
    if (element.classList.contains('service-card')) {
      element.style.transform = 'translateY(0) scale(1)';
    }
    
    if (element.classList.contains('metric-card')) {
      // Trigger counter animation for metric cards
      const counter = element.querySelector('.metric-number');
      if (counter) {
        this.animateCounter(counter);
      }
    }
  }

  // Counter animations for metrics
  initCounterAnimations() {
    const counterObserver = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          this.animateCounter(entry.target);
          counterObserver.unobserve(entry.target);
        }
      });
    }, { threshold: 0.5 });

    document.querySelectorAll('.metric-number').forEach(counter => {
      counterObserver.observe(counter);
    });

    this.observers.set('counter', counterObserver);
  }

  animateCounter(element) {
    const target = parseInt(element.textContent) || 0;
    const duration = 2000;
    const start = 0;
    const startTime = Date.now();

    const updateCounter = () => {
      const elapsed = Date.now() - startTime;
      const progress = Math.min(elapsed / duration, 1);
      
      // Easing function for smooth animation
      const easeOutCubic = (t) => 1 - Math.pow(1 - t, 3);
      const current = Math.floor(start + (target - start) * easeOutCubic(progress));
      
      element.textContent = current.toLocaleString();
      
      if (progress < 1) {
        requestAnimationFrame(updateCounter);
      } else {
        // Add the suffix back if it exists
        const suffix = element.dataset.suffix || '';
        element.textContent = target.toLocaleString() + suffix;
      }
    };

    requestAnimationFrame(updateCounter);
  }

  // Service carousel animations
  initCarouselAnimations() {
    const carousel = document.querySelector('.service-carousel');
    if (!carousel) return;

    const carouselInner = carousel.querySelector('.carousel-inner');
    const cards = carousel.querySelectorAll('.service-card');
    const prevBtn = carousel.querySelector('.carousel-btn.prev');
    const nextBtn = carousel.querySelector('.carousel-btn.next');

    if (!carouselInner || !cards.length) return;

    let currentIndex = 0;
    let isAnimating = false;
    const totalCards = cards.length;
    
    // Auto-rotate carousel
    let autoRotateInterval = setInterval(() => {
      if (!isAnimating && !document.hidden) {
        this.nextSlide(carouselInner, currentIndex, totalCards);
        currentIndex = (currentIndex + 1) % totalCards;
      }
    }, 5000);

    // Manual navigation
    if (nextBtn) {
      nextBtn.addEventListener('click', () => {
        if (!isAnimating) {
          clearInterval(autoRotateInterval);
          this.nextSlide(carouselInner, currentIndex, totalCards);
          currentIndex = (currentIndex + 1) % totalCards;
          this.restartAutoRotate();
        }
      });
    }

    if (prevBtn) {
      prevBtn.addEventListener('click', () => {
        if (!isAnimating) {
          clearInterval(autoRotateInterval);
          currentIndex = (currentIndex - 1 + totalCards) % totalCards;
          this.prevSlide(carouselInner, currentIndex, totalCards);
          this.restartAutoRotate();
        }
      });
    }

    // Pause on hover
    carousel.addEventListener('mouseenter', () => {
      clearInterval(autoRotateInterval);
    });

    carousel.addEventListener('mouseleave', () => {
      this.restartAutoRotate();
    });

    // Touch/swipe support
    this.initTouchSupport(carousel, carouselInner, currentIndex, totalCards);

    const restartAutoRotate = () => {
      clearInterval(autoRotateInterval);
      autoRotateInterval = setInterval(() => {
        if (!isAnimating && !document.hidden) {
          this.nextSlide(carouselInner, currentIndex, totalCards);
          currentIndex = (currentIndex + 1) % totalCards;
        }
      }, 5000);
    };

    this.restartAutoRotate = restartAutoRotate;
  }

  nextSlide(carouselInner, currentIndex, totalCards) {
    const cardWidth = carouselInner.children[0].offsetWidth + 20; // Including gap
    const newTransform = -((currentIndex + 1) % totalCards) * cardWidth;
    
    carouselInner.style.transform = `translateX(${newTransform}px)`;
    this.updateCarouselIndicators(currentIndex + 1, totalCards);
  }

  prevSlide(carouselInner, currentIndex, totalCards) {
    const cardWidth = carouselInner.children[0].offsetWidth + 20;
    const newTransform = -(currentIndex * cardWidth);
    
    carouselInner.style.transform = `translateX(${newTransform}px)`;
    this.updateCarouselIndicators(currentIndex, totalCards);
  }

  updateCarouselIndicators(activeIndex, totalCards) {
    const indicators = document.querySelectorAll('.carousel-indicator');
    indicators.forEach((indicator, index) => {
      indicator.classList.toggle('active', index === activeIndex % totalCards);
    });
  }

  // Touch support for carousel
  initTouchSupport(carousel, carouselInner, currentIndex, totalCards) {
    let startX = 0;
    let isDragging = false;
    let startTransform = 0;

    carousel.addEventListener('touchstart', (e) => {
      startX = e.touches[0].clientX;
      isDragging = true;
      const transform = carouselInner.style.transform;
      startTransform = transform ? parseInt(transform.split('(')[1]) : 0;
    });

    carousel.addEventListener('touchmove', (e) => {
      if (!isDragging) return;
      
      const currentX = e.touches[0].clientX;
      const diff = currentX - startX;
      const newTransform = startTransform + diff;
      
      carouselInner.style.transform = `translateX(${newTransform}px)`;
    });

    carousel.addEventListener('touchend', (e) => {
      if (!isDragging) return;
      
      isDragging = false;
      const endX = e.changedTouches[0].clientX;
      const diff = endX - startX;
      
      if (Math.abs(diff) > 50) {
        if (diff > 0) {
          // Swipe right (previous)
          currentIndex = (currentIndex - 1 + totalCards) % totalCards;
        } else {
          // Swipe left (next)
          currentIndex = (currentIndex + 1) % totalCards;
        }
      }
      
      // Snap to position
      const cardWidth = carouselInner.children[0].offsetWidth + 20;
      const newTransform = -(currentIndex * cardWidth);
      carouselInner.style.transform = `translateX(${newTransform}px)`;
    });
  }

  // Parallax effects
  initParallaxEffects() {
    const parallaxElements = document.querySelectorAll('.parallax-element, .hero-background');
    
    if (parallaxElements.length === 0) return;

    const handleScroll = () => {
      const scrollTop = window.pageYOffset;
      
      parallaxElements.forEach(element => {
        const speed = element.dataset.speed || 0.5;
        const translateY = scrollTop * speed;
        element.style.transform = `translateY(${translateY}px)`;
      });
    };

    // Throttle scroll events for performance
    let ticking = false;
    window.addEventListener('scroll', () => {
      if (!ticking) {
        requestAnimationFrame(() => {
          handleScroll();
          ticking = false;
        });
        ticking = true;
      }
    });
  }

  // Card flip animations
  initCardFlipAnimations() {
    const flipCards = document.querySelectorAll('.flip-card');
    
    flipCards.forEach(card => {
      card.addEventListener('click', () => {
        card.classList.toggle('flipped');
      });
      
      // Auto-flip on hover for desktop
      if (window.innerWidth > 768) {
        card.addEventListener('mouseenter', () => {
          card.classList.add('flipped');
        });
        
        card.addEventListener('mouseleave', () => {
          card.classList.remove('flipped');
        });
      }
    });
  }

  // Page transition animations
  initPageTransitions() {
    // Fade in animation for page load
    document.body.style.opacity = '0';
    document.body.style.transform = 'translateY(20px)';
    
    window.addEventListener('load', () => {
      document.body.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
      document.body.style.opacity = '1';
      document.body.style.transform = 'translateY(0)';
    });
  }

  // Cleanup method
  cleanup() {
    this.observers.forEach(observer => {
      observer.disconnect();
    });
    this.observers.clear();
  }
}

// Export for use in main.js
window.AnimationComponent = AnimationComponent;
