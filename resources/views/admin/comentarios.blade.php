@extends('admin.layout')

@section('header')
    <section class="content-header">
        <h1>
        Comentarios
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
<div class="container-fluid">

        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    
                    <div class="body">
                        <div class="table-responsive">
                            <table id="comentarios-table" class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                <tr>
                                    <th class="text-center">Informacion del comentario</th>
                                    <th class="text-center">Informacion del post</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                                </thead>
                                
                                <tbody>
                                    
                                        @foreach($comentarios as $key => $comentario)
                                        <tr>
                                            <td>
                                                <div class="media">
                                                    <div class="media-left">
                                                        <a href="#">
                                                        <img class="media-object" src="/storage/{{$comentario->user->image}}" width="64" height="64">
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <h4 class="media-heading">{{ $comentario->user->name }} <small>{{ $comentario->created_at->diffForHumans() }}</small>
                                                        </h4>
                                                        <p>{{ $comentario->comment }}</p>
                                                        <a target="_blank" href="{{-- route('post.details',$comment->post->slug.'#comments') --}}">Reply</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="media">
                                                    <div class="media-right">
                                                        <a target="_blank" href="{{-- route('post.details',$comment->post->slug) --}}">
                                                            <img class="media-object" src="/storage/{{ $comentario->post->image}}{{-- Storage::disk('public')->url('./posts/'.$comment->post->image) --}}" width="64" height="64">
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <a target="_blank" href="{{-- route('post.details',$comment->post->slug) --}}">
                                                            <h4 class="media-heading">{{ str_limit($comentario->post->title,'40') }}</h4>
                                                        </a>
                                                        <p>by <strong>{{ $comentario->post->user->name }}</strong></p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                
                                                <form method="POST" action="{{ route('admin.comentario.destroy',$comentario->id) }}" >
                                                    @csrf
                                                    @method('DELETE')
                                                    <button onclick="return confirm('Estas Seguro de eliminar el comentario')" class="btn btn-danger ">
                                                        <i class="fa fa-times"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table -->
    </div>
@endsection

@push('scripts')

    <!-- DataTables -->
    <script src=" {{ asset('/adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/adminlte/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>

    <script>
    
        $(function () {
      
            $('#comentarios-table').DataTable({
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