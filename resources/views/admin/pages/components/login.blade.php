@extends('admin.layouts.master')
@section('title')
ចូលគណនី
@endsection
@section('content')
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html">ប្រព័ន្ធគ្រប់គ្រងការលក់ <b>VSM</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">បំពេញពត៍មានរបស់អ្នកដើម្បីប្រើប្រាស់ប្រព័ន្ធ</p>

      <form action="../../index3.html" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="ឈ្មោះអ្នកប្រើប្រាស់">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="លេខសម្ងាត់">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-7">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                ចងចាំខ្ញុំ
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-5">
            <button type="submit" class="btn btn-primary btn-block">ចូលប្រើប្រាស់</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="forgot-password.html">ភ្លេចពាក្យសម្ងាត់</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">បង្កើតអ្នកប្រើប្រាស់ថ្មី</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
@endsection