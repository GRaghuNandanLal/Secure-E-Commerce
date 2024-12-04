<footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12 mb-5 mb-lg-0">
                    <div class="subscribe-form-wrap">
                        <h6>Subscribe for Updates</h6>
                        <form class="custom-form subscribe-form" action="<?php echo e(route('uploademail')); ?>" method="POST" role="form">
                            <?php echo csrf_field(); ?> <!-- Laravel's CSRF token -->

                            <!-- Email input -->
                            <input type="email" name="subscribe" id="subscribe-email" pattern="[^ @]*@[^ @]*"
                                class="form-control" placeholder="Email Address" required="">

                            <!-- Submit Button -->
                            <div class="col-lg-12 col-12">
                                <button type="submit" class="form-control" id="submit">Subscribe</button>
                            </div>
                        </form>

                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-12 mb-4 mb-md-0 mb-lg-0">
                    <h6 class="site-footer-title mb-3">Contact</h6>
                    <p class="mb-2"><strong class="d-inline me-2">Phone:</strong> </p>
                    <p>
                        <strong class="d-inline me-2">Email:</strong>
                        <a href="mailto:inquiry@ecommerce.com">inquiry@ecommerce.com</a>
                    </p>
                </div>

                <div class="col-lg-3 col-md-6 col-12">
                  
                    <h6 class="site-footer-title mb-3">Follow Us</h6>
                    <ul class="social-icon">
                        <li class="social-icon-item">
                            <a href="#" class="social-icon-link bi-instagram"></a>
                        </li>
                        <li class="social-icon-item">
                            <a href="#" class="social-icon-link bi-twitter"></a>
                        </li>
                        <li class="social-icon-item">
                            <a href="#" class="social-icon-link bi-whatsapp"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="container pt-5">
            <div class="row align-items-center">
               
                <div class="col-lg-7 col-md-9 col-12">
                    <ul class="site-footer-links">
                        <li class="site-footer-link-item">
                            <a href="/" class="site-footer-link">Homepage</a>
                        </li>
                     
                    </ul>
                </div>
            </div>
        </div>
    </footer><?php /**PATH /home/tonny/Laravel/prog/assignment4/projectsql/resources/views/home/footer.blade.php ENDPATH**/ ?>