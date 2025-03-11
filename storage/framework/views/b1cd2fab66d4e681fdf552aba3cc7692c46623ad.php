<footer>

    <div class="container">
        <div class="row">

            <div class="col-lg-4 col-md-6">
                <div class="footer-section">

                    
                    <p class="copyright"><?php echo e(config('app.name')); ?> @ 2021. All rights reserved.</p>
                    <p class="copyright">Designed by <a href="#" target="_blank">abelarcos</a> and Develop by</p>
                    <ul class="icons">
                        <li><a target="_blank" href="https://www.facebook.com/Abel-Arcos-P%C3%A9rez-109109760622159"><i class="ion-social-facebook-outline"></i></a></li>
                        <li><a target="_blank" href="https://twitter.com/abelarcosperes"><i class="ion-social-twitter-outline"></i></a></li>
                        <li><a target="_blank" href="https://www.instagram.com/abelarcosp/"><i class="ion-social-instagram-outline"></i></a></li>

                    </ul>

                </div><!-- footer-section -->
            </div><!-- col-lg-4 col-md-6 -->

            <div class="col-lg-4 col-md-6">
                <div class="footer-section">
                    <h4 class="title"><b>Categorias</b></h4>
                    <ul>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><a href="<?php echo e(route('category.show', $category->url)); ?>"><?php echo e($category->name); ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div><!-- footer-section -->
            </div><!-- col-lg-4 col-md-6 -->

            <div class="col-lg-4 col-md-6">
                <div class="footer-section">

                    <h4 class="title"><b>SUSCRIBETE</b></h4>
                    <div class="input-area">
                        <form method="POST" action="">
                            <?php echo csrf_field(); ?>
                            <input class="email-input" name="email" type="email" placeholder="Escribe tu email">
                            <button class="submit-btn" type="submit"><i class="icon ion-ios-email-outline"></i></button>
                        </form>
                    </div>

                </div><!-- footer-section -->
            </div><!-- col-lg-4 col-md-6 -->

        </div><!-- row -->
    </div><!-- container -->
</footer><?php /**PATH C:\laragon\www\Blog\resources\views/layouts/frontend/partial/footer.blade.php ENDPATH**/ ?>