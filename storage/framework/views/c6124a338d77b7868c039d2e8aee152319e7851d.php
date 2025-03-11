<?php $__env->startSection('content'); ?>

    <?php $__env->startSection('header'); ?>

        
        <section class="content-header">
            <h1>
                Dashboard Autor
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>

    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('control'); ?>
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                  <div class="inner">
                    <h3><?php echo e($posts->count()); ?></h3>
      
                    <p>Total Posts</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-reorder"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                  <div class="inner">
                    <h3><?php echo e(auth()->user()->favorite_posts()->count()); ?><sup style="font-size: 20px"></sup></h3>
      
                    <p>Total Favoritos</p>
                  </div>
                  <div class="icon">
                        <i class="fa fa-heart"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                  <div class="inner">
                    <h3><?php echo e($total_pending_posts); ?></h3>
      
                    <p>Total Posts Pendientes</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-check-square"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                  <div class="inner">
                    <h3><?php echo e($all_views); ?></h3>
      
                    <p>Total Vistas</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-eye"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
            </div>
            <!-- /.row -->
           
      
        </section>
    <?php $__env->stopSection(); ?>

    <?php $__env->startPush('styles'); ?>
        <!-- DataTables -->
        <link rel="stylesheet" href="<?php echo e(asset('adminlte/plugins/datatables/dataTables.bootstrap.css')); ?>">

    <?php $__env->stopPush(); ?>

    <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box box-info">
              <div class="box-header">
                <h3 class="box-title">Listado de publicaciones <span class="badge bg-secondary"><?php echo e($posts->count()); ?></span></h3>
                <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Crear Publicacion</button>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="posts-table" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                          <th>#</th>
                          <th>Titulo</th>
                          <th>Vistas</th>
                          <th>Favoritos</th>
                          <th>Comentarios</th>
                          <th>Status</th>
                          <th>Acciones</th>
                        </tr>
                    </thead>
                  <tbody>
                      <?php $__empty_1 = true; $__currentLoopData = $popular_posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                      <tr>
                        <td><?php echo e($post->id); ?></td>
                        <td><?php echo e($post->title); ?></td>
                        <td><?php echo e($post->view_count); ?></td>
                        <td><?php echo e($post->favorite_to_users_count); ?></td>
                        <td><?php echo e($post->comments_count); ?></td>
                        <td>
                          <?php if($post->status == true): ?>
                              <span class="label bg-green">Publicado</span>
                          <?php else: ?>
                              <span class="label bg-red">Pendiente</span>
                          <?php endif; ?>
                        </td>
                        <td>
                          <a href="#" class="btn btn-default btn-xs"><i class="fa fa-eye"></i></a>
                          <a href="<?php echo e(route('autor.posts.edit', $post)); ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
                          <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-times"></i></a>
                        </td> 
                      </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
  
                      <h3 class="box-title">❗ No hay posts ☹️</h3>
  
                    <?php endif; ?>
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
     <script src=" <?php echo e(asset('adminlte/plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
     <script src="<?php echo e(asset('adminlte/plugins/datatables/dataTables.bootstrap.min.js')); ?>"></script>

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
<?php echo $__env->make('autor.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Blog\resources\views/autor/dashboard.blade.php ENDPATH**/ ?>