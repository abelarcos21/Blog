<?php $__env->startSection('meta-title', $post->title ); ?>



<?php $__env->startPush('css'); ?>
    <link href="<?php echo e(asset('frontend/css/single-post/styles.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('frontend/css/single-post/responsive.css')); ?>" rel="stylesheet">
    <style>
        .header-bg{
            height: 400px;
            width: 100%;

            background-image: url('/storage/<?php echo e($post->image); ?>');

            background-size: cover;
        }
        .favorite_posts{
            color: blue;
        }
    </style>
<?php $__env->stopPush(); ?>
 
<?php $__env->startSection('content'); ?>
    <div class="header-bg">
    </div><!-- slider -->

    <section class="post-area section">
        <div class="container">

            <div class="row">

                <div class="col-lg-8 col-md-12 no-right-padding">

                    <div class="main-post">

                        <div class="blog-post-inner">

                            <div class="post-info">

                                <div class="left-area">
                                    <a class="avatar" href="#"><img src="/storage/<?php echo e($post->user->image); ?>" alt="Profile Image"></a>
                                </div>

                                <div class="middle-area">
                                <a class="name date" href=""><b>Publicado por <?php echo e($post->user->name); ?></b></a>
                                    <h6 class="date"> hace <?php echo e($post->created_at->timespan()); ?></h6>
                                </div>

                            </div><!-- post-info -->

                            <h3 class="title"><a href="#"><b><?php echo e(str_slug($post->title)); ?></b></a></h3>

                            <div class="para">

                                <?php echo $post->body; ?>

                            </div>

                            <ul class="tags">
                                <?php $__currentLoopData = $post->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><a href=" <?php echo e(route('tag.show', $tag->url)); ?>"><i class="ion-pricetags"></i> <?php echo e($tag->name); ?></a></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div><!-- blog-post-inner -->

                        <div class="post-icons-area">
                            <ul class="post-icons">
                                <li>
                                    <?php if(auth()->guard()->guest()): ?>
                                        <a href="javascript:void(0);" onclick="toastr.info('Para agregar a tu lista de  favoritos. Debes iniciar sesion .','Info',{
                                                    closeButton: true,
                                                    progressBar: true,
                                                })"><i class="ion-heart"></i><?php echo e($post->favorite_to_users->count()); ?></a>
                                    <?php else: ?>
                                        <a href="javascript:void(0);" onclick="document.getElementById('favorite-form-<?php echo e($post->id); ?>').submit();"
                                           class="<?php echo e(!Auth::user()->favorite_posts->where('pivot.post_id', $post->id)->count()  == 0 ? 'favorite_posts' : ''); ?>"><i class="ion-heart"></i><?php echo e($post->favorite_to_users->count()); ?></a>

                                        <form id="favorite-form-<?php echo e($post->id); ?>" method="POST" action="<?php echo e(route('post.favorito',$post->id)); ?>" style="display: none;">
                                            <?php echo csrf_field(); ?>
                                        </form>
                                    <?php endif; ?>

                                </li>
                                <li><a href="#"><i class="ion-chatbubble"></i><?php echo e($post->comments->count()); ?></a></li>
                                <li><a href="#"><i class="ion-eye"></i> <?php echo e($post->view_count); ?></a></li>
                            </ul>

                            <ul class="icons">
                                <li>Compartir : </li>
                                <li><a target="_blank" href="https://www.facebook.com/sharer.php?u=<?php echo e(request()->fullUrl()); ?>"><i class="ion-social-facebook"></i></a></li>
                                <li><a target="_blank" href="https://twitter.com/intent/tweet?url=<?php echo e(request()->fullUrl()); ?>&text=<?php echo e($post->title); ?>&via=CodyDev&hashtags=CodyDev"><i class="ion-social-twitter"></i></a></li>

                            </ul>
                        </div>


                    </div><!-- main-post -->
                </div><!-- col-lg-8 col-md-12 -->

                <div class="col-lg-4 col-md-12 no-left-padding">

                    <div class="single-post info-area">

                        <div class="sidebar-area about-area">
                            <h4 class="title"><b>Acerca del Autor</b></h4>
                            <p> <?php echo e($post->user->about); ?> </p>
                        </div>

                        <div class="tag-area">

                            <h4 class="title"><b>Categoria</b></h4>
                            <ul>
                                <li><a href="<?php echo e(route('category.show', $post->category->url)); ?>"><?php echo e($post->category->name); ?></a></li>

                            </ul>

                        </div><!-- subscribe-area -->

                    </div><!-- info-area -->

                </div><!-- col-lg-4 col-md-12 -->

            </div><!-- row -->

        </div><!-- container -->
    </section><!-- post-area -->


    <section class="recomended-area section">
        <div class="container">
            <div class="row">
                <?php $__currentLoopData = $postsrandom; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $randompost): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100">
                            <div class="single-post post-style-1">

                                <div class="blog-image"><img src="/storage/<?php echo e($randompost->image); ?>

                                    " alt=""></div>

                                <a class="avatar" href="#"><img src="/storage/<?php echo e($randompost->user->image); ?>" alt="Profile Image"></a>

                                <div class="blog-info">

                                    <h4 class="title"><a href="<?php echo e($randompost->url); ?>"><b> <?php echo e($randompost->title); ?></b></a></h4>
                                    <h6 class="date"> <?php echo str_limit($post->body, 105);; ?></h6>
                                    <ul class="post-footer">

                                        <li>
                                            <?php if(auth()->guard()->guest()): ?>
                                                <a href="javascript:void(0);" onclick="toastr.info('Para agregar a tu lista de favoritos. Debes iniciar Sesion .','Info',{
                                                    closeButton: true,
                                                    progressBar: true,
                                                })"><i class="ion-heart"></i><?php echo e($randompost->favorite_to_users->count()); ?></a>
                                            <?php else: ?>
                                                <a href="javascript:void(0);" onclick="document.getElementById('favorite-form-<?php echo e($randompost->id); ?>').submit();"
                                                   class=""><i class="ion-heart"></i><?php echo e($post->favorite_to_users->count()); ?></a>

                                                <form id="favorite-form-<?php echo e($randompost->id); ?>" method="POST" action="" style="display: none;">
                                                    <?php echo csrf_field(); ?>
                                                </form>
                                            <?php endif; ?>

                                        </li>
                                        <li><a href="#"><i class="ion-chatbubble"></i><?php echo e($randompost->comments->count()); ?></a></li>
                                        <li><a href="#"><i class="ion-eye"></i><?php echo e($randompost->view_count); ?></a></li>
                                    </ul>

                                </div><!-- blog-info -->
                            </div><!-- single-post -->
                        </div><!-- card -->
                    </div><!-- col-lg-4 col-md-6 -->

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div><!-- row -->

        </div><!-- container -->
    </section>

    <section class="comment-section">
        <div class="container">
        <h4><b>Comentarios Post</b></h4>
        <div class="row">

            <div class="col-lg-8 col-md-12">
                <div class="comment-form">
                    <?php if(auth()->guard()->guest()): ?>
                        <p>Para Agregar Un Comentario. Debes Iniciar Sesion. <a href="<?php echo e(route('login')); ?>">Login</a></p>
                    <?php else: ?>
                        <form method="POST" action="<?php echo e(route('comentario.store',$post->id)); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-sm-12">
                                    <textarea name="comment" rows="2" class="text-area-messge form-control"
                                            placeholder="Ingresa tu comentario" aria-required="true" aria-invalid="false" required></textarea >
                                </div><!-- col-sm-12 -->
                                <div class="col-sm-12">
                                    <button class="submit-btn" type="submit" id="form-submit"><b>Agregar Comentario</b></button>
                                </div><!-- col-sm-12 -->

                            </div><!-- row -->
                        </form>
                    <?php endif; ?>
                </div><!-- comment-form -->

                <h4><b>Comentarios(<?php echo e($post->comments()->count()); ?>)</b></h4>

                <?php $__empty_1 = true; $__currentLoopData = $post->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="commnets-area ">

                        <div class="comment">

                            <div class="post-info">

                                <div class="left-area">
                                    <a class="avatar" href="#"><img src="/storage/<?php echo e($comment->user->image); ?>

                                        " alt="Profile Image"></a>
                                </div>

                                <div class="middle-area">
                                    <a class="name" href="#"><b><?php echo e($comment->user->name); ?></b></a>
                                    <h6 class="date">hace  <?php echo e($comment->created_at->timespan()); ?></h6>
                                </div>

                            </div><!-- post-info -->

                            <p><?php echo e($comment->comment); ?></p>

                        </div>

                    </div><!-- commnets-area -->

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                    <div class="commnets-area ">

                        <div class="comment">
                            <p>No Hay comentarios. :)</p>
                        </div>
                    </div>

                <?php endif; ?>

            </div><!-- col-lg-8 col-md-12 -->

        </div><!-- row -->
        </div>
    </section>
    

<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>

<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Blog\resources\views/posts/postdetails.blade.php ENDPATH**/ ?>