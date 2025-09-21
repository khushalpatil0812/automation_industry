<?php
$page_title = 'Header Test';
$page_description = 'Testing the new improved header design';
include 'includes/header.php';
?>

<style>
    body {
        padding-top: 120px; /* Account for fixed navbar */
    }
    .test-content {
        min-height: 100vh;
        background: linear-gradient(135deg, #212529 0%, #343a40 100%);
        color: white;
        padding: 4rem 0;
    }
</style>

<div class="test-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h1 class="display-4 fw-bold mb-4">Enhanced Header Test</h1>
                <p class="fs-5 mb-4">This page demonstrates the new improved header with:</p>
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="card bg-dark border-light h-100">
                            <div class="card-body">
                                <h5 class="card-title text-warning">✨ Modern Design</h5>
                                <p class="card-text">Clean, professional industrial theme</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card bg-dark border-light h-100">
                            <div class="card-body">
                                <h5 class="card-title text-info">📱 Responsive</h5>
                                <p class="card-text">Optimized for all devices</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card bg-dark border-light h-100">
                            <div class="card-body">
                                <h5 class="card-title text-success">♿ Accessible</h5>
                                <p class="card-text">WCAG compliant with keyboard navigation</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card bg-dark border-light h-100">
                            <div class="card-body">
                                <h5 class="card-title text-danger">🎨 Animated</h5>
                                <p class="card-text">Smooth transitions and effects</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-5">
                    <h3>Header Features:</h3>
                    <ul class="list-unstyled">
                        <li class="mb-2">🔧 Industrial automation theme with gear animations</li>
                        <li class="mb-2">🎯 Smooth scroll effects and backdrop blur</li>
                        <li class="mb-2">📱 Mobile-first responsive design</li>
                        <li class="mb-2">♿ Full accessibility support (ARIA, keyboard navigation)</li>
                        <li class="mb-2">⚡ Performance optimized with prefetch and lazy loading</li>
                        <li class="mb-2">🎨 Professional gradient backgrounds and hover effects</li>
                        <li class="mb-2">🔄 Advanced loading states for better UX</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>