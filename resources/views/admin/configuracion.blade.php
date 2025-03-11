
@extends('admin.layout')

@section('header')

    <section class="content-header">
     <h1>
      Perfil
      <small>{{ Auth::user()->name}}</small>
      </h1>
      <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
      <li class="active">Here</li>
        </ol>
    </section>

@endsection

@section('content')


    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="box box-primary">
                <div class="box-body box-profile">
                @if(Auth::user()->image)
                    
                  <img class="profile-user-img img-responsive img-circle" src="/storage/{{ Auth::user()->image }}" alt="{{ Auth::user()->name }}">

                @endif

                <h3 class="profile-username text-center">{{ Auth::user()->name}}</h3>

                <p class="text-muted text-center">{{ Auth::user()->about }}</p>

                   
                </div>
                <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- About Me Box -->
                <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Acerca de mi</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <strong><i class="fa fa-book margin-r-5"></i> Educacion</strong>

                    <p class="text-muted">
                    B.S. Instituto Tecnologico de Campeche
                    </p>

                    <hr>

                    <strong><i class="fa fa-map-marker margin-r-5"></i> Direccion</strong>

                    <p class="text-muted">San Francisco de Campeche</p>

                    <hr>

                    <strong><i class="fa fa-pencil margin-r-5"></i> Habilidades</strong>

                    <p>
                    <span class="label label-danger">Laravel</span>
                    <span class="label label-success">Django</span>
                    <span class="label label-info">Javascript</span>
                    <span class="label label-success">Vuejs</span>
                    <span class="label label-warning">PHP</span>
                    <span class="label label-primary">Python</span>
                    </p>

                </div>
                <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        <!-- /.col -->
            <div class="col-md-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                        <li class="active"><a href="#settings" data-toggle="tab">Actualizar Perfil</a></li>
                        <li><a href="#cambiarpassword" data-toggle="tab">Cambiar Contraseña</a></li>
                    {{-- <li><a href="#timeline" data-toggle="tab">Timeline</a></li> --}}
                    
                </ul>
            <div class="tab-content">
        
                <div class="active tab-pane" id="settings">
                <form action="{{ route('admin.perfil.update')}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                    @csrf @method('PUT')
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label for="inputName" class="col-sm-2 control-label">Nombre</label>
                        <div class="col-sm-10">
                        <input name="name" value="{{ old(Auth::user()->name, auth()->user()->name) }}" type="text" class="form-control" id="inputName" placeholder="Nombre">
                            {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                        <label for="inputName" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                        <input name="email" value="{{ old(Auth::user()->email, auth()->user()->email) }}" type="email" class="form-control" id="inputName" placeholder="Correo">
                            {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputExperience" class="col-sm-2 control-label">Avatar</label>
                        <div class="col-sm-10">
                            <input name="image" type="file" class="form-control" id="inputName" placeholder="Image">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputSkills" class="col-sm-2 control-label">Acerca de mi</label>
                        <div class="col-sm-10">
                        <textarea name="about" class="form-control" id="inputExperience" placeholder="Acerca de mi">{{ old(Auth::user()->about, auth()->user()->about )}}</textarea>
                        </div>
                    </div>
                    
                    <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-danger">Actualizar</button>
                    </div>
                    </div>
                </form>
                </div>

                <div class=" tab-pane" id="cambiarpassword">
                    <form action="{{ route('admin.password.update') }}" method="POST" class="form-horizontal">
                        @csrf  @method('PUT')
                        <div class="form-group">
                            <label for="inputName" class="col-sm-2 control-label">Contraseña Anterior</label>
        
                            <div class="col-sm-10">
                                <input name="old_password" type="password" class="form-control" id="inputName" placeholder="Contraseña anterior">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="col-sm-2 control-label">Nueva Contraseña</label>
        
                            <div class="col-sm-10">
                                <input name="password" type="password" class="form-control" id="inputEmail" placeholder="Nueva contraseña">
                            </div>
                            </div>
                        <div class="form-group">
                            <label for="inputName" class="col-sm-2 control-label">Confirmar Contraseña</label>

                            <div class="col-sm-10">
                                <input name="password_confirmation" type="password" class="form-control" id="inputName" placeholder="Confirmar contraseña">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-danger">Actualizar</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->

@endsection

