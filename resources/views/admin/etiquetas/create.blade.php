@extends('admin.layout')

@section('header')
    <section class="content-header">
        <h1>
            Etiquetas
            <small>Crear</small>
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

     <!-- Main content -->
     <section class="content">
            <div class="row">
              <!-- left column -->
              <div class="col-md-6">
                <!-- general form elements -->
                  <div class="box box-primary">
                      <div class="box-header with-border">
                      <h3 class="box-title">Nueva Etiqueta</h3>
                      </div>
                      <!-- /.box-header -->
                      <!-- form start -->
                      <form action="{{ route('admin.tag.store') }} " method="POST" role="form" >
                          @csrf
                          <div class="box-body">
                          <div class="form-group">
                              <label for="exampleInputEmail1">Nombre</label>
                              <input name="name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Categoria">
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