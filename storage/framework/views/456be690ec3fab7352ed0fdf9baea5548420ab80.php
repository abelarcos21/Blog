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

<?php $__env->startPush('css'); ?>
    
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
                                    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php $__currentLoopData = $post->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>
                                                <div class="media">
                                                    <div class="media-left">
                                                        <a href="#">
                                                        <img class="media-object" src="../storage/perfil/<?php echo e($comment->user->image); ?>" width="64" height="64">
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <h4 class="media-heading"><?php echo e($comment->user->name); ?> <small><?php echo e($comment->created_at->diffForHumans()); ?></small>
                                                        </h4>
                                                        <p><?php echo e($comment->comment); ?></p>
                                                        <a target="_blank" href="">Reply</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="media">
                                                    <div class="media-right">
                                                        <a target="_blank" href="">
                                                            <img class="media-object" src="../storage/post/<?php echo e($comment->post->image); ?>" width="64" height="64">
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <a target="_blank" href="">
                                                            <h4 class="media-heading"><?php echo e(str_limit($comment->post->title,'40')); ?></h4>
                                                        </a>
                                                        <p>by <strong><?php echo e($comment->post->user->name); ?></strong></p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-danger waves-effect" onclick="deleteComment(<?php echo e($comment->id); ?>)">
                                                    <i class="material-icons">Eliminar</i>
                                                </button>
                                                <form id="delete-form-<?php echo e($comment->id); ?>" method="POST" action="" style="display: none;">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                </form>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
    
    <script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
    <script type="text/javascript">
        function deleteComment(id) {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-'+id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'Your data is safe :)',
                        'error'
                    )
                }
            })
        }
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('autor.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Blog\resources\views/autor/comentario.blade.php ENDPATH**/ ?>