@extends('admin.layout')

@section('header')

  <section class="content-header">
    <h1>
      Categorias
      
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

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                <h3 class="box-title">Editar Categoria</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form action="{{ route('admin.category.update', $category) }} " method="POST" role="form" enctype="multipart/form-data">
                    @csrf @method('PUT')
                    <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nombre</label>
                    <input value="{{ old('name', $category->name)}}" name="name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Categoria">
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputFile">Imagen</label>
                    <input value="{{ old('image', $category->image) }}" name="image" type="file" id="exampleInputFile">

                    </div>
                    
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Editar</button>
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