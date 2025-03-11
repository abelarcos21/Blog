<ul class="sidebar-menu">
        <li class="header">Navegacion</li>
        <li <?php echo e(request()->is('autor') ? 'class=active' : ''); ?> class="active treeview">
        <a href="<?php echo e(route('autor.dashboard')); ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          
        </li>
  
          <li class="treeview" <?php echo e(request()->is('autor/posts*') ? 'active' : ''); ?>>
            <a href="<?php echo e(route('autor.dashboard')); ?>"><i class="glyphicon glyphicon-th-list"></i> <span>Posts</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
            <li <?php echo e(request()->is('autor/posts') ? 'class=active' : ''); ?>><a href="<?php echo e(route('autor.dashboard')); ?>"><i class="fa fa-eye"></i>Ver todos los posts</a></li>
            <li><a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil"></i>Crear un post</a></li>
            </ul>
          </li>

          <li class="treeview" <?php echo e(request()->is('autor/posts*') ? 'active' : ''); ?>>
            <a href="<?php echo e(route('comentario.index')); ?>"><i class="glyphicon glyphicon-comment"></i> <span>Comentarios</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            
          </li>

          <li class="treeview" <?php echo e(request()->is('autor/favorito*') ? 'active' : ''); ?>>
            <a href="<?php echo e(route('posts.favorito')); ?>"><i class="glyphicon glyphicon-heart"></i> <span>Posts Favoritos</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            
          </li>

          <li class="treeview" <?php echo e(request()->is('autor/posts*') ? 'active' : ''); ?>>
            <a href="<?php echo e(route('configuracion')); ?>"><i class="glyphicon glyphicon-wrench"></i> <span>Configuracion</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            
          </li>

          
    
      </ul><?php /**PATH C:\laragon\www\Blog\resources\views/autor/partials/nav.blade.php ENDPATH**/ ?>