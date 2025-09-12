/* Main JavaScript File - Initializes all components */

// Main Application Class
class AutomationIndustryApp {
  constructor() {
    this.components = new Map();
    this.isInitialized = false;
  }

  // Initialize the application
  async init() {
    if (this.isInitialized) return;

    try {
      // Initialize all components
      await this.initializeComponents();
      
      // Set up global event listeners
      this.setupGlobalEvents();
      
      // Mark as initialized
      this.isInitialized = true;
      
      console.log('🚀 Automation Industry website initialized successfully');
    } catch (error) {
      console.error('❌ Failed to initialize application:', error);
    }
  }

  // Initialize all components
  async initializeComponents() {
    const componentClasses = [
      { name: 'navigation', class: NavigationComponent },
      { name: 'forms', class: FormComponent },
      { name: 'animations', class: AnimationComponent },
      { name: 'utilities', class: UtilityComponent }
    ];

    for (const { name, class: ComponentClass } of componentClasses) {
      try {
        if (typeof ComponentClass === 'function') {
          const instance = new ComponentClass();
          this.components.set(name, instance);
          console.log(`✅ ${name} component initialized`);
        } else {
          console.warn(`⚠️ ${name} component class not found`);
        }
      } catch (error) {
        console.error(`❌ Failed to initialize ${name} component:`, error);
      }
    }
  }

  // Set up global event listeners
  setupGlobalEvents() {
    // Performance monitoring
    this.setupPerformanceMonitoring();
    
    // Error handling
    this.setupErrorHandling();
    
    // Resize handling
    this.setupResizeHandling();
    
    // Visibility change handling
    this.setupVisibilityHandling();
  }

  // Performance monitoring
  setupPerformanceMonitoring() {
    if ('PerformanceObserver' in window) {
      // Monitor Largest Contentful Paint
      try {
        const lcpObserver = new PerformanceObserver((list) => {
          const entries = list.getEntries();
          const lastEntry = entries[entries.length - 1];
          console.log('📊 LCP:', lastEntry.startTime);
        });
        lcpObserver.observe({ entryTypes: ['largest-contentful-paint'] });
      } catch (error) {
        console.warn('Performance monitoring not available');
      }
    }
  }

  // Global error handling
  setupErrorHandling() {
    window.addEventListener('error', (event) => {
      console.error('🚨 Global error:', event.error);
      // In production, you might want to send this to an error tracking service
    });

    window.addEventListener('unhandledrejection', (event) => {
      console.error('🚨 Unhandled promise rejection:', event.reason);
      // In production, you might want to send this to an error tracking service
    });
  }

  // Resize handling
  setupResizeHandling() {
    const handleResize = UtilityComponent.debounce(() => {
      // Trigger custom resize event for components
      window.dispatchEvent(new CustomEvent('app:resize', {
        detail: {
          width: window.innerWidth,
          height: window.innerHeight,
          isMobile: UtilityComponent.isMobile(),
          isTablet: UtilityComponent.isTablet(),
          isDesktop: UtilityComponent.isDesktop()
        }
      }));
    }, 250);

    window.addEventListener('resize', handleResize);
  }

  // Visibility change handling (for performance optimization)
  setupVisibilityHandling() {
    document.addEventListener('visibilitychange', () => {
      if (document.hidden) {
        // Page is hidden - pause animations, stop timers, etc.
        window.dispatchEvent(new CustomEvent('app:hidden'));
      } else {
        // Page is visible - resume animations, restart timers, etc.
        window.dispatchEvent(new CustomEvent('app:visible'));
      }
    });
  }

  // Get component instance
  getComponent(name) {
    return this.components.get(name);
  }

  // Cleanup method
  cleanup() {
    this.components.forEach((component, name) => {
      if (typeof component.cleanup === 'function') {
        component.cleanup();
        console.log(`🧹 Cleaned up ${name} component`);
      }
    });
    
    this.components.clear();
    this.isInitialized = false;
  }

  // Restart application
  async restart() {
    this.cleanup();
    await this.init();
  }
}

// Initialize the application when DOM is ready
document.addEventListener('DOMContentLoaded', async () => {
  // Create global app instance
  window.app = new AutomationIndustryApp();
  
  // Initialize the application
  await window.app.init();
  
  // Expose app to global scope for debugging
  if (typeof window !== 'undefined') {
    window.AutomationIndustryApp = AutomationIndustryApp;
  }
});

// Handle page unload
window.addEventListener('beforeunload', () => {
  if (window.app) {
    window.app.cleanup();
  }
});

// Service Worker registration (for future PWA features)
if ('serviceWorker' in navigator && window.location.protocol === 'https:') {
  window.addEventListener('load', () => {
    navigator.serviceWorker.register('/sw.js')
      .then(registration => {
        console.log('✅ Service Worker registered:', registration);
      })
      .catch(error => {
        console.log('❌ Service Worker registration failed:', error);
      });
  });
}

// Export for testing
if (typeof module !== 'undefined' && module.exports) {
  module.exports = AutomationIndustryApp;
}
