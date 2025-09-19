        <footer class="admin-footer">
            <div class="admin-footer-content">
                <p>&copy; <?php echo date('Y'); ?> Automation Industry. All rights reserved.</p>
                <div class="admin-footer-links">
                    <a href="../index.php" target="_blank">
                        <i class="fas fa-home"></i> Visit Website
                    </a>
                    <span class="footer-separator">|</span>
                    <span class="admin-version">
                        <i class="fas fa-code"></i> Admin Panel v1.0
                    </span>
                </div>
            </div>
        </footer>
    </div> <!-- End admin-page-wrapper -->

    <!-- Admin Scripts -->
    <script src="../assets/js/admin.js?v=<?php echo time(); ?>"></script>
    <script>
        // Global admin functionality
        document.addEventListener('DOMContentLoaded', function() {
            // Add active states and animations
            const navLinks = document.querySelectorAll('.admin-menu a');
            navLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    // Add loading state for navigation
                    if (!this.target && !this.onclick) {
                        this.style.opacity = '0.7';
                        this.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Loading...';
                    }
                });
            });

            // Auto-hide alerts after 5 seconds
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                setTimeout(() => {
                    alert.style.transition = 'opacity 0.5s ease';
                    alert.style.opacity = '0';
                    setTimeout(() => {
                        alert.remove();
                    }, 500);
                }, 5000);
            });

            // Add confirm dialogs for delete actions
            const deleteButtons = document.querySelectorAll('[data-action="delete"]');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    if (!confirm('Are you sure you want to delete this item? This action cannot be undone.')) {
                        e.preventDefault();
                        return false;
                    }
                });
            });

            // Add loading states for forms
            const forms = document.querySelectorAll('form');
            forms.forEach(form => {
                form.addEventListener('submit', function() {
                    const submitBtn = this.querySelector('[type="submit"]');
                    if (submitBtn) {
                        submitBtn.disabled = true;
                        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Processing...';
                    }
                });
            });
        });

        // Utility functions
        function showAlert(message, type = 'success') {
            const alertDiv = document.createElement('div');
            alertDiv.className = `alert alert-${type}`;
            alertDiv.innerHTML = `
                <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-triangle'}"></i>
                ${message}
            `;
            
            const container = document.querySelector('.admin-main');
            if (container) {
                container.insertBefore(alertDiv, container.firstChild);
                
                // Auto remove after 5 seconds
                setTimeout(() => {
                    alertDiv.style.transition = 'opacity 0.5s ease';
                    alertDiv.style.opacity = '0';
                    setTimeout(() => alertDiv.remove(), 500);
                }, 5000);
            }
        }

        function confirmDelete(message = 'Are you sure you want to delete this item?') {
            return confirm(message);
        }
    </script>
</body>
</html>
