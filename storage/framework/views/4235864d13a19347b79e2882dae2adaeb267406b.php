<section class="trending-podcast-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="section-title-wrap mb-5">
                    <h4 class="section-title">Available Challenges</h4>
                </div>
            </div>

            <!-- Easy Challenge Block -->
            <div class="col-lg-4 col-12 mb-4 mb-lg-0">
                <div class="custom-block custom-block-full">
                    <div class="custom-block-image-wrap">
                        <?php if(Auth::check()): ?> <!-- Check if user is authenticated -->
                            <a href="solve.html?difficulty=easy">
                                <img src="images/S.png" class="custom-block-image img-fluid" alt="Easy Challenge">
                            </a>
                        <?php else: ?>
                            <!-- Redirect unauthenticated users to the login page -->
                            <a href="<?php echo e(route('login')); ?>">
                                <img src="images/S.png" class="custom-block-image img-fluid" alt="Easy Challenge">
                            </a>
                        <?php endif; ?>
                    </div>
                    <div class="custom-block-info">
                        <h5 class="mb-2">
                            <?php if(Auth::check()): ?> <!-- Check if user is authenticated -->
                                <a href="solve.html?difficulty=easy">Easy Challenges</a>
                            <?php else: ?>
                                <!-- Redirect unauthenticated users to the login page -->
                                <a href="<?php echo e(route('login')); ?>">Login to Start Solving Challenges</a>
                            <?php endif; ?>
                        </h5>
                        <p class="mb-0">Solve easy coding challenges.</p>
                    </div>
                </div>
            </div>

            <!-- Medium Challenge Block -->
            <div class="col-lg-4 col-12 mb-4 mb-lg-0">
                <div class="custom-block custom-block-full">
                    <div class="custom-block-image-wrap">
                        <?php if(Auth::check()): ?> <!-- Check if user is authenticated -->
                            <a href="solve.html?difficulty=medium">
                                <img src="images/SM.png" class="custom-block-image img-fluid" alt="Medium Challenge">
                            </a>
                        <?php else: ?>
                            <!-- Redirect unauthenticated users to the login page -->
                            <a href="<?php echo e(route('login')); ?>">
                                <img src="images/SM.png" class="custom-block-image img-fluid" alt="Medium Challenge">
                            </a>
                        <?php endif; ?>
                    </div>
                    <div class="custom-block-info">
                        <h5 class="mb-2">
                            <?php if(Auth::check()): ?> <!-- Check if user is authenticated -->
                                <a href="solve.html?difficulty=medium">Medium Challenges</a>
                            <?php else: ?>
                                <!-- Redirect unauthenticated users to the login page -->
                                <a href="<?php echo e(route('login')); ?>">Login to Start Solving Challenges</a>
                            <?php endif; ?>
                        </h5>
                        <p class="mb-0">Tackle medium level coding problems.</p>
                    </div>
                </div>
            </div>

            <!-- Hard Challenge Block -->
            <div class="col-lg-4 col-12">
                <div class="custom-block custom-block-full">
                    <div class="custom-block-image-wrap">
                        <?php if(Auth::check()): ?> <!-- Check if user is authenticated -->
                            <a href="solve.html?difficulty=hard">
                                <img src="images/SH.png" class="custom-block-image img-fluid" alt="Hard Challenge">
                            </a>
                        <?php else: ?>
                            <!-- Redirect unauthenticated users to the login page -->
                            <a href="<?php echo e(route('login')); ?>">
                                <img src="images/SH.png" class="custom-block-image img-fluid" alt="Hard Challenge">
                            </a>
                        <?php endif; ?>
                    </div>
                    <div class="custom-block-info">
                        <h5 class="mb-2">
                            <?php if(Auth::check()): ?> <!-- Check if user is authenticated -->
                                <a href="solve.html?difficulty=hard">Hard Challenges</a>
                            <?php else: ?>
                                <!-- Redirect unauthenticated users to the login page -->
                                <a href="<?php echo e(route('login')); ?>">Login to Start Solving Challenges</a>
                            <?php endif; ?>
                        </h5>
                        <p class="mb-0">Take on the hardest coding challenges.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php /**PATH /home/tonny/Laravel/prog/assignment4/projectsql/resources/views/home/description.blade.php ENDPATH**/ ?>