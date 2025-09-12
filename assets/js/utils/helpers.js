/* Utility Functions and Helpers */

class UtilityComponent {
  constructor() {
    this.init();
  }

  init() {
    this.initPageLoader();
    this.initLazyLoading();
    this.initTooltips();
    this.initModals();
    this.initThemeToggle();
  }

  // Page loader
  initPageLoader() {
    const loader = document.querySelector('.page-loader');
    
    if (loader) {
      window.addEventListener('load', () => {
        setTimeout(() => {
          loader.classList.add('hidden');
          setTimeout(() => {
            loader.remove();
          }, 500);
        }, 500);
      });
    }
  }

  // Lazy loading for images
  initLazyLoading() {
    const lazyImages = document.querySelectorAll('img[data-src]');
    
    if (lazyImages.length === 0) return;

    const imageObserver = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          const img = entry.target;
          img.src = img.dataset.src;
          img.classList.remove('lazy');
          img.classList.add('lazy-loaded');
          imageObserver.unobserve(img);
        }
      });
    }, {
      threshold: 0.1,
      rootMargin: '50px'
    });

    lazyImages.forEach(img => {
      img.classList.add('lazy');
      imageObserver.observe(img);
    });
  }

  // Simple tooltip system
  initTooltips() {
    const tooltipElements = document.querySelectorAll('[data-tooltip]');
    
    tooltipElements.forEach(element => {
      element.addEventListener('mouseenter', (e) => {
        this.showTooltip(e.target);
      });
      
      element.addEventListener('mouseleave', () => {
        this.hideTooltip();
      });
    });
  }

  showTooltip(element) {
    const tooltipText = element.dataset.tooltip;
    if (!tooltipText) return;

    const tooltip = document.createElement('div');
    tooltip.className = 'tooltip';
    tooltip.textContent = tooltipText;
    
    document.body.appendChild(tooltip);
    
    const rect = element.getBoundingClientRect();
    const tooltipRect = tooltip.getBoundingClientRect();
    
    tooltip.style.left = `${rect.left + (rect.width / 2) - (tooltipRect.width / 2)}px`;
    tooltip.style.top = `${rect.top - tooltipRect.height - 10}px`;
    
    // Add styles if not already present
    if (!document.querySelector('#tooltip-styles')) {
      const styles = document.createElement('style');
      styles.id = 'tooltip-styles';
      styles.textContent = `
        .tooltip {
          position: absolute;
          background: rgba(0, 0, 0, 0.9);
          color: white;
          padding: 8px 12px;
          border-radius: 4px;
          font-size: 14px;
          z-index: 10000;
          pointer-events: none;
          opacity: 0;
          animation: tooltipFadeIn 0.2s ease forwards;
        }
        .tooltip::after {
          content: '';
          position: absolute;
          top: 100%;
          left: 50%;
          margin-left: -5px;
          border: 5px solid transparent;
          border-top-color: rgba(0, 0, 0, 0.9);
        }
        @keyframes tooltipFadeIn {
          to { opacity: 1; }
        }
      `;
      document.head.appendChild(styles);
    }
  }

  hideTooltip() {
    const tooltip = document.querySelector('.tooltip');
    if (tooltip) {
      tooltip.remove();
    }
  }

  // Simple modal system
  initModals() {
    const modalTriggers = document.querySelectorAll('[data-modal]');
    
    modalTriggers.forEach(trigger => {
      trigger.addEventListener('click', (e) => {
        e.preventDefault();
        const modalId = trigger.dataset.modal;
        this.openModal(modalId);
      });
    });

    // Close modal on escape key
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape') {
        this.closeModal();
      }
    });
  }

  openModal(modalId) {
    const modal = document.getElementById(modalId);
    if (!modal) return;

    modal.style.display = 'flex';
    document.body.style.overflow = 'hidden';
    
    // Close on backdrop click
    modal.addEventListener('click', (e) => {
      if (e.target === modal) {
        this.closeModal();
      }
    });

    // Close button
    const closeBtn = modal.querySelector('.modal-close');
    if (closeBtn) {
      closeBtn.addEventListener('click', () => {
        this.closeModal();
      });
    }
  }

  closeModal() {
    const openModal = document.querySelector('.modal[style*="flex"]');
    if (openModal) {
      openModal.style.display = 'none';
      document.body.style.overflow = '';
    }
  }

  // Theme toggle (if needed)
  initThemeToggle() {
    const themeToggle = document.querySelector('.theme-toggle');
    
    if (themeToggle) {
      // Check for saved theme preference
      const savedTheme = localStorage.getItem('theme');
      if (savedTheme) {
        document.documentElement.setAttribute('data-theme', savedTheme);
      }

      themeToggle.addEventListener('click', () => {
        const currentTheme = document.documentElement.getAttribute('data-theme');
        const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
        
        document.documentElement.setAttribute('data-theme', newTheme);
        localStorage.setItem('theme', newTheme);
      });
    }
  }

  // Utility helper functions
  static debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
      const later = () => {
        clearTimeout(timeout);
        func(...args);
      };
      clearTimeout(timeout);
      timeout = setTimeout(later, wait);
    };
  }

  static throttle(func, limit) {
    let inThrottle;
    return function() {
      const args = arguments;
      const context = this;
      if (!inThrottle) {
        func.apply(context, args);
        inThrottle = true;
        setTimeout(() => inThrottle = false, limit);
      }
    };
  }

  static formatNumber(num) {
    return new Intl.NumberFormat().format(num);
  }

  static formatCurrency(amount, currency = 'USD') {
    return new Intl.NumberFormat('en-US', {
      style: 'currency',
      currency: currency
    }).format(amount);
  }

  static formatDate(date, options = {}) {
    return new Intl.DateTimeFormat('en-US', {
      year: 'numeric',
      month: 'long',
      day: 'numeric',
      ...options
    }).format(new Date(date));
  }

  static isMobile() {
    return window.innerWidth <= 768;
  }

  static isTablet() {
    return window.innerWidth > 768 && window.innerWidth <= 1024;
  }

  static isDesktop() {
    return window.innerWidth > 1024;
  }

  static getUrlParams() {
    const params = new URLSearchParams(window.location.search);
    const result = {};
    for (const [key, value] of params) {
      result[key] = value;
    }
    return result;
  }

  static setUrlParam(key, value) {
    const url = new URL(window.location);
    url.searchParams.set(key, value);
    window.history.pushState({}, '', url);
  }

  static removeUrlParam(key) {
    const url = new URL(window.location);
    url.searchParams.delete(key);
    window.history.pushState({}, '', url);
  }

  static copyToClipboard(text) {
    if (navigator.clipboard) {
      return navigator.clipboard.writeText(text);
    } else {
      // Fallback for older browsers
      const textArea = document.createElement('textarea');
      textArea.value = text;
      document.body.appendChild(textArea);
      textArea.select();
      document.execCommand('copy');
      document.body.removeChild(textArea);
      return Promise.resolve();
    }
  }

  static generateId(prefix = 'id') {
    return `${prefix}-${Date.now()}-${Math.random().toString(36).substr(2, 9)}`;
  }

  static sanitizeHtml(str) {
    const temp = document.createElement('div');
    temp.textContent = str;
    return temp.innerHTML;
  }

  static validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
  }

  static validatePhone(phone) {
    const re = /^[\+]?[1-9][\d]{0,15}$/;
    return re.test(phone.replace(/[\s\-\(\)]/g, ''));
  }

  static storage = {
    set(key, value) {
      try {
        localStorage.setItem(key, JSON.stringify(value));
      } catch (e) {
        console.warn('LocalStorage is not available');
      }
    },
    
    get(key) {
      try {
        const item = localStorage.getItem(key);
        return item ? JSON.parse(item) : null;
      } catch (e) {
        console.warn('LocalStorage is not available');
        return null;
      }
    },
    
    remove(key) {
      try {
        localStorage.removeItem(key);
      } catch (e) {
        console.warn('LocalStorage is not available');
      }
    },
    
    clear() {
      try {
        localStorage.clear();
      } catch (e) {
        console.warn('LocalStorage is not available');
      }
    }
  };
}

// Export for use in main.js
window.UtilityComponent = UtilityComponent;
