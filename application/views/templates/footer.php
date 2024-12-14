</div> <!-- Tutup container -->
    <footer class="bg-light text-center text-lg-start mt-5">
        <div class="container p-4">
            <div class="row">
                <!-- Kolom 1 -->
                <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Tentang Forum Kreatif</h5>
                    <p>
                        Forum Kreatif adalah platform untuk berbagi ide, karya, dan kolaborasi di dunia ekonomi kreatif. Mari berkarya bersama!
                    </p>
                </div>

                <!-- Kolom 2 -->
                <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Navigasi</h5>
                    <ul class="list-unstyled">
                        <li><a href="<?= base_url(); ?>" class="text-dark">Beranda</a></li>
                        <li><a href="<?= base_url('forum'); ?>" class="text-dark">Forum Diskusi</a></li>
                        <li><a href="<?= base_url('gallery'); ?>" class="text-dark">Galeri Karya</a></li>
                        <li><a href="<?= base_url('community'); ?>" class="text-dark">Komunitas</a></li>
                    </ul>
                </div>

                <!-- Kolom 3 -->
                <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Hubungi Kami</h5>
                    <ul class="list-unstyled">
                        <li><i class="bi bi-envelope"></i> <a href="mailto:info@forumkreatif.com" class="text-dark">info@forumkreatif.com</a></li>
                        <li><i class="bi bi-telephone"></i> +62 123 456 789</li>
                        <li><i class="bi bi-geo-alt"></i> Jakarta, Indonesia</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="text-center p-3" style="background-color: #f8f9fa;">
            © <?= date('Y'); ?> Forum Kreatif. All rights reserved.
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
