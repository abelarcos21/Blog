<?php $__env->startSection('header'); ?>

  <section class="content-header">
    <h1>
      Posts
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

    <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box box-info">
              <div class="box-header">
                <h3 class="box-title">Listado de publicaciones</h3>
                <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Crear Publicacion</button>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="posts-table" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Titulo</th>
                    <th>Acciones</th>
                    
                   
                  </tr>
                  </thead>
                  <tbody>
                    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <tr>
                            <td><?php echo e($post->id); ?></td>
                            <td><?php echo e($post->title); ?></td>
                            <td>
                            <a href="<?php echo e(route('posts.show', $post)); ?>" class="btn btn-default btn-xs"><i class="fa fa-eye"></i></a>
                              <a href="<?php echo e(route('admin.posts.edit', $post)); ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
                              <form action="<?php echo e(route('admin.posts.destroy', $post)); ?>" method="POST" style="display: inline">
                                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                <button onclick="return confirm('¿estas seguro de elimnar el post?')" class="btn btn-danger btn-xs"><i class="fa fa-times"></i></button>
                              </form>
                              
                            </td>
                        </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
                  
                </table>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->

            <!-- /.box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>

    <!-- DataTables -->
    <script src="<?php echo e(asset('/adminlte/plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/adminlte/plugins/datatables/dataTables.bootstrap.min.js')); ?>"></script>

    <!-- datatable script -->
    <script>
        $(function () {
         
          $('#posts-table').DataTable({
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
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Blog\resources\views/admin/posts/index.blade.php ENDPATH**/ ?>