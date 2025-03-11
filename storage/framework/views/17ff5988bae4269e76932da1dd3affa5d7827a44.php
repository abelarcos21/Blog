<?php $__env->startSection('header'); ?>
    <section class="content-header">
        <h1>
        Comentarios
        <small>Listado</small>
        </h1>
        <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
        </ol>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>

    <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo e(asset('/adminlte/plugins/datatables/dataTables.bootstrap.css')); ?>">

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">

        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    
                    <div class="body">
                        <div class="table-responsive">
                            <table id="comentarios-table" class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                <tr>
                                    <th class="text-center">Informacion del comentario</th>
                                    <th class="text-center">Informacion del post</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                                </thead>
                                
                                <tbody>
                                    
                                        <?php $__currentLoopData = $comentarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $comentario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>
                                                <div class="media">
                                                    <div class="media-left">
                                                        <a href="#">
                                                        <img class="media-object" src="/storage/<?php echo e($comentario->user->image); ?>" width="64" height="64">
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <h4 class="media-heading"><?php echo e($comentario->user->name); ?> <small><?php echo e($comentario->created_at->diffForHumans()); ?></small>
                                                        </h4>
                                                        <p><?php echo e($comentario->comment); ?></p>
                                                        <a target="_blank" href="">Reply</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="media">
                                                    <div class="media-right">
                                                        <a target="_blank" href="">
                                                            <img class="media-object" src="/storage/<?php echo e($comentario->post->image); ?>" width="64" height="64">
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <a target="_blank" href="">
                                                            <h4 class="media-heading"><?php echo e(str_limit($comentario->post->title,'40')); ?></h4>
                                                        </a>
                                                        <p>by <strong><?php echo e($comentario->post->user->name); ?></strong></p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                
                                                <form method="POST" action="<?php echo e(route('admin.comentario.destroy',$comentario->id)); ?>" >
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button onclick="return confirm('Estas Seguro de eliminar el comentario')" class="btn btn-danger ">
                                                        <i class="fa fa-times"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table -->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>

    <!-- DataTables -->
    <script src=" <?php echo e(asset('/adminlte/plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/adminlte/plugins/datatables/dataTables.bootstrap.min.js')); ?>"></script>

    <script>
    
        $(function () {
      
            $('#comentarios-table').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true
            });
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Blog\resources\views/admin/comentarios.blade.php ENDPATH**/ ?>