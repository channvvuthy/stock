@extends('admin.layouts.master')
@section('content')

    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">

            <!-- Preloader -->
            <div class="preloader flex-column justify-content-center align-items-center">
                <img class="animation__shake" src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60"
                    width="60">
            </div>
            @include('admin.layouts.navbar')
            @include('admin.layouts.sidebar')
            @yield('article')
            @include('admin.layouts.copyright')
        </div>
    @endsection
