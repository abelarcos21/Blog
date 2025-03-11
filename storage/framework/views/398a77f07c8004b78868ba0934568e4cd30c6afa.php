<?php $__env->startSection('header'); ?>
    <section class="content-header">
        <h1>
          Posts Pendientes
          <small>Listado</small>
          </h1>
          <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
          <li class="active">Here</li>
        </ol>
      </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box box-info">
              <div class="box-header">
                <h3 class="box-title"><span class="badge bg-secondary"><?php echo e($posts->count()); ?></span></h3>
                
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="posts-table" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Titulo</th>
                    <th>Autor</th>
                    <th><i class="fa fa-eye fa-2x fa-lg"></i></th>
                    <th>Is Approved</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Acciones</th>
                    
                   
                  </tr>
                  </thead>
                  <tbody>
                    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <tr>
                            <td><?php echo e($key + 1); ?></td>
                            <td><?php echo e(str_limit($post->title, 20)); ?></td>
                            <td><?php echo e($post->user->name); ?></td>
                            <td><?php echo e($post->view_count); ?></td>
                            <td>
                                <?php if($post->is_approved == true): ?>
                                    <span class="label bg-green">Aprobado</span>
                                <?php else: ?>
                                    <span class="label bg-red">Pendiente</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if($post->status == true): ?>
                                    <span class="label bg-green">Publicado</span>
                                <?php else: ?>
                                    <span class="label bg-red">Pendiente</span>
                                <?php endif; ?>
                            </td>
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

<?php $__env->startPush('scripts'); ?>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Blog\resources\views/admin/postspendientes.blade.php ENDPATH**/ ?>