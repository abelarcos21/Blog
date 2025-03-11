<ul class="sidebar-menu">
        <li class="header">Navegacion</li>
        <li {{ request()->is('autor') ? 'class=active' : ''}} class="active treeview">
        <a href="{{ route('autor.dashboard') }}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          
        </li>
  
          <li class="treeview" {{request()->is('autor/posts*') ? 'active' : '' }}>
            <a href="{{ route('autor.dashboard') }}"><i class="glyphicon glyphicon-th-list"></i> <span>Posts</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
            <li {{ request()->is('autor/posts') ? 'class=active' : '' }}><a href="{{ route('autor.dashboard') }}"><i class="fa fa-eye"></i>Ver todos los posts</a></li>
            <li><a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil"></i>Crear un post</a></li>
            </ul>
          </li>

          <li class="treeview" {{request()->is('autor/posts*') ? 'active' : '' }}>
            <a href="{{ route('comentario.index') }}"><i class="glyphicon glyphicon-comment"></i> <span>Comentarios</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            {{-- <ul class="treeview-menu">
            <li {{request()->is('autor/posts') ? 'class=active' : '' }}><a href=""><i class="fa fa-eye"></i>Ver todos los comentarios</a></li>
            
            </ul> --}}
          </li>

          <li class="treeview" {{ request()->is('autor/favorito*') ? 'active' : '' }}>
            <a href="{{ route('posts.favorito') }}"><i class="glyphicon glyphicon-heart"></i> <span>Posts Favoritos</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            {{-- <ul class="treeview-menu">
            <li {{request()->is('autor/favorito') ? 'class=active' : ''}}><a href="#"><i class="fa fa-eye"></i>Ver todos los posts favoritos</a></li>
            
            </ul> --}}
          </li>

          <li class="treeview" {{ request()->is('autor/posts*') ? 'active' : ''}}>
            <a href="{{ route('configuracion') }}"><i class="glyphicon glyphicon-wrench"></i> <span>Configuracion</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            {{-- <ul class="treeview-menu">
            <li {{request()->is('autor/posts') ? 'class=active' : '' }}><a href="#"><i class="fa fa-eye"></i>Ver la configuracion</a></li>
            
            </ul> --}}
          </li>

          
    
      </ul>