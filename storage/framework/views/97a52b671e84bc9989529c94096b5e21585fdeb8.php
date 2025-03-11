<header>
    <div class="container-fluid position-relative no-side-padding">

        <a href="/" class="logo">CodyDev</a>

        <div class="menu-nav-icon" data-nav-menu="#main-menu"><i class="ion-navicon"></i></div>

        <ul class="main-menu visible-on-click" id="main-menu">
            <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
            <li><a href="">Posts</a></li>
            <?php echo $__env->make('layouts.frontend.partial.navigations.' . \App\User::navigation(), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            
        </ul><!-- main-menu -->

        <div class="src-area">
            <form method="GET" action="<?php echo e(route('posts.search')); ?>">
                <button class="src-btn" type="submit"><i class="ion-ios-search-strong"></i></button>
                <input class="src-input" value="<?php echo e(isset($query) ? $query : ''); ?>" name="query" type="text" placeholder="Buscar">
            </form>
        </div>

    </div><!-- conatiner -->
</header>
<?php /**PATH C:\laragon\www\Blog\resources\views/layouts/frontend/partial/header.blade.php ENDPATH**/ ?>