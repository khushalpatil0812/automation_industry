/* Form Validation and Handling Component */

class FormComponent {
  constructor() {
    this.init();
  }

  init() {
    this.initFormValidation();
    this.initFileUploads();
    this.initNewsletterForm();
    this.initContactForm();
  }

  // Enhanced form validation
  initFormValidation() {
    const forms = document.querySelectorAll('form');
    
    forms.forEach(form => {
      // Real-time validation
      const inputs = form.querySelectorAll('input, textarea, select');
      inputs.forEach(input => {
        input.addEventListener('blur', () => this.validateField(input));
        input.addEventListener('input', () => this.clearFieldError(input));
      });

      // Form submission
      form.addEventListener('submit', (e) => {
        if (!this.validateForm(form)) {
          e.preventDefault();
        }
      });
    });
  }

  validateField(field) {
    const value = field.value.trim();
    const type = field.type;
    const required = field.hasAttribute('required');
    
    // Clear previous errors
    this.clearFieldError(field);
    
    // Required field validation
    if (required && !value) {
      this.showFieldError(field, 'This field is required');
      return false;
    }
    
    // Email validation
    if (type === 'email' && value) {
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!emailRegex.test(value)) {
        this.showFieldError(field, 'Please enter a valid email address');
        return false;
      }
    }
    
    // Phone validation
    if (field.name === 'phone' && value) {
      const phoneRegex = /^[\+]?[1-9][\d]{0,15}$/;
      if (!phoneRegex.test(value.replace(/[\s\-\(\)]/g, ''))) {
        this.showFieldError(field, 'Please enter a valid phone number');
        return false;
      }
    }
    
    // Minimum length validation
    const minLength = field.getAttribute('minlength');
    if (minLength && value.length < parseInt(minLength)) {
      this.showFieldError(field, `Minimum ${minLength} characters required`);
      return false;
    }
    
