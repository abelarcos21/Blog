@extends('admin.layout')

@section('header')
    <section class="content-header">
        <h1>
          Etiquetas
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
                <h3 class="box-title"></h3>
              <a href="{{ route('admin.tag.create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Crear Etiqueta</a>
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
                    @foreach($tags as $tag)

                      <tr>
                          <td>{{ $tag->id }}</td>
                          <td>{{ $tag->name }}</td>
                          <td>
                            <a href="#" class="btn btn-default btn-xs"><i class="fa fa-eye"></i></a>
                            <a href="{{-- route('admin.category.edit', $category) --}}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
                            <form action="{{ route('admin.tag.destroy', $tag) }}" method="POST" style="display: inline">
                              @csrf @method('DELETE')
                              <button onclick="return confirm('¿estas seguro de elimnar la etiqueta?')" class="btn btn-danger btn-xs"><i class="fa fa-times"></i></button>
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
    <script src=" {{ asset('/adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
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