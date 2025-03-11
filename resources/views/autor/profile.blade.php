@extends('layouts.frontend.app')

@section('title','Pofile')

@push('css')
    <link href="{{ asset('frontend/css/profile/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/profile/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/single-post/styles.css') }}" rel="stylesheet">
    
    <style>
        .favorite_posts{
            color: blue;
        }
    </style>
@endpush

@section('content')
    <div class="slider display-table center-text">
        <h1 class="title display-table-cell"><b>{{ $user->name}}</b></h1>
    </div><!-- slider -->

    <section class="blog-area section">
        <div class="container">

            <div class="row">

                <div class="col-lg-8 col-md-12">
                    <div class="row">
                        
                        @forelse($posts as $post)
                            <div class="col-md-6 col-sm-12">
                                <div class="card h-100">
                                    <div class="single-post post-style-1">

                                        <div class="blog-image"><img src="/frontend/images/pexels-photo-370474.jpeg{{-- Storage::disk('public')->url('post/'.$post->image) --}}" alt="{{-- $post->title --}}"></div>

                                        <a class="avatar" href="{{-- route('author.profile',$post->user->username) --}}"><img src="/frontend/images/alex-lambley-205711.jpg{{-- Storage::disk('public')->url('profile/'.$post->user->image) --}}" alt="Profile Image"></a>

                                        <div class="blog-info">

                                            <h4 class="title"><a href="{{-- route('post.details',$post->slug) --}}"><b>Mi primer Post{{-- $post->title --}}</b></a></h4>

                                            <ul class="post-footer">

                                                <li>
                                                    @guest
                                                        <a href="javascript:void(0);" onclick="toastr.info('To add favorite list. You need to login first.','Info',{
                                                    closeButton: true,
                                                    progressBar: true,
                                                })"><i class="ion-heart"></i>3{{-- $post->favorite_to_users->count() --}}</a>
                                                    @else
                                                        <a href="javascript:void(0);" onclick="document.getElementById('favorite-form-{{-- $post->id --}}').submit();"
                                                           class="{{-- !Auth::user()->favorite_posts->where('pivot.post_id',$post->id)->count()  == 0 ? 'favorite_posts' : '' --}}"><i class="ion-heart"></i>{{-- $post->favorite_to_users->count() --}}</a>

                                                        <form id="favorite-form-{{-- $post->id --}}" method="POST" action="{{-- route('post.favorite',$post->id) --}}" style="display: none;">
                                                            @csrf
                                                        </form>
                                                    @endguest

                                                </li>
                                                <li>
                                                    <a href="#"><i class="ion-chatbubble"></i>2{{-- $post->comments->count() --}}</a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="ion-eye"></i>12{{-- $post->view_count --}}</a>
                                                </li>
                                            </ul>

                                        </div><!-- blog-info -->
                                    </div><!-- single-post -->
                                </div><!-- card -->
                            </div><!-- col-lg-4 col-md-6 -->
                        
                        @empty
                            <div class="col-md-6 col-sm-12">
                                <div class="card h-100">
                                    <div class="single-post post-style-1">
                                        <div class="blog-info">
                                            <h4 class="title">
                                                <strong>Sorry, No hay Posts :(</strong>
                                            </h4>
                                        </div><!-- blog-info -->
                                    </div><!-- single-post -->
                                </div><!-- card -->
                            </div><!-- col-md-6 col-sm-12 -->
                        @endforelse

                    </div><!-- row -->

                    <a class="load-more-btn" href="#"><b>Cargar Mas</b></a>

                </div><!-- col-lg-8 col-md-12 -->

                <div class="col-lg-4 col-md-12 ">

                    <div class="single-post info-area ">

                        <div class="about-area">
                            <h4 class="title"><b>Acerca Del Autor</b></h4>
                            <p>{{ $user->name }}</p><br>
                            <p>{{ $user->about }}</p><br>
                            <strong>Author Since: {{ $user->created_at->toDateString() }}</strong><br>
                            <strong>Total Posts : {{ $user->posts->count() }}</strong>
                        </div>


                    </div><!-- info-area -->

                </div><!-- col-lg-4 col-md-12 -->

            </div><!-- row -->

        </div><!-- container -->
    </section><!-- section -->


@endsection

@push('js')

@endpush