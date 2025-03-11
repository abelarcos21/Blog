@extends('layouts.frontend.app')

@section('title','Category')

@push('css')
    <link href="{{ asset('frontend/css/category/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/category/responsive.css') }}" rel="stylesheet">
    <style>
        .slider {
            height: 400px;
            width: 100%;
            background-image: url('{{ asset($category->image) }}');
            background-size: cover;
        }
        .favorite_posts{
            color: blue;
        }
    </style>
    {{-- background-image: url({{ Storage::disk('public')->url('post/'.$post->image) }});   --}}
@endpush

@section('content')
    <div class="slider display-table center-text">
        <h1 class="title display-table-cell"><b>{{ $category->name }}</b></h1>
    </div><!-- slider -->

    <section class="blog-area section">
        <div class="container">

            <div class="row">
                
                @forelse($posts as $post) 
                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100">
                            <div class="single-post post-style-1">

                                <div class="blog-image"><img src="/storage/{{ $post->image }}{{-- Storage::disk('public')->url('post/'.$post->image) --}}" alt="{{ $post->title }}"></div>

                                <a class="avatar" href="{{-- route('author.profile',$post->user->username) --}}"><img src="/storage/{{ $post->user->image}}{{-- Storage::disk('public')->url('profile/'.$post->user->image) --}}" alt="Profile Image"></a>

                                <div class="blog-info">

                                    <h4 class="title"><a href="{{ route('posts.show',$post->url) }}"><b>{{ $post->title }}</b></a></h4>
                                    <h6 class="date"> {!! str_limit($post->body, 105); !!}</h6>
                                    <ul class="post-footer">

                                        <li>
                                            @guest
                                                <a href="javascript:void(0);" onclick="toastr.info('To add favorite list. You need to login first.','Info',{
                                                    closeButton: true,
                                                    progressBar: true,
                                                })"><i class="ion-heart"></i>{{-- $post->favorite_to_users->count() --}}</a>
                                            @else
                                                <a href="javascript:void(0);" onclick="document.getElementById('favorite-form-{{-- $post->id --}}').submit();"
                                                    class="{{-- !Auth::user()->favorite_posts->where('pivot.post_id',$post->id)->count()  == 0 ? 'favorite_posts' : ''--}}"><i class="ion-heart"></i>8{{-- $post->favorite_to_users->count() --}}</a>

                                                <form id="favorite-form-{{-- $post->id }}" method="POST" action="{{-- route('post.favorite',$post->id) --}}" style="display: none;">
                                                    @csrf
                                                </form>
                                            @endguest

                                        </li>
                                        <li><a href="#"><i class="ion-chatbubble"></i>{{$post->comments->count() }}</a></li>
                                        <li><a href="#"><i class="ion-eye"></i>{{ $post->view_count }}</a></li>
                                    </ul>

                                </div><!-- blog-info -->
                            </div><!-- single-post -->
                        </div><!-- card -->
                    </div><!-- col-lg-4 col-md-6 -->
                @empty

                    <div class="col-lg-12 col-md-6">
                        <div class="card h-100">
                            <div class="single-post post-style-1">
                                <div class="blog-info">
                                    <h4 class="title">
                                        <strong>No se encontraron Posts :(</strong>
                                    </h4>
                                </div><!-- blog-info -->
                            </div><!-- single-post -->
                        </div><!-- card -->
                    </div><!-- col-lg-4 col-md-6 -->
                @endforelse
                
            </div><!-- row -->

            {{ $posts->links() }}

        </div><!-- container -->
    </section><!-- section -->

@endsection

@push('js')

@endpush