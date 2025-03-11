@extends('admin.layout')

@section('header')
    <section class="content-header">
        <h1>
          Posts Pendientes
          <small>Listado</small>
          </h1>
          <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
          <li class="active">Here</li>
        </ol>
      </section>
@endsection

@push('styles')

@endpush

@section('content')
<section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box box-info">
              <div class="box-header">
                <h3 class="box-title"><span class="badge bg-secondary">{{ $posts->count() }}</span></h3>
                
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="posts-table" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Titulo</th>
                    <th>Autor</th>
                    <th><i class="fa fa-eye fa-2x fa-lg"></i></th>
                    <th>Is Approved</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Acciones</th>
                    
                   
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($posts as $key => $post)

                        <tr>
                            <td>{{ $key + 1}}</td>
                            <td>{{ str_limit($post->title, 20) }}</td>
                            <td>{{ $post->user->name }}</td>
                            <td>{{ $post->view_count }}</td>
                            <td>
                                @if($post->is_approved == true)
                                    <span class="label bg-green">Aprobado</span>
                                @else
                                    <span class="label bg-red">Pendiente</span>
                                @endif
                            </td>
                            <td>
                                @if($post->status == true)
                                    <span class="label bg-green">Publicado</span>
                                @else
                                    <span class="label bg-red">Pendiente</span>
                                @endif
                            </td>
                            <td>{{ $post->created_at->format('M/d/Y') }}</td>
                            <td>
                              <a href="#" class="btn btn-default btn-xs"><i class="fa fa-eye"></i></a>
                              <a href="{{-- route('admin.posts.edit', $post) --}}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
                              <form action="{{-- route('admin.posts.destroy', $post) --}}" method="POST" style="display: inline">
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

@endpush