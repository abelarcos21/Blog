@extends('admin.layout')

@section('header')

  <section class="content-header">
    <h1>
      Posts
      <small>Listado</small>
      </h1>
      <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
      <li class="active">Here</li>
    </ol>
  </section>

@endsection

@push('styles')
    <!-- DataTables -->
   <link rel="stylesheet" href="{{ asset('/adminlte/plugins/datatables/dataTables.bootstrap.css') }}">

@endpush

@section('content')

    <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box box-info">
              <div class="box-header">
                <h3 class="box-title">Listado de publicaciones</h3>
                <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Crear Publicacion</button>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="posts-table" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Titulo</th>
                    <th>Acciones</th>
                    
                   
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($posts as $post)

                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            <td>
                            <a href="{{ route('posts.show', $post) }}" class="btn btn-default btn-xs"><i class="fa fa-eye"></i></a>
                              <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
                              <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" style="display: inline">
                                @csrf @method('DELETE')
                                <button onclick="return confirm('¿estas seguro de elimnar el post?')" class="btn btn-danger btn-xs"><i class="fa fa-times"></i></button>
                              </form>
                              
                            </td>
                        </tr>

                    @endforeach
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

@endsection

@push('scripts')

    <!-- DataTables -->
    <script src="{{ asset('/adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/adminlte/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>

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

@endpush