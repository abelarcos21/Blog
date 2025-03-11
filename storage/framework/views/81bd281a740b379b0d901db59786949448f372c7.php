<?php $__env->startSection('header'); ?>

    <section class="content-header">
     <h1>
      Posts Favoritos
      <small>Listado</small>
      </h1>
      <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
      <li class="active">Here</li>
        </ol>
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
    
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo e(asset('/adminlte/plugins/datatables/dataTables.bootstrap.css')); ?>">
<?php $__env->stopPush(); ?>


<?php $__env->startSection('content'); ?>

<section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box box-info">
              <div class="box-header">
                <h3 class="box-title">Listado de publicaciones <span class="badge bg-secondary"><?php echo e($posts->count()); ?></span></h3>
                
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="posts-table" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Titulo</th>
                    <th>Autor</th>
                    <th><i class="fa fa-heart-o fa-2x fa-lg"></i></th>
                    
                    <th><i class="fa fa-eye fa-2x fa-lg"></i></th>
                    
                    <th>Created_at</th>
                    <th>Acciones</th>
                    
                   
                  </tr>
                  </thead>
                  <tbody>
                    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <tr>
                            <td><?php echo e($key + 1); ?></td>
                            <td><?php echo e(str_limit($post->title, 20)); ?></td>
                            <td><?php echo e($post->user->name); ?></td>
                            <td><?php echo e($post->favorite_to_users->count()); ?></td>
                            <td><?php echo e($post->view_count); ?></td>
                            <td><?php echo e($post->created_at->format('M/d/Y')); ?></td>
                            <td>
                              <a href="#" class="btn btn-default btn-xs"><i class="fa fa-eye"></i></a>
                              <a href="" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
                              <form action="" method="POST" style="display: inline">
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

<?php $__env->startPush('js'); ?>
   
    <!-- DataTables -->
    <script src=" <?php echo e(asset('/adminlte/plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/adminlte/plugins/datatables/dataTables.bootstrap.min.js')); ?>"></script>

    <!-- datatable script -->
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
<?php echo $__env->make('autor.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Blog\resources\views/autor/favorito.blade.php ENDPATH**/ ?>