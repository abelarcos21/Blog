@extends('admin.layout')

@section('header')

    <section class="content-header">
        <h1>
        Posts
        <small>Crear Publicacion</small>
        </h1>
        <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="{{ route('admin.posts.index')}}"><i class="fa fa-list"></i> Posts</a></li>
        <li class="active">Crear</li> {{--pagina actual--}}
        </ol>
    </section>

@endsection

@push('styles')
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="{{ asset('/adminlte/plugins/datepicker/datepicker3.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('/adminlte/plugins/select2/select2.min.css') }}">
@endpush


@section('content')

    <div class="row">
        <form action="{{ route('admin.posts.update', $post)}}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="col-md-8">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Crear una publicacion</h3>
                </div>
            
                <div class="box-body">
                <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
                        <label >titulo de la publicacion</label>
                        <input value="{{ old('title', $post->title) }}" class="form-control" name="title" placeholder="ingresa el titulo" >
                        {!! $errors->first('title', '<span class="help-block">:message</span>')!!}
                </div>

                <div class="form-group {{ $errors->has('body') ? 'has-error' : ''}}">
                        <label>Contenido de la publicaion</label>
                        <textarea name="body" id="editor" class="form-control" rows="10" placeholder="ingresa el contenido">{{ old('body', $post->body)}}</textarea>
                        {!! $errors->first('body', '<span class="help-block">:message</span>')!!}
                    </div>
        
                </div>
            </div>
            </div>

            <div class="col-md-4">
                <div class="box box-info">
                    
                    <div class="box-body">
                        

                        {{-- <div class="form-group">
                            <label>Fecha de publicacion:</label>
                
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input value="{{ old('published_at', $post->published_at ?  $post->published_at->format('Y/m/d') : null ) }}" type="text" name="published_at" class="form-control pull-right" id="datepicker">
                            </div>
                            
                        </div> --}}

                            <div class="form-group {{$errors->has('category') ? 'has-error' : ''}}">
                            <label >Categorias</label>
                            <select name="category" class="form-control">
                                <option value="">Selecciona una categoria</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{old('category', $post->category_id) == $category->id ? 'selected' : ''}}

                                        >{{ $category->name}}</option>
                                @endforeach
                            </select>
                            {!! $errors->first('category', '<span class="help-block">:message</span>') !!}

                        </div>

                        <div class="form-group {{ $errors->has('tags') ? 'has-error' : '' }}">           
                            <label >Etiquetas</label>
                            <select name="tags[]" class="form-control select2" multiple="multiple" data-placeholder="Seleciona una o mas etiquetas" style="width: 100%;">
                                
                                @foreach($tags as $tag)
                                    <option {{ collect(old('tags', $post->tags->pluck('id') ))->contains($tag->id) ? 'selected' : '' }} value="{{ $tag->id}}">{{ $tag->name}}</option>
                                @endforeach
                            </select>
                            {!! $errors->first('tags', '<span class="help-block">:message</span>')!!}
                        </div>

                        <div class="form-group">

                            <input type="file" name="image">

                        </div>

                        <div class="form-group">
                            
                            <button type="submit" class=" btn-block btn btn-primary form-control">Guardar Publicacion</button>

                        </div>
            
                    </div>
                </div>

            </div>
        </form>

    </div>
@endsection


@push('scripts')

    <!-- CK Editor -->
    <script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
    <!-- Select2 -->
    <script src="{{ asset('adminlte/plugins/select2/select2.full.min.js') }}"></script>
    <!-- bootstrap datepicker -->
    <script src="{{ asset('adminlte/plugins/datepicker/bootstrap-datepicker.js') }}"></script>

    <script>

        // Date picker fechas
        $('#datepicker').datepicker({
            autoclose: true
        });

        //Initialize Select2 Elements
        $(".select2").select2();

        //Initialize Editor de contenido
        CKEDITOR.replace('editor');

    </script>
    
@endpush

