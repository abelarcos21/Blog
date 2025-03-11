<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('meta-title', config('app.name') ." | Blog")</title>
    <meta name="description" content="@yield('meta-content', 'Este es el Blog de CodyDev')">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">

    <!-- Stylesheets -->
    <link href="{{ asset('frontend/css/bootstrap.css') }}" rel="stylesheet">

   

    <link href="{{ asset('frontend/css/swiper.css') }}" rel="stylesheet">

    <link href="{{ asset('frontend/css/ionicons.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    @stack('css')
</head>
<body>


@include('layouts.frontend.partial.header')

@yield('content')

@include('layouts.frontend.partial.footer')


<!-- SCIPTS -->
<script src="{{ asset('frontend/js/jquery-3.1.1.min.js') }}"></script>

<script src="{{ asset('frontend/js/tether.min.js') }}"></script>

<script src="{{ asset('frontend/js/bootstrap.js') }}"></script>
<script src="{{ asset('frontend/js/swiper.js') }}"></script>
<script src="{{ asset('frontend/js/scripts.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

 {!! Toastr::message() !!} 

<script>
    @if($errors->any())
        @foreach($errors->all() as $error)
        toastr.error('{{ $error }}','Error',{
            closeButton:true,
            progressBar:true,
        });
        @endforeach
    @endif
</script>

@stack('js')
</body>
</html>

