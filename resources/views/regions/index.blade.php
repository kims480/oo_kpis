@extends('layouts.app')

@section('content')
    <div class="card ">

        <div class="card-header">
            <h3>
                @lang('models/regions.plural')
                </h3>


            <a class="btn btn-default btn-sm mr-3 ml-auto" href="{{ route('regions.create') }}">
                @lang('crud.add_new')
            </a>
            @can('gen.permissions')
                <a class="btn btn-success btn-sm " href="{{ route('insert.permissions', __('models/regions.singular')) }}">
                    @lang('crud.initiate_permissions')
                </a>
            @endcan

        </div>

        <div class="card-body">
            <div class="content px-3">

                @include('flash::message')

                <div class="clearfix"></div>

                @include('regions.table')

                <div class="card-footer clearfix float-right">
                    <div class="float-right">
                        @include('adminlte-templates::common.paginate', [
                            'records' => $regions,
                        ])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
