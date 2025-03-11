@extends('admin.layout')

@section('header')
   
  <section class="content-header">
    <h1>
      Autores
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
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables/dataTables.bootstrap.css') }}">
@endpush

@section('content')

<section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-info">
          <div class="box-header">
              
            <h3 class="box-title">  <span class="badge bg-secondary">{{ $autores->count() }}</span></h3>
            <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Crear Publicacion</button>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="posts-table" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Posts</th>
                <th>Comentarios</th>
                <th>Posts Favoritos</th>
                <th>Created At</th>
                <th>Acciones</th>
                
               
              </tr>
              </thead>
              <tbody>
                @foreach($autores as $key => $autor)

                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $autor->name }}</td>
                        <td>{{ $autor->posts_count }}</td>
                        <td>{{ $autor->comments_count }}</td>
                        <td>{{ $autor->favorite_posts->count() }}</td>
                        <td>{{ $autor->created_at->toDateString() }}</td>
                        <td>
                          {{-- <a href="#" class="btn btn-default btn-xs"><i class="fa fa-eye"></i></a>
                          <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a> --}}
                          <form action="{{ route('admin.autor.destroy', $autor) }}" method="POST" style="display: inline">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('¿estas seguro de elimnar el autor?')" class="btn btn-danger btn-xs"><i class="fa fa-times"></i></button>
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
   <script src=" {{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
   <script src="{{ asset('adminlte/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>

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