<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"></h3>
            <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right"
                           placeholder="{{__('common.Search')}}">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                <tr>
                    @if (isset($data['display_id']) && $data['display_id'])
                        <th>{{__('common.ID')}}</th>
                    @endif
                    @isset($data['head'])
                        @foreach ($data['head'] as $key => $col)
                            @if(!isset($col['view']))
                                <th>{{ __('common.'.$col['title']) }}</th>
                            @endif
                        @endforeach
                        @if ($data['has_action'])
                            <th class="text-center" width="{{$data['action_with']}}">{{__('common.Action')}}</th>
                        @endif
                    @endisset

                </tr>
                </thead>

                <tbody>
                @isset($data['result'])
                    @foreach ($data['result'] as $key => $result)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            @foreach ($data['head'] as $key => $col)
                                @if(!isset($col['view']))
                                    <td>
                                        @if(isset($col['type']))
                                            @if($col['type'] == 'image' && isset($col['multiple']))
                                                <a href="#"
                                                   class="files">
                                                    <i class="fa fa-image text-gray"
                                                       data-url="{{ is_array($result)?$result[$col['field']]:$result->{$col['field']}  }}"
                                                       data-type="multiple_file"></i>
                                                </a>
                                            @elseif($col['type'] == 'gender')
                                                @if(is_array($result)?$result[$col['field']]:$result->{$col['field']} == 1)
                                                    <span>Male</span>
                                                @else
                                                    <span>Female</span>
                                                @endif
                                            @elseif($col['type'] == 'status')
                                                @if(is_array($result)?$result[$col['field']]:$result->{$col['field']} == 1)
                                                    <span>Enable</span>
                                                @else
                                                    <span>Disable</span>
                                                @endif

                                            @else
                                                <a href="#"
                                                   class="files">
                                                    <i class="fa fa-image text-gray"
                                                       data-url="{{ is_array($result)?$result[$col['field']]:$result->{$col['field']}  }}"
                                                       data-type="single_file"></i>
                                                </a>
                                            @endif
                                        @else
                                            {{App\Helper\Helper::subStr(is_array($result)?$result[$col['field']]:$result->{$col['field']},20) }}
                                        @endif

                                    </td>
                                @endif
                            @endforeach
                            @if ($data['has_action'])
                                <td>
                                    <div class="d-flex flex-row justify-content-center">
                                        @if ($data['view'])
                                            <div class="mr-2">
                                                <a href="{{App\Helper\Helper::indexUrl()}}/detail/{{is_array($result)?$result[$data['pk']]:$result->{$data['pk']} }}">
                                                    <button type="button" class="btn btn-primary btn-sm">
                                                        <i class="fa fa-eye"></i>
                                                        View
                                                    </button>
                                                </a>
                                            </div>
                                        @endif
                                        @if ($data['edit'])
                                            <div class="mr-2">
                                                <a href="{{App\Helper\Helper::indexUrl()}}/edit/{{is_array($result)?$result[$data['pk']]:$result->{$data['pk']} }}">
                                                    <button type="button" class="btn btn-success btn-sm">
                                                        <i class="fa fa-edit"></i>
                                                        Edit
                                                    </button>
                                                </a>
                                            </div>
                                        @endif
                                        @if ($data['delete'])
                                            <div>
                                                <a href="#" class="btn-delete"
                                                   data-id="{{is_array($result)?$result[$data['pk']]:$result->{$data['pk']} }}">
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                            data-id="{{is_array($result)?$result[$data['pk']]:$result->{$data['pk']} }}">
                                                        <i class="fa fa-trash"></i>
                                                        Delete
                                                    </button>
                                                </a>
                                            </div>
                                        @endif
                                        @if(isset($data['appendedButton']))
                                            @foreach($data['appendedButton'] as $btn)
                                                <div class="ml-2">
                                                    <a href="{{$btn['action']}}/{{is_array($result)?$result[$data['pk']]:$result->{$data['pk']} }}?parent={{$btn['parent']}}"
                                                       data-id="{{is_array($result)?$result[$data['pk']]:$result->{$data['pk']} }}">
                                                        <button type="button" class="{{$btn['btn']}} btn-sm">
                                                            <i class="{{$btn['icon']}}"></i>
                                                            {{$btn['name']}}
                                                        </button>
                                                    </a>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                @endisset
                </tbody>
            </table>
        </div>

    </div>

</div>
