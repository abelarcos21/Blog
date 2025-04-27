@extends('layouts.frontend.app')

@section('meta-title', $post->title )
{{-- @section('meta-description', {{ $post->title }}) --}}


@push('css')
    <link href="{{ asset('frontend/css/single-post/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/single-post/responsive.css') }}" rel="stylesheet">
    <style>
        .header-bg{
            height: 400px;
            width: 100%;

            background-image: url('/storage/{{ $post->image }}');

            background-size: cover;
        }
        .favorite_posts{
            color: blue;
        }
    </style>
@endpush
 {{-- background-image: url({{ Storage::disk('public')->url('post/'.$post->image) }});   --}}
@section('content')
    <div class="header-bg">
    </div><!-- slider -->

    <section class="post-area section">
        <div class="container">

            <div class="row">

                <div class="col-lg-8 col-md-12 no-right-padding">

                    <div class="main-post">

                        <div class="blog-post-inner">

                            <div class="post-info">

                                <div class="left-area">

                                    @if ($post->user && $post->user->image)
                                        <a class="avatar" href="#"><img src="/storage/{{ $post->user->image}}" alt="Profile Image"></a>
                                    @else
                                        <a class="avatar" href="#"><img src="{{ asset('images/default-user.png') }}" alt="Usuario sin imagen"></a> {{-- Una imagen por defecto --}}
                                    @endif
                                </div>

                                <div class="middle-area">
                                <a class="name date" href="{{-- route('autor.profile', $post->user) --}}"><b>Publicado por {{ $post->user->name }}</b></a>
                                    <h6 class="date"> hace {{  $post->created_at->timespan() }}</h6>{{--diffForHumans()--}}
                                </div>

                            </div><!-- post-info -->

                            <h3 class="title"><a href="#"><b>{{ Str::slug($post->title) }}</b></a></h3>

                            <div class="para">

                                {!! $post->body !!}
                            </div>

                            <ul class="tags">
                                @foreach($post->tags as $tag)
                                    <li><a href=" {{ route('tag.show', $tag->url)}}"><i class="ion-pricetags"></i> {{ $tag->name }}</a></li>
                                @endforeach
                            </ul>
                        </div><!-- blog-post-inner -->

                        <div class="post-icons-area">
                            <ul class="post-icons">
                                <li>
                                    @guest
                                        <a href="javascript:void(0);" onclick="toastr.info('Para agregar a tu lista de  favoritos. Debes iniciar sesion .','Info',{
                                                    closeButton: true,
                                                    progressBar: true,
                                                })"><i class="ion-heart"></i>{{ $post->favorite_to_users->count() }}</a>
                                    @else
                                        <a href="javascript:void(0);" onclick="document.getElementById('favorite-form-{{ $post->id }}').submit();"
                                           class="{{ !Auth::user()->favorite_posts->where('pivot.post_id', $post->id)->count()  == 0 ? 'favorite_posts' : '' }}"><i class="ion-heart"></i>{{ $post->favorite_to_users->count() }}</a>

                                        <form id="favorite-form-{{ $post->id }}" method="POST" action="{{ route('post.favorito',$post->id) }}" style="display: none;">
                                            @csrf
                                        </form>
                                    @endguest

                                </li>
                                <li><a href="#"><i class="ion-chatbubble"></i>{{ $post->comments->count() }}</a></li>
                                <li><a href="#"><i class="ion-eye"></i> {{ $post->view_count }}</a></li>
                            </ul>

                            <ul class="icons">
                                <li>Compartir : </li>
                                <li><a target="_blank" href="https://www.facebook.com/sharer.php?u={{request()->fullUrl()}}"><i class="ion-social-facebook"></i></a></li>
                                <li><a target="_blank" href="https://twitter.com/intent/tweet?url={{ request()->fullUrl() }}&text={{$post->title}}&via=CodyDev&hashtags=CodyDev"><i class="ion-social-twitter"></i></a></li>

                            </ul>
                        </div>


                    </div><!-- main-post -->
                </div><!-- col-lg-8 col-md-12 -->

                <div class="col-lg-4 col-md-12 no-left-padding">

                    <div class="single-post info-area">

                        <div class="sidebar-area about-area">
                            <h4 class="title"><b>Acerca del Autor</b></h4>
                            <p> {{ $post->user->about }} </p>
                        </div>

                        <div class="tag-area">

                            <h4 class="title"><b>Categoria</b></h4>
                            <ul>
                                <li><a href="{{ route('category.show', $post->category->url) }}">{{ $post->category->name }}</a></li>

                            </ul>

                        </div><!-- subscribe-area -->

                    </div><!-- info-area -->

                </div><!-- col-lg-4 col-md-12 -->

            </div><!-- row -->

        </div><!-- container -->
    </section><!-- post-area -->


    <section class="recomended-area section">
        <div class="container">
            <div class="row">
                @foreach($postsrandom as $randompost)
                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100">
                            <div class="single-post post-style-1">

                                <div class="blog-image"><img src="/storage/{{$randompost->image }}
                                    {{-- Storage::disk('public')->url('post/'.$randompost->image) --}}" alt="{{-- $randompost->title --}}"></div>

                                <a class="avatar" href="#"><img src="/storage/{{$randompost->user->image}}{{-- Storage::disk('public')->url('profile/'.$randompost->user->image) --}}" alt="Profile Image"></a>

                                <div class="blog-info">

                                    <h4 class="title"><a href="{{ $randompost->url }}"><b> {{ $randompost->title }}</b></a></h4>
                                    <h6 class="date"> {!! Str::limit($post->body, 105); !!}</h6>
                                    <ul class="post-footer">

                                        <li>
                                            @guest
                                                <a href="javascript:void(0);" onclick="toastr.info('Para agregar a tu lista de favoritos. Debes iniciar Sesion .','Info',{
                                                    closeButton: true,
                                                    progressBar: true,
                                                })"><i class="ion-heart"></i>{{ $randompost->favorite_to_users->count() }}</a>
                                            @else
                                                <a href="javascript:void(0);" onclick="document.getElementById('favorite-form-{{ $randompost->id }}').submit();"
                                                   class="{{-- !Auth::user()->favorite_posts->where('pivot.post_id',$randompost->id)->count()  == 0 ? 'favorite_posts' : '' --}}"><i class="ion-heart"></i>{{ $post->favorite_to_users->count() }}</a>

                                                <form id="favorite-form-{{ $randompost->id }}" method="POST" action="{{-- route('post.favorito',$randompost->id) --}}" style="display: none;">
                                                    @csrf
                                                </form>
                                            @endguest

                                        </li>
                                        <li><a href="#"><i class="ion-chatbubble"></i>{{ $randompost->comments->count() }}</a></li>
                                        <li><a href="#"><i class="ion-eye"></i>{{ $randompost->view_count }}</a></li>
                                    </ul>

                                </div><!-- blog-info -->
                            </div><!-- single-post -->
                        </div><!-- card -->
                    </div><!-- col-lg-4 col-md-6 -->

                @endforeach
            </div><!-- row -->

        </div><!-- container -->
    </section>

    <section class="comment-section">
        <div class="container">
        <h4><b>Comentarios Post</b></h4>
        <div class="row">

            <div class="col-lg-8 col-md-12">
                <div class="comment-form">
                    @guest
                        <p>Para Agregar Un Comentario. Debes Iniciar Sesion. <a href="{{ route('login') }}">Login</a></p>
                    @else
                        <form method="POST" action="{{ route('comentario.store',$post->id) }}">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <textarea name="comment" rows="2" class="text-area-messge form-control"
                                            placeholder="Ingresa tu comentario" aria-required="true" aria-invalid="false" required></textarea >
                                </div><!-- col-sm-12 -->
                                <div class="col-sm-12">
                                    <button class="submit-btn" type="submit" id="form-submit"><b>Agregar Comentario</b></button>
                                </div><!-- col-sm-12 -->

                            </div><!-- row -->
                        </form>
                    @endguest
                </div><!-- comment-form -->

                <h4><b>Comentarios({{ $post->comments()->count() }})</b></h4>

                @forelse($post->comments as $comment)
                    <div class="commnets-area ">

                        <div class="comment">

                            <div class="post-info">

                                <div class="left-area">
                                    <a class="avatar" href="#"><img src="/storage/{{ $comment->user->image}}
                                        {{-- Storage::disk('public')->url('profile/'.$comment->user->image) --}}" alt="Profile Image"></a>
                                </div>

                                <div class="middle-area">
                                    <a class="name" href="#"><b>{{ $comment->user->name }}</b></a>
                                    <h6 class="date">hace  {{ $comment->created_at->timespan() }}</h6>
                                </div>

                            </div><!-- post-info -->

                            <p>{{ $comment->comment }}</p>

                        </div>

                    </div><!-- commnets-area -->

                @empty

                    <div class="commnets-area ">

                        <div class="comment">
                            <p>No Hay comentarios. :)</p>
                        </div>
                    </div>

                @endforelse

            </div><!-- col-lg-8 col-md-12 -->

        </div><!-- row -->
        </div>
    </section>
    

@endsection

@push('js')

@endpush

