<?php $__env->startSection('title','Tag'); ?>

<?php $__env->startPush('css'); ?>
    <link href="<?php echo e(asset('frontend/css/category/styles.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('frontend/css/category/responsive.css')); ?>" rel="stylesheet">
    <style>
        .favorite_posts{
            color: blue;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="slider display-table center-text">
        <h1 class="title display-table-cell"><b><?php echo e($tag->name); ?></b></h1>
    </div><!-- slider -->

    <section class="blog-area section">
        <div class="container">

            <div class="row">
                <?php if($posts->count() > 0): ?>
                    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="card h-100">
                                <div class="single-post post-style-1">

                                    <div class="blog-image"><img src="/storage/<?php echo e($post->image); ?> "></div>

                                    <a class="avatar" href=""><img src="/storage/<?php echo e($post->user->image); ?>" alt="Profile Image"></a>

                                    <div class="blog-info">

                                        <h4 class="title"><a href=""><b><?php echo e($post->title); ?></b></a></h4>

                                        <ul class="post-footer">

                                            <li>
                                                <?php if(auth()->guard()->guest()): ?>
                                                    <a href="javascript:void(0);" onclick="toastr.info('To add favorite list. You need to login first.','Info',{
                                                        closeButton: true,
                                                        progressBar: true,
                                                    })"><i class="ion-heart"></i><?php echo e($post->favorite_to_users->count()); ?></a>
                                                <?php else: ?>
                                                    <a href="javascript:void(0);" onclick="document.getElementById('favorite-form-<?php echo e($post->id); ?>').submit();"
                                                       class="<?php echo e(!Auth::user()->favorite_posts->where('pivot.post_id',$post->id)->count()  == 0 ? 'favorite_posts' : ''); ?>"><i class="ion-heart"></i><?php echo e($post->favorite_to_users->count()); ?></a>

                                                    <form id="favorite-form-<?php echo e($post->id); ?>" method="POST" action="" style="display: none;">
                                                        <?php echo csrf_field(); ?>
                                                    </form>
                                                <?php endif; ?>

                                            </li>
                                            <li><a href="#"><i class="ion-chatbubble"></i><?php echo e($post->comments->count()); ?></a></li>
                                            <li><a href="#"><i class="ion-eye"></i><?php echo e($post->view_count); ?></a></li>
                                        </ul>

                                    </div><!-- blog-info -->
                                </div><!-- single-post -->
                            </div><!-- card -->
                        </div><!-- col-lg-4 col-md-6 -->
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <div class="col-lg-12 col-md-6">
                        <div class="card h-100">
                            <div class="single-post post-style-1">
                                <div class="blog-info">
                                    <h4 class="title">
                                        <strong> No se encontraron Posts :(</strong>
                                    </h4>
                                </div><!-- blog-info -->
                            </div><!-- single-post -->
                        </div><!-- card -->
                    </div><!-- col-lg-4 col-md-6 -->
                <?php endif; ?>


            </div><!-- row -->

            

        </div><!-- container -->
    </section><!-- section -->

<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Blog\resources\views/etiquetas/tag.blade.php ENDPATH**/ ?>