<?php $__env->startSection('header'); ?>

    <section class="content-header">
        <h1>
        Posts
        <small>Crear Publicacion</small>
        </h1>
        <ol class="breadcrumb">
        <li><a href="<?php echo e(route('autor.dashboard')); ?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href=""><i class="fa fa-list"></i> Posts</a></li>
        <li class="active">Crear</li> 
        </ol>
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('stylus'); ?>
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="<?php echo e(asset('adminlte/plugins/datepicker/datepicker3.css')); ?>">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo e(asset('adminlte/plugins/select2/select2.min.css')); ?>">

<?php $__env->stopPush(); ?>
    
<?php $__env->startSection('content'); ?>

    <form action="<?php echo e(route('autor.posts.update', $post)); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
        <div class="col-md-8">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">Crear una publicacion</h3>
            </div>
        
            <div class="box-body">
            <div class="form-group <?php echo e($errors->has('title') ? 'has-error' : ''); ?>">
                    <label >titulo de la publicacion</label>
                    <input value="<?php echo e(old('title', $post->title)); ?>" class="form-control" name="title" placeholder="ingresa el titulo" >
                    <?php echo $errors->first('title', '<span class="help-block">:message</span>'); ?>

            </div>

            <div class="form-group <?php echo e($errors->has('body') ? 'has-error' : ''); ?>">
                    <label>Contenido de la publicaion</label>
                    <textarea name="body" id="editor" class="form-control" rows="10" placeholder="ingresa el contenido"><?php echo e(old('body', $post->body)); ?></textarea>
                    <?php echo $errors->first('body', '<span class="help-block">:message</span>'); ?>

                </div>

            </div>
        </div>
        </div>

        <div class="col-md-4">
            <div class="box box-info">
                
                <div class="box-body">
                    

                    

                        <div class="form-group <?php echo e($errors->has('category') ? 'has-error' : ''); ?>">
                        <label >Categorias</label>
                        <select name="category" class="form-control">
                            <option value="">Selecciona una categoria</option>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($category->id); ?>"
                                    <?php echo e(old('category', $post->category_id) == $category->id ? 'selected' : ''); ?>


                                    ><?php echo e($category->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php echo $errors->first('category', '<span class="help-block">:message</span>'); ?>


                    </div>

                    <div class="form-group <?php echo e($errors->has('tags') ? 'has-error' : ''); ?>">           
                        <label >Etiquetas</label>
                        <select name="tags[]" class="form-control select2" multiple="multiple" data-placeholder="Seleciona una o mas etiquetas" style="width: 100%;">
                            
                            <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option <?php echo e(collect(old('tags', $post->tags->pluck('id') ))->contains($tag->id) ? 'selected' : ''); ?> value="<?php echo e($tag->id); ?>"><?php echo e($tag->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php echo $errors->first('tags', '<span class="help-block">:message</span>'); ?>

                    </div>

                    <div class="form-group">

                        <input type="file" name="image">

                    </div>

                    <div class="form-group">
                        
                        <button type="submit" class=" btn-block btn btn-primary form-control">Guardar Publicacion</button>

                    </div>
        
                </div>
            </div>

        </div>
    </form>


<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>

    <!-- CK Editor -->
    <script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
    <!-- Select2 -->
    <script src="<?php echo e(asset('adminlte/plugins/select2/select2.full.min.js')); ?>"></script>
    <!-- bootstrap datepicker -->
    <script src="<?php echo e(asset('adminlte/plugins/datepicker/bootstrap-datepicker.js')); ?>"></script>

    <script>

        // Date picker fechas
        $('#datepicker').datepicker({
            autoclose: true
        });

        //Initialize Select2 Elements
        $(".select2").select2();

        //Initialize Editor de contenido
        CKEDITOR.replace('editor');

    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('autor.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Blog\resources\views/autor/posts/edit.blade.php ENDPATH**/ ?>