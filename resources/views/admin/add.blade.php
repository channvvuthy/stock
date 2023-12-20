@extends('admin.layouts.main-layout')
@section('ui-rendering')
    <div class="content-wrapper">
        @include('admin.ui.content-header')
        <div class="content">
            <form method="POST" enctype="multipart/form-data" action="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <div class="px-3 pt-4">
                    @if (isset($data['form']) && $data['form'])
                        <div class="col-{{ $data['col'] }}">
                            <div class="row">
                                @foreach ($data['form'] as $key => $form)
                                    <div class="col-{{ $data['grid'] }}">
                                        <div class="mb-3 row">
                                            @if ($form['type'] == 'text' || $form['type'] == 'number')
                                                <label for="{{ $form['field'] }}" class="col-sm-2 col-form-label">
                                                    {{ __('common.' . $form['title']) }}@if (isset($form['required']) && $form['required'])
                                                        <span class="text-danger">*</span>
                                                    @endif
                                                </label>
                                                <div class="col-sm-10">
                                                    <input type="{{ $form['type'] }}" class="form-control"
                                                        id="{{ $form['field'] }}" name="{{ $form['field'] }}"
                                                        @if (isset($form['required']) && $form['required']) required @endif>
                                                </div>
                                            @elseif($form['type'] == 'textarea')
                                                <label for="{{ $form['field'] }}" class="col-sm-2 col-form-label">
                                                    {{ __('common.' . $form['title']) }}@if (isset($form['required']) && $form['required'])
                                                        <span class="text-danger">*</span>
                                                    @endif
                                                </label>
                                                <div class="col-sm-10">
                                                    <textarea class="form-control" rows="3" style="resize: none;" id="{{ $form['field'] }}"
                                                        name="{{ $form['field'] }}" @if (isset($form['required']) && $form['required']) required @endif></textarea>
                                                </div>
                                            @elseif($form['type'] == 'wysiwyg')
                                                <label for="{{ $form['field'] }}" class="col-sm-2 col-form-label">
                                                    {{ __('common.' . $form['title']) }}@if (isset($form['required']) && $form['required'])
                                                        <span class="text-danger">*</span>
                                                    @endif
                                                </label>
                                                <div class="col-sm-10">
                                                    <textarea id="summernote" name="{{ $form['field'] }}" @if (isset($form['required']) && $form['required']) required @endif>
                                                </textarea>
                                                </div>
                                            @elseif($form['type'] == 'select')
                                                <label for="{{ $form['field'] }}"
                                                    class="col-sm-2 col-form-label">{{ $form['title'] }}</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" name="{{ $form['field'] }}"
                                                        @if (isset($form['required']) && $form['required']) required @endif>
                                                        <option selected>Please select {{ $form['title'] }}</option>
                                                        @foreach ($data[$form['field']] as $select)
                                                            <option value="{{ $select->id }}">{{ $select->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            @elseif($form['type'] == 'select2')
                                                <label for="{{ $form['field'] }}"
                                                    class="col-sm-2 col-form-label">{{ $form['title'] }}</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control select2" style="width: 100%;"
                                                        @if (isset($form['required']) && $form['required']) required @endif>
                                                        <option selected>Please select {{ $form['title'] }}</option>
                                                        @foreach ($data[$form['field']] as $select)
                                                            <option value="{{ $select->id }}">{{ $select->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            @elseif($form['type'] == 'gender')
                                                <label for="{{ $form['field'] }}"
                                                    class="col-sm-2 col-form-label">{{ $form['title'] }}</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control select2" style="width: 100%;"
                                                        @if (isset($form['required']) && $form['required']) required @endif>
                                                        <option selected>Please select {{ $form['title'] }}</option>
                                                        <option value="1">Male</option>
                                                        <option value="2">Female</option>

                                                    </select>
                                                </div>
                                            @elseif($form['type'] == 'status')
                                                <label for="{{ $form['field'] }}"
                                                    class="col-sm-2 col-form-label">{{ __('common.' . $form['title']) }}</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control select2" style="width: 100%;"
                                                        @if (isset($form['required']) && $form['required']) required @endif>
                                                        <option selected>{{ __('common.Please select') }}
                                                            {{ __('common.' . $form['title']) }}</option>
                                                        <option value="1">{{ __('common.Enable') }}</option>
                                                        <option value="2">{{ __('common.Disable') }}</option>

                                                    </select>
                                                </div>
                                            @else
                                                @if (isset($form['multiple']) && $form['multiple'])
                                                    <label for="{{ $form['field'] }}" class="col-sm-2 col-form-label">
                                                        {{ __('common.' . $form['title']) }}
                                                        @if (isset($form['required']) && $form['required'])
                                                            <span class="text-danger">*</span>
                                                        @endif
                                                    </label>
                                                    <div class="col-sm-10">
                                                        <input type="{{ $form['type'] }}" class="form-control"
                                                            style="padding-top:3px;" id="{{ $form['field'] }}"
                                                            name="{{ $form['field'] }}[]"
                                                            @if (isset($form['accept'])) accept="{{ $form['accept'] }}" @endif
                                                            multiple @if (isset($form['required']) && $form['required']) required @endif>
                                                    </div>
                                                @else
                                                    <label for="{{ $form['field'] }}"
                                                        class="col-sm-2 col-form-label">{{ __('common.' . $form['title']) }}
                                                        @if (isset($form['required']) && $form['required'])
                                                            <span class="text-danger">*</span>
                                                        @endif
                                                    </label>
                                                    <div class="col-sm-10">
                                                        <input type="{{ $form['type'] }}" class="form-control"
                                                            style="padding-top:3px;" id="{{ $form['field'] }}"
                                                            name="{{ $form['field'] }}"
                                                            @if (isset($form['accept'])) accept="{{ $form['accept'] }}" @endif
                                                            @if (isset($form['required']) && $form['required']) required @endif>
                                                    </div>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-sm-2 "></div>
                        <div class="col-sm-10 d-flex flex-row">
                            <a href="{{ App\Helper\Helper::indexUrl() }}">
                                <button type="button" class="btn btn-secondary">{{ __('common.Back') }}</button>
                            </a>
                            <button type="submit" class="btn btn-success mx-2" value="{{ URL::current() }}"
                                name="save">
                                {{ __('common.Save & Add More') }}
                            </button>
                            <button type="submit" class="btn btn-success" value="{{ App\Helper\Helper::indexUrl() }}"
                                name="save">{{ __('common.Save') }}
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- /.content-wrapper -->
@endsection
