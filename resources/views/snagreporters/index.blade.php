@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                   @lang('models/snagreporters.url')
                </div>
                <div class="col-sm-6 d-flex justify-content-end">
                    <a class="btn btn-primary mr-3"
                       href="{{ route(__('models/snagreporters.url').'.create') }}">
                         @lang('crud.add_new')
                    </a>
                    @can('gen.permissions')
                        <a class="btn btn-success "
                        href="{{route('insert.permissions',__('models/snagreporters.model').'/'.__('models/snagreporters.url')) }}">
                            @lang('crud.initiate_permissions')
                        </a>
                    @endcan
                </div>
                @include('layouts.app.common')
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
                @include('snagreporters.table')

                <div class="card-footer clearfix float-right">
                    <div class="float-right">
                        @include('adminlte-templates::common.paginate', ['records' => $snagreporters])
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


