<!-- Modal -->
<form action="<?php echo e(route('posts.store')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Agrega el nuevo titulo de tu Publicacion</h4>
          </div>
          <div class="modal-body">
            <div class="form-group <?php echo e($errors->has('title') ? 'has-error' : ''); ?>">
              
              <input value="<?php echo e(old('title')); ?>" class="form-control" name="title" placeholder="ingresa el titulo" >
              <?php echo $errors->first('title', '<span class="help-block">:message</span>'); ?>

            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button  class="btn btn-primary">Crear Publicacion</button>
          </div>
        </div>
      </div>
    </div>
</form><?php /**PATH C:\laragon\www\Blog\resources\views/admin/posts/create.blade.php ENDPATH**/ ?>