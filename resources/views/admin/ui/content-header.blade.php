<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <div class="d-flex align-items-center">
                    <h1>
                        @isset($data['title'])
                            {{ $data['title'] }}
                        @endisset
                    </h1>
                    <div class="pl-3">
                        <a href="#" class="btn btn-success mb-3">{{ __('common.Create New') }}</a>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">{{ __('common.Home') }}</a></li>
                    <li class="breadcrumb-item active">
                        @isset($data['title'])
                            {{ $data['title'] }}
                        @endisset
                    </li>
                </ol>
            </div>
        </div>
    </div>
</section>
