<?php $__env->startSection('header'); ?>

  <section class="content-header">
    <h1>
      Categorias
      <small>Crear</small>
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

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                <h3 class="box-title">Nueva Categoria</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form action="<?php echo e(route('admin.category.store')); ?> " method="POST" role="form" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nombre</label>
                        <input name="name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Categoria">
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputFile">Imagen</label>
                        <input name="image" type="file" id="exampleInputFile">

                    </div>
                    
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Crear</button>
                </div>
                </form>
          </div>
          <!-- /.box -->

        </div>
        
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->


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
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Blog\resources\views/admin/categorias/create.blade.php ENDPATH**/ ?>