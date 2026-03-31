    <footer class="footer-modern">
        <div class="container footer-content">
            <div class="row">

                <!-- KIRI : BRAND + ALAMAT -->
                <div class="col-lg-4 mb-4">
                    <h3 class="footer-brand">Makan Bergizi Gratis</h3>
                    <p class="footer-description">
                        Program nasional untuk Indonesia sehat dan bebas stunting.
                        Mewujudkan generasi emas yang cerdas dan produktif melalui nutrisi terbaik.
                    </p>

                    <p class="footer-description">
                    <h3 class="footer-brand">Alamat</h3>
                    <i class="bi bi-geo-alt"></i>
                    Jl. Ir. H. Juanda No.10
                    Kecamatan Bogor Tengah
                    Kota Bogor, Jawa Barat 16121
                    Indonesia
                    </p>

                    <div class="social-icons-modern">
                        <a href="#" class="social-icon-modern"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="social-icon-modern"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="social-icon-modern"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="social-icon-modern"><i class="bi bi-youtube"></i></a>
                        <a href="#" class="social-icon-modern"><i class="bi bi-whatsapp"></i></a>
                    </div>
                </div>

                <!-- KANAN : NEWSLETTER -->
                <div class="col-lg-4 mb-4">
                    <h5 class="footer-title">Newsletter</h5>
                    <p class="footer-description">
                        Dapatkan informasi terbaru tentang program dan tips gizi seimbang
                        langsung di email Anda.
                    </p>

                    <small>
                        Hotline: 1500-234<br>
                        Email: info@makanbergizigratis.go.id
                    </small>
                </div>

                <!-- TENGAH : VISITOR -->
                <div class="col-lg-4 mb-8 " style="margin-top:-25px">

                    <div class="footer-stats-widget">
                        <div class="stat-item-w">
                            <div style="color:#071E49;"><i class="bi bi-calendar2-check-fill" style="color:#D1B06C;"></i> Hari Ini</div>
                            <span class="stat-value-w" id="stat-today" style="color:#071E49 !important;">
                                <?php echo e(number_format(\App\Models\Visitor::getTodayCount())); ?>

                            </span>
                        </div>

                        <div class="stat-item-w">
                            <div style="color:#071E49;"><i class="bi bi-people-fill" style="color:#D1B06C;"></i> Total</div>
                            <span class="stat-value-w" id="stat-total" style="color:#071E49 !important;">
                                <?php echo e(number_format(\App\Models\Visitor::getTotalCount())); ?>

                            </span>
                        </div>

                        <div class="stat-item-w">
                            <div style="color:#071E49;"><i class="bi bi-broadcast text-success" style="color:#D1B06C;"></i> Online</div>
                            <span class="stat-value-w" id="stat-online" style="color:#071E49 !important;">
                                <?php echo e(number_format(\App\Models\Visitor::getOnlineCount())); ?>

                            </span>
                        </div>
                    </div>
                </div>

            </div>

            <div class="footer-bottom">
                <p class="mb-0 mt-3">&copy; Pemerintah Kota Bogor. Hak Cipta Dilindungi.</p>
            </div>
        </div>
    </footer><?php /**PATH C:\laragon\www\mbg_kota_bogor\resources\views\components\footer.blade.php ENDPATH**/ ?>