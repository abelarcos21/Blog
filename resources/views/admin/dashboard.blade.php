@extends('admin.layout')

@section('content')
    

@section('header')

        
    <section class="content-header">
        <h1>
            Dashboard Admin
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

@endsection

@section('control')
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                  <div class="inner">
                    <h3>34{{-- $posts->count() --}}</h3>
      
                    <p>Posts</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-reorder"></i>
                  </div>
                <a href="{{ route('admin.posts.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                  <div class="inner">
                    <h3>{{ auth()->user()->favorite_posts()->count() }}<sup style="font-size: 20px"></sup></h3>
      
                    <p>Favoritos</p>
                  </div>
                  <div class="icon">
                        <i class="fa fa-heart"></i>
                  </div>
                <a href="{{ route('admin.postfavorito.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                  <div class="inner">
                    <h3>23{{-- $total_pending_posts --}}</h3>
      
                    <p>Posts Pendientes</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-check-square"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                  <div class="inner">
                    <h3>2{{-- $all_views --}}</h3>
      
                    <p>Vistas</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-eye"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>

              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-primary">
                  <div class="inner">
                    <h3>7{{-- $all_views --}}</h3>
      
                    <p>Categorias</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-copyright"></i>
                  </div>
                  <a href="{{route('admin.category.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>

              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-orange">
                  <div class="inner">
                    <h3>9{{-- $all_views --}}</h3>
      
                    <p>Etiquetas</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-tags"></i>
                  </div>
                  <a href="admin.tag.index" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>

              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-purple">
                  <div class="inner">
                    <h3>12{{-- $all_views --}}</h3>
      
                    <p>Autores</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-user"></i>
                  </div>
                  <a href="{{ route('admin.autor.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>

              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-maroon">
                  <div class="inner">
                    <h3>17{{-- $all_views --}}</h3>
      
                    <p>Todos Autores</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-users"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
            </div>
            <!-- /.row -->
           
      
        </section>
    @endsection

    

@endsection