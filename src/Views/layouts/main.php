<main id="main">
    <?php if(isset($_SESSION['error']) || isset($_SESSION['success'])): ?>
        <section id="message">
            <div class="container">
                <div class="row g-0">
                    <div class="alert <?= isset($_SESSION['error']) ? 'alert-danger' : 'alert-success' ?> alert-dismissible fade show m-0" role="alert">
                        <?= htmlspecialchars($_SESSION['error'] ?? $_SESSION['success']) ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        </section>
        <?php unset($_SESSION['error'], $_SESSION['success']); ?>
    <?php endif; ?>
