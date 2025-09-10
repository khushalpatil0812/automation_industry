// Admin panel JavaScript
document.addEventListener("DOMContentLoaded", () => {
  // File upload preview
  const fileInputs = document.querySelectorAll('input[type="file"]')
  fileInputs.forEach((input) => {
    input.addEventListener("change", (e) => {
      const file = e.target.files[0]
      if (file) {
        const reader = new FileReader()
        reader.onload = (e) => {
          let preview = document.getElementById("image-preview")
          if (!preview) {
            preview = document.createElement("div")
            preview.id = "image-preview"
            preview.style.marginTop = "1rem"
            input.parentNode.appendChild(preview)
          }
          preview.innerHTML = `<img src="${e.target.result}" style="max-width: 200px; border-radius: 8px;">`
        }
        reader.readAsDataURL(file)
      }
    })
  })

  // Confirm delete actions
  const deleteButtons = document.querySelectorAll('.btn-danger, [onclick*="delete"]')
  deleteButtons.forEach((button) => {
    button.addEventListener("click", (e) => {
      if (!confirm("Are you sure you want to delete this item?")) {
        e.preventDefault()
        return false
      }
    })
  })

  // Auto-hide success messages
  const successMessages = document.querySelectorAll(".success-message")
  successMessages.forEach((message) => {
    setTimeout(() => {
      message.style.opacity = "0"
      setTimeout(() => {
        message.remove()
      }, 300)
    }, 5000)
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
})
