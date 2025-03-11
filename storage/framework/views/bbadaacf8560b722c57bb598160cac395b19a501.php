<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo $__env->yieldContent('meta-title', config('app.name') ." | Blog"); ?></title>
    <meta name="description" content="<?php echo $__env->yieldContent('meta-content', 'Este es el Blog de CodyDev'); ?>">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">

    <!-- Stylesheets -->
    <link href="<?php echo e(asset('frontend/css/bootstrap.css')); ?>" rel="stylesheet">

   

    <link href="<?php echo e(asset('frontend/css/swiper.css')); ?>" rel="stylesheet">

    <link href="<?php echo e(asset('frontend/css/ionicons.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <?php echo $__env->yieldPushContent('css'); ?>
</head>
<body>


<?php echo $__env->make('layouts.frontend.partial.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->yieldContent('content'); ?>

<?php echo $__env->make('layouts.frontend.partial.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<!-- SCIPTS -->
<script src="<?php echo e(asset('frontend/js/jquery-3.1.1.min.js')); ?>"></script>

<script src="<?php echo e(asset('frontend/js/tether.min.js')); ?>"></script>

<script src="<?php echo e(asset('frontend/js/bootstrap.js')); ?>"></script>
<script src="<?php echo e(asset('frontend/js/swiper.js')); ?>"></script>
<script src="<?php echo e(asset('frontend/js/scripts.js')); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

 <?php echo Toastr::message(); ?> 

<script>
    <?php if($errors->any()): ?>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        toastr.error('<?php echo e($error); ?>','Error',{
            closeButton:true,
            progressBar:true,
        });
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
</script>

<?php echo $__env->yieldPushContent('js'); ?>
</body>
</html>

<?php /**PATH C:\laragon\www\Blog\resources\views/layouts/frontend/app.blade.php ENDPATH**/ ?>