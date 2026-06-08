</div>

<footer class="bg-dark text-white text-center py-4 mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-3 mb-md-0">
                <h5 class="mb-3">SI-BORI</h5>
                <p class="small">Smart Innovative Boardgame<br>Geometri berbasis Etnomatematika Jawa Tengah</p>
            </div>
            <div class="col-md-4 mb-3 mb-md-0">
                <h5 class="mb-3">Menu</h5>
                <div class="small">
                    <a href="<?php echo (strpos($_SERVER['PHP_SELF'], '/menu/') !== false || strpos($_SERVER['PHP_SELF'], '/admin/') !== false) ? '../' : ''; ?>index.php" class="text-white text-decoration-none d-block mb-2">Beranda</a>
                    <a href="<?php echo (strpos($_SERVER['PHP_SELF'], '/menu/') !== false || strpos($_SERVER['PHP_SELF'], '/admin/') !== false) ? '../admin/' : 'admin/'; ?>login.php" class="text-white text-decoration-none d-block">Admin</a>
                </div>
            </div>
            <div class="col-md-4">
                <h5 class="mb-3">Kontak</h5>
                <p class="small mb-2">
                    <i class="fas fa-envelope"></i> info@sibori.com<br>
                    <i class="fas fa-phone"></i> +62 123 4567 8900
                </p>
            </div>
        </div>
        <hr class="my-3" style="border-color: rgba(255,255,255,0.2);">
        <p class="mb-0 small">&copy; <?php echo date('Y'); ?> SI-BORI. All Rights Reserved.</p>
    </div>
</footer>

<!-- Back to Top Button -->
<!-- <button id="backToTop" aria-label="Back to top">
    <i class="fas fa-arrow-up"></i>
</button> -->

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Custom JS -->
<!-- <script src="<?php echo (strpos($_SERVER['PHP_SELF'], '/menu/') !== false || strpos($_SERVER['PHP_SELF'], '/admin/') !== false) ? '../' : ''; ?>assets/js/main.js"></script> -->

<style>
#backToTop {
    display: none;
    position: fixed;
    bottom: 30px;
    right: 30px;
    z-index: 99;
    width: 50px;
    height: 50px;
    border: none;
    outline: none;
    background: linear-gradient(45deg, #FF6B35, #F7931E);
    color: white;
    cursor: pointer;
    border-radius: 50%;
    font-size: 20px;
    box-shadow: 0 4px 15px rgba(255, 107, 53, 0.4);
    transition: all 0.3s ease;
}

#backToTop:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 20px rgba(255, 107, 53, 0.6);
}

#backToTop.show {
    display: block;
    animation: fadeIn 0.3s ease;
}

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}
</style>

<script>
// Back to Top Button Functionality
window.onscroll = function() {
    const backToTopBtn = document.getElementById("backToTop");
    if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
        backToTopBtn.classList.add('show');
    } else {
        backToTopBtn.classList.remove('show');
    }
};

document.getElementById("backToTop").addEventListener('click', function() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
});
</script>

</body>
</html>
