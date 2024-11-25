<div class="row">
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d507638.306196953!2d106.41782685625002!3d-6.273688650852395!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sid!2sid!4v1732445752799!5m2!1sid!2sid"
        width="100%" height="300" style="border:4px;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
<footer class="site-footer">

    <div class="container">

        <div class="row">
            <div class="col-md-4">
                <h3 class="footer-heading mb-4 text-white">Alamat</h3>
                <p>Jl. Raya Pd. Petir No. 9999</p>
                <h3 class="footer-heading mb-4 text-white">No. Telp</h3>
                <p>(0821) 888888</p>
                <h3 class="footer-heading mb-4 text-white">Fax</h3>
                <p>(+62)85213670833</p>
                <h3 class="footer-heading mb-4 text-white">Email</h3>
                <p>info@Kelompok7.com</p>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="footer-heading mb-4 text-white">Galeri</h3>
                        <ul class="list-unstyled">
                            <div class="row">
                                <?php 
                    $sql=mysqli_query($conn,"SELECT * FROM galeri");
                    foreach ($sql as $value) {
                      ?>
                                <div class="col-md-6">
                                    <li><img class="img-fluid" src="images/<?= $value['gambar']; ?>"></li>
                                </div>
                                <?php
                    }
                     ?>
                            </div>
                        </ul>
                    </div>

                </div>
            </div>
            <div class="col-md-4">
                <div class="col-md-12">
                    <h3 class="footer-heading mb-4 text-white">Social Media Icons</h3>
                </div>
                <div class="col-md-12">
                    <p>
                        <a href="https://www.facebook.com/" target="_blank" class="pb-2 pr-2 pl-0"><span
                                class="icon-facebook"></span></a>
                        <a href="https://www.twitter.com/" target="_blank" class="p-2"><span
                                class="icon-twitter"></span></a>
                        <a href="https://www.instagram.com/" target="_blank" class="p-2"><span
                                class="icon-instagram"></span></a>
                        <a href="https://www.whatsapp.com/" target="_blank" class="p-2"><span
                                class="icon-whatsapp"></span></a>
                        <a href="https://www.vimeo.com/" target="_blank" class="p-2"><span
                                class="icon-vimeo"></span></a>

                    </p>
                </div>
            </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
            <div class="col-md-12">
                <p>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy; <script data-cfasync="false"
                        src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
                    <script>
                    document.write(new Date().getFullYear());
                    </script> All Rights Reserved | Seven Hotel <i class="icon-heart text-primary"
                        aria-hidden="true"></i>

                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
            </div>

        </div>
    </div>
</footer>