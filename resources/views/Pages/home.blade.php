
@extends('layouts.frontend.app')

@section('title','Home')

@push('css')

    <link href="{{ asset('frontend/css/home/styles.css') }}" rel="stylesheet">

    <link href="{{ asset('frontend/css/home/responsive.css') }}" rel="stylesheet">
     
    {{-- Estilos socialbar --}}
    <link rel="stylesheet" href="{{ asset('frontend/css/barrasocial/main.css') }}">
    <link rel="stylesheet" href="{{ asset('frontendcss/barrasocial/icomoon.css') }}">
    {{--  --}}

    <style>
        .favorite_posts{
            color: blue;
        }

        /* .div .blog-area section { display:none; }  BOTON CARGAR MAS*/ 
    </style>
@endpush

@section('content')

{{-- @include('layouts.frontend.partial.social') --}}
    <div class="social-bar">
        <ul>
            <li><a href="http://www.facebook.com/falconmasters" target="_blank" class="icon-facebook"></a></li>
            <li><a href="http://www.twitter.com/falconmasters" target="_blank" class="icon-twitter"></a></li>
            <li><a href="http://www.googleplus.com/falconmasters" target="_blank" class="icon-googleplus"></a></li>
            <li><a href="http://www.pinterest.com/falconmasters" target="_blank" class="icon-pinterest"></a></li>
            <li><a href="mailto:contacto@falconmasters.com" class="icon-mail"></a></li>
        </ul>
    </div>
    
    <div class="main-slider">
        <div class="swiper-container position-static" data-slide-effect="slide" data-autoheight="false"
             data-swiper-speed="500" data-swiper-autoplay="10000" data-swiper-margin="0" data-swiper-slides-per-view="4"
             data-swiper-breakpoints="true" data-swiper-loop="true" >
            <div class="swiper-wrapper">

               @foreach($categories as $category)
                    <div class="swiper-slide">
                        <a class="slider-category" href="{{ route('category.show',$category->url) }}">
                            <div class="blog-image"><img src="{{ asset($category->image) }} {{-- Storage::disk('public')->url('category/slider/'.$category->image) --}}" alt="{{ $category->name }}"></div>

                            <div class="category">
                                <div class="display-table center-text">
                                    <div class="display-table-cell">
                                        <h3><b>{{ $category->name }}</b></h3>
                                    </div>
                                </div>
                            </div>

                        </a>
                    </div><!-- swiper-slide -->
                @endforeach

            </div><!-- swiper-wrapper -->

        </div><!-- swiper-container -->

    </div><!-- slider -->

    <section class="blog-area section">
       
        <div class="container">
           
            <div class="row">

                @foreach($posts as $post)
                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100">
                            <div class="single-post post-style-1">
                                @if($post->image) 
                                
                                    <div class="blog-image"><img src=" /storage/{{ $post->image }}" alt="{{ $post->title }}"></div>
                                    {{-- <div class="blog-image"><img src="{{Storage::disk('public')->url('post/'.$post->image) }}" alt="{{ $post->title }}"></div> --}}
                                   
                                @endif                   
                                <a class="avatar" href="{{-- route('author.profile',$post->user->username) --}}">
                                    <img src="/storage/{{ $post->user->image }}
                                    {{-- Storage::disk('public')->url('profile/'.$post->user->image) --}}" alt="Profile Image">
                                </a>

                                <div class="blog-info">

                                    <h4 class="title"><a href="{{ route('posts.show',$post->url) }}"><b>{{ $post->title }}</b></a></h4>
                                   
                                    <ul class="post-footer">

                                        <li>
                                            @guest
                                                <a href="javascript:void(0);" onclick="toastr.info('To add favorite list. You need to login first.','Info',{
                                                    closeButton: true,
                                                    progressBar: true,
                                                })"><i class="ion-heart"></i>{{-- $post->favorite_to_users->count() --}}</a>
                                            @else
                                                <a href="javascript:void(0);" onclick="document.getElementById('favorite-form-{{ $post->id }}').submit();"
                                                   class="{{-- !Auth::user()->favorite_posts->where('pivot.post_id',$post->id)->count()  == 0 ? 'favorite_posts' : ''--}}"><i class="ion-heart"></i>{{-- $post->favorite_to_users->count() --}}</a>

                                                <form id="favorite-form-{{-- $post->id --}}" method="POST" action="{{--route('post.favorite',$post->id) --}}" style="display: none;">
                                                    @csrf
                                                </form>
                                            @endguest

                                        </li>
                                        <li>
                                            <a href="#"><i class="ion-chatbubble"></i>{{-- $post->comments->count() --}}</a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="ion-eye"></i>{{ $post->view_count }}</a>
                                        </li>
                                    </ul>

                                </div><!-- blog-info -->
                            </div><!-- single-post -->
                        </div><!-- card -->
                    </div><!-- col-lg-4 col-md-6 -->
                @endforeach

                {{-- {{ $posts->links() }} --}}
                {{-- {!! $posts->appends(Request::all()->render() )!!} --}}

            </div><!-- row -->

        </div><!-- container -->
    </section><!-- section -->
@endsection

@push('js')
    <script>

        //BOTON CARGAR MAS
        // $(function(){
        //     $("div").slice(0, 10).show(); // select the first ten
        //     $("#load").click(function(e){ // click event for load more
        //         e.preventDefault();
        //         $("div:hidden").slice(0, 10).show(); // select next 10 hidden divs and show them
        //         if($("div:hidden").length == 0){ // check if any hidden divs still exist
        //             alert("No more divs"); // alert if there are none left
        //         }
        //     });
        // });

        //CARGAR CONTENIDO DINAMICO AL HACER SCROLL


    </script>
@endpush