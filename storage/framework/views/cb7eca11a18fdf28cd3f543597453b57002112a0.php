<?php $__env->startSection('header'); ?>

    <section class="content-header">
     <h1>
      Perfil
      <small><?php echo e(Auth::user()->name); ?></small>
      </h1>
      <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
      <li class="active">Here</li>
        </ol>
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="box box-primary">
                <div class="box-body box-profile">
                <?php if(Auth::user()->image): ?>
                    
                  <img class="profile-user-img img-responsive img-circle" src="/storage/<?php echo e(Auth::user()->image); ?>" alt="<?php echo e(Auth::user()->name); ?>">

                <?php endif; ?>

                <h3 class="profile-username text-center"><?php echo e(Auth::user()->name); ?></h3>

                <p class="text-muted text-center"><?php echo e(Auth::user()->about); ?></p>

                   
                </div>
                <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- About Me Box -->
                <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Acerca de mi</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <strong><i class="fa fa-book margin-r-5"></i> Educacion</strong>

                    <p class="text-muted">
                    B.S. Instituto Tecnologico de Campeche
                    </p>

                    <hr>

                    <strong><i class="fa fa-map-marker margin-r-5"></i> Direccion</strong>

                    <p class="text-muted">San Francisco de Campeche</p>

                    <hr>

                    <strong><i class="fa fa-pencil margin-r-5"></i> Habilidades</strong>

                    <p>
                    <span class="label label-danger">Laravel</span>
                    <span class="label label-success">Django</span>
                    <span class="label label-info">Javascript</span>
                    <span class="label label-success">Vuejs</span>
                    <span class="label label-warning">PHP</span>
                    <span class="label label-primary">Python</span>
                    </p>

                </div>
                <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        <!-- /.col -->
            <div class="col-md-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                        <li class="active"><a href="#settings" data-toggle="tab">Actualizar Perfil</a></li>
                        <li><a href="#cambiarpassword" data-toggle="tab">Cambiar Contraseña</a></li>
                    
                    
                </ul>
            <div class="tab-content">
        
                <div class="active tab-pane" id="settings">
                <form action="<?php echo e(route('admin.perfil.update')); ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
                    <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
                    <div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
                        <label for="inputName" class="col-sm-2 control-label">Nombre</label>
                        <div class="col-sm-10">
                        <input name="name" value="<?php echo e(old(Auth::user()->name, auth()->user()->name)); ?>" type="text" class="form-control" id="inputName" placeholder="Nombre">
                            <?php echo $errors->first('name', '<span class="help-block">:message</span>'); ?>

                        </div>
                    </div>
                <div class="form-group <?php echo e($errors->has('email') ? 'has-error' : ''); ?>">
                        <label for="inputName" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                        <input name="email" value="<?php echo e(old(Auth::user()->email, auth()->user()->email)); ?>" type="email" class="form-control" id="inputName" placeholder="Correo">
                            <?php echo $errors->first('email', '<span class="help-block">:message</span>'); ?>

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputExperience" class="col-sm-2 control-label">Avatar</label>
                        <div class="col-sm-10">
                            <input name="image" type="file" class="form-control" id="inputName" placeholder="Image">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputSkills" class="col-sm-2 control-label">Acerca de mi</label>
                        <div class="col-sm-10">
                        <textarea name="about" class="form-control" id="inputExperience" placeholder="Acerca de mi"><?php echo e(old(Auth::user()->about, auth()->user()->about )); ?></textarea>
                        </div>
                    </div>
                    
                    <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-danger">Actualizar</button>
                    </div>
                    </div>
                </form>
                </div>

                <div class=" tab-pane" id="cambiarpassword">
                    <form action="<?php echo e(route('admin.password.update')); ?>" method="POST" class="form-horizontal">
                        <?php echo csrf_field(); ?>  <?php echo method_field('PUT'); ?>
                        <div class="form-group">
                            <label for="inputName" class="col-sm-2 control-label">Contraseña Anterior</label>
        
                            <div class="col-sm-10">
                                <input name="old_password" type="password" class="form-control" id="inputName" placeholder="Contraseña anterior">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="col-sm-2 control-label">Nueva Contraseña</label>
        
                            <div class="col-sm-10">
                                <input name="password" type="password" class="form-control" id="inputEmail" placeholder="Nueva contraseña">
                            </div>
                            </div>
                        <div class="form-group">
                            <label for="inputName" class="col-sm-2 control-label">Confirmar Contraseña</label>

                            <div class="col-sm-10">
                                <input name="password_confirmation" type="password" class="form-control" id="inputName" placeholder="Confirmar contraseña">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-danger">Actualizar</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->

<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Blog\resources\views/admin/configuracion.blade.php ENDPATH**/ ?>