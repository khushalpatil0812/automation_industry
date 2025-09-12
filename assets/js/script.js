// Main website JavaScript
document.addEventListener("DOMContentLoaded", () => {
  // Mobile navigation toggle
  const navToggle = document.querySelector(".nav-toggle")
  const navMenu = document.querySelector(".nav-menu")

  if (navToggle) {
    navToggle.addEventListener("click", () => {
      navMenu.classList.toggle("active")
    })
  }

  // Smooth scrolling for anchor links
  document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener("click", function (e) {
      e.preventDefault()
      const target = document.querySelector(this.getAttribute("href"))
      if (target) {
        target.scrollIntoView({
          behavior: "smooth",
          block: "start",
        })
      }
    })
  })

  // Form validation
  const forms = document.querySelectorAll("form")
  forms.forEach((form) => {
    form.addEventListener("submit", (e) => {
      const requiredFields = form.querySelectorAll("[required]")
      let isValid = true

      requiredFields.forEach((field) => {
        if (!field.value.trim()) {
          isValid = false
          field.style.borderColor = "#ef4444"
        } else {
          field.style.borderColor = "#e2e8f0"
        }
      })

      if (!isValid) {
        e.preventDefault()
        alert("Please fill in all required fields.")
      }
    })
  })

  // Service card animations
  const observerOptions = {
    threshold: 0.1,
    rootMargin: "0px 0px -50px 0px",
  }

  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.style.opacity = "1"
        entry.target.style.transform = "translateY(0)"
      }
    })
  }, observerOptions)

  // Observe service cards for animation
  document.querySelectorAll(".service-card, .feature-card").forEach((card) => {
    card.style.opacity = "0"
    card.style.transform = "translateY(30px)"
    card.style.transition = "opacity 0.6s ease, transform 0.6s ease"
    observer.observe(card)
  })
})

// Show loader when page starts loading
document.addEventListener('DOMContentLoaded', function() {
    // Show the loader
    const loaderOverlay = document.getElementById('loader-overlay');
    if (loaderOverlay) {
        // Hide loader after 2 seconds
        setTimeout(function() {
            loaderOverlay.classList.add('hidden');
            
            // Optional: Remove from DOM after fade out
            setTimeout(function() {
                loaderOverlay.remove();
            }, 500); // Match this with CSS transition time
        }, 2000); // 2 seconds
    }
});


// Optional: Also show loader when page is about to reload/leave
window.addEventListener('beforeunload', function() {
    const loaderOverlay = document.getElementById('loader-overlay');
    if (loaderOverlay && !loaderOverlay.classList.contains('hidden')) {
        loaderOverlay.classList.remove('hidden');
    }
});

