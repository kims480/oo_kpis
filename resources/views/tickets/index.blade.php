@extends('layouts.app')

@section('content')
    {{-- <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                   @lang('models/tickets.plural')
                </div>
                <div class="flex justify-content-end">
                    <a class="btn btn-primary mr-3"
                       href="{{ route('tickets.create') }}">
                         @lang('crud.add_new')
                    </a>
                    @can('gen.permissions')
                        <a class="btn btn-success "
                        href="{{route('insert.permissions',__('models/tickets.singular')) }}">
                            @lang('crud.initiate_permissions')
                        </a>
                    @endcan
                </div>
                @include('layouts.app.common')
            </div>
        </div>
    </section> --}}

    <section class="content-header bg-primary p-0">
        <h3>@lang('models/tickets.plural')</h3>
        <a class="btn btn-default btn-sm ml-auto" href="{{ route('tickets.create') }}">
            @lang('crud.add_new')
        </a>
        <a class="btn btn-default btn-sm ml-auto" href="{{ route('tickets.mail') }}">
            mail
        </a>
        <a class="btn btn-default btn-sm ml-2" href="{{ route('insert.permissions', __('models/tickets.singular')) }}">
            @lang('crud.initiate_permissions')
        </a>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
                @include('tickets.table')

                <div class="card-footer clearfix float-right">
                    <div class="float-right">
                        @include("infyom/common/paginate", ['records' => $tickets])
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