    // Success state
    this.showFieldSuccess(field);
    return true;
  }

  validateForm(form) {
    const fields = form.querySelectorAll('input, textarea, select');
    let isValid = true;
    
    fields.forEach(field => {
      if (!this.validateField(field)) {
        isValid = false;
      }
    });
    
    return isValid;
  }

  showFieldError(field, message) {
    const formGroup = field.closest('.form-group');
    if (formGroup) {
      formGroup.classList.remove('success');
      formGroup.classList.add('error');
      
      // Remove existing error message
      const existingError = formGroup.querySelector('.form-error');
      if (existingError) {
        existingError.remove();
      }
      
      // Add new error message
      const errorDiv = document.createElement('div');
      errorDiv.className = 'form-error';
      errorDiv.innerHTML = `<i class="fas fa-exclamation-circle"></i> ${message}`;
      formGroup.appendChild(errorDiv);
    }
  }

  showFieldSuccess(field) {
    const formGroup = field.closest('.form-group');
    if (formGroup) {
      formGroup.classList.remove('error');
      formGroup.classList.add('success');
      
      // Remove error message
      const existingError = formGroup.querySelector('.form-error');
      if (existingError) {
        existingError.remove();
      }
    }
  }

  clearFieldError(field) {
    const formGroup = field.closest('.form-group');
    if (formGroup) {
      formGroup.classList.remove('error', 'success');
      
      const existingError = formGroup.querySelector('.form-error');
      if (existingError) {
        existingError.remove();
      }
    }
  }

  // File upload handling
  initFileUploads() {
    const fileInputs = document.querySelectorAll('input[type="file"]');
    
    fileInputs.forEach(input => {
      input.addEventListener('change', (e) => {
        this.handleFileUpload(e.target);
      });
      
      // Drag and drop functionality
      const label = input.nextElementSibling;
      if (label && label.classList.contains('file-upload-label')) {
        this.initDragAndDrop(input, label);
      }
    });
  }

  handleFileUpload(input) {
    const file = input.files[0];
    if (!file) return;
    
    // Validate file size (5MB limit)
    const maxSize = 5 * 1024 * 1024;
    if (file.size > maxSize) {
      this.showFieldError(input, 'File size must be less than 5MB');
      input.value = '';
      return;
    }
    
    // Validate file type for images
    if (input.accept && input.accept.includes('image/')) {
      const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
      if (!allowedTypes.includes(file.type)) {
        this.showFieldError(input, 'Please select a valid image file (JPEG, PNG, GIF)');
        input.value = '';
        return;
      }
    }
    
    // Show preview for images
    if (file.type.startsWith('image/')) {
      this.showImagePreview(input, file);
    }
    
    this.clearFieldError(input);
  }

  showImagePreview(input, file) {
    const reader = new FileReader();
    reader.onload = (e) => {
      let preview = input.parentNode.querySelector('.image-preview');
      if (!preview) {
        preview = document.createElement('div');
        preview.className = 'image-preview';
        preview.style.marginTop = '1rem';
        input.parentNode.appendChild(preview);
      }
      
      preview.innerHTML = `
        <img src="${e.target.result}" style="max-width: 200px; border-radius: 8px; box-shadow: var(--shadow-sm);">
        <button type="button" class="btn btn-sm btn-danger" onclick="this.parentNode.remove(); document.querySelector('#${input.id}').value = '';" style="margin-left: 10px;">
          <i class="fas fa-times"></i> Remove
        </button>
      `;
    };
    reader.readAsDataURL(file);
  }

  initDragAndDrop(input, label) {
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
      label.addEventListener(eventName, (e) => {
        e.preventDefault();
        e.stopPropagation();
      });
    });

    ['dragenter', 'dragover'].forEach(eventName => {
      label.addEventListener(eventName, () => {
        label.classList.add('dragover');
      });
    });

    ['dragleave', 'drop'].forEach(eventName => {
      label.addEventListener(eventName, () => {
        label.classList.remove('dragover');
      });
    });

    label.addEventListener('drop', (e) => {
      const files = e.dataTransfer.files;
      if (files.length > 0) {
        input.files = files;
        this.handleFileUpload(input);
      }
    });
  }

  // Newsletter form handling
  initNewsletterForm() {
    const newsletterForm = document.querySelector('.newsletter-form');
    if (newsletterForm) {
      newsletterForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        
        const email = newsletterForm.querySelector('input[type="email"]').value;
        const button = newsletterForm.querySelector('button');
        
        if (!email) {
          this.showNotification('Please enter your email address', 'error');
          return;
        }
        
        // Show loading state
        const originalText = button.textContent;
        button.textContent = 'Subscribing...';
        button.disabled = true;
        
        try {
          // Simulate API call (replace with actual newsletter subscription logic)
          await new Promise(resolve => setTimeout(resolve, 2000));
          
          this.showNotification('Thank you for subscribing!', 'success');
          newsletterForm.reset();
        } catch (error) {
          this.showNotification('Failed to subscribe. Please try again.', 'error');
        } finally {
          button.textContent = originalText;
          button.disabled = false;
        }
      });
    }
  }

  // Contact form handling
  initContactForm() {
    const contactForm = document.querySelector('.contact-form form');
    if (contactForm) {
      contactForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        
        if (!this.validateForm(contactForm)) {
          return;
        }
        
        const submitBtn = contactForm.querySelector('button[type="submit"]');
        const originalText = submitBtn.textContent;
        
        // Show loading state
        submitBtn.textContent = 'Sending...';
        submitBtn.disabled = true;
        contactForm.classList.add('form-loading');
        
        try {
          const formData = new FormData(contactForm);
          
          // Simulate API call (replace with actual form submission logic)
          await new Promise(resolve => setTimeout(resolve, 2000));
          
          this.showNotification('Message sent successfully! We\'ll get back to you soon.', 'success');
          contactForm.reset();
          
          // Clear all field states
          contactForm.querySelectorAll('.form-group').forEach(group => {
            group.classList.remove('error', 'success');
          });
          
        } catch (error) {
          this.showNotification('Failed to send message. Please try again.', 'error');
        } finally {
          submitBtn.textContent = originalText;
          submitBtn.disabled = false;
          contactForm.classList.remove('form-loading');
        }
      });
    }
  }

  // Notification system
  showNotification(message, type = 'info') {
    const notification = document.createElement('div');
    notification.className = `notification notification-${type}`;
    notification.innerHTML = `
      <div class="notification-content">
        <i class="fas fa-${type === 'success' ? 'check-circle' : type === 'error' ? 'exclamation-circle' : 'info-circle'}"></i>
        <span>${message}</span>
        <button class="notification-close" onclick="this.parentNode.parentNode.remove()">
          <i class="fas fa-times"></i>
        </button>
      </div>
    `;
    
    // Add styles if not already present
    if (!document.querySelector('#notification-styles')) {
      const styles = document.createElement('style');
      styles.id = 'notification-styles';
      styles.textContent = `
        .notification {
          position: fixed;
          top: 20px;
          right: 20px;
          z-index: 10000;
          max-width: 400px;
          padding: 1rem;
          border-radius: 8px;
          box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
          animation: slideInRight 0.3s ease;
        }
        .notification-success { background: #10b981; color: white; }
        .notification-error { background: #ef4444; color: white; }
        .notification-info { background: #3b82f6; color: white; }
        .notification-content { display: flex; align-items: center; gap: 0.5rem; }
        .notification-close { background: none; border: none; color: inherit; cursor: pointer; margin-left: auto; }
        @keyframes slideInRight { from { transform: translateX(100%); } to { transform: translateX(0); } }
      `;
      document.head.appendChild(styles);
    }
    
    document.body.appendChild(notification);
    
    // Auto remove after 5 seconds
    setTimeout(() => {
      if (notification.parentNode) {
        notification.remove();
      }
    }, 5000);
  }
}

// Export for use in main.js
window.FormComponent = FormComponent;
