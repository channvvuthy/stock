@extends('admin.layouts.main-layout')
@section('ui-rendering')
    <div class="content-wrapper">
        @include('admin.ui.content-header', ['isNew' => true])
        <div class="content">
            @include('admin.ui.table')
        </div>
    </div>
    <!-- /.content-wrapper -->
@endsection
