@extends('admin.layouts.master')
@section('title')
    {{ __('auth.Register') }}
@endsection
@section('content')

    <body class="hold-transition register-page">
        <div class="register-box">
            <div class="register-logo">
                <a href="#">{{ __('auth.Point Of Sale') }} <b>VSM</b></a>
            </div>

            <div class="card">
                <div class="card-body register-card-body">
                    <p class="login-box-msg">{{ __('auth.Create new user') }}</p>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                            @if (session('error_details'))
                                <p>Error details: {{ session('error_details') }}</p>
                            @endif
                        </div>
                    @endif

                    <form action="{{ URL::to('/admin/register') }}" method="post">
                        {{ csrf_field() }}
                        <div class="input-group mb-3">
                            <input type="text" class="form-control @error('email') is-invalid @enderror"
                                placeholder="{{ __('auth.Username') }}" name="name" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                placeholder="{{ __('auth.Email') }}" name="email" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                placeholder="{{ __('auth.Password') }}" name="password" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                placeholder="{{ __('auth.Confirm Password') }}" name="password_confirmation" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>

                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">{{ __('auth.Register') }}</button>
                        </div>
                        <!-- /.col -->
                </div>
                </form>
                <a href="{{ URL::to('/admin/login') }}" class="text-center">I already have a membership</a>
                <p></p>

            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
        </div>
    @endsection
