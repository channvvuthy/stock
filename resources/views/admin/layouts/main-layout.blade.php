@extends('admin.layouts.master')
@section('content')
    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            @include('admin.layouts.navbar')
            @include('admin.layouts.sidebar')
            @yield('ui-rendering')
            @include('admin.layouts.copyright')
        </div>
    @endsection
