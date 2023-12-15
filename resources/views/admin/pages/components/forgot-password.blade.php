@extends('admin.layouts.master')
@section('title')
ភ្លេចពាក្យសម្ងាត់
@endsection
@section('content')
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#">ប្រព័ន្ធគ្រប់គ្រងការលក់ <b>VSM</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">ប្រសិនបើអ្នកភ្លេចពាក្យសម្ងាត់? សូមបញ្ចូលពត៍មានអ៊ីម៉ែលរបស់អ្នក!</p>

      <form action="recover-password.html" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="អ៊ីម៉ែលអ្នកប្រើប្រាស់" name="username" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">ស្នើរសុំពាក្យសម្ងាត់ថ្មី</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mt-3 mb-1">
        <a href="{{URL::to('admin/login')}}">ចូលគណនី</a>
      </p>
      <p class="mb-0">
        <a href="{{URL::to('admin/register')}}" class="text-center">បង្កើតសមាជិកថ្មី</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
@endsection