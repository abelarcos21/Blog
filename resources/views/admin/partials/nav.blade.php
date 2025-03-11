<ul class="sidebar-menu">
    <li class="header">Navegacion</li>
    <!-- Optionally, you can add icons to the links -->
    <li {{ request()->is('admin') ? 'class=active' : ''}}><a href="{{ route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> <span>Inicio</span></a></li>
   
    <li class="treeview" {{request()->is('admin/posts*') ? 'active' : ''}}>
      <a href="#"><i class="fa fa-link"></i> <span>Blog</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
      <li {{request()->is('admin/posts') ? 'class=active' : ''}}><a href="{{ route('admin.posts.index')}}"><i class="fa fa-eye"></i>Ver todos los posts</a></li>
      <li><a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil"></i>Crear un post</a></li>
      </ul>
    </li>

    <li class="treeview" {{request()->is('admin/categorias*') ? 'active' : ''}}>
      <a href="{{ route('admin.category.index') }}"><i class="glyphicon glyphicon-tasks"></i> <span>Categorias</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
    </li>

    <li class="treeview" {{request()->is('admin/posts*') ? 'active' : ''}}>
    <a href="{{ route('admin.tag.index')}}"><i class="glyphicon glyphicon-tags"></i> <span>Etiquetas</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      
    </li>

    <li class="treeview" {{request()->is('admin/posts*') ? 'active' : ''}}>
      <a href="{{ route('admin.postpendiente.index')}}"><i class="glyphicon glyphicon-check"></i> <span>Posts Pendientes</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
    </li>

    <li class="treeview" {{request()->is('admin/posts*') ? 'active' : ''}}>
      <a href="{{ route('admin.comentario.index')}}"><i class="glyphicon glyphicon-comment"></i> <span>Comentarios</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
    </li>

    <li class="treeview" {{request()->is('admin/posts*') ? 'active' : ''}}>
    <a href="{{ route('admin.postfavorito.index')}}"><i class="glyphicon glyphicon-heart"></i> <span>Posts Favoritos</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      
    </li>

    <li class="treeview" {{request()->is('admin/posts*') ? 'active' : ''}}>
    <a href="{{ route('admin.autor.index')}}"><i class="glyphicon glyphicon-user"></i> <span>Autores</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      
    </li>

    <li class="treeview" {{request()->is('admin/posts*') ? 'active' : ''}}>
      <a href="#"><i class="glyphicon glyphicon-user"></i> <span>Subscriptores</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
      <li {{request()->is('admin/posts') ? 'class=active' : ''}}><a href="#{{-- route('admin.posts.index')--}}"><i class="fa fa-eye"></i>Ver todos</a></li>
      {{-- <li><a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil"></i>Crear un post</a></li> --}}
      </ul>
    </li>

    <li class="treeview" {{request()->is('admin/posts*') ? 'active' : ''}}>
    <a href="{{ route('admin.configuracion') }}"><i class="glyphicon glyphicon-wrench"></i> <span>Configuracion</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      
    </li>
  </ul>