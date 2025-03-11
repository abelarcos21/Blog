<?php $__env->startSection('title','Home'); ?>

<?php $__env->startPush('css'); ?>

    <link href="<?php echo e(asset('frontend/css/home/styles.css')); ?>" rel="stylesheet">

    <link href="<?php echo e(asset('frontend/css/home/responsive.css')); ?>" rel="stylesheet">
     
    
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/barrasocial/main.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontendcss/barrasocial/icomoon.css')); ?>">
    

    <style>
        .favorite_posts{
            color: blue;
        }

        /* .div .blog-area section { display:none; }  BOTON CARGAR MAS*/ 
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>


    <div class="social-bar">
        <ul>
            <li><a href="http://www.facebook.com/falconmasters" target="_blank" class="icon-facebook"></a></li>
            <li><a href="http://www.twitter.com/falconmasters" target="_blank" class="icon-twitter"></a></li>
            <li><a href="http://www.googleplus.com/falconmasters" target="_blank" class="icon-googleplus"></a></li>
            <li><a href="http://www.pinterest.com/falconmasters" target="_blank" class="icon-pinterest"></a></li>
            <li><a href="mailto:contacto@falconmasters.com" class="icon-mail"></a></li>
        </ul>
    </div>
    
    <div class="main-slider">
        <div class="swiper-container position-static" data-slide-effect="slide" data-autoheight="false"
             data-swiper-speed="500" data-swiper-autoplay="10000" data-swiper-margin="0" data-swiper-slides-per-view="4"
             data-swiper-breakpoints="true" data-swiper-loop="true" >
            <div class="swiper-wrapper">

               <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="swiper-slide">
                        <a class="slider-category" href="<?php echo e(route('category.show',$category->url)); ?>">
                            <div class="blog-image"><img src="<?php echo e(asset($category->image)); ?> " alt="<?php echo e($category->name); ?>"></div>

                            <div class="category">
                                <div class="display-table center-text">
                                    <div class="display-table-cell">
                                        <h3><b><?php echo e($category->name); ?></b></h3>
                                    </div>
                                </div>
                            </div>

                        </a>
                    </div><!-- swiper-slide -->
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div><!-- swiper-wrapper -->

        </div><!-- swiper-container -->

    </div><!-- slider -->

    <section class="blog-area section">
       
        <div class="container">
           
            <div class="row">

                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100">
                            <div class="single-post post-style-1">
                                <?php if($post->image): ?> 
                                
                                    <div class="blog-image"><img src=" /storage/<?php echo e($post->image); ?>" alt="<?php echo e($post->title); ?>"></div>
                                    
                                   
                                <?php endif; ?>                   
                                <a class="avatar" href="">
                                    <img src="/storage/<?php echo e($post->user->image); ?>

                                    " alt="Profile Image">
                                </a>

                                <div class="blog-info">

                                    <h4 class="title"><a href="<?php echo e(route('posts.show',$post->url)); ?>"><b><?php echo e($post->title); ?></b></a></h4>
                                   
                                    <ul class="post-footer">

                                        <li>
                                            <?php if(auth()->guard()->guest()): ?>
                                                <a href="javascript:void(0);" onclick="toastr.info('To add favorite list. You need to login first.','Info',{
                                                    closeButton: true,
                                                    progressBar: true,
                                                })"><i class="ion-heart"></i></a>
                                            <?php else: ?>
                                                <a href="javascript:void(0);" onclick="document.getElementById('favorite-form-<?php echo e($post->id); ?>').submit();"
                                                   class=""><i class="ion-heart"></i></a>

                                                <form id="favorite-form-" method="POST" action="" style="display: none;">
                                                    <?php echo csrf_field(); ?>
                                                </form>
                                            <?php endif; ?>

                                        </li>
                                        <li>
                                            <a href="#"><i class="ion-chatbubble"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="ion-eye"></i><?php echo e($post->view_count); ?></a>
                                        </li>
                                    </ul>

                                </div><!-- blog-info -->
                            </div><!-- single-post -->
                        </div><!-- card -->
                    </div><!-- col-lg-4 col-md-6 -->
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                
                

            </div><!-- row -->

        </div><!-- container -->
    </section><!-- section -->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <script>

        //BOTON CARGAR MAS
        // $(function(){
        //     $("div").slice(0, 10).show(); // select the first ten
        //     $("#load").click(function(e){ // click event for load more
        //         e.preventDefault();
        //         $("div:hidden").slice(0, 10).show(); // select next 10 hidden divs and show them
        //         if($("div:hidden").length == 0){ // check if any hidden divs still exist
        //             alert("No more divs"); // alert if there are none left
        //         }
        //     });
        // });

        //CARGAR CONTENIDO DINAMICO AL HACER SCROLL


    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Blog\resources\views/Pages/home.blade.php ENDPATH**/ ?>